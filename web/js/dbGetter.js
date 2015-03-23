// script d'accès à la base de données à distance
// Côté client

var dbGetter = {};

dbGetter.result = {};

/**
 * Recover data from the database
 * @param {string} m    the name of the map currently used -> so we only recover useful data
 * @param {string} d    the detail of the map: does the map represent the regions, department or arrondissements
 * @param {string} crit the criteria applied
 * @param {int}    y    the year for the criteria (optionnal)
 */
dbGetter.getData = function ( m, d, crit, y ){
    // CAUTION this script is setted for a local server currently
    var posting = $.post("web/php/dbGetter.php", {
        map: m,
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

dbGetter.stripAccents = function(str) {
    var php = require('phpjs');
    return php.strtr(php.utf8_decode(str), php.utf8_decode("àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ '()"), "aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY____");
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

