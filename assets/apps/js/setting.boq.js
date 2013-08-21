/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 3/8/2556 0:53 น..
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
            app.ajax('boq/get_boq_group', {}, function(err, data) {
                $('#tblMain > tbody').empty();
                if(data != null) {
                    if(_.size(data.rows) > 0) {
                        _.each(data.rows, function(v) {
                            $('#tblMain > tbody').append(
                                '<tr>' +
                                    '<td width="150">'+ v.bgp_id +'</td>' +
                                    '<td>'+ v.bgp_name +'</td>' +
                                    '<td width="100">' +
                                    '<div class="btn-group pull-right">' +
                                    '<a class="btn btn-info btn-sm" title="แก้ไขข้อมูล" data-name="btnEdit" data-value="'+ v.bgp_id +'"><i class="icon-pencil"></i></a>' +
                                    '<a class="btn btn-danger btn-sm" title="ลบข้อมูล" data-name="btnDelete" data-value="'+ v.bgp_id +'"><i class="icon-trash"></i></a>' +
                                    '</div>' +
                                    '</td>' +
                                    '</tr>'
                            );
                        });
                    }
                } else {
                    app.alert(err);
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

    tmp.get_list();
});