<?php
$prev = get_adjacent_post(false, '', true); // Get the previous post
$next = get_adjacent_post(false, '', false); // Get the next post
?>
<?php if (!empty($prev) || !empty($next)) : ?>
    <div class="row mb-110">
        <div class="col-lg-12">
            <div class="details-navigation">
                <?php if (!empty($prev)) : ?>
                    <div class="single-navigation">
                        <a href="<?php echo get_permalink($prev->ID); ?>" class="nav-btn">
                            <div class="arrow">
                                <svg width="16" height="13" viewBox="0 0 16 13" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.58563 6.98704L15.7913 6.98738L15.7913 6.01295L2.58563 6.0133L7.15096 1.44797L6.46232 0.75933L0.72148 6.50017L6.46232 12.241L7.15096 11.5524L2.58563 6.98704Z" stroke-width="0.3" />
                                </svg>
                            </div>
                            <?php echo esc_html__('Previous Post', 'gofly'); ?>
                        </a>
                        <div class="content">
                            <h6><a href="<?php echo get_permalink($prev->ID); ?>"><?php echo get_the_title($prev->ID); ?></a></h6>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($next)) : ?>
                    <div class="single-navigation two text-end">
                        <div class="content">
                            <h6><a href="<?php echo get_permalink($next->ID); ?>"><?php echo get_the_title($next->ID); ?></a></h6>
                        </div>
                        <a href="<?php echo get_permalink($next->ID); ?>" class="nav-btn">
                            <?php echo esc_html__('Next Post', 'gofly'); ?>
                            <div class="arrow">
                                <svg width="16" height="13" viewBox="0 0 16 13" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4144 6.01333L0.208692 6.01299L0.208692 6.98741L13.4144 6.98707L8.84904 11.5524L9.53768 12.241L15.2785 6.5002L9.53768 0.759362L8.84904 1.448L13.4144 6.01333Z" stroke-width="0.3" />
                                </svg>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>