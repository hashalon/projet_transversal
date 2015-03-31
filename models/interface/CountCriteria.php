<?php

interface CountCriteria{

    /* GETTERS */
    
    public function getDeces();
    public function getNaissances();
    public function getTravailleurs();
    public function getDefm();
    public function getEtablissements();
    public function getLogements();
    public function getMenages();
    public function getPopulation();
    public function getRevenusFiscaux();
    
/***** UTILS *****/
    
    /* COUNT */
    public function countDeces( $year = null );
    public function countNaissances( $year = null );
    public function countDemandeursEmploi( $year = null );
    public function countEtablissements( $year = null );
    public function countLogements( $year = null );
    public function countMenages( $year = null );
    public function countPopulation( $year = null );
    public function countRevenusFiscaux( $year = null );
    
    /* GET YEARS IN */
    public function getYearsInDeces();
    public function getYearsInNaissances();
    public function getYearsInTravailleurs();
    public function getYearsInDefm();
    public function getYearsInEtablissements();
    public function getYearsInLogements();
    public function getYearsInMenages();
    public function getYearsInPopulation();
    public function getYearsInRevenusFiscaux();
    
    /* GET CATEGORIES IN */
    //public function getCategoriesInFormation();
    //public function getCategoriesInPopulation();
    //public function getCategoriesInTravailleurs();
    
    /* GET PLACES IN */
    //public function getPlacesInDeces();
    //public function getPlacesInNaissances();
    
    /* GET TYPES IN */
    //public function getTypesInDefm();
    //public function getTypesInEtablissements();
    //public function getTypesInLogements();
    //public function getTypesInMenages();
    //public function getTypesInPopulation();
    
    
    
}