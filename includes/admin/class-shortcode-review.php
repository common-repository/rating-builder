<?php
class Redq_Rb_Shortcode_Review{

	public function __construct(){
		$shortcodes = array(
			'redq_rating_review'     	=> 'redq_rb_rating_review_func',
			'redq_overall_rating'     	=> 'redq_rb_overall_rating_func',
		);
		/**
		* Add Shortcode and callback function
		*/
		foreach ( $shortcodes as $shortcode => $function ) {
			add_shortcode( $shortcode , array( $this , $function ) );
		}
	}
	public function redq_rb_overall_rating_func() {
		ob_start();
		global $post;
		$all_comments = get_comments(array('post_id' => $post->ID));
		if(!empty($all_comments)){
			$rating_id = get_option( $post->post_type.'_redq_rating', true ) ? get_option( $post->post_type.'_redq_rating', true ) : ''  ;
	    $stored_rating_settings = get_post_meta( $rating_id, 'red_rb_stored_settings', true );
			if(!empty($stored_rating_settings)){
	      $temp_settings = stripslashes_deep($stored_rating_settings);
	      $clean_settings = json_decode($temp_settings);
	      $all_rating_param = $clean_settings->rating_filed_name;
				$rating_length = $clean_settings->rating_length;
			}
			$counter = 0;
			$average_rating = 0;
			for ($i = $rating_length; $i>0; $i--) {
				$start_counter[$i] = 0;
			}
			foreach ($all_rating_param as $param) {
				$all_rating[$param] = 0;
			}
			foreach ($all_comments as $comment) {
				if($comment->comment_parent  == 0){
					$counter++;
					$comment_rating = get_comment_meta( $comment->comment_ID, 'redq_rb_comment_rating', true );
					$comment_rating = json_decode($comment_rating);
					$single_rating = isset($comment_rating->reuse_button_rating) ? explode(',', $comment_rating->reuse_button_rating) : [];
					foreach ($single_rating as $value) {
						$single_rating = explode(':', $value);
						if($single_rating[1]!=0 && $single_rating[1]<= $rating_length){
							$start_counter[$single_rating[1]]++;
						}
						if( isset($all_rating[$single_rating[0]]) ){
							$all_rating[$single_rating[0]] += $single_rating[1];
						}
					}
				}
			}

			foreach ($all_rating_param as $rating) {
				$all_rating[$rating] = $all_rating[$rating]/$counter;
			}
			foreach ($start_counter as $key => $value) {
				$star_in_percent[$key] = ($value*100)/$counter;
			}
			$average_rating;
			foreach ($all_rating as $key => $rating) {
				$average_rating += $rating;
			}

			?>
			<div class="wprb-reviews-wrapper column">

				<!-- RaTiNg NuMbEr -->
				<div class="wprb-rating-number-wrapper">
					<div class="wprb-review-title-area">
						<h3 class="wprb-review-title"><span><?php echo esc_attr($counter) ?></span> <?php echo esc_html__('Reviews', 'redq-rating-builder'); ?></h3>
					</div>

					<span class="wprb-rating-number"><?php echo esc_attr(number_format( $average_rating/count($all_rating), 2)) ?></span>
					<ul>
						<?php for ($i=1; $i<=$rating_length; $i++) {
							if($i<= round($average_rating/count($all_rating))){
							?>
							<li class="active"><i class="ion-android-star"></i></li>
							<?php
						}else{?>
							<li><i class="ion-android-star"></i></li>
						<?php }
					}?>
					</ul>
				</div>

				<!-- ToTaL ReViEw -->
				<div class="wprb-total-reviews-wrapper">
					<div class="wprb-content-wrapper">
						<ul class="wprb-review-bar-wrapper">
							<?php foreach ($star_in_percent as $key => $value) {?>
							<li><span><?php echo esc_attr($key) ?></span><div style="width: <?php echo esc_attr($value) ?>%"></div></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="wprb-reviews-wrapper">
				<!-- OvErAlL RaTiNgS -->
				<div class="wprb-overall-rating-wrapper">
					<h3 class="wprb-review-title"><span><?php echo esc_html__('Rating Criteria', 'redq-rating-builder'); ?></h3>
					<div class="wprb-content-wrapper">
					<?php $average_rating; foreach ($all_rating as $key => $rating) {
						$average_rating += $rating;
						?>
						<div class="wprb-rating-category">
							<h3><?php echo esc_attr($key) ?></h3>
							<span><?php echo esc_attr(number_format($rating, 2)) ?></span>
						</div>
					<?php 	} ?>
					</div>
				</div>


			</div>

			<?php
			return ob_get_clean();
		}
	}
	public function redq_rb_rating_review_func($atts){
		ob_start();
			global $post;
			$rating_id = get_option( $post->post_type.'_redq_rating', true ) ? get_option( $post->post_type.'_redq_rating', true ) : ''  ;
			$stored_rating_settings = get_post_meta( $rating_id, 'red_rb_stored_settings', true );
			$rand_string = redq_rb_generate_random_string();
			if(!empty($stored_rating_settings)){
				$temp_settings = stripslashes_deep($stored_rating_settings);
				$clean_settings = json_decode($temp_settings);
				$rating_post_types = explode(',',$clean_settings->rating_post_types);
				if (in_array($post->post_type, $rating_post_types)) {
					?>
					<input type="text" id="user-input-rating" value="<?php echo esc_attr( $stored_rating_settings ); ?>" style="display: none;">
					<input type="text" id="rating-on-comment" data-post-id="<?php echo esc_attr($post->ID) ?>" name="user-input-rating" style="display: none;">
					<?php
					if (!comments_open( $post->ID )) {
						if (is_user_logged_in()) {?>
							<div id="rqrating-<?php echo esc_attr($rand_string); ?>" data-recieve="review"></div>
							<?php
						}else{?>
							<a style="line-height: 35px; text-decoration: none; display: inline-block; border: 1px solid; padding: 0 25px; border-radius: 5px" href="<?php echo esc_url(admin_url()); ?>">Give review!</a>
							<?php
						}
					}
				}
			}
		return ob_get_clean();
	}
}
