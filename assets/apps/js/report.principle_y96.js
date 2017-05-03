$(function () {
    var rpt = {};
    var reports = {};
    reports.ajax = {
        get_y96: function (year,prov,amp, cb) {
            var url = '/reports/get_principle_y96',
                params = {
                    year:year,
                    prov: prov,
                    amp: amp

                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }
    }

    reports.set_y96 = function (data) {
        $('#tbl_list > tbody').empty();
        var no= 1,sum_total=0;
        if (_.size(data.rows) > 0) {
            _.each(data.rows, function (v) {

                $('#tbl_list > tbody').append(
                    '<tr>' +
                        '<td>'+no+'</td>'+
                        '<td>' + v.code +' '+v.name +'</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.male) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.female) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.total) + '</td>' +
                        '</tr>'
                );
                no=no+1;
                sum_total=sum_total+ (v.total*1);
            });
            $('#tbl_list > tbody').append(
                '<tr>' +
                    '<td></td>'+
                    '<td></td>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td>' + app.add_commars_with_out_decimal(sum_total) + '</td>' +
                    '</tr>'
            );
        }
        else {
            $('#tbl_e1_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
        }
    };

    reports.get_y96 = function (year,prov,amp) {

        $('#tbl_list > tbody').empty();

        reports.ajax.get_y96(year,prov,amp, function (err, data) {
            if (err) {
                app.alert(err);
                $('#tbl_list > tbody').append('<tr><td colspan="4">ไม่พบรายการ</td></tr>');
            } else {
                rpt.chart.set_chart2(data);
                reports.set_y96(data);
            }
        });
    };

    $(document).on('click', 'a[data-name="btn_set_map"]', function(e) {
        e.preventDefault();

        var id = $(this).data('id');

        app.go_to_url('/maps/set_map/' + id);
    });
    $(document).on('click', 'button[data-name="btn_show"]', function (e) {
        e.preventDefault();
        var year2 = $('#year').val();
        var provcode = $('#provcode').val();
        reports.get_y96(year2,provcode,'');

    });


    reports.get_y96(year,'','');

// #### set_waiting list สสจ. สสอ.
    rpt.chart = {};
    rpt.chart.set_chart = function(data){
        var options = {
            chart: {
                renderTo: 'chart',
                type: 'pie',
                innerSize: '50%'
            },
            title: {
                text: 'จำนวนผู้ป่วย แยกรายโรคหลักที่ป่วยร่วมกับ Y96',
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
                    text: 'จำนวนผู้ป่วย ( ราย)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ' ราย'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'จำนวนผู้ป่วย',
                data: []
            }]
        };

        _.each(data.rows, function(v){
            options.series[0].data.push(Array(app.strip(v.name,20),parseFloat(v.total*1)));
        });
        new Highcharts.Chart(options);
    };


    rpt.chart.set_chart2 = function(data){

        var options = {
            chart: {
                renderTo: 'chart',
                type: 'pie',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        },
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                name: 'จำนวนผู้ป่วย',
                data: []
            }]
        };
        _.each(data.rows, function(v){
            options.series[0].data.push(Array(app.strip(v.name,20),parseFloat(v.total*1)));
        });
        new Highcharts.Chart(options);
    };

});

