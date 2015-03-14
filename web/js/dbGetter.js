// script d'accès à la base de données à distance
// Côté client

var dbGetter = {};

dbGetter.result = {};

/**
 * Recover data from the database
 * @param {string} m    the name of the map currently used -> so we only recover useful data
 * @param {string} l    the level of the map: is it a map of a region, departement or the whole france
 * @param {string} d    the detail of the map: does the map represent the regions, department or arrondissements
 * @param {string} crit the criteria applied
 * @param {int}    y    the year for the criteria (optionnal)
 */
dbGetter.getData = function ( m, l, d, crit, y ){
    // CAUTION this script is setted for a local server currently
    var posting = $.post("web/php/dbGetter.php", {
        map: m,
        level: l,
        detail: d,
        criteria: crit,
        year: y
    });
    
    posting.done(function(data){
        // TODO verifier qu'on récupère bien un array js et non un string
        dbGetter.result = data;
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
 *     dbGetter.getData("critère", année);
 * });
 * 
 */

