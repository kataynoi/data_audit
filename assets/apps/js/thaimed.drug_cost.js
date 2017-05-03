$(document).ready(function(){
    $("#btn_login").removeAttr("disabled");
    //User namespace
    var thaimed = {};
    thaimed.ajax = {
        get_drug_cost: function (items, cb) {
            var url = '/thaimed/get_drug_cost',
                params = {
                    items: items
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }

    };

    thaimed.modal = {
        show_message: function () {
            $('#mdl_message').modal({
                keyboard: false,
                backdrop: 'static'
            })
        },
        hide_message: function() {
            $('#mdl_message').modal('hide');
        }
    };

    thaimed.get_drug_cost = function(items){
        $('#tbl_list > tbody').empty();
        thaimed.ajax.get_drug_cost(items, function (err, data) {
            if (_.size(data.rows) > 0) {

                var no= 1,total_thai=0,total_inter= 0,total= 0;
                _.each(data.rows, function (v) {

                    $('#tbl_list > tbody').append(
                        '<tr>' +
                        '<td>' + no + '</td>' +
                        '<td>' + v.id + '</td>' +
                        '<td>' + v.name + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.cost_thai) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.cost_inter) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal( v.total) + '</td>' +
                        '</tr>'
                    );

                    no=no+1;
                     total_thai=(total_m10+(v.cost_thai*1));
                     total_inter=(total_m11+(v.cost_inter*1));
                    total=total+(v.total*1);

                });
               $('#tbl_list > tbody').append('<tr>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td> รวม </td>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_thai)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_inter)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total)+'</th>' +
                    '</tr>');
            }
            else {
                $('#tbl_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
            }
        });

    }


    $(document).on('click', 'button[data-name="btn_show_drug_cost"]', function(e) {
        e.preventDefault();

        //alert('Show thaimed');
        var items={};
        items.amp = $('#distid').val();
        items.hospcode= $('#sl_office').val();
        items.year=$('#year').val();
        items.date_start=$('#date_start').val();
        items.date_end=$('#date_end').val();
        if(!items.date_start){
            app.alert('กรุณาระบุวันเริ่มต้น');
            $('#date_start').focus();
        }else if(!items.date_end){
            app.alert('กรุณาระบุวันสิ้นสุด');
            $('#date_end').focus();
        }else{
            thaimed.get_drug_cost(items);
        }



    });
    $('#year').on('change',function(){
        var year=(($(this).val()*1)+543);
        $('#year1').html((year-1));
        $('#year2').html(year);
    });
});