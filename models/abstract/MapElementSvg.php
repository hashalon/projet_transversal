<?php

require_once($RootDir.'models/abstract/MapElement.php');

require_once($RootDir.'models/interface/CountCriteria.php');

abstract class MapElementSvg extends MapElement implements CountCriteria{
    
    // id, name, parent, svg
    protected $_svg;
    
    public function getSvg(){
        return $this->_svg;
    }
    public function setSvg($svg){
        $svg = (string) $svg;
        $this->_svg = $svg;
    }
    
    abstract public function getChildren();
    
    public function countChildren(){
        return sizeof( $this->getChildren() );
    }
    
    /* GETTERS */

    public function getDeces(){
        return $this->getInChildren('getDeces');
    }
    public function getNaissances(){
        return $this->getInChildren('getNaissances');
    }
    public function getTravailleurs(){
        return $this->getInChildren('getTravailleurs');
    }
    public function getDefm(){
        return $this->getInChildren('getDefm');
    }
    public function getEtablissements(){
        return $this->getInChildren('getEtablissements');
    }
    public function getLogements(){
        return $this->getInChildren('getLogements');
    }
    public function getMenages(){
        return $this->getInChildren('getMenages');
    }
    public function getPopulation(){
        return $this->getInChildren('getPopulation');
    }
    public function getRevenusFiscaux(){
        return $this->getInChildren('getRevenusFiscaux');
    }
    protected function getInChildren( $method ){
        $result = [];
        foreach( $this->getChildren() as &$child ){
            if( method_exists($this, $method) ){
                $result = array_merge( $result, $child->$method() );
            }else{
                throw new Exception("Method does not exist in class");
            }
        }
        return $result;
    }
    
/***** UTILS *****/

    /* COUNT */
    // les fonctions suivantes renvoit le nombre de X par années
    // un nombre moyen est renvoyé si aucune année n'est spécifiée
    
    public function countDeces( $year = null ){
        return $this->countCriteria('countDeces', $year);
    }
    public function countNaissances( $year = null ){
        return $this->countCriteria('countNaissances', $year);
    }
    public function countTravailleurs( $year = null ){
        return $this->countCriteria('countTravailleurs', $year);
    }
    public function countDefm( $year = null ){
        return $this->countCriteria('countDefm', $year);
    }
    public function countEtablissements( $year = null ){
        return $this->countCriteria('countEtablissements', $year);
    }
    public function countLogements( $year = null ){
        return $this->countCriteria('countLogements', $year);
    }
    public function countMenages( $year = null ){
        return $this->countCriteria('countMenages', $year);
    }
    public function countPopulation( $year = null ){
        return $this->countCriteria('countPopulation', $year);
    }
    public function countRevenusFiscaux( $year = null ){
        return $this->countCriteria('countRevenusFiscaux', $year);
    }

    protected function countCriteria( $method, $year = null ){
        $counter = 0;
        $result = 0;
        foreach( $this->getChildren() as &$child ){
            if( method_exists($child, $method) ){
                $result += $child->$method( $year );
            }else{
                throw new Exception("Method does not exist in class: ".$method);
            }
        }
        return $result;
    }
    
    /* GET YEARS IN */

    public function getYearsInDeces(){
        $this->getInChildren('getYearsInDeces');
    }
    public function getYearsInNaissances(){
        $this->getInChildren('getYearsInNaissances');
    }
    public function getYearsInTravailleurs(){
        $this->getInChildren('getYearsInTravailleurs');
    }
    public function getYearsInDefm(){
        $this->getInChildren('getYearsInDefm');
    }
    public function getYearsInEtablissements(){
        $this->getInChildren('getYearsInEtablissements');
    }
    public function getYearsInLogements(){
        $this->getInChildren('getYearsInLogements');
    }
    public function getYearsInMenages(){
        $this->getInChildren('getYearsInMenages');
    }
    public function getYearsInPopulation(){
        $this->getInChildren('getYearsInPopulation');
    }
    public function getYearsInRevenusFiscaux(){
        $this->getInChildren('getYearsInRevenusFiscaux');
    }
    
}