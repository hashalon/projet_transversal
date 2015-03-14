<?php  ?>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <!-- Contenu du bouton sur mobile (trois barres horizontales) -->
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Texte du bouton principal du menu -->
            <a class="navbar-brand" href="#">France</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <?php if( TRUE ){ ?>
                <li><a href="#">Graphiques</a></li>
                <?php }elseif ( TRUE ) { ?>
                <li><a href="#">Cartes</a></li>
                <?php } ?>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Rechercher">
                </div>
                <button type="submit" class="btn btn-default">Rechercher</button>
            </form>
        </div>
    </div>
</nav>