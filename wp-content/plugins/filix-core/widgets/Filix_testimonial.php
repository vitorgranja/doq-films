<?php
namespace FilixCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;



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
class Filix_testimonial extends Widget_Base {

    public function get_name() {
        return 'Filix_testimonial_sec';
    }

    public function get_title() {
        return esc_html__( 'Filix Testimonial', 'filix-core' );
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    public function get_keywords() {
        return [ 'testimonial', 'feedback', 'client', 'filix' ];
    }

    public function get_categories() {
        return [ 'filix-elements' ];
    }


    protected function _register_controls() {



        // ----------------------------------------  Title Section  ------------------------------------//
        $this->start_controls_section(
            'testimonial_sec',
            [
                'label' => esc_html__( 'Testimonial Section', 'filix-core' ),
            ]
        );

        $this->add_control(
            'test_section_title',
            [
                'label' => esc_html__( 'Title Text', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Clients On Me',
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
            'test_animate_title',
            [
                'label' => esc_html__( 'Section Animate Ttitle', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Testimonials',
            ]
        );

        $this->end_controls_section();


        /// ------------------------ Testimonial Item Image List -----------------------///
        $this->start_controls_section(
            'testimonial_img_list',
            [
                'label' => esc_html__( 'Clients List', 'filix-core' ),
            ]
        );

        $client_img = new \Elementor\Repeater();
        $client_img->add_control(
            'c_image', [
                'label' => esc_html__( 'Client Image', 'filix-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        // repeater field
        $this->add_control(
            'client_images', [
                'label' => esc_html__( 'Client Iamge', 'filix-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $client_img->get_controls(),
            ]
        );

        $this->end_controls_section();


        /// ---------------------- Testimonial  Item single content ------------------------///
        $this->start_controls_section(
            'testimonial_content_list',
            [
                'label' => esc_html__( 'Client Feedback', 'filix-core' ),
            ]
        );

        $feedback_content = new \Elementor\Repeater();

        $feedback_content->add_control(
            'feedback_title',
            [
                'label' => esc_html__( 'Title Text', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Outstanding Experience!',
            ]
        );

        $feedback_content->add_control(
            'feedback_dec',
            [
                'label' => esc_html__( 'Description', 'filix-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Filix was outstanding! I was looking for a professional to design and develop my new website for my recipe blog. I searched for long, failed to choose a suitable lne until I found Filix.',
            ]
        );

        $feedback_content->add_control(
            'client_name',
            [
                'label' => esc_html__( 'Client Name', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Eh Jewel',
            ]
        );

        // repeater field
        $feedback_content->add_control(
            'client_designation', [
                'label' => esc_html__( 'Designation', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'CEO and WP Dev',
            ]
        );
        // repeater field
        $this->add_control(
            'feedback_items', [
                'label' => esc_html__( 'Testimonail Content', 'filix-core' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => $feedback_content->get_controls(),
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         */
        $this->start_controls_section(
            'style_title', [
                'label' => esc_html__( 'Title', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_title', [
                'label' => esc_html__( 'Title Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_wrap .test_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'testi_contnet_font',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .test_title',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         */
        $this->start_controls_section(
            'client_style', [
                'label' => esc_html__( 'Client Feedback', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'client_color_title', [
                'label' => __( 'Title Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_wrap .test_details_content .test_details_slider_item .slider_title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'client_typo_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .testimonial_wrap .test_details_content .test_details_slider_item .slider_title',
            ]
        );

        $this->add_control(
            'single_testi_content_color', [
                'label' => esc_html__( 'Author Title Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_wrap .test_details_content .test_details_slider_item .autor_name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'c_author_typo',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .testimonial_wrap .test_details_content .test_details_slider_item .autor_name',
            ]
        );

        $this->end_controls_section();


        //------------------------------ Image Hover Color ------------------------------ //
        $this->start_controls_section(
            'author_img_style', [
                'label' => esc_html__( 'Author Image', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'author_img_active_color', [
                'label' => esc_html__( 'Active Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_wrap .client_user_img .user_slider_item.slick-active.slick-center .img_wrap:before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


        //------------------------------ Gradient Color ------------------------------
        $this->start_controls_section(
            'test_style_background',
            [
                'label' => esc_html__( 'Section Styling', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        // Gradient Color
        $this->add_control(
            'bg_image', [
                'label' => esc_html__( 'Background Image', 'filix-core' ),
                'type' => Controls_Manager::MEDIA,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_wrap' => 'background-image: url( {{url}} );',
                ],
            ]
        );

        $this->add_responsive_control(
            'sec_padding', [
                'label' => __( 'Section padding', 'saasland-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $client_images = $settings['client_images'];
        $feedback_items = $settings['feedback_items'];
        $tasimonail_id = rand(1232, 21323);
        $is_show = ($settings['show_underscore'] == 'yes') ? 'test_title wow fadeInUp' : 'test_title wow fadeInUp underscore_show_hide';
        ?>

        <section class="testimonial_wrap">
            <div class="bg_text">
                <?php if (!empty($settings['test_animate_title'])) : ?>
                    <h1 class="bg_strock_text" data-parallax='{"x": -200}'><?php echo esc_html($settings['test_animate_title']); ?></h1>
                <?php endif; ?>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <?php if (!empty($settings['test_section_title'])) : ?>
                            <div class="test_left">
                                <h2 class="<?php echo esc_attr($is_show) ?>"><?php echo esc_html($settings['test_section_title']); ?></h2>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-12 col-12">
                        <div class="client_user_img">
                            <div class="user_img_slider-<?php echo $tasimonail_id; ?> wow fadeInUp">
                                <?php
                                if (!empty($client_images)) {
                                    foreach ($client_images as $single_img) { ?>
                                        <div class="user_slider_item ">
                                            <?php if (!empty($single_img['c_image'])) : ?>
                                                <div class="img_wrap"><img src="<?php echo esc_url($single_img['c_image']['url']); ?>" alt="img" class="img-fluid"></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-8 col-sm-12 col-12">
                        <div class="test_details_content">
                            <div class="test_details_slider-<?php echo $tasimonail_id; ?> wow fadeInUp">
                                <?php
                                if (!empty($feedback_items)) {
                                    foreach ($feedback_items as $feedback_item) { ?>
                                        <div class="test_details_slider_item">
                                            <?php if (!empty($feedback_item['feedback_title'])) : ?>
                                                <h3 class="slider_title"><?php echo htmlspecialchars_decode(esc_html($feedback_item['feedback_title'])); ?></h3>
                                            <?php endif; ?>

                                            <?php if (!empty($feedback_item['feedback_dec'])) : ?>
                                                <p>
                                                    <?php echo htmlspecialchars_decode(esc_html($feedback_item['feedback_dec'])); ?>
                                                </p>
                                            <?php endif; ?>

                                            <?php if (!empty($feedback_item['client_name'])) : ?>
                                                <h5 class="autor_name"><?php echo esc_html($feedback_item['client_name']); ?></h5>
                                            <?php endif; ?>
                                            <?php if (!empty($feedback_item['client_name'])) : ?>
                                                <h6 class="autor_title"><?php echo esc_html($feedback_item['client_designation']); ?></h6>
                                            <?php endif; ?>
                                        </div>
                                    <?php }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end testimonial_wrap -->
        <script>
            (function($){
                "use strict";
                $(document).ready(function(){
                    function testSlider(){
                        if ((".user_img_slider-<?php echo $tasimonail_id; ?>").length > 0 ) {
                            jQuery('.user_img_slider-<?php echo $tasimonail_id; ?>').slick({
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                autoplay: true,
                                autoplaySpeed: 3000,
                                arrows: false,
                                vertical:true,
                                verticalSwiping:true,
                                centerMode: true,
                                centerPadding: '0px',
                                dots: false,
                                asNavFor: '.test_details_slider-<?php echo $tasimonail_id; ?>',
                                focusOnSelect: true,
                                responsive: [
                                    {
                                        breakpoint: 991,
                                        settings: {

                                        }
                                    },
                                    {
                                        breakpoint: 768,
                                        settings: {
                                            arrows: false,
                                            vertical: false,
                                            verticalSwiping:false,
                                        }
                                    },
                                    {
                                        breakpoint: 640,
                                        settings: {
                                            arrows: false,
                                            slidesToShow: 1,
                                            vertical: false,
                                            verticalSwiping:false,
                                        }
                                    }
                                ]
                            });
                        }

                        jQuery('.test_details_slider-<?php echo $tasimonail_id; ?>').slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            autoplay: true,
                            autoplaySpeed: 3000,
                            arrows: false,
                            dots: false,
                            asNavFor: '.user_img_slider-<?php echo $tasimonail_id;?>',
                            responsive: [
                                {
                                    breakpoint: 991,
                                    settings: {

                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        arrows: false,
                                    }
                                }
                            ]
                        });

                    }
                    testSlider();
                });

            }(jQuery));
        </script>

        <?php
    }
}
