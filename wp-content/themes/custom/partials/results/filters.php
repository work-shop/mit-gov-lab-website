<div class="filter-module mb1">

    <div class="filter-taxonomy-label mb1">
        <h5 class="uppercase bold brand">Filter by Result Type</h5>
    </div>

    <ul class="filter-menu">
        <li class="filter-button sort-key active" data-sort-key=" ">
                All
        </li>

        <?php $result_types = get_terms('result-type', array('hide_empty' => true)); ?>

        <?php foreach ($result_types as $result_type): ?>
            <li class="filter-button sort-key" data-sort-key="<?php echo $result_type->slug; ?>">
                    <?php echo $result_type->name; ?>
            </li>
        <?php endforeach; ?>

    </ul>

</div>
