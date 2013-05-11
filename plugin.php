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
            $path='controllerbackend';
            self::loadController($path);
        }
        
        
         /**
         * loads all Frontend-Controller
        **/
        private function loadFrontendController(){
            $path='controllerfrontend';
            self::loadController($path);
        }
        
        /**
         * initalize a class by a given $path
         * the class name has to be the same 
         * like the filename
         * @param type $path 
         */
        private function loadController($path){
            $dir= plugin_dir_path(__FILE__);
            foreach( glob($dir.'/'. $path .'/*.php' ) as $controllerPath ) {
                include $controllerPath;
                //get the filename form path
                $fileName = basename($controllerPath);
                //get the name without extentions
                $parts=explode('.', $fileName);
                $className=$parts[0]; 
                //load the class
                $myController = new $className(); 
             }
         }
     }
 


WpOOP::getInstance();

?>
