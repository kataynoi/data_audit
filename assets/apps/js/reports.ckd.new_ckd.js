$(function () {
    var reports = {};

    reports.ajax_cross = {
        get_new_ckd: function (year,url, cb) {
            var url = url+'ckd_01_02.php',
                params = {
                    year: year
                }
            app.ajax_cross(url, params, function (data) {
                cb(data);
            });
        }
    }

    reports.set_new_dmht = function (data) {
        $('#tbl_list_dmht > tbody').append(
            '<tr>' +
                '<td></td>'+
                '<td>'+ data.province+'</td>' +
                '<td>'+ app.add_commars_with_out_decimal(data.dmht_before)+'</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.dmht_new_m10) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.dmht_new_m11) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.dmht_new_m12) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.dmht_new_m01) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.dmht_new_m02) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.dmht_new_m03) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.dmht_new_m04) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.dmht_new_m05) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.dmht_new_m06) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.dmht_new_m07) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.dmht_new_m08) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.dmht_new_m09) + '</td>' +
                '</tr>'
        );
        $('#how_to').html(data.how_to);
    };
    reports.set_new_ckd = function (data) {
        $('#tbl_list_ckd > tbody').append(
            '<tr>' +
                '<td></td>'+
                '<td>'+ data.province+'</td>' +
                '<td>'+ app.add_commars_with_out_decimal(data.ckd_before)+'</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_new_m10) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_new_m11) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_new_m12) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_new_m01) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_new_m02) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_new_m03) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_new_m04) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_new_m05) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_new_m06) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_new_m07) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_new_m08) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_new_m09) + '</td>' +
                '</tr>'
        );
        $('#how_to').html(data.how_to);
    };

    reports.get_new_ckd = function (year,url) {
        reports.ajax_cross.get_new_ckd(year,url, function (data) {
                reports.set_new_dmht(data);
                reports.set_new_ckd(data);

        });
    };



    $(document).on('click', '#btn_show', function () {
        $('#tbl_list_dmht > tbody').empty();
        $('#tbl_list_ckd > tbody').empty();
        var year = $('#year').val()

        if (!year) {
            app.alert('กรุณาระบุ ปี');
        }else{
            reports.get_new_ckd(year,url_44);
            reports.get_new_ckd(year,url_40);
            reports.get_new_ckd(year,url_45);
            reports.get_new_ckd(year,url_46);
        }
    });

// #### set_waiting list สสจ. สสอ.
    //$('.alert').hide();

    $('#year').on('change',function(){
        var year=($(this).val());
        $('#year1').html((year-1));
        $('#year2').html(year);
    });

});

