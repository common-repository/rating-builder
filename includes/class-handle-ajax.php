<?php
class Redq_Rb_Handle_Ajax{
  public function __construct(){
    add_action('wp_ajax_redq_rb_save_review', array( $this, 'redq_rb_save_review'), 1);
    add_action('wp_ajax_increase_like_dislike', array( $this, 'increase_like_dislike'), 1);
	}
  public function redq_rb_save_review(){
    $comment_content = isset($_POST['post_review']) ? sanitize_text_field($_POST['post_review']) : '';
    $comment_rating = new stdClass();
    $comment_rating->reuse_button_rating = isset($_POST['reuse_button_rating']) ? sanitize_text_field($_POST['reuse_button_rating']) : '';
    $comment_rating = json_encode($comment_rating);
    $post_id = isset($_POST['postID']) ? sanitize_text_field($_POST['postID']) : '';
    $current_user = wp_get_current_user();
    $commentdata = array(
    	'comment_post_ID' => $post_id, // to which post the comment will show up
    	'comment_author' => $current_user->user_nicename, //fixed value - can be dynamic
    	'comment_author_email' => $current_user->user_email, //fixed value - can be dynamic
    	'comment_author_url' => $current_user->user_url, //fixed value - can be dynamic
    	'comment_content' => $comment_content, //fixed value - can be dynamic
    	'comment_type' => '', //empty for regular comments, 'pingback' for pingbacks, 'trackback' for trackbacks
    	'comment_parent' => 0, //0 if it's not a reply to another comment; if it's a reply, mention the parent comment ID here
    	'user_id' => $current_user->ID, //passing current user ID or any predefined as per the demand
    );

    $comment_id = wp_new_comment( $commentdata );
    update_comment_meta($comment_id, 'redq_rb_comment_rating', $comment_rating);

  }

  public function increase_like_dislike() {
    $comment_id = $_POST['commentID'];
		$increase = $_POST['increase'];
    $user_id = get_current_user_id();
		$liked_user = get_comment_meta( $comment_id, 'liked_user', true ) == '' ? [] : get_comment_meta( $comment_id, 'liked_user', true );
		$disliked_user = get_comment_meta( $comment_id, 'disliked_user', true ) == '' ? [] : get_comment_meta( $comment_id, 'disliked_user', true );
		switch ($increase) {
      case 'likes':
        if(!in_array($user_id, $liked_user) && !in_array($user_id, $disliked_user)){
          $number_of_likes = $this->get_number_of_like_dislike($comment_id, 'number_of_likes');
          $number_of_dislikes = $this->get_number_of_like_dislike($comment_id, 'number_of_dislikes') >= 1 ? $this->get_number_of_like_dislike($comment_id, 'number_of_dislikes') - 1 : $this->get_number_of_like_dislike($comment_id, 'number_of_dislikes');
          update_comment_meta( $comment_id, 'number_of_likes', $number_of_likes);
          $liked_user[] = $user_id;
          update_comment_meta( $comment_id, 'liked_user', $liked_user);
          echo json_encode( array( 'number_of_likes' => $number_of_likes,  'number_of_dislikes' => $number_of_dislikes));
        }else if(in_array($user_id, $liked_user)){
					$number_of_likes = $this->get_number_of_like_dislike($comment_id, 'number_of_likes');
          $number_of_dislikes = $this->get_number_of_like_dislike($comment_id, 'number_of_dislikes') >= 1 ? $this->get_number_of_like_dislike($comment_id, 'number_of_dislikes') - 1 : $this->get_number_of_like_dislike($comment_id, 'number_of_dislikes');
					$number_of_likes = $number_of_likes > 1 ? $number_of_likes - 2 : $number_of_likes;
          update_comment_meta( $comment_id, 'number_of_likes', $number_of_likes);
					$user_key = array_search($user_id, $liked_user);
			    if (false !== $user_key) {
			        unset($liked_user[$user_key]);
			    }
          update_comment_meta( $comment_id, 'liked_user', $liked_user);
          echo json_encode( array( 'number_of_likes' => $number_of_likes,  'number_of_dislikes' => $number_of_dislikes));
        }else if(in_array($user_id, $disliked_user)){
          $number_of_dislikes = $this->get_number_of_like_dislike($comment_id, 'number_of_dislikes');
					$number_of_dislikes = $number_of_dislikes > 1 ? $number_of_dislikes - 2 : $number_of_dislikes;
          update_comment_meta( $comment_id, 'number_of_dislikes', $number_of_dislikes);
					$user_key = array_search($user_id, $disliked_user);
			    if (false !== $user_key) {
			        unset($disliked_user[$user_key]);
			    }
          update_comment_meta( $comment_id, 'disliked_user', $disliked_user);
          $number_of_likes = $this->get_number_of_like_dislike($comment_id, 'number_of_likes');
          update_comment_meta( $comment_id, 'number_of_likes', $number_of_likes);
          $liked_user[] = $user_id;
          update_comment_meta( $comment_id, 'liked_user', $liked_user);
          echo json_encode( array( 'number_of_likes' => $number_of_likes,  'number_of_dislikes' => $number_of_dislikes));
				}
        break;
      case 'dislikes':
      if(!in_array($user_id, $liked_user) && !in_array($user_id, $disliked_user)){
        $number_of_dislikes = $this->get_number_of_like_dislike($comment_id, 'number_of_dislikes');
        $number_of_likes = $this->get_number_of_like_dislike($comment_id, 'number_of_likes') >= 1 ? $this->get_number_of_like_dislike($comment_id, 'number_of_likes') -1 : $this->get_number_of_like_dislike($comment_id, 'number_of_likes');
        update_comment_meta( $comment_id, 'number_of_dislikes', $number_of_dislikes);
        $disliked_user[] = $user_id;
        update_comment_meta( $comment_id, 'disliked_user', $disliked_user);
        // echo $number_of_dislikes;
        echo json_encode( array( 'number_of_likes' => $number_of_likes,  'number_of_dislikes' => $number_of_dislikes));
      }else if(in_array($user_id, $disliked_user)){
        $number_of_likes = $this->get_number_of_like_dislike($comment_id, 'number_of_likes') >= 1 ? $this->get_number_of_like_dislike($comment_id, 'number_of_likes') - 1 : $this->get_number_of_like_dislike($comment_id, 'number_of_likes');
        $number_of_dislikes = $this->get_number_of_like_dislike($comment_id, 'number_of_dislikes');
        $number_of_dislikes = $number_of_dislikes > 1 ? $number_of_dislikes - 2 : $number_of_dislikes;
        update_comment_meta( $comment_id, 'number_of_dislikes', $number_of_dislikes);
        $user_key = array_search($user_id, $disliked_user);
        if (false !== $user_key) {
            unset($disliked_user[$user_key]);
        }
        update_comment_meta( $comment_id, 'disliked_user', $disliked_user);
        echo json_encode( array( 'number_of_likes' => $number_of_likes,  'number_of_dislikes' => $number_of_dislikes));
      }else if(in_array($user_id, $liked_user)){
        $number_of_likes = $this->get_number_of_like_dislike($comment_id, 'number_of_likes');
        $number_of_likes = $number_of_likes > 1 ? $number_of_likes - 2 : $number_of_likes;
        update_comment_meta( $comment_id, 'number_of_likes', $number_of_likes);
        $user_key = array_search($user_id, $liked_user);
        if (false !== $user_key) {
          unset($liked_user[$user_key]);
        }
        update_comment_meta( $comment_id, 'liked_user', $liked_user);
        $number_of_dislikes = $this->get_number_of_like_dislike($comment_id, 'number_of_dislikes');
        update_comment_meta( $comment_id, 'number_of_dislikes', $number_of_dislikes);
        $disliked_user[] = $user_id;
        update_comment_meta( $comment_id, 'disliked_user', $disliked_user);
        echo json_encode( array( 'number_of_likes' => $number_of_likes,  'number_of_dislikes' => $number_of_dislikes));
      }
        break;
      default:
        break;
    }

		wp_die();

  }

  public function get_number_of_like_dislike($comment_id, $meta_key) {
    $previous_number_of_likes_dislikes = get_comment_meta( $comment_id, $meta_key, true );
    if($previous_number_of_likes_dislikes != ''){
      $number_of_likes_dislikes = $previous_number_of_likes_dislikes + 1;
    }else{
      $number_of_likes_dislikes = 1;
    }
    return $number_of_likes_dislikes;
  }
}
