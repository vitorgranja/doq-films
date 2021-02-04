<?php
namespace FilixCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use WP_Query;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 * Text Typing Effect
 *
 * Elementor widget for text typing effect.
 *
 * @since 1.7.0
 */
class Filix_portfolio_filterable extends Widget_Base {

    public function get_name() {
        return 'filix_portfolio_filterable';
    }

    public function get_title() {
        return esc_html__( 'Portfolio Filter Able', 'filix-core' );
    }

    public function get_icon() {
        return 'eicon-featured-image';
    }

    public function get_keywords() {
        return [ 'portfolio', 'image', 'filix' ];
    }

    public function get_categories() {
        return [ 'filix-elements' ];
    }

    public function get_script_depends() {
        return [ 'universal-tilt', 'imagesloaded', 'isotope' ];
    }

    protected function _register_controls() {

       // -------------------------------------------- Filtering
        $this->start_controls_section(
            'portfolio_filter', [
                'label' => __( 'Portfolio Settings', 'filix-core' ),
            ]
        );

        $this->add_control(
            'all_label', [
                'label' => esc_html__( 'All filter label', 'saasland-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'See All'
            ]
        );

        $this->add_control(
            'portfolio_section_title', [
                'label' => esc_html__( 'Section Title', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Portfolio'
            ]
        );

        $this->add_control(
            'explore_btn', [
                'label' => esc_html__( 'Read More Button', 'saasland-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Explore'
            ]
        );

        $this->add_control(
            'show_count', [
                'label' => esc_html__( 'Show count', 'filix-core' ),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => 6
            ]
        );

        $this->add_control(
            'order', [
                'label' => esc_html__( 'Order', 'filix-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => 'ASC',
                    'DESC' => 'DESC'
                ],
                'default' => 'ASC'
            ]
        );

        
        $this->add_control(
            'count_col',
            [
                'label'     => esc_html__( 'Select Column', 'filix-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 6,
                'options'   => [
                      '6'     => esc_html__( '2 Column', 'filix-core' ),
                      '4'     => esc_html__( '3 Column', 'filix-core' ),
                ],
            ]
        );

        $this->end_controls_section();



        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         */
        $this->start_controls_section(
            'style_title', [
                'label' => esc_html__( 'Style Item Title', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_title', [
                'label' => esc_html__( 'Item Title Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio_warp .port_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .portfolio_warp .port_title',
            ]
        );

        $this->end_controls_section();


        //------------------------------ Gradient Color ------------------------------
        $this->start_controls_section(
            'style_background',
            [
                'label' => esc_html__( 'Background', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        // Gradient Color
        $this->add_control(
            'bg_color', [
                'label' => esc_html__( 'Background Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'defualt' => '#171819',
                'selectors' => [
                    '{{WRAPPER}} .portfolio_warp' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sec_padding', [
                'label' => __( 'Section padding', 'saasland-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio_warp' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px', // The selected CSS Unit. 'px', '%', 'em',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        $count_col = $settings['count_col'];

        $portfolios = new WP_Query(array(
            'post_type'     => 'portfolio',
            'posts_per_page'=> $settings['show_count'],
            'order' => $settings['order']
        ));
        $portfolio_cats = get_terms(array(
            'taxonomy' => 'portfolio_cat',
            'hide_empty' => true
        ));
        ?>

        <section class="portfolio_warp <?=($count_col == 4) ? 'portfolio_3_warp' : ''?>" id="portfolio_warp">
            <div class="port_bg_text" >
            <?php if(!empty($settings['portfolio_section_title'] )) : ?>
               <h1 class="bg_strock_text" data-parallax='{"x": -200}'><?php echo esc_html( $settings['portfolio_section_title'] ) ?></h1>
            <?php endif; ?>
           </div>
            <div class="container">
                <div id="portfolio_filter" class="portfolio_filter mb_50">
                    <?php if(!empty($settings['all_label'])) : ?>
                        <div data-filter="*" class="work_portfolio_item active">
                            <?php echo esc_html($settings['all_label']); ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    if(is_array($portfolio_cats)) {
                        foreach ($portfolio_cats as $portfolio_cat) { ?>
                            <div data-filter=".<?php echo $portfolio_cat->slug ?>" class="work_portfolio_item">
                                <?php echo $portfolio_cat->name ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="row portfolio_single_wrap <?=($count_col == 4) ? 'portfolio_3_column' : ''?>" id="work-portfolio">
                   <?php
                   while ($portfolios->have_posts()) : $portfolios->the_post();
                       $cats = get_the_terms(get_the_ID(), 'portfolio_cat');
                       $cat_slug = '';
                       if(is_array($cats)) {
                           foreach ($cats as $cat) {
                               $cat_slug .= $cat->slug.' ';
                           }
                       }
                        ?>
                        <div class=" <?php echo esc_attr($cat_slug);  ?><?=($count_col == 4) ? 'col-md-4 portfolio_cus_3' : 'col-md-6'?> col-sm-12 col-xs-12 portfolio_single_item wow fadeInUp">
                            <div class="portfolio_item">
                                <div class="port_img tilt">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <a href="<?php the_permalink() ?>">
                                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="filix" class="img-fluid">
                                        </a>
                                    <?php } ?>
                                </div>
                                <?php if ( !empty( $settings['explore_btn'] ) ) : ?>
                                    <a class="exp" href="<?php the_permalink() ?>">
                                        <span class="exp_inner">
                                            <span class="exp_hover"><?php echo esc_html($settings['explore_btn']) ?></span>
                                        </span>
                                    </a>
                                <?php endif; ?>
                                <div class="port_text">
                                    <a href="<?php the_permalink() ?>">
                                        <h3 class='port_title'> <?php the_title(); ?> </h3>
                                    </a>
                                    <p class="catagory">
                                    <?php
                                    if(!empty($cats)) {
                                        $cat_count = count($cats);
                                        $i = 1;
                                        foreach ($cats as $cat) {
                                            $separator = ($i == $cat_count) ? ' ' : ', ';
                                            ?>
                                           <a href="<?php the_permalink() ?>"> <?php echo $cat->name.$separator; ?> </a>
                                        <?php
                                        ++$i;
                                        }
                                    }
                                    ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>

        <script>
            (function ( $ ) {
                "use strict";
                $(document).ready( function() {

                    /*===========Portfolio isotope js===========*/
                    function portfolioMasonry(){
                        var portfolio = $("#work-portfolio");
                        if( portfolio.length ){
                            portfolio.imagesLoaded( function() {
                                // images have loaded
                                // Activate isotope in container
                                portfolio.isotope({
                                    itemSelector: ".portfolio_single_item",
                                    layoutMode: 'masonry',
                                    filter:"*",
                                    animationOptions :{
                                        duration:1000
                                    },
                                    hiddenStyle: {
                                        opacity: 0,
                                        transform: 'scale(.4)rotate(60deg)',
                                    },
                                    visibleStyle: {
                                        opacity: 1,
                                        transform: 'scale(1)rotate(0deg)',
                                    },
                                    stagger: 0,
                                    transitionDuration: '0.9s',
                                    masonry: {

                                    }
                                });

                                // Add isotope click function
                                $("#portfolio_filter div").on('click',function(){
                                    $("#portfolio_filter div").removeClass("active");
                                    $(this).addClass("active");

                                    var selector = $(this).attr("data-filter");
                                    portfolio.isotope({
                                        filter: selector,
                                        animationOptions: {
                                            animationDuration: 750,
                                            easing: 'linear',
                                            queue: false
                                        }
                                    });
                                    return false;
                                });
                            });
                        }
                    }
                    portfolioMasonry();

                });
            }( jQuery ));
        </script>

        <?php 
    }
}
