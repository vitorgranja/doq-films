<section class="hero_warp">
    <div class="container">
        <div class="row d-flex align-items-center height_vh">
            <div class="col-md-12 col-12">
                <div class="banner_content">
                    <?php if (!empty($settings['title_text'])) : ?>
                        <h1 class="banner_title"> <?php echo htmlspecialchars_decode(esc_html($settings['title_text'])); ?> </h1>
                    <?php endif; ?>
                    <ul class="exp_list">
                        <?php
                        if( !empty($settings['words']) ) {
                            foreach ($settings['words'] as $i => $word) {
                                $i = $i + 1; ?>
                                <li class="wow fadeInUp" data-wow-duration="<?php echo $i; ?>s">
                                    <?php echo esc_html( $word['title'] ) ?>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <ul class="social_link">
        <?php if(!empty($settings['f_link']['url'])) : ?>
            <li>
                <a href="<?php echo esc_url($settings['f_link']['url']); ?>" <?php filix_is_external($settings['f_link']); filix_is_nofollow($settings['f_link']); ?>>
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php if(!empty($settings['t_link']['url'])) : ?>
            <li>
                <a href="<?php echo esc_url($settings['t_link']['url']); ?>" <?php filix_is_external($settings['t_link']); filix_is_nofollow($settings['t_link']); ?>>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php if(!empty($settings['be_link']['url'])) : ?>
            <li>
                <a href="<?php echo esc_url($settings['be_link']['url']); ?>" <?php filix_is_external($settings['be_link']); filix_is_nofollow($settings['be_link']); ?>>
                    <i class="fa fa-behance" aria-hidden="true"></i>
                    <i class="fa fa-behance" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php if(!empty($settings['in_link']['url'])) : ?>
            <li>
                <a href="<?php echo esc_url($settings['in_link']['url']); ?>" <?php filix_is_external($settings['in_link']); filix_is_nofollow($settings['in_link']); ?>>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php if(!empty($settings['linkedin_link']['url'])) : ?>
            <li>
                <a href="<?php echo esc_url($settings['linkedin_link']['url']); ?>" <?php filix_is_external($settings['linkedin_link']); filix_is_nofollow($settings['linkedin_link']); ?>>
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php if(!empty($settings['git_link']['url'])) : ?>
            <li>
                <a href="<?php echo esc_url($settings['git_link']['url']); ?>" <?php filix_is_external($settings['git_link']); filix_is_nofollow($settings['git_link']); ?>>
                    <i class="fa fa-github" aria-hidden="true"></i>
                    <i class="fa fa-github" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php if(!empty($settings['d_link']['url'])) : ?>
            <li>
                <a href="<?php echo esc_url($settings['d_link']['url']); ?>" <?php filix_is_external($settings['d_link']); filix_is_nofollow($settings['d_link']); ?>>
                    <i class="fa fa-dribbble" aria-hidden="true"></i>
                    <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php if(!empty($settings['pin_link']['url'])) : ?>
            <li>
                <a href="<?php echo esc_url($settings['pin_link']['url']); ?>" <?php filix_is_external($settings['pin_link']); filix_is_nofollow($settings['pin_link']); ?>>
                    <i class="fa fa-pinterest" aria-hidden="true"></i>
                    <i class="fa fa-pinterest" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php if(!empty($settings['y_link']['url'])) : ?>
            <li>
                <a href="<?php echo esc_url($settings['y_link']['url']); ?>" <?php filix_is_external($settings['y_link']); filix_is_nofollow($settings['y_link']); ?>>
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php if(!empty($settings['qq_link']['url'])) : ?>
            <li>
                <a href="<?php echo esc_url($settings['qq_link']['url']); ?>" <?php filix_is_external($settings['qq_link']); filix_is_nofollow($settings['qq_link']); ?>>
                    <i class="fa fa-qq" aria-hidden="true"></i>
                    <i class="fa fa-qq" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif; ?>

    </ul>
    <?php if(!empty($settings['scroll_title_text']) && $settings['scroll_link'] != '') : ?>
        <div class="scroll_down">
            <a href="<?php echo esc_html( $settings['scroll_link'] ) ?>"><?php echo esc_html( $settings['scroll_title_text'] ) ?></a>
        </div>
    <?php endif; ?>
</section>
<div class="height_vh dark_bg"></div>