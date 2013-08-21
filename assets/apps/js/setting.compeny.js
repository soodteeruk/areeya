/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 26/7/2556 17:37 น.
 */
$(function() {
    var tmp = {
        mdl_show: function() {
            $('#mdlMain').modal('show');
        },
        mdl_hide: function() {
            $('#mdlMain').modal('hide');
        },
        get_list: function() {
            app.ajax('compeny/get_list', {}, function(err, data) {
                $('#tblMain > tbody').empty();
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tblMain > tbody').append(
                                '<tr>' +
                                    '<td width="150">'+ v.com_id +'</td>' +
                                    '<td>'+ v.com_name +'</td>' +
                                    '<td>'+ v.com_begin +'</td>' +
                                    '<td>'+ v.com_phone +'</td>' +
                                    '<td>'+ v.com_fax +'</td>' +
                                    '<td>'+ v.com_email +'</td>' +
                                    '<td width="130">' +
                                    '<div class="btn-group pull-right">' +
                                    '<a class="btn btn-primary btn-sm" title="เลือกข้อมูล" data-name="btnSelect" data-value="'+ v.com_id +'"><i class="icon-ok-sign"></i></a>' +
                                    '<a class="btn btn-info btn-sm" title="แก้ไขข้อมูล" data-name="btnEdit" data-value="'+ v.com_id +'"><i class="icon-pencil"></i></a>' +
                                    '<a class="btn btn-danger btn-sm" title="ลบข้อมูล" data-name="btnDelete" data-value="'+ v.com_id +'"><i class="icon-trash"></i></a>' +
                                    '</div>' +
                                    '</td>' +
                                    '</tr>'
                            );
                        });
                    }
                }
            });
        },
        clear: function() {
            $('#tboId').val('');
            $('#tboName').val('');
        },
        get_edit_group: function(id) {
            app.ajax('boq/get_edit_group', { id: id }, function(err, data) {
                if(data != null) {
                    var d = data.rows[0];
                    $('#tboId').val(d.bgp_id);
                    $('#tboName').val(d.bgp_name);
                } else {
                    app.alert('ไม่พบข้อมูลที่ต้องการแก้ไข');
                    app.mdl_hide();
                }
            });
        }
    };

    $('#btnAdd').click(function(e) {
        $('#tboHid').val('add');
        $("#tboId").removeAttr('readonly');
        tmp.clear();
        tmp.mdl_show();
    });

    $('#btnSave').click(function(e) {
        var params = {
                id: $('#tboId').val(),
                name: $('#tboName').val(),
                opt: $('#tboHid').val()
            },
            url = 'boq/set_boq_group';

        if(params.name != '' && params.id != '') {
            app.ajax(url, { data: params }, function(err, data) {
                if(data != null) {
                    if(data.success) {
                        app.alert('บันทึกข้อมูลแล้ว');
                        tmp.mdl_hide();
                        tmp.get_list();
                    } else {
                        app.alert(data.msg);
                    }
                } else {
                    app.alert(err);
                }
            });
        } else {
            app.alert('กรุณากรอกข้อมูลให้ครบด้วย !');
        }
    });

    $(document).on('click', 'a[data-name="btnEdit"]', function(e) {
        var id = $(this).attr('data-value');
        $('#tboHid').val('edit');
        $("#tboId").attr('readonly','readonly');
        tmp.clear();
        tmp.get_edit_group(id);
        tmp.mdl_show();
    });

    $(document).on('click', 'a[data-name="btnDelete"]', function(e) {
        var id = $(this).attr('data-value');
        app.confirm('ยืนยันการลบข้อมูล', function(cb) {
            if(cb) {
                app.ajax('boq/set_remove_group', { id: id }, function(err, data) {
                    if(data != null) {
                        app.alert(data.msg);
                        tmp.mdl_hide();
                        tmp.get_list();
                    } else {
                        app.alert(err);
                    }
                });
            }
        });
    });

    $(document).on('click', 'a[data-name="btnSelect"]', function(e) {
        var id = $(this).attr('data-value');
        app.ajax('compeny/select', { id: id }, function(err, data) {
            if(data != null) {
                appp.alert(data.msg);
            } else {
                app.alert(err);
            }
        });
    });

    tmp.get_list();
});