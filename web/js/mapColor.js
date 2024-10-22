// var tinycolor = require("./tinycolor");
// TODO and medium color grad
var mapColor = {};

mapColor.map; // the map to be colored
mapColor.detail;
mapColor.legend = {}; 
mapColor.legend.gradient;// the gradient of color which presents the lowest and highest values
mapColor.legend.minValue;// the minimum value to be displayed
mapColor.legend.maxValue;// the maximum value to be displayed
mapColor.legend.label;// the name of the element hovered
mapColor.data = {};
mapColor.x = 386;
mapColor.y = 295;
mapColor.RootURL = "/";

// we shouldn't have to change the value given to this function
// but yet we can if we want to.
/**
 * set the map to be used
 * @param {String} map_id id of the map to be used
 */
mapColor.init = function( map_id, detail ){
    
    mapColor.map = Snap.select( map_id );
    if( map_id != "#France" ){
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
    mapColor.detail = detail;
    
    mapColor.legend.gradient = Snap.select( "#Legend_gradient" );
    mapColor.legend.minValue = Snap.select( "#Legend_minValue" );
    mapColor.legend.maxValue = Snap.select( "#Legend_maxValue" );
    mapColor.legend.label = Snap.select( "#Legend_label" );
    
    // on ajoute des evenements sur les éléments pour changer de page
    var paths = mapColor.map.selectAll("path");
    for( var i=0; i<paths.length; ++i ){
        
        paths[i].click(function(){
            var detail = "regions";
            switch( mapColor.detail ){
                case "regions":
                    detail = "departements";
                    break;
                case "departements":
                    detail = "arrondissements";
                    break;
                case "arrondissements":
                    detail = "communes";
                    break;
            }
            // on click we chage of page view
            window.location = mapColor.RootURL+"?r=map&map="+encodeURIComponent(this.attr("id"))+"&detail="+detail;
        });
        
        paths[i].hover(
            function(){
                var currentValue = mapColor.data[this.attr("id")];
                this.attr({
                    stroke: "#fff",
                    strokeWidth: 0.3
                });
                if( currentValue != null ){
                    mapColor.legend.label.attr({
                        text: this.attr("id")+" : "+currentValue
                    });
                }else{
                    mapColor.legend.label.attr({
                        text: this.attr("id")
                    });
                }
            },
            function(){
                this.attr({
                    strokeWidth: 0
                });
                mapColor.legend.label.attr({
                    text: '???'
                });
            }
        );
        
    }
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
    mapColor.data = data;
    
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
    mapColor.legend.minValue.attr({ text: minValue });
    mapColor.legend.maxValue.attr({ text: maxValue });
    
    // we loop all the elements of the map to color them
    for( var i in data){
        var e;
        if( e = mapColor.map.select( "#"+i ) ){
            e.attr({
                fill: gradient( data[i], minValue, maxValue ) 
            });
        }
    }
    
    mapColor.legend.gradient.attr({
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

