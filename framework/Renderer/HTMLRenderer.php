<?php
/**
 * Outputs a HMTL-Page
 *
 * @author Sascha Turowski <turtec.de>
 */
class HTMLRenderer {
    
     public static function renderHTML($thePath,$params=null){
          ob_start();
	  include_once $thePath;
          $output = ob_get_clean();
	  echo $output;
      }
     
}

?>
