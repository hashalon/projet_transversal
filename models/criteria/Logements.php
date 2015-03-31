<?php

require_once ($RootDir.'models/abstract/CriteriaTyped.php');

class Logements extends Criteriatyped{

    // id, year, num, commune_code

    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'log_id' );
        $this->hmatch( $data, 'setYear', 'log_year' );
        $this->hmatch( $data, 'setNum', 'log_num' );
        $this->hmatch( $data, 'setCommune', 'com_code' );
        $this->hmatch( $data, 'setTypes', 'log_type_id' );
    }
    
    public function getTypes(){
        global $_DATABASE;
        $result = [];
        $q = $_DATABASE->query('SELECT * FROM `log_type` WHERE `log_type_id` = "'.$this->_types_id.'";');
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $result[] = $data['log_name'];
        }
    }
    
}