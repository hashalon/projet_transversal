// script d'accès à la base de données à distance
// Côté client

var dbGetter = {};
dbGetter.results = {};
dbGetter.colors = {};
dbGetter.RootURL = "/";

/**
 * Recover data from the database
 * @param {string} m    the name of the map currently used -> so we only recover useful data
 * @param {string} d    the detail of the map: does the map represent the regions, department or arrondissements
 * @param {string} crit the criteria applied
 * @param {int}    y    the year for the criteria (optionnal)
 */
dbGetter.getData = function ( m, d, crit, y ){
    // CAUTION this script is setted for a local server currently
    var posting = $.post(dbGetter.RootURL+"controllers/json/GetDataController.php", {
        map: m,
        detail: d,
        criteria: crit,
        year: y
    });
    
    posting.done(function(json){
        // we store the collected data in a array
        //alert(json);
        var data = JSON.parse(json);
        var results = {};
        for( var i in data ){
            results[i] = data[i];
        }
        mapColor.apply( results, dbGetter.colors[0], dbGetter.colors[1], dbGetter.colors[2] );
    });
    
    posting.fail(function(){
       alert("failed !"); 
    });
}

/*
 * 
 * example of how to call the function dbGetter.getData();
 * 
 * $(document).ready(function(){
 *     dbGetter.getData(map, niveau de detail, critère, année);
 * });
 * 
 */

