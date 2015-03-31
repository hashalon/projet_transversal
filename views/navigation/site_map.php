<?php
require_once($RootDir.'controllers/Controller.php');

$regs = $_controller->getRegionManager()->getList();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>France</h1>
        </div>
    </div>
</div>
<div class="row">
<?php
$counter = 0;
foreach( $regs as &$reg ){
?>
    <div class="col-lg-3 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="<?= $RootURL.'?r=map&map='.urlencode($reg->getSvg()).'&detail=departements' ?>"><?= $reg->getName() ?></a>
            </div>
            <div class="panel-body">
                <ul>
                    <?php foreach( $reg->getChildren() as &$dep ){ ?>
                    <li><a href="<?= $RootURL.'?r=map&map='.urlencode($dep->getSvg()).'&detail=arrondissements' ?>"><?= $dep->getname() ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
<?php
    if( $counter == 3 ){
        $counter = 0;
        echo '</div><div class="row">';
    }else{
        ++$counter;
    }
}
?>
</div>