<?php $collaborators = get_field('collaborators'); ?>
<?php $funders = get_field('funders'); ?>

<?php if ( $collaborators || $funders ): ?>
    <section id="project-sponsors" class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 bg-white pb6">
                    <div class="row">
                        <?php if ( count( $collaborators ) > 0 && count( $funders ) > 0 ) : ?>

                            <div class="col-xs-offset-1 col-xs-5">
                                <div class="projects-rule"></div>
                                <h4 class="mb2">Funders</h4>
                                <ul>
                                    <?php foreach ( $funders as $i => $funder ): ?>
                                        <li>
                                            <?php if ( $funder['funder_link']): ?>
                                                <a target="_blank" href="<?php echo $funder['funder_link']['url']; ?>">
                                                <?php endif; ?>
                                                <span class="uppercase bold"><?php echo $funder['funder_name']; ?></span>
                                            <?php if ( $funder['funder_link']): ?>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="col-xs-5">
                                <div class="projects-rule"></div>
                                <h4 class="mb2">Collaborators</h4>
                                <ul>
                                    <?php foreach ( $collaborators as $i => $collaborators ): ?>
                                        <li>
                                            <?php if ( $collaborators['collaborator_link']): ?>
                                                <a target="_blank" href="<?php echo $collaborators['collaborator_link']['url']; ?>">
                                                <?php endif; ?>
                                                <span class="uppercase bold"><?php echo $collaborators['collaborator_name']; ?></span>
                                            <?php if ( $funder['collaborator_link']): ?>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                        <?php elseif ( count( $collaborators ) > 0 ): ?>

                            <div class="col-xs-offset-1 col-xs-9">
                                <div class="projects-rule"></div>
                                <h4 class="mb2">Collaborators</h4>
                                <ul>
                                    <?php foreach ( $collaborators as $i => $collaborators ): ?>
                                        <li>
                                            <?php if ( $collaborators['collaborator_link']): ?>
                                                <a target="_blank" href="<?php echo $collaborators['collaborator_link']['url']; ?>">
                                                <?php endif; ?>
                                                <span class="uppercase bold"><?php echo $collaborators['collaborator_name']; ?></span>
                                            <?php if ( $funder['collaborator_link']): ?>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                        <?php else: ?>

                            <div class="col-xs-offset-1 col-xs-9">
                                <div class="projects-rule"></div>
                                <h4 class="mb2">Funders</h4>
                                <ul>
                                    <?php foreach ( $funders as $i => $funder ): ?>
                                        <li>
                                            <?php if ( $funder['funder_link']): ?>
                                                <a target="_blank" href="<?php echo $funder['funder_link']['url']; ?>">
                                                <?php endif; ?>
                                                <span class="uppercase bold"><?php echo $funder['funder_name']; ?></span>
                                            <?php if ( $funder['funder_link']): ?>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
