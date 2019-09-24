$(function(){
  $("#save").click(function(){
    $('#modal-default').modal('toggle');
    Swal.fire('Success', 'Data Submitted ', 'success');
  });
  $("#delete").click(function(){
    var notif_config = {
      title:"Coba",
      text:"Mau Delete?",
      status:"warning",
      yes_text:"Ya",
      no_text:"Tidak",
      function_call:"cobain",
      type:"confirmation"
    };
    alert_toast(JSON.stringify(notif_config));
    //Swal.fire('Success', 'Data Deleted', 'success');
  });
  $('#button_upload').click(function(){
    var filename = document.getElementById('file-label').innerHTML;
    var notif_config = {
      title:"Apakah File Sudah Benar?",
      message:"Nama File : '"+filename+"'",
      status:"question",
      yes_text:"Ya",
      no_text:"Tidak",
      function_call:"upload_data",
      type:"confirmation"
    };
    alert_toast(JSON.stringify(notif_config));
  });
  $('input[type=file]').change(function(e){
    var filename = e.target.files[0].name;
    document.getElementById('file-label').innerHTML=filename;
    document.getElementById('button_upload').disabled=false;
  });

  
  $('#button_download_format').click(function(){
		document.location = window.location.href+"/Download";


  $('#button_download_format').on('click', function(){
    document.location = window.location.href+"/Download";

  });
});

var mhs_table = $('#data-mahasiswa').DataTable({
  "ajax": {
    "type":"GET",
    "url":window.location.href+"/Data",
    "dataSrc": function(json){
      var dump = JSON.parse(JSON.stringify(json));
      if(dump.data!=null){
        return json.data;
      }else if(dump.error_message!=null){
        var alert_config = {
          type: "normal",
          title: "Aww..",
          message: "Saat memanggil data, terdapat error : '"+dump.error_message.message+"' (Code : "+dump.error_message.code+")",
          status: "error"
        };
        alert_toast(JSON.stringify(alert_config));
        return '';
      }
    }
  },
  "columns": [
    {"render":function(data, type, row, meta){return '';}, title:"#", "orderable":false},
    {"data": "npm", title:"NPM"},
    {"data": "nama", title:"Nama"},
    {"data": "alamat", title:"Alamat"},
    {"data": "angkatan", title:"Angkatan"},
    {"data": "tempat_lahir", title:"Tempat Lahir"}
  ],
  "paging": true,
  "lengthChange": false,
  "scrollX": true,
  "searching": true,
  "ordering": true,
  "info": false,
  "responsive":true,
  "autoWidth": false,
  "order": [[ 1, 'asc' ]],
  "dom":'t<"bottom"p>'
});

mhs_table.on( 'order.dt search.dt', function () {
    mhs_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();

$("#mhs_search").on('keyup', function(){
  mhs_table.search( this.value ).draw();
});


function cobain(){
  Swal.fire('Sukses', 'Data Berhasil Dihapus', 'success');
}

function upload_data(){
  var fd = new FormData();
  var files = $('#file')[0].files[0];
  fd.append('file', files);
  var notif_config = {type:"loading", message:"Loading..."};
  alert_toast(JSON.stringify(notif_config));
  $.ajax({
    url:window.location.href+"/Upload",
    type:'post',
    data: fd,
    contentType: false,
    processData: false,
    success: function(response){
      alert_toast(response);
      if(JSON.parse(response).status=="success"){
        $('#modal-file').modal('toggle');
        document.getElementById('file').value=null;
        document.getElementById('file-label').innerHTML="Choose File";
        mhs_table.ajax.reload();
      }
      document.getElementById('button_upload').disabled=true;
    }
  });
}
