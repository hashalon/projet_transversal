<?php

require_once ($RootDir.'models/abstract/CriteriaCom.php');

class RevenusFiscaux extends CriteriaCom{
    
    // id, year, num, commune_code
    protected $_nombre_pers;
    
    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'rf_id' );
        $this->hmatch( $data, 'setYear', 'rf_year' );
        $this->hmatch( $data, 'setNum', 'nomb_men_fc' );
        $this->hmatch( $data, 'setCommune', 'com_code' );
        $this->hmatch( $data, 'setNombrePersonnes', 'nomb_pers_fc' );
    }
    
    // equivalent to getNum
    public function getNombreMenages(){
        return $this->_num;
    }
    // equivalent to setNum
    public function setNombreMenages($nb){
        $nb = (int) $nb;
        $this->_num = $nb;
    }
    
    public function getNombrePersonnes(){
        return $this->_nombre_pers;
    }
    public function setNombrePersonnes($nb){
        $nb = (int) $nb;
        $this->_nombre_pers = $nb;
    }
}