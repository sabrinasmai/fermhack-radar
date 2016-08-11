<?php
	/*Creates button on the dashboard */
	function add_admin_menu()
	{
		add_menu_page( 'My Options Page', 'My Options Page', 'manage_options', 'my_options_page', 'my_theme_options_page', 'dashicons-hammer', 66 );
	}
	add_action( 'admin_menu', 'add_admin_menu' );

	//retrieved from lecture slides
	function settings_init()
	{

		register_setting( 'theme_options', 'options_settings' );

		add_settings_section( 'options_page_section',__( 'Your section description', 'codediva' ), 'options_page_section_callback', 'theme_options');

		function options_page_section_callback()
		{
			echo __( 'Select the changes you want to make and click save' );
		}

	?>
