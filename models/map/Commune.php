<?php

require_once($RootDir.'models/abstract/MapElement.php');

class Commune extends MapElement{

    // id, name, parent
    // commune doesn't need a svg identifier
    
    private $_epci;
    private $_zone_emploi_id;

    protected function hydrate( array $data ){
        $this->hmatch( $data, 'setId', 'com_code' );
        $this->hmatch( $data, 'setName', 'com_name' );
        $this->hmatch( $data, 'setParent', 'arr_code' );
        
    }
    
    // Numéro : établissement public de coopération intercommunale
    public function getEPCI(){
        return $this->_epci;
    }
    public function setEPCI($epci){
        $epci = (string) $epci;
        $this->_epci = $epci;
    }
    
    // zone emploi works as a second parent (arrondissement being the first one)
    public function getZoneEmploi(){
        return $this->_zone_emploi_id;
    }
    public function setZoneEmploi($zone_emploi){
        $zone_emploi = (string) $zone_emploi;
        $this->_zone_emploi_id = $zone_emploi;
    }

}
