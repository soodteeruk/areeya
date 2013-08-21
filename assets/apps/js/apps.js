/**
 * Created by SAIRAT on 30/7/2556.
 */
var base_url = 'http://localhost/areeya/',
    site_url = 'http://localhost/areeya/';

var app = {
    alert: function(msg, title){
        if(!title){
            title = 'Messages';
        }

        $("#freeow").freeow(title, msg, {
            //classes: ["gray", "error"],
            classes: ["gray"],
            prepend: false,
            autoHide: true
        });
    },
    ajax: function(url, params, cb){

        params.csrf_token = csrf_token;

        //app.show_loading();

        try{
            $.ajax({
                url: site_url + url,
                type: 'POST',
                dataType: 'json',

                data: params,

                success: function(data){
                    if(data.success){

                        if(data){
                            cb(null, data);
                        }else{
                            cb('Record not found.', null);
                        }

                        //app.hide_loading();

                    }else{
                        cb(data.msg, null);
                        //app.hide_loading();
                    }
                },

                error: function(xhr, status){
                    cb('Error: [' + xhr.status + '] ' + xhr.statusText, null);
                    //app.hide_loading();
                }
            });
        }catch(err){
            cb(err, null);
        }
    },
    confirm: function(msg, cb){
        if(confirm(msg))
            cb(true);
        cb(false);
    },
    set_first_selected: function(obj){
        $(obj).removeAttr('selected').find('option:first').attr('selected', 'selected');
    },
    show_loading: function(){
        $.blockUI({
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: 1,
                color: '#fff'
            },
            message: '<h4>Loading <img src="' + base_url + 'assets/apps/img/ajax-loader-fb.gif" alt="loading."> </h4>'
        });
    },

    hide_loading: function(){
        $.unblockUI();
    }
};

$(function() {
    $('.date').datepicker({
        language: 'th'
    }) .on('changeDate', function(e){
        var y = e.date.getFullYear(),
            _m = e.date.getMonth() + 1,
            m = (_m > 9 ? _m : '0'+_m),
            _d = e.date.getDate(),
            d = (_d > 9 ? _d : '0'+_d);
        $(this).text(y + '-' + m + '-' + d);
    });
});