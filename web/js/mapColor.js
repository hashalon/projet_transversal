// var tinycolor = require("./tinycolor");
// TODO and medium color grad
var mapColor = {};

mapColor.map; // the map to be colored
mapColor.legend; // the gradient of color which presents the lowest and highest values
mapColor.x = 386;
mapColor.y = 295;

// we shouldn't have to change the value given to this function
// but yet we can if we want to.
/**
 * set the map to be used
 * @param {String} map_id id of the map to be used
 */
mapColor.init = function( map_id, legend_id ){
    mapColor.map = Snap.select( map_id );
    
    if( map_id != "#Map" ){
        var bbox = mapColor.map.getBBox();
        
        if( bbox['height'] >= bbox['width'] ){
            var htr = (mapColor.x/2)-bbox['cx'];
            var vtr = (mapColor.y/2)-bbox['cy'];
            var scale = mapColor.x / bbox['height'];
            mapColor.map.transform(
                "t"+htr+","+vtr+
                "s"+scale
            );
                
        }else{
            var htr = (mapColor.x/2)-bbox['cx'];
            var vtr = (mapColor.y/2)-bbox['cy'];
            var scale = mapColor.y / bbox['width'];
            mapColor.map.transform(
                "t"+htr+","+vtr+
                "s"+scale
            );
            
        }
    }
    
    // on ajoute des evenements sur les éléments pour changer de page
    var paths = mapColor.map.selectAll("path");
    for( var i=0; i<paths.length; ++i ){
        
        var text = mapColor.map.text(10,10,"");
        text.attr({
            fill: "#fff"
        });
        
        paths[i].click(function(){
            alert('clicked: '+this.attr("id"));
        });
        
        paths[i].hover(
            function(){
                this.attr({
                    stroke: "#fff",
                    strokeWidth: 2
                });
                text.attr({
                    text: this.attr("id")
                });
            },
            function(){
                this.attr({
                    strokeWidth: 0
                });
                text.attr({
                    text: ''
                });
            }
        );
        
    }
    
                
    mapColor.legend = Snap.select( legend_id );
};

/**
 * Color the map base on the given data set
 * The data set must have for keys the id of the element to color
 * and for values float numbers
 * @param   {map}    data   set which has for keys the id of the element
 * @param   {String} start  start color to apply to the elements
 * @param   {String} end    end color to apply to the elements
 */
mapColor.apply = function( data, start, middle, end ){
    
    // we will search for the minimal and maximal values
    var minValue = Number.MAX_VALUE;
    var maxValue = Number.MIN_VALUE;
    
    var startColor = tinycolor(start).toRgb();
    var middleColor = tinycolor(middle).toRgb();
    var endColor = tinycolor(end).toRgb();

    // we set up the minimal and maximal values of our data set
    for( var i in data){
        if( minValue > data[i] ){
            minValue = data[i];
        }
        if( maxValue < data[i] ){
            maxValue = data[i];
        }
    }
    
    // we loop all the elements of the map to color them
    for( var i in data){
        mapColor.map.select( "#".concat(i) ).attr({
            fill: gradient( data[i], minValue, maxValue )  
        });
    }
    
    mapColor.legend.attr({
        fill: "l(0,0,1,0)"+start+"-"+middle+"-"+end
    });
    
    /**
     * Generate an interpolated color from a value,
     * a minorant and a majorant as well as
     * a start color and a end color
     * @param {float}  value the value
     * @param {float}  min   the minorant of the value
     * @param {float}  max   the majorant of the value
     */
    function gradient( value, min, max ){
        // TODO utiliser la valeur de middle
        var pick = ((value-min) / (max-min));
        
        var r, g, b, startModif, endModif;
        
        if( pick <= 0.5 ){
            startModif = (0.5 - pick) * 2.0;
            endModif = pick * 2.0;
            var r = Interpolate(startColor.r, middleColor.r, startModif, endModif);
            var g = Interpolate(startColor.g, middleColor.g, startModif, endModif);
            var b = Interpolate(startColor.b, middleColor.b, startModif, endModif);
        }else{
            startModif = (1.0 - pick) * 2.0;
            endModif = (pick - 0.5) * 2.0;
            var r = Interpolate(middleColor.r, endColor.r, startModif, endModif);
            var g = Interpolate(middleColor.g, endColor.g, startModif, endModif);
            var b = Interpolate(middleColor.b, endColor.b, startModif, endModif);
        }
        return "rgb(" + r + "," + g + "," + b + ")";
    }
    
    function Interpolate(start, end, startModif, endModif) {
        var final = start * startModif + end * endModif ;
        return Math.floor(final);
    }
    
};

