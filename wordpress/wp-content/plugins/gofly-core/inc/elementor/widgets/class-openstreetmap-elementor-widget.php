<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Open_Street_Map_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_openstreetmap';
    }

    public function get_title()
    {
        return esc_html__('EG Open Street Map', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_tour'];
    }

    protected function register_controls()
    {

        //===================== Content =======================//

        $this->start_controls_section(
            'gofly_openstreetmap_cnt_section',
            [
                'label' => esc_html__('Content', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_openstreetmap_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Package Destination Map', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gofly_openstreetmap_coordinates_icon',
            [
                'label'   => esc_html__('Coordinates icon', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'gofly_openstreetmap_animate_coordinates_icon',
            [
                'label'   => esc_html__('Coordinates animate icon', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_openstreetmap_coordinates_list',
            [
                'label'  => esc_html__('Map coordinates list', 'gofly-core'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'gofly_openstreetmap_coordinates_latitude',
                        'label'       => esc_html__('Latitude', 'gofly-core'),
                        'type'        => \Elementor\Controls_Manager::TEXT,
                        'default'     => '46.532388',
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'gofly_openstreetmap_coordinates_longitude',
                        'label'       => esc_html__('Longitude', 'gofly-core'),
                        'type'        => \Elementor\Controls_Manager::TEXT,
                        'default'     => '2.438788',
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'gofly_openstreetmap_coordinates_name',
                        'label'       => esc_html__('Coordinates Name', 'gofly-core'),
                        'type'        => \Elementor\Controls_Manager::TEXT,
                        'default'     => esc_html__('List Title', 'gofly-core'),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'gofly_openstreetmap_coordinates_days',
                        'label'       => esc_html__('Days', 'gofly-core'),
                        'type'        => \Elementor\Controls_Manager::TEXT,
                        'default'     => "'1', '2', '3'",
                        'description' => esc_html__("Write like this ( '1', '2', '3' ) otherwise not work properly.", 'gofly-core'),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'gofly_openstreetmap_coordinates_name'      => esc_html__('Vesdun', 'gofly-core'),
                        'gofly_openstreetmap_coordinates_days'      => "'1', '2', '3'",
                        'gofly_openstreetmap_coordinates_latitude'  => '46.532388',
                        'gofly_openstreetmap_coordinates_longitude' => '2.438788',
                    ],
                ],
                'title_field' => '{{{ gofly_openstreetmap_coordinates_name }}}',
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $cordinate_icon         = $settings['gofly_openstreetmap_coordinates_icon']['url'];
        $cordinate_animate_icon = $settings['gofly_openstreetmap_animate_coordinates_icon']['url'];

        // Build structured points array
        $dataPoints = [];

        foreach ((array) $settings['gofly_openstreetmap_coordinates_list'] as $item) {
            $days = !empty($item['gofly_openstreetmap_coordinates_days'])
                ? preg_split('/\s*,\s*/', str_replace("'", "", $item['gofly_openstreetmap_coordinates_days']))
                :    [];

            $dataPoints[] = [
                'coords' => [
                    floatval($item['gofly_openstreetmap_coordinates_latitude']),
                    floatval($item['gofly_openstreetmap_coordinates_longitude']),
                ],
                'name' => '<h6>' . $item['gofly_openstreetmap_coordinates_name'] . '</h6>',
                'days' => $days,
            ];
        }

        wp_localize_script('custom-main', 'localize_map', [
            'points' => $dataPoints,
            'icon1'  => $cordinate_icon,
            'icon2'  => $cordinate_animate_icon,
            'nonce'  => wp_create_nonce('openstreetmap_nonce'),
        ]);


?>
        <?php if (is_admin()): ?>
            <script>
                // Points data
                const points = <?php echo json_encode($dataPoints, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>

                // Reusable function
                function initLeafletMap(mapId, points) {
                    const mapContainer = document.getElementById(mapId);
                    if (!mapContainer) return null;

                    const map = L.map(mapId).setView([80, -4.7], 8);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(map);

                    // Polyline
                    const polyline = L.polyline(points.map(p => p.coords), {
                        color: '#1781FE',
                        weight: 1
                    }).addTo(map);
                    map.fitBounds(polyline.getBounds());

                    // Custom icons
                    const customIcon = L.icon({
                        iconUrl: <?php echo $cordinate_icon ?>,
                        iconSize: [16, 16],
                        iconAnchor: [6, 6],
                    });

                    const animatedIcon = L.icon({
                        iconUrl: <?php echo $cordinate_animate_icon ?>,
                        iconSize: [12, 12],
                        iconAnchor: [6, 6],
                    });

                    // Add clickable markers
                    points.forEach(p => {
                        let daysHtml = '';
                        p?.days?.forEach(item => {
                            daysHtml += `<span>${item}</span>`;
                        });

                        L.marker(p.coords, {
                                icon: customIcon
                            })
                            .addTo(map)
                            .bindPopup(`
                        ${p.name}
                        <strong>Days </strong>
                        ${daysHtml}`);
                    });

                    // Animated marker
                    const marker = L.marker(points[0].coords, {
                        icon: animatedIcon
                    }).addTo(map);

                    function interpolatePosition(p1, p2, t) {
                        return [
                            p1[0] + (p2[0] - p1[0]) * t,
                            p1[1] + (p2[1] - p1[1]) * t,
                        ];
                    }

                    let i = 0;
                    let progress = 0;
                    const speed = 0.0020;

                    function animate() {
                        if (i >= points.length - 1) {
                            i = 0;
                            progress = 0;
                        }

                        const start = points[i].coords;
                        const end = points[i + 1].coords;

                        progress += speed;

                        if (progress >= 1) {
                            i++;
                            progress = 0;
                        }

                        const pos = interpolatePosition(start, end, progress);
                        marker.setLatLng(pos);

                        requestAnimationFrame(animate);
                    }

                    animate();

                    return map;
                }

                // ---- Usage ----

                // Normal page map
                initLeafletMap("map", points);
            </script>
        <?php endif; ?>

        <div class="map-area">
            <?php
            if (!empty($settings['gofly_openstreetmap_title'])) {
                echo "<h4 style='margin-bottom:30px;'>{$settings['gofly_openstreetmap_title']}</h4>";
            }
            ?>
            <div id="map"></div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Open_Street_Map_Widget());
