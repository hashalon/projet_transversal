<?php

require_once ($RootDir.'models/abstract/Criteria.php');
require_once ($RootDir.'models/interface/Types.php');
require_once ($RootDir.'models/interface/CtegoriesAge.php');
require_once ($RootDir.'database/database.php');

/* DECREPATED */

class Formation extends Criteria implements Types, CategoriesAge{
    
    // id, year, num
    
    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'form_id' );
        $this->hmatch( $data, 'setYear', 'dipl_year' );
        $this->hmatch( $data, 'setNum', 'dipl_num' );
        //$this->hmatch( $data, 'setTypes', '' );
        //$this->hmatch( $data, 'setCategories', '' );
        //$this->hmatch( $data, 'setPopulationTypes', '' );
    }
    
    // return types of diploma
    public function getTypes(){
        //return $this->_types;
    }
    // check if formation is type of diploma
    public function isType($type){
        /*$type = (string) $type;
        if( in_array($type, $this->_types) ){
            return true;
        }*/
        return false;
    }
    
    // return categories of age
    public function getCategoriesAge(){
        //return $this->_categories_age;
    }
    // check if category of age is in formation
    public function isCategoryAge($cat){
        /*$cat = (string) $cat;
        if( in_array($cat, $this->_categories_age) ){
            return true;
        }*/
        return false;
    }
    
    // return types of population
    public function getPopulationTypes(){
        //return $this->_population_types;
    }
    // check if type of population is in formation
    public function isPopulationType($pop){
        /*$pop = (string) $pop;
        if( in_array($cat, $this->_population_types) ){
            return true;
        }*/
        return false;
    }
    
    
    
}