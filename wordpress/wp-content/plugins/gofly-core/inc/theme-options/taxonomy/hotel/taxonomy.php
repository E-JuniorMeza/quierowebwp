<?php
add_action('csf_loaded', function () {

    if (class_exists('CSF')) {

        $prefix = 'egns_hotel_icon';

        // Create taxonomy options
        CSF::createTaxonomyOptions($prefix, array(
            'taxonomy'  => 'hotel-amenity',
            'data_type' => 'serialize',
        ));

        // Create section
        CSF::createSection($prefix, array(
            'fields' => array(
                array(
                    'id'    => 'amenity_icon',
                    'type'  => 'media',
                    'class' => 'amenity-icon-field-input',
                    'title' => esc_html__('Parent Icon', 'gofly-core'),
                    'desc'  => esc_html__('This field is displayed only when the term is a parent.', 'gofly-core'),
                ),
            )
        ));
    }

    // Add JS for condition
    add_action('admin_footer', function () {
        $screen = get_current_screen();
        if ($screen && $screen->taxonomy === 'hotel-amenity') : ?>
            <script>
                jQuery(document).ready(function($) {
                    function toggleAmenityIcon() {
                        let parentSelect = $('#parent');
                        let isParent = true;
                        if (parentSelect.length) {
                            let val = parentSelect.val();
                            isParent = (val === '-1');
                        } else {
                            let parentHidden = $('input[name="parent"]').val();
                            isParent = (parentHidden === '0' || parentHidden === '' || parentHidden === undefined || parentHidden === '-1');
                        }
                        if (isParent) {
                            $('.amenity-icon-field-input').show();
                        } else {
                            $('.amenity-icon-field-input').hide();
                        }
                    }
                    toggleAmenityIcon();
                    $('#parent').on('change', toggleAmenityIcon);
                });
            </script>
<?php
        endif;
    });
});
