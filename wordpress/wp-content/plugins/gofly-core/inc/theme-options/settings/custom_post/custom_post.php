<?php
/*-------------------------------------------------------
		  ** Custom post type options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
  'id'    => 'custom_post_type_settings',
  'title' => esc_html__('Custom Posts', 'gofly-core'),
  'icon'  => 'fa fa-universal-access'
));

require_once EGNS_CORE_INC . '/theme-options/settings/custom_post/visa.php';
require_once EGNS_CORE_INC . '/theme-options/settings/custom_post/tour.php';
require_once EGNS_CORE_INC . '/theme-options/settings/custom_post/hotel.php';
require_once EGNS_CORE_INC . '/theme-options/settings/custom_post/experience.php';
require_once EGNS_CORE_INC . '/theme-options/settings/custom_post/destination.php';
