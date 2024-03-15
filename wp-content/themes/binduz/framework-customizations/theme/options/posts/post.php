<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }

$options = array(
	
	'box-featured-video' => array(
		'title'		 => esc_html__( 'Featured video', 'binduz' ),
		'type'		 => 'box',
		'priority'	 => 'default',
		'context'	 => 'side',
		'options'	 => array(
			
			'featured_video'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Video url', 'binduz' ),
				'desc'	 => esc_html__( 'Paste a video code from Youtube, Vimeo it will be embedded in the post and the thumb used as the featured image of this post. 
				You need to choose "Video Format" as post format to use "Featured Video".', 'binduz' ),
			),
			
		),
	),

	'box-featured-audio' => array(
		'title'		 => esc_html__( 'Featured audio', 'binduz' ),
		'type'		 => 'box',
		'priority'	 => 'default',
		'context'	 => 'side',
		'options'	 => array(
			'featured_audio'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Audio URL', 'binduz' ),
				'desc'	 => esc_html__( 'Paste a soundcloud link here.', 'binduz' ),
			)
		),
	),
	
	'post-layout' => array(
		'title'		 => esc_html__( 'Post layout', 'binduz' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => [
			'override_default_layout'	 => [
				'type'	 => 'switch',
				'value'	 => 'no',
				'label'	 => esc_html__( 'Override default layouts?', 'binduz' ),
				'desc'	 => esc_html__( 'You can change the default options from customizer\'s "Blog settings".', 'binduz' ),
				'left-choice' => [
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'binduz' ),
				],
				'right-choice' => [
					'value' => 'no',
					'label' => esc_html__( 'No', 'binduz' ),
				],
			],
			'post_header_layout' => [
				'label'	        => esc_html__( 'Post header layout', 'binduz' ),
				'desc'	        => esc_html__( 'Single post\'s header style.', 'binduz' ),
				'type'	        => 'image-picker',
				'choices'       => [
					'style1'    => [
						'small' => BINDUZ_IMG . '/admin/posts/style1.png',
						'large' => BINDUZ_IMG . '/admin/posts/style1.png',
					 ],
					 'style2'    => [
						  'small' => BINDUZ_IMG . '/admin/posts/style2.png',
						  'large' => BINDUZ_IMG . '/admin/posts/style2.png',
					 ],
					
				],
				'value'         => 'style1',
			  ],
			  
			  'post_sidebar_layout' =>[
                'type' => 'select',
                'label'   => esc_html__('Sidebar widget', 'binduz'),
                'desc'    => esc_html__('Override blog sidebar layout', 'binduz'),
                'choices' => array(
					
                    '1' => esc_html__('No sidebar', 'binduz'),
                    '3' => esc_html__('Right Sidebar', 'binduz'),
                 
                 ),
              
                'no-validate' => false,
			],

			

      ]
   ),  

 

	


);
