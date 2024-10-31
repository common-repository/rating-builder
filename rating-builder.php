<?php

/*
* Plugin Name: Rating Builder
* Plugin URI: http://codecanyon.com/user/redqteam
* Description: Build rating system for your post, product or any custom post.
* Version: 1.0.3
* Author: redq
* Author URI: http://redq.io
* Requires at least: 4.6
*
* Text Domain: redq-rating-builder
*
* Copyright: © 2017 redqteam.
* License: GNU General Public License v3.0
* License URI: http://www.gnu.org/licenses/gpl-3.0.html
*
*/

if (!function_exists('redq_rb_generate_random_string'))   {
  function redq_rb_generate_random_string($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $redq_rb_random_string = '';
    for ($i = 0; $i < $length; $i++) {
      $redq_rb_random_string .= $characters[rand(0, $charactersLength - 1)];
    }
    return $redq_rb_random_string;
  }
}

class Redq_rating_builder {
  /**
  * @var null
  */
  protected static $_instance = null;
  /**
  * @create instance on self
  */
  public static function instance() {
    if ( is_null( self::$_instance ) ) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }
  public function __construct(){
    $this->redq_rb_app_bootstrap();
    add_action( 'plugins_loaded', array( &$this, 'redq_rb_language_textdomain' ), 1 );
    add_action('admin_enqueue_scripts', array( $this , 'redq_rb_enqueue_admin_script' ));
    add_action('wp_enqueue_scripts', array( $this , 'redq_rb_enqueue_script' ));
  }

  public function redq_rb_enqueue_admin_script(){
    wp_register_script( 'react', REDQ_RB_VENDOR.'react.min.js', array(), $ver = true, true);
    wp_enqueue_script( 'react' );
    wp_register_script( 'react-dom', REDQ_RB_VENDOR.'react-dom.min.js', array(), $ver = true, true);
    wp_enqueue_script( 'react-dom' );
    $this->redq_rb_load_reuse_form_scripts();
    wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), $ver = false, $media = 'all');
    wp_enqueue_style('font-awesome');

    wp_register_style('ionicons', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), $ver = false, $media = 'all');
    wp_enqueue_style('ionicons');

		wp_register_style('redq-rating-builder-style', REDQ_RB_VENDOR.'css/redq-rating-builder-style.css', array(), $ver = true, $media = 'all');
    wp_enqueue_style('redq-rating-builder-style');

		$reuse_shortcode_builder_backend_scripts = json_decode(file_get_contents( REDQ_RB_DIR . "/resource/frontend-assets.json"),true);
    foreach ($reuse_shortcode_builder_backend_scripts as $filename => $file) {
      wp_register_script( $filename, REDQ_RB_JS. $file['js'] , array('jquery', 'underscore'), $ver = false, true);
      wp_enqueue_script( $filename );
      wp_localize_script($filename, 'RATING_FRONTEND', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
      ));
    }
    wp_register_style('magnific-popup', REDQ_RB_VENDOR.'css/magnific-popup.css', array(), $ver = true, $media = 'all');
    wp_enqueue_style('magnific-popup');
		wp_register_script('magnific-popup-js', REDQ_RB_VENDOR.'magnific-popup.js', array(), $ver = false, true);
    wp_enqueue_script('magnific-popup-js');
		wp_register_script( 'wp-rating-custom', REDQ_RB_VENDOR.'wp-rating-custom.js', array(), $ver = false, true);
    wp_enqueue_script( 'wp-rating-custom' );

    $current_screen = $this->redq_rb_current_screen();
    if ($current_screen === 'redq_rb_post') {
      require(REDQ_RB_DIR.'/includes/admin/rating-builder-array.php');
      $reuse_shortcode_builder_backend_scripts = json_decode(file_get_contents( REDQ_RB_DIR . "/resource/admin-assets.json"),true);
      foreach ($reuse_shortcode_builder_backend_scripts as $filename => $file) {
        wp_register_script( $filename, REDQ_RB_JS. $file['js'] , array('jquery', 'underscore'), $ver = false, true);
        wp_enqueue_script( $filename );
        wp_localize_script($filename, 'RATING_BACKEND', array(
          'backend_array' => $redq_rb_settings_array,
        ));
      }
    }
  }

  public function redq_rb_enqueue_script(){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
 		wp_register_script( 'rb-media-upload', REDQ_RB_VENDOR.'media-upload.js', array(), $ver = false, true);
    wp_enqueue_script( 'rb-media-upload' );
 		wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
 		wp_enqueue_media();
    wp_register_script( 'react', REDQ_RB_VENDOR.'react.min.js', array(), $ver = true, true);
    wp_enqueue_script( 'react' );
    wp_register_script( 'react-dom', REDQ_RB_VENDOR.'react-dom.min.js', array(), $ver = true, true);
    wp_enqueue_script( 'react-dom' );
    $this->redq_rb_load_reuse_form_scripts();
    wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), $ver = false, $media = 'all');
    wp_enqueue_style('font-awesome');
    wp_register_style('ionicons', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), $ver = false, $media = 'all');
    wp_enqueue_style('ionicons');
    wp_register_style('redq-rating-review', REDQ_RB_VENDOR.'css/redq-review.css', array(), $ver = true, $media = 'all');
    wp_enqueue_style('redq-rating-review');
		wp_register_style('magnific-popup', REDQ_RB_VENDOR.'css/magnific-popup.css', array(), $ver = true, $media = 'all');
    wp_enqueue_style('magnific-popup');
		wp_register_script('magnific-popup-js', REDQ_RB_VENDOR.'magnific-popup.js', array(), $ver = false, true);
    wp_enqueue_script('magnific-popup-js');
		wp_register_style('redq-rating-builder-style', REDQ_RB_VENDOR.'css/redq-rating-builder-style.css', array(), $ver = true, $media = 'all');
    wp_enqueue_style('redq-rating-builder-style');
    $reuse_shortcode_builder_backend_scripts = json_decode(file_get_contents( REDQ_RB_DIR . "/resource/frontend-assets.json"),true);
    foreach ($reuse_shortcode_builder_backend_scripts as $filename => $file) {
      wp_register_script( $filename, REDQ_RB_JS. $file['js'] , array('jquery', 'underscore'), $ver = false, true);
      wp_enqueue_script( $filename );
      wp_localize_script($filename, 'RATING_FRONTEND', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
      ));
    }
		wp_register_script( 'wp-rating-custom', REDQ_RB_VENDOR.'wp-rating-custom.js', array(), $ver = false, true);
    wp_enqueue_script( 'wp-rating-custom' );
  }

  public function redq_rb_app_bootstrap(){
    /**
    * Define plugin constant
    */
    define( 'REDQ_RB_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
    define( 'REDQ_RB_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );
    define( 'REDQ_RB_FILE', __FILE__ );
    define( 'REDQ_RB_CSS' , REDQ_RB_URL.'/assets/dist/vendor/css' );
    define( 'REDQ_RB_DIST_CSS' , REDQ_RB_URL.'/assets/dist/css/' );
    define( 'REDQ_RB_JS' ,  REDQ_RB_URL.'/assets/dist/js/' );
    define( 'REDQ_RB_REUSE_JS' ,  REDQ_RB_URL.'/assets/dist/reuse-form/' );
    define( 'REDQ_RB_VENDOR' ,  REDQ_RB_URL.'/assets/dist/vendor/' );
    require(REDQ_RB_DIR.'/vendor/autoload.php');
    new Redq_Rb_Post_Type();
    new Redq_Rb_Extend_Comment();
    new Redq_Rb_Comment_Form_Extend();
    new Redq_Rb_Save_Rating();
    new Redq_Rb_Shortcode_Review();
    new Redq_Rb_Handle_Ajax();
  }
  /**
  * Get the plugin textdomain for multilingual.
  * @return null
  */
  public function redq_rb_language_textdomain() {
    load_plugin_textdomain( 'redq-rating-builder', false,dirname( plugin_basename( __FILE__ ) ) . '/languages/');
  }

  public function redq_rb_current_screen() {
    $info = get_current_screen();
    $current_screen = null;
    if($info->base == 'post' || $info->base == 'term' || $info->base == 'edit-tags' )
    $current_screen = $info->post_type;
    elseif ($info->post_type == null)
    $current_screen = $info->base; // take the base when it's a page or options
    return $current_screen;
  }

  public function redq_rb_load_reuse_form_scripts(){
    if ( !is_plugin_active( 'redq-reuse-form/redq-reuse-form.php' ) ) {
      wp_register_script( 'reuse-form-variable', REDQ_RB_VENDOR.'reuse-form-variable.js', array(), $ver = true, true);
      wp_enqueue_script( 'reuse-form-variable' );
      wp_register_style('reuse-form-two', REDQ_RB_DIST_CSS.'reuse-form-two.css', array(), $ver = false, $media = 'all');
      wp_enqueue_style('reuse-form-two');
      wp_register_style('reuse-form', REDQ_RB_DIST_CSS.'reuse-form.css', array(), $ver = false, $media = 'all');
      wp_enqueue_style('reuse-form');
      $reuse_form_scripts = new Red_Rb_Reuse;
      $webpack_public_path = get_option('webpack_public_path_url', true);
      $reuse_form_scripts->load($webpack_public_path);

    }
  }
}
/**
* @return null|redq-rating-builder
*/
function redq_rb_rating_builder() {
  return Redq_rating_builder::instance();
}
$GLOBALS['redq-rb-rating-builder'] = redq_rb_rating_builder();

register_activation_hook( __FILE__, 'redq_rb_activation_init_func' );
function redq_rb_activation_init_func() {
  // Add the admin notice notifier during plugin activation. Default set to false.
  add_option('reactive_builder_admin_notices', false);
  $webpack_public_path = get_option('webpack_public_path_url', true);
  if($webpack_public_path == '' || $webpack_public_path == '1'){
    update_option('webpack_public_path_url', REDQ_RB_REUSE_JS);
  }
}
