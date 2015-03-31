<?php



?>
<script>
   
        

    $(function () {
        
        
        createGraph("pie",
                    "#graphPop",
                    "Populatio active",
                    "Données du gourvernement",
                    "Nombre de personnes",
                    "",
                    "",
                    [
            ['Travailleur',200],
            ['chômeur',50]
        ]);
        createGraph("pie",
                    "#graphDesc1",
                    "Populatio active",
                    "Données du gourvernement",
                    "Nombre de personnes",
                    "",
                    "",
                    [
            ['Travailleur',200],
            ['chômeur',50]
        ]);
        createGraph("pie",
                    "#graphDesc2",
                    "Populatio active",
                    "Données du gourvernement",
                    "Nombre de personnes",
                    "",
                    "",
                    [
            ['Travailleur',200],
            ['chômeur',50]
        ]);
         createGraph("column",
                    "#graphDesc3",
                    "Populatio active",
                    "Données du gourvernement",
                    "Nombre",
                    "tata",
                    ['type de personnes','autre'],
                    [{
            name: 'Travailleur',
            data: [100.9]

        }, {
            name: 'Chômeur',
            data: [42.4]

        }]);

    });
</script>
 <div class="tab-content col-sm-12">
            <div id="sectionA" class="tab-pane fade in active">

                <h3>Données Graphique</h3>
                <section class="col-sm-6">

                    <div id="graphDesc1" style="width: auto; height: 400px; margin: 0 auto"></div>
                </section>
                <section class="col-sm-6">

                    <div id="graphDesc2" style="width: auto; height: 400px; margin: 0 auto"></div>
                </section>
                <section class="col-sm-6">

                    <div id="graphDesc3" style="width: auto; height: 400px; margin: 0 auto"></div>
                </section>
                <section class="col-sm-6">

                    <div id="graphDesc4" style="width: auto; height: 400px; margin: 0 auto"></div>
                </section>
            </div>

