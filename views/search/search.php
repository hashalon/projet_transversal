<?php

// we make sure that map is an non empty string
$request = "";
if( isset($_POST['request']) ){
    if( !empty($_POST['request']) ){
        $request = "".$_POST['request'];
    }
}

// if map is indeed an empty string we return to the main page
if( $request == "" ){
    header('Location: '.$RootDir);
    die;
}

// map isn't an empty string, it contains at least one character
// we call our main controller
require_once($RootDir.'controllers/Controller.php');

function normalize($str){
    // we remove all accentuated and spécial characters
    $str = strtr(
        utf8_decode($str),
        utf8_decode("àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ_-'()"),
        "aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY     "
    );
    // we turn all of the characters to the lower case
    $str = strtolower($str);
    return $str;
}
function contains($needle, $haystack){
    return strpos( normalize($haystack), $needle ) !== false;
}

$words = explode( ' ', normalize($request) );


$regs = $_controller->getRegionManager()->getList();
$valid_regs = [];
foreach( $regs as &$reg ){
    $match = false;
    foreach( $words as &$word ){
        if( contains( $word, $reg->getName() ) ){
            $match = true;
        }
    }
    if( $match ){
        $valid_regs[] = $reg;
    }
}

$deps = $_controller->getDepartementManager()->getList();
$valid_deps = [];
foreach( $deps as &$dep ){
    $match = false;
    foreach( $words as &$word ){
        if( contains( $word, $dep->getName() ) ){
            $match = true;
        }
    }
    if( $match ){
        $valid_deps[] = $dep;
    }
}

$arrs = $_controller->getArrondissementManager()->getList();
$valid_arrs = [];
foreach( $arrs as &$arr ){
    $match = false;
    foreach( $words as &$word ){
        if( contains( $word, $arr->getName() ) ){
            $match = true;
        }
    }
    if( $match ){
        $valid_arrs[] = $arr;
    }
}

$coms = $_controller->getCommuneManager()->getList();
$valid_coms = [];
foreach( $coms as &$com ){
    $match = false;
    foreach( $words as &$word ){
        if( contains( $word, $com->getName() ) ){
            $match = true;
        }
    }
    if( $match ){
        $valid_coms[] = $com;
    }
}

?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Résultats</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Regions</div>
            <div class="panel-body">
                <div class="col-lg-3 col-sm-6">
                    <ul>
<?php
$counter = 1;
foreach( $valid_regs as $reg ){
?>
                        <li><a href="<?= $RootDir.'?r=map&map='.urlencode($reg->getSvg()).'&detail=departements' ?>"><?= $reg->getName() ?></a></li>
<?php
    if( $counter == (int)(sizeof($valid_regs)/4 + 1) ){
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
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Departements</div>
            <div class="panel-body">
                <div class="col-lg-3 col-sm-6">
                    <ul>
<?php
$counter = 1;
foreach( $valid_deps as $dep ){
?>
                        <li><a href="<?= $RootDir.'?r=map&map='.urlencode($dep->getSvg()).'&detail=arrondissements' ?>"><?= $dep->getName() ?></a></li>
<?php
    if( $counter == (int)(sizeof($valid_deps)/4 + 1) ){
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
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Arrondissements</div>
            <div class="panel-body">
                <div class="col-lg-3 col-sm-6">
                    <ul>
<?php
$counter = 1;
foreach( $valid_arrs as $arr ){
?>
                        <li><a href="<?= $RootDir.'?r=map&map='.urlencode($arr->getSvg()).'&detail=communes' ?>"><?= $arr->getName() ?></a></li>
<?php
    if( $counter == (int)(sizeof($valid_arrs)/4 + 1) ){
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
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Communes</div>
            <div class="panel-body">
                <div class="col-lg-3 col-sm-6">
                    <ul>
<?php
$counter = 1;
foreach( $valid_coms as $com ){
?>
                        <li><a href="<?= $RootDir.'?r=map&map='.urlencode($com->getId()).'&detail=com' ?>"><?= $com->getName() ?></a></li>
<?php
    if( $counter == (int)(sizeof($valid_coms)/4 + 1) ){
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

