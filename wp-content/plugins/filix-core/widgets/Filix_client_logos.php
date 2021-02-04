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
class Filix_client_logos extends Widget_Base {

    public function get_name() {
        return 'Filix_client_logo';
    }

    public function get_title() {
        return esc_html__( 'Client Logos', 'filix-core' );
    }

    public function get_icon() {
        return 'eicon-logo';
    }

    public function get_keywords() {
        return [ 'client', 'logo', 'image', 'filix' ];
    }

    public function get_categories() {
        return [ 'filix-elements' ];
    }

    protected function _register_controls() {


        /// ------------------------ Client Logo Section -----------------------///
        $this->start_controls_section(
            'client_logos_section',
            [
                'label' => esc_html__( 'Client Logos', 'filix-core' ),
            ]
        );

        $client_logo = new \Elementor\Repeater();

        $client_logo->add_control(
            'c_logo', [
                'label' => esc_html__( 'Client Logo Upload', 'filix-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $client_logo->add_control(
            'c_logo_link', [
                'label' => esc_html__( 'Client Website Link', 'filix-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        // repeater field
        $this->add_control(
            'client_logos', [
                'label' => esc_html__( 'Client Logo', 'filix-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $client_logo->get_controls(),
            ]
        );

        $this->end_controls_section();

        //------------------------------ Gradient Color ------------------------------
        $this->start_controls_section(
            'client_sec_background',
            [
                'label' => esc_html__( 'Section Styling', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'opacity',
            [
                'label' => __( 'Logo Opacity (%)', 'filix' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => .50,
                ],
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .client_single_item a' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'c_bg_color', [
                'label' => esc_html__( 'Background Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'defualt' => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} .client_wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sec_padding', [
                'label' => __( 'Section padding', 'saasland-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .client_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $client_logos = $settings['client_logos'];
        ?>
        <section class="client_wrap">
            <div class="container">
                <div class="row align-items-center">
                    <?php 
                    if (!empty($client_logos)) {
                    foreach ($client_logos as $single_logo) { ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="client_single_item wow fadeInUp">
                            <a href="<?php echo esc_url($single_logo['c_logo_link']['url']); ?>" <?php filix_is_external($single_logo['c_logo_link']); filix_is_nofollow($single_logo['c_logo_link']) ?>>
                                <?php if (!empty($single_logo['c_logo'])) : ?>
                                <img src="<?php echo esc_url($single_logo['c_logo']['url']); ?>" alt="filix">
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>                        
                    <?php }
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php
        }
}
