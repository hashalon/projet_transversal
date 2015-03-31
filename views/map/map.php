<?php
include_once( $RootDir.'views/navigation/ariane.php' );

if( $_mapChecker->canDisplaySVG() ){
    
    include_once( $RootDir.'views/map/map_svg.php' );
    
}elseif( $_mapChecker->canDisplayCommunes() ){
    
    include_once( $RootDir.'views/map/map_communes.php' );
    
}elseif( $_mapChecker->canDisplayOneCommune() ){
    
    //header( 'Location: '.$RootURL.'?r=graph&map='.$_mapChecker->getMap() );    
    
}

?>