<?php

require_once($RootDir.'models/abstract/MapElementCrit.php');

require_once($RootDir.'models/criteria/Deces.php');
require_once($RootDir.'models/criteria/Naissances.php');
require_once($RootDir.'models/criteria/Travailleurs.php');
require_once($RootDir.'models/criteria/Defm.php');
require_once($RootDir.'models/criteria/EtablissementsActifs.php');
require_once($RootDir.'models/criteria/Logements.php');
require_once($RootDir.'models/criteria/Menages.php');
require_once($RootDir.'models/criteria/Population.php');
require_once($RootDir.'models/criteria/RevenusFiscaux.php');

require_once($RootDir.'models/interface/CountCriteria.php');

class Commune extends MapElementCrit implements CountCriteria{

    // id, name, parent
    // commune doesn't need a svg identifier
    
    private $_epci;
    private $_zone_emploi_id;
    
    private $_deces = array();
    private $_naissances = array();
    private $_travailleurs = array();
    private $_defm = array();
    private $_etablissements = array();
    private $_logs = array();
    private $_menages = array();
    private $_pops = array();
    private $_fisc = array();

    protected function hydrate( array &$data ){
        $this->hmatch( $data, 'setId', 'com_code' );
        $this->hmatch( $data, 'setName', 'com_name' );
        $this->hmatch( $data, 'setParent', 'arr_code' );
        $this->hmatch( $data, 'setEpci', 'epci' );
        $this->hmatch( $data, 'setZoneEmploi', 'zone_no' );
        
        $this->hmatch( $data, 'setDeces', '_deces' );
        $this->hmatch( $data, 'setNaissances', '_naiss' );
        $this->hmatch( $data, 'setTravailleurs', '_trav' );
        $this->hmatch( $data, 'setDefm', '_defm' );
        $this->hmatch( $data, 'setEtablissements', '_etab' );
        $this->hmatch( $data, 'setLogements', '_loge' );
        $this->hmatch( $data, 'setMenages', '_mena' );
        $this->hmatch( $data, 'setPopulation', '_popu' );
        $this->hmatch( $data, 'setRevenusFiscaux', '_fisc' );
    }
    
    // Numéro : établissement public de coopération intercommunale
    public function getEpci(){
        return $this->_epci;
    }
    public function setEpci($epci){
        $epci = (string) $epci;
        $this->_epci = $epci;
    }
    
    // zone emploi works as a second parent (arrondissement being the first one)
    public function getZoneEmploi(){
        return $this->_zone_emploi_id;
    }
    public function setZoneEmploi($zone_emploi){
        $this->_zone_emploi_id = $zone_emploi;
    }
    
    
/***** CRITERES *****/
    
    /* SETTERS */
    
    public function setDeces( array &$deces ){
        $this->_deces = $deces;
    }
    public function setNaissances(array &$naiss){
        $this->_naissances = $naiss;
    }
    public function settravailleurs( array &$trav ){
        $this->_travailleurs = $trav;
    }
    public function setDefm(array &$defm){
        $this->_defm = $defm;
    }
    public function setEtablissements(array &$eta){
        $this->_etablissements = $eta;
    }
    public function setLogements(array &$logs){
        $this->_logs = $logs;
    }
    public function setMenages(array &$men){
        $this->_menages = $men;
    }
    public function setPopulation(array &$pops){
        $this->_pops = $pops;
    }
    public function setRevenusFiscaux(array &$fisc){
        $this->_fisc = $fisc;
    }
    
    /* GETTERS */
    
    public function getDeces(){
        return $this->_deces;
    }
    public function getNaissances(){
        return $this->_naissances;
    }
    public function getTravailleurs(){
        return $this->_travailleurs;
    }
    public function getDefm(){
        return $this->_defm;
    }
    public function getEtablissements(){
        return $this->_etablissements;
    }
    public function getLogements(){
        return $this->_logs;
    }
    public function getMenages(){
        return $this->_menages;
    }
    public function getPopulation(){
        return $this->_pops;
    }
    public function getRevenusFiscaux(){
        return $this->_fisc;
    }
    
    
/***** UTILS *****/
    
    /* COUNT */
    // les fonctions suivantes renvoit le nombre de X par années
    // un nombre moyen est renvoyé si aucune année n'est spécifiée
    
    public function countDeces( $year = null ){
        return countCriteria($this->_deces, $year);
    }
    public function countNaissances( $year = null ){
        return countCriteria($this->_naissances, $year);
    }
    public function countTravailleurs( $year = null ){
        return countCriteria($this->_travailleurs, $year);
    }
    public function countDemandeursEmploi( $year = null ){
        return countCriteria($this->_defm, $year);
    }
    public function countEtablissements( $year = null ){
        return countCriteria($this->_etablissements, $year);
    }
    public function countLogements( $year = null ){
        return countCriteria($this->_logs, $year);
    }
    public function countMenages( $year = null ){
        return countCriteria($this->_menages, $year);
    }
    public function countPopulation( $year = null ){
        return countCriteria($this->_pops, $year);
    }
    public function countRevenusFiscaux( $year = null ){
        return countCriteria($this->_fisc, $year);
    }
    
    /* GET YEARS IN */

    public function getYearsInDeces(){
        $this->getYearsInCriteria( $this->_deces );
    }
    public function getYearsInNaissances(){
        $this->getYearsInCriteria( $this->_naissances );
    }
    public function getYearsInTravailleurs(){
        $this->getYearsInCriteria( $this->_travailleurs );
    }
    public function getYearsInDefm(){
        $this->getYearsInCriteria( $this->_defm );
    }
    public function getYearsInEtablissements(){
        $this->getYearsInCriteria( $this->_etablissements );
    }
    public function getYearsInLogements(){
        $this->getYearsInCriteria( $this->_logs );
    }
    public function getYearsInMenages(){
        $this->getYearsInCriteria( $this->_menages );
    }
    public function getYearsInPopulation(){
        $this->getYearsInCriteria( $this->_pops );
    }
    public function getYearsInRevenusFiscaux(){
        $this->getYearsInCriteria( $this->_fisc );
    }
    
    
    
}
