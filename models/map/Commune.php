<?php

require_once($RootDir.'models/abstract/MapElement.php');

require_once($RootDir.'models/criteria/Deces.php');
require_once($RootDir.'models/criteria/Naissances.php');
require_once($RootDir.'models/criteria/Defm.php');
require_once($RootDir.'models/criteria/EtablissementsActifs.php');
require_once($RootDir.'models/criteria/Logements.php');
require_once($RootDir.'models/criteria/Menages.php');
require_once($RootDir.'models/criteria/Population.php');
require_once($RootDir.'models/criteria/RevenusFiscaux.php');

class Commune extends MapElement{

    // id, name, parent
    // commune doesn't need a svg identifier
    
    private $_epci;
    private $_zone_emploi_id;
    
    private $_deces = array();
    private $_naissances = array();
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
        $zone_emploi = (string) $zone_emploi;
        $this->_zone_emploi_id = $zone_emploi;
    }
    
    public function getDeces(){
        return $this->_deces;
    }
    public function setDeces( array $deces ){
        $this->_deces = $deces;
    }
    
    public function getNaissances(){
        return $this->_naissances;
    }
    public function setNaissances(array $naiss){
        $this->_naissances = $naiss;
    }
    
    public function getDefm(){
        return $this->_defm;
    }
    public function setDefm(array $defm){
        $this->_defm = $defm;
    }
    
    public function getEtablissements(){
        return $this->_etablissements;
    }
    public function setEtablissements(array $eta){
        $this->_etablissements = $eta;
    }
    
    public function getLogements(){
        return $this->_logs;
    }
    public function setLogements(array $logs){
        $this->_logs = $logs;
    }
    
    public function getMenages(){
        return $this->_menages;
    }
    public function setMenages(array $men){
        $this->_menages = $men;
    }
    
    public function getPopulation(){
        return $this->_pops;
    }
    public function setPopulation(array $pops){
        $this->_pops = $pops;
    }
    
    public function getRevenusFiscaux(){
        return $this->_fisc;
    }
    public function setRevenusFiscaux(array $fisc){
        $this->_fisc = $fisc;
    }

    /* UTILS */
    
    // Les fonctions suivantes renvoient le nombre de X moyen pour l'année spécifié
    // (nombre moyen sur toutes les années si aucune année n'est spécifié)
    
    public function avgDeces( $year = null ){
        return avgCriteria($this->_deces, $year);
    }
    public function avgNaissances( $year = null ){
        return avgCriteria($this->_naissances, $year);
    }
    public function avgDemandeursEmploi( $year = null ){
        return avgCriteria($this->_defm, $year);
    }
    public function avgEtablissements( $year = null ){
        return avgCriteria($this->_etablissements, $year);
    }
    public function avgLogements( $year = null ){
        return avgCriteria($this->_logs, $year);
    }
    public function avgMenages( $year = null ){
        return avgCriteria($this->_menages, $year);
    }
    public function avgPopulation( $year = null ){
        return avgCriteria($this->_pops, $year);
    }
    public function avgRevenusFiscaux( $year = null ){
        return avgCriteria($this->_fisc, $year);
    }
    
    protected function avgCriteria( array $criterias, $year ){
        $year = (int) $year;
        $counter = 0;
        $result = 0;
        foreach( $criterias as &$crit ){
            if( $year == null || $crit->getYear() == $year ){
                $result += $crit->getNum();
                ++$counter;
            }
        }
        if( $counter != 0 ){
            return $result / $counter;
        }
        return 0;
    }
    
}
