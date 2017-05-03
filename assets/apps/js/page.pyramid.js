$(function () {
    var chart,
        categories = ['0-4', '5-9', '10-14', '15-19',
            '20-24', '25-29', '30-34', '35-39', '40-44',
            '45-49', '50-54', '55-59', '60-64', '65-69',
            '70-74', '75+'];
    $(document).ready(function() {
        $('#pyramid').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'ปิรามิดประชากร จังหวัด '+provname+' ปีงบประมาณ'+nowyear
            },
            subtitle: {
                text: 'Source: ข้อมูลประกันสุขภาพ'
            },
            xAxis: [{
                categories: categories,
                reversed: false
            }, { // mirror axis on right side
                opposite: true,
                reversed: false,
                categories: categories,
                linkedTo: 0
            }],
            yAxis: {
                title: {
                    text: null
                },
                labels: {
                    formatter: function(){
                        return (Math.abs(this.value) / 10000) + ' หมื่น';
                    }
                },
                min: -60000,
                max: 60000
            },

            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },

            tooltip: {
                formatter: function(){
                    return '<b>'+ this.series.name +', age '+ this.point.category +'</b><br/>'+
                        'Population: '+ Highcharts.numberFormat(Math.abs(this.point.y), 0);
                }
            },

            series: [{
                name: 'ชาย',
                data: [-13243,-26671,-30290,-36916,-36429,-34216,-39460,-44237,-46581,-41499,-33042,-26726,-22772,-17441,-11187,-14192]
            }, {
                name: 'หญิง',
                data: [12555,25487,28511,35148,35344,34704,38947,42968,46941,41719,34156,28421,25104,19682,13508,20335]
            }]
        });
    });

});
