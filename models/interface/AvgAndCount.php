<?php

interface AvgAndCount{
    
    public function avgDeces( $year = null );
    public function avgNaissances( $year = null );
    public function avgDemandeursEmploi( $year = null );
    public function avgEtablissements( $year = null );
    public function avgLogements( $year = null );
    public function avgMenages( $year = null );
    public function avgPopulation( $year = null );
    public function avgRevenusFiscaux( $year = null );

    public function countDeces( $year = null );
    public function countNaissances( $year = null );
    public function countDemandeursEmploi( $year = null );
    public function countEtablissements( $year = null );
    public function countLogements( $year = null );
    public function countMenages( $year = null );
    public function countPopulation( $year = null );
    public function countRevenusFiscaux( $year = null );
    
}