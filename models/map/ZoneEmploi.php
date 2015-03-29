<?php

require_once($RootDir.'models/abstract/MapElement.php');

require_once($RootDir.'models/criteria/Chomage.php');
require_once($RootDir.'models/criteria/Travailleurs.php');

class ZoneEmploi extends MapElement{

    // id, name, parent
    // zoneEmpploi doesn't need a svg identifier
    
    private $_emploi;
    private $_taux_chomage;
    
    private $_chomage = array();
    private $_travailleurs = array();

    protected function hydrate( array &$data ){
        $this->hmatch( $data, 'setId', 'zone_no' );
        $this->hmatch( $data, 'setName', 'zone_name' );
        $this->setParent("France");
        $this->hmatch( $data, 'setEmploi', 'emploi' );
        $this->hmatch( $data, 'setTauxChomage', 'taux_chomage' );
        $this->hmatch( $data, 'setChomage', '_chom' );
        $this->hmatch( $data, 'setTravailleurs', '_trav' );
    }
    
    public function getChomage(){
        return $this->_chomage;
    }
    public function setChomage( array &$chom ){
        $this->_chomage = $chom;
    }
    public function getYearsInChomage(){
        $this->getYearsInCriteria( $this->_chomage );
    }
    
    public function getTravailleurs(){
        return $this->_travailleurs;
    }
    public function settravailleurs( array &$trav ){
        $this->_travailleurs = $trav;
    }
    public function getYearsInTravailleurs(){
        $this->getYearsInCriteria( $this->_travailleurs );
    }
    
    protected function getYearsInCriteria( array &$criterias ){
        $years = [];
        foreach( $criterias as &$crit ){
            if( in_array( $crit->getYear(), $years ) ){
                $years[] = $crit->getYear();
            }
        }
        return $years;
    }
    
    // return the average taux de chomage for the given year
    // return the global average taux de chomage if no year given
    public function avgChomage( $year = null ){
        $result = 0;
        $perYear = [];

        // we recover an array of all the possible years
        $years = [];
        if( $year == null ){
            $years = $this->getYearsInChomage();
        }else{
            $years[] = $year;
        }

        // for each year we recover the average chomage value
        foreach( $years as &$y ){
            $value = 0;
            $count = 0;
            foreach( $this->_chomage as &$chom ){
                if( $chom->getYear() == $y ){
                    $value += $chom->getNum();
                    ++$count;
                }
            }
            $perYear[] = $value / $count;
        }

        // we return the average value of taux de chomage per year
        foreach( $perYear as &$p ){
            $result += $p;
        }
        return $result / sizeof($perYear);
    }
    
    // return the number of travailleurs for the given year
    // or an average number if no year given
    public function countTravailleurs( $year = null ){
        $result = 0;
        $perYear = [];
        
        // we recover an array of all the possible years
        $years = [];
        if( $year == null ){
            $years = $this->getYearsInTravailleurs();
        }else{
            $years[] = $year;
        }
        
        // for each year we recover the number of travailleurs
        foreach( $years as &$y ){
            $num = 0;
            foreach( $this->_travailleurs as &$trav ){
                if( $trav->getYear() == $y ){
                    $num += $trav->getNum();
                }
            }
            $perYear[] = $num;
        }
        
        // we return the average number of travailleurs per year
        foreach( $perYear as &$p ){
            $result += $p;
        }
        return (int)($result / sizeof($perYear));
    }
    
    /* DECREPATED */
    
    // decrepated
    // Nombre de travailleurs | emplois de la zone
    public function getEmploi(){
        return $this->_emploi;
    }
    public function setEmploi($emploi){
        $emploi = (int) $emploi;
        $this->_emploi = $emploi;
    }

    // decrepated
    // Taux de chômage de la zone
    public function getTauxChomage(){
        return $this->_taux_chomage;
    }
    public function setTauxChomage($taux){
        $taux = (double) $taux;
        $this->_taux_chomage = $taux;
    }

    // decrepated
    // si on veut un taux de chomage sous forme de nombre à virgule (non-pourcentage)
    public function getTauxChomageNonPercent(){
        return $this->_taux_chomage / 100;
    }
    public function setTauxChomageNonPercent($taux){
        $taux = (float) $taux;
        $taux *= 100;
        $this->_taux_chomage = $taux;
    }

    // decrepated
    // utilise le nombre de travailleurs et le taux de chomage pour estimer le nombre d'actifs
    public function getActifs(){
        return $this->_emploi / ( 1 - $this->getTauxChomageNonPercent() );
    }

    // decrepated
    // utilise le nombre de travailleurs et le taux de chomage pour estimer le nombre de chomeurs
    public function getChomeurs(){
        return $this->getActifs() * $this->getTauxChomageNonPercent();
    }
    
}