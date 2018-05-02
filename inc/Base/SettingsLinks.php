<?php


namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController{

//  protected $plugin;

  // public function __construct(){
  //   $this->plugin=PLUGIN;
  // }

  public function register(){
    add_filter("plugin_action_links_$this->plugin",array($this,'settings_link'));
  }

  //show the settings where plugin activate and deactivate and add more options here
  public function settings_link($links){
    //add custom setting link
    $settings_link='<a href="options-general.php?page=webnin_plugin">Settings</a>';
    array_push($links,$settings_link);
    return $links;
  }



}
