<?php

/**
 * Description of aController
 *
 * @author Sascha Turowski <turtec.de>
 */
class defaultController {
    
        public function __construct(){
             add_action('admin_menu', array($this,'setupAdminMenu'));
        }

        /**
         * sets up the Admin-Menu Items and Actions or each 
         * Menu-Item
         */
        public function setupAdminMenu(){
           $theSlug=add_menu_page('My Page-Title',
                    'My Menu Title', 
                    'administrator', 
                    'mySlug',
                    array($this,'aCallbackMethod'), '',9);
         } 
        
        
        public function aCallbackMethod(){
            $thePath='/../viewsbackend/default.php';
            HTMLRenderer::renderHTML($thePath, $params);
        }
        
}

?>
