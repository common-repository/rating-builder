<?php
class Redq_Rb_Save_Rating{

	public function __construct(){
		add_action('save_post', array( $this , 'redq_rb_save_rating_meta' ));
	}

 	public function redq_rb_save_rating_meta($post_id){
    $post = get_post($post_id);
    if ($post->post_type == 'redq_rb_post') {
      $stored_settings = isset($_POST['red_rb_stored_settings']) ? $_POST['red_rb_stored_settings'] : '';
      if($stored_settings !==''){
        update_post_meta($post_id, 'red_rb_stored_settings', $stored_settings);
        $temp_settings = stripslashes_deep($stored_settings);
        $clean_settings = json_decode($temp_settings);
        if (isset($clean_settings->rating_post_types)) {
          $post_types_for_rating = explode(',',$clean_settings->rating_post_types);
          foreach ($post_types_for_rating as $key => $post_type) {
            update_option( $post_type.'_redq_rating', $post_id);
          }
        }else{
          update_option( 'post_redq_rating', $post_id);
        }
      }
    }
  }
}
