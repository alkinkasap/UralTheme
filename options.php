<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'ural_theme_options'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'ural_theme_options'),
		'two' => __('Two', 'ural_theme_options'),
		'three' => __('Three', 'ural_theme_options'),
		'four' => __('Four', 'ural_theme_options'),
		'five' => __('Five', 'ural_theme_options')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'ural_theme_options'),
		'two' => __('Pancake', 'ural_theme_options'),
		'three' => __('Omelette', 'ural_theme_options'),
		'four' => __('Crepe', 'ural_theme_options'),
		'five' => __('Waffle', 'ural_theme_options')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	

	// Basic Section Settings //

	$options[] = array(
		'name' => __('Basic Settings', 'ural_theme_options'),
		'type' => 'heading');

	//$options[] = array(
		//'name' => __('Blog Title', 'ural_theme_options'),
		//'desc' => __('Enter Your Blog Title.', 'ural_theme_options'),
		//'id' => 'blog_title',
		//'std' => 'Your Job Title',
		//'type' => 'text');

	$options[] = array(
		'name' => __('Blog Logo', 'ural_theme_options'),
		'desc' => __('Set Your Logo. Recommended Width/Height rate is 5/1.', 'ural_theme_options'),
		'id' => 'blog_logo',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Search Box', 'ural_theme_options'),
		'desc' => __('Enable Search Box Here.', 'ural_theme_options'),
		'id' => 'search_checkbox',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Footer Text', 'ural_theme_options'),
		'desc' => __('Enter Your Footer Text.', 'ural_theme_options'),
		'id' => 'footer_text',
		'std' => 'Footer Title',		
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	// Profile Section Settings //

	$options[] = array(
		'name' => __('Profile Section Settings', 'ural_theme_options'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Profile Background', 'ural_theme_options'),
		'desc' => __('Here you can set your profile sections background.', 'ural_theme_options'),
		'id' => 'profilebg',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Profile Picture', 'ural_theme_options'),
		'desc' => __('Here you can set your profile section picture.', 'ural_theme_options'),
		'id' => 'profilepic',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Profile Name', 'ural_theme_options'),
		'desc' => __('Enter Your Name.', 'ural_theme_options'),
		'id' => 'profile_name',
		'std' => 'Your Name',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Profile Job', 'ural_theme_options'),
		'desc' => __('Enter Your Job Title.', 'ural_theme_options'),
		'id' => 'profile_job',
		'std' => 'Your Job Title',
		'type' => 'text');

	$options[] = array(
		'name' => __('Profile Motto.', 'ural_theme_options'),
		'desc' => __('Enter Your Blog Motto. You can use html tags provided by Ural Theme. See docs for more.', 'ural_theme_options'),
		'id' => 'profile_motto',
		'std' => 'Your Blog Motto',		
		'type' => 'editor',
		'settings' => $wp_editor_settings );	

	// Social Links Settings //


	$options[] = array(
		'name' => __('Socail Links Settings', 'ural_theme_options'),
		'type' => 'heading');

	//Facebook

	$options[] = array(
		'name' => __('Facebook', 'ural_theme_options'),
		'desc' => __('Enable.', 'ural_theme_options'),
		'id' => 'facebook_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'ural_theme_options'),
		'desc' => __('', 'ural_theme_options'),
		'id' => 'facebook_link',
		'std' => 'http://facebook.com/',
		'type' => 'text');

	//twitter

	$options[] = array(
		'name' => __('twitter', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'twitter_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'twitter_link',
		'std' => 'http://twitter.com/',
		'type' => 'text');

	//google-plus

	$options[] = array(
		'name' => __('Google Plus', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'google-plus_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'google-plus_link',
		'std' => 'http://plus.google.com/',
		'type' => 'text');

	//vk

	$options[] = array(
		'name' => __('VK', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'vk_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'vk_link',
		'std' => 'http://vk.com/',
		'type' => 'text');

	//instagram

	$options[] = array(
		'name' => __('Instagram', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'instagram_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'instagram_link',
		'std' => 'http://instagram.com/',
		'type' => 'text');

	//foursquare

	$options[] = array(
		'name' => __('Foursquare', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'foursquare_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'foursquare_link',
		'std' => 'http://foursquare.com/',
		'type' => 'text');

	//tumblr

	$options[] = array(
		'name' => __('Tumblr', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'tumblr_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'tumblr_link',
		'std' => 'http://tumblr.com/',
		'type' => 'text');

	//flickr

	$options[] = array(
		'name' => __('flickr', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'Flickr_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'flickr_link',
		'std' => 'http://flickr.com/',
		'type' => 'text');

	//pinterest-square

	$options[] = array(
		'name' => __('Pinterest', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'pinterest-square_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'pinterest-square_link',
		'std' => 'http://pinterest.com/',
		'type' => 'text');

	//linkedin

	$options[] = array(
		'name' => __('Linkedin', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'linkedin_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'linkedin_link',
		'std' => 'http://linkedin.com/',
		'type' => 'text');

	//dribbble

	$options[] = array(
		'name' => __('Dribbble', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'dribbble_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'dribbble_link',
		'std' => 'http://dribbble.com/',
		'type' => 'text');

	//github

	$options[] = array(
		'name' => __('Github', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'github_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'github_link',
		'std' => 'http://github.com/',
		'type' => 'text');

	//trello

	$options[] = array(
		'name' => __('Trello', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'trello_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'trello_link',
		'std' => 'http://trello.com/',
		'type' => 'text');

	//youtube-play

	$options[] = array(
		'name' => __('Youtube', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'youtube-play_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'youtube-play_link',
		'std' => 'http://youtube.com/',
		'type' => 'text');

	//vimeo-square

	$options[] = array(
		'name' => __('Vimeo', 'options_framework_theme'),
		'desc' => __('Enable.', 'options_framework_theme'),
		'id' => 'vimeo-square_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'vimeo-square_link',
		'std' => 'http://vimeo.com/',
		'type' => 'text');

	return $options;
}