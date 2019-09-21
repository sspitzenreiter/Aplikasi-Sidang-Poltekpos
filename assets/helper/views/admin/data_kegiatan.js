$(function(){
  var kegiatan_table = $('#data-kegiatan').DataTable({
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
      {"data": "nama_kegiatan", title:"#"},
      {"data": "nama_kegiatan",title:"Kegiatan"},
      {"render":
        function(data, type, row, meta){
          return date_converter(row.tgl_mulai)+"-"+date_converter(row.tgl_selesai);
        }, title:"Tanggal Kegiatan"
      },
      {"data": "id_koordinator", title:"Koordinator"},
      {"data": "angkatan", title:"Tahun Ajaran"},
      {"data": "semester", title:"Semester"},
      {"data": "prodi", title:"Program Studi"},
      {"render":
        function(data, type, row, meta){
          switch(row.status){
            case "0": return "Belum Dimulai"; break;
            case "1": return "Berjalan"; break;
            case "2": return "Selesai"; break;
          }
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
    "order": [[ 0, 'asc' ]],
    "dom":'t<"bottom"p>'
  });

  kegiatan_table.on( 'order.dt search.dt', function () {
      kegiatan_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
      } );
  }).draw();

  $("#kegiatan_search").on('keyup', function(){
    kegiatan_table.search( this.value ).draw();
  });

  $("#save").click(function(){
    var fd = new FormData();
    var data = {
      nama_kegiatan: document.getElementById('nama_kegiatan').value,
      tgl_mulai: document.getElementById('tgl_mulai').value,
      tgl_selesai: document.getElementById('tgl_selesai').value,
      semester: document.getElementById('semester').value,
      angkatan: document.getElementById('angkatan').value,
      prodi: document.getElementById('prodi').value
    };

    for(var key in data){
      fd.append(key, data[key]);
    }

    $.ajax({
      url:window.location.href+"/Insert",
      type:'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
        alert_toast(response);
        if(JSON.parse(response).status=="success"){
          $('#modal-kegiatan').modal('toggle');
          //kegiatan_table.ajax.reload();
        }
        document.getElementById('save').disabled=true;
      }
    });
  });
  $("#delete").click(function(){
    Swal.fire('Success', 'Data Deleted', 'success');
  });

});
