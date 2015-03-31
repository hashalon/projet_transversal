<?php

require_once ($RootDir.'models/abstract/CriteriaTyped.php');
require_once ($RootDir.'models/interface/CategoriesAge.php');

class Population extends CriteriaTyped implements CategoriesAge{
    
    // id, year, num, commune_code
    protected $_cats_id;
    
    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'pop_id' );
        $this->hmatch( $data, 'setYear', 'ph_year' );
        $this->hmatch( $data, 'setNum', 'ph_num' );
        $this->hmatch( $data, 'setCommune', 'com_code' );
        $this->hmatch( $data, 'setTypes', 'pt_id' );
        $this->hmatch( $data, 'setCategoriesAge', 'cat_id' );
    }
    
    public function getTypes(){
        global $_DATABASE;
        $result = [];
        $q = $_DATABASE->query('SELECT * FROM `pop_type` WHERE `pt_id` = "'.$this->_types_id.'";');
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $result[] = $data['pt_type'];
        }
        return $result;
    }
    
    // return categories of age
    public function getCategoriesAge(){
        global $_DATABASE;
        $result = [];
        $q = $_DATABASE->query('SELECT * FROM `categorie_age` WHERE `cat_id` = "'.$this->_ctas_id.'";');
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $result[] = $data['cat_type'];
        }
        return $result;
    }
    public function setCategoriesAge($cats){
        $this->_cats_id = $cats;
    }
    // check if category of age is in population
    public function isCategoryAge($cat){
        $cat = (string) $cat;
        if( in_array($cat, $this->getCategoriesAge()) ){
            return true;
        }
        return false;
    }
    
}