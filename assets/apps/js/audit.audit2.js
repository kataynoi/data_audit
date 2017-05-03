$(document).ready(function(){

    var audit = {};
    audit.ajax = {
        get_audit_ur: function (items, cb) {
            var url = '/audit/get_audit_ur',
                params = {
                    items: items
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        },
        get_audit_top_service: function (items, cb) {
        var url = '/audit/get_audit_top_service',
            params = {
                items: items
            }

        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    },get_audit_top_diag: function (items, cb) {
        var url = '/audit/get_audit_top_diag',
            params = {
                items: items
            }

        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    },get_audit_top_proced: function (items, cb) {
        var url = '/audit/get_audit_top_proced',
            params = {
                items: items
            }
        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    },get_audit_top_drug: function (items, cb) {
        var url = '/audit/get_audit_top_drug',
            params = {
                items: items
            }
        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    },get_audit_disease_group: function (items, cb) {
        var url = '/audit/get_audit_disease_group',
            params = {
                items: items
            }
        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    }

};

audit.get_audit_ur = function(items){
        $('#tbl_ur_list > tbody').empty();
        audit.ajax.get_audit_ur(items, function (err, data) {
                audit.set_audit_ur (data);
        });

    }
audit.set_audit_ur =function(data){
    $('#tbl_ur_list > tbody').empty();
    if (_.size(data.rows) > 0) {
        var no= 1,total=0;
        _.each(data.rows, function (v) {

            $('#tbl_ur_list > tbody').append(
                '<tr>' +
                    '<td>' + no + '</td>' +
                    '<td>' + v.month + '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(v.total )+ '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(v.all_service )+ '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(v.price_op )+ '</td>' +
                    '</tr>'
            );
            total=(v.total*1)+total;
            no=no+1;
        });
        $('#tbl_ur_list > tbody').append('<tr><td colspan=2><strong>รวม</strong>  </td><td>'+app.add_commars_with_out_decimal(total)+'</td></tr>')
    }
    else {
        $('#tbl_epi_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
    }
}

audit.get_audit_top_service = function(items){
        $('#tbl_top_service_list > tbody').empty();
        audit.ajax.get_audit_top_service(items, function (err, data) {
                audit.set_audit_top_service (data);
        });
    }
audit.set_audit_top_service =function(data){
    $('#tbl_top_service_list > tbody').empty();
    if (_.size(data.rows) > 0) {
        var no= 1,total= 0,op= 0,non_op=0;
        _.each(data.rows, function (v) {

            $('#tbl_top_service_list > tbody').append(
                '<tr>' +
                    '<td>' + no + '</td>' +
                    '<td>' + v.date_serv + '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(v.total )+ '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(v.op )+ '</td>' +
                    '<td>' + app.add_commars_with_out_decimal((v.total*1)-(v.op*1) )+ '</td>' +
                    '</tr>'
            );
            total=(v.total*1)+total;
            op=(v.op*1)+op;
            non_op=((v.total*1)-(v.op*1))+non_op;
            no=no+1;
        });
        $('#tbl_top_service_list > tbody').append('<tr><td colspan=2><strong>รวม</strong>  </td><td>'+app.add_commars_with_out_decimal(total)+'</td>' +
            '<td>'+app.add_commars_with_out_decimal(op)+'</td><td>'+app.add_commars_with_out_decimal(non_op)+'</td></tr>')
    }
    else {
        $('#tbl_top_service_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
    }


}

audit.get_audit_top_diag = function(items){
        $('#tbl_top_diag_list > tbody').empty();
        audit.ajax.get_audit_top_diag(items, function (err, data) {
                audit.set_audit_top_diag (data);
        });
    }
audit.set_audit_top_diag =function(data){
    $('#tbl_top_diag_list > tbody').empty();
    if (_.size(data.rows) > 0) {
        var no= 1,total= 0,op= 0,non_op=0;
        _.each(data.rows, function (v) {

            $('#tbl_top_diag_list > tbody').append(
                '<tr>' +
                    '<td>' + no + '</td>' +
                    '<td>' + v.icd10 + '</td>' +
                    '<td>' + v.diseasename+ '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(v.total )+ '</td>' +
                    '</tr>'
            );
            total=(v.total*1)+total;
            op=(v.op*1)+op;
            non_op=((v.total*1)-(v.op*1))+non_op;
            no=no+1;
        });
        $('#tbl_top_diag_list > tbody').append('<tr><td colspan=3><strong>รวม</strong>  </td><td>'+app.add_commars_with_out_decimal(total)+'</td>' +'</tr>')
    }
    else {
        $('#tbl_top_diag_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
    }
}

audit.get_audit_top_proced = function(items){
        $('#tbl_top_proed_list > tbody').empty();
        audit.ajax.get_audit_top_proced(items, function (err, data) {
                audit.set_audit_top_proced (data);
        });
    }
audit.set_audit_top_proced =function(data){
    $('#tbl_top_proced_list > tbody').empty();
    if (_.size(data.rows) > 0) {
        var no= 1,total= 0,op= 0,non_op=0;
        _.each(data.rows, function (v) {

            $('#tbl_top_proced_list > tbody').append(
                '<tr>' +
                    '<td>' + no + '</td>' +
                    '<td>' + v.icd9 + '</td>' +
                    '<td>' + v.procedname+ '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(v.total )+ '</td>' +
                    '</tr>'
            );
            total=(v.total*1)+total;
            op=(v.op*1)+op;
            non_op=((v.total*1)-(v.op*1))+non_op;
            no=no+1;
        });
        $('#tbl_top_proced_list > tbody').append('<tr><td colspan=3><strong>รวม</strong>  </td><td>'+app.add_commars_with_out_decimal(total)+'</td>' +
            '</tr>')
    }
    else {
        $('#tbl_top_proced_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
    }
}

audit.get_audit_top_drug = function(items){
        $('#tbl_top_drug_list > tbody').empty();
        audit.ajax.get_audit_top_drug(items, function (err, data) {
                audit.set_audit_top_drug (data);
        });
    }
audit.set_audit_top_drug =function(data){
    $('#tbl_top_drug_list > tbody').empty();
    if (_.size(data.rows) > 0) {
        var no= 1,total= 0,cost= 0,price= 0,total_drug=0;
        _.each(data.rows, function (v) {

            $('#tbl_top_drug_list > tbody').append(
                '<tr>' +
                    '<td>' + no + '</td>' +
                    '<td>' + v.drugcode + '</td>' +
                    '<td>' + v.drugname+ '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(v.cost )+ '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(v.price )+ '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(v.total_drug )+ '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(v.total )+ '</td>' +
                    '</tr>'
            );
            total=(v.total*1)+total;
            cost=(v.cost*1)+cost;
            price=(v.price*1)+price;
            total_drug=(v.total_drug*1)+total_drug;
            no=no+1;
        });
        $('#tbl_top_drug_list > tbody').append('<tr><td colspan=3><strong>รวม</strong>  </td><td>'+app.add_commars_with_out_decimal(cost)+'</td>' +
            '<td>'+app.add_commars_with_out_decimal(price)+'</td><td>'+app.add_commars_with_out_decimal(total_drug)+'</td><td>'+app.add_commars_with_out_decimal(total)+'</td></tr>')
    }
    else {
        $('#tbl_top_drug_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
    }
}
    audit.get_audit_disease_group = function(items){
        $('#tbl_disease_group_list > tbody').empty();
        audit.ajax.get_audit_disease_group(items, function (err, data) {
                audit.set_audit_disease_group (data);
        });
    }
audit.set_audit_disease_group =function(data){
    $('#tbl_disease_group_list > tbody').empty();
    if (_.size(data.rows) > 0) {
        var no= 1,total= 0,cost= 0,price= 0,total_drug=0;
        _.each(data.rows, function (v) {

            $('#tbl_disease_group_list > tbody').append(
                '<tr>' +
                    '<td>' + no + '</td>' +
                    '<td>' + v.group_code + '</td>' +
                    '<td>' + v.group_name+ '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(v.total )+ '</td>' +
                    '<td>' + app.add_commars_with_out_decimal(v.time )+ '</td>' +
                    '</tr>'
            );
            total=(v.total*1)+total;
            cost=(v.cost*1)+cost;
            price=(v.price*1)+price;
            total_drug=(v.total_drug*1)+total_drug;
            no=no+1;
        });
        $('#tbl_top_drug_list > tbody').append('<tr><td colspan=3><strong>รวม</strong>  </td><td>'+app.add_commars_with_out_decimal(cost)+'</td>' +
            '<td>'+app.add_commars_with_out_decimal(price)+'</td><td>'+app.add_commars_with_out_decimal(total_drug)+'</td><td>'+app.add_commars_with_out_decimal(total)+'</td></tr>')
    }
    else {
        $('#tbl_top_drug_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
    }
}

    $('a[href="#tab_ur"]').on('click', function (e) {
        e.preventDefault();
        var items={};
        items.hospcode= $('#sl_office').val();
        //items.year=$('#year').val();
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
            $('#tbl_list > tbody').empty();
        audit.get_audit_ur(items);
        }
    })

    $('a[href="#tab_top_service"]').on('click', function (e) {
        e.preventDefault();
        var items={};
        items.hospcode= $('#sl_office').val();
        //items.year=$('#year').val();
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
            $('#tbl_top_service_list > tbody').empty();
        audit.get_audit_top_service(items);
        }
    })

    $('a[href="#tab_top_diag"]').on('click', function (e) {
        e.preventDefault();
        var items={};
        items.hospcode= $('#sl_office').val();
        //items.year=$('#year').val();
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
            $('#tbl_top_service_list > tbody').empty();
        audit.get_audit_top_diag(items);
        }
    })

    $('a[href="#tab_top_proced"]').on('click', function (e) {
        e.preventDefault();
        var items={};
        items.hospcode= $('#sl_office').val();
        //items.year=$('#year').val();
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
            $('#tbl_top_service_list > tbody').empty();
        audit.get_audit_top_proced(items);
        }
    })

    $('a[href="#tab_top_drug"]').on('click', function (e) {
        e.preventDefault();
        var items={};
        items.hospcode= $('#sl_office').val();
        //items.year=$('#year').val();
        items.date_start=$('#date_start').val();
        items.date_end=$('#date_end').val();

        if(!items.hospcode){
            app.alert('กรุณาระบุหน่วยบริการ');
            $('#sl_office').focus();
        }else if(!items.date_start){
            app.alert('กรุณาระบุวันเริ่มต้น');
            app.alert('กรุณาระบุวันเริ่มต้น');
            $('#date_start').focus();
        }else if(!items.date_end){
            app.alert('กรุณาระบุวันสิ้นสุด');
            $('#date_end').focus()
        }else{
            $('#tbl_top_service_list > tbody').empty();
        audit.get_audit_top_drug(items);
        }

    })

        $('a[href="#tab_disease_group"]').on('click', function (e) {
        e.preventDefault();
        var items={};
        items.hospcode= $('#sl_office').val();
        //items.year=$('#year').val();
        items.date_start=$('#date_start').val();
        items.date_end=$('#date_end').val();

        if(!items.hospcode){
            app.alert('กรุณาระบุหน่วยบริการ');
            $('#sl_office').focus();
        }else if(!items.date_start){
            app.alert('กรุณาระบุวันเริ่มต้น');
            app.alert('กรุณาระบุวันเริ่มต้น');
            $('#date_start').focus();
        }else if(!items.date_end){
            app.alert('กรุณาระบุวันสิ้นสุด');
            $('#date_end').focus()
        }else{
        audit.get_audit_disease_group(items);
        }
    })

});