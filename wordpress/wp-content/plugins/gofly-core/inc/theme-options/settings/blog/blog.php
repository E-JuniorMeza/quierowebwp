<?php
/*-------------------------------------------------------
		  ** Blog  Options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
  'id'    => 'blog_settings',
  'title' => esc_html__('Blog Settings', 'gofly-core'),
  'icon'  => 'fa fa-rss'
));

require_once EGNS_CORE_INC . '/theme-options/settings/blog/blog_list.php';
