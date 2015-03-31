<?php

$parent;
$coms = [];

if( $_mapChecker->getLevel() == 4 ){
    
    require_once( $RootDir.'models/map/France.php' );
    $parent = new France([]);
    $regs = $parent->getChildren();
    foreach( $regs as &$reg ){
        $deps = $reg->getChildren();
        foreach( $deps as &$dep ){
            $arrs = $dep->getChildren();
            foreach( $arrs as &$arr ){
                $coms = array_merge( $coms, $arr->getChildren() );
            }
        }
    }
    
}elseif( $_mapChecker->getLevel() == 3 ){
    
    $parent = $_controller->getRegionManager()->getBySvg( $_mapChecker->getMap() );
    $deps = $parent->getChildren();
    foreach( $deps as &$dep ){
        $arrs = $dep->getChildren();
        foreach( $arrs as &$arr ){
            $coms = array_merge( $coms, $arr->getChildren() );
        }
    }
    
}elseif( $_mapChecker->getLevel() == 2 ){
    
    $parent = $_controller->getDepartementManager()->getBySvg( $_mapChecker->getMap() );
    $arrs = $parent->getChildren();
    foreach( $arrs as &$arr ){
        $coms = array_merge( $coms, $arr->getChildren() );
    }
    
}elseif( $_mapChecker->getLevel() == 1 ){
    
    $parent = $_controller->getArrondissementManager()->getBySvg( $_mapChecker->getMap() );
    $coms = $parent->getChildren();
    
}else{
    header('Location: '.$RootURL.'?map=France&detail=regions');
    die;
}

?>
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1><?= $parent->getName() ?></h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Communes</div>
            <div class="panel-body">
                <div class="col-lg-3 col-sm-6">
                    <ul>
<?php
$counter = 1;
foreach( $coms as $com ){
?>
                        <li><a href="<?= $RootDir.'?r=map&map='.urlencode($com->getId()).'&detail=com' ?>"><?= $com->getName() ?></a></li>
<?php
    if( $counter == (int)(sizeof($coms)/4 + 1) ){
        $counter = 1;
        echo '</ul></div><div class="col-lg-3 col-sm-6"><ul>';
    }else{
        ++$counter;
    }
}
?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>