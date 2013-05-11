<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HTMLRenderer
 *
 * @author Sascha Turowski <turtec.de>
 */
class HTMLRenderer {
    
     public static function renderHTML($thePath,$params){
          ob_start();
	  include_once $path;
          $output = ob_get_clean();
	  echo $output;
      }
     
}

?>
