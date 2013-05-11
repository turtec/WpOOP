<?php

/**
 * Description of aController
 *
 * @author Sascha Turowski <turtec.de>
 */
class defaultController {
    
        public function __construct(){
             add_action('admin_menu', array($this,'setupMenu'));
             add_action('add_meta_boxes', array($this,'setupMetaboxes' ));
             add_filter('add_meta_boxes', array($this,'removeMetaboxes' ));
        }

        /**
         * sets up the Admin-Menu Items and Actions or each 
         * Menu-Item
         */
        public function setupMenu(){
           $theSlug=add_menu_page(
                    'My Page-Title',
                    'My Menu Title', 
                    'administrator', 
                    'mySlug',
                    array($this,'aCallbackMethod'), '',9);
           // add_submenu_page('tt_newletter_subscriberlist', 'neuer Abonnent', 'neuer Abonnent',
           //     'administrator', 'tt_newsletter_subscribercreate',array($this->sc, 'create' ));
         } 

        /**
         * Default Callback-Method 
         */
        public function aCallbackMethod(){
            $thePath='/../viewsbackend/default.php';
            HTMLRenderer::renderHTML($thePath, $params);
        }    
        
        
         /**
         * adds a metabox for sending the Newsletter
         * called in: installer 
         */
        public  function setupMetaboxes() {
           /* add_meta_box('tt_metabox', 'Optionen', 
                 array($this,'createMetaboxMarkup'), 
                 'turtec_newsletter', 'side', 'default');*/
        }
    
        /**
         * removes metaboxes 
         */
        function removeMetaboxes(){
           // remove_meta_box('postpsp', 'turtec_newsletter', 'normal' );
           
        }
    
        public function createMetaboxMarkup(){
          /*  global $post;
            $options=get_option('katamboNewsletterOptions');
            $params=array();
            $params['postid']=$post->ID;
            $params['reciever']=$options['testmail'];
            $params['status']=$post->post_status; */
            $this->renderView(TTNEWDIR.'/view/AdminPanel/metabox.php',$params);
    }
        
        
}

?>
