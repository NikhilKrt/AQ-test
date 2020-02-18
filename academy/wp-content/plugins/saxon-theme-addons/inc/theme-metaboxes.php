<?php
/**
 * Theme custom metaboxes
 **/

// CMB2 METABOXES

// POST REVIEW SETTINGS METABOX
if(!function_exists('saxon_register_post_review_settings_metabox')):
function saxon_register_post_review_settings_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_saxon_';

  // POST SETTINGS METABOX
  $cmb_post_review_settings = new_cmb2_box( array(
    'id'           => $prefix . 'post_review_metabox',
    'title'        => esc_html__( 'Post Review', 'saxon-ta' ),
    'object_types' => array( 'post' ), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
  ) );

  $cmb_post_review_settings->add_field( array(
    'name' => esc_html__( 'Enable review block', 'saxon-ta' ),
    'desc' => esc_html__( 'Enable to show review block for post and set review settings below.', 'saxon-ta' ),
    'id'   => $prefix . 'post_review_enabled',
    'type' => 'checkbox',
  ) );

  $cmb_post_review_settings->add_field( array(
    'name'    => esc_html__( 'Review block title', 'saxon-ta' ),
    'desc'    => esc_html__( 'Displayed in review block header.', 'saxon-ta' ),
    'default' => '',
    'id'      => $prefix . 'post_review_title',
    'type'    => 'text_medium',
  ) );

  $cmb_post_review_settings->add_field( array(
    'name'    => esc_html__( 'Review block summary', 'saxon-ta' ),
    'desc'    => esc_html__( 'Short summary for review.', 'saxon-ta' ),
    'default' => '',
    'id'      => $prefix . 'post_review_summary',
    'type'    => 'textarea_small',
  ) );

  $cmb_post_review_settings->add_field( array(
    'name'    => esc_html__( 'Review accent color', 'saxon-ta' ),
    'desc'    => esc_html__( 'Used in review block.', 'saxon-ta' ),
    'id'      => $prefix . 'post_review_color',
    'type'    => 'colorpicker',
    'default' => '#1F5DEA',
  ) );

  $cmb_post_review_settings->add_field( array(
    'name'    => esc_html__( 'Positives', 'saxon-ta' ),
    'desc'    => esc_html__( 'Positives list (1 per line)', 'saxon-ta' ),
    'default' => '',
    'id'      => $prefix . 'post_review_positives',
    'type'    => 'textarea_small',
  ) );

  $cmb_post_review_settings->add_field( array(
    'name'    => esc_html__( 'Negatives', 'saxon-ta' ),
    'desc'    => esc_html__( 'Negatives list (1 per line)', 'saxon-ta' ),
    'default' => '',
    'id'      => $prefix . 'post_review_negatives',
    'type'    => 'textarea_small',
  ) );

  $cmb_post_review_settings->add_field( array(
    'name'    => esc_html__( 'Buy button url', 'saxon-ta' ),
    'desc'    => esc_html__( 'Leave empty to disable "Where to buy" section in review.', 'saxon-ta' ),
    'default' => '',
    'id'      => $prefix . 'post_review_button_url',
    'type'    => 'text_medium',
  ) );

  $cmb_post_review_settings->add_field( array(
    'name'    => esc_html__( 'Buy button title', 'saxon-ta' ),
    'desc'    => esc_html__( 'For ex. "Buy on Amazon"', 'saxon-ta' ),
    'default' => '',
    'id'      => $prefix . 'post_review_button_title',
    'type'    => 'text_medium',
  ) );

  $cmb_review_criteria_group = $cmb_post_review_settings->add_field( array(
    'id'          => $prefix . 'review_criteria_group',
    'type'        => 'group',
    // 'repeatable'  => false, // use false if you want non-repeatable group
    'options'     => array(
      'group_title'       => esc_html__( 'Review criteria {#}', 'saxon-ta' ),
      'add_button'        => esc_html__( 'Add review criteria', 'saxon-ta' ),
      'remove_button'     => esc_html__( 'Remove review criteria', 'saxon-ta' ),
      'sortable'          => true,
      // 'closed'         => true, // true to have the groups closed by default
      // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
    ),
  ) );

  // Id's for group's fields only need to be unique for the group. Prefix is not needed.
  $cmb_post_review_settings->add_group_field( $cmb_review_criteria_group, array(
    'name' => esc_html__( 'Criteria title', 'saxon-ta' ),
    'id'   => 'criteria_title',
    'type' => 'text',
    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
  ) );

  $cmb_post_review_settings->add_group_field( $cmb_review_criteria_group, array(
    'name' => esc_html__( 'Criteria rating (%)', 'saxon-ta' ),
    'description' => esc_html__( 'Your rating for this criteria, for ex: 95 (means 95%)', 'saxon-ta' ),
    'id'   => 'criteria_value',
    'type' => 'text_small',
  ) );

}
endif;
add_action( 'cmb2_init', 'saxon_register_post_review_settings_metabox' );

// POST/PAGE SETTINGS METABOXES
if(!function_exists('saxon_register_post_format_settings_metabox')):
function saxon_register_post_format_settings_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_saxon_';

  // POST SETTINGS METABOX
  $cmb_post_settings = new_cmb2_box( array(
    'id'           => $prefix . 'post_settings_metabox',
    'title'        => esc_html__( 'Post Settings', 'saxon-ta' ),
    'object_types' => array( 'post' ), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
  ) );

  $cmb_post_settings->add_field( array(
    'name' => esc_html__( 'Featured post', 'saxon-ta' ),
    'desc' => esc_html__( 'Post will be added to blocks that show "Featured posts".', 'saxon-ta' ),
    'id'   => $prefix . 'post_featured',
    'type' => 'checkbox',
  ) );

  $cmb_post_settings->add_field( array(
    'name' => esc_html__( 'Editors Pick\'s post', 'saxon-ta' ),
    'desc' => esc_html__( 'Post will be added to blocks that show "Editor\'s Picks posts".', 'saxon-ta' ),
    'id'   => $prefix . 'post_editorspicks',
    'type' => 'checkbox',
  ) );

  $cmb_post_settings->add_field( array(
    'name' => esc_html__( 'Promoted post', 'saxon-ta' ),
    'desc' => esc_html__( 'Post will be added to blocks that show "Promoted posts".', 'saxon-ta' ),
    'id'   => $prefix . 'post_promoted',
    'type' => 'checkbox',
  ) );

  $cmb_post_settings->add_field( array(
    'name' => esc_html__( 'Disable featured image', 'saxon-ta' ),
    'desc' => esc_html__( 'Don\'t show featured image on single post page.', 'saxon-ta' ),
    'id'   => $prefix . 'post_image_disable',
    'type' => 'checkbox',
  ) );

  $cmb_post_settings->add_field( array(
    'name' => esc_html__( 'Disable social share buttons', 'saxon-ta' ),
    'desc' => esc_html__( 'Don\'t show social share buttons in this post.', 'saxon-ta' ),
    'id'   => $prefix . 'post_social_disable',
    'type' => 'checkbox',
  ) );

  $cmb_post_settings->add_field( array(
    'name'             => 'Post sidebar position',
    'desc'             => '',
    'id'               => $prefix . 'post_sidebar_position',
    'type'             => 'select',
    'show_option_none' => true,
    'default'          => '0',
    'options'          => array(
      '0' => esc_html__( 'Use theme settings', 'saxon-ta' ),
      'left'   => esc_html__( 'Left', 'saxon-ta' ),
      'right'     => esc_html__( 'Right', 'saxon-ta' ),
      'disable'     => esc_html__( 'Disable', 'saxon-ta' ),
    ),
  ) );

  $cmb_post_settings->add_field( array(
    'name'    => esc_html__( 'Post views', 'saxon-ta' ),
    'desc'    => esc_html__( 'You can change post views counter value here.', 'saxon-ta' ),
    'default' => '',
    'id'      => '_saxon_post_views_count',
    'type'    => 'text_small',
  ) );

  $cmb_post_settings->add_field( array(
    'name'    => esc_html__( 'Post likes', 'saxon-ta' ),
    'desc'    => esc_html__( 'You can change post likes counter value here.', 'saxon-ta' ),
    'default' => '',
    'id'      => '_saxon_post_likes_count',
    'type'    => 'text_small',
  ) );

  // PAGE SETTINGS METABOX
  $cmb_page_settings = new_cmb2_box( array(
    'id'           => $prefix . 'page_settings_metabox',
    'title'        => esc_html__( 'Page Settings', 'saxon-ta' ),
    'object_types' => array( 'page' ), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
  ) );

  $cmb_page_settings->add_field( array(
    'name'    => esc_html__( 'Page CSS class', 'saxon-ta' ),
    'desc'    => esc_html__( 'You can add CSS class to page for use with your Custom CSS code to change elements styles only on this page.', 'saxon-ta' ),
    'default' => '',
    'id'      => $prefix . 'page_css_class',
    'type'    => 'text',
  ) );

  $cmb_page_settings->add_field( array(
    'name' => esc_html__( 'Don\'t display this page title', 'saxon-ta' ),
    'desc' => esc_html__( 'Disable page title and show only page content', 'saxon-ta' ),
    'id'   => $prefix . 'page_disable_title',
    'type' => 'checkbox',
  ) );

  $cmb_page_settings->add_field( array(
    'name'             => 'Page sidebar position',
    'desc'             => '',
    'id'               => $prefix . 'page_sidebar_position',
    'type'             => 'select',
    'show_option_none' => true,
    'default'          => '0',
    'options'          => array(
      '0' => esc_html__( 'Use theme settings', 'saxon-ta' ),
      'left'   => esc_html__( 'Left', 'saxon-ta' ),
      'right'     => esc_html__( 'Right', 'saxon-ta' ),
      'disable'     => esc_html__( 'Disable', 'saxon-ta' ),
    ),
  ) );

  // POST/PAGE HEADER BACKGROUND METABOX
  $cmb_post_header_settings = new_cmb2_box( array(
    'id'           => $prefix . 'post_header_settings_metabox',
    'title'        => esc_html__( 'Header Background', 'saxon-ta' ),
    'object_types' => array( 'post', 'page' ), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
  ) );

  $cmb_post_header_settings->add_field( array(
    'name'         => esc_html__( 'Header Background image', 'saxon-ta' ),
    'desc'         => esc_html__( 'You can display image background in your post/page header with post title. Use wide image here.', 'saxon-ta' ),
    'id'           => $prefix . 'header_image',
    'type'         => 'file',
    'options' => array(
        'url' => false, // Hide the text input for the url
        'add_upload_file_text' => 'Select or Upload Image'
    ),
    'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
  ) );

  // POST FORMAT SETTINGS METABOX
  $cmb_post_format_settings = new_cmb2_box( array(
    'id'           => $prefix . 'post_format_settings_metabox',
    'title'        => esc_html__( 'Post Formats options', 'saxon-ta' ),
    'object_types' => array( 'post' ), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
  ) );

  $cmb_post_format_settings->add_field( array(
    'name'         => wp_kses_post(__( 'Gallery images<br> (for <i>Gallery</i> post format).', 'saxon-ta' )),
    'desc'         => esc_html__( 'Use this field to add your images for gallery in Gallery post format. Use SHIFT/CTRL keyboard buttons to select multiple images.', 'saxon-ta' ),
    'id'           => $prefix . 'gallery_file_list',
    'type'         => 'file_list',
    'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
  ) );

  $cmb_post_format_settings->add_field( array(
    'name' => wp_kses_post(__( 'Video url<br> (for <i>Video</i> post format)', 'saxon-ta' )),
    'desc' => esc_html__( 'Enter a Youtube, Vimeo, Flickr, TED or Vine video page url for Video post format.', 'saxon-ta' ),
    'id'   => $prefix . 'video_embed',
    'type' => 'oembed',
  ) );

  $cmb_post_format_settings->add_field( array(
    'name' => wp_kses_post(__( 'Audio url<br> (for <i>Audio</i> post format)', 'saxon-ta' )),
    'desc' => esc_html__( 'Enter a SoundCloud, Mixcloud, Rdio or Spotify audio page url for Audio post format.', 'saxon-ta' ),
    'id'   => $prefix . 'audio_embed',
    'type' => 'oembed',
  ) );

  // SUGGESTED POST METABOX
  $cmb_post_worthreading_settings = new_cmb2_box( array(
    'id'           => $prefix . 'post_worthreading_settings_metabox',
    'title'        => esc_html__( 'Suggested posts for "Worth reading" block', 'saxon-ta' ),
    'object_types' => array( 'post' ), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => false, // Show field names on the left
  ) );

  $cmb_post_worthreading_settings->add_field( array(
  'name'    => esc_html__( 'Suggested posts', 'saxon-ta' ),
  'desc'    => esc_html__( 'Click "+" or drag and drop post to "Attached posts" table to add it. One from selected posts will be randomly displayed in "Worth reading" block on single post page, if you enabled this feature in Theme Settings.', 'saxon-ta' ),
  'id'      => $prefix . 'worthreading_posts',
  'type'    => 'custom_attached_posts',
  'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
  'options' => array(
    'show_thumbnails' => true, // Show thumbnails on the left
    'filter_boxes'    => true, // Show a text box for filtering the results
    'query_args'      => array(
      'posts_per_page' => 10,
      'post_type'      => 'post',
    ), // override the get_posts args
  ),
  ) );

}
endif;
add_action( 'cmb2_init', 'saxon_register_post_format_settings_metabox' );
