<?php

require_once ($RootDir.'models/abstract/CriteriaCom.php');
require_once ($RootDir.'models/interface/CategoriesAge.php');

class Travailleurs extends CriteriaCom implements CategoriesAge{

    // id, year, num, com_code
    protected $_zone_no;
    protected $_cats_id;
    
    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'tr_id' );
        $this->hmatch( $data, 'setYear', 'tr_year' );
        $this->hmatch( $data, 'setNum', 'tr_number' );
        $this->hmatch( $data, 'setZoneEmploi', 'zone_no' );
        $this->hmatch( $data, 'setCategoriesAge', 'cat_id' );
    }

    public function getZoneEmploi(){
        return $this->_zone_no;
    }
    public function setZoneEmploi($zone){
        $zone = (string) $zone;
        $this->_zone_no = $zone;
    }
    
    // return categories of age
    public function getCategoriesAge(){
        global $_DATABASE;
        $result = [];
        $q = $_DATABASE->query('SELECT * FROM `categorie_age` WHERE `cat_id` = "'.$this->_cats_id.'";');
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $result[] = $data['cat_name'];
        }
        return $result;
    }
    public function setCategoriesAge($cats){
        $this->_cats_id = $cats;
    }
    // check if category of age is in formation
    public function isCategoryAge($cat){
        $cat = (string) $cat;
        if( in_array($cat, $this->getCategoriesAge()) ){
            return true;
        }
        return false;
    }

}