<?php
$icon_array = array(
	array(
		'name' => 'fa fa-star',
		'value' => 'fa fa-star',
	),
	array(
		'name' => 'fa fa-heart',
		'value' => 'fa fa-heart',
	),
);
  $post_types = get_post_types(array('public'   => true));
  unset($post_types['attachment']);
  unset($post_types['revision']);
  unset($post_types['nav_menu_item']);
  unset($post_types['custom_css']);
  unset($post_types['redq_rb_post']);
  unset($post_types['customize_changeset']);
  $redq_rb_settings_array = array(
    array(
      'id' => 'rating_filed_name',
      'type' => 'text-repeat',
      'label' => esc_attr('Rating Filed Name', 'redq-rating-builder'),
      'param' => 'rating_field_name',
      'placeholder' => esc_attr('Place Rating Name', 'redq-rating-builder'),
    ),
    array(
      'id' => 'rating_iconselect',
      'type' => 'iconselect',
      'label' =>  esc_attr('Select Icon', 'redq-rating-builder'),
      'param' => 'iconselect',
      'options' => apply_filters(
				'redq_rb_custom_rating_icons',
				$icon_array
			),
  ),
    array(
      'id' => 'rating_length',
      'type' => 'minmaxbutton',
      'label' => esc_attr('Pick Number of Rating Icon', 'redq-rating-builder'),
      'param' => 'rating_length',
      'subtitle' => '',
      'value' => 0,
      'step' => 1,
      'min' => 0,
      'max' => 10,
    ),
    array(
      'id' => 'attachments_enable',
      'type' => 'switch',
      'label' => esc_attr('Enable Attachments', 'redq-rating-builder'),
      'param' => 'attachments_enable',
      'value' => 'false',
    ),
    array(
      'id' => 'rating_post_types',
      'type' => 'select',
      'preload' => 'taxonomy',
      'preloaded_item' => 'post, product',
      'label' => esc_attr('Select Post Types', 'redq-rating-builder'),
      'param' => 'rating_post_types',
      'multiple' => 'true',
      'options' => $post_types,
      'value' => 'post',
    ),
  );
