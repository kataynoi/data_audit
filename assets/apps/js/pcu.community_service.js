$(document).ready(function(){
    var pcu = {};
    pcu.ajax = {
        get_community_service: function (items, cb) {
            var url = '/pcu/get_community_service',
                params = {
                    items: items
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }

    };



    pcu.get_community_service = function(items){
        $('#tbl_list > tbody').empty();
        pcu.ajax.get_community_service(items, function (err, data) {
            if($('#sl_office').val()){
                pcu.set_pcu_hospcode(data);
            }else{
                pcu.set_community_service(data);
            }

        });

    }

pcu.set_community_service=function(data){
    $('#tbl_list > tbody').empty();
        if (_.size(data.rows) > 0) {

            var no= 1,total_HT= 0,total= 0,total_DM= 0,total_TB=0,total_PSY= 0,total_ETC=0,total_ANC=0;
            _.each(data.rows, function (v) {

                $('#tbl_list > tbody').append(
                    '<tr>' +
                        '<td>' + no + '</td>' +
                        '<td>' + v.id + '</td>' +
                        '<td>' + v.name + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.HT) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.DM) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.TB) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.PSY) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.ANC) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.ETC) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.total) + '</td>' +
                        '</tr>'
                );

                no=no+1;
                total_HT=(total_HT+(v.HT*1));
                total_DM=(total_DM+(v.DM*1));
                total_TB=(total_TB+(v.TB*1));
                total_PSY=(total_PSY+(v.PSY*1));
                total_ANC=(total_ANC+(v.ANC*1));
                total_ETC=(total_ETC+(v.ETC*1));
                total=total+(v.total*1);

            });
            $('#tbl_list > tbody').append('<tr>' +
                '<td></td>' +
                '<td></td>' +
                '<td> รวม </td>' +
                '<th>'+ app.add_commars_with_out_decimal(total_HT)+'</th>' +
                '<th>'+ app.add_commars_with_out_decimal(total_DM)+'</th>' +
                '<th>'+ app.add_commars_with_out_decimal(total_TB)+'</th>' +
                '<th>'+ app.add_commars_with_out_decimal(total_PSY)+'</th>' +
                '<th>'+ app.add_commars_with_out_decimal(total_ANC)+'</th>' +
                '<th>'+ app.add_commars_with_out_decimal(total_ETC)+'</th>' +
                //'<th>'+ app.add_commars_with_out_decimal(total_HT+total_DM+total_ANC+total_PSY+total_TB)+'</th>' +
                '<th>'+ app.add_commars_with_out_decimal(total)+'</th>' +
                '</tr>');
        }
        else {
            $('#tbl_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
        }

}
pcu.set_pcu_hospcode=function(data){
    $('#tbl_list > tbody').empty();
        if (_.size(data.rows) > 0) {

            var no= 1,total_time= 0,total= 0,total_in= 0,total_out=0;
            _.each(data.rows, function (v) {

                $('#tbl_list > tbody').append(
                    '<tr>' +
                        '<td>' + no + '</td>' +
                        '<td>' + v.id + '</td>' +
                        '<td><a target="_blank"  href="'+site_url+'/mom_child/mom/'+ v.id+'/'+ v.gravida+'"  data-id="'+ v.id+'">' + v.name + '</a></td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.total) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.time) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.in_hospital) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.out_hospital) + '</td>' +
                        '</tr>'
                );

                no=no+1;
                total_time=(total_time+(v.time*1));
                total_in=(total_in+(v.in_hospital*1));
                total_out=(total_out+(v.out_hospital*1));
                total=total+(v.total*1);

            });
            $('#tbl_list > tbody').append('<tr>' +
                '<td></td>' +
                '<td></td>' +
                '<td> รวม </td>' +
                '<th>'+ app.add_commars_with_out_decimal(total)+'</th>' +
                '<th>'+ app.add_commars_with_out_decimal(total_time)+'</th>' +
                '<th>'+ app.add_commars_with_out_decimal(total_in)+'</th>' +
                '<th>'+ app.add_commars_with_out_decimal(total_out)+'</th>' +
                '</tr>');
        }
        else {
            $('#tbl_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
        }

}

    $(document).on('click', 'button[data-name="btn_show"]', function(e) {
        e.preventDefault();

        //alert('Show pcu');
        var items={};
        items.amp = $('#distid').val();
        items.hospcode= $('#sl_office').val();
        //items.year=$('#year').val();
        items.date_start=$('#date_start').val();
        items.date_end=$('#date_end').val();

        if(!items.date_start){
            app.alert('กรุณาระบุวันเริ่มต้น');
            $('#date_start').focus();
        }else if(!items.date_end){
            app.alert('กรุณาระบุวันสิ้นสุด');
            $('#date_end').focus()
        }/*else if(items.hospcode && items.hospcode !=off_id){
            app.alert('ท่านไม่สามารถเข้าดูข้อมูลของหน่วยบริการอื่นได้');

        }*/else{
            pcu.get_community_service(items);
        }


    });
    $('#year').on('change',function(){
        var year=(($(this).val()*1)+543);
        $('#year1').html((year-1));
        $('#year2').html(year);
    });
    $(document).on('click', 'a[data-name="show_pcu"]', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        pcu.get_mom_info();
        pcu.modal.show_mom_info();

    })
});