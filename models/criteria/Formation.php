<?php

require_once ($RootDir.'models/abstract/Criteria.php');
require_once ($RootDir.'models/interface/Types.php');

class Formation extends Criteria implements Types{
    
    // id, year, num
    protected $_types = array(); // list of types
    protected $_categories_age = array(); // list of categories of age
    protected $_population_types = array();
    
    protected function hydrate( array $data ){
        $this->hmatch( $data, 'setId', 'form_id' );
        $this->hmatch( $data, 'setYear', 'dipl_year' );
        $this->hmatch( $data, 'setNum', 'dipl_num' );
        $this->hmatch( $data, 'setTypes', '_types' );
        $this->hmatch( $data, 'setCategoriesAge', '_cats' );
        $this->hmatch( $data, 'setPopulationTypes', '_pops' );
    }
    
    // return types of diploma
    public function getTypes(){
        return $this->_types;
    }
    // set types of diploma
    public function setTypes(array $types){
        $this->_types = $types;
    }
    // add a type of diploma
    public function addType($type){
        $type = (string) $type;
        if( !$this->isType($type) ){
            $this->_types[] = $type;
        }
    }
    // check if formation is type of diploma
    public function isType($type){
        $type = (string) $type;
        if( in_array($type, $this->_types) ){
            return true;
        }
        return false;
    }
    
    // return categories of age
    public function getCategoriesAge(){
        return $this->_categories_age;
    }
    // set categories of age
    public function setCategoriesAge(array $cats){
        $this->_categories_age = $cats;
    }
    // add a category of age
    public function addCategoryAge($cat){
        $cat = (string) $cat;
        if( !$this->isCategoryAge($cat) ){
            $this->_categories_age[] = $cat;
        }
    }
    // check if category of age is in formation
    public function isCategoryAge($cat){
        $cat = (string) $cat;
        if( in_array($cat, $this->_categories_age) ){
            return true;
        }
        return false;
    }
    
    // return types of population
    public function getPopulationTypes(){
        return $this->_population_types;
    }
    // set types of population
    public function setPopulationTypes(array $pops){
        $this->_population_types = $pops;
    }
    // add a type of population
    public function addPopulationType($pop){
        $pop = (string) $pop;
        if( !$this->isPopulationType($pop) ){
            $this->_population_types[] = $cat;
        }
    }
    // check if type of population is in formation
    public function isPopulationType($pop){
        $pop = (string) $pop;
        if( in_array($cat, $this->_population_types) ){
            return true;
        }
        return false;
    }
    
    
    
}