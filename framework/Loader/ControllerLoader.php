<?php
/**
 * Loads all Controller-Classes in a given Path
 * Classname has to be the same like the Filename
 * This Class automatical loads all Controller
 * in the controller-Folders
 * so u don't have to include and load these
 * classes manually
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
                //include the File
                include $controllerPath;
                //get the filename form path
                $fileName = basename($controllerPath);
                //get the name without extentions
                $parts=explode('.', $fileName);
                //get the classname by accessing the array
                $className=$parts[0]; 
                
                if(class_exists($className)){
                    //load the class
                    $aCtl = new $className(); 
                }
                else{
                   throw new ControllerClassNotFoundException('Controllerclass ' .
                           $className . ' not found in file ' . $controllerPath . 
                           ' Please check the Naming of classname and filename. 
                             Both Names have to be equal', 0);
                }
             }
         }
}

?>
