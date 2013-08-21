/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 15/8/2556 23:34 น..
 */ 
$(function() {
    var tmp = {
        get_list: function() {
            app.ajax('depart/get_list', {}, function(err, data) {
                $('#tblMain > tbody').empty();
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tblMain > tbody').append(
                                '<tr>' +
                                    '<td>'+ v.dep_id +'</td>' +
                                    '<td>'+ v.dep_name +'</td>' +
                                    '<td width="100">' +
                                    '<div class="btn-group pull-right">' +
                                    '<a class="btn btn-info btn-sm" title="แก้ไขข้อมูล" data-name="btnEdit" data-value="'+ v.dep_id +'"><i class="icon-pencil"></i></a>' +
                                    '<a class="btn btn-danger btn-sm" title="ลบข้อมูล" data-name="btnDelete" data-value="'+ v.dep_id +'"><i class="icon-trash"></i></a>' +
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
        get_depart: function(id) {
            app.ajax('depart/get_depart', { id: id }, function(err, data) {
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        var v = data.rows[0];
                        $('#tboName').val(v.dep_name);
                    }
                } else {
                    app.alert(err);
                }
            });
        },
        mdl_show: function() {
            $('#mdlMain').modal('show');
        },
        mdl_hide: function() {
            $('#mdlMain').modal('hide');
        }
    };

    $('#btnAdd').click(function(e) {
        $('#tboHid').val('add');
        $('#tboName').val('');
        tmp.mdl_show();
    });

    $('#btnSave').click(function(e) {
        var url = 'depart/set_depart',
            params = {
                id: $('#tboId').val(),
                name: $('#tboName').val(),
                opt: $('#tboHid').val()
            };
        if(params.name != '') {
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
            app.alert('กรุณากรอกข้อมูลให้ครบด้วย');
        }
    });

    $(document).on('click', 'a[data-name="btnEdit"]', function(e) {
        var id = $(this).attr('data-value');
        $('#tboHid').val('edit');
        $('#tboId').val(id);
        tmp.get_depart(id);
        tmp.mdl_show();
    });

    $(document).on('click', 'a[data-name="btnDelete"]', function(e) {
        var id = $(this).attr('data-value');
        if(app.confirm('ยืนยันการลบข้อมูล', function(cb) {
            if(cb) {
                app.ajax('depart/set_remove', { id: id }, function(err, data) {
                    if(data != null) {
                        tmp.get_list();
                    } else {
                        app.alert(err);
                    }
                });
            }
        }));

    });

    tmp.get_list();
});