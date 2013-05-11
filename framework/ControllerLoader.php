<?php
/**
 * Loads all Controller-Classes in a given Path
 * Classname has to be the same like the Filename
 *
 * @author Sascha Turowski <turtec.de>
 */
class ControllerLoader {
      
       /**
         * initalize a class by a given $path
         * the class name has to be the same 
         * like the filename
         * @param type $path 
         */
        public static function loadControllers($path,$dir){
           foreach( glob($dir.'/'. $path .'/*.php' ) as $controllerPath ) {
                include $controllerPath;
                //get the filename form path
                $fileName = basename($controllerPath);
                //get the name without extentions
                $parts=explode('.', $fileName);
                $className=$parts[0]; 
                //load the class
                $aCtl = new $className(); 
             }
         }
}

?>
