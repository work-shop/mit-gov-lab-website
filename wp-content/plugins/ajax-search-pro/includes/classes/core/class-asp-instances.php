<?php
/* Prevent direct access */
defined('ABSPATH') or die("You can't access this file directly.");

/**
 * Class WD_ASP_Instances
 *
 * This class handles the data transfer between code and instance data
 *
 * @class         WD_ASP_Instances
 * @version       1.0
 * @package       AjaxSearchPro/Classes/Core
 * @category      Class
 * @author        Ernest Marcinko
 */
class WD_ASP_Instances {

    /**
     * Core singleton class
     * @var WD_ASP_Instances self
     */
    private static $_instance;

    /**
     * This holds the search instances
     *
     * @var array()
     */
    private $instances;

    /**
     * This holds the search instances without data
     *
     * @var array()
     */
    private $instancesNoData;

    /**
     * When updating or first demand, this variable sets to true, telling that instances need re-parsing
     *
     * @var bool
     */
    private $refresh = true;

    /**
     * Gets the search instance if exists
     *
     * @param int $id
     * @param bool $force_refresh
     * @param bool|int $check_ownership
     * @return bool|array
     */
    public function get( $id = -1, $force_refresh = false, $check_ownership = false ) {
        if ($this->refresh || $force_refresh) {
            $this->init();
            $this->refresh = false;
        }

        if ( $check_ownership !== false && !is_super_admin() ) {
            if ( is_int($check_ownership) ) {
                $user_id = $check_ownership;
            } else  {
                $user_id = intval( get_current_user_id() );
            }
            foreach ($this->instances as $key => $inst) {
                if ( $inst['data']['owner'] != 0 && $inst['data']['owner'] != $user_id )
                    unset($this->instances[$key]);
            }
        }

        if ($id > -1)
            return isset($this->instances[$id]) ? $this->instances[$id] : array();

        return $this->instances;
    }

    /**
     * Temporary changes the search instance data within the cache variable (not permanent)
     *
     * @param int $id
     * @param array $data
     * @return bool|array
     */
    public function set( $id = 0, $data = array() ) {
        if ($this->refresh) {
            $this->init();
            $this->refresh = false;
        }
        if ( isset($this->instances[$id]) ) {
            $this->instances[$id]['data'] = array_merge($this->instances[$id]['data'], $data);
            return true;
        }
        return false;
    }

    /**
     * Gets the search instance if exists, without data
     *
     * @param int $id
     * @param bool $force_refresh
     * @return bool|array
     */
    public function getWithoutData( $id = -1, $force_refresh = false ) {
        if ($this->refresh || $force_refresh) {
            $this->init();
            $this->refresh = false;
        }
        if ($id > -1)
            return isset($this->instancesNoData[$id]) ? $this->instancesNoData[$id] : array();

        return $this->instancesNoData;
    }

    /**
     * Checks if the given search instance exists
     *
     * @param $id
     * @return bool
     */
    public function exists( $id ) {
        if ($this->refresh) {
            $this->init();
            $this->refresh = false;
        }
        return isset($this->instances[$id]);
    }

    /**
     * Create a new search instance with the default options set
     *
     * @param $name
     * @param int $owner User ID of the owner
     * @return bool|int
     */
    public function add( $name, $owner = 0 ) {
        global $wpdb;

        $this->refresh = true;
        $data = wd_asp()->options['asp_defaults'];
        $data['owner'] = intval($owner);

        if (
            $wpdb->query(
                "INSERT INTO " . wd_asp()->db->table('main') . "
                            (name, data) VALUES
                            ('" . esc_sql($name) . "', '" . wd_mysql_escape_mimic(json_encode($data)) . "')"
            ) !== false
        ) return $wpdb->insert_id;

        return false;
    }

    /**
     * Update the search data
     *
     * @param $id
     * @param $data
     * @param $update_owner bool|int
     * @return false|int
     */
    public function update( $id, $data = array(), $update_owner = false ) {
        global $wpdb;

        $this->refresh = true;

        if ( isset($this->instances[$id], $this->instances[$id]['data']) )
            $data = array_merge($this->instances[$id]['data'], $data);
        $data = $this->clearData($data);

        if ( $update_owner === true ) {
            $data['owner'] = intval( get_current_user_id() );
        } else if ( $update_owner !== false ) {
            $update_owner = intval($update_owner);
            if ( $update_owner >= 0 )
                $data['owner'] = $update_owner;
        }

        return $wpdb->query("
            UPDATE " . wd_asp()->db->table('main') . "
            SET data = '" . wd_mysql_escape_mimic(json_encode($data)) . "'
            WHERE id = " . $id . "
        ");
    }

    /**
     * Renames a search instance
     *
     * @param $new_name string
     * @param $id int
     * @return bool|int
     */
    public function rename( $new_name, $id ) {
        global $wpdb;

        $this->refresh = true;

        return $wpdb->query(
            $wpdb->prepare("UPDATE " . wd_asp()->db->table('main') . " SET name = '%s' WHERE id = %d", $new_name, $id)
        );
    }

    /**
     * Resets the search instance to the default options.
     *
     * @param int $id Search instance ID
     */
    public function reset($id) {
        global $wpdb;
        $this->refresh = true;
        $id = $id + 0;

        $query = "UPDATE " . wd_asp()->db->table('main') . "
             SET
                data='" . wd_mysql_escape_mimic(json_encode(wd_asp()->options['asp_defaults'])) . "'
             WHERE id=" . $id;
        $wpdb->query($query);
    }

    /**
     * Duplicates a search instance
     *
     * @param $id int
     * @return bool|int
     */
    public function duplicate( $id ) {
        global $wpdb;

        $this->refresh = true;

        return $wpdb->query(
            $wpdb->prepare("
            INSERT INTO " . wd_asp()->db->table('main') . "( name, data )
            SELECT CONCAT(name, ' duplicate'), data FROM " . wd_asp()->db->table('main') . "
            WHERE id=%d;"
                , $id)
        );
    }

    /**
     * Deletes a search instance
     *
     * @param $id int
     * @return bool|int
     */
    public function delete( $id ) {
        global $wpdb;

        $this->refresh = true;

        return $wpdb->query(
            $wpdb->prepare("DELETE FROM " . wd_asp()->db->table('main') . " WHERE id=%d", $id)
        );
    }

    /**
     * This method is intended to use on params AFTER parsed from the database
     *
     * @param $params
     * @return mixed
     */
    public function decode_params( $params ) {
        /**
         * New method for future use.
         * Detects if there is a _decode_ prefixed input for the current field.
         * If so, then decodes and overrides the posted value.
         */
        foreach ($params as $k=>$v) {
            if (gettype($v) === "string" && substr($v, 0, strlen('_decode_')) == '_decode_') {
                $real_v = substr($v, strlen('_decode_'));
                $params[$k] = json_decode(base64_decode($real_v), true);
            }
        }
        return $params;
    }

    // ------------------------------------------------------------
    //       ---------------- PRIVATE --------------------
    // ------------------------------------------------------------

    /**
     * Just calls init
     */
    private function __construct() {}

    /**
     * Clears unwanted keys from the search instance data array
     *
     * @param $data array
     * @return array
     */
    private function clearData($data ) {
        $remove_keys = array('asp_options_serialized');

        if ( is_array($data) ) {
            foreach ($remove_keys as $key) {
                if ( isset($data[$key]) )
                    unset($data[$key]);
            }
        }

        return $data;
    }

    /**
     * Fetches the search instances from the DB and stores them internally for future use
     */
    private function init() {
        global $wpdb;

        // Reset both variables, so in case of deleting no remains are left
        $this->instances = array();
        $this->instancesNoData = array();

        if ( !wd_asp()->db->exists('main') )
            return;

        $instances = $wpdb->get_results("SELECT * FROM ". wd_asp()->db->table('main'), ARRAY_A);

        foreach ($instances as $k => $instance) {
            $this->instancesNoData[$instance['id']] = array(
                "name" => $instance['name'],
                "id" => $instance['id']
            );

            $this->instances[$instance['id']] = $instance;
             /**
             * Explanation:
             *  1. json_decode(..) -> converts the params from the database to PHP format
             *  2. $this->decode_params(..) -> decodes params that are stored in base64 and prefixed to be decoded
             *
             * This is not equivalent with wd_parse_params(..) as that runs before inserting to the DB as well,
             * and $this->decode_params(..) runs after getting the data from the database, so it stays redundant.
              *
              * NOTE:
              *  raw_data is used in backwards compatibility checks, to see if a certain option exists before merging
              *           with the defaults
             */
            $this->instances[$instance['id']]['raw_data'] = $this->decode_params(json_decode($instance['data'], true));
            $this->instances[$instance['id']]['data'] = array_merge(
                wd_asp()->options['asp_defaults'],
                $this->instances[$instance['id']]['raw_data']
            );

            $this->instances[$instance['id']]['data'] = apply_filters("asp_instance_options", $this->instances[$instance['id']]['data'], $instance['id']);
        }
    }

    // ------------------------------------------------------------
    //   ---------------- SINGLETON SPECIFIC --------------------
    // ------------------------------------------------------------

    /**
     * Get the instance of self
     *
     * @return self
     */
    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}