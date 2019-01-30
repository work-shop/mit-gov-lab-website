<div class="filter-module mb1">

    <div class="filter-taxonomy-label mb1">
        <h5 class="uppercase bold brand">Filter by Research Topic</h5>
    </div>

    <ul class="filter-menu">
        <li class="filter-button sort-key active" data-sort-key=" ">
                All
        </li>

        <?php $research_topics = get_terms('research-topics', array('hide_empty' => true)); ?>

        <?php foreach ($research_topics as $research_topic): ?>
            <li class="filter-button sort-key" data-sort-key="<?php echo $research_topic->slug; ?>">
                    <?php echo $research_topic->name; ?>
            </li>
        <?php endforeach; ?>

    </ul>

</div>
