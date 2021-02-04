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
class Filix_about extends Widget_Base {

    public function get_name() {
        return 'Filix_about_section';
    }

    public function get_title() {
        return esc_html__( 'About Section', 'filix-core' );
    }

    public function get_icon() {
        return 'eicon-post-content';
    }

    public function get_keywords() {
        return [ 'about', 'me', 'filix' ];
    }

    public function get_categories() {
        return [ 'filix-elements' ];
    }

    protected function _register_controls() {

        // ----------------------------------------  Title Section  ------------------------------------//
        $this->start_controls_section(
            'about_section',
            [
                'label' => esc_html__( 'About Section', 'filix-core' ),
            ]
        );

        $this->add_control(
            'about_section_title',
            [
                'label' => esc_html__( 'Title Text', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'About Me',
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
            'about_animate_title',
            [
                'label' => esc_html__( 'Section Animate Ttitle', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'about',
            ]
        );

        $this->add_control(
            'about_me_content',
            [
                'label' => esc_html__( 'About Section Content', 'filix-core' ),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default' => 'I’m Filix, a visual designer based in London.....',
            ]
        );

        $this->end_controls_section();


        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         */
        $this->start_controls_section(
            'about_style_title', [
                'label' => esc_html__( 'Style Title', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_title', [
                'label' => esc_html__( 'Title Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_title' => 'color: {{VALUE}};',
                ],
                'defualt' => '#000000',
            ]
        );

        $this->add_control(
            'about_contnet_color', [
                'label' => esc_html__( 'About Content Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_content' => 'color: {{VALUE}};',
                ],
                'defualt' => '#000',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'about_contnet_font',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .about_content h4',
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
            'about_bg_color', [
                'label' => esc_html__( 'Background Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'defualt' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .about_wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sec_padding', [
                'label' => __( 'Section padding', 'saasland-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .about_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $is_show = ($settings['show_underscore'] == 'yes') ? 'about_title wow fadeInUp' : 'about_title wow fadeInUp underscore_show_hide';
        ?>
        <section class="about_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (!empty($settings['about_section_title'])) : ?>
                            <h2 class="<?php echo esc_attr($is_show) ?>">
                                <?php echo esc_html($settings['about_section_title']); ?>
                            </h2>
                        <?php endif; ?>
                        <div class="about_content">
                        <?php
                        if (!empty($settings['about_animate_title'])) : ?>
                            <div class="bg_text">
                                <h1 class="bg_strock_text" data-parallax='{"x": -150}'><?php echo esc_html($settings['about_animate_title']); ?></h1>
                            </div>
                            <?php
                        endif;
                        if ( !empty($settings['about_me_content']) ) :
                            echo wp_kses_post($settings['about_me_content']);
                        endif;
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
