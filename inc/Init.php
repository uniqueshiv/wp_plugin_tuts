<?php
/*
@package webninPlugin
*/
namespace Inc;

final class Init{
 /*
 store the classes inside an array
 @return array full list of classes
 */
   public static function get_services(){
     return[
       Pages\Admin::class,
       Base\Enqueue::class,
       Base\SettingsLinks::class
     ];
   }

//loop through the classess , initialize them, and class the register() method
//it is exists

   public static function  register_services(){
     foreach(self::get_services() as $class){
       $service=self::instantiate($class);
       if(method_exists($service, 'register')){
         $service->register();
       }
     }
   }
//initialize the class
   private static function instantiate($class){
     $service=new $class();
     return $service;
   }
}


// use Inc\Activate;
// use Inc\Deactivate;
// use Inc\Admin\AdminPages;
//
// if(!class_exists('WebninPlugin')){
//       class WebninPlugin
//       {
//             public $plugin;
//
//             function __construct(){
//               $this->plugin =  plugin_basename(__FILE__);
//             }
//
//             public function register(){
//
//               add_action('admin_enqueue_scripts',array($this,'enqueue'));
//
//               add_action('admin_menu',array($this,'add_admin_pages'));
//
//               add_filter("plugin_action_links_$this->plugin",array($this,'settings_link'));
//
//             }
//
//             //show the settings where plugin activate and deactivate and add more options here
//             public function settings_link($links){
//               //add custom setting link
//               $settings_link='<a href="options-general.php?page=webnin_plugin">Settings</a>';
//               array_push($links,$settings_link);
//               return $links;
//             }
//
//
//             public function add_admin_pages(){
//               add_menu_page('Webnin Plugin','Webnin','manage_options','webnin_plugin',array($this,
//             'admin_index'),'dashicons-store',110);
//             }
//
//
//             public function admin_index(){
//               require_once plugin_dir_path(__FILE__).'templates/admin.php';
//             }
//
//             public function create_post_type(){
//               add_action('init',array($this,'custom_post_type'));
//             }
//
//
//             public function activate(){
//                 //require_once plugin_dir_path(__FILE__).'inc/webnin-plugin-activate.php';
//                 Activate::activate();
//             }
//
//
//             function custom_post_type(){
//               register_post_type('book',['public'=>true,'label'=>'Books']);
//             }
//
//
//             function enqueue(){
//               //enqueue all our scripts
//               wp_enqueue_style('mypluginstyle',plugins_url('/assets/mystyle.css', __FILE__));
//               wp_enqueue_script('mypluginscript',plugins_url('/assets/js/script.js',__FILE__));
//             }
//
//       }
// }
//
// if(class_exists('WebninPlugin')){
//   $webninPlugin = new WebninPlugin();
//   $webninPlugin->register();
// }
//
// //activation
// register_activation_hook(__FILE__, array($webninPlugin,'activate'));
//
//
// //deactivation
//
// //require_once plugin_dir_path(__FILE__). 'inc/webnin-plugin-deactivate.php';
// register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));
//
//
// //uninstall
