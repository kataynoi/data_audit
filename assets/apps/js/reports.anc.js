$(function () {

    var reports = {};
    reports.modal = {
        show_e0_approve: function () {
            $('#mdl_e0_for_approve').modal({
                keyboard: false,
                backdrop: 'static'
            });
        },
        hide_e0_approve: function () {
            $('#mdl_e0_for_approve').modal('hide');

        }
    };

    reports.ajax = {
        get_anc_list: function (start_date, end_date,  amp, cb) {
            var url = '/reports/get_anc_by_office',
                params = {
                    s: start_date,
                    e: end_date,
                    amp: amp
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }
    }

    reports.set_anc_iodine_list = function (data) {
        $('#tbl_list > tbody').empty();
        var no= 1,sum_total=0;
        if (_.size(data.rows) > 0) {
            _.each(data.rows, function (v) {

                $('#tbl_list > tbody').append(
                    '<tr>' +
                        '<td>'+no+'</td>'+
                        '<td>' + v.distid +' '+ v.distname + '</td>' +
                        '<td>' + v.hospcode +' '+ v.off_name+'</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.total) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.total_time) + '</td>' +
                        '</tr>'
                );
                no=no+1;
                sum_total=sum_total+ (v.total*1);
            });
            $('#tbl_list > tbody').append(
                '<tr>' +
                    '<td></td>'+
                    '<td></td>' +
                    '<td></td>' +
                    '<td>' + app.add_commars_with_out_decimal(sum_total) + '</td>' +
                    '</tr>'
            );
        }
        else {
            $('#tbl_e1_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
        }
    };

    reports.get_list_anc = function (start_date, end_date, amp) {

        $('#tbl_list > tbody').empty();

        reports.ajax.get_anc_list(start_date, end_date, amp, function (err, data) {
            if (err) {
                app.alert(err);
                $('#tbl_list > tbody').append('<tr><td colspan="4">ไม่พบรายการ</td></tr>');
            } else {
                reports.set_anc_iodine_list(data);
            }
        });
    };



    $(document).on('click', '#btn_get_list', function () {
        var start_date = $('#txt_query_start_date').val(),
            end_date = $('#txt_query_end_date').val(),
            amp = $('#sl_query_amp').val();
        if (!start_date) {
            app.alert('กรุณาระบุ วันที่เริ่มต้น');
        } else if (!end_date) {
            app.alert('กรุณาระบุ วันที่สิ้นสุด');
        } else{
            reports.get_list_anc(start_date, end_date,amp);
        }
    });

// #### set_waiting list สสจ. สสอ.

});

