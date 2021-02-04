<?php
$opt = get_option('filix_opt');
$is_menu_btn = isset($opt['is_menu_btn']) ? $opt['is_menu_btn'] : '';
?>
<header class="header header_style_one">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">

                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand sticky-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php filix_logo(); ?>
                    </a>
                    <?php if ( has_nav_menu('main-menu') ) : ?>
                        <button class="navbar-toggler hamburger" type="button" data-toggle="collapse" data-target="#header_menu" aria-expanded="false">
                            <span class="bar_icon">
                                <span class="bar bar_1"></span>
                                <span class="bar bar_2"></span>
                                <span class="bar bar_3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse header_menu mb_hide" id="header_menu">
                            <?php
                            wp_nav_menu( array (
                                'theme_location'    => 'main-menu',
                                'depth'             => 2,
                                'container'         => false,
                                'menu_class'        => 'navbar-nav ml-auto',
                                'walker'            => new Filix_Nav_Walker_Two()
                            ));
                            ?>
                            <?php if ( $is_menu_btn == '1' ) : ?>
                                <a class="filix_action_btn" href="<?php echo esc_url($opt['menu_btn_url']) ?>">
                                    <?php echo !empty($opt['menu_btn_label']) ? esc_html( $opt['menu_btn_label'] ) : ''; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="opnen_menu">
                            <div class="header_main_menu header_menu">
                                <?php
                                wp_nav_menu( array (
                                    'theme_location'    => 'main-menu',
                                    'depth'             => 2,
                                    'container'         => false,
                                    'menu_class'        => 'menu_item',
                                    'walker'            => new Filix_Nav_Walker()
                                ));
                                ?>
                                <?php if ( $is_menu_btn == '1' ) : ?>
                                    <a class="filix_action_btn mobile_menu" href="<?php echo esc_url($opt['menu_btn_url']) ?>">
                                        <?php echo !empty($opt['menu_btn_label']) ? esc_html( $opt['menu_btn_label'] ) : ''; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </div>
</header>