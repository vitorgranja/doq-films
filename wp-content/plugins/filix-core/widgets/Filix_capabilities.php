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
class Filix_capabilities extends Widget_Base {

    public function get_name() {
        return 'Filix_capabilities_sec';
    }

    public function get_title() {
        return esc_html__( 'Capabilities Tabs', 'filix-core' );
    }

    public function get_icon() {
        return 'eicon-post-content';
    }

    public function get_keywords() {
        return [ 'capabilities', 'tabs', 'filix' ];
    }

    public function get_categories() {
        return [ 'filix-elements' ];
    }

    protected function _register_controls() {

        // ----------------------------------------  Title Section  ------------------------------------//
        $this->start_controls_section(
            'capa_section',
            [
                'label' => esc_html__( 'Capabilities Section', 'filix-core' ),
            ]
        );

        $this->add_control(
            'capa_section_title',
            [
                'label' => esc_html__( 'Title Text', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'My Capabilities',
            ]
        );

        $this->add_control(
            'show_underscore',
            [
                'label' => __( 'Title Underscore', 'filix-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'filix-core' ),
                'label_off' => __( 'Hide', 'filix-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_underscore_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'capa_animate_title',
            [
                'label' => esc_html__( 'Section Animate Ttitle', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Capabilities',
            ]
        );

        $this->add_control(
            'capa_description',
            [
                'label' => esc_html__( 'Capabilites Description', 'filix-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Burke what a load of rubbish young delinquent matie boy a blinding shot horse play cuppa old wind up bevvy my good sir...',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         */
        $this->start_controls_section(
            'capa_style_title', [
                'label' => esc_html__( 'Style Title', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'capa_color_title', [
                'label' => esc_html__( 'Title Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .capabiliti_wrap .capabiliti_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'capa_contnet_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .capabiliti_title',
            ]
        );

        $this->end_controls_section();

        //------------------------------ Gradient Color ------------------------------
        $this->start_controls_section(
            'about_style_background',
            [
                'label' => esc_html__( 'Section Styling', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        // Gradient Color
        $this->add_control(
            'capa_bg_color', [
                'label' => esc_html__( 'Background Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .capabiliti_wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sec_padding', [
                'label' => __( 'Section padding', 'saasland-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .capabiliti_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $is_show = ($settings['show_underscore'] == 'yes') ? 'capabiliti_title wow fadeInUp' : 'capabiliti_title wow fadeInUp underscore_show_hide';

        $service_cats = get_terms(array(
            'taxonomy' => 'service_cat',
            'hide_empty' => true
        ));
        ?>

    <section class="capabiliti_wrap">
        <div class="bg_text" >
            <?php if (!empty($settings['capa_animate_title'])) : ?>
                <h1 class="bg_strock_text" data-parallax='{"x": 200}'><?php echo wp_kses_post($settings['capa_animate_title']); ?></h1>
            <?php endif; ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php if (!empty($settings['capa_section_title'])) : ?>
                        <h2 class="<?php echo esc_attr($is_show) ?>"> <?php echo wp_kses_post($settings['capa_section_title']); ?> </h2>
                    <?php endif; ?>
                </div>
            </div>
            

            <div class="row">
                <div class="col-lg-5 col-md-4 col-sm-12 col-12">
                    <ul class="nav nav-tabs capabiliti_tab">
                        <?php 
                        $counter = 0;
                        foreach($service_cats as $category) :
                            $counter++;
                            ?>
                            <li class="nav-item wow fadeInUp">
                                <a class="nav-link  <?=($counter == 1) ? 'active' : ''?>" data-toggle="tab" href="#<?php echo esc_attr($category->slug); ?>">
                                    <?php echo esc_html($category->name); ?>
                                </a>
                            </li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                </div>

                <div class="col-lg-7 col-md-8 col-sm-12 col-12">
                    <div class="tab-content capabiliti_tab_content">
                    <?php 
                    $counter = 0;
                    foreach($service_cats as $category) { 
                    $counter++;
                        ?>
                        <div class="tab-pane fade<?=($counter == 1) ? ' active show' : ''?>" id="<?php echo esc_attr($category->slug); ?>">
                            
                        <?php if (!empty($settings['capa_description'])) : ?>
                            <p class="tabPara"> <?php echo wp_kses_post($settings['capa_description']); ?> </p>
                        <?php endif; ?>

                        <div class="row">
                            <?php
                            $the_query = new WP_Query(array(
                                'post_type' => 'service',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'service_cat',
                                        'field'    => 'slug',
                                        'terms'    => $category->slug,
                                    ),
                                ),
                                'posts_per_page' => -1
                            ));
                            while ( $the_query->have_posts() ) : $the_query->the_post();
                                $icon = function_exists('get_field') ? get_field('service_icon') : '';
                                ?>
                                <div class="col-md-6 col-sm-6 col-12 <?php echo esc_attr($category->slug); ?>">
                                    <div class="service_item">
                                        <div class="icon">
                                        <?php if(!empty($icon)) : ?>
                                            <i class="<?php echo esc_attr($icon); ?>"></i>
                                        <?php endif; ?>
                                        </div>
                                        <div class="content">
                                            <a href="<?php the_permalink() ?>"><h4><?php esc_html( the_title() ); ?></h4></a>
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <?php }
                    ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <?php
    }
}