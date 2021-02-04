<?php
/**
 * Template Name: Job Application Form
 */
get_header();

$job = new WP_Query(
    array(
        'post_type' => 'job',
        'posts_per_page' => -1,
        'p' => !empty($_GET['id']) ? $_GET['id'] : ''
    )
);
$opt = get_option('filix_opt');
$column = !empty($_GET['id']) ? '8' : '12';
?>

    <section class="job_apply_area sec_pad">
        <div class="container">
            <div class="row flex-row-reverse">
                <?php
                if(!empty($_GET['id'])) {
                    while ($job->have_posts()) : $job->the_post();
                        if (have_rows('job_attributes')): ?>
                            <div class="col-lg-4 pl_70">
                                <div class="job_info">
                                    <?php
                                    if (get_field('attribute_section_title')) : ?>
                                        <div class="info_head">
                                            <?php if (get_field('attribute_section_icon')) : ?>
                                                <i class="<?php echo esc_html(get_field('attribute_section_icon')) ?>"></i>
                                            <?php endif; ?>
                                            <h6 class="f_p f_600 f_size_18 t_color3"> <?php echo esc_html(get_field('attribute_section_title')) ?> </h6>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                    while (have_rows('job_attributes')) : the_row();
                                        ?>
                                        <div class="info_item">
                                            <?php if (get_sub_field('attribute_icon')) : ?>
                                                <i class="<?php echo esc_attr(get_sub_field('attribute_icon')) ?>"></i>
                                            <?php endif; ?>
                                            <h6> <?php echo esc_html(get_sub_field('attribute_title')) ?> </h6>
                                            <p> <?php echo esc_html(get_sub_field('attribute_value')); ?> </p>
                                        </div>
                                    <?php
                                    endwhile;
                                    ?>
                                </div>
                            </div>
                        <?php
                        endif;
                    endwhile;
                }
                ?>
                <div class="col-lg-<?php echo esc_attr($column); ?>">
                    <div class="job_apply">
                        <div class="sec_title mb_70">
                            <?php echo !empty($opt['before_form']) ? wp_kses_post($opt['before_form']) : ''; ?>
                        </div>
                        <?php echo !empty($opt['apply_form_shortcode']) ? do_shortcode($opt['apply_form_shortcode']) : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>



<?php
get_footer();