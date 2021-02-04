<?php 

class Filix_author_box extends WP_Widget {

	public function __construct() {

		$widget_opt = array(
			'class'         => 'widget_about',
			'description'         => __('This is Filix author info widgets.'),
			'customize_selective_refresh' => true,
		);

		parent::__construct('filix_author', __('(Filix) Author Box'), $widget_opt );
	}

	public function widget($arrg, $instance) {

		$author_image_box   = !empty( $instance['author_image_box'] ) ? $instance['author_image_box'] : '';
		$author_sign_img   = !empty( $instance['author_sign_img'] ) ? $instance['author_sign_img'] : '';
		$f_link   = !empty( $instance['facebook_link'] ) ? $instance['facebook_link'] : '';
		$t_link   = !empty( $instance['twitter_link'] ) ? $instance['twitter_link'] : '';
		$lin_link = !empty( $instance['instragram_link'] ) ? $instance['instragram_link'] : '';
		$b_link   = !empty( $instance['bahence_link'] ) ? $instance['bahence_link'] : '';
		$d_link   = !empty( $instance['dribble_link'] ) ? $instance['dribble_link'] : '';

		echo $arrg['before_widget'];
    ?>
        <div class="sidebar_about_img text-center">
        	<?php if($author_image_box) : ?>
            <img src="<?php echo $author_image_box; ?>" alt="img" class="img-fluid">
            <?php endif; ?>
        </div>
        <div class="sidebar_about_content">
            <h4 class="text-center sidebar_ab_title"><?php echo $instance['author_name']; ?></h4>
            <p class="text-center sidebar_ab_details"><?php echo $instance['author_bio']; ?></p>
            <?php if($author_sign_img) : ?>
            <div class="sign text-center">
                <img src="<?php echo $author_sign_img; ?>" alt="img" class="img-fluid">
            </div>
            <?php endif; ?>
        </div>
        <div class="follow">
        	<?php if(!empty($f_link)) : ?>
            <h4 class="follow_title text-center">Follow me on</h4>
            <?php endif; ?>
            <ul class="follow_link text-center">
                <li>
                	<?php if(!empty($f_link)) : ?>
                    <a href="<?php echo $f_link; ?>">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-facebook"></i>
                    </a>
                	<?php endif; ?>
                </li>
                <li>
                    <?php if(!empty($t_link)) : ?>
                    <a href="<?php echo $t_link; ?>">
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-twitter"></i>
                    </a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if(!empty($lin_link)) : ?>
                    <a href="<?php echo $lin_link; ?>">
                        <i class="fa fa-linkedin"></i>
                        <i class="fa fa-linkedin"></i>
                    </a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if(!empty($b_link)) : ?>
                    <a href="<?php echo $b_link; ?>">
                        <i class="fa fa-behance"></i>
                        <i class="fa fa-behance"></i>
                    </a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if(!empty($b_link)) : ?>
                    <a href="<?php echo $b_link; ?>">
                        <i class="fa fa-dribbble"></i>
                        <i class="fa fa-dribbble"></i>
                    </a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
	<?php echo $arrg['after_widget'];
	}


	public function form($instance) {
		$instance  = wp_parse_args( (array) $instance, array( 'author_name' => '' ) );

		$author_name   		= !empty( $instance['author_name'] ) ? $instance['author_name'] : '';
		$author_image_box   = !empty( $instance['author_image_box'] ) ? $instance['author_image_box'] : '';
		$author_bio   		= !empty( $instance['author_bio'] ) ? $instance['author_bio'] : '';
		$author_sign_img    = !empty( $instance['author_sign_img'] ) ? $instance['author_sign_img'] : '';
		$facebook_link   	= !empty( $instance['facebook_link'] ) ? $instance['facebook_link'] : '';
		$twitter_link   	= !empty( $instance['twitter_link'] ) ? $instance['twitter_link'] : '';
		$instragram_link 	= !empty( $instance['instragram_link'] ) ? $instance['instragram_link'] : '';
		$bahence_link   	= !empty( $instance['bahence_link'] ) ? $instance['bahence_link'] : '';
		$dribble_link   	= !empty( $instance['dribble_link'] ) ? $instance['dribble_link'] : '';
	?>
	
	<div class="author_fields">
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Author Name</label>
			<input type="text" name="<?php echo $this->get_field_name('author_name'); ?>" value="<?php echo $author_name; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>">
		</p>
	</div>
	<div class="author_fields">
		<button class="button" id="author_img">Upload Image</button>
		<input type="hidden" name="<?php echo $this->get_field_name('author_image_box'); ?>" value="<?php echo $author_image_box; ?>" class="img_link">
		<div class="show_img" style="margin-top: 10px">
			<img src="<?php echo $author_image_box; ?>" width="280" height="auto" alt="<?php echo $author_name; ?>">
		</div>
	</div>
	<div class="author_fields">
		<p>
			<label for="<?php echo $this->get_field_id('author_bio'); ?>">Author Bio</label>
			<textarea name="<?php echo $this->get_field_name('author_bio'); ?>" id="<?php echo $this->get_field_id('author_bio'); ?>" class="widefat"><?php echo esc_html($author_bio); ?></textarea>
		</p>
	</div>
	<div class="author_fields sign">
		<button class="button" id="author_sign">Upload Signeture</button>
		<input type="hidden" value="<?php echo $author_sign_img; ?>" name="<?php echo $this->get_field_name('author_sign_img'); ?>" class="sign_link">
		<div class="show_sign" style="margin-top: 10px; margin-bottom: 20px">
			<img src="<?php echo $author_sign_img; ?>" width="180" height="auto" alt="<?php echo $instance['author_name']; ?>">
		</div>
	</div>

	<p>
		<label for="<?php echo $this->get_field_id('facebook_link'); ?>"><?php _e('Facebook Link'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('facebook_link'); ?>" value="<?php echo esc_url( $facebook_link); ?>" id="<?php echo $this->get_field_id('facebook_link'); ?>" class="widefat">
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('twitter_link'); ?>"><?php _e('Twitter Link'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('twitter_link'); ?>" value="<?php echo esc_url($twitter_link); ?>" id="<?php echo $this->get_field_id('twitter_link'); ?>" class="widefat">
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('instragram_link'); ?>"><?php _e('Instragram Link'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('instragram_link'); ?>" value="<?php echo esc_url($instragram_link); ?>" id="<?php echo $this->get_field_id('instragram_link'); ?>" class="widefat">
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('bahence_link'); ?>"><?php _e('Behance Link'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('bahence_link'); ?>" value="<?php echo esc_url($bahence_link); ?>" id="<?php echo $this->get_field_id('bahence_link'); ?>" class="widefat">
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('dribble_link'); ?>"><?php _e('Dribble Link'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('dribble_link'); ?>" value="<?php echo esc_url($dribble_link); ?>" id="<?php echo $this->get_field_id('dribble_link'); ?>" class="widefat">
	</p>
	<?php
	}


	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['author_name'] = ( ! empty( $new_instance['author_name'] ) ) ? strip_tags( $new_instance['author_name'] ) : '';
		$instance['author_image_box'] = sanitize_url( $new_instance['author_image_box'] );
		$instance['author_bio'] 	  =  sanitize_textarea_field( $new_instance['author_bio'] );
		$instance['author_sign_img']  = sanitize_url( $new_instance['author_sign_img'] );
		$instance['facebook_link'] = sanitize_url( $new_instance['facebook_link'] );
		$instance['twitter_link'] = sanitize_url( $new_instance['twitter_link'] );
		$instance['instragram_link'] = sanitize_url( $new_instance['instragram_link'] );
		$instance['bahence_link'] = sanitize_url( $new_instance['bahence_link'] );
		$instance['dribble_link'] = sanitize_url( $new_instance['dribble_link'] );
		
		return $instance;
	}


}

add_action('admin_enqueue_scripts', 'filix_admin_custom_script');

function filix_admin_custom_script() {

	wp_enqueue_media();

	wp_register_script( 'admin_custom_script', plugins_url( 'admin_script.js', __FILE__ ), array('jquery') );

	wp_enqueue_script('admin_custom_script');

}