function alert_toast(value){
  var alert_config = JSON.parse(value);
  if(alert_config.type=="top-end"){
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({type:alert_config.status, title:alert_config.message});
  }else if(alert_config.type=="confirmation"){
    Swal.fire({
      title: alert_config.title,
      text: alert_config.message,
      type: alert_config.status,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: alert_config.yes_text,
      cancelButtonText: alert_config.no_text
    }).then((result) => {
      if (result.value) {
        if(alert_config.param!=null){
          window[alert_config.function_call](alert_config.param);
        }else{
          window[alert_config.function_call]();
        }
      }
    });
  }else if(alert_config.type=="loading"){
    Swal.fire({
      title:alert_config.message,
      allowOutsideClick: false,
      onBeforeOpen: ()=>{
        Swal.showLoading()
      }
    });
  }else{
    Swal.fire({type:alert_config.status, title:alert_config.title, text:alert_config.message});
  }
}

function date_converter(tanggal){
  var bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
  var date = new Date(tanggal);
  return date.getDate()+" "+bulan[date.getMonth()]+" "+date.getFullYear()
}

function form_data(form_id){
  var data = $('#'+form_id).serializeArray();
  var fd = new FormData();
  $.each(data, function(i, field){
    fd.append(field.name, field.value);
  });
  return fd;
}
$(function(){
  $(".select2").select2({
    theme:"bootstrap"
  });
  $('[data-mask]').inputmask();
  $('.timemask').inputmask('23:59', {
    definitions:{
      '2': {
        validator: "[0-2]",
        cardinality:1
      },
      '3':{
        validator: "[0-3]",
        cardinality:1
      },
      '5':{
        validator: "[0-5]",
        cardinality:1
      }
    }, placeholder:'12:00'
  });
});
function form_setter(data){
  if(data instanceof FormData){
    var temp = {};
    data.forEach(function(value, key){
      temp[key] = value;
    });
    $.each(temp, function (key, val) {
      if($('#'+key).length){
        $('#'+key).val(val);
      }
    });
  }else{
    $.each(data, function (i) {
      $.each(data[i], function (key, val) {
          if($('#'+key).length){
            $('#'+key).val(val);
          }
      });
    });
  }
}

function text_setter(data, type){
  if(data instanceof FormData){
    var temp = {};
    data.forEach(function(value, key){
      temp[key] = value;
    });
    $.each(temp, function (key, val) {
      if($('#'+key).length){
        if(type=="form"){
          $('#'+key).val(val);
        }else if(type=="text"){
          $('#'+key).html(val);
        }
      }
    });
  }else{
    $.each(data, function (i) {
      $.each(data[i], function (key, val) {
          if(type=="form"){
            $('#'+key).val(val);
          }else if(type=="text"){
            $('#'+key).html(val);
          }
      });
    });
  }
}

function form_clear(id){
  $("#"+id).find("input[type=text], textarea, input[type=password], input[type=date]").val("");

}

function base_url(sub_url){
  return window.location.protocol+"//"+window.location.host+"/"+window.location.pathname.split('/')[1]+"/"+sub_url;
}