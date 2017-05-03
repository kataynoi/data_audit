$(function(){

    var rpt = {};

    rpt.ajax = {

        get_disease: function(year, cb){
            var url = '/pages/get_disease',
                params = {
                    year: year
                };

            app.ajax(url, params, function(err, data){
                err ? cb(err) : cb(null, data);
            });
        },get_top10: function(year,code, cb){
            var url = '/pages/get_top10',
                params = {
                    year: year,
                    code:code
                };

            app.ajax(url, params, function(err, data){
                err ? cb(err) : cb(null, data);
            });
        }
    }


    rpt.get_disease = function(year)
    {
        rpt.ajax.get_disease(year,function(err, data){


            if(err)
            {
                app.alert(err);
                $('#tbl_mrpt_total_status > tbody').append('<tr><td colspan="2">ไม่พบรายการ</td></tr>');
            }
            else
            {
                rpt.chart.get_disease(data);
            }
        });
    };

    rpt.get_top10 = function(year,code)
    {
        rpt.ajax.get_top10(year,code,function(err, data){


            if(err)
            {
                app.alert(err);
                $('#tbl_mrpt_total_status > tbody').append('<tr><td colspan="2">ไม่พบรายการ</td></tr>');
            }
            else
            {
                if(code=='y96'){
                    rpt.chart.set_top10_y96(data);
                }else if(code=='y97'){
                    rpt.chart.set_top10_y97(data);
                }

            }
        });
    };

    rpt.chart = {};

    rpt.chart.get_disease = function(data){
        var options = {
            chart: {
                renderTo: 'disease_year',
                type: 'spline'
            },
            title: {
                text: 'จำนวนผู้ป่วย โรคจากการประกอบอาชีพ ปี '+$('#txt_year option:selected').text(),
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
                name: 'มหาสารคาม',
                data: []
            }, {
                name: 'ขอนแก่น',
                data: []
            }, {
                name: 'กาฬสนธุ์',
                data: []
            }, {
                name: 'ร้อยเอ็ด',
                data: []
            }]



        };

        _.each(data.rows, function(v){
            options.xAxis.categories.push(v.fullname);
            options.series[0].data.push(parseFloat(v.total_44*1));
            options.series[1].data.push(parseFloat(v.total_40*1));
            options.series[2].data.push(parseFloat(v.total_46*1));
            options.series[3].data.push(parseFloat(v.total_45*1));

        });

        //console.log(options.series);
        new Highcharts.Chart(options);
    };

    rpt.chart.set_top10_y96 = function(data){
        var options = {
            chart: {
                renderTo: 'top10_y96',
                type: 'pie'
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

    rpt.chart.set_top10_y97 = function(data){
        var options = {
            chart: {
                renderTo: 'top10_y97',
                type: 'pie'
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

    $('#btn_show_chart').on('click', function(){
        var data = {};
        data.year = $('#txt_year').val();
        data.code506 = $('#sl_code506').val();

        if(!data.year)
        {
            app.alert('กรุณาระบุปี');
        }
        else
        {
            rpt.get_disease(data.year,data.code506);
        }
    });

    $("#sl_code506").removeAttr('selected').find(':first').attr('selected','selected');
    $("#txt_year").removeAttr('selected').find(':last').attr('selected','selected');

    rpt.get_disease(year);
    rpt.get_top10(year,'y96');
    rpt.get_top10(year,'y97');
});