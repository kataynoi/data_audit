$(document).ready(function(){
    $("#btn_login").removeAttr("disabled");
    //User namespace
    var dental = {};
    dental.ajax = {
        get_proced_dental: function (items, cb) {
            var url = '/dental/get_proced_dental',
                params = {
                    items: items
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }

    };


    dental.get_proced_dent = function(items){
        $('#tbl_procedure_list > tbody').empty();
        dental.ajax.get_proced_dental(items, function (err, data) {
            if (_.size(data.rows) > 0) {

                var no= 1,total_m10= 0,total_m11= 0,total_m12= 0,total_m01= 0,total=0;
                var total_m02= 0,total_m03= 0,total_m04= 0,total_m05= 0,total_m06= 0,total_m07= 0,total_m08= 0,total_m09= 0;
                _.each(data.rows, function (v) {

                    $('#tbl_procedure_list > tbody').append(
                        '<tr>' +
                        '<td>' + no + '</td>' +
                        '<td>' + v.id + '</td>' +
                        '<td>' + v.name + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.m10) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.m11) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.m12) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.m01) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.m02) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.m03) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.m04) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.m05) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.m06) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.m07) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.m08) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.m09) + '</td>' +

                        '<td>' + app.add_commars_with_out_decimal( v.total) + '</td>' +
                        '</tr>'
                    );

                    no=no+1;
                     total_m10=(total_m10+(v.m10*1));
                     total_m11=(total_m11+(v.m11*1));
                     total_m12=(total_m12+(v.m12*1));
                     total_m01=(total_m01+(v.m01*1));
                     total_m02=(total_m02+(v.m02*1));
                     total_m03=(total_m03+(v.m03*1));
                     total_m04=(total_m04+(v.m04*1));
                     total_m05=(total_m05+(v.m05*1));
                     total_m06=(total_m06+(v.m06*1));
                     total_m07=(total_m07+(v.m07*1));
                     total_m08=(total_m08+(v.m08*1));
                     total_m09=(total_m09+(v.m09*1));
                    total=total+(v.total*1);

                });
               $('#tbl_procedure_list > tbody').append('<tr>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td> รวม </td>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_m10)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_m11)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_m12)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_m01)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_m02)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_m03)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_m04)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_m05)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_m06)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_m07)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_m08)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total_m09)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(total)+'</th>' +
                    '</tr>');
            }
            else {
                $('#tbl_procedure_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
            }
        });

    }


    $(document).on('click', 'button[data-name="btn_show_procedure"]', function(e) {
        e.preventDefault();

        //alert('Show thaimed');
        var items={};
        items.amp = $('#distid').val();
        items.hospcode= $('#sl_office').val();
        items.year=$('#year').val();
        dental.get_proced_dent(items);

    });
    $('#year').on('change',function(){
        var year=(($(this).val()*1)+543);
        $('#year1').html((year-1));
        $('#year2').html(year);
    });
});