<?php
/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {
    /*-------------------------------------------------------
	   ** Header  Options
   --------------------------------------------------------*/
    CSF::createSection($prefix, array(
        'id'    => 'header_options',
        'title' => esc_html__('Header', 'gofly-core'),
        'icon'  => 'fa fa-header'
    ));

    /*-----------------------------------
		REQUIRE Header FILES
	------------------------------------*/
    require_once EGNS_CORE_INC . '/theme-options/settings/header/header_options.php';
}
