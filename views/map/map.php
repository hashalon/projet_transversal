<?php
include_once( $RootDir.'views/navigation/ariane.php' );

if( $_mapChecker->canDisplaySVG() ){
    
    include_once( $RootDir.'views/map/map_svg.php' );
    
}elseif( $_mapChecker->canDisplayCommunes() ){
    
    include_once( $RootDir.'views/map/map_communes.php' );
    
}elseif( $_mapChecker->canDisplayOneCommune() ){
    
    include_once( $RootDir.'views/map/map_one_commune.php' );    
    
}

?>