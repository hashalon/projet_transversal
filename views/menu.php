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
            <li <?php if($page=="site_map")echo'class="active"'; ?>><a href="<?= $RootURL ?>?r=site_map">Plan du site</a></li>
            <!-- Pour faire plaisir à Rudi -->
<?php 
    // lien pour afficher les graphiques
    if($page=="graph"){
        echo '<li class="active">';
    }else{
        echo '<li>';
    }
    echo '<a href="'.$RootURL
        .'?r=graph&map='.urlencode($_mapChecker->getMap())
        .'">Graphiques</a></li>';

    // lien pour afficher la carte
    if( $_mapChecker->canDisplayMap() ){

        if($page=="map"){
            echo '<li class="active">';
        }else{
            echo '<li>';
        }
        echo '<a href="'.$RootURL
            .'?r=map&map='.urlencode($_mapChecker->getMap())
            .'&detail='.urlencode($_mapChecker->getCurrentDetail())
            .'">Carte</a></li>';
        if($page=="map"){
    }
?>   
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Detail <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
<?php
    
        // sub link detail = regions
        if( $_mapChecker->canDisplayRegions() ){
            if( $_mapChecker->getCurrentDetail() == "regions" ){
                echo '<li class="active">';
            }else{
                echo '<li>';
            }
            echo '<a href="'.$RootURL
                .'?r=map&map='.urlencode($_mapChecker->getMap())
                .'&detail=regions">Regions</a></li>';
        }else{
            echo '<li class="disable"><a href="">Regions</a></li>';
        }
    
        // sub link detail = departements
        if( $_mapChecker->canDisplayDepartements() ){
            if( $_mapChecker->getCurrentDetail() == "departements" ){
                echo '<li class="active">';
            }else{
                echo '<li>';
            }
            echo '<a href="'.$RootURL
                .'?r=map&map='.urlencode($_mapChecker->getMap())
                .'&detail=departements">Departements</a></li>';
        }else{
            echo '<li class="disable"><a href="">Departements</a></li>';
        }
        
        // sub link detail = arrondissements
        if( $_mapChecker->canDisplayArrondissements() ){
            if( $_mapChecker->getCurrentDetail() == "arrondissements" ){
                echo '<li class="active">';
            }else{
                echo '<li>';
            }
            echo '<a href="'.$RootURL
                .'?r=map&map='.urlencode($_mapChecker->getMap())
                .'&detail=arrondissements">Arrondissements</a></li>';
        }else{
            echo '<li class="disable"><a href="">Arrondissements</a></li>';
        }
        
        // sub link detail = communes
        if( $_mapChecker->canDisplayCommunes() ){
            if( $_mapChecker->getCurrentDetail() == "communes" ){
                echo '<li class="active">';
            }else{
                echo '<li>';
            }
            echo '<a href="'.$RootURL
                .'?r=map&map='.urlencode($_mapChecker->getMap())
                .'&detail=communes">Communes</a></li>';
        }else{
            echo '<li class="disable"><a href="">Communes</a></li>';
        }
    
?>
    </ul>
</li>  
<?php } ?>
        </ul>    
        <ul class="nav navbar-nav navbar-right">
            <li>
                <form action="<?= $RootURL.'?r=search' ?>" method="post" class="navbar-form">
                    <div class="input-group">
                        <input type="text" name="request" id="request" class="form-control" placeholder="Rechercher...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </form>
            </li>
        </ul>
                
    </div>
</nav>
