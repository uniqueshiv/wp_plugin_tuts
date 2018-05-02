<?php
/*
*@package WebninjazPlugin
*/
/*
Plugin Name: Webninjaz Plugin
Plugin URI: http://webninjaz.com
Description: This is my First attempt on writing a custom plugin for this amazing project.
Version: 1.0.0
Auther: Shiva Chauhan
Auther URI: http://uniqueshiv.blogspot.in
License: GPLv2 or later
*/



// if(!defined('ABSPATH')){
//   die;
// }

defined('ABSPATH') or die('Hey, you can\t access this file , you silly human');

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
  require_once dirname(__FILE__).'/vendor/autoload.php';
}


 define('PLUGIN_PATH',plugin_dir_path(__FILE__));
// define('PLUGIN_URL',plugin_dir_url(__FILE__));
// define('PLUGIN',plugin_basename(__FILE__));

use Inc\Base\Activate;
use Inc\Base\Deactivate;

function activate_webnin_plugin(){
  Activate::activate();
}

function deactivate_webnin_plugin(){
  Deactivate::deactivate();
}


register_activation_hook(__FILE__,'activate_webnin_plugin');
register_deactivation_hook(__FILE__,'deactivate_webnin_plugin');



if(class_exists('Inc\\Init')){
  Inc\Init::register_services();
}
