<?php

/**
 * Tabs Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'tabs-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$className = 'tabs block ';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$title = get_field('tabs_block_title');
$background_color = get_field('tabs_background_color');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="block-inner">

        <div class="row tabs-heading">
            <div class="columns">
                <?php if ($title) { ?>
                    <h2><?php echo $title; ?></h2>
                <?php } ?>
            </div>
        </div>

        <?php if (have_rows('tabs')) :
            $count = 0;
        ?>
            <div class="row tabs-filter">
                <?php while (have_rows('tabs')) : the_row();
                    $icon_path = get_template_directory_uri() . '/static-assets/icons/' . get_sub_field('tab_icon') . '.svg';
                    $tab_label_option = get_sub_field('tab_label_option');
                    $tab_label = get_sub_field('tab_label');
                ?>

                    <div class="columns">
                        <span class="icon tab-link <?php echo ($count === 0 ? 'is-active' : ''); ?>">

                            <?php if ($tab_label_option == 'text') {
                                      echo $tab_label;
                                  } else { ?>
                                      <img src="<?php echo $icon_path; ?>" alt="Step <?php echo $count + 1; ?>" role="img">
                            <?php } ?>

                        </span>
                    </div>

                <?php
                    $count++;
                endwhile; ?>
            </div>

        <?php endif; ?>


        <?php if (have_rows('tabs')) :
            $contentcount = 0;
        ?>

            <div class="row tabs-list">
                <?php while (have_rows('tabs')) : the_row();

                    $tab_label_option = get_sub_field('tab_label_option');
                    if ($tab_label_option !== 'text') {
                        $icon_path = get_template_directory() . '/static-assets/icons/' . get_sub_field('tab_icon') . '.svg';
                    }

                    $tab_media_option = get_sub_field('tab_media_option');
                    $tab_media_img = get_sub_field('tab_image');
                    $tab_title = get_sub_field('tab_title');
                    $tab_button_option = get_sub_field('tab_button_option');
                    $tab_button_link = get_sub_field('tab_button_link');

                    if ($tab_media_option !== 'image') {
                        $tab_media_video = get_sub_field('tab_video');
                    }
                ?>

                    <div class="columns small-12 tab <?php echo ($contentcount === 0 ? 'is-active' : ''); ?>">

                        <div class="row">

                            <div class="columns <?php if ($tab_label_option == 'icon') { ?>small-12 medium-4<?php } ?> tab-content">

                                <div class="tab-icon icon-text-group">
                                  <?php
                                    if ($tab_title) {
                                        echo '<h2>' . $tab_title . '</h2>';
                                    }

                                    if ($tab_label_option == 'icon') {
                                        echo file_get_contents($icon_path);
                                    }
                                  ?>
                                </div>

                                <?php if (have_rows('tab_content')) :
                                    $t = 0;
                                ?>

                                    <ol>
                                        <?php while (have_rows('tab_content')) : the_row();
                                            $t++ ?>
                                            <li>
                                                <span><?php /* echo $t; */ ?></span>
                                                <?php the_sub_field('content'); ?>
                                            </li>
                                        <?php endwhile; ?>
                                    </ol>

                                <?php endif; ?>

                                <?php if ($tab_button_option == 'yes') { ?>
                                    <a href="<?php echo $tab_button_link['url']; ?>" class="button"><?php echo $tab_button_link['title']; ?></a>
                                <?php } ?>

                            </div>


                            <?php if ($tab_media_option === 'image') { ?>
                                <div class="columns small-12 medium-8 tab-media bg-image" style="background-image:url('<?php echo $tab_media_img['sizes']['medium-large']; ?>');"></div>
                            <?php } elseif ($tab_media_option === 'video') { ?>
                                <div class="columns small-12 medium-8 tab-media video">
                                    <video autoplay muted loop playsinline poster="<?php echo $tab_media_img['url']; ?>">
                                        <source src="<?php echo $tab_media_video['url']; ?>" type="video/mp4">
                                    </video>
                                </div>
                            <?php } else { ?>

                            <?php } ?>

                        </div>


                    </div>
                <?php
                    $contentcount++;
                endwhile; ?>
            </div><!-- END .row.tabs-list -->

        <?php endif; ?>
    </div><!-- END .block-inner -->

    <style type="text/css">
        #<?php echo $id; ?> {
            background: <?php echo $background_color; ?>;
        }
    </style>

</div>
