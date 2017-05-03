$(document).ready(function(){

var report = {};
report.ajax = {

    get_individual_list: function (items, cb) {
        var url = '/reports/get_individual',
            params = {
                items: items
            }

        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    }
};

    report.get_individual = function(items){
        $('#service_list >').empty();
        report.ajax.get_individual_list(items, function (err, data) {
            report.set_individual_list(data);

        });

    }

    report.set_individual_list=function(data){
        $('#tbl_list > tbody').empty();
        var no=1;
        if (_.size(data.rows) > 0) {
            _.each(data.rows, function (v) {

                $('#tbl_list > tbody').append(
                    '<tr>' +
                        '<td>' + no + '</td>' +
                        '<td>' + v.hn + '</td>' +
                        '<td>' + v.ptname + '</td>' +

                        '<td>' + v.date_serv + '</td>' +
                        '<td></td>' +
                        '<td>' + v.age + '</td>' +
                        '<td>' + v.sex+ '</td>' +
                        '<td>' + v.occ+ '</td>' +
                        '<td>' + v.disease+ '</td>' +
                        '<td>' + v.disease_env+ '</td>' +
                        '</tr>'
                );
                no=no+1;

            });
        }
        else {
            $('#tbl_person_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
        }

    }


$('#btn_show').on('click', function(e){

    e.preventDefault();
    var items={};
    items.hospcode= $('#sl_office').val();
    items.date_start=$('#date_start').val();
    items.date_end=$('#date_end').val();

    if(!items.hospcode){
        app.alert('กรุณาระบุหน่วยบริการ');
        $('#sl_office').focus();
    }else if(!items.date_start){
        app.alert('กรุณาระบุวันเริ่มต้น');
        $('#date_start').focus();
    }else if(!items.date_end){
        app.alert('กรุณาระบุวันสิ้นสุด');
        $('#date_end').focus()
    }else{
        report.get_individual(items);
    }


});

});