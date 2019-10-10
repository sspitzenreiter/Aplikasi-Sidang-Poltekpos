
var jadwal_table = $('#data-jadwal').DataTable({
    "ajax": {
      "type":"GET",
      "url":window.location.href+"/Data",
      "dataSrc": function(json){
        var dump = JSON.parse(JSON.stringify(json));
        if(dump.data!=null){
          if(dump.data.length>0){
            return json.data;
          }else{
            var alert_config = {
              type: "top-end",
              message: "Data Kosong",
              status: "warning"
            };
            alert_toast(JSON.stringify(alert_config));
            return '';
          }
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
      {"data": "judul_proyek",title:"Judul"},
      {"data":"nama_dosen_pembimbing", title: "Pembimbing"},
      {"data": "id_dosen_penguji", title:"Penguji"},
      {"data": "tgl_sidang", title:"Tanggal Sidang"},
      {"render":
        function(data, type, row, meta){
            return "<button class='btn btn-default' id='btn_buat_jadwal'>Buat Jadwal</button>"; 
        }, title:"Status"
      }
    ],
    "paging": true,
    "scrollX": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": false,
    "responsive":true,
    "order": [[ 1, 'asc' ]],
    "dom":'t<"bottom"p>'
  });
var id_proyek = "";
$(function(){
    $("#data-jadwal tbody").on('click', '#btn_buat_jadwal', function(){
        var data = jadwal_table.row( $(this).parents('tr') ).data();
        refresh_dosen(data.id_dosen_pembimbing);
        id_proyek = data.id_proyek;
        $('#modal-jadwal').modal('toggle');
    });
    $('#save').on('click', function(){
        var fd = form_data('form-jadwal');
        fd.append('id_proyek', id_proyek);
        tambah_jadwal(fd);
    });
});

function tambah_jadwal(fd){
    $.ajax({
        url:window.location.href+"/Jadwalkan",
        type:'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response){
          alert_toast(response);
          if(JSON.parse(response).status=="success"){
            $('#modal-jadwal').modal('toggle');
            jadwal_table.ajax.reload();
            form_clear('form-jadwal');
          }
        }
      });
}

function refresh_dosen(dosen_pembimbing){
    $("#dosen-penguji").empty();
    $.ajax({
      url:window.location.href+"/DataPenguji",
      type:'POST',
      data:{id_dosen_pembimbing:dosen_pembimbing},
      contentType: false,
      processData: false,
      success: function(response){
        var data = JSON.parse(response);
        if(data.data.length>0){
          $("#dosen-penguji").append('<option value = "" disabled selected>Pilih Dosen</option>');
          $.each(data.data, function(i){
            var row = data.data[i];
            $("#dosen-penguji").append('<option value = "'+row.nik+'">'+row.nama+'</option>');
          });
        }
      }
    });
}