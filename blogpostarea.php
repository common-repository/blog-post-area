<?php

header( "Pragma: no-cache" );



/*

Plugin Name: Blog Post Area
Description: A tool that allows you to specify what blogs show up on homepage banner area.
Author: Joyel Puryear (http://www.infotechnologist.biz)
Version: 1.8

*/



// Create Database Tables on install

function blogpostarea_install() {

	global $wpdb;

	

	$table_name1 = $wpdb->prefix . "homepage_blog_posts";

	

	if($wpdb->get_var("show tables like '".$table_name1."'") != $table_name1) {

      

    $sql = "CREATE TABLE " . $table_name1 . " (

	blogpost_title1 char(225) NOT NULL,

	blogpost_image1 char(225) NOT NULL,

	blogpost_link1 char(225) NOT NULL,

	blogpost_weight1 char(225) NOT NULL,

	blogpost_title2 char(225) NOT NULL,

	blogpost_image2 char(225) NOT NULL,

	blogpost_link2 char(225) NOT NULL,

	blogpost_weight2 char(225) NOT NULL,

	blogpost_title3 char(225) NOT NULL,

	blogpost_image3 char(225) NOT NULL,

	blogpost_link3 char(225) NOT NULL,

	blogpost_weight3 char(225) NOT NULL,

	blogpost_title4 char(225) NOT NULL,

	blogpost_image4 char(225) NOT NULL,

	blogpost_link4 char(225) NOT NULL, 

	blogpost_weight4 char(225) NOT NULL,

	blogpost_title5 char(225) NOT NULL,

	blogpost_image5 char(225) NOT NULL,

	blogpost_link5 char(225) NOT NULL,

	blogpost_weight5 char(225) NOT NULL

	);

	";



      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

      dbDelta($sql);



   }

	



}



// Call to create DB upon activation

register_activation_hook( __FILE__, 'blogpostarea_install' );



/* Admin Functionality */

add_action('admin_menu', 'blogpostarea_pluginmenu');



function blogpostarea_pluginmenu() {

  add_options_page('Blog Post Area Plugin Menu', 'Blog Post Area Plugin Menu', 'manage_options', 'blogpostarea_customizeposts', 'blogpostarea_customizeposts');

}



function blogpostarea_customizeposts() {	

	global $wpdb;

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

	}

	// Set form by default

	$show_form = 1;



	// Perform processing.

	if ($_POST['submitted'] == 1) {

		/* Show form 0/1 depending on processing  (if errors show form, if not don't) */

		echo 'This form was processed';

		$show_form = 1;

		$blog_title1   = $_POST['blog_title1'];

		$blog_url1     = $_POST['blog_url1'];

		$blog_weight1  = $_POST['blog_weight1'];

		$blog_image1   = $_POST['blog_image1'];

		$blog_title2   = $_POST['blog_title2'];

		$blog_url2     = $_POST['blog_url2'];

		$blog_weight2  = $_POST['blog_weight2'];

		$blog_image2   = $_POST['blog_image2'];

		$blog_title3   = $_POST['blog_title3'];

		$blog_url3     = $_POST['blog_url3'];

		$blog_weight3  = $_POST['blog_weight3'];

		$blog_image3   = $_POST['blog_image3'];

		$blog_title4   = $_POST['blog_title4'];

		$blog_url4     = $_POST['blog_url4'];

		$blog_weight4  = $_POST['blog_weight4'];

		$blog_image4   = $_POST['blog_image4'];

		$blog_title5   = $_POST['blog_title5'];

		$blog_url5     = $_POST['blog_url5'];

		$blog_weight5  = $_POST['blog_weight5'];

		$blog_image5   = $_POST['blog_image5'];

			

		$db_data['blogpost_title1']  = $blog_title1;

		$db_data['blogpost_link1']   = $blog_url1;

		$db_data['blogpost_weight1'] = $blog_weight1;

		$db_data['blogpost_image1']  = $blog_image1;

		$db_data['blogpost_title2']  = $blog_title2;

		$db_data['blogpost_link2']   = $blog_url2;

		$db_data['blogpost_weight2'] = $blog_weight2;

		$db_data['blogpost_image2']  = $blog_image2;

		$db_data['blogpost_title3']  = $blog_title3;

		$db_data['blogpost_link3']   = $blog_url3;

		$db_data['blogpost_weight3'] = $blog_weight3;

		$db_data['blogpost_image3']  = $blog_image3;

		$db_data['blogpost_title4']  = $blog_title4;

		$db_data['blogpost_link4']   = $blog_url4;

		$db_data['blogpost_weight4'] = $blog_weight4;

		$db_data['blogpost_image4']  = $blog_image4;

		$db_data['blogpost_title5']  = $blog_title5;

		$db_data['blogpost_link5']   = $blog_url5;

		$db_data['blogpost_weight5'] = $blog_weight5;

		$db_data['blogpost_image5']  = $blog_image5;

		

		$sql = "DELETE FROM " . $wpdb->prefix . "homepage_blog_posts";

		mysql_query($sql);

		

		$sql = "INSERT INTO " . $wpdb->prefix . "homepage_blog_posts";

		$paren_string = "(";

		$value_string = "(";

		foreach($db_data as $key => $value) {

			$paren_string .= $key . ", ";

			$value_string .= "'" . $value . "', ";

		}

		$paren_string = substr_replace($paren_string ,"",-2);

		$value_string = substr_replace($value_string, "", -2);

		$paren_string .= ")";

		$value_string .= ")";

		$sql .= $paren_string . " VALUES " . $value_string;

		mysql_query($sql);

	}else {

		$sql   = "SELECT * FROM " . $wpdb->prefix . "homepage_blog_posts";

		$query = mysql_query($sql);

		while ($row = mysql_fetch_array($query)) {

			$blog_title1   = $row['blogpost_title1'];

			$blog_url1     = $row['blogpost_link1'];

			$blog_weight1  = $row['blogpost_weight1'];

			$blog_image1   = $row['blogpost_image1'];

			$blog_title2   = $row['blogpost_title2'];

			$blog_url2     = $row['blogpost_link2'];

			$blog_weight2  = $row['blogpost_weight2'];

			$blog_image2   = $row['blogpost_image2'];

			$blog_title3   = $row['blogpost_title3'];

			$blog_url3     = $row['blogpost_link3'];

			$blog_weight3  = $row['blogpost_weight3'];

			$blog_image3   = $row['blogpost_image3'];

			$blog_title4   = $row['blogpost_title4'];

			$blog_url4     = $row['blogpost_link4'];

			$blog_weight4  = $row['blogpost_weight4'];

			$blog_image4   = $row['blogpost_image4'];

			$blog_title5   = $row['blogpost_title5'];

			$blog_url5     = $row['blogpost_link5'];

			$blog_weight5  = $row['blogpost_weight5'];

			$blog_image5   = $row['blogpost_image5'];

		}

	}



	// Display form

	if ($show_form == 1) {

		echo '<span style="color: red;">' . $error . '</span>';

		echo '<div class="wrap">';

		echo '<p>Please use the following form to modify the posts that can be pulled into the theme as featured..</p><br />

		<p><b>Instructions (Adding Images):</b></p><br />

		<ul style="list-type: circle;">

			<li>Go to Media->Library in the left hand menu.</li>

			<li>If you are adding a new image for the blog post, just create a new image in the library like normal.</li>

			<li>Once you have the image you want in the system..go to that image, and go to edit.</li>

			<li>Note the File URL at the bottom of the page.  Copy that URL.</li>

			<li>Come back to this page, and paste the URL into the appropriate blog "Image URL" area of the form below.</li>

		</ul>

		<p>That is how you add the banner images for the blog posts that are going to appear on the homepage.</p>

		<form name="blogpostarea" id="blogpostarea" action="" method="post" enctype="multipart/form-data">

		<fieldset>

			<legend>Blog Post 1</legend>

			<label for="blog_title1">Blog Title:</label>

			<input name="blog_title1" id="blog_title1" type="text" value="' . $blog_title1 . '" /><br />

			<label for="blog_url1">Blog URL:</label>

			<input name="blog_url1" id="blog_url1" type="text" value="' . $blog_url1 . '" /><br />

			<label for="blog_weight1">Blog Weight:</label>

			<input name="blog_weight1" id="blog_weight1" type="text" value="' . $blog_weight1 . '" /><br />

			<label for="blog_image1">Blog Image:</label>

			<input name="blog_image1" id="blog_image1" type="text" value="' . $blog_image1 . '" /><br />

		</fieldset>
		<br />
		<fieldset>

			<legend>Blog Post 2</legend>

			<label for="blog_title2">Blog Title:</label>

			<input name="blog_title2" id="blog_title2" type="text" value="' . $blog_title2 . '" /><br />

			<label for="blog_url2">Blog URL:</label>

			<input name="blog_url2" id="blog_url2" type="text" value="' . $blog_url2 . '" /><br />

			<label for="blog_weight2">Blog Weight:</label>

			<input name="blog_weight2" id="blog_weight2" type="text" value="' . $blog_weight2 . '" /><br />

			<label for="blog_image2">Blog Image:</label>

			<input name="blog_image2" id="blog_image2" type="text" value="' . $blog_image2 . '" /><br />

		</fieldset>
		<br />
		<fieldset>

			<legend>Blog Post 3</legend>

			<label for="blog_title3">Blog Title:</label>

			<input name="blog_title3" id="blog_title3" type="text" value="' . $blog_title3 . '" /><br />

			<label for="blog_url3">Blog URL:</label>

			<input name="blog_url3" id="blog_url3" type="text" value="' . $blog_url3 . '" /><br />

			<label for="blog_weight3">Blog Weight:</label>

			<input name="blog_weight3" id="blog_weight3" type="text" value="' . $blog_weight3 . '" /><br />

			<label for="blog_image3">Blog Image:</label>

			<input name="blog_image3" id="blog_image3" type="text" value="' . $blog_image3 . '" /><br />

		</fieldset>
		<br />
		<fieldset>

			<legend>Blog Post 4</legend>

			<label for="blog_title4">Blog Title:</label>

			<input name="blog_title4" id="blog_title4" type="text" value="' . $blog_title4 . '" /><br />

			<label for="blog_url4">Blog URL:</label>

			<input name="blog_url4" id="blog_url4" type="text" value="' . $blog_url4 . '" /><br />

			<label for="blog_weight4">Blog Weight:</label>

			<input name="blog_weight4" id="blog_weight4" type="text" value="' . $blog_weight4 . '" /><br />

			<label for="blog_image4">Blog Image:</label>

			<input name="blog_image4" id="blog_image4" type="text" value="' . $blog_image4 . '" /><br />

		</fieldset>
		<br />
		<fieldset>

			<legend>Blog Post 5</legend>

			<label for="blog_title5">Blog Title:</label>

			<input name="blog_title5" id="blog_title5" type="text" value="' . $blog_title5 . '" /><br />

			<label for="blog_url5">Blog URL:</label>

			<input name="blog_url5" id="blog_url5" type="text" value="' . $blog_url5 . '" /><br />

			<label for="blog_weight5">Blog Weight:</label>

			<input name="blog_weight5" id="blog_weight5" type="text" value="' . $blog_weight5 . '" /><br />

			<label for="blog_image5">Blog Image:</label>

			<input name="blog_image5" id="blog_image5" type="text" value="' . $blog_image5 . '" /><br />

		</fieldset>
		<br />
		

		<input name="submit" id="submit" type="submit" value="Update Database" /> 

		<input name="submitted" id="submitted" type="hidden" value="1" />

		</form>';

		echo '</div>';

	}else {

		echo '<span style="color: blue;">The system has been successfully updated.</span>';	

	}

}

function blogpostarea_getdata($name = false) {

	global $wpdb;

	$sql   = "SELECT * FROM " . $wpdb->prefix . "homepage_blog_posts";

	$query = mysql_query($sql);

	$results = array();

	$num = 1;

	while ($row = mysql_fetch_array($query)) {

		$results[$num]['title']  = $row['blogpost_title'  . $num];

		$results[$num]['url']    = $row['blogpost_link'   . $num];

		$results[$num]['weight'] = $row['blogpost_weight' . $num];

		$results[$num]['image']  = $row['blogpost_image'  . $num];

		$num++;

		$results[$num]['title']  = $row['blogpost_title'  . $num];

		$results[$num]['url']    = $row['blogpost_link'   . $num];

		$results[$num]['weight'] = $row['blogpost_weight' . $num];

		$results[$num]['image']  = $row['blogpost_image'  . $num];

		$num++;

		$results[$num]['title']  = $row['blogpost_title'  . $num];

		$results[$num]['url']    = $row['blogpost_link'   . $num];

		$results[$num]['weight'] = $row['blogpost_weight' . $num];

		$results[$num]['image']  = $row['blogpost_image'  . $num];

		$num++;

		$results[$num]['title']  = $row['blogpost_title'  . $num];

		$results[$num]['url']    = $row['blogpost_link'   . $num];

		$results[$num]['weight'] = $row['blogpost_weight' . $num];

		$results[$num]['image']  = $row['blogpost_image'  . $num];

		$num++;

		$results[$num]['title']  = $row['blogpost_title'  . $num];

		$results[$num]['url']    = $row['blogpost_link'   . $num];

		$results[$num]['weight'] = $row['blogpost_weight' . $num];

		$results[$num]['image']  = $row['blogpost_image'  . $num];

		$num++;

	}	

	return $results;

}

/* Create Widget */

function widget_blogpostarea($display_type = 'table') {
	$data = blogpostarea_getdata();
	$html = '';

	if (!empty($data)) {
		$html .= '<table><tr><th>Post Title</th><th>URL</th><th>Image</th></tr>';
		foreach ($data as $key=>$value) {
			if (!empty($value['title'])) {
				$html .= '<tr>';
				$html .= '<td>' . $value['title'] . '</td>';
				$html .= '<td><a href="' . $value['url'] . '">Details</a></td>';
				if ($value['image'] != '') {
					$html .= '<td><img src="' . $value['image'] . '" /></td>';
				}else {
					$html .= '<td></td>';
				}
				$html .= '</tr>';	
			}
		}
		$html .= '</table>';
	}
	echo $html;
}


?>