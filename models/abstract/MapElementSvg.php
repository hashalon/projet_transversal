<?php

require_once($RootDir.'models/abstract/MapElement.php');
require_once($RootDir.'models/interface/AvgAndCount.php');

abstract class MapElementSvg extends MapElement implements AvgAndCount{
    
    private $_svg;
    private $_children = array();
    
    public function getSvg(){
        return $this->_svg;
    }
    public function setSvg($svg){
        $svg = (string) $svg;
        $this->_svg = $svg;
    }
    
    public function getChildren(){
        return $this->_children;
    }
    public function setChildren( array $children ){
        $this->_children = $children;
    }
    public function addChild( $child ){
        if( $this->containsChild($child) ){
            $this->_children[] = $child;
        }
    }
    public function containsChild( $child ){
        if( in_array($child, $this->_children) ){
            return true;
        }
        return false;
    }
    
    /* UTILS */

    // Les fonctions suivantes renvoient le nombre de X moyen pour l'année spécifié
    // (nombre moyen sur toutes les années si aucune année n'est spécifié)

    public function avgDeces( $year = null ){
        return avgCriteria('countDeces', $year);
    }
    public function avgNaissances( $year = null ){
        return avgCriteria('countNaissanes', $year);
    }
    public function avgDemandeursEmploi( $year = null ){
        return avgCriteria('countNaissanes', $year);
    }
    public function avgEtablissements( $year = null ){
        return avgCriteria('countNaissanes', $year);
    }
    public function avgLogements( $year = null ){
        return avgCriteria('countNaissanes', $year);
    }
    public function avgMenages( $year = null ){
        return avgCriteria('countNaissanes', $year);
    }
    public function avgPopulation( $year = null ){
        return avgCriteria('countNaissanes', $year);
    }
    public function avgRevenusFiscaux( $year = null ){
        return avgCriteria('countNaissanes', $year);
    }

    protected function avgCriteria( $method, $year = null ){
        $c = $this->countCriteria( $criterias, $year );
        if( $c['counter'] != 0 ){
            return $c['result'] / $c['counter'];
        }
        return 0;
    }

    // those function return an array with the 'result' and 'counter' as keys
    public function countDeces( $year = null ){
        return countCriteria('countDeces', $year);
    }
    public function countNaissances( $year = null ){
        return countCriteria('countNaissanes', $year);
    }
    public function countDemandeursEmploi( $year = null ){
        return countCriteria('countNaissanes', $year);
    }
    public function countEtablissements( $year = null ){
        return countCriteria('countNaissanes', $year);
    }
    public function countLogements( $year = null ){
        return countCriteria('countNaissanes', $year);
    }
    public function countMenages( $year = null ){
        return countCriteria('countNaissanes', $year);
    }
    public function countPopulation( $year = null ){
        return countCriteria('countNaissanes', $year);
    }
    public function countRevenusFiscaux( $year = null ){
        return countCriteria('countNaissanes', $year);
    }

    protected function countCriteria( $method, $year = null ){
        $counter = 0;
        $result = 0;
        foreach( $this->_children as &$child ){
            if( method_exists($child, $method) ){
                $c = $child->$method( $year );
                $result += $c['result'];
                $counter += $c['counter'];
            }
        }
        if( $counter != 0 ){
            return [ 'result' => $result, 'counter' => $counter ];
        }
        return [ 'result' => 0, 'counter' => 0 ];
    }
    
}