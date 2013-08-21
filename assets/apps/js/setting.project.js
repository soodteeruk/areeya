/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 4/8/2556 20:11 น..
 */ 
$(function() {
    var tmp = {
        mdl_show: function() {
            $('#mdlMain').modal('show');
        },
        mdl_hide: function() {
            $('#mdlMain').modal('hide');
        },
        clear: function() {
            $('#tboId').val('');
            $('#tboName').val('');
            app.set_first_selected($('#tboProType'))
            app.set_first_selected($('#tboProStatus'))
            $('#tboLocal').val('');
            app.set_first_selected($('#tboJungwat'))
            $('#tboPrice').val('');
            $('#tboVat').val('');
            $('#tboBegin').val('');
            $('#tboFinish').val('');
            $('#tboDays').val('');
            app.set_first_selected($('#tboCompeny'))
            $('#tboCustomer').val('');
            app.set_first_selected($('#tboProGroup'))
            $('#tboCmt').val('');
        },
        get_list: function() {
            app.ajax('project/get_list', {}, function(err, data) {
                $('#tblMain > tbody').empty();
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tblMain > tbody').append(
                                '<tr>' +
                                    '<td width="150">'+ v.pro_id +'</td>' +
                                    '<td>'+ v.pro_name +'</td>' +
                                    '<td>'+ v.pro_price +'</td>' +
                                    '<td>'+ v.pro_begin +'</td>' +
                                    '<td>'+ v.pro_finish +'</td>' +
                                    '<td>'+ v.prs_name +'</td>' +
                                    '<td width="130">' +
                                    '<div class="btn-group pull-right">' +
                                    '<a href="customer/update/'+ v.pro_id +'" class="btn btn-primary btn-sm" title="ข้อมูลลูกค้า" data-name="btnCustomer"><i class="icon-user"></i></a>' +
                                    '<a class="btn btn-info btn-sm" title="แก้ไขข้อมูล" data-name="btnEdit" data-value="'+ v.pro_id +'"><i class="icon-pencil"></i></a>' +
                                    '<a class="btn btn-danger btn-sm" title="ลบข้อมูล" data-name="btnDelete" data-value="'+ v.pro_id +'"><i class="icon-trash"></i></a>' +
                                    '</div>' +
                                    '</td>' +
                                    '</tr>'
                            );
                        });
                    }
                }
            });
        },
        get_jungwat: function() {
            app.ajax('project/get_jungwat', {}, function(err, data) {
                $('#tboJungwat').empty();
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tboJungwat').append(
                                '<option value="'+ v.code_id +'">'+ v.code_name +'</option>'
                            );
                        });
                    }
                }
            });
        },
        get_jungwat_select: function(select) {
            app.ajax('project/get_jungwat', {}, function(err, data) {
                $('#tboJungwat').empty();
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
        get_project_status: function() {
            app.ajax('project/get_project_status', {}, function(err, data) {
                $('#tboProStatus').empty();
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tboProStatus').append(
                                '<option value="'+ v.prs_id +'">'+ v.prs_name +'</option>'
                            );
                        });
                    }
                }
            });
        },
        get_project_type: function() {
            app.ajax('project/get_project_type', {}, function(err, data) {
                $('#tboProType').empty();
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tboProType').append(
                                '<option value="'+ v.prt_id +'">'+ v.prt_name +'</option>'
                            );
                        });
                    }
                }
            });
        },
        get_compeny: function() {
            app.ajax('compeny/get_list', {}, function(err, data) {
                $('#tboCompeny').empty();
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tboCompeny').append(
                                '<option value="'+ v.com_id +'">'+ v.com_name +'</option>'
                            );
                        });
                    }
                }
            });
        },
        get_project_group: function() {
            app.ajax('project/get_group_list', {}, function(err, data) {
                $('#tboProGroup').empty();
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tboProGroup').append(
                                '<option value="'+ v.prg_id +'">'+ v.prg_name +'</option>'
                            );
                        });
                    }
                }
            });
        },
        get_detail: function() {
            app.ajax('project/get_project_detail', { id:$('#tboId').val() }, function(err, data) {
                if(data != null) {
                    var v = data.rows[0];
                    $('#tboName').val(v.pro_name);
                    $('#tboProType').val(v.prt_id);
                    $('#tboProStatus').val(v.prs_id);
                    $('#tboLocal').val(v.pro_local);
                    tmp.get_jungwat_select(v.pro_jungwat);
                    $('#tboPrice').val(v.pro_price);
                    $('#tboVat').val(v.pro_vat);
                    $('#tboBegin').val(v.pro_begin);
                    $('#tboFinish').val(v.pro_finish);
                    $('#tboDays').val(v.pro_days);
                    $('#tboCompeny').val(v.com_id);
                    $('#tboProGroup').val(v.prg_id);
                    $('#tboCmt').val(v.pro_cmt);
                } else {
                    app.alert(err);
                }
            });
        }
    };

    $('#btnAdd').click(function(e) {
        $('#tboHid').val('add');
        tmp.clear();
        tmp.get_project_type();
        tmp.get_project_status();
        tmp.get_jungwat();
        tmp.get_compeny();
        tmp.get_project_group();
        tmp.mdl_show();
    });

    $('#btnSave').click(function(e) {
        e.preventDefault();
        var url = 'project/set_project',
            params = {
                opt: $('#tboHid').val(),
                id: $('#tboId').val(),
                name: $('#tboName').val(),
                prt: $('#tboProType').val(),
                prs: $('#tboProStatus').val(),
                local: $('#tboLocal').val(),
                jungwat: $('#tboJungwat').val(),
                price: $('#tboPrice').val(),
                vat: $('#tboVat').val(),
                begin: $('#tboBegin').val(),
                finish: $('#tboFinish').val(),
                days: $('#tboDays').val(),
                compeny: $('#tboCompeny').val(),
                group: $('#tboProGroup').val(),
                cmt: $('#tboCmt').val()
            };
        if(params.vat == '') params.vat = '0';
        if(params.days == '') params.days = '0';

        if(params.name != '' && params.price != '' && params.begin != '' && params.finish) {
            app.ajax(url, {data: params}, function(err, data) {
                if(data != null) {
                    tmp.mdl_hide();
                    tmp.get_list();
                } else {
                    app.alert(err);
                }
            });
        } else {
            app.alert('กรุณากรอกข้อมูลให้ครบด้วย !');
        }
    });

    $(document).on('click', 'a[data-name="btnEdit"]', function(e) {
        $('#tboHid').val('edit');
        tmp.clear();
        $('#tboId').val($(this).attr('data-value'));
        tmp.get_project_type();
        tmp.get_project_status();
        tmp.get_jungwat();
        tmp.get_compeny();
        tmp.get_project_group();
        tmp.get_detail();
        tmp.mdl_show();
    });

    tmp.get_list();
});