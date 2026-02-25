<?php
$theme_header_style = Egns\Helper\Egns_Helper::egns_get_theme_option('header_menu_style');
$page_header_style  = Egns\Helper\Egns_Helper::egns_page_option_value('page_header_menu_style');

$final_header_style = !empty($page_header_style) && $page_header_style !== 'default' ? $page_header_style : $theme_header_style;

$allowed_headers = array('header_one', 'header_two', 'header_three', 'header_four', 'header_five', 'header_six', 'header_seven', 'header_eight');
?>

<?php if (in_array($final_header_style, $allowed_headers)) : ?>
    <div class="progress-wrap progress-<?php echo esc_attr($final_header_style); ?>">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
        <svg class="arrow" width="22" height="25" viewBox="0 0 24 23" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.556131 11.4439L11.8139 0.186067L13.9214 2.29352L13.9422 20.6852L9.70638 20.7061L9.76793 8.22168L3.6064 14.4941L0.556131 11.4439Z"></path>
            <path d="M23.1276 11.4999L16.0288 4.40105L15.9991 10.4203L20.1031 14.5243L23.1276 11.4999Z"></path>
        </svg>
    </div>
<?php endif; ?>