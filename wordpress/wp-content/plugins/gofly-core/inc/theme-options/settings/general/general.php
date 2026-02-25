<?php
/*-------------------------------------------------------
		  ** General Options
	--------------------------------------------------------*/
if (class_exists('CSF')) {
  CSF::createSection($prefix, array(
    'title'  => esc_html('General'),
    'id'     => 'theme_general_options',
    'icon'   => 'fas fa-tools',
  ));
  /*-----------------------------------
		REQUIRE Header FILES
	------------------------------------*/
  require_once EGNS_CORE_INC . '/theme-options/settings/general/basic.php';
  require_once EGNS_CORE_INC . '/theme-options/settings/general/logo.php';
  require_once EGNS_CORE_INC . '/theme-options/settings/general/color_scheme.php';
  require_once EGNS_CORE_INC . '/theme-options/settings/general/typography.php';
  require_once EGNS_CORE_INC . '/theme-options/settings/general/price-format.php';
}
