$(function () {
    var rpt = {};

    var reports = {};
    reports.ajax = {
        get_y96_age: function (year,prov,amp, cb) {
            var url = '/reports/get_y96_age',
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

    reports.set_y96_age = function (data) {
        $('#tbl_list > tbody').empty();
        $('#tbl_list > tfoot').empty();
        var no= 1,sum_total=0,sum_male=0,sum_female=0;
        if (_.size(data.rows) > 0) {
            _.each(data.rows, function (v) {

                $('#tbl_list > tbody').append(
                    '<tr>' +
                        '<td>'+no+'</td>'+
                        '<td>' +v.name +'</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.male) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.female) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.total) + '</td>' +
                        '</tr>'
                );
                no=no+1;
                sum_total=sum_total+ (v.total*1);
                sum_male=sum_male+ (v.male*1);
                sum_female=sum_female+ (v.female*1);
            });
            $('#tbl_list > tfoot').append(
                '<tr>' +
                    '<td></td>'+
                    '<td></td>' +
                    '<td>' + app.add_commars_with_out_decimal(sum_male) + '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(sum_female) + '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(sum_total) + '</td>' +
                    '</tr>'
            );
        }
        else {
            $('#tbl_e1_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
        }
    };

    reports.get_y96_age = function (year,prov,amp) {

        $('#tbl_list > tbody').empty();

        reports.ajax.get_y96_age(year,prov,amp, function (err, data) {
            if (err) {
                app.alert(err);
                $('#tbl_list > tbody').append('<tr><td colspan="4">ไม่พบรายการ</td></tr>');
            } else {
                rpt.chart.set_chart2(data);
                reports.set_y96_age(data);
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
        var ampcode= $('#ampcode').val();
        reports.get_y96_age(year2,provcode,ampcode);

    });


    reports.get_y96_age(year,'','');

// #### set_waiting list สสจ. สสอ.
    rpt.chart = {};



    rpt.chart.set_chart2 = function(data){

        var options = {
            chart: {
                renderTo: 'chart',
                type: 'column',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [],
                crosshair: true
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} ราย</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
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
            series: []
        };
        options.series[0] = new Object();
        options.series[0].data=[];
        options.series[1] = new Object();
        options.series[1].data=[];
        _.each(data.rows, function(v){
            options.xAxis.categories.push(v.name);
            options.series[0].name = 'ชาย';
            options.series[0].data.push(parseFloat(v.male*1)) ;
            options.series[1].name = 'หญิง';
            options.series[1].data.push(parseFloat(v.female*1)) ;

        });
        new Highcharts.Chart(options);
    };






});

