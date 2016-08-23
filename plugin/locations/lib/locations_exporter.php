<?php
class LocationsPlugin_Exporter
{	
	public function output_form()
	{
		?>
		<form method="POST" action="">			
			<p>Click the "Export My Locations" button below to download a CSV file of your locations.</p>
			<input type="hidden" name="_locs_pro_do_export" value="_locs_pro_do_export" />
			<p class="submit">
				<input type="submit" class="button" value="Export My Locations" />
			</p>
		</form>
		<?php
	}
	
	public function process_export($filename = "locations-export.csv")
	{
		//load locations
		$args = array(
			'posts_per_page'   => -1,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'location',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 				
		);
		
		$locations = get_posts($args);
		
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Content-Description: File Transfer');
		header("Content-type: text/csv");
		header("Content-Disposition: attachment; filename={$filename}");
		header("Expires: 0");
		header("Pragma: public");
		
		// open file handle to STDOUT
		$fh = @fopen( 'php://output', 'w' );
		
		// output the headers first
		fputcsv($fh, array('Name','Street Address','Street Address (line 2)','City','State','Zipcode','Phone','Website','Email','Fax','Latitude','Longitude','Categories'));
			
		// now output one row for each location
		foreach($locations as $location)
		{
			$street_address = get_post_meta( $location->ID, '_ikcf_street_address', true);
			$street_address_line_two = get_post_meta( $location->ID, '_ikcf_street_address_line_2', true);
			$city = get_post_meta( $location->ID, '_ikcf_city', true);
			$state = get_post_meta( $location->ID, '_ikcf_state', true);
			$zipcode = get_post_meta( $location->ID, '_ikcf_zipcode', true);
			$phone = get_post_meta( $location->ID, '_ikcf_phone', true);
			$email = get_post_meta( $location->ID, '_ikcf_email', true);
			$fax = get_post_meta( $location->ID, '_ikcf_fax', true);
			$website_url = get_post_meta( $location->ID, '_ikcf_website_url', true);
			$latitude = get_post_meta( $location->ID, '_ikcf_latitude', true);
			$longitude = get_post_meta( $location->ID, '_ikcf_longitude', true);
			$categories = $this->list_taxonomy_ids( $location->ID, 'location-categories' );
			
			fputcsv($fh, array($location->post_title, $street_address, $street_address_line_two, $city, $state, $zipcode, $phone, $website_url, $email, $fax, $latitude, $longitude, $categories));		
		}
		
		// Close the file handle
		fclose($fh);
	}
	
	/* 
	 * Get a comma separated list of IDs representing each term of $taxonomy that $post_id belongs to
	 *
	 * @returns comma separated list of IDs, or empty string if no terms are assigned
	*/
	function list_taxonomy_ids($post_id, $taxonomy)
	{
		$terms = wp_get_post_terms( $post_id, $taxonomy ); // could also pass a 3rd param, $args
		if (is_wp_error($terms)) {
			return '';
		}
		else {
			$term_list = array();
			foreach ($terms as $t) {
				$term_list[] = $t->term_id;
			}
			return implode(',', $term_list);
		}
	}
	
}