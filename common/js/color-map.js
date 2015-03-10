var mapColor = {};

mapColor.map; // the map to be colored
mapColor.legend; // the gradient of color which presents the lowest and highest values

// we shouldn't have to change the value given to this function
// but yet we can if we want to.
/**
 * set the map to be used
 * @param {String} map_id id of the map to be used
 */
mapColor.init = function( map_id, legend_id ){
    mapColor.map = Snap.select( map_id );
    mapColor.legend = Snap.select( legend_id );
};

/**
 * Color the map base on the given data set
 * The data set must have for keys the id of the element to color
 * and for values float numbers
 * @param   {map}    data set which has for keys the id of the element
 * @param   {String} color to apply to the elements
 */
mapColor.apply = function( data, color ){
    
    // we will search for the minimal and maximal values
    var minValue = Number.MAX_VALUE;
    var maxValue = Number.MIN_VALUE;

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
            fill: gradient( data[i], minValue, maxValue, color )  
        });
    }
    
    // we color the legend based on our values
    var minColor = gradient( minValue, minValue, maxValue, color );
    // var minColor = luminance( hue, -(value-min)*2 / (max-min) + 1);
    var maxColor = gradient( maxValue, minValue, maxValue, color );
    // var maxColor = luminance( hue, -(value-min)*2 / (max-min) + 1);
    
    mapColor.legend.attr({
        fill: "l(0,0,1,0)".concat(minColor.concat("-".concat(maxColor)))
    });
    
    /**
     * generate a shade of color based on the the current value,
     * an interval and a chosen color as a base hue
     * @param   {float}  value current value
     * @param   {float}  min   minorant
     * @param   {float}  max   majorant
     * @param   {String} hue   color code
     * @returns {String} new color code shaded based
     */
    function gradient (value, min, max, hue){
        return luminance( hue, (value-min)*2 / (max-min) -1 );
    }
    
    /**
     * generate a shade of color based on the the current value,
     * an interval and a chosen color as a base hue
     * @param   {float}  value current value
     * @param   {float}  min   minorant
     * @param   {float}  max   majorant
     * @param   {String} hue   color code
     * @returns {String} new color code shaded based
     */
    function inverseGradient (value, min, max, hue){
        return luminance( hue, -(value-min)*2 / (max-min) + 1);
    }
    
    /**
     * increase or decrease the luminance of the colorcode given
     * based on an a value between 0 and 1
     * @param   {String} hex color code in #CCCCCC or #CCC format
     * @param   {float}  lum luminance level: 0 for black, 1 for white
     * @returns {String} the new altered color code
     */
    function luminance (hex, lum) {
        // validate hex string
        hex = String(hex).replace(/[^0-9a-f]/gi, '');
        if (hex.length < 6) {
            hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
        }
        lum = lum || 0;
        // convert to decimal and change luminosity
        var rgb = "#", c, i;
        for (i = 0; i < 3; i++) {
            c = parseInt(hex.substr(i*2,2), 16);
            c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
            rgb += ("00"+c).substr(c.length);
        }
        return rgb;
    }
    
    // FUNCTION NOT USED
    /*function composite ( val1,min1,max1, val2,min2,max2, val3,min3,max3 ){
        var r = (val1-min1) * 255 / (max1-min1);
        var g = (val2-min2) * 255 / (max2-min2);
        var b = (val3-min3) * 255 / (max3-min3);

        function byte2Hex(n){
            var nybHexString = "0123456789ABCDEF";
            return String(nybHexString.substr((n >> 4) & 0x0F,1)) + nybHexString.substr(n & 0x0F,1);
        }

        return '#' + byte2Hex(r) + byte2Hex(g) + byte2Hex(b);
    }*/
    
};

