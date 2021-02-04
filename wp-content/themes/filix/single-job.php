<?php
get_header();
$opt = get_option('filix_opt');
?>

<section class="job_details_area sec_pad">
    <div class="container">
        <div class="row flex-row-reverse">
            <?php if (have_rows('job_attributes')): ?>
                <div class="col-lg-4 pl_70">
                    <div class="job_info">
                        <?php if(get_field('attribute_section_title')) : ?>
                            <div class="info_head">
                                <?php if(get_field('attribute_icon')) : ?>
                                    <i class="<?php echo esc_attr(get_field('attribute_icon')) ?>"></i>
                                <?php endif; ?>
                                <h6 class="f_p f_600 f_size_18 t_color3"> <?php echo esc_html(get_field('attribute_section_title')) ?> </h6>
                            </div>
                        <?php endif; ?>
                        <?php
                        while (have_rows('job_attributes')) : the_row();
                            ?>
                            <div class="info_item">
                                <?php if(get_sub_field('attribute_icon')) : ?>
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
            <?php endif; ?>

            <div class="col-lg-8">
                <div class="details_content">
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
                <form action="<?php echo get_permalink(filix_get_page_template_id()).'?id='.get_the_ID(); ?>" method="post">
                    <button type="submit" name="apply" class="btn_three btn_hover"> <?php esc_html_e('Apply Now', 'filix') ?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();