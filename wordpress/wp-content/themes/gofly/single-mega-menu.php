<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	// Hook to include default WordPress hook after body tag open
	if (function_exists('wp_body_open')) {
		wp_body_open();
	}
	?>
	<div class="egns-custom-megamenu">
		<?php
		while (have_posts()) {
			the_post();
			the_content();
		}
		?>
	</div>
	<?php wp_footer(); ?>
</body>

</html>