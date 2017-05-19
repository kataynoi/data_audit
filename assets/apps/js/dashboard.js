$(function() {

    var rpt = {};

    rpt.ajax = {

        get_audit_success: function (cb) {
            var url = '/pages/get_success_by_amp',
                params = {
                    note: '1/2560'
                };

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }
    }


    rpt.get_audit_success = function () {
        rpt.ajax.get_audit_success(function (err, data) {

            if (err) {
                app.alert(err);
                $('#chart').html('ไม่พบรายการ');
            }
            else {
                rpt.chart.set_audit_success(data);
            }
        });
    };

    rpt.chart = {};

    rpt.chart.set_audit_success = function (data) {
        var options = {
            chart: {
                renderTo: 'chart1',
                type: 'column'
            },
            title: {
                text: '',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                title: {
                    text: 'ร้อละ Audit'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            plotOptions: {
            column: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },

            tooltip: {
                valueSuffix: ' %'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'ร้อยละ',
                data: []
            }]


        };

        _.each(data.rows, function (v) {
            options.series[0].data.push(Array(app.strip(v.ampurname, 20), parseFloat(v.success * 1)));
        });
        new Highcharts.Chart(options);
    };


    rpt.get_audit_success();

});