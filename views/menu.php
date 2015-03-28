<?php 
    
?>

<nav class="navbar navbar-default navbar-static-top">   
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= $RootURL ?>">
            <span><img src="web/img/franceLogo.png" alt="DynamismeFR" /> Accueil</span>
        </a>
    </div>
            
    <div class="navbar-collapse collapse navbar-responsive-collapse" aria-expanded="true">
        <ul class="nav navbar-nav">
            <li class="<?php if($page=="graph") echo"active"; ?>"><a href="<?= $RootURL."?r=graph&map=".urlencode ($map) ?>">Graphes</a></li> 
            <li class="<?php if($page=="map") echo"active"; ?>"><a href="<?= $RootURL."?r=map&map=".urlencode($map)."&detail=".urlencode($detail) ?>">Carte</a></li>
            <?php if( $page=="map" ){ ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Detail <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="<?php if($detail=="regions") echo"active"; ?>"><a href="<?= $RootURL."?r=map&map=".urlencode($map)."&detail=regions" ?>">Regions</a></li>
                    <li class="<?php if($detail=="departements") echo"active"; ?>"><a href="<?= $RootURL."?r=map&map=".urlencode($map)."&detail=departements" ?>">Departements</a></li>
                    <li class="<?php if($detail=="arrondissements") echo"active"; ?>"><a href="<?= $RootURL."?r=map&map=".urlencode($map)."&detail=arrondissements" ?>">Arrondissements</a></li>
                </ul>
            </li>
            <?php } ?>
        </ul>    
        <ul class="nav navbar-nav navbar-right">
            <li>
                <form action="controller/search/SearchController.php" class="navbar-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Rechercher...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </form>
            </li>
        </ul>
                
    </div>
</nav>
