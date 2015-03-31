<?php

$arr = $_controller->getArrondissementManager()->getBySvg( $_mapChecker->getMap() );
$coms = $arr->getChildren();

?>
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1><?= $arr->getName() ?></h1>
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