<?php

require_once ($RootDir.'models/abstract/CriteriaTyped.php');
require_once ($RootDir.'models/interface/CategoriesAge.php');

class Population extends CriteriaTyped implements CategoriesAge{
    
    // here types match population_types
    
    // id, year, num, commune_code, types
    protected $_categories_age = array(); // list of categories of age
    
    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'pop_id' );
        $this->hmatch( $data, 'setYear', 'ph_year' );
        $this->hmatch( $data, 'setNum', 'ph_num' );
        $this->hmatch( $data, 'setCommune', 'com_code' );
        $this->hmatch( $data, 'setTypes', '_types' );
        $this->hmatch( $data, 'setCategoriesAge', '_cats' );
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
    // check if category of age is in population
    public function isCategoryAge($cat){
        $cat = (string) $cat;
        if( in_array($cat, $this->_categories_age) ){
            return true;
        }
        return false;
    }
    
}