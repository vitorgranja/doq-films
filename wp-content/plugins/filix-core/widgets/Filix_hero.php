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
class Filix_hero extends Widget_Base {

    public function get_name() {
        return 'filix_hero_portfolio';
    }

    public function get_title() {
        return esc_html__( 'Hero', 'filix-core' );
    }

    public function get_icon() {
        return 'eicon-device-desktop';
    }

    public function get_keywords() {
        return [ 'headline', 'hero' ];
    }

    public function get_categories() {
        return [ 'filix-elements' ];
    }

    public function get_script_depends() {
        return ['particles'];
    }

    protected function _register_controls() {


        // ---------------------------------------- Select Hero Style  -----------------------------------//
        $this->start_controls_section(
            'select_hero_style',
            [
                'label' => __( 'Select Style', 'saasland-core' ),
            ]
        );

        $this->add_control(
            'style', [
                'label' => esc_html__( 'Style', 'saasland-core' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    'style_01' => esc_html__('Style One ( Default )', 'saasland-core'),
                    'style_02' => esc_html__('Style Two ( Particle )', 'saasland-core'),
                    'style_03' => esc_html__('Style Three ( Video )', 'saasland-core'),
                    'style_04' => esc_html__('Style Four ( Self-Video )', 'saasland-core'),
                    'style_05' => esc_html__('Style Five ( SlideShow )', 'saasland-core'),
                ],
                'default' => 'style_01'
            ]
        );

        $this->add_control(
            'particles_color', [
                'label' => esc_html__( 'Particles Color', 'filix-core' ),
                'description' => esc_html__( 'Particle Moving Objects Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'style' => 'style_02'
                ]
            ]
        );

        $this->end_controls_section();

        // ----------------------------------------  Title Section  ------------------------------------//
        $this->start_controls_section(
            'title_sec',
            [
                'label' => esc_html__( 'Title', 'filix-core' ),
            ]
        );

        $this->add_control(
            'title_text',
            [
                'label' => esc_html__( 'Title Text', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Filix <br> Studio',
            ]
        );

        $this->end_controls_section();


        /// --------------------------------------- Words Section ----------------------------------///
        $this->start_controls_section(
            'content_list',
            [
                'label' => esc_html__( 'Attribute Words', 'filix-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'title', [
                'label' => esc_html__( 'Title', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 'Website'
            ]
        );
        // repeater field
        $this->add_control(
            'words', [
                'label' => esc_html__( 'Attributes', 'filix-core' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();

        /// --------------------------------------- image Section ----------------------------------///
        $this->start_controls_section(
            'slide_list',
            [
                'label' => esc_html__( 'Slider Iamges', 'filix-core' ),
                'condition' => [
                    'style' => 'style_05',
                ]
            ]
        );

        $slider = new \Elementor\Repeater();
        $slider->add_control(
            'slider_img', [
                'label' => esc_html__( 'Slide Image', 'filix-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        // repeater field
        $this->add_control(
            'slider_images', [
                'label' => esc_html__( 'Upload Images', 'filix-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $slider->get_controls(),
            ]
        );

        $this->end_controls_section();

        /// --------------------------------------- Video Backgroud Link ----------------------------------///
        $this->start_controls_section(
            'video_bg',
            [
                'label' => esc_html__( 'Video Background', 'filix-core' ),
                'condition' => [
                    'style' => ['style_03', 'style_04']
                ]
            ]
        );

        $this->add_control(
            'video_url', [
                'label' => esc_html__( 'Video URL', 'filix-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default'   => 'https://www.youtube.com/watch?v=JfdFqfBLCNI',
                'condition' => [
                    'style' => 'style_03'
                ]
            ]
        );

        $this->add_control(
            'myvideo', [
                'label' => esc_html__( 'Self Video URL', 'filix-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition' => [
                    'style' => 'style_04'
                ]
            ]
        );

        $this->end_controls_section();


        /// ------------------------------------ Social Links ----------------------------------///
        $this->start_controls_section(
            'social_portfolio_links',
            [
                'label' => esc_html__( 'Socail Profile Links', 'filix-core' ),
            ]
        );
        $this->add_control(
            'f_link',
            [
                'label' => esc_html__( 'Facebook Link', 'filix-core' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://', 'filix-core' ),
                'default' => [
                    'url' => '',
                ],
            ]
        );
        $this->add_control(
            't_link',
            [
                'label' => esc_html__( 'Twitter Link', 'filix-core' ),
               'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://', 'filix-core' ),
                'default' => [
                    'url' => '',
                ],
            ]
        );
        $this->add_control(
            'in_link',
            [
                'label' => esc_html__( 'Instagram Link', 'filix-core' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://', 'filix-core' ),
                'default' => [
                    'url' => '',
                ],
            ]
        );
        $this->add_control(
            'linkedin_link',
            [
                'label' => esc_html__( 'LinkedIn Link', 'filix-core' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://', 'filix-core' ),
                'default' => [
                    'url' => '',
                ],
            ]
        );
        $this->add_control(
            'be_link',
            [
                'label' => esc_html__( 'Behance Link', 'filix-core' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://', 'filix-core' ),
                'default' => [
                    'url' => '',
                ],
            ]
        );
        $this->add_control(
            'git_link',
            [
                'label' => esc_html__( 'GitHub Link', 'filix-core' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://', 'filix-core' ),
                'default' => [
                    'url' => '',
                ],
            ]
        );
        $this->add_control(
            'd_link',
            [
                'label' => esc_html__( 'Dribble Link', 'filix-core' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://', 'filix-core' ),
                'default' => [
                    'url' => '',
                ],
            ]
        );
        $this->add_control(
            'pin_link',
            [
                'label' => esc_html__( 'Pinterest Link', 'filix-core' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://', 'filix-core' ),
                'default' => [
                    'url' => '',
                ],
            ]
        );
        $this->add_control(
            'qq_link',
            [
                'label' => esc_html__( 'QQ Link', 'filix-core' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://', 'filix-core' ),
                'default' => [
                    'url' => '',
                ],
            ]
        );
        $this->add_control(
            'y_link',
            [
                'label' => esc_html__( 'YouTube Link', 'filix-core' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://', 'filix-core' ),
                'default' => [
                    'url' => '',
                ],
            ]
        );


        $this->end_controls_section();


        /// --------------------------------------- Arrow Link ----------------------------------///
        $this->start_controls_section(
            'scroll_arrow_link',
            [
                'label' => esc_html__( 'Scroll Link', 'filix-core' ),
            ]
        );

        $this->add_control(
            'scroll_title_text',
            [
                'label' => esc_html__( 'Title Text', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Scroll Down',
            ]
        );

        $this->add_control(
            'scroll_link',
            [
                'label' => __( 'Link To', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( '#section ID', 'filix-core' ),
                'show_label' => true,
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         */
        $this->start_controls_section(
            'style_title', [
                'label' => esc_html__( 'Style Title', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_title', [
                'label' => esc_html__( 'Text Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero_warp .banner_content .banner_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .hero_warp .banner_content .banner_title',
            ]
        );

        $this->end_controls_section();


        // ------------------------------ Attribute Title ------------------------------ //
        $this->start_controls_section(
            'attribute_word_style', [
                'label' => esc_html__( 'Attribute Words', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'attribute_color_title', [
                'label' => esc_html__( 'Text Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero_warp .banner_content .exp_list li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'attribute_typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .hero_warp .banner_content .exp_list li',
            ]
        );

        $this->add_control(
            'attribute_separator_color', [
                'label' => esc_html__( 'Separator Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero_warp .banner_content .exp_list li:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //------------------------------ Section Styling ------------------------------
        $this->start_controls_section(
            'style_background',
            [
                'label' => esc_html__( 'Section Styling', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Gradient Color
        $this->add_control(
            'bg_color', [
                'label' => esc_html__( 'Background Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero_warp' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} #particles-js' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_image', [
                'label' => esc_html__( 'Background Image', 'filix-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero_warp' => 'background-image: url( {{url}} );',
                ],
                'condition' => [
                    'style' => ['style_01', 'style_03']
                ]
            ]
        );

        $this->add_responsive_control(
            'sec_padding', [
                'label' => __( 'Section padding', 'saasland-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .hero_warp' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $video_id = rand(11312, 21321);
        $sliders = $settings['slider_images'];
        if ( $settings['style'] == 'style_01' ) {
            include 'heros/part-default.php';
        }

        if ( $settings['style'] == 'style_02' ) {
            include 'heros/part-particle.php';
        }

        if ( $settings['style'] == 'style_03' ) {
            include 'heros/video.php';
        }

        if ( $settings['style'] == 'style_04' ) {
            include 'heros/part-self-video.php';
        }

        if ( $settings['style'] == 'style_05' ) {
            include 'heros/part-slider.php';
        }
    }
}
