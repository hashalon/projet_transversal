<?php // echo and html content is prohibited in this class because must only return json data

// we set the $RootDir variable back to the root directory
$RootDir = '../../';

// we include the main controller
require_once ($RootDir.'controllers/Controller.php');
require_once ($RootDir.'controllers/map/MapChecker.php');
require_once ($RootDir.'models/map/France.php');

/*$_mapChecker->postMode(); // we change the mode of mapChecker to check data sent by POST and not GET

if( $_mapChecker->isValid() ){
    
    if( isset($_POST['criteria']) ){
        if( !empty($_POST['criteria']) ){
            if( isset($_POST['year']) ){
                getData( $_POST['criteria'], $_POST['year'] );
            }else{
                getData( $_POST['criteria'] );
            }
        }
    }
    
}*/

 // TODO TO REMOVE
if( isset($_GET['year']) ){
        getData( $_GET['criteria'], $_GET['year'] );
}else{
        getData( $_GET['criteria'] );
}


// dataChecker will launch the function if values are valid
function getData( $criteria, $year = null ){
    global $_mapChecker;
    
    echo $criteria.$year;
    
    $data = [];
    
    $elements = getSubElements( $_mapChecker->getMap(), $_mapChecker->getDetail()  );
    
    switch( $criteria ){
        // Population active
        case 'pop_active' :
            foreach( $elements as &$e ){
                $data[ $e->getSvg() ] = $e->countTravailleurs($year) + $e->countDefm($year);
            }
            break;
        case 'trav' :
            foreach( $elements as &$e ){
                $data[ $e->getSvg() ] = $e->countTravailleurs($year);
            }
            break;
        case 'chom' :
            foreach( $elements as &$e ){
                $data[ $e->getSvg() ] = $e->countDefm($year);
            }
            break;
        case 'taux_chom' :
            foreach( $elements as &$e ){
                $data[ $e->getSvg() ] = $e->countDefm($year) / $e->countTravailleurs($year) + $e->countDefm($year);
            }
            break;
        // Population
        case 'pop' :
            foreach( $elements as &$e ){
                $data[ $e->getSvg() ] = $e->countPopulation($year);
            }
            break;
        case 'naiss' :
            foreach( $elements as &$e ){
                $data[ $e->getSvg() ] = $e->countNaissance($year);
            }
            break;
        case 'deces' :
            foreach( $elements as &$e ){
                $data[ $e->getSvg() ] = $e->countDeces($year);
            }
            break;
        case 'var_demo' :
            foreach( $elements as &$e ){
                $data[ $e->getSvg() ] = $e->countNaissance($year) - $e->countDeces($year);
            }
            break;
        // Logements
        case 'loge' :
            foreach( $elements as &$e ){
                $data[ $e->getSvg() ] = $e->countLogements($year);
            }
            break;
        case 'mena' :
            foreach( $elements as &$e ){
                $data[ $e->getSvg() ] = $e->countMenages($year);
            }
            break;
        // Entreprises
        case 'etabl' :
            foreach( $elements as &$e ){
                $data[ $e->getSvg() ] = $e->countEtablissements($year);
            }
            break;
    }
    echo json_encode($data);
}

function getSubElements( $map_name, $detail ){
    global $_controller;
    global $_mapChecker;
    
    $map;
    $subs = [];
    switch( $_mapChecker->getLevel() ){
        case 4 :
            $map = new France([]);
            break;
        case 3 :
            $map = $_controller->getRegionManager()->getBySvg( $map_name );
            break;
        case 2 :
            $map = $_controller->getDepartementManager()->getBySvg( $map_name );
            break;
        case 1 :
            $map = $_controller->getArrondissementManager()->getBySvg( $map_name );
            break;
    }
    
    echo $map->getName();
    
    if( $_mapChecker->getLevel() == $_mapChecker->getDetail() ){ // same level
        
        $subs = $map->getChildren();
        
    }elseif( $_mapChecker->getLevel() == ($_mapChecker->getDetail()+1) ){ // one level below
        
        $sub1 = $map->getChildren();
        foreach( $sub1 as &$parent1 ){
            
            $subs = array_merge( $subs, $parent1->getChildren() );
        }
        
    }elseif( $_mapChecker->getLevel() == ($_mapChecker->getDetail()+2) ){ // two level below
        
        $sub1 = $map->getChildren();
        foreach( $sub1 as &$parent1 ){
            
            $sub2 = $parent1->getChildren();
            foreach( $sub2 as &$parent2 ){
                
                $subs = array_merge( $subs, $parent2->getChildren() );
            }
        }
        
    }elseif( $_mapChecker->getLevel() == ($_mapChecker->getDetail()+3) ){ // three level below
        
        // not used since France: 4 - 3 = 1 :communes
        // But we don't show communes on the map
        $sub1 = $map->getChildren();
        foreach( $sub1 as &$parent1 ){
            
            $sub2 = $parent1->getChildren();
            foreach( $sub2 as &$parent2 ){
                
                $sub3 = $parent2->getChildren();
                foreach( $sub3 as &$parent3 ){
                    $subs = array_merge( $subs, $parent3->getChildren() );
                }
            }
        }
        
    }
    
    return $subs;
}
