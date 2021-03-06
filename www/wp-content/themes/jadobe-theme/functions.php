<?php //=======================================================================
	// Core functions and calls
	//========================================================================*/ 
	add_filter('show_admin_bar', '__return_false');
	add_action( 'init', 'initialize_cmb_meta_boxes', 9999 );
	function initialize_cmb_meta_boxes() {
		if ( !class_exists( 'cmb_Meta_Box' ) ) {
			require_once( get_template_directory() . '/inc/metabox/init.php' );
		}
	}

	//=============================================================================
	// Enqueue Scripts
	//=============================================================================
	add_action('wp_enqueue_scripts', 'mathiom_scripts');
	function mathiom_scripts(){
		wp_enqueue_script('jQuery');
		wp_enqueue_script('plugins', get_bloginfo('template_directory') . '/js/plugins.js' );
		wp_enqueue_script('main', get_bloginfo('template_directory') . '/js/main.js');
		if(get_option('thread_comments') && is_singular() && comments_open()) wp_enqueue_script('comment-reply');
	}

	//###########################################################################
	// Customize backend
	//###########################################################################
	//=============================================================================
	// Add Subtitle and Comment Text to every page
	//=============================================================================
	add_filter('cmb_meta_boxes', 'metabox_subtitle');
	function metabox_subtitle($mb){
		$prefix = '_';
		$mb[] = array(
			'id'		=> 'title-block',
			'title'		=> __('Title Block'),
			'pages'		=> array('page'),
			'context'	=> 'normal',
			'priority'	=> 'high',
			'show_names'=> true,
			'fields'	=> array(
				array(
					'name'	=> 'Subtitle',
					'id'	=> $prefix . 'subtitle',
					'type'	=> 'text'
				),
				array(
					'name'	=> 'Page Introduction',
					'id'	=> $prefix . 'intro',
					'type'	=> 'wysiwyg'
				)
			)
		);
		$mb[] = array(
			'id'		=> 'comment-block',
			'title'		=> __('Comment Block'),
			'pages'		=> array('page'),
			'context'	=> 'normal',
			'priority'	=> 'high',
			'show_names'=> true,
			'fields'	=> array(
				array(
					'name'	=> 'Comment Text',
					'id'	=> $prefix . 'comment-text',
					'type'	=> 'wysiwyg'
				)
			)
		);
		return $mb;
	}


	//###########################################################################
	// Helpers
	//###########################################################################
	//=============================================================================
	// Shorthand for a prettier print_r
	//=============================================================================
	function ppr($obj){
		echo '<pre>';
			print_r($obj);
		echo '</pre>';
	}

	//=============================================================================
	// Gets the current URL
	//=============================================================================
	function current_url(){
		return 'http://' . $_SERVER['HTTP_HOST'] . (isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : $_SERVER['PHP_SELF']);	
	}

	//=============================================================================
	// Shortcuts for checking $_POST, $_GET, $_COOKIE
	// Each has 2 functions: _X($key, $default) and is_X($key, $value)
	//
	// _X checks if X[$key] is defined, and if it is returns the value...otherwise $default is returned
	// is_X checks if X[$key] is defined and equal to $value
	//=============================================================================
	function _COOKIE($key, $default = false){
		return isset($_COOKIE[$key]) ? $_COOKIE[$key] : $default;
	}
	function is_COOKIE($key, $value){
		if(is_array($value)){
			foreach($value as $val){
				if(isset($_COOKIE[$key]) && $val == $_COOKIE[$key]) return true;
			}
			return false;
		} else {
			return (isset($_COOKIE[$key]) && $_COOKIE[$key] == $value);			
		}
	}
	function _POST($key, $default = false){
		return isset($_POST[$key]) ? $_POST[$key] : $default;
	}
	function is_POST($key, $value){
		if(is_array($value)){
			foreach($value as $val){
				if(isset($_POST[$key]) && $val == $_POST[$key]) return true;
			}
			return false;
		} else {
			return (isset($_POST[$key]) && $_POST[$key] == $value);			
		}
	}
	function _GET($key, $default = false){
		return isset($_GET[$key]) ? $_GET[$key] : $default;
	}
	function is_GET($key, $value){
		if(is_array($value)){
			foreach($value as $val){
				if(isset($_GET[$key]) && $val == $_GET[$key]) return true;
			}
			return false;
		} else {
			return (isset($_GET[$key]) && $_GET[$key] == $value);			
		}
	}

	//=============================================================================
	// Shortcuts for checking variables
	//=============================================================================
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	// Check if variable exists, and return it's value if it does, otherwise return default
	// $var is the string name
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	function _ARRAY(&$arr, $key, $default = false){
		return (isset($arr[$key])) ? $arr[$key] : $default;
	}	