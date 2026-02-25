<?php
/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {

	/*-----------------------------------
		REQUIRE META FILES
	------------------------------------*/
	require_once EGNS_CORE_INC . '/theme-options/settings/post/video.php';
	require_once EGNS_CORE_INC . '/theme-options/settings/post/gallery.php';
	require_once EGNS_CORE_INC . '/theme-options/settings/post/image.php';
	require_once EGNS_CORE_INC . '/theme-options/settings/post/quote.php';
	require_once EGNS_CORE_INC . '/theme-options/settings/post/audio.php';
}
