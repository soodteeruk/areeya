/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 12/8/2556 23:29 น..
 */ 
$(function() {
    var tmp = {
        get_list: function() {
            app.ajax('store/get_list', {}, function(err, data) {
                $('#tblMain > tbody').empty();
                if(data != null && _.size(data.rows) > 0) {
                    _.each(data.rows, function(v) {
                        $('#tblMain >tbody').append(
                            '<tr>' +
                                '<td>'+ v.str_id +'</td>' +
                                '<td>'+ v.str_name +'</td>' +
                                '<td>'+ v.str_addr +'</td>' +
                                '<td width="100">' +
                                '<div class="btn-group pull-right">' +
                                '<a class="btn btn-info btn-sm" title="แก้ไขข้อมูล" data-name="btnEdit" data-value="'+ v.str_id +'"><i class="icon-pencil"></i></a>' +
                                '<a class="btn btn-danger btn-sm" title="ลบข้อมูล" data-name="btnDelete" data-value="'+ v.str_id +'"><i class="icon-trash"></i></a>' +
                                '</div>' +
                                '</td>' +
                            '</tr>'
                        );
                    });
                } else {
                    app.alert(err);
                }
            });
        },
        clear: function() {
            $('#tboId').val('');
            $('#tboName').val('');
            $('#tboAddr').val('');
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
        tmp.clear();
        tmp.mdl_show();
    });

    $('#btnSave').click(function(e) {
        var url = 'store/set_store',
            params = {
                id: $('#tboId').val(),
                name: $('#tboName').val(),
                addr: $('#tboAddr').val(),
                opt: $('#tboHid').val()
            };

        if(params.name != '' && params.addr != '') {
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
            app.alert('กรุณากรอกข้อมูลให้ครบด้วย !');
        }
    });

    $(document).on('click', 'a[data-name="btnEdit"]', function(e) {
        e.preventDefault();
        $('#tboHid').val('edit');
        $('#tboId').val($(this).attr('data-value'));
        app.ajax('store/get_store_detail', { id:$('#tboId').val() }, function(err, data) {
            if(data != null) {
                var v = data.rows[0];
                $('#tboName').val(v.str_name);
                $('#tboAddr').val(v.str_addr);
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
                app.ajax('store/set_store_remove', { id: id }, function(err, data) {
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

    tmp.get_list();
});