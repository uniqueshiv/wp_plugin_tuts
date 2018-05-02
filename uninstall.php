<?php
/**
* Trigger this file on file on Plugin uninstall
*
* @package WebninPlugin
*/

if(!defined('WP_UNINSTALL_PLUGIN')){
  die;
}

//clear database store data

// $books =get_posts(array('post_type'=>'book','numberposts'=>-1));
// foreach($books as $data){
//    wp_delete_post($book->ID,true);
// }

//access the db via SQL

global $wpdb;
$wpdb->query("DELETE FROM wp_posts where post_type='book'");
$wpdb->query("DELETE FROM wp_postmeta where post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN(SELECT id FROM wp_posts)");
