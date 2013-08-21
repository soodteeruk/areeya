/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 14/8/2556 19:42 น..
 */ 
$(function() {
    var tmp = {
        get_list: function() {
            app.ajax('employee/get_list', {} , function(err, data) {
                $('#tblMain > tbody').empty();
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tblMain > tbody').append(
                                '<tr>' +
                                    '<td>'+ v.emp_id +'</td>' +
                                    '<td>'+ v.emp_name +'</td>' +
                                    '<td>'+ v.pos_name +'</td>' +
                                    '<td>'+ v.emp_phone +'</td>' +
                                    '<td>'+ v.dep_name +'</td>' +
                                    '<td width="100">' +
                                    '<div class="btn-group pull-right">' +
                                    '<a class="btn btn-info btn-sm" title="แก้ไขข้อมูล" data-name="btnEdit" data-value="'+ v.emp_id +'"><i class="icon-pencil"></i></a>' +
                                    '<a class="btn btn-danger btn-sm" title="ลบข้อมูล" data-name="btnDelete" data-value="'+ v.emp_id +'"><i class="icon-trash"></i></a>' +
                                    '</div>' +
                                    '</td>' +
                                    '</tr>'
                            );
                        });
                    } else {
                        app.alert(data.msg);
                    }
                } else {
                    app.alert(err);
                }
            });
        },
        clear: function() {
            $('#tboId').val('');
            $('#tboCid').val('');
            $('#tboName').val('');
            $('#tboAddr').val('');
            app.set_first_selected(('#tboJungwat'));
            app.set_first_selected(('#tboAmphur'));
            app.set_first_selected(('#tboTumbon'));
            $('#tboPost').val('');
            $('#tboPhone').val('');
            $('#tboEmail').val('');
            $('#tboSalary').val('');
            $('#tboBegin').val('');
            app.set_first_selected($('#tboStatus'));
            app.set_first_selected($('#tboDepart'));
            app.set_first_selected($('#tboPosition'));
        },
        mdl_show: function() {
            $('#mdlMain').modal('show');
        },
        mdl_hide: function() {
            $('#mdlMain').modal('hide');
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
        },
        auto_gen_id: function() {
            app.ajax('employee/get_auto_id', {}, function(err, data) {
                if(data != null) {
                    $('#tboId').val(data.rows);
                }
            });
        },
        get_status: function() {
            $('#tboStatus').empty();
            app.ajax('employee/get_status', {}, function(err, data) {
                if(data != null && _.size(data.rows) > 0) {
                    _.each(data.rows, function(v) {
                        $('#tboStatus').append('<option value="'+ v.ems_id +'">'+ v.ems_name +'</option>');
                    });
                }
            });
        },
        get_depart: function() {
            $('#tboDepart').empty();
            app.ajax('depart/get_list', {}, function(err, data) {
                if(data != null && _.size(data.rows) > 0) {
                    _.each(data.rows, function(v) {
                        $('#tboDepart').append('<option value="'+ v.dep_id +'">'+ v.dep_name +'</option>');
                    });
                }
            });
        },
        get_position: function() {
            $('#tboPosition').empty();
            app.ajax('position/get_list', {}, function(err, data) {
                if(data != null && _.size(data.rows) > 0) {
                    _.each(data.rows, function(v) {
                        $('#tboPosition').append('<option value="'+ v.pos_id +'">'+ v.pos_name +'</option>');
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

    $('#btnAdd').click(function(e) {
        $('#tboHid').val('add');
        tmp.clear();
        tmp.auto_gen_id();
        tmp.get_jungwat();
        tmp.get_status();
        tmp.get_depart();
        tmp.get_position();
        tmp.mdl_show();
    });

    $('#btnCancel').click(function() {
        tmp.mdl_hide();
    });

    $('#btnSave').click(function() {
        var url = 'employee/set_employee',
            params = {
                id: $('#tboId').val(),
                cid: $('#tboCid').val(),
                name: $('#tboName').val(),
                addr: $('#tboAddr').val(),
                jungwat: $('#tboJungwat').val(),
                amphur: $('#tboAmphur').val(),
                tumbon: $('#tboTumbon').val(),
                post: $('#tboPost').val(),
                phone: $('#tboPhone').val(),
                email: $('#tboEmail').val(),
                salary: $('#tboSalary').val(),
                begin: $('#tboBegin').val(),
                status: $('#tboStatus').val(),
                depart: $('#tboDepart').val(),
                position: $('#tboPosition').val(),
                opt: $('#tboHid').val()
            };
        if(params.name != '' && params.phone != '' && params.salary != '' && params.begin != '' && params.status != '' && params.depart != '' && params.position != '') {
            app.ajax(url, { data: params }, function(err, data) {
                if(data != null) {
                    app.alert(data.msg);
                    if(data.success)
                        tmp.get_list();
                    tmp.mdl_hide();
                } else {
                    app.alert(err);
                }
            });
        } else {
            app.alert('กรุณากรอกข้อมูลให้สมบูรณ์');
        }
    });

    $(document).on('click', 'a[data-name="btnEdit"]', function(err, data) {
        $('#tboHid').val('edit');
        tmp.clear();
        tmp.get_jungwat();
        tmp.get_status();
        tmp.get_depart();
        tmp.get_position();
        tmp.mdl_show();
    });

    tmp.get_list();
});