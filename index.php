<?php
    /* RootDir and RootURL are used to redirect to the the root folder : "projet_transversal" */
    $RootDir = ""; // we set the Root directory relatively to this file
    $RootURL = "/projet_transversal/"; // we set the Root URL relatively to this project
require_once('controllers/Controller.php'); // the Controller.php contains the access to the database as well as the managers
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Suivi Client</title>
        <meta name="author" content="Saphira Ongotto" />
        <meta name="author" content="Dihia Edjekouane" />
        <meta name="author" content="Rudi Grabensee" />
        <meta name="author" content="Nathalia Duske" />
        <meta name="author" content="Olivier Schyns" />
        <meta name="author" content="Olivier Dadare" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="web/css/bootstrap.min.css" rel="stylesheet" />
        <link href="web/css/checkbox.min.css" rel="stylesheet" />
        <link href="web/css/checkboxCustom.min.css" rel="stylesheet" />
        <script src="web/js/jquery.min.js"></script>
        <script src="web/js/bootstrap.min.js"></script>
        <!-- for maps -->
        <script src="web/js/snap.svg.min.js"></script>
        <script src="web/js/tinycolor.min.js"></script>
        <script src="web/js/mapColor.min.js"></script>
        <script src="web/js/dbGetter.min.js"></script>
        <!-- / -->
    </head>
    <body>
        
        <div class="container">
            <?php

                // we add the main menu to the page
                include_once('views/menu.php');
                
                // we set the page based on a URL parameter
                $page = 'map';
                
                if( isset($_GET['r']) ){
                    $page = $_GET['r'];
                }
                
                switch ($page){
                    case 'welcome' :
                        include ('views/navigation/welcome.php');
                        break;
                    case 'site_map' :
                        include ('views/navigation/site_map.php');
                        break;
                    case 'map' :
                        include ('views/map/map.php');
                        break;
                    case 'graph' :
                        include ('views/graph/graph.php');
                        break;
                    case 'search_results' :
                        include ('views/search/results.php');
                        break;
                    default :
                        include ('views/map/map.php');
                        break;
                }
            ?>
        </div>
        
    </body>
</html>