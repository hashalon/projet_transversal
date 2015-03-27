<?php

require_once($RootDir.'models/abstract/MapElement.php');

class ZoneEmploi extends MapElement{

    // id, name, parent
    // zoneEmpploi doesn't need a svg identifier
    
    private $_emploi;
    private $_taux_chomage;

    protected function hydrate( array $data ){
        $this->hmatch( $data, 'setId', 'zone_no' );
        $this->hmatch( $data, 'setName', 'zone_name' );
        $this->setParent("France");
        $this->hmatch( $data, 'setEmploi', 'emploi' );
        $this->hmatch( $data, 'setTauxChomage', 'taux_chomage' );
    }

    // decrepeated
    // Nombre de travailleurs | emplois de la zone
    public function getEmploi(){
        return $this->_emploi;
    }
    public function setEmploi($emploi){
        $emploi = (string) $emploi;
        $this->_emploi = $emploi;
    }

    // decrepeated
    // Taux de chômage de la zone
    public function getTauxChomage(){
        return $this->_taux_chomage;
    }
    public function setTauxChomage($taux){
        $taux = (string) $taux;
        $this->_taux_chomage = $taux;
    }
    
    // decrepeated
    // si on veut un taux de chomage sous forme de nombre à virgule (non-pourcentage)
    public function getTauxChomageNonPercent(){
        return $this->_taux_chomage / 100;
    }
    public function setTauxChomageNonPercent($taux){
        $taux = (float) $taux;
        $taux *= 100;
        $this->_taux_chomage = $taux;
    }
    
    // decrepeated
    // utilise le nombre de travailleurs et le taux de chomage pour estimer le nombre d'actifs
    public function getActifs(){
        return $this->_emploi / ( 1 - $this->getTauxChomageNonPercent() );
    }
    
    // decrepeated
    // utilise le nombre de travailleurs et le taux de chomage pour estimer le nombre de chomeurs
    public function getChomeurs(){
        return $this->getActifs() * $this->getTauxChomageNonPercent();
    }

}