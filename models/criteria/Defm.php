<?php

require_once ($RootDir.'models/abstract/CriteriaTyped.php');

class Defm extends CriteriaTyped{

    // id, year, num, commune_code

    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'defm_id' );
        $this->hmatch( $data, 'setYear', 'defm_year' );
        $this->hmatch( $data, 'setNum', 'defm_num' );
        $this->hmatch( $data, 'setCommune', 'com_code' );
        $this->hmatch( $data, 'setTypes', 'defmcat_id' );
    }
    
    public function getTypes(){
        global $_DATABASE;
        $result = [];
        $q = $_DATABASE->query('SELECT * FROM `defm_category` WHERE `defmcat_id` = "'.$this->_types_id.'";');
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $result[] = $data['defm_cat'];
        }
        return $result;
    }
    
}