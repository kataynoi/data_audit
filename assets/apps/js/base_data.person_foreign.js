$(document).ready(function(){
    $("#btn_login").removeAttr("disabled");
    //User namespace
    var person = {};
    person.ajax = {
        get_person_foreign_by_amp: function (items, cb) {
            var url = '/base_data/get_person_foreign_by_amp',
                params = {
                    items: items
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }

    };

    person.modal = {
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
    person.set_read_message=function($message_id){
        person.ajax.set_read_message($message_id, function (err, data) {
            if (err) {
                $('#tbl_message_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
            } else {
                // alert(data.rows);
                $('#new_msg').html(data.rows);

            }
        });
    }

    person.del_message=function($message_id){
        person.ajax.del_message($message_id, function (err, data) {
            if (err) {
                return false;
            } else {
                return true;
            }
        });
    }
    person.get_person_foreign_by_amp = function(items){
        $('#tbl_person_amp_list > tbody').empty();
        if($('#sl_office').val()){
            $( "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='glyphicon glyphicon-th-list'></i> ข้อมูลระดับหมู่บ้าน อาจจะไม่ตรงกับภาพรวมของ หน่วยบริการ ขึ้นอยู่กับ จำนวนหลังคาเรือนในแฟ้ม Home</div>" ).insertAfter( "#barform" );
        }
        person.ajax.get_person_foreign_by_amp(items, function (err, data) {
            if (_.size(data.rows) > 0) {

                var no= 1,type1_m_total=0,type1_f_total=0,type2_m_total=0,type2_f_total=0,type3_m_total=0,type3_f_total=0,type4_m_total=0,type4_f_total=0;
               var type13_m_total= 0,type13_f_total= 0,all_m_total= 0,all_f_total= 0;
                _.each(data.rows, function (v) {

                    $('#tbl_person_amp_list > tbody').append(
                        '<tr>' +
                        '<td>' + no + '</td>' +
                        '<td>' + v.id + '</td>' +
                        '<td>' + v.name + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.type1_m) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.type1_f) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal( v.type2_m) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.type2_f) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.type3_m )+ '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.type3_f )+ '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.type4_m )+ '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.type4_f) + '</td>' +
                        '<td ><span class="label label-info">' + app.add_commars_with_out_decimal((v.type1_m*1)+(v.type3_m*1)) + '</span></td>' +
                        '<td ><span class="label label-info">' + app.add_commars_with_out_decimal((v.type1_f *1)+(v.type3_f *1))+ '</span></td>' +
                        '<td ><span class="label label-warning">' + app.add_commars_with_out_decimal((v.type1_m*1)+(v.type3_m*1)+(v.type1_f *1)+(v.type3_f *1))+ '</span></td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.total_m) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal( v.total_f) + '</td>' +
                        '</tr>'
                    );

                    no=no+1;
                    type1_m_total=type1_m_total+(v.type1_m*1);
                    type1_f_total=type1_f_total+(v.type1_f*1);
                    type2_m_total=type2_m_total+(v.type2_m*1);
                    type2_f_total=type2_f_total+(v.type2_f*1);
                    type3_m_total=type3_m_total+(v.type3_m*1);
                    type3_f_total=type3_f_total+(v.type3_f*1);
                    type4_m_total=type4_m_total+(v.type4_m*1);
                    type4_f_total=type4_f_total+(v.type4_f*1);
                    all_m_total=all_m_total+(v.total_m*1);
                    all_f_total=all_f_total+(v.total_f*1);

                });
                $('#tbl_person_amp_list > tbody').append('<tr>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td> รวม </td>' +
                    '<th>'+ app.add_commars_with_out_decimal(type1_m_total)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(type1_f_total)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(type2_m_total)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(type2_f_total)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(type3_m_total)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(type3_f_total)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(type4_m_total)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(type4_f_total)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(type1_m_total+type3_m_total)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(type1_f_total+type3_f_total)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(type1_m_total+type3_m_total+type1_f_total+type3_f_total)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(all_m_total)+'</th>' +
                    '<th>'+ app.add_commars_with_out_decimal(all_f_total)+'</th>' +


                    '</tr>');
            }
            else {
                $('#tbl_message_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
            }
        });

    }


    $(document).on('click', 'button[data-name="btn_show_person"]', function(e) {
        e.preventDefault();

        //alert('Show Person');
        var items={};
        items.amp = $('#distid').val();
        items.hospcode= $('#sl_office').val();
        items.age_start=$('#age_start').val();
        items.age_end=$('#age_end').val();
        items.birth_start=$('#birth_start').val();
        items.birth_end=$('#birth_end').val();
        person.get_person_foreign_by_amp(items);

    });
    $('#search_by').on('change',function(){
        var id =$('#search_by').val();
        //app.alert(id);
        if(id==2){
           $('#age').hide();
           $("#age option").removeAttr('selected').find(':first').attr('selected','selected');
           $('#birth').show();
           $('#birth_start').val('');$('#birth_end').val('');

        }else{
            $('#age').show();
            $("#age option").removeAttr('selected').find(':first').attr('selected','selected');
            $('#birth').hide();
            $('#birth_start').val('');$('#birth_end').val('');
        }
    });
    $('#birth').hide();
});