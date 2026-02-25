<?php
/*-----------------------------------
		Custom scripts Options
------------------------------------*/

CSF::createSection($prefix, array(
    'parent' => 'custom_scripts',
    'title'  => esc_html__('Custom Code', 'gofly-core'),
    'id'     => 'custom_css',
    'icon'   => 'fa fa-file-code-o',
    'fields' => array(

        array(
            'type'    => 'subheading',
            'content' => esc_html__('Custom CSS ( All Device )', 'gofly-core'),
        ),
        array(
            'id'       => 'custom_css',
            'type'     => 'code_editor',
            'desc'     => esc_html__('Write custom css here with css selector. this css will be applied in all pages and post.', 'gofly-core'),
            'settings' => array(
                'mode'        => 'css',
                'theme'       => 'dracula',
                'tabSize'     => 4,
                'smartIndent' => true,
                'autocorrect' => true,
            ),
        ),
        array(
            'type'    => 'subheading',
            'content' => esc_html__('Custom Javascript', 'gofly-core'),
        ),
        array(
            'id'       => 'custom_javascript',
            'type'     => 'code_editor',
            'settings' => array(
                'theme'  => 'monokai',
                'mode'   => 'javascript',
            ),
            'desc'     => esc_html__('Write custom Javascript here with selector. this css will be applied in all pages and post.', 'gofly-core'),
        ),


    ),

));
