$(function(){
    $('#login').on('click', function(){
        var fd = form_data('form-login');
        $.ajax({
            url:window.location.href+"/validasi",
            type:'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                var data = JSON.parse(response);
                $.redirect(window.location.href+"/set_session", {'id_user':data.data[0].id_user, 'jabatan':data.data[0].jabatan});
            }
        });
    });
});