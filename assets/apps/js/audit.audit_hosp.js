$(document).ready(function(){
    //User namespace
    var audit = {};
    audit.ajax = {
        get_audit_hosp: function (hospcode, cb) {
            var url = '/audit/get_audit_hosp',
                params = {
                    hospcode: hospcode
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        },
        get_audit_info: function (id, cb) {
            var url = '/audit/get_audit_info',
                params = {
                    id: id
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        },
        save_audit: function (items, cb) {
            var url = '/audit/save_audit',
                params = {
                    items: items
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }

    };

    audit.modal = {
        show_audit_info: function (id) {
            $('#mdl_audit_info').modal({
                keyboard: false,
                backdrop: 'static'
            });
            audit.get_audit_info(id);
        },
        hide_audit: function() {
            $('#mdl_audit_info').modal('hide');
        }
    };
audit.get_audit_info = function(id){
        //$('#tbl_list > tbody').empty();
        app.clear_form();
        audit.ajax.get_audit_info(id, function (err, data) {
            audit.set_audit_info(data);
        });

    }

    audit.set_audit_info=function(data){
        console.log(JSON.stringify(data));

            $('#date_serve').html(data.rows.date_serve);
            $('#pt_name').html(data.rows.name+'  '+data.rows.lname);
            $('#cid').html(data.rows.cid);
            $('#hn').html(data.rows.hn);
            $('#cc').html(data.rows.cc);
            $('#seq').val(data.rows.seq);
            $('#hospcode').val(data.rows.hospcode);
            $('#data_audit_id').val(data.rows.id);




    }
audit.get_audit_hosp = function(hospcode){
        $('#tbl_list > tbody').empty();
        audit.ajax.get_audit_hosp(hospcode, function (err, data) {
                audit.set_audit_hosp(data);
        });

    }



audit.set_audit_hosp=function(data){

        if (_.size(data.rows) > 0) {

            var no= 1,total_time= 0,total= 0,total_in= 0,total_out=0;
            _.each(data.rows, function (v) {

                $('#tbl_list > tbody').append(
                    '<tr>' +
                        '<td>' + no + '</td>' +
                        '<td>' + app.mysql_to_thai_date(v.date_serve) +'</td>' +
                        '<td>' + v.name+'  ' + v.lname + '</td>' +
                        '<td>' + v.hn + '</td>' +
                        '<td>' + v.cid + '</td>' +
                        '<td>' + v.cc + '</td>' +
                        '<td>' + v.diagcode +':'+ v.diag_name+ '</td>' +
                        '<td><label  data-name="modal_audit" class="btn btn-primary btn-circle" data-id="'+ v.id+'"><i class="fa fa-list"></i></label></td>' +


                        '</tr>'
                );
                no=no+1;

            });
        }
        else {
            $('#tbl_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
        }

}
    audit.cal_score = function(){
        var score= 0,s_datetime = 0,s_cc= 0,s_history= 0,s_phy_ex= 0,s_diag_text= 0,s_treatment= 0,max_score=17;
        s_datetime=parseInt($('#sl_datetime').val());
        s_cc=parseInt($('#sl_cc').val());
        s_history=parseInt($('#sl_history').val());
        s_phy_ex=parseInt($('#sl_phy_ex').val());
        if($('#sl_diag_text').val()=='9'){s_diag_text=0}else{s_diag_text= parseInt($('#sl_diag_text').val());}
        if($('#sl_treatment').val()=='9'){s_treatment=0}else{s_treatment= parseInt($('#sl_treatment').val());}
        if($('#sl_treatment').val()=='9' && $('#sl_diag_text').val()=='9')
        {max_score=10}
        else if($('#sl_treatment').val()=='9' && $('#sl_diag_text').val()!='9'){
            max_score=14
        }else if($('#sl_treatment').val()!='9' && $('#sl_diag_text').val()=='9'){
            max_score=13
        }else{
            max_score=17;
        }
        score=s_datetime+s_cc+s_history+s_phy_ex+s_diag_text+s_treatment;
        $('#score').val(score);
        $('#max_score').val(max_score);
        $('#percent').val(score*100/max_score);
        $('#fullscore').html(score+'/'+max_score+' ร้อยละ '+app.add_commars(score*100/max_score));
        //app.alert(s_datetime);
    }
    $('#sl_datetime').bind('change', function() {
        audit.cal_score();
    });    $('#sl_cc').bind('change', function() {
        audit.cal_score();
    });    $('#sl_history').bind('change', function() {
        audit.cal_score();
    });    $('#sl_phy_ex').bind('change', function() {
        audit.cal_score();
    });    $('#sl_diag_text').bind('change', function() {
        audit.cal_score();
    });    $('#sl_treatment').bind('change', function() {
        audit.cal_score();
    });    $('#sl_datetime').bind('change', function() {
        audit.cal_score();
    });

    $(document).on('click', 'label[data-name="modal_audit"]', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        audit.modal.show_audit_info(id);

    });

    audit.save_audit = function(items){

        audit.ajax.save_audit(items, function (err, data) {
            if (err) {
                app.alert(err);
            }
            else {
                alert('บันทึกข้อมูลเรียบร้อย');
                audit.modal.hide_audit();
                app.clear_form();
                audit.get_audit_hosp(hospcode);
            }
        });
    }

    $('#btn_audit_save').on('click',function(){

        var items={};
        items.data_audit_id=$('#data_audit_id').val();
        items.hospcode = $('#hospcode').val();
        items.seq=$('#seq').val();
        items.max_score=$('#max_score').val();
        items.score=$('#score').val();
        items.percent=$('#percent').val();
        items.cc=$('#sl_cc').val();
        items.datetime=$('#sl_datetime').val();
        items.history=$('#sl_history').val();
        items.phy_ex=$('#sl_phy_ex').val();
        items.diag_text=$('#sl_diag_text').val();
        items.treatment=$('#sl_treatment').val();
        items.note=$('#note').val();

        if (!items.score) {
            app.alert('บันทึกข้อมูล Audit ก่อนนะครับ ยังไม่มีคะแนนเลย');
            $('#score').focus();
        }
        else{
            audit.save_audit(items);
        }
    });
    audit.get_audit_hosp(hospcode);
    //app.alert(hospcode);
});