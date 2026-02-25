<?php
/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {
    /*-------------------------------------------------------
	   ** Header Custom Scripts Options
   --------------------------------------------------------*/
    CSF::createSection($prefix, array(
        'id'    => 'custom_scripts',
        'title' => esc_html__('Custom Scripts', 'gofly-core'),
        'icon'  => 'fa fa-code'
    ));


    /*-----------------------------------
		REQUIRE Custom Scripts FILES
	------------------------------------*/
    require_once EGNS_CORE_INC . '/theme-options/settings/custom-scripts/custom_css.php';
}
