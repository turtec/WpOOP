<?php
/*
Plugin Name: OOP-Boilerplate
Plugin URI: http://turtec.de/
Description: 
Version: 0.1
Author: Sascha Turowski
Author URI: http://turtec.de
License: GPL
*/

require_once 'framework/HTMLRenderer.php';
require_once 'framework/ControllerLoader.php';

    class WpOOP{
	
        private static $instance = null; 
        
        /**
         * using the Singelton Pattern 
         */
        public function getInstance(){
            	
               if(self::$instance==null){
                    return self::init();
               }
               else{
                    return self::$instance;
               }
        }
        
        /**
         * initialize the Plugin 
         */
        private function init(){
             if(is_admin()){
                 self::loadAdminController();
             }
             else{
                 self::loadFrontendController();
             }
        }
 
        
        /**
         * loads all Admin-Controller
        **/
        private function loadAdminController(){
            $dir= plugin_dir_path(__FILE__);
            $path='controllerbackend';
            ControllerLoader::loadControllers($path,$dir);
        }
        
        
         /**
         * loads all Frontend-Controller
        **/
        private function loadFrontendController(){
            $dir= plugin_dir_path(__FILE__);
            $path='controllerfrontend';
            ControllerLoader::loadControllers($path,$dir);
        }
        
       
     }

WpOOP::getInstance();

?>
