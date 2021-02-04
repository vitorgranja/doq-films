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
class Filix_contact extends Widget_Base {

    public function get_name() {
        return 'Filix_contact_form';
    }

    public function get_title() {
        return esc_html__( 'Contact Form', 'filix-core' );
    }

    public function get_icon() {
        return 'fa fa-envelope';
    }

    public function get_keywords() {
        return [ 'message', 'form', 'contact', 'filix' ];
    }

    public function get_categories() {
        return [ 'filix-elements' ];
    }

    protected function _register_controls() {

        // ----------------------------------------  Title Section  ------------------------------------//
        $this->start_controls_section(
            'contact_form_section',
            [
                'label' => esc_html__( 'Contact Form', 'filix-core' ),
            ]
        );

        $this->add_control(
            'contact_form_title',
            [
                'label' => esc_html__( 'Title Text', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Say Hello!',
            ]
        );

        $this->end_controls_section();

        /// ------------------------ Contact Form Section -----------------------///
        $this->start_controls_section(
            'contact_form_shortcode',
            [
                'label' => esc_html__( 'Contact Form 7', 'filix-core' ),
            ]
        );

        $this->add_control(
            'cf7_shortcode',
            [
                'label' => esc_html__( 'Contact Form Shortcode', 'filix-core' ),
                'description' => __( 'Make the contact form with Contact From 7 plugin and place the From shortcode copy to paste here. ', 'filix-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => ''
            ]
        );

        $this->end_controls_section();


        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         */
        $this->start_controls_section(
            'contact_style_title', [
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
            'c_contnet_color', [
                'label' => esc_html__( 'Interesting Content Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_content' => 'color: {{VALUE}};',
                ],
                'defualt' => '#000',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'form_contnet_font',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .contact_form_wrap h2',
            ]
        );

        $this->end_controls_section();

        //------------------------------ Gradient Color ------------------------------
        $this->start_controls_section(
            'contact_style_background',
            [
                'label' => esc_html__( 'Section Styling', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        // Gradient Color
        $this->add_control(
            'contact_bg_color', [
                'label' => esc_html__( 'Background Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'defualt' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .contact_form_wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sec_padding', [
                'label' => __( 'Section padding', 'saasland-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .page section.somethings_interesting_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        ?>

        <section class="contact_form_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php if (!empty($settings['contact_form_title'])) : ?>
                        <h2 class="contact_form_title text-center wow fadeInUp" data-wow-delay="0.5s">
                        <?php echo htmlspecialchars_decode(esc_html($settings['contact_form_title'])); ?>
                        </h2>
                        <?php endif; ?>
                    </div>
                    <?php echo !empty($settings['cf7_shortcode']) ? do_shortcode($settings['cf7_shortcode']) : ''; ?>
                </div>
            </div>
        </section>

    <?php
    }
}
