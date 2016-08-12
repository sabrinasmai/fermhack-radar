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

		add_settings_section( 'options_page_section',__( 'Testing out an options page, hope this works!', 'codediva' ), 'options_page_section_callback', 'theme_options');

		function options_page_section_callback()
		{
			echo __( 'Please select the customization options then hit the Save Changes button!' );
		}

    /*This piece of code adds a field in my options page for #page and #background, referenced from: https://codex.wordpress.org/Function_Reference/add_settings_field*/
    		add_settings_field(
    			'select_field',
    			__( 'Switch Background Color '),
    			'select_field_render',
    			'theme_options',
    			'options_page_section'
    		);

    		add_settings_field(
    			'select_field_2',
    			__( 'Switch Text Color'),
    			'select_field_render_2',
    			'theme_options',
    			'options_page_section'
    		);

    		add_settings_field(
    			'select_field_3',
    			__( 'Switch Text Size '),
    			'select_field_render_3',
    			'theme_options',
    			'options_page_section'
    		);
        /* This piece of code sets the options for the user to select with regards to background color*/
        		function select_field_render() {
        			$options = get_option( 'options_settings' );
        			?>
        			<select name="options_settings[select_field]">
        				<option value="1" <?php if (isset($options['select_field'])) selected( $options['select_field'], 1 ); ?>>RED</option>
        				<option value="2" <?php if (isset($options['select_field'])) selected( $options['select_field'], 2 ); ?>>PURPLE</option>
        				<option value="3" <?php if (isset($options['select_field'])) selected( $options['select_field'], 3 ); ?>>GREY</option>
        			</select>
        		<?php
        		}
        	/* This piece of code sets the options for the user to select with regards to colours*/
        		function select_field_render_2() {
        			$options = get_option( 'options_settings' );
        			?>
        			<select name="options_settings[select_field_2]">
          				<option value="1" <?php if (isset($options['select_field_2'])) selected( $options['select_field_2'], 1 ); ?>>BLACK</option>
        				<option value="2" <?php if (isset($options['select_field_2'])) selected( $options['select_field_2'], 2 ); ?>>WHITE</option>
        				<option value="3" <?php if (isset($options['select_field_2'])) selected( $options['select_field_2'], 3 ); ?>>TAN</option>
        			</select>
        		<?php
        		}
        	/* This piece of code sets the options for the user to select with regards to size of text */
        		function select_field_render_3() {
        			$options = get_option( 'options_settings' );
        			?>
        			<select name="options_settings[select_field_3]">
        				<option value="1" <?php if (isset($options['select_field_3'])) selected( $options['select_field_3'], 1 ); ?>>TINY</option>
        				<option value="2" <?php if (isset($options['select_field_3'])) selected( $options['select_field_3'], 2 ); ?>>NORMAL</option>
        				<option value="3" <?php if (isset($options['select_field_3'])) selected( $options['select_field_3'], 3 ); ?>>HUGE</option>
        			</select>
        		<?php
        		}
        	/* */
          function my_theme_options_page()
		{
			?>
			<form action="options.php" method="post">
				<h2>This should be the theme page, hope this works</h2>
				<?php
				settings_fields( 'theme_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
				?>
			</form>
			<?php
		}

	}
	add_action( 'admin_init', 'settings_init' );
	?>
