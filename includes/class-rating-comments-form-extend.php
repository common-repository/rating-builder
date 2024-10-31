<?php

class Redq_Rb_Comment_Form_Extend{
	public function __construct(){
    add_action( 'comment_form_logged_in_after',array($this, 'redq_rb_add_rating_field'));
    add_action( 'comment_form_before_fields',array($this, 'redq_rb_add_rating_field'));
		add_filter( 'comment_form_submit_button',array($this, 'redq_rb_attachments_fields'));
		add_action( 'comment_post',array($this, 'redq_rb_save_rating_field'),10, 3 );
  }

	public function redq_rb_save_rating_field($comment_id, $comment_approved, $commentdata){
		if ($commentdata['comment_parent'] == 0) {
			$all_comments = get_comments(array('post_id' => $commentdata['comment_post_ID']));
			$total_comments = count($all_comments);
			update_comment_meta($comment_id, 'redq_total_review', $total_comments);
			update_post_meta($commentdata['comment_post_ID'], 'redq_total_no_of_reviews', $total_comments);
			if(isset($_POST['rating-attachments-data'])){
				update_comment_meta($comment_id, 'redq_rb_rating_attachments', $_POST['rating-attachments-data']);
				// update_post_meta($commentdata['comment_post_ID'], 'redq_rb_comment_rating', $_POST['rating-attachments-data']);
			}
			if(isset($_POST['user-input-rating'])){
				update_comment_meta($comment_id, 'redq_rb_comment_rating', $_POST['user-input-rating']);
				update_post_meta($commentdata['comment_post_ID'], 'redq_rb_comment_rating', $_POST['user-input-rating']);
			}
			if(!empty($all_comments)){
				$post_type = get_post_type($commentdata['comment_post_ID']);
				$rating_id = get_option( $post_type.'_redq_rating', true ) ? get_option( $post_type.'_redq_rating', true ) : ''  ;
		    $stored_rating_settings = get_post_meta( $rating_id, 'red_rb_stored_settings', true );
				if(!empty($stored_rating_settings)){
		      $temp_settings = stripslashes_deep($stored_rating_settings);
		      $clean_settings = json_decode($temp_settings);
		      $all_rating_param = $clean_settings->rating_filed_name;
					$rating_length = $clean_settings->rating_length;
					update_comment_meta($comment_id, 'total_rating_length', $rating_length);
					update_post_meta($commentdata['comment_post_ID'], 'total_rating_length', $rating_length);
				}
			}
			$counter = 0;
			$total_rating = 0;
			for ($i = $rating_length; $i>0; $i--) {
				$start_counter[$i] = 0;
			}
			foreach ($all_rating_param as $param) {
				$all_rating[$param] = 0;
			}
			foreach ($all_comments as $comment) {
				$counter++;
				$comment_rating = get_comment_meta( $comment->comment_ID, 'redq_rb_comment_rating', true );
				$comment_rating = json_decode($comment_rating);
				if (isset($comment_rating) && $comment_rating !=='') {
					$single_rating = isset($comment_rating->reuse_button_rating) ? explode(',', $comment_rating->reuse_button_rating) : [];
					foreach ($single_rating as $value) {
						$single_rating = explode(':', $value);
						if($single_rating[1]!=0 && $single_rating[1]<= $rating_length){
							$start_counter[$single_rating[1]]++;
						}
						if(isset($all_rating[$single_rating[0]])){
							$all_rating[$single_rating[0]] += $single_rating[1];
						}
					}
				}
			}
			if(isset($all_rating_param) && !empty($all_rating_param)){
				foreach ($all_rating_param as $rating) {
					$all_rating[$rating] = round($all_rating[$rating]/$counter);
				}
			}


			if (isset($all_rating) && !empty($all_rating)) {
				foreach ($all_rating as $key => $rating) {
					$total_rating += $rating;
				}
			}
			if (isset($total_rating) && isset($all_rating)) {
				$average_rating = round($total_rating/count($all_rating));
				update_comment_meta($comment_id, 'average_rating', $average_rating);
				update_post_meta($commentdata['comment_post_ID'], 'average_rating', $average_rating);
			}
		}
	}

	public function redq_rb_add_rating_field(){
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
				<div id="rqrating-<?php echo esc_attr($rand_string); ?>" class="wp-rating-extend" data-recieve="true"></div>
				<input type="text" id="user-input-rating" value="<?php echo esc_attr( $stored_rating_settings ); ?>" style="display: none;">
				<input type="hidden" id="rating-on-comment" name="user-input-rating">
				<?php
			}
		}
	}

	public function redq_rb_attachments_fields() {
		global $post;
    $rating_id = get_option( $post->post_type.'_redq_rating', true ) ? get_option( $post->post_type.'_redq_rating', true ) : ''  ;
    $stored_rating_settings = get_post_meta( $rating_id, 'red_rb_stored_settings', true );
		$rand_string = redq_rb_generate_random_string();
		if(!empty($stored_rating_settings)){
      $temp_settings = stripslashes_deep($stored_rating_settings);
      $clean_settings = json_decode($temp_settings);
			$attachments_enable = isset($clean_settings->attachments_enable) ? $clean_settings->attachments_enable : 'false';
      $rating_post_types = explode(',',$clean_settings->rating_post_types);
      if (in_array($post->post_type, $rating_post_types) && $attachments_enable == 'true' ) {
			?>
			<div id="rqattachemnts-<?php echo esc_attr($rand_string); ?>" class="wp-rating-extend" data-recieve="true"></div>
			<input type="hidden" id="rating-attachemnts" name="rating-attachments-data">
			<?php
			}
		}
	}
}
