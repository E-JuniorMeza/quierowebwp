<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Set a unique slug-like ID
    $prefix = 'egns_profile_options';


    // Create profile options
    CSF::createProfileOptions($prefix, array(
        'id'        => 'user_soaicl_opt',
        'title'     => esc_html__('User Social', 'gofly-core'),
        'data_type' => 'serialize',
    ));


    // Create a section
    CSF::createSection($prefix, array(
        'id'     => 'user_social_media',
        'title'  => esc_html__('Social Media Platform', 'gofly-core'),
        'fields' => array(
            array(
                'id'    => 'user_facebook_url',
                'type'  => 'text',
                'title' => esc_html__('Facebook URL', 'gofly-core'),
            ),
            array(
                'id'    => 'user_twitter_url',
                'type'  => 'text',
                'title' => esc_html__('Twitter URL', 'gofly-core'),
            ),
            array(
                'id'    => 'user_linkedin_url',
                'type'  => 'text',
                'title' => esc_html__('Linkedin URL', 'gofly-core'),
            ),
            array(
                'id'    => 'user_instagram_url',
                'type'  => 'text',
                'title' => esc_html__('Instagram URL', 'gofly-core'),
            ),
            array(
                'id'    => 'user_pinterest_url',
                'type'  => 'text',
                'title' => esc_html__('Pinterest URL', 'gofly-core'),
            ),
        )
    ));
}
