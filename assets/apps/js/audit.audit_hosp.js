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
        },
        edit_audit: function (items, cb) {
            var url = '/audit/edit_audit',
                params = {
                    items: items
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }
        ,
        get_audit_icd: function (hospcode,seq, cb) {
            var url = '/audit/get_audit_icd',
                params = {
                    hospcode: hospcode,
                    seq : seq
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        },
        save_audit_icd: function (items, cb) {
            var url = '/audit/save_audit_icd',
                params = {
                    items: items
                }

            app.ajax(url, params, function (err, data) {
                //console.log(JSON.stringify(data));

                err ? cb(err) : cb(null, data);
            });
        },
        edit_audit_icd: function (items, cb) {
            var url = '/audit/edit_audit_icd',
                params = {
                    items: items
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }

    };

    audit.modal = {
        show_audit_info: function (id,action) {
            $('#mdl_audit_info').modal({
                keyboard: false,
                backdrop: 'static'
            });
            audit.get_audit_info(id,action);
        },
        hide_audit: function() {
            $('#mdl_audit_info').modal('hide');
        },show_audit_icd: function (id,seq,hospcode,action) {
            console.log('Modal');
            $('#mdl_audit_icd').modal({
                keyboard: false,
                backdrop: 'static'
            });
            audit.get_audit_info(id,action);
            audit.get_audit_icd(hospcode,seq,action);
        },hide_audit_icd: function() {
            $('#mdl_audit_icd').modal('hide');
        }
    };

audit.get_audit_info = function(id,action){
        //$('#tbl_list > tbody').empty();
        app.clear_form();
        audit.ajax.get_audit_info(id, function (err, data) {
            audit.set_audit_info(data);
            if(action =='edit'){
                //app.alert('Edit'+data.rows.id)
                $("#action").val(action);
                $("#sl_datetime").val(data.rows.datetime).change();
                $("#sl_cc").val(data.rows.a_cc).change();
                $("#sl_phy_ex").val(data.rows.phy_ex).change();
                $("#sl_diag_text").val(data.rows.diag_text).change();
                $("#sl_treatment").val(data.rows.treatment).change();
                $("#sl_history").val(data.rows.history).change();
            }else
            {   $("#action").val('insert');
                $("#sl_datetime").val(0).change();
                $("#sl_cc").val(0).change();
                $("#sl_phy_ex").val(0).change();
                $("#sl_diag_text").val(0).change();
                $("#sl_treatment").val(0).change();
                $("#sl_history").val(0).change();

            }
        });


    }
    audit.get_audit_icd = function(hospcode,seq,action){
        //$('#tbl_list > tbody').empty();
        app.clear_form();
        audit.ajax.get_audit_icd(hospcode,seq, function (err, data) {
            if(!err){
                audit.set_audit_icd(data);
            }

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

            $('#date_serve_icd').html(data.rows.date_serve);
            $('#pt_name_icd').html(data.rows.name+'  '+data.rows.lname);
            $('#cid_icd').html(data.rows.cid);
            $('#hn_icd').html(data.rows.hn);
            $('#cc_icd').html(data.rows.cc);
            $('#seq_icd').val(data.rows.seq);
            $('#hospcode_icd').val(data.rows.hospcode);
            $('#data_audit_id_icd').val(data.rows.id);




    }
    audit.set_audit_icd = function(data){
        $('#tbl_icd_list > tbody').empty();
        var no = 1,option=null;
        var option1 = '<option value=""> ยังไม่ได้ตรวจสอบ </option>' +
            '<option value="Y"> สัญลักษณ์Y : ให้รหัสถูกต้อง</option>' +
            '<option value="A"> สัญลักษณ์A : ให้รหัสโรคผิดพลาด</option>' +
            '<option value="B"> สัญลักษณ์B : มีรหัสโรคทั้งๆที่ไม่มีคําวินิจฉัยโรคในบันทึก</option>' +
            '<option value="C"> สัญลักษณ์C : รหัสเป็นรหัสด้อยคุณภาพ โดยมีสาเหตุมาจากคําวินิจฉัยโรคที่ด้อยคุณภาพ</option>' +
            '<option value="D"> สัญลักษณ์D : รหัสมีตัวเลขไม่ครบทุกตําแหน่ง</option>' +
            '<option value="E"> สัญลักษณ์E : ใช้สาเหตุภายนอก (V,W,X,Y) เป็นรหัสโรคหลัก</option>' +
            '<option value="F"> สัญลักษณ์F : รหัสมีตัวเลขมากเกินไป</option>';
        var option2 = '<option value=""> ยังไม่ได้ตรวจสอบ </option>' +
            '<option value="Y"> สัญลักษณ์Y : ให้รหัสถูกต้อง</option>' +
            '<option value="A"> สัญลักษณ์A : ให้รหัสโรคผิดพลาด</option>' +
            '<option value="B"> สัญลักษณ์B : มีรหัสโรคทั้งๆที่ไม่มีคําวินิจฉัยโรคในบันทึก</option>' +
            '<option value="C"> สัญลักษณ์C : รหัสเป็นรหัสด้อยคุณภาพ โดยมีสาเหตุมาจากคําวินิจฉัยโรคที่ด้อยคุณภาพ</option>' +
            '<option value="D"> สัญลักษณ์D : รหัสมีตัวเลขไม่ครบทุกตําแหน่ง</option>' +
            '<option value="F"> สัญลักษณ์F : รหัสมีตัวเลขมากเกินไป</option>' +
            '<option value="G"> สัญลักษณ์G : ควรมีรหัสนี้แต่รหัสไม่ปรากฏในข้อมูลที่ตรวจสอบ</option>' +
            '<option value="H"> สัญลักษณ์H : ไม่ควรมีรหัสนี้แต่มีรหัสในข้อมูลที่ตรวจสอบ</option>';

        if (_.size(data.rows) > 0) {
            _.each(data.rows, function (v) {
                if(v.DIAGTYPE =='1'){option = option1 }else{ option = option2}
                $('#tbl_icd_list > tbody').append(
                    '<tr>' +
                    '<td class="row">'+no+'<span style="display: none" ><i class="fa fa-check text-success"></i></span></td>' +
                    '<td>' + v.DIAGCODE + '</td>' +
                    '<td>' + v.diseasethai + '</td>' +
                    '<td>'+ v.DIAGTYPE+'</td>' +
                    '<td><select data-seq="'+ v.SEQ +'" data-name="sl_auditicd" class="form-control"' +
                    'data-hospcode="'+ v.HOSPCODE+'" data-diagcode="'+ v.DIAGCODE+'">' +
                    option+
                    '</select></td>'+
                    '</tr>'
                );
                no++;
            });
        }
        else {
            $('#tbl_icd_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
        }
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
            var audit_status,audit_icd;
            _.each(data.rows, function (v) {
                if(v.percent==null){v.percent='-'}
                if(v.date_audit){
                    audit_status='<label  data-name="modal_audit"  data-action="edit" class="btn btn-success btn-circle" data-id="'+ v.id+'"><i class="fa fa-edit"></i></label> ร้อยละ '+ v.percent +' ';
                }else{
                    audit_status='<label  data-name="modal_audit" data-action="save" class="btn btn-primary btn-circle" data-id="'+ v.id+'"><i class="fa fa-list"></i></label>';
                }
                if(v.audit_icd10){
                    audit_icd='<label  data-name="modal_audit_icd"  data-action="edit" class="btn btn-success btn-circle" data-seq="'+ v.seq+'" data-id="'+ v.id+'"><i class="fa fa-check-square-o"></i></label> Audit : '+ v.audit_icd10;
                }else{
                    audit_icd='<label  data-name="modal_audit_icd" data-action="save" class="btn btn-info btn-circle" data-seq="'+ v.seq+'" data-id="'+ v.id+'"><i class="fa fa-list-ol"></i></label>';
                }
                $('#tbl_list > tbody').append(
                    '<tr>' +
                        '<td>' + no + '</td>' +
                        '<td>' + app.mysql_to_thai_date(v.date_serve) +'</td>' +
                        '<td>' + v.name+'  ' + v.lname + '</td>' +
                        '<td>' + v.hn + '</td>' +
                        '<td>' + v.cid + '</td>' +
                        '<td>' + audit_icd+ '</td>' +
                        '<td>'+audit_status +'</td>' +
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
        var action = $(this).data('action');
        audit.modal.show_audit_info(id,action);

    });

    $(document).on('click', 'label[data-name="modal_audit_icd"]', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var action = $(this).data('action');
        var seq = $(this).data('seq');
        audit.modal.show_audit_icd(id,seq,hospcode,action);

    });

    $(document).on('change', 'select[data-name="sl_auditicd"]', function(e) {
        e.preventDefault();
        var items={};
        items.seq = $(this).data('seq');
        items.hospcode = $(this).data('hospcode');
        items.diagcode = $(this).data('diagcode');
        items.txt_auditicd = $(this).val();

        //app.alert(hospcode);
       audit.save_audit_icd(items);

    });

    audit.save_audit = function(items){
        //app.alert(items.action);
        if(items.action == "insert"){
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
        }else{
            audit.ajax.edit_audit(items, function (err, data) {
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

    }


    audit.save_audit_icd = function(items){
        //app.alert(items.action);

            audit.ajax.save_audit_icd(items, function (err, data) {
                if (err) {
                    app.alert(err);
                }
                else {
                    app.alert('บันทึกข้อมูลเรียบร้อย');
                    //audit.get_audit_hosp(hospcode);
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
        items.action=$('#action').val();

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