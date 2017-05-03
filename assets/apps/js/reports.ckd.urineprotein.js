$(function () {
    var reports = {};

    reports.ajax_cross = {
        get_control_bp: function (year,url, cb) {
            var url = url+'ckd_02_02_09_original.php',
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
                '<td>'+ data.province+'</td>' +
                '<td>'+ app.add_commars_with_out_decimal(data.ckd_all)+'</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_uprotein_test) + '</td>' +
                '<td>' + app.add_commars_with_out_decimal(data.ckd_uprotein_not_test) + '</td>' +
                '</tr>'
        );
        $('#how_to').html(data.how_to);
    };

    reports.get_control_bp = function (year,url) {
        reports.ajax_cross.get_control_bp(year,url, function (data) {
                reports.set_control_bp(data);
        });
    };



    $(document).on('click', '#btn_show', function () {
        $('#tbl_list > tbody').empty();
        var year = $('#year').val()

        if (!year) {
            app.alert('กรุณาระบุ ปี');
        }else{
            reports.get_control_bp(year,url_44);
            reports.get_control_bp(year,url_40);
            reports.get_control_bp(year,url_45);
            reports.get_control_bp(year,url_46);
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

