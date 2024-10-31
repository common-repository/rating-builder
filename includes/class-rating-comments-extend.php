<?php
/**
 * Class Rating Comments Template Override
 *
 * @author      RedQTeam
 * @category    Admin
 * @package     rating-builder\includes
 * @version     1.0.0
 * @since       1.0.0
 */
class Redq_Rb_Extend_Comment{

  public function __construct(){
    add_filter( "get_comment_text", array($this, 'redq_rb_extend_comment'), 99, 2 );
    add_filter( "woocommerce_product_review_comment_form_args", array($this, 'redq_rb_woocommerce_rating_override'));
  }

  public function redq_rb_woocommerce_rating_override($comment_form){
    return;
  }

  public function redq_rb_extend_comment( $content , $comment) {
		if($comment->comment_parent == 0){
			global $post;
	    $rating_id = get_option( $post->post_type.'_redq_rating', true ) ? get_option( $post->post_type.'_redq_rating', true ) : ''  ;
	    $stored_rating_settings = get_post_meta( $rating_id, 'red_rb_stored_settings', true );
			$images_rendered_dom = '';
	    if(!empty($stored_rating_settings)){
	      $temp_settings = stripslashes_deep($stored_rating_settings);
	      $clean_settings = json_decode($temp_settings);
	      $rating_post_types = explode(',',$clean_settings->rating_post_types);
	      if (in_array($post->post_type, $rating_post_types)) {
	        $comment_rating = get_comment_meta( $comment->comment_ID, 'redq_rb_comment_rating', true );
					$comment_likes = get_comment_meta( $comment->comment_ID, 'number_of_likes', true );
					$comment_dislikes = get_comment_meta( $comment->comment_ID, 'number_of_dislikes', true );
					$rating_attachments = get_comment_meta( $comment->comment_ID, 'redq_rb_rating_attachments', true );
					if(isset($rating_attachments) &&  $rating_attachments != ''){
						$all_attachments_object = json_decode($rating_attachments);
						if(is_array($all_attachments_object->reuse_button_imageupload)){
							$images_rendered_dom .= '<ul class="rqt_comment_attachments_wrap">';
								foreach ($all_attachments_object->reuse_button_imageupload as $key => $singleImage) {
									$thumb_url = wp_get_attachment_thumb_url($singleImage->id);
									$images_rendered_dom .= '<li><a class="comment_attachments" href="'.esc_url($singleImage->url).'"><img src="'.esc_url($thumb_url).'" alt="Opps!"></a></li>';
								}
								$images_rendered_dom .= '</ul>';
						}
					}
					$like_dislike_div = '';
					if(is_user_logged_in()){
						$like_dislike_div = '<div id="ratingLikings-'. esc_attr($comment->comment_ID).'" data-comment-id="'.esc_attr($comment->comment_ID).'" data-dislikes="'.esc_attr($comment_dislikes).'" data-likes="'.esc_attr($comment_likes).'"></div>';
					}
	        return '<div class="rating-parent">
	          <div style="display: none;" class="show-rating" id="comment-rating-'. esc_attr($comment->comment_ID).'">'. esc_attr( $comment_rating ).'</div>
	          <div id="rqrating-'. esc_attr($comment->comment_ID).'" data-recieve="false"></div>
	        </div>'.$content. ''. $images_rendered_dom . '' .$like_dislike_div;
	      }
	    }
		}
    return $content;
  }
}
