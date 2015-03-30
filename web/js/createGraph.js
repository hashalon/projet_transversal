function createGraph(type, idDiv, titre, sousTitre, labelX, labelY, categories, data){
    if(type == 'pie'){
        $(idDiv).highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: titre
            },
            subtitle: {
                text: sousTitre
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y} ',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: labelX,
                data: data
            }]
        });

    }else if(type == 'column'){


        $(idDiv).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: titre
            },
            subtitle: {
                text: sousTitre
            },
            xAxis: {
                 title: {
                    text: labelX
                },
                categories: categories,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: labelY
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: data
        });

    }
}