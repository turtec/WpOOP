<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseRepostiory
 *
 * @author sascha
 */
abstract class BaseRepository {
    
    protected function createEntityList($dbentities){
           $entities=array();
           foreach ($dbentities as $dbentity){
              
               $entities[]=$this->createEntity($dbentity);
           }
           return $entities; 
        }

    abstract function createEntity($dbentity);    
        
}

?>
