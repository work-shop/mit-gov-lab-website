<?php $people = get_posts( array(
    'posts_per_page' => -1,
    'post_type' => 'people'
) ); ?>
<?php $research = get_posts( array(
    'posts_per_page' => -1,
    'post_type' => 'research'
) ); ?>
<?php $updates = get_posts( array(
    'posts_per_page' => -1,
    'post_type' => 'updates'
) ); ?>
<?php $results = get_posts( array(
    'posts_per_page' => -1,
    'post_type' => 'results'
) ); ?>

{ "items": {

    <?php foreach ($people as $item) {

        echo '"' . get_field('webhook_id', $item->ID) .  '": ' . $item->ID . ',' . "\n";

    } ?>

    <?php foreach ($research as $item) {

        echo '"' . get_field('webhook_id', $item->ID) .  '": ' . $item->ID . ',' . "\n";

    } ?>

    <?php foreach ($updates as $item) {

        echo '"' . get_field('webhook_id', $item->ID) .  '": ' . $item->ID . ',' . "\n";

    } ?>

    <?php foreach ($results as $item) {

        echo '"' . get_field('webhook_id', $item->ID) .  '": ' . $item->ID . ',' . "\n";

    } ?>

} }
