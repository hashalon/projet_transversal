<?php

require_once ($RootDir.'models/abstract/CriteriaTyped.php');

class Menages extends Criteriatyped{

    // id, year, num, commune_code, types

    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'menag_id' );
        $this->hmatch( $data, 'setYear', 'menag_year' );
        $this->hmatch( $data, 'setNum', 'menag_num' );
        $this->hmatch( $data, 'setCommune', 'com_code' );
        $this->hmatch( $data, 'setTypes', 'mt_id' );
    }
    
    public function getTypes(){
        global $_DATABASE;
        $result = [];
        $q = $_DATABASE->query('SELECT * FROM `menage_type` WHERE `mt_id` = "'.$this->_types_id.'";');
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $result[] = $data['mt_name'];
        }
    }
    
}