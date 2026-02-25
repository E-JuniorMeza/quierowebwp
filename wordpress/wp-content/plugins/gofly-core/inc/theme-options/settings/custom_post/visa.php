<?php
/*-------------------------------------------------------
		  ** Visa  Options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
  'parent' => 'custom_post_type_settings',
  'id'     => 'visa_option_settings',
  'title'  => esc_html__('Visa Options', 'gofly-core'),
  'icon'   => 'fa fa-xing-square',
  'fields' => array(

    // Visa Archive
    array(
      'type'    => 'heading',
      'content' => 'Archive Page',
    ),
    array(
      'id'      => 'visa_posts_per_page',
      'type'    => 'number',
      'title'   => esc_html__('Posts Per Page', 'gofly-core'),
      'default' => 8,
    ),
    
  ),

));
