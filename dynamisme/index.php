<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- désactivation du zoom sur mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="Site de visualisation de la dynamique du territoire français">
        <meta name="keywords" content="France, territoire, dynamisme, français">
        <meta name="author" content="Natalia Duske, Saphira Ongotto, Dihia Edjekouane, Rudi Granbensee, Olivier Dadare, Olivier Schyns">
        <link href="common/css/bootstrap.min.css" rel="stylesheet">
        <link href="common/css/awesome-bootstrap-checkbox.min.css" rel="stylesheet">
        <link href="common/css/checkboxCustomColors.min.css" rel="stylesheet">
        <style>
            /* styles supplémentaires */
            .checkbox input[type=checkbox]:checked + label:after {
                font-family: 'Glyphicons Halflings';
                content: "\e013";
            }
            .checkbox label:after {
                padding-left: 4px;
                padding-top: 2px;
                font-size: 9px;
            }
        </style>

        <!-- Scripts à exécuter avant le chargement de la page -->
        <script src="common/js/jquery.min.js"></script>
        <!--script src="common/js/npm.js"></script-->
        <!-- On a trop de librairie de gestion des svg... -->
        <script src="common/js/raphael.min.js"></script>
        <script src="common/js/svg.min.js"></script>
        <script src="common/js/snap.svg-min.js"></script>
        <script src="common/js/tinycolor.min.js"></script>
        <script src="common/js/color-map.min.js"></script>
        <script src="common/js/bootstrap.min.js"></script>
        <script>
            // scripts supplémentaires
        </script>
    </head>
    <body>
        <?php include('common/php/menu.php'); ?>

        <!-- Permet d'éviter que les panneaux ne soient recouvert par le menu en haut de la page -->
        <div class="page-header" id="banner"></div>
        
        <!-- Cette div "container" contient tous les trois panneaux de notre page -->
        <!-- l'attribut -fluid permet de faire en sorte que le container occupe toute la largeur de l'écran -->
        <!-- CONTAINER -->
        <div class="container-fluid">
            <div class="row">

                <!-- cette div contient le panneau central, celui-ci contient la carte à afficher -->
                <!-- PANNEAU CENTRAL -->
                <div class="col-sm-9">
                    <script>
                        window.onload = function () {
                            // TODO rename the id of the g group of each svg file to "Map"
                            //mapColor.init("#Map");
                            mapColor.init("#Regions", "#Legend");
                        };
                        
                        var data = {};
                        data["Nord-pas-de-calais"] = -100;
                        data["Haute-normandie"] = -90;
                        data["Basse-normandie"] = -80;
                        data["Picardie"] = -70;
                        data["Centre"] = -60;
                        data["Bretagne"] = -50;
                        data["Poitou-charente"] = -40;
                        data["Aquitaine"] = -30;
                        data["Lorraine"] = -20;
                        data["Limousin"] = -10;
                        data["Bourgogne"] = 0;
                        data["Pays-de-la-loire"] = 10;
                        data["Champagne-ardenne"] = 20;
                        data["Ile-de-france"] = 30;
                        data["Auvergne"] = 40;
                        data["Franche-comte"] = 50;
                        data["Alsace"] = 60;
                        data["Corse"] = 70;
                        data["Midi-pyrenees"] = 80;
                        data["Languedoc-roussillon"] = 90;
                        data["Provence-alpes-cote-d_azur"] = 100;
                        data["Rhone-alpes"] = 110;
                        data["Guadeloupe"] = 120;
                        data["Guyane"] = 130;
                        data["Martinique"] = 140;
                        data["Reunion"] = 150;
                        
                        function ponderate(input, start, middle, end){
                            //var color;
                            // we should select the right data to display each time this function is launched
                            mapColor.apply( data, start, middle, end );
                        };
                    </script>
                    <?php include("maps/france_regions.svg") ?>
                    
                    <!-- Affichage de la legend -->
                    <svg width="100%" height="100%" viewBox="0 0 50 1">
                        <rect id="Legend" style="fill:#214478" width="100%" height="100%" />
                    </svg>
                    
                </div>
                
                <?php include("common/php/side_panel.php"); ?>
                
            </div>
        </div>
        <!-- FIN DE CONTAINER -->

    </body>
</html>