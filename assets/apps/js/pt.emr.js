$(document).ready(function(){
    var pt = {};
    pt.ajax = {
        get_diag_code: function (items, cb) {
            var url = '/epi/get_vaccine',
                params = {
                    items: items
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }
    };

    pt.get_vaccine_hospcode=function(items){
        $('#tbl_list > tbody').empty();
        vaccine.ajax.get_vaccine_total(items, function (err, data) {
            if (err) {
                //app.alert(err);
                $('#tbl_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
            } else {
                //$('#spn_total').html(app.add_commars_with_out_decimal(data.total));
                $('#main_paging').paging(data.total, {
                    format: " < . (qq -) nnncnnn (- pp) . >",
                    perpage: 50,
                    lapping: 0,
                    page: app.get_cookie('message_index_paging'),
                    onSelect: function (page) {
                        app.set_cookie('message_index_paging', page);
                        var start=this.slice[0];
                        vaccine.ajax.get_vaccine_hospcode(items,this.slice[0], this.slice[1], function (err, data) {
                            if (err) {
                                app.alert(err);
                                $('#tbl_list > tbody').append('<tr><td colspan="8">ไม่พบรายการ</td></tr>');
                            } else {
                                //alert('set_list');
                                $('#tbl_list > tbody').empty();
                                if (_.size(data.rows) > 0) {

                                    var no= 1,total_time= 0,total= 0,total_in= 0,total_out=0;
                                    _.each(data.rows, function (v) {

                                        $('#tbl_list > tbody').append(
                                            '<tr>' +
                                                '<td>' + no + '</td>' +
                                                '<td>' + v.id + '</td>' +
                                                '<td>' + v.name + '</td>' +
                                                '<td>' + app.add_commars_with_out_decimal(v.total) + '</td>' +
                                                '<td>' + app.add_commars_with_out_decimal(v.time) + '</td>' +
                                                '<td>' + app.add_commars_with_out_decimal(v.in_hos) + '</td>' +
                                                '<td>' + app.add_commars_with_out_decimal(v.out_hos) + '</td>' +
                                                '</tr>'
                                        );

                                        no=no+1;
                                        total_time=(total_time+(v.time*1));
                                        total=total+(v.total*1); total_in=total_in+(v.in_hos*1); total_out=total_out+(v.out_hos*1);

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
                        });

                    },
                    onFormat: function (type) {
                        switch (type) {

                            case 'block':

                                if (!this.active)
                                    return '<li class="disabled"><a href="">' + this.value + '</a></li>';
                                else if (this.value != this.page)
                                    return '<li><a href="#' + this.value + '">' + this.value + '</a></li>';
                                return '<li class="active"><a href="#">' + this.value + '</a></li>';

                            case 'right':
                            case 'left':

                                if (!this.active) {
                                    return "";
                                }
                                return '<li><a href="#' + this.value + '">' + this.value + '</a></li>';

                            case 'next':

                                if (this.active) {
                                    return '<li><a href="#' + this.value + '">&raquo;</a></li>';
                                }
                                return '<li class="disabled"><a href="">&raquo;</a></li>';

                            case 'prev':

                                if (this.active) {
                                    return '<li><a href="#' + this.value + '">&laquo;</a></li>';
                                }
                                return '<li class="disabled"><a href="">&laquo;</a></li>';

                            case 'first':

                                if (this.active) {
                                    return '<li><a href="#' + this.value + '">&lt;</a></li>';
                                }
                                return '<li class="disabled"><a href="">&lt;</a></li>';

                            case 'last':

                                if (this.active) {
                                    return '<li><a href="#' + this.value + '">&gt;</a></li>';
                                }
                                return '<li class="disabled"><a href="">&gt;</a></li>';

                            case 'fill':
                                if (this.active) {
                                    return '<li class="disabled"><a href="#">...</a></li>';
                                }
                        }
                        return ""; // return nothing for missing branches
                    }
                });
            }
        });

    }
    pt.get_vaccine = function(items){
        $('#tbl_list > tbody').empty();

             vaccine.ajax.get_vaccine(items, function (err, data) {
                 if (_.size(data.rows) > 0) {

                     var no= 1,total_time= 0,total= 0,total_in= 0,total_out=0;
                     _.each(data.rows, function (v) {

                         $('#tbl_list > tbody').append(
                             '<tr>' +
                                 '<td>' + no + '</td>' +
                                 '<td>' + v.id + '</td>' +
                                 '<td>' + v.name + '</td>' +
                                 '<td>' + app.add_commars_with_out_decimal(v.total) + '</td>' +
                                 '<td>' + app.add_commars_with_out_decimal(v.time) + '</td>' +
                                 '<td>' + app.add_commars_with_out_decimal(v.in_hos) + '</td>' +
                                 '<td>' + app.add_commars_with_out_decimal(v.out_hos) + '</td>' +
                                 '</tr>'
                         );

                         no=no+1;
                         total_time=(total_time+(v.time*1));
                         total=total+(v.total*1); total_in=total_in+(v.in_hos*1); total_out=total_out+(v.out_hos*1);

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
             });
    }


    $(document).on('click', 'button[data-name="btn_show"]', function(e) {
        e.preventDefault();

        //alert('Show vaccine');
        var items={};
        items.vaccode=$('#vaccode').val();
        items.amp = $('#distid').val();
        items.hospcode= $('#sl_office').val();
        items.icd10=$('#icd10').val();
        items.date_start=$('#date_start').val();
        items.date_end=$('#date_end').val();
        //app.alert(user_level);
        if(!items.vaccode){
            app.alert('กรุณาระบุชนิดวัคซีน');
            $('#vaccode').focus();
        }else if(!items.date_start){
            app.alert('กรุณาระบุวันเริ่มต้น');
            $('#date_start').focus();
        }else if(!items.date_end){
            app.alert('กรุณาระบุวันสิ้นสุด');
            $('#date_end').focus()
        }else if(items.hospcode && items.hospcode !=off_id){
            if(user_level==0){
                vaccine.get_vaccine_hospcode(items);
            }else{
                app.alert('ท่านไม่สามารถเข้าดูข้อมูลของหน่วยบริการอื่นได้');
            }
        }else{
            if(items.hospcode !=''){
                vaccine.get_vaccine_hospcode(items);
            }else{
                vaccine.get_vaccine(items);
            }

        }


    });

});