/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 7/8/2556 22:02 น..
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
            $('#tboShort').val('');
            $('#tboDetail').val('');
        },
        get_list: function() {
            app.ajax('project/get_group_list', {}, function(err, data) {
                $('#tblMain > tbody').empty();
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tblMain > tbody').append(
                                '<tr>' +
                                    '<td width="150">'+ v.prg_id +'</td>' +
                                    '<td>'+ v.prg_name +'</td>' +
                                    '<td>'+ v.prg_code +'</td>' +
                                    '<td>'+ v.prg_detail +'</td>' +
                                    '<td width="100">' +
                                    '<div class="btn-group pull-right">' +
                                    '<a class="btn btn-info btn-sm" title="แก้ไขข้อมูล" data-name="btnEdit" data-value="'+ v.prg_id +'"><i class="icon-pencil"></i></a>' +
                                    '<a class="btn btn-danger btn-sm" title="ลบข้อมูล" data-name="btnDelete" data-value="'+ v.prg_id +'"><i class="icon-trash"></i></a>' +
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
        auto_gen_id: function() {
            app.ajax('project/get_auto_group_id', {}, function(err, data) {
                if(data != null) {
                    $('#tboId').val(data.id);
                }
            });
        }
    };

    $('#btnAdd').click(function(e) {
        $('#tboHid').val('add');
        tmp.clear();
        tmp.auto_gen_id();
        tmp.mdl_show();
    });

    $('#btnSave').click(function(e) {
        var url = 'project/set_project_group',
            params = {
                id: $('#tboId').val(),
                name: $('#tboName').val(),
                short: $('#tboShort').val(),
                detail: $('#tboDetail').val(),
                opt: $('#tboHid').val()
            };
        if(params.name != '' && params.short != '') {
            app.ajax(url, { data: params }, function(err, data) {
                if(data != null) {
                    app.alert(data.msg);
                    tmp.mdl_hide();
                    tmp.get_list();
                } else {
                    app.alert(err);
                }
            });
        } else {
            app.alert('กรุณากรอกข้อมูลให้สมบูรณ์ด้วย !');
        }
    });

    $(document).on('click', 'a[data-name="btnEdit"]', function(e) {
        e.preventDefault();
        $('#tboHid').val('edit');
        $('#tboId').val($(this).attr('data-value'));
        app.ajax('project/get_group_detail', { id:$('#tboId').val() }, function(err, data) {
            if(data != null) {
                var v = data.rows[0];
                $('#tboName').val(v.prg_name);
                $('#tboShort').val(v.prg_code);
                $('#tboDetail').val(v.prg_detail);
            } else {
                app.alert(err);
            }
        });
        tmp.mdl_show();
    });

    $(document).on('click', 'a[data-name="btnDelete"]', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-value');
        app.confirm('ยืนยันการลบข้อมูล', function(cb) {
            if(cb) {
                app.ajax('project/set_group_remove', { id: id }, function(err, data) {
                    if(data != null) {
                        app.alert(data.msg);
                        tmp.get_list();
                    } else {
                        app.alert(err);
                    }
                });
            }
        });
    });

    $('#tboShort').keyup(function(e) {
        $('#tboShort').val($('#tboShort').val().toUpperCase());
    });

    tmp.get_list();
});