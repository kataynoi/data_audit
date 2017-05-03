$(function () {
    var reports = {};

    reports.ajax_cross = {
        get_control_bp: function (year,url, cb) {
            var url = url+'ckd_01_01.php',
                params = {
                    year: year
                }
            app.ajax_cross(url, params, function (data) {
                cb(data);
            });
        },get_control_bp_prov: function (year,url, cb) {
            var url = url+'sum_hcup_ckd_01_01.php',
                params = {
                    year: year
                }
            app.ajax_cross(url, params, function (data) {
                cb(data);
            });
        }
    }

    reports.set_control_bp = function (data) {
        $('#tbl_list > tbody').append(
            '<tr>' +
                '<td></td>'+
                '<td>'+ data.province_code+' : '+data.province+'</td>' +
                '<td>'+ app.add_commars_with_out_decimal(data.dmht)+'</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.m10) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.m11) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.m12) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.m01) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.m02) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.m03) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.m04) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.m05) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.m06) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.m07) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.m08) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.m09) + '</td>' +
                '</tr>'
        );
        $('#how_to').html(data.how_to);
    };
    reports.set_control_bp_prov = function (data) {
        var no=1;
        if (_.size(data.row) > 0) {
            _.each(data.row, function (v) {

                $('#tbl_list > tbody').append(
                    '<tr>' +
                        '<td>'+no+'</td>'+
                        '<td>'+ v.hcup+' : '+ v.name+'</td>' +
                        '<td>'+ app.add_commars_with_out_decimal(v.dmht)+'</td>' +
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
                        '</tr>'
                );
                no=no+1;
                $('#how_to').html(v.how_to);
            });

        }


    };

    reports.get_control_bp = function (year,url) {
        reports.ajax_cross.get_control_bp(year,url, function (data) {
                reports.set_control_bp(data);
        });
    };
    reports.get_control_bp_prov = function (year,url) {
        reports.ajax_cross.get_control_bp_prov(year,url, function (data) {
                reports.set_control_bp_prov(data);
        });
    };



    $(document).on('click', '#btn_show', function () {
        $('#tbl_list > tbody').empty();
        var year = $('#year').val()
        var prov_code=$('#prov_code').val();
        var url;
        switch (prov_code){
            case '40':
                url=url_40;
                break;
            case '44':
                url=url_44;
                break;
            case '45':
                url=url_45;
                break;
            case '46':
                url=url_46;
                break;
        }
        //alert(url);
        if (!year) {
            app.alert('กรุณาระบุ ปี');
        }else if(prov_code==''){
            reports.get_control_bp(year,url_44);
            reports.get_control_bp(year,url_40);
            reports.get_control_bp(year,url_45);
            reports.get_control_bp(year,url_46);
        }else{
            reports.get_control_bp_prov(year,url);
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

