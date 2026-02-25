<?php
/**
 * Mega menu field hide from submenu
 * Show only parent menu
 */
add_action('admin_footer-nav-menus.php', function () {
?>
    <script>
        (function($) {
            function hideSubMenuFields() {
                $('#menu-to-edit > li').each(function() {
                    var depth = parseInt($(this).attr('class').match(/menu-item-depth-(\d)/)?.[1] || 0);
                    if (depth > 0) {
                        $(this).find('.only-parent-menu').closest('.csf-field').hide();
                    } else {
                        $(this).find('.only-parent-menu').closest('.csf-field').show();
                    }
                });
            }

            $(document).ready(function() {
                hideSubMenuFields();
                // Re-run on sorting or new item added
                $('#menu-to-edit').on('sortstop', hideSubMenuFields);
                $(document).on('menu-item-added', hideSubMenuFields);
            });
        })(jQuery);
    </script>
<?php
});

/**
 *Mega menu nav walker
 */
class Egns_Menu_Walker extends Walker_Nav_Menu
{
    public $parent_is_megamenu;

    function __construct() {}

    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent  = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent  = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {

        $indent      = ($depth) ? str_repeat("\t", $depth) : '';
        $item_output = '';

        $megamenu_data = get_post_meta($item->ID, 'egns_menu_options', true);

        if (is_array($megamenu_data)) {
            $enabel_megamenu = isset($megamenu_data['enabel_mega_menu']) ? $megamenu_data['enabel_mega_menu'] : false;
        } else {
            $enabel_megamenu = false;
        }

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        // Add `menu-item-has-children` class if mega menu is enabled
        if ($depth === 0 && $enabel_megamenu) {
            $classes[] = 'menu-item-has-children position-inherit';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        $atts          = array();
        $atts['href']  = !empty($item->url) ? $item->url : '';
        $atts['class'] = 'menu-link';

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
            }
        }

        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        // Check if this item should render a mega menu
        if ($depth === 0 &&  $enabel_megamenu) {
            $page_id = get_post_meta($item->ID, 'egns_menu_options', true);

            $id = $page_id['mega_menu_list'];
            if ($id) {
                $mega_content  = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display($id);
                $item_output  .= '<div class="mega-menu">' . $mega_content . '</div>';
            }
        }
        $output      .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        $output .= "</li>\n";
    }

    // Get mega menu content 
    function get_megamenu_content($megamenu_id)
    {
        if (class_exists('Elementor\Plugin')) {
            return Elementor\Plugin::$instance->frontend->get_builder_content_for_display($megamenu_id);
        } else {
            $post = get_post($megamenu_id);
            if (is_object($post)) {
                return do_shortcode($post->post_content);
            }
        }
        return '';
    }
}
