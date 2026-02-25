<?php
/*-------------------------------------------------------
		  ** Tour  Options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
  'parent' => 'custom_post_type_settings',
  'id'     => 'tour_option_settings',
  'title'  => esc_html__('Tour  Options', 'gofly-core'),
  'icon'   => 'fa fa-xing-square',
  'fields' => array(

    // Tour Archive
    array(
      'type'    => 'heading',
      'content' => 'Archive Page',
    ),
    array(
      'id'       => 'tour_topbar_filter',
      'type'     => 'switcher',
      'title'    => 'Hide Topbar',
      'text_on'  => 'Yes',
      'text_off' => 'No',
      'label'    => 'Do you want hide it ?',
      'default'  => false
    ),
    array(
      'id'       => 'tour_sidebar_filter',
      'type'     => 'switcher',
      'title'    => 'Hide Sidebar',
      'text_on'  => 'Yes',
      'text_off' => 'No',
      'label'    => 'Do you want hide it ?',
      'default'  => false
    ),
    array(
      'id'      => 'tour_posts_per_page',
      'type'    => 'number',
      'title'   => esc_html__('Posts Per Page', 'gofly-core'),
      'default' => 8,
    ),

    // Tour Details
    array(
      'type'    => 'heading',
      'content' => 'Details Page',
    ),
    array(
      'id'      => 'tour_inquiry_form_title',
      'type'    => 'text',
      'title'   => esc_html__('Inquiry Form Title', 'gofly-core'),
      'default' => 'We’d Love to Hear From You!',
    ),
    array(
      'id'      => 'tour_inquiry_form_shortcode',
      'type'    => 'text',
      'title'   => esc_html__('Inquiry Form Shortcode', 'gofly-core'),
      'default' => '[contact-form-7 title="Package Inquiry"]',
    ),


  ),

));
