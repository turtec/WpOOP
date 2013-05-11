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
                  $path='controllerbackend';
             }
             else{
                 $path='controllerfrontend';
             }
              self::loadController($path);
        }
 
        private function loadController($path){
            $dir= plugin_dir_path(__FILE__);
            try{
                ControllerLoader::loadControllers($path,$dir);
            }
            catch(Exception $ex){
                echo $ex->getMessage();
            }
       }
 }

WpOOP::getInstance();

?>
