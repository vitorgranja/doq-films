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
class Filix_interest extends Widget_Base {

    public function get_name() {
        return 'Filix_interesting';
    }

    public function get_title() {
        return esc_html__( 'Interesting', 'filix-core' );
    }

    public function get_icon() {
        return 'fa fa-address-card-o';
    }

    public function get_keywords() {
        return [ 'interest', 'contact', 'filix' ];
    }

    public function get_categories() {
        return [ 'filix-elements' ];
    }

    protected function _register_controls() {

        // ----------------------------------------  Title Section  ------------------------------------//
        $this->start_controls_section(
            'interesting_section',
            [
                'label' => esc_html__( 'Interesting Section', 'filix-core' ),
            ]
        );

        $this->add_control(
            'interesting_title',
            [
                'label' => esc_html__( 'Title Text', 'filix-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Have something interesting <br>in mind? Let’s Talk',
            ]
        );

        $this->end_controls_section();

        /// ------------------------ Client Logo Section -----------------------///
        $this->start_controls_section(
            'interesting_item_list',
            [
                'label' => esc_html__( 'Interesting Item Box', 'filix-core' ),
            ]
        );

        $interesting = new \Elementor\Repeater();

        $interesting->add_control(
            'interesting_img', [
                'label' => esc_html__( 'Upload Image', 'filix-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => plugins_url('assets/images/statue-of-liberty.png', __FILE__)
                ]
            ]
        );


        $interesting->add_control(
            'interest_item_title',
            [
                'label' => esc_html__( 'Title Text', 'filix-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'NYC Office',
            ]
        );

        $interesting->add_control(
            'interest_item_content',
            [
                'label' => esc_html__( 'Information Text', 'filix-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => '1243, Manhattan, NYC 123 324 4564 <a href="#"><span>hello@filix.com</span><span>hello@filix.com</span></a>',
            ]
        );
        
        $this->add_control(
            'interest_items', [
                'label' => esc_html__( 'Interesting Item', 'filix-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $interesting->get_controls(),
            ]
        );

        $this->end_controls_section();


        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         */
        $this->start_controls_section(
            'interest_style_title', [
                'label' => esc_html__( 'Style Title', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'interest_color_title', [
                'label' => esc_html__( 'Title Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_title' => 'color: {{VALUE}};',
                ],
                'defualt' => '#000000',
            ]
        );

        $this->add_control(
            'inter_contnet_color', [
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
                'name' => 'interesting_contnet_font',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .somethings_interesting_wrap h3',
            ]
        );

        $this->end_controls_section();

        //------------------------------ Gradient Color ------------------------------
        $this->start_controls_section(
            'interest_style_background',
            [
                'label' => esc_html__( 'Background', 'filix-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        // Gradient Color
        $this->add_control(
            'interesting_bg_color', [
                'label' => esc_html__( 'Background Color', 'filix-core' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'defualt' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .somethings_interesting_wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        $interest_items = $settings['interest_items'];
        ?>

    <!-- start somethings_interesting_wrap -->
    <section class="somethings_interesting_wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if (!empty($settings['interesting_title'])) : ?>
                    <h3 class="title text-center wow fadeInUp" data-wow-delay="0.2s">
                        <?php echo htmlspecialchars_decode(esc_html($settings['interesting_title'])); ?>
                    </h3>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">

                <?php if (!empty($interest_items)) {
                foreach ($interest_items as $interest) { ?>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="interesting_item">
                            <?php if (!empty($interest['interesting_img'])) : ?>
                            <div class="interesting_icon wow fadeInUp" data-wow-delay="0.2s">
                                <img src="<?php echo esc_url($interest['interesting_img']['url']); ?>" alt="filix">
                            </div>
                            <?php endif; ?>

                            <?php if (!empty($interest['interest_item_title'])) : ?>
                            <div class="interesting_content wow fadeInUp" data-wow-delay="0.4s">
                                <h4><?php echo esc_html($interest['interest_item_title']); ?></h4>
                                <p><?php echo htmlspecialchars_decode(esc_html($interest['interest_item_content'])); ?>
                                </p>
                            </div>
                            <?php endif; ?>
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
