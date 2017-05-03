$(function () {

    var reports = {};
    reports.ajax = {
        get_y97: function (year,prov,amp, cb) {
            var url = '/reports/get_principle_y97',
                params = {
                    year:year,
                    prov: prov,
                    amp: amp

                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }
    }

    reports.set_y97 = function (data) {
        $('#tbl_list > tbody').empty();
        var no= 1,sum_total=0;
        if (_.size(data.rows) > 0) {
            _.each(data.rows, function (v) {

                $('#tbl_list > tbody').append(
                    '<tr>' +
                        '<td>'+no+'</td>'+
                        '<td>' + v.code +' '+v.pname +v.name +'</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.male) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.female) + '</td>' +
                        '<td>' + app.add_commars_with_out_decimal(v.total) + '</td>' +
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
                    '<td></td>' +
                    '<td>' + app.add_commars_with_out_decimal(sum_total) + '</td>' +
                    '</tr>'
            );
        }
        else {
            $('#tbl_e1_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
        }
    };

    reports.get_y97 = function (year,prov,amp) {

        $('#tbl_list > tbody').empty();

        reports.ajax.get_y97(year,prov,amp, function (err, data) {
            if (err) {
                app.alert(err);
                $('#tbl_list > tbody').append('<tr><td colspan="4">ไม่พบรายการ</td></tr>');
            } else {
                reports.set_y97(data);
            }
        });
    };

    $(document).on('click', 'a[data-name="btn_set_map"]', function(e) {
        e.preventDefault();

        var id = $(this).data('id');

        app.go_to_url('/maps/set_map/' + id);
    });
    $(document).on('click', 'button[data-name="btn_show"]', function (e) {
        e.preventDefault();
        var year2 = $('#year').val();
        var provcode = $('#provcode').val();
        reports.get_y97(year2,provcode,'');

    });


    reports.get_y97(year,'','');

// #### set_waiting list สสจ. สสอ.

});

