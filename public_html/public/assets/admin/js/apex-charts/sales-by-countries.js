(function($) {
    "use strict";
    jQuery(document).on('ready', function() {

        var options = {
            chart: {
                width: '100%',
                height: 391,
                type: 'pie',
            },
            labels: ['UK', 'USA', 'Canada', 'Australia', 'Italy'],
            colors: ['#f42ec9', '#c37cc6', '#FE78AA', '#F56CB0', '#8c2a8d'],
            series: [500, 800, 500, 300, 250],
            responsive: [{
                breakpoint: 300,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
            legend: {
                horizontalAlign: 'right',
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#sales-by-countries"),
            options
        );

        chart.render();

    });
}(jQuery))