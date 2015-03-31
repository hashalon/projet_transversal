<?php

require_once($RootDir.'models/abstract/MapElement.php');

abstract class MapElementCrit extends MapElement{
    
    protected function getYearsInCriteria( array $criterias ){
        $years = [];
        foreach( $criterias as &$crit ){
            if( !in_array( $crit->getYear(), $years ) ){
                $years[] = $crit->getYear();
            }
        }
        return $years;
    }
    
    protected function avgCriteria( array $criterias, $year = null ){
        $result = 0;
        $perYear = [];

        // we recover an array of all the possible years
        $years = [];
        if( $year == null ){
            $years = $this->getYearsInCriteria( $criterias );
        }else{
            $years[] = $year;
        }

        // for each year we recover the average criteria value
        foreach( $years as $y ){
            $value = 0;
            $count = 0;
            foreach( $criterias as &$crit ){
                if( $crit->getYear() == $y ){
                    $value += $crit->getNum();
                    ++$count;
                }
            }
            if( $count != 0 ){
                $perYear[] = $value / $count;
            }else{
                $perYear[] = 0;
            }
        }

        // we return the average value of taux de criteria per year
        foreach( $perYear as $p ){
            $result += $p;
        }
        if( sizeof($perYear) != 0 ){
            return $result / sizeof($perYear);
        }else{
            return 0;
        }
    }
    
    protected function countCriteria( array $criterias, $year = null ){
        $result = 0;
        $perYear = [];

        // we recover an array of all the possible years
        $years = [];
        if( $year == null ){
            $years = $this->getYearsInCriteria( $criterias );
        }else{
            $years[] = $year;
        }

        // for each year we recover the number of the elements
        foreach( $years as $y ){
            $num = 0;
            foreach( $criterias as &$crit ){
                if( $crit->getYear() == $y ){
                    $num += $crit->getNum();
                }
            }
            $perYear[] = $num;
        }

        // we return the average number of elements per year
        foreach( $perYear as &$p ){
            $result += $p;
        }
        if( sizeof($perYear) != 0 ){
            return (int)($result / sizeof($perYear));
        }else{
            return 0;
        }
    }
    
}