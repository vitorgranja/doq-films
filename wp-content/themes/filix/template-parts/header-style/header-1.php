<?php
$opt = get_option('filix_opt');
?>
<!-- start header -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <nav class="navbar">
                    <a class="navbar-brand logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php filix_logo(); ?>
                    </a>
                    <?php if( has_nav_menu('main-menu') ) : ?>
                        <button class="navbar-toggler hamburger" type="button" data-toggle="collapse" data-target="#header_menu">
                            <span class="m_menu"> <?php esc_html_e('Menu', 'filix') ?></span>
                            <span class="m_close"> <?php esc_html_e('Close', 'filix') ?> </span>
                            <span class="bar_icon">
                            <span class="bar bar_1"></span>
                            <span class="bar bar_2"></span>
                            <span class="bar bar_3"></span>
                        </span>
                        </button>
                        <div class="opnen_menu">
                            <?php
                            wp_nav_menu( array (
                                'theme_location'    => 'main-menu',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => 'header_main_menu',
                                'menu_class'        => 'menu_item',
                                'walker'            => new Filix_Nav_Walker()
                            ));
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    $menu_bottom = !empty($opt['menu_bottom']) ? $opt['menu_bottom'] : '';
                    if ( $menu_bottom == '1' ) :
                        ?>
                        <div class="sub_footer">
                            <ul class="footer_contact text-center">
                                <?php filix_contact_info(); ?>
                            </ul>
                            <ul class="footer_social text-center">
                                <?php filix_social_links(); ?>
                            </ul>
                        </div>
                        <?php
                    endif;
                    ?>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- end header -->