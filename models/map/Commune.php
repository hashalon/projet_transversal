<?php

require_once($RootDir.'models/abstract/MapElementCrit.php');
require_once($RootDir.'models/interface/CountCriteria.php');
require_once($RootDir.'controllers/Controller.php');

require_once($RootDir.'models/criteria/Deces.php');
require_once($RootDir.'models/criteria/Naissances.php');
require_once($RootDir.'models/criteria/Travailleurs.php');
require_once($RootDir.'models/criteria/Defm.php');
require_once($RootDir.'models/criteria/EtablissementsActifs.php');
require_once($RootDir.'models/criteria/Logements.php');
require_once($RootDir.'models/criteria/Menages.php');
require_once($RootDir.'models/criteria/Population.php');
require_once($RootDir.'models/criteria/RevenusFiscaux.php');

class Commune extends MapElementCrit implements CountCriteria{

    // id, name, parent
    // commune doesn't need a svg identifier
    
    private $_epci;

    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'com_code' );
        $this->hmatch( $data, 'setName', 'com_name' );
        $this->hmatch( $data, 'setParent', 'arr_code' );
        $this->hmatch( $data, 'setEpci', 'epci' );
    }
    
    // Numéro : établissement public de coopération intercommunale
    public function getEpci(){
        return $this->_epci;
    }
    public function setEpci($epci){
        $epci = (string) $epci;
        $this->_epci = $epci;
    }
    
    
/***** CRITERES *****/
    
    /* GETTERS */
    
    public function getDeces(){
        global $_controller;
        return $_controller->getCommuneManager()->getDeces($this);
    }
    public function getNaissances(){
        global $_controller;
        return $_controller->getCommuneManager()->getNaissances($this);
    }
    public function getTravailleurs(){
        global $_controller;
        return $_controller->getCommuneManager()->getTravailleurs($this);
    }
    public function getDefm(){
        global $_controller;
        return $_controller->getCommuneManager()->getDefm($this);
    }
    public function getEtablissements(){
        global $_controller;
        return $_controller->getCommuneManager()->getEtablissements($this);
    }
    public function getLogements(){
        global $_controller;
        return $_controller->getCommuneManager()->getLogements($this);
    }
    public function getMenages(){
        global $_controller;
        return $_controller->getCommuneManager()->getMenages($this);
    }
    public function getPopulation(){
        global $_controller;
        return $_controller->getCommuneManager()->getPopulation($this);
    }
    public function getRevenusFiscaux(){
        global $_controller;
        return $_controller->getCommuneManager()->getRevenusFiscaux($this);
    }
    
    
/***** UTILS *****/
    
    /* COUNT */
    // les fonctions suivantes renvoit le nombre de X par années
    // un nombre moyen est renvoyé si aucune année n'est spécifiée
    
    public function countDeces( $year = null ){
        return countCriteria($this->getDeces(), $year);
    }
    public function countNaissances( $year = null ){
        return countCriteria($this->getNaissances(), $year);
    }
    public function countTravailleurs( $year = null ){
        return countCriteria($this->getTravailleurs(), $year);
    }
    public function countDemandeursEmploi( $year = null ){
        return countCriteria($this->getDefm(), $year);
    }
    public function countEtablissements( $year = null ){
        return countCriteria($this->getEtablissements(), $year);
    }
    public function countLogements( $year = null ){
        return countCriteria($this->getLogements(), $year);
    }
    public function countMenages( $year = null ){
        return countCriteria($this->getMenages(), $year);
    }
    public function countPopulation( $year = null ){
        return countCriteria($this->getPopulation(), $year);
    }
    public function countRevenusFiscaux( $year = null ){
        return countCriteria($this->getRevenusFiscaux(), $year);
    }
    
    /* GET YEARS IN */

    public function getYearsInDeces(){
        $this->getYearsInCriteria( $this->getDeces() );
    }
    public function getYearsInNaissances(){
        $this->getYearsInCriteria( $this->getNaissances() );
    }
    public function getYearsInTravailleurs(){
        $this->getYearsInCriteria( $this->getTravailleurs() );
    }
    public function getYearsInDefm(){
        $this->getYearsInCriteria( $this->getDefm() );
    }
    public function getYearsInEtablissements(){
        $this->getYearsInCriteria( $this->getEtablissements() );
    }
    public function getYearsInLogements(){
        $this->getYearsInCriteria( $this->getLogements() );
    }
    public function getYearsInMenages(){
        $this->getYearsInCriteria( $this->getMenages() );
    }
    public function getYearsInPopulation(){
        $this->getYearsInCriteria( $this->getPopulation() );
    }
    public function getYearsInRevenusFiscaux(){
        $this->getYearsInCriteria( $this->getRevenusFiscaux() );
    }
    
    
    
}
