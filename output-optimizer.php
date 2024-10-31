<?php
/*
Plugin Name: Output Optimizer
Plugin URI: http://wallgrenconsulting.se
Description: Removes line-breaks, tabs, double space and html comments from html output.
Version: 1.1
Author: Mikael Wallgren
Author URI: http://wallgrenconsulting.se
*/

function oo_optimize($html){
	$html = str_replace("\r\n", "", $html);
	$html = str_replace("\n", "", $html);
	$html = str_replace("\t", "", $html);
	$html = str_replace("  ", "", $html);
	$html = preg_replace("/<!--(.*?)-->/", "", $html);
	return $html;
}

function oo_start(){
	ob_start('oo_optimize');
}

add_action('get_header', 'oo_start');
remove_action('wp_head','feed_links_extra',3);
remove_action('wp_head','feed_links',2);
remove_action('wp_head','rsd_link');
remove_action('wp_head','wlwmanifest_link');
remove_action('wp_head','index_rel_link');
remove_action('wp_head','wp_generator');
?>