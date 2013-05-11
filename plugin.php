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

require_once 'framework/Renderer/HTMLRenderer.php';
require_once 'framework/Loader/ControllerLoader.php';
require_once 'installer/PluginInstaller.php';

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

            register_activation_hook(__FILE__,array( &$this,'install'));
            register_deactivation_hook(__FILE__,array( &$this,'uninstall'));

            // load all included Controller
            if(is_admin()){
                $path='controllerbackend';
            }
            else{
                $path='controllerfrontend';
            }
            self::loadController($path);
    }


    /**
        * Loads all Plugin-Controllers
        * @param type $path 
        */
    private function loadController($path){
        $dir= plugin_dir_path(__FILE__);
        try{
            ControllerLoader::loadControllers($path,$dir);
        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    /**
    * Install the Plugin 
    */
    private function install(){
        PluginInstaller::createDb();
    }

    /**
    * Uninstall the Plugin 
    */
    private function uninstall(){
        PluginInstaller::deleteDb();
    }
 }

WpOOP::getInstance();

?>
