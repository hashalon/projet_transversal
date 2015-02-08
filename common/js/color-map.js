var mapColor = {};

mapColor.gradient = function (value, min, max, hue){
    return mapColor.luminance( hue, (value-min)*2 / (max-min) -1 );
};

mapColor.inverseGradient = function (value, min, max, hue){
    return mapColor.luminance( hue, -(value-min)*2 / (max-min) + 1);
};

mapColor.composite = function ( val1,min1,max1, val2,min2,max2, val3,min3,max3 ){
    var r = (val1-min1) * 255 / (max1-min1);
    var g = (val2-min2) * 255 / (max2-min2);
    var b = (val3-min3) * 255 / (max3-min3);
    
    function byte2Hex(n){
        var nybHexString = "0123456789ABCDEF";
        return String(nybHexString.substr((n >> 4) & 0x0F,1)) + nybHexString.substr(n & 0x0F,1);
    }
    
    return '#' + byte2Hex(r) + byte2Hex(g) + byte2Hex(b);
};

mapColor.luminance = function (hex, lum) {
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
};