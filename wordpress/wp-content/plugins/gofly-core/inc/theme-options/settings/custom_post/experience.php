<?php
/*-------------------------------------------------------
		  ** Experience  Options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
  'parent' => 'custom_post_type_settings',
  'id'     => 'experience_option_settings',
  'title'  => esc_html__('Experience  Options', 'gofly-core'),
  'icon'   => 'fa fa-xing-square',
  'fields' => array(

    // Experience Archive
    array(
      'type'    => 'heading',
      'content' => 'Archive Page',
    ),
    array(
      'id'       => 'exp_topbar_filter',
      'type'     => 'switcher',
      'title'    => 'Hide Topbar',
      'text_on'  => 'Yes',
      'text_off' => 'No',
      'label'    => 'Do you want hide it ?',
      'default'  => false
    ),
    array(
      'id'       => 'exp_sidebar_filter',
      'type'     => 'switcher',
      'title'    => 'Hide Sidebar',
      'text_on'  => 'Yes',
      'text_off' => 'No',
      'label'    => 'Do you want hide it ?',
      'default'  => false
    ),
    array(
      'id'      => 'exp_posts_per_page',
      'type'    => 'number',
      'title'   => esc_html__('Posts Per Page', 'gofly-core'),
      'default' => 8,
    ),


    // Experience Details
    array(
      'type'    => 'heading',
      'content' => 'Details Page',
    ),
    array(
      'id'      => 'exp_inquiry_form_title',
      'type'    => 'text',
      'title'   => esc_html__('Inquiry Form Title', 'gofly-core'),
      'default' => 'We’d Love to Hear From You!',
    ),
    array(
      'id'      => 'exp_inquiry_form_shortcode',
      'type'    => 'text',
      'title'   => esc_html__('Inquiry Form Shortcode', 'gofly-core'),
      'default' => '[contact-form-7 title="Package Inquiry"]',
    ),


  ),

));
