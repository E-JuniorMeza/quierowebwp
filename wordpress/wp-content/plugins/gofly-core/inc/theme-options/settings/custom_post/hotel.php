<?php
/*-------------------------------------------------------
		  ** Hotel  Options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
  'parent' => 'custom_post_type_settings',
  'id'     => 'hotel_option_settings',
  'title'  => esc_html__('Hotel  Options', 'gofly-core'),
  'icon'   => 'fa fa-xing-square',
  'fields' => array(

    // Hotel Archive
    array(
      'type'    => 'heading',
      'content' => 'Archive Page',
    ),
    array(
      'id'       => 'hotel_search_filter',
      'type'     => 'switcher',
      'title'    => 'Hide Search Filter',
      'text_on'  => 'Yes',
      'text_off' => 'No',
      'label'    => 'Do you want hide it ?',
      'default'  => false
    ),
    array(
      'id'       => 'hotel_topbar_filter',
      'type'     => 'switcher',
      'title'    => 'Hide Topbar',
      'text_on'  => 'Yes',
      'text_off' => 'No',
      'label'    => 'Do you want hide it ?',
      'default'  => false
    ),
    array(
      'id'       => 'hotel_sidebar_filter',
      'type'     => 'switcher',
      'title'    => 'Hide Sidebar',
      'text_on'  => 'Yes',
      'text_off' => 'No',
      'label'    => 'Do you want hide it ?',
      'default'  => false
    ),
    array(
      'id'      => 'hotel_posts_per_page',
      'type'    => 'number',
      'title'   => esc_html__('Posts Per Page', 'gofly-core'),
      'default' => 6,
    ),

    // Hotel Details
    array(
      'type'    => 'heading',
      'content' => 'Details Page',
    ),
    array(
      'id'      => 'hotel_inquiry_form_title',
      'type'    => 'text',
      'title'   => esc_html__('Inquiry Form Title', 'gofly-core'),
      'default' => 'We’d Love to Hear From You!',
    ),
    array(
      'id'      => 'hotel_inquiry_form_shortcode',
      'type'    => 'text',
      'title'   => esc_html__('Inquiry Form Shortcode', 'gofly-core'),
      'default' => '[contact-form-7 title="Package Inquiry"]',
    ),

  ),

));
