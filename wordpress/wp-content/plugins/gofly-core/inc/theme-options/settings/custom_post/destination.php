<?php
/*-------------------------------------------------------
		  ** Destination  Options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
  'parent' => 'custom_post_type_settings',
  'id'     => 'destination_option_settings',
  'title'  => esc_html__('Destination  Options', 'gofly-core'),
  'icon'   => 'fa fa-xing-square',
  'fields' => array(

    // Destination Archive
    array(
      'type'    => 'heading',
      'content' => 'Archive Page',
    ),
    array(
      'id'      => 'destn_posts_per_page',
      'type'    => 'number',
      'title'   => esc_html__('Posts Per Page', 'gofly-core'),
      'default' => 8,
    ),

  ),

));
