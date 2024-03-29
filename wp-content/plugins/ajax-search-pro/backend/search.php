<?php
/* Prevent direct access */
defined('ABSPATH') or die("You can't access this file directly.");

if (
    isset($_GET['asp_sid'], $_POST['reset_' . ($_GET['asp_sid'] + 0)]) &&
    isset($_POST['asp_sett_nonce'])
) {
    if ( wp_verify_nonce( $_POST['asp_sett_nonce'], 'asp_sett_nonce' ) ) {
        wd_asp()->instances->reset($_GET['asp_sid'] + 0);
        asp_generate_the_css();
        $ch = new WD_ASP_Deletecache_Handler();
        $ch->handle(false);
        $_reset_success = true;
    } else {
        $_reset_success = false;
    }
}

$params = array();
if ( ASP_DEBUG == 1 || defined('WP_ASP_TEST_ENV') )
    $_themes = file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'settings' . DIRECTORY_SEPARATOR . 'themes.json');
else
    $_themes = file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'settings' . DIRECTORY_SEPARATOR . 'themes.min.json');

$_sb_themes = file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'settings' . DIRECTORY_SEPARATOR . 'sb_themes.json');

if ( is_multisite() ) {
    $search = wd_asp()->instances->get($_GET['asp_sid'] + 0, false, true);
} else {
    $search = wd_asp()->instances->get($_GET['asp_sid'] + 0);
}
if ( empty($search) ) {
    $s_id = $_GET['asp_sid'] + 0;
    ?>
    <div id="wpdreams" class='wpdreams wrap'>
        <div class="wpdreams-box">
            <h1><?php echo __('Woops', 'ajax-search-pro'); ?></h1>
            <div class="errorMsg"><?php echo sprintf( __('This search instance (id=%s) does not exists.', 'ajax-search-pro'), $s_id ); ?></div>
        </div>
    </div>
    <?php
    return;
}
/**
 * The search data does not have unset option values as the
 * $asp_globals->instances has it already merged with default options
 */
$sd = &$search['data'];

/**
 * If safe mode is enabled because of the low max_input_vars value, then decode the params.
 */
if ( isset($_POST['asp_options_serialized']) ) {
    // To bypass parse_str max_input_vars limitation
    asp_ParseStr::parse(base64_decode($_POST['asp_options_serialized']), $_POST);
    $_POST['submit_' . $search['id']] = 1;
}

?>
<link rel="stylesheet" href="<?php echo ASP_URL_NP . 'css/style.basic.css?v='.ASP_CURR_VER; ?>" />
<link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . 'settings/assets/options_search.css?v='.ASP_CURR_VER; ?>" />
<link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . 'settings/assets/search_instance.css?v='.ASP_CURR_VER; ?>" />

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=470596109688127&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div id="wpd_body_loader"><div id="wpd_loading_msg"><?php echo __('Loading...', 'ajax-search-pro'); ?></div></div>

<div id='preview'>
    <span><?php echo __('Preview', 'ajax-search-pro'); ?></span>
    <a name='refresh' class='refresh' searchid='0' href='#'><?php echo __('Refresh', 'ajax-search-pro'); ?></a>
    <a name='hide' class='maximise'><?php echo __('Show', 'ajax-search-pro'); ?></a>
    <label><?php echo __('Background:', 'ajax-search-pro'); ?> </label><input type="text" id="bgcolorpicker" value="#ffffff"/>

    <div style="text-align: center;
        margin: 11px 0 17px;
        font-size: 12px;
        color: #aaa;"><?php echo __('Please note, that some functions may not work in preview mode.<br>The first loading can take up to 15 seconds!', 'ajax-search-pro'); ?>
    </div>
    <div class='big-loading hidden'></div>
    <div class="data hidden asp_preview_data"></div>
</div>

<div id="wpd_white_fixed_bg"></div>

<div id="wpd_shortcode_modal_bg" class="wpd-modal-bg"></div>
<div id="wpd_shortcode_modal" sid="<?php echo $search['id']; ?>" class="wpd-modal hiddend">
    <h3 style="flex-wrap: wrap; flex-basis: 100%; min-width: 100%;text-align: left; margin-top: 0;margin-left: 40px;"><?php echo __('Shortcode generator', 'ajax-search-pro'); ?></h3>
    <div class="wpd-modal-close"></div>
    <div class="sortablecontainer wpd_md_col">
        <p class="descMsg"><?php echo sprintf( __('This tool is to help you generate a Column/Row based layout for the plugin. For more info on shortcodes, <a href="%s" target="_blank">check this video</a> tutorial.', 'ajax-search-pro'), 'http://wp-dreams.com/go/?to=yt-shortcodes' ); ?></p>
        <ul class="ui-sortable">
            <li item="search"><b><?php echo __('Search box', 'ajax-search-pro'); ?></b><br><label><?php echo __('Ratio:', 'ajax-search-pro'); ?> <input type="number" value="100" min="5" max="100"/>%</label><a class="deleteIcon"></a></li>
            <li item="settings" class="hiddend"><b><?php echo __('Settings box', 'ajax-search-pro'); ?></b><br><label><?php echo __('Ratio:', 'ajax-search-pro'); ?> <input type="number" value="100" min="5" max="100"/>%</label><a class="deleteIcon"></a></li>
            <li item="results" class="hiddend"><b><?php echo __('Results box', 'ajax-search-pro'); ?></b><br><label><?php echo __('Ratio:', 'ajax-search-pro'); ?> <input type="number" value="100" min="5" max="100"/>%</label><a class="deleteIcon"></a></li>
        </ul>
    </div>

    <div class="wpd_generated_shortcode wpd_md_col">
        <select style="max-width: 175px;">
            <option disabled selected><?php echo __('Pre-defined variations', 'ajax-search-pro'); ?></option>
            <option value="0,2|50,50"><?php echo __('Search/Results 50/50', 'ajax-search-pro'); ?></option>
            <option value="0,1|50,50"><?php echo __('Search/Settings 50/50', 'ajax-search-pro'); ?></option>
            <option value="0,1,2|33,33,33"><?php echo __('Search/Settings/Results in columns', 'ajax-search-pro'); ?></option>
            <option value="0,1,2|100,50,50"><?php echo __('Search/Settings/Results in 100/50/50', 'ajax-search-pro'); ?></option>
            <option value="0,1,2|50,50,100"><?php echo __('Search/Settings/Results in 50/50/100', 'ajax-search-pro'); ?></option>
        </select>
        <button item="search" disabled><< <?php echo __('Add the search box', 'ajax-search-pro'); ?></button>
        <button item="settings"><< <?php echo __('Add the settings box', 'ajax-search-pro'); ?></button>
        <button item="results"><< <?php echo __('Add the results box', 'ajax-search-pro'); ?></button>
        <p style="margin-top: 10px;"><?php echo __('<b>Copy</b> the shorcode generated:', 'ajax-search-pro'); ?><br></p><textarea>[wd_asp='search' id=1]</textarea>
    </div>
</div>
<div id="wpdreams" class='wpdreams wrap<?php echo isset($_COOKIE['asp-accessibility']) ? ' wd-accessible' : ''; ?>' style="min-width: 1280px;" data-searchid="<?php echo $_GET['asp_sid']; ?>">

    <?php if (ASP_DEBUG == 1): ?>
        <p class='infoMsg'><?php echo __('Debug mode is on!', 'ajax-search-pro'); ?></p>
    <?php endif; ?>

    <?php if (wd_asp()->o['asp_compatibility']['usecustomajaxhandler'] == 1): ?>
        <p class='noticeMsgBox'>
            <?php echo sprintf( __('NOTICE: The custom ajax handler is enabled. In case you experience issues, please <a href="%s">turn it off.</a>', 'ajax-search-pro'), get_admin_url() . "admin.php?page=asp_compatibility_settings" ); ?>
        </p>
    <?php endif; ?>

	<?php if ( wd_asp()->updates->needsUpdate() ): ?>
        <p class='infoMsgBox'>
            <?php echo sprintf( __('Version <strong>%s</strong> is available.', 'ajax-search-pro'),
                wd_asp()->updates->getVersionString() ); ?>
            <?php echo __('Download the new version from Codecanyon.', 'ajax-search-pro'); ?>
            <a target="_blank" href="https://documentation.ajaxsearchpro.com/update_notes.html">
                <?php echo __('How to update?', 'ajax-search-pro'); ?>
            </a>
        </p>
	<?php endif; ?>

    <a class='back'
       href='<?php echo get_admin_url() . "admin.php?page=asp_settings"; ?>'><?php echo __('Back to the search list', 'ajax-search-pro'); ?></a>
    <a class='statistics'
       href='<?php echo get_admin_url() . "admin.php?page=asp_statistics"; ?>'><?php echo __('Search Statistics', 'ajax-search-pro'); ?></a>
    <a class='error'
       href='<?php echo get_admin_url() . "admin.php?page=asp_compatibility_settings"; ?>'><?php echo __('Compatibility checking', 'ajax-search-pro'); ?></a>
    <a class='cache'
       href='<?php echo get_admin_url() . "admin.php?page=asp_cache_settings"; ?>'><?php echo __('Caching options', 'ajax-search-pro'); ?></a>
    <?php ob_start(); ?>
    <div class="wpdreams-box asp_b_shortcodes">
        <?php if (defined('ASL_PATH')): ?>
            <p class="errorMsg">
                <?php echo __('Warning:  <strong>Ajax Search Lite</strong> is still activated, please deactivate it to assure every PRO feature works properly.', 'ajax-search-pro'); ?>
            </p>
        <?php endif; ?>

        <div class="asp_b_shortcodes_menu">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18px" height="24px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
              <polygon transform = "rotate(90 256 256)" points="142.332,104.886 197.48,50 402.5,256 197.48,462 142.332,407.113 292.727,256 "/>
            </svg>
            <span class="asp_b_shortcodes_title"><?php echo __('Toggle shortcodes for', 'ajax-search-pro'); ?> <strong><?php echo $search['name']; ?></strong></span>
            <button id="shortcode_generator"><?php echo __('Shortcode generator', 'ajax-search-pro'); ?></button>
        </div>
        <fieldset>
            <legend><?php echo __('Simple shortcodes', 'ajax-search-pro'); ?></legend>
            <label class="shortcode"><?php echo __('Search shortcode:', 'ajax-search-pro'); ?></label>
            <input type="text" class="shortcode" value="[wpdreams_ajaxsearchpro id=<?php echo $search['id']; ?>]"
                   readonly="readonly"/>
            <label class="shortcode"><?php echo __('Search shortcode for templates:', 'ajax-search-pro'); ?></label>
            <input type="text" class="shortcode"
                   value="&lt;?php echo do_shortcode('[wpdreams_ajaxsearchpro id=<?php echo $search['id']; ?>]'); ?&gt;"
                   readonly="readonly"/>
        </fieldset>
        <fieldset>
            <legend><?php echo __('Result shortcodes', 'ajax-search-pro'); ?></legend>
            <p style='margin:19px 10px 9px;'>
                <?php echo __('Shortcodes for placing the result box elsewhere. (only works if the result layout position is <b>block</b> - see in layout options tab)', 'ajax-search-pro'); ?>
            </p>
            <label class="shortcode"><?php echo __('Result box shortcode:', 'ajax-search-pro'); ?></label>
            <input type="text" class="shortcode"
                   value="[wpdreams_ajaxsearchpro_results id=<?php echo $search['id']; ?> element='div']"
                   readonly="readonly"/>
            <label class="shortcode"><?php echo __('Result shortcode for templates:', 'ajax-search-pro'); ?></label>
            <input type="text" class="shortcode"
                   value="&lt;?php echo do_shortcode('[wpdreams_ajaxsearchpro_results id=<?php echo $search['id']; ?> element=&quot;div&quot;]'); ?&gt;"
                   readonly="readonly"/>
        </fieldset>
        <fieldset>
            <legend><?php echo __('Settings shortcodes', 'ajax-search-pro'); ?></legend>
            <p style='margin:19px 10px 9px;'>
                <?php echo __('Shortcodes for placing the settings box elsewhere.', 'ajax-search-pro'); ?>
            </p>
            <label class="shortcode"><?php echo __('Settings box shortcode:', 'ajax-search-pro'); ?></label>
            <input type="text" class="shortcode"
                   value="[wpdreams_asp_settings id=<?php echo $search['id']; ?> element='div']"
                   readonly="readonly"/>
            <label class="shortcode"><?php echo __('Shortcode for templates:', 'ajax-search-pro'); ?></label>
            <input type="text" class="shortcode"
                   value="&lt;?php echo do_shortcode('[wpdreams_asp_settings id=<?php echo $search['id']; ?> element=&quot;div&quot;]'); ?&gt;"
                   readonly="readonly"/>
        </fieldset>
        <fieldset>
            <legend><?php echo __('Two Column Shortcode', 'ajax-search-pro'); ?></legend>
            <p style='margin:19px 10px 9px;'>
                <?php echo __('Will place a search box (left) and a result box (right) next to each other, like the one on the demo front page.', 'ajax-search-pro'); ?>
            </p>
            <label class="shortcode"><?php echo __('TC shortcode:', 'ajax-search-pro'); ?></label>
            <input type="text" class="shortcode"
                   value="[wpdreams_ajaxsearchpro_two_column id=<?php echo $search['id']; ?> search_width=50 results_width=50 invert=0 element='div']"
                   readonly="readonly"/>
            <label class="shortcode"><?php echo __('TC shortcode for templates:', 'ajax-search-pro'); ?></label>
            <input type="text" class="shortcode"
                   value="&lt;?php echo do_shortcode('[wpdreams_ajaxsearchpro_two_column id=<?php echo $search['id']; ?> search_width=50 results_width=50 invert=0 element=&quot;div&quot;]'); ?&gt;"
                   readonly="readonly"/>
            <p style='margin:19px 10px 9px;'><strong><?php echo __('Extra Parameters', 'ajax-search-pro'); ?></strong></p>
            <ul style='margin:19px 10px 9px;'>
                <li><?php echo __('search_width - {integer} the search bar width (in %, not px)', 'ajax-search-pro'); ?></li>
                <li><?php echo __('results_width - {integer} the results box width (in %, not px)', 'ajax-search-pro'); ?></li>
                <li><?php echo __('invert - {0 or 1} inverts the search and results box position from left to right', 'ajax-search-pro'); ?></li>
            </ul>
        </fieldset>
    </div>

    <div style="width:100%; height: 1px; background:transparent; border: 0;"></div>

    <div class="wpdreams-box" style="float:left;">
        <?php if ( ini_get('max_input_vars') < 1000 ): ?>
        <form action='' style="display:none;" method='POST' name='asp_data_serialized'>
            <input type="hidden" id='asp_options_serialized' name='asp_options_serialized' value = "">
            <input type="submit"
                   id='asp_submit_serialized_<?php echo $search['id'] ?>'
                   name='asp_submit_serialized_<?php echo $search['id'] ?>'
                   style="display: none;">
        </form>
        <?php endif; ?>

        <form action='' method='POST' name='asp_data' autocomplete="off">
            <ul id="tabs" class='tabs'>
                <li><a tabid="1" class='current general'><?php echo __('General Options', 'ajax-search-pro'); ?></a></li>
                <li><a tabid="2" class='multisite'><?php echo __('Multisite Options', 'ajax-search-pro'); ?></a></li>
                <li><a tabid="3" class='frontend'><?php echo __('Frontend Search Settings', 'ajax-search-pro'); ?></a></li>
                <li><a tabid="4" class='layout'><?php echo __('Layout options', 'ajax-search-pro'); ?></a></li>
                <li><a tabid="5" class='autocomplete'><?php echo __('Autocomplete & Suggestions', 'ajax-search-pro'); ?></a></li>
                <li><a tabid="6" class='theme'><?php echo __('Theme & Styling', 'ajax-search-pro'); ?></a></li>
                <li><a tabid="8" class='advanced'><?php echo __('Relevance options', 'ajax-search-pro'); ?></a></li>
                <li><a tabid="7" class='advanced'><?php echo __('Advanced options', 'ajax-search-pro'); ?></a></li>
            </ul>
            <div class='tabscontent'>
                <div tabid="1">
                    <fieldset>
                        <legend><?php echo __('Genearal Options', 'ajax-search-pro'); ?></legend>

                        <?php include(ASP_PATH . "backend/tabs/instance/general_options.php"); ?>

                    </fieldset>
                </div>
                <div tabid="2">
                    <fieldset>
                        <legend><?php echo __('Multisite Options', 'ajax-search-pro'); ?></legend>

                        <?php include(ASP_PATH . "backend/tabs/instance/multisite_options.php"); ?>

                    </fieldset>
                </div>
                <div tabid="3">
                    <fieldset>
                        <legend><?php echo __('Frontend Search Settings options', 'ajax-search-pro'); ?></legend>

                        <?php include(ASP_PATH . "backend/tabs/instance/frontend_options.php"); ?>

                    </fieldset>
                </div>
                <div tabid="4">
                    <fieldset>
                        <legend><?php echo __('Layout Options', 'ajax-search-pro'); ?></legend>

                        <?php include(ASP_PATH . "backend/tabs/instance/layout_options.php"); ?>

                    </fieldset>
                </div>
                <div tabid="5">
                    <fieldset>
                        <legend><?php echo __('Autocomplete & Suggestions', 'ajax-search-pro'); ?></legend>

                        <?php include(ASP_PATH . "backend/tabs/instance/autocomplete_options.php"); ?>

                    </fieldset>
                </div>
                <div tabid="6">
                    <fieldset>
                        <legend><?php echo __('Theme & Styling Options', 'ajax-search-pro'); ?></legend>

                        <?php include(ASP_PATH . "backend/tabs/instance/theme_options.php"); ?>

                    </fieldset>
                </div>
                <div tabid="8">
                    <fieldset>
                        <legend><?php echo __('Relevance Options', 'ajax-search-pro'); ?></legend>

                        <?php include(ASP_PATH . "backend/tabs/instance/relevance_options.php"); ?>

                    </fieldset>
                </div>
                <div tabid="7">
                    <fieldset>
                        <legend><?php echo __('Advanced Options', 'ajax-search-pro'); ?></legend>

                        <?php include(ASP_PATH . "backend/tabs/instance/advanced_options.php"); ?>

                    </fieldset>
                </div>
                <div tabid="loader">
                    <p><?php echo __('Loading...', 'ajax-search-pro'); ?></p>
                </div>
            </div>
            <input type="hidden" name="sett_tabid" id="sett_tabid" value="1" />
            <input type="hidden" name="asp_sett_nonce" id="asp_sett_nonce" value="<?php echo wp_create_nonce( "asp_sett_nonce" ); ?>">
        </form>
    </div>

    <div id="asp-options-search">
        <a class="wd-accessible-switch" href="#"><?php echo isset($_COOKIE['asp-accessibility']) ?
        __('DISABLE ACCESSIBILITY', 'ajax-search-pro') :
        __('ENABLE ACCESSIBILITY', 'ajax-search-pro'); ?></a><br>
        <label>Can't find an option?</label>
        <input type="text" value="" id="asp-os-input" placeholder="<?php echo esc_attr__('Search in options', 'ajax-search-pro'); ?>">
        <div id="asp-os-results"></div>
        <div class="asp-back-help">
            <label><?php echo __('Need help?', 'ajax-search-pro'); ?></label><br>
            <span><?php echo sprintf( __('Check the <a href="%s">Help & Updates</a> menu for resources.', 'ajax-search-pro'), get_admin_url() . "admin.php?page=asp_updates_help" ); ?></span>
        </div>
        <div class="asp-back-social">
            <label><?php echo __('Show us some love', 'ajax-search-pro'); ?> &#10084;</label><br>
            <a id="asp_tw_share" class="asp_tw_share" data-text="<?php echo esc_attr__('Replace your #WordPress search bar with a powerful live search', 'ajax-search-pro'); ?>" href="https://twitter.com/ernest_marcinko"><?php echo __('Tweet', 'ajax-search-pro'); ?></a>
            <a id="asp_fb_share" class="asp_fb_share" href="https://www.facebook.com/wpdreams/"><?php echo __('Share', 'ajax-search-pro'); ?></a>
            <a class="asp_tw_share" target="_blank" href="https://twitter.com/ernest_marcinko"><?php echo __('Follow', 'ajax-search-pro'); ?></a>
            <a class="asp_fb_share" target="_blank" href="https://www.facebook.com/wpdreams/"><?php echo __('Like', 'ajax-search-pro'); ?></a>
        </div>
    </div>

    <?php $output = ob_get_clean(); ?>
    <?php
    if ( isset($_POST['submit_' . $search['id']]) ) {
        $params = wpdreams_parse_params($_POST);

        wd_asp()->instances->update($search['id'], $params);

        $style = $params;
        $id = $search['id'];

        asp_generate_the_css();

        // Clear all the cache just in case
        $ch = new WD_ASP_Deletecache_Handler();
        $ch->handle(false);

        // Do not clear cookies here, it might cause an error
        // WD_ASP_Cookies_Action::forceUnsetCookies();

        echo "<div class='successMsg'>Search settings saved!</div>";
    }
    if ( isset($_reset_success) ) {
        if ( $_reset_success ) {
            wd_asp()->instances->reset($search['id']);

            asp_generate_the_css();
            $ch = new WD_ASP_Deletecache_Handler();
            $ch->handle(false);

            // Do not clear cookies here, it might cause an error
            // WD_ASP_Cookies_Action::forceUnsetCookies();

            echo "<div class='successMsg'>" . __('Search settings were reset to defaults!', 'ajax-search-pro') . "</div>";
        } else {
            echo "<div class='errorMsg'>" . __('<strong>ERROR:</strong> Something went wrong during the reset, please try again!', 'ajax-search-pro') . "</div>";
        }
    }
    echo $output;
    ?>
    <div class="clear"></div>
</div>

<?php
$media_query = ASP_DEBUG == 1 ? asp_gen_rnd_str() : get_option("asp_media_query", "defn");
// This needs to be enqueued first, so the node actions are attached, otherwise they will not work
// @TODO 4.10.5
/*wp_enqueue_script('wpd-backend-instant', plugin_dir_url(__FILE__) . 'settings/assets/instant_actions.js', array(
    'jquery'
), $media_query, true);
wp_enqueue_script('wpd-backend-instance', plugin_dir_url(__FILE__) . 'settings/assets/search_instance.js', array(
    'wpd-backend-instant'
), $media_query, true);
*/
// TODO 4.10.5 remove this, and use the one above
wp_enqueue_script('wpd-backend-instance', plugin_dir_url(__FILE__) . 'settings/assets/search_instance.js', array(
    'jquery'
), $media_query, true);
wp_enqueue_script('wpd-backend-options-search', plugin_dir_url(__FILE__) . 'settings/assets/option_search.js', array(
    'jquery'
), $media_query, true);