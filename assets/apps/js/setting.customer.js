/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 12/8/2556 13:07 น..
 */ 
$(function() {
    var tmp = {
        get_list: function() {
            var id = $('#tboId').val();
            app.ajax('customer/get_list', { id: id }, function(err, data) {
                app.show_loading();
                if(data != null) {
                    var v = data.rows[0];
                    $('#tboName').val(v.cus_name);
                    $('#tboAddr').val(v.cus_addr);
                    tmp.get_jungwat_select(v.cus_jungwat);
                    tmp.get_amphur_select(v.cus_jungwat, v.cus_amphur);
                    tmp.get_tumbon_select(v.cus_amphur, v.cus_tumbon);
                    $('#tboPost').val(v.cus_phone);
                    $('#tboFax').val(v.cus_fax);
                    $('#tboEmail').val(v.cus_email);
                    $('#tboContact').val(v.cus_contact);
                } else {
                    app.alert(err);
                    tmp.get_jungwat();
                }
                app.hide_loading();
            });
        },
        clear: function() {
            $('#tboName').val('');
            $('#tboAddr').val('');
            app.set_first_selected($('#tboJungwat'));
            app.set_first_selected($('#tboAmphur'));
            app.set_first_selected($('#tboTumbon'));
            $('#tboPost').val('');
            $('#tboFax').val('');
            $('#tboEmail').val('');
            $('#tboContact').val('');
        },
        get_jungwat: function() {
            app.ajax('project/get_jungwat', {}, function(err, data) {
                $('#tboJungwat').empty();
                $('#tboJungwat').append('<option value="">--- เลือกจังหวัด ---</option>');
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tboJungwat').append('<option value="'+ v.code_id +'">'+ v.code_name +'</option>');
                        });
                    }
                }
            });
        },
        get_jungwat_select: function(select) {
            app.ajax('project/get_jungwat', {}, function(err, data) {
                $('#tboJungwat').empty();
                $('#tboJungwat').append('<option value="">--- เลือกจังหวัด ---</option>');
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            if(select == v.code_id)
                                $('#tboJungwat').append('<option value="'+ v.code_id +'" selected>'+ v.code_name +'</option>');
                            else
                                $('#tboJungwat').append('<option value="'+ v.code_id +'">'+ v.code_name +'</option>');
                        });
                    }
                }
            });
        },
        get_amphur: function(id) {
            app.ajax('project/get_amphur', { id: id }, function(err, data) {
                $('#tboAmphur').empty();
                $('#tboAmphur').append('<option value="">--- เลือกอำเภอ ---</option>');
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tboAmphur').append(
                                '<option value="'+ v.code_id +'">'+ v.code_name +'</option>'
                            );
                        });
                    }
                }
            });
        },
        get_amphur_select: function(opt, select) {
            var url = 'project/get_amphur',
                params = { id: opt };

            app.ajax(url, params, function(err, data) {
                if(data != null && _.size(data.rows) > 0) {
                    _.each(data.rows, function(v) {
                        if(select == v.code_id)
                            $('#tboAmphur').append('<option value="'+ v.code_id +'" selected>'+ v.code_name +'</option>');
                        else
                            $('#tboAmphur').append('<option value="'+ v.code_id +'">'+ v.code_name +'</option>');
                    });
                }
            });
        },
        get_tumbon: function(id) {
            app.ajax('project/get_tumbon', { id: id }, function(err, data) {
                $('#tboTumbon').empty();
                $('#tboTumbon').append('<option value="">--- เลือกตำบล ---</option>');
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tboTumbon').append(
                                '<option value="'+ v.code_id +'">'+ v.code_name +'</option>'
                            );
                        });
                    }
                }
            });
        },
        get_tumbon_select: function(opt, select) {
        var url = 'project/get_tumbon',
            params = { id: opt };

            app.ajax(url, params, function(err, data) {
                if(data != null && _.size(data.rows) > 0) {
                    _.each(data.rows, function(v) {
                        if(select == v.code_id)
                            $('#tboTumbon').append('<option value="'+ v.code_id +'" selected>'+ v.code_name +'</option>');
                        else
                            $('#tboTumbon').append('<option value="'+ v.code_id +'">'+ v.code_name +'</option>');
                    });
                }
            });
        }

    };

    $('#tboJungwat').change(function() {
        tmp.get_amphur($('#tboJungwat').val());
    });

    $('#tboAmphur').change(function() {
        tmp.get_tumbon($('#tboAmphur').val());
    });

    $('#btnSave').click(function(e) {
        var url = 'customer/set_customer',
            params = {
                id: $('#tboId').val(),
                name: $('#tboName').val(),
                addr: $('#tboAddr').val(),
                jungwat: $('#tboJungwat').val(),
                amphur: $('#tboAmphur').val(),
                tumbon: $('#tboTumbon').val(),
                post: $('#tboPost').val(),
                phone: $('#tboPhone').val(),
                fax: $('#tboFax').val(),
                email: $('#tboEmail').val(),
                contact: $('#tboContact').val()
            };
        app.ajax(url, { data: params }, function(err, data) {
            if(data != null) {
                app.alert(data.msg);
            } else {
                app.alert(err);
            }
        });
    });

    tmp.clear();
    tmp.get_list();
});