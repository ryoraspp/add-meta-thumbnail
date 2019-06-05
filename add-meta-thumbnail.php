<?php
/**
 * Plugin Name: add-meta-thumbnail (beta)
 * Plugin URI: https://ryo.nagoya/add-meta-thumbnail
 * Description: This is a plug-ins that  add the meta of the thumbnail.
 * Version: 0.1.0
 * Author: Ryo Uozumi
 * License: GPLv2 (or later) 
 *
 */

if (is_single() && has_post_thumbnail($post_object->ID)) {
	$thumbnail_id = get_post_thumbnail_id($post_object->ID);
    $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
    $thumbnail_image = $image[0];
  } else {
    $thumbnail_image = get_template_directory_uri().'/images/thumbnail.png';
  }

	add_action( 'wp_head', 'add_meta_to_head' );
function add_meta_to_head() {
	echo '<meta name="thumbnail" content=$thumbnail_image />' ;
}