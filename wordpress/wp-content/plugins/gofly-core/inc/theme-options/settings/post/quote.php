<?php
/*------------------------
	Meta Id For Quote
-------------------------*/
$quote_prefix   = 'egns_quote';

CSF::createMetabox(
	$quote_prefix,
	array(
		'title'           => esc_html__('Post Settings', 'gofly-core'),
		'post_type'       => 'post',
		'data_type'       => 'unserialize',
		'context'         => 'normal',
		'priority'        => 'high',
		'post_formats'    => 'quote',
		'show_restore'    => true,
		'output_css'      => true,
		'theme'           => 'dark',
	)
);


CSF::createSection(
	$quote_prefix,
	array(
		'title'  => esc_html__('Quote Post Setting', 'gofly-core'),
		'fields' => array(
			array(
				'id'          => 'egns_quote_text',
				'type'        => 'textarea',
				'title'       => esc_html__('Quote Text', 'gofly-core'),
				'subtitle'    => esc_html__('Paste here a valid quote text which is support auto embed with WordPress for post quote.', 'gofly-core'),
				'placeholder' => 'Quote Text',
				'default'     => wp_kses('I work with Alguneb Johnl on many projects, he always toldagona exci my expectations with his quality work and fastestopa tope service, very smooth and simple communication.<h4>James Kolin</h4>',wp_kses_allowed_html('post')),
			),
		)
	)
);
