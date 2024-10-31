<?php

class Redq_Rb_Post_Type{

  public function __construct(){
    add_action( 'init', array( $this, 'redq_rb_post_type' ) );
    add_action( 'add_meta_boxes', array( $this ,'redq_rb_metaboxs' ) );
  }

  public function redq_rb_metaboxs(){
    add_meta_box( 'redq_rb_settings', 'Rating Builder Settings', array( $this , 'redq_rb_render_metabox') , 'redq_rb_post');
  }

  public function redq_rb_render_metabox(){
		global $post;
    $stored_settings = get_post_meta( $post->ID, 'red_rb_stored_settings', true ) ? get_post_meta( $post->ID, 'red_rb_stored_settings', true ) : ''  ;
    ?>
    <textarea style="display: none;" id="red_rb_stored_settings" name="red_rb_stored_settings"><?php echo esc_attr($stored_settings); ?></textarea>
    <div id="redq_rb"></div>
    <?php
  }

  public function redq_rb_post_type(){
    $labels = array(
      'name'                => _x( 'Rating', 'redq-rating-builder' ),
      'singular_name'       => _x( 'Rating', 'redq-rating-builder' ),
    );
    // Register wpb_rating post type
    register_post_type('redq_rb_post',
      // wpb_rating post type Options
      array(
        'label' => __( 'rating', 'redq-rating-builder' ),
        'description' => __( 'Rating news and reviews', 'redq-rating-builder' ),
        'labels' => $labels,
        'supports' => array( 'title'),
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'show_in_menu' => true,
        'rewrite' => array('slug' => 'wpb_generator_rating'),
        ));
  }
}
