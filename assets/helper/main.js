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
        window[alert_config.function_call]();
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
