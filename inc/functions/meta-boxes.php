<?php
/**
 * Initialize the meta boxes for post, page and custom templates
 *
 * @package klahan9
 */

add_action( 'admin_init', '_custom_meta_boxes' );

function _custom_meta_boxes() {
	
	$prefix = 'sp_';

	// Page layout
	$page_layout_options = array(
		'id'          => 'page-options',
		'title'       => 'Page Options',
		'desc'        => '',
		'pages'       => array( 'page', 'post', 'cp_team', 'cp_gallery' ),
		'context'     => 'normal',
		'priority'    => 'default',
		'fields'      => array(
			array(
				'label'		=> 'Primary Sidebar',
				'id'		=> $prefix . 'sidebar_primary',
				'type'		=> 'sidebar-select',
				'desc'		=> 'Overrides default'
			),
			array(
				'label'		=> 'Layout',
				'id'		=> $prefix . 'layout',
				'type'		=> 'radio-image',
				'desc'		=> 'Overrides the default layout option',
				'std'		=> 'inherit',
				'choices'	=> array(
					array(
						'value'		=> 'inherit',
						'label'		=> 'Inherit Layout',
						'src'		=> WPSP_BASE_URL . '/images/admin/layout-off.png'
					),
					array(
						'value'		=> 'col-1c',
						'label'		=> '1 Column',
						'src'		=> WPSP_BASE_URL . '/images/admin/col-1c.png'
					),
					array(
						'value'		=> 'col-2cl',
						'label'		=> '2 Column Left',
						'src'		=> WPSP_BASE_URL . '/images/admin/col-2cl.png'
					),
					array(
						'value'		=> 'col-2cr',
						'label'		=> '2 Column Right',
						'src'		=> WPSP_BASE_URL . '/images/admin/col-2cr.png'
					)
				)
			)
		)
	);

	// Post Format: Video 
	$post_format_video = array(
		'id'          => 'format-video',
		'title'       => 'Video settings',
		'desc'        => 'These settings enable you to embed videos into your posts.',
		'pages'       => array( 'post', 'cp_launcher' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'		=> 'Video URL',
				'id'		=> $prefix . 'video_url',
				'type'		=> 'text',
				'desc'		=> 'Enter Video Embed URL from youtube, vimeo or dailymotion'
			)
		)
	);

	// Post Format: Audio
	$post_format_audio = array(
		'id'          => 'format-audio',
		'title'       => 'Audio settings',
		'desc'        => 'These settings enable you to embed soundcloud into your posts.',
		'pages'       => array( 'post', 'cp_launcher' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'		=> 'Soundcloud URL',
				'id'		=> $prefix . 'sound_url',
				'type'		=> 'text',
				'desc'		=> 'Enter share URL of sound from Soundcloud'
			),
			array(
				'label'		=> 'Guest speaker name',
				'id'		=> $prefix . 'speaker_name',
				'type'		=> 'text',
				'desc'		=> 'Enter name of guest speaker'
			),
			array(
				'label'		=> 'Position',
				'id'		=> $prefix . 'speaker_position',
				'type'		=> 'text',
				'desc'		=> 'Enter position of guest speaker. e.g: Project officer'
			),
			array(
				'label'		=> 'Organization or Company Name',
				'id'		=> $prefix . 'speaker_work_place',
				'type'		=> 'text',
				'desc'		=> 'Enter Organization/Company name where they working for. e.g: United Nations Population Fund  (UNFPA)'
			)
		)
	);

	// Post Format: Gallery
	$post_format_gallery = array(
		'id'          => 'format-gallery',
		'title'       => 'Format: Gallery',
		'desc'        => 'These settings enable you to present photos as slideshow in post',
		'pages'       => array( 'post' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'		=> 'Upload photo',
				'id'		=> $prefix . 'gallery',
				'type'		=> 'gallery',
				'desc'		=> 'Upload photos'
			)
		)
	);

	//Page template setting for TV, Radio, Online resource and Page klahan9
	$page_template_settings = array(
		'id'          => 'page-template-settings',
		'title'       => 'Page settings',
		'desc'        => '',
		'pages'       => array( 'page' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'       => __( 'Masthead', 'wpsp' ),
				'id'          => 'tab_masthead',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Masthead',
				'id'		=> $prefix . 'masthead',
				'type'		=> 'upload',
				'desc'		=> 'Upload heading image for masthead page. Size: 960px by 150px'
			),
			array(
				'label'       => __( 'Post Featured', 'wpsp' ),
				'id'          => 'tab_post_featuerd',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Featured category',
				'id'		=> $prefix . 'post_by_cat',
				'type'		=> 'category-select',
				'desc'		=> 'Choose category show featured post for page'
			),
			array(
				'label'		=> 'Page background color',
				'id'		=> $prefix . 'page_bg_color',
				'type'		=> 'colorpicker',
				'desc'		=> 'Choose color for page background'
			),
		)
	);

	//Page template setting for TV
	$page_tv_template_settings = array(
		'id'          => 'page-tv-template-settings',
		'title'       => 'Addon settings',
		'desc'        => '',
		'pages'       => array( 'page' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			// Meet the star
			array(
				'label'       => __( 'Star Team', 'wpsp' ),
				'id'          => 'tab_star_team',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'star_team_title',
				'type'		=> 'text',
				'std'		=> 'Meet the star',
				'desc'		=> 'Enter title for this section e.g: Meet the Star'
			),
			array(
				'label'		=> 'Star team',
				'id'		=> $prefix . 'star_team_tax',
				'type'		=> 'taxonomy-select',
				'taxonomy'  => 'team_category',
				'desc'		=> 'Select Star team category e.g: Meet the Star'
			),
			array(
				'label'		=> 'Amount of people',
				'id'		=> $prefix . 'star_team_num',
				'type'		=> 'select',
				'std'		=> '8',
				'desc'		=> 'Choose amount of people to show',
				'choices'   => array( 
		          array(
		            'value'       => '5',
		            'label'       => '5',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '6',
		            'label'       => '6',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '7',
		            'label'       => '7',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '8',
		            'label'       => '8',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '9',
		            'label'       => '9',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '10',
		            'label'       => '10',
		            'src'         => ''
		          ),

		        )
			),
			array(
				'label'		=> 'Star Team text link',
				'id'		=> $prefix . 'star_team_text_link',
				'type'		=> 'text',
				'std'		=> 'More people',
				'desc'		=> 'Title link for Star team'
			),
			array(
				'label'		=> 'Star Team page link',
				'id'		=> $prefix . 'star_team_page_link',
				'type'		=> 'page-select',
				'std'		=> '',
				'desc'		=> 'Select page link for Star team group'
			),

			// TV team
			array(
				'label'       => __( 'TV Team', 'wpsp' ),
				'id'          => 'tab_tv_team',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'tv_team_title',
				'type'		=> 'text',
				'std'		=> 'Meet TV team',
				'desc'		=> 'Enter title for this section e.g: Meet the Star'
			),
			array(
				'label'		=> 'TV team',
				'id'		=> $prefix . 'tv_team_tax',
				'type'		=> 'taxonomy-select',
				'taxonomy'  => 'team_category',
				'desc'		=> 'Select TV team category e.g: Meet tv team'
			),
			array(
				'label'		=> 'Amount of people',
				'id'		=> $prefix . 'tv_team_num',
				'type'		=> 'select',
				'std'		=> '4',
				'desc'		=> 'Choose amount of people to show',
				'choices'   => array( 
		          array(
		            'value'       => '5',
		            'label'       => '5',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '6',
		            'label'       => '6',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '7',
		            'label'       => '7',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '8',
		            'label'       => '8',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '9',
		            'label'       => '9',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '10',
		            'label'       => '10',
		            'src'         => ''
		          ),

		        )
			),
			array(
				'label'		=> 'TV Team text link',
				'id'		=> $prefix . 'tv_team_text_link',
				'type'		=> 'text',
				'std'		=> 'More people',
				'desc'		=> 'Title link for TV team'
			),
			array(
				'label'		=> 'TV Team page link',
				'id'		=> $prefix . 'tv_team_page_link',
				'type'		=> 'page-select',
				'std'		=> '',
				'desc'		=> 'Select page link for TV team group'
			),

			// Launcher tab
			array(
				'label'       => __( 'Launcher', 'wpsp' ),
				'id'          => 'tab_launcher',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'launcher_title',
				'type'		=> 'text',
				'std'		=> 'TV launcher',
				'desc'		=> 'Enter title for this section'
			),
			array(
				'label'		=> 'Launcher category',
				'id'		=> $prefix . 'launcher_tax',
				'type'		=> 'taxonomy-select',
				'taxonomy'  => 'launcher_category',
				'desc'		=> 'Select TV show category'
			),
			array(
				'label'		=> 'Amount of launcher',
				'id'		=> $prefix . 'launcher_num',
				'type'		=> 'select',
				'std'		=> '4',
				'desc'		=> 'Choose amount of media to show',
				'choices'   => array( 
		          array(
		            'value'       => '2',
		            'label'       => '2',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '3',
		            'label'       => '3',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '4',
		            'label'       => '4',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '5',
		            'label'       => '5',
		            'src'         => ''
		          ),
		        )
			),
			array(
				'label'		=> 'Launcher text link',
				'id'		=> $prefix . 'launcher_text_link',
				'type'		=> 'text',
				'std'		=> 'More launcher',
				'desc'		=> 'Title link for TV launcher'
			),
			array(
				'label'		=> 'Launcher page link',
				'id'		=> $prefix . 'launcher_page_link',
				'type'		=> 'page-select',
				'std'		=> '',
				'desc'		=> 'Select page that contained all of tv launcher'
			),

			array(
				'label'       => __( 'Gallery', 'wpsp' ),
				'id'          => 'tab_gallery',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'tv_photo_title',
				'type'		=> 'text',
				'std'		=> 'Behind the scenes',
				'desc'		=> 'Enter title for this section e.g: Behind the scenes'
			),
			array(
				'label'		=> 'TV photo album',
				'id'		=> $prefix . 'album_term',
				'type'		=> 'taxonomy-select',
				'taxonomy' => 'gallery_category',
				'desc'		=> 'Select category TV photo album'
			),
			array(
				'label'		=> 'Amount of albums',
				'id'		=> $prefix . 'tv_photo_num',
				'type'		=> 'select',
				'std'		=> '4',
				'desc'		=> 'Choose amount of albums to show',
				'choices'   => array( 
		          array(
		            'value'       => '2',
		            'label'       => '2',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '3',
		            'label'       => '3',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '4',
		            'label'       => '4',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '5',
		            'label'       => '5',
		            'src'         => ''
		          ),
		        )
			),
			array(
				'label'		=> 'Photo text link',
				'id'		=> $prefix . 'tv_photo_text_link',
				'type'		=> 'text',
				'std'		=> 'More photos',
				'desc'		=> 'Title link for TV Photo'
			),
			array(
				'label'		=> 'TV album page link',
				'id'		=> $prefix . 'tv_photo_page_link',
				'type'		=> 'page-select',
				'std'		=> '',
				'desc'		=> 'Select page link to TV photo gallery'
			),
			array(
				'label'       => __( 'Callout', 'wpsp' ),
				'id'          => 'tab_callout',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'callout_title',
				'type'		=> 'text',
				'std'		=> 'Ready For a New Job or a Career Change?',
				'desc'		=> ''
			),
			array(
				'label'		=> 'Description',
				'id'		=> $prefix . 'callout_desc',
				'type'		=> 'textarea',
				'rows'      => '3',
				'std'		=> 'Klahan9 provided more information & documents with difference ways and experiences to make everyone have good career opportunity.',
				'desc'		=> ''
			),
			array(
				'label'		=> 'Button title',
				'id'		=> $prefix . 'callout_button',
				'type'		=> 'text',
				'std'		=> 'Online Resource',
				'desc'		=> ''
			),
			array(
				'label'		=> 'Button link',
				'id'		=> $prefix . 'callout_link',
				'type'		=> 'page-select',
				'std'		=> '',
				'desc'		=> 'Select page link for Callout button link'
			),

			// Callout Custom color 
			array(
				'label'		=> 'Callout color settings',
				'id'		=> $prefix . 'callout_border',
				'type'		=> 'textblock',
				'std'		=> '',
				'desc'		=> 'Use custom field bellow to change callout color schema'
			),
			array(
				'label'		=> 'Background color',
				'id'		=> $prefix . 'callout_bg_color',
				'type'		=> 'colorpicker',
				'std'		=> '#bf311a',
				'desc'		=> 'Select background color for callout message'
			),
			array(
				'label'		=> 'Text color',
				'id'		=> $prefix . 'callout_txt_color',
				'type'		=> 'colorpicker',
				'std'		=> '#ffffff',
				'desc'		=> 'Select color for text message and button'
			),
			array(
				'label'		=> 'Button background color',
				'id'		=> $prefix . 'callout_btn_bg_color',
				'type'		=> 'colorpicker',
				'std'		=> '#680b03',
				'desc'		=> 'Select background color for button'
			),
			array(
				'label'		=> 'Button hover color',
				'id'		=> $prefix . 'callout_btn_over_color',
				'type'		=> 'colorpicker',
				'std'		=> '#4285f4',
				'desc'		=> 'Select mouse over color for button'
			),
		)
	);

	//Page template setting for Radio
	$page_radio_template_settings = array(
		'id'          => 'page-radio-template-settings',
		'title'       => 'Addon settings',
		'desc'        => '',
		'pages'       => array( 'page' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'       => __( 'Schedule', 'wpsp' ),
				'id'          => 'tab_schedule',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'All topics title',
				'id'		=> $prefix . 'radio_all_topic_title',
				'type'		=> 'text',
				'std'		=> 'Listen all topics',
				'desc'		=> 'Enter title to listen all topics'
			),
			array(
				'label'		=> 'All topics link',
				'id'		=> $prefix . 'radio_all_topic_link',
				'type'		=> 'page-select',
				'std'		=> '',
				'desc'		=> 'Select page link to listen all topics'
			),
			array(
				'label'		=> 'Schedule banner',
				'id'		=> $prefix . 'schedule_banner',
				'type'		=> 'upload',
				'desc'		=> 'Recommend square image banner. e.g: 310px by 310px'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'radio_topic_title',
				'type'		=> 'text',
				'std'		=> 'Topic next month',
				'desc'		=> 'Enter title for this section e.g: Topic next month'
			),
			array(
				'label'		=> 'Topic category',
				'id'		=> $prefix . 'radio_topic_cat',
				'type'		=> 'category-select',
				'std'		=> '',
				'desc'		=> 'Select Radio, listen to broadcast or radio drama category to show in table schedule.'
			),
			array(
				'label'		=> 'Number of topic',
				'id'		=> $prefix . 'radio_topic_num',
				'type'		=> 'text',
				'std'		=> '5',
				'desc'		=> 'Enter amount of topic to show'
			),
			array(
				'label'		=> 'Topic order',
				'id'		=> $prefix . 'radio_topic_order',
				'type'		=> 'select',
				'std'		=> 'ASC',
				'desc'		=> 'Select order type for topic. ASC (1, 2, 3; a, b, c) or DESC (3, 2, 1; c, b, a)',
				'choices'   => array( 
		          array(
		            'value'       => 'ASC',
		            'label'       => 'ASC',
		            'src'         => ''
		          ),
		          array(
		            'value'       => 'DESC',
		            'label'       => 'DESC',
		            'src'         => ''
		          ),
		        )
			),
			array(
				'label'       => __( 'Team', 'wpsp' ),
				'id'          => 'tab_team',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'radio_team_title',
				'type'		=> 'text',
				'std'		=> 'Meet the radio team',
				'desc'		=> 'Enter title for this section e.g: Meet the radio team'
			),
			array(
				'label'		=> 'TV team',
				'id'		=> $prefix . 'team_tax',
				'type'		=> 'taxonomy-select',
				'taxonomy'  => 'team_category',
				'desc'		=> 'Select TV team category e.g: Meet the Star'
			),
			array(
				'label'		=> 'Amount of people',
				'id'		=> $prefix . 'radio_team_num',
				'type'		=> 'select',
				'std'		=> '4',
				'desc'		=> 'Choose amount of people to show',
				'choices'   => array( 
		          array(
		            'value'       => '5',
		            'label'       => '5',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '6',
		            'label'       => '6',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '7',
		            'label'       => '7',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '8',
		            'label'       => '8',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '9',
		            'label'       => '9',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '10',
		            'label'       => '10',
		            'src'         => ''
		          ),
		        )
			),
			array(
				'label'		=> 'Team text link',
				'id'		=> $prefix . 'radio_team_text_link',
				'type'		=> 'text',
				'std'		=> 'More people',
				'desc'		=> 'Title link for Radio team'
			),
			array(
				'label'		=> 'Team page link',
				'id'		=> $prefix . 'radio_team_page_link',
				'type'		=> 'page-select',
				'std'		=> '',
				'desc'		=> 'Select page link for Radio team group'
			),

			array(
				'label'       => __( 'Launcher', 'wpsp' ),
				'id'          => 'tab_launcher',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'launcher_title',
				'type'		=> 'text',
				'std'		=> 'Radio launcher',
				'desc'		=> 'Enter title for this section'
			),
			array(
				'label'		=> 'Launcher category',
				'id'		=> $prefix . 'launcher_tax',
				'type'		=> 'taxonomy-select',
				'taxonomy'  => 'launcher_category',
				'desc'		=> 'Select Radio show category'
			),
			array(
				'label'		=> 'Amount of launcher',
				'id'		=> $prefix . 'launcher_num',
				'type'		=> 'select',
				'std'		=> '4',
				'desc'		=> 'Choose amount of media to show',
				'choices'   => array( 
		          array(
		            'value'       => '2',
		            'label'       => '2',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '3',
		            'label'       => '3',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '4',
		            'label'       => '4',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '5',
		            'label'       => '5',
		            'src'         => ''
		          ),
		        )
			),
			array(
				'label'		=> 'Launcher text link',
				'id'		=> $prefix . 'launcher_text_link',
				'type'		=> 'text',
				'std'		=> 'More launcher',
				'desc'		=> 'Title link for Radio launcher'
			),
			array(
				'label'		=> 'Launcher page link',
				'id'		=> $prefix . 'launcher_page_link',
				'type'		=> 'page-select',
				'std'		=> '',
				'desc'		=> 'Select page that contained all of Radio launcher'
			),
			
			array(
				'label'       => __( 'Gallery', 'wpsp' ),
				'id'          => 'tab_gallery',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'radio_photo_title',
				'type'		=> 'text',
				'std'		=> 'Weekly photos',
				'desc'		=> 'Enter title for this section e.g: Weekly photos'
			),
			array(
				'label'		=> 'Radio photo album',
				'id'		=> $prefix . 'album_term',
				'type'		=> 'taxonomy-select',
				'taxonomy' => 'gallery_category',
				'desc'		=> 'Select category Radio photo album'
			),
			array(
				'label'		=> 'Amount of photo',
				'id'		=> $prefix . 'radio_photo_num',
				'type'		=> 'select',
				'std'		=> '4',
				'desc'		=> 'Choose amount of photo to show',
				'choices'   => array( 
		          array(
		            'value'       => '2',
		            'label'       => '2',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '3',
		            'label'       => '3',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '4',
		            'label'       => '4',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '5',
		            'label'       => '5',
		            'src'         => ''
		          ),
		        )
			),
			array(
				'label'		=> 'Photo text link',
				'id'		=> $prefix . 'radio_photo_text_link',
				'type'		=> 'text',
				'std'		=> 'More photos',
				'desc'		=> 'Title link for Radio Photo'
			),
			array(
				'label'		=> 'Radio album page link',
				'id'		=> $prefix . 'radio_photo_page_link',
				'type'		=> 'page-select',
				'std'		=> '',
				'desc'		=> 'Select page link to Radio photo gallery'
			),
			array(
				'label'       => __( 'Callout', 'wpsp' ),
				'id'          => 'tab_callout',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'callout_title',
				'type'		=> 'text',
				'std'		=> 'Ready For a New Job or a Career Change?',
				'desc'		=> ''
			),
			array(
				'label'		=> 'Description',
				'id'		=> $prefix . 'callout_desc',
				'type'		=> 'textarea',
				'rows'      => '3',
				'std'		=> 'Klahan9 provided more information & documents with difference ways and experiences to make everyone have good career opportunity.',
				'desc'		=> ''
			),
			array(
				'label'		=> 'Button title',
				'id'		=> $prefix . 'callout_button',
				'type'		=> 'text',
				'std'		=> 'Online Resource',
				'desc'		=> ''
			),
			array(
				'label'		=> 'Button link',
				'id'		=> $prefix . 'callout_link',
				'type'		=> 'page-select',
				'std'		=> '',
				'desc'		=> 'Select page link for Callout button link'
			),

			// Callout Custom color 
			array(
				'label'		=> 'Callout color settings',
				'id'		=> $prefix . 'callout_border',
				'type'		=> 'textblock',
				'std'		=> '',
				'desc'		=> 'Use custom field bellow to change callout color schema'
			),
			array(
				'label'		=> 'Background color',
				'id'		=> $prefix . 'callout_bg_color',
				'type'		=> 'colorpicker',
				'std'		=> '#bf311a',
				'desc'		=> 'Select background color for callout message'
			),
			array(
				'label'		=> 'Text color',
				'id'		=> $prefix . 'callout_txt_color',
				'type'		=> 'colorpicker',
				'std'		=> '#ffffff',
				'desc'		=> 'Select color for text message and button'
			),
			array(
				'label'		=> 'Button background color',
				'id'		=> $prefix . 'callout_btn_bg_color',
				'type'		=> 'colorpicker',
				'std'		=> '#680b03',
				'desc'		=> 'Select background color for button'
			),
			array(
				'label'		=> 'Button hover color',
				'id'		=> $prefix . 'callout_btn_over_color',
				'type'		=> 'colorpicker',
				'std'		=> '#4285f4',
				'desc'		=> 'Select mouse over color for button'
			),
		)
	);

	//Monthly topic template setting for Radio
	$radio_monthly_topic_template_settings = array(
		'id'          => 'page-radio-monthly-topic-template-settings',
		'title'       => 'Topic settings',
		'desc'        => '',
		'pages'       => array( 'page' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'		=> 'Radio category',
				'id'		=> $prefix . 'post_by_cat',
				'type'		=> 'category-select',
				'desc'		=> 'Choose category to show topics'
			),
			array(
			'label'		=> 'Select year',
			'id'		=> $prefix . 'yearly_topic',
			'type'		=> 'select',
			'desc'		=> 'Show weekly topic by year',
			'choices'     => array( 
			          array(
			            'value'       => '2015',
			            'label'       => '2015',
			            'src'         => ''
			          ),
			          array(
			            'value'       => '2016',
			            'label'       => '2016',
			            'src'         => ''
			          ),
			          array(
			            'value'       => '2017',
			            'label'       => '2017',
			            'src'         => ''
			          ),
			          array(
			            'value'       => '2018',
			            'label'       => '2018',
			            'src'         => ''
			          ),
			          array(
			            'value'       => '2019',
			            'label'       => '2019',
			            'src'         => ''
			          ),
			          array(
			            'value'       => '2020',
			            'label'       => '2020',
			            'src'         => ''
			          ),
			    )      
			)
		)
	);		
		
	//Page template setting for Home
	$page_home_template_settings = array(
			'id'          => 'page-home-template-settings',
			'title'       => 'Message Settings',
			'desc'        => '',
			'pages'       => array( 'page' ),
			'context'     => 'normal',
			'priority'    => 'high',
			'fields'      => array(
				array(
					'label'       => __( 'TV', 'wpsp' ),
					'id'          => 'tab_tv',
					'type'        => 'tab'
				),
				array(
					'label'		=> 'Title',
					'id'		=> $prefix . 'tv_title',
					'type'		=> 'text',
					'desc'		=> ''
				),
				array(
					'label'		=> 'Description',
					'id'		=> $prefix . 'tv_desc',
					'type'		=> 'textarea',
					'rows'      => '3',
					'desc'		=> 'Enter short description for TV'
				),
				array(
					'label'		=> 'Link',
					'id'		=> $prefix . 'tv_link',
					'type'		=> 'page-select',
					'desc'		=> 'Select TV Landing page to be link to'
				),
				array(
					'label'       => __( 'Online', 'wpsp' ),
					'id'          => 'tab_online',
					'type'        => 'tab'
				),
				array(
					'label'		=> 'Title',
					'id'		=> $prefix . 'online_title',
					'type'		=> 'text',
					'desc'		=> ''
				),
				array(
					'label'		=> 'Description',
					'id'		=> $prefix . 'online_desc',
					'type'		=> 'textarea',
					'rows'      => '3',
					'desc'		=> 'Enter short description for Online'
				),
				array(
					'label'		=> 'Link',
					'id'		=> $prefix . 'online_link',
					'type'		=> 'page-select',
					'desc'		=> 'Select Online Landing page to be link to'
				),
				array(
					'label'       => __( 'Radio', 'wpsp' ),
					'id'          => 'tab_radio',
					'type'        => 'tab'
				),
				array(
					'label'		=> 'Title',
					'id'		=> $prefix . 'radio_title',
					'type'		=> 'text',
					'desc'		=> ''
				),
				array(
					'label'		=> 'Description',
					'id'		=> $prefix . 'radio_desc',
					'type'		=> 'textarea',
					'rows'      => '3',
					'desc'		=> 'Enter short description for Radio'
				),
				array(
					'label'		=> 'Link',
					'id'		=> $prefix . 'radio_link',
					'type'		=> 'page-select',
					'desc'		=> 'Select Radio Landing page to be link to'
				),
				
			)
		);
	
	// Team post type
	$post_type_team = array(
		'id'          => 'peronal-setting',
		'title'       => 'Personal settings',
		'desc'        => '',
		'pages'       => array( 'cp_team' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'		=> 'Team Featured',
				'id'		=> $prefix . 'team_featured',
				'std'       => 'off',
				'type'		=> 'on-off',
				'desc'		=> 'Show this profile to show on front'
			),
			array(
				'label'		=> 'Position',
				'id'		=> $prefix . 'team_position',
				'type'		=> 'text',
				'desc'		=> 'Enter the team member\'s position within the team.'
			),
			/*array(
				'label'		=> 'Facebook Profile',
				'id'		=> $prefix . 'team_facebook',
				'type'		=> 'text',
				'desc'		=> 'On/Off Facebook profile. If Off, keep it empty'
			),
			array(
				'label'		=> 'Twitter Profile',
				'id'		=> $prefix . 'team_twitter',
				'type'		=> 'text',
				'desc'		=> 'On/Off Twitter profile, If Off keep it empty'
			),
			array(
				'label'		=> 'Linkedin Profile',
				'id'		=> $prefix . 'team_linkedin',
				'type'		=> 'text',
				'desc'		=> 'On/Off linkedin profile, If Off keep it empty'
			)*/
		)
	);

	// Gallery post type
	$post_type_gallery = array(
		'id'          => 'gallery-setting',
		'title'       => 'Upload photos',
		'desc'        => 'These settings enable you to upload photos.',
		'pages'       => array( 'cp_gallery' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'		=> 'Location',
				'id'		=> $prefix . 'album_location',
				'type'		=> 'text',
				'desc'		=> 'Where this album take photos'
			),
			array(
				'label'		=> 'Upload photo',
				'id'		=> $prefix . 'gallery',
				'type'		=> 'gallery',
				'desc'		=> 'Upload photos'
			),
			array(
				'label'		=> 'Photo columns',
				'id'		=> $prefix . 'gallery_cols',
				'type'		=> 'select',
				'std'		=> '4',
				'desc'		=> '',
				'choices'   => array( 
		          array(
		            'value'       => '2',
		            'label'       => '2',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '3',
		            'label'       => '3',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '4',
		            'label'       => '4',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '5',
		            'label'       => '5',
		            'src'         => ''
		          ),
		        )
			),
		)
	);

	/**
	 *	Return meta box option base on page template selected
	 */
	function rw_maybe_include() {
		// Include in back-end only
		if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
			return false;
		}

		// Always include for ajax
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return true;
		}

		if ( isset( $_GET['post'] ) ) {
			$post_id = $_GET['post'];
		}
		elseif ( isset( $_POST['post_ID'] ) ) {
			$post_id = $_POST['post_ID'];
		}
		else {
			$post_id = false;
		}

		$post_id = (int) $post_id;
		$post    = get_post( $post_id );

		$template = get_post_meta( $post_id, '_wp_page_template', true );

		return $template;
	}
	//Register meta boxes
	ot_register_meta_box( $post_format_video );
	ot_register_meta_box( $post_format_audio );
	ot_register_meta_box( $post_type_team );
	ot_register_meta_box( $post_type_gallery );

	$template_file = rw_maybe_include();
	if ( ( $template_file == 'page-templates/page-tv.php' ) || ( $template_file == 'page-templates/page-radio.php' ) || ( $template_file == 'page-templates/page-blog.php' ) || ( $template_file == 'page-templates/page-klahan9.php' ) ) {
		ot_register_meta_box( $page_template_settings ); 
	} 
	if ( $template_file == 'page-templates/page-home.php' ) {
		ot_register_meta_box( $page_home_template_settings ); 
	}
	if ( $template_file == 'page-templates/page-tv.php' ) {
		ot_register_meta_box( $page_tv_template_settings ); 
	} 
	if ( $template_file == 'page-templates/page-radio.php' ) {
		ot_register_meta_box( $page_radio_template_settings ); 
	} 
	if ( $template_file == 'page-templates/page-monthly-topic.php' ) {
		ot_register_meta_box( $radio_monthly_topic_template_settings ); 
	} 

	ot_register_meta_box( $page_layout_options );
		
	
}

