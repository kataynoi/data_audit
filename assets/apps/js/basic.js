$(document).ready(function(){
    //User namespace
    var basic = {};
    basic.ajax = {
        get_office_list: function (amp, cb) {
            var url = '/basic/get_office_list_by_amp',
                params = {
                    amp: amp
                }
            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        },get_ampur_list: function (provcode, cb) {
            var url = '/basic/get_ampur_list',
                params = {
                    provcode: provcode
                }
            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        },get_office_list_by_amp: function (provcode, amp, cb) {
            var url = '/basic/get_office_list_by_amp',
                params = {
                    provcode: provcode,
                    amp: amp

                }
            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }

    };

    basic.modal = {
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
    basic.get_office_list_by_amp=function(provcode, amp){
        $('#sl_office').empty();
        basic.ajax.get_office_list_by_amp(provcode, amp, function (err, data) {
            if (err) {
                $('#sl_office').append('<option> ไม่มีหน่วยบริการ </option>')
            } else {
                $('#sl_office').append('<option value=""> เลือกหน่วยบริการ </option>')
                _.each(data.rows, function (v) {
                    $('#sl_office').append('<option value="' + v.hoscode+ '">[' + v.hoscode + '] ' + v.hosname + '</option>');
                });
            }
        });
    }
    basic.get_ampur_list=function(provcode){
        $('#ampcode').empty();
        basic.ajax.get_ampur_list(provcode, function (err, data) {
            if (err) {
                $('#ampcode').append('<option value=""> ไม่มีอำเภอ </option>')
            } else {
                $('#ampcode').append('<option value=""> อำเภอทั้งหมด </option>')
                _.each(data.rows, function (v) {
                    $('#ampcode').append('<option value="' + v.ampurcode + '">[' + v.ampurcode + '] ' + v.ampurname + '</option>');
                });
            }
        });
    }

    basic.get_office_list_by_cup=function(amp){
        $('#sl_office').empty();
        basic.ajax.get_office_list_by_amp(amp, function (err, data) {
            if (err) {
                $('#sl_office').append('<option> ไม่มีหน่วยบริการ </option>')
            } else {
                $('#sl_office').append('<option value=""> เลือกหน่วยบริการ </option>')
                _.each(data.rows, function (v) {
                    $('#sl_office').append('<option value="' + v.off_id + '">[' + v.off_id + '] ' + v.off_name + '</option>');
                });
            }
        });
    }


    $('#provcode').on('change', function () {
        var provcode = $(this).val();
        basic.get_ampur_list(provcode);
    });

    $('#ampcode').on('change', function () {
        var amp = $(this).val();
        var provcode =$('#provcode').val();
        basic.get_office_list_by_amp(provcode,amp);
    });

});