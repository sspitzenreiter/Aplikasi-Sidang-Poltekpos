var dsn_table = $('#data-dosen').DataTable({
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
    {"data": "nik", title:"#"},
    {"data": "nik", title:"NIK"},
    {"data": "nama", title:"Nama"},
    {"render":
      function(data, type, row, meta){
        return row.tempat_lahir+", "+date_converter(row.tgl_lahir);
      }, title:"Tempat, Tanggal Lahir"
    },
    {"data": "alamat", title:"Alamat"},
    {"render":
      function(data, type, row, meta){
        return "<a href='https://"+row.link_jurnal+"'>"+row.judul_jurnal+"</a>";
      }, title:"Jurnal"
    },
    {"data": "research_interest", title:"Research Interest"}
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

dsn_table.on( 'order.dt search.dt', function () {
    dsn_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();

$("#dsn_search").on('keyup', function(){
  dsn_table.search( this.value ).draw();
});


$(function(){
  $("#save").click(function(){
      var fd = new FormData();
      var data = {
        nik:document.getElementById('nik').value,
        nama : document.getElementById('nama').value,
        tempat_lahir : document.getElementById('tempat_lahir').value,
        tgl_lahir : document.getElementById('tgl_lahir').value,
        alamat : document.getElementById('alamat').value,
        judul_jurnal : document.getElementById('judul_jurnal').value,
        link_jurnal : document.getElementById('link_jurnal').value,
        research_interest : document.getElementById('research_interest').value
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
            $('#modal-dosen').modal('toggle');
            dsn_table.ajax.reload();
          }
          document.getElementById('save').disabled=true;
        }
      });
  });
  $("#delete").click(function(){
    alert_toast('{"title":"Coba", "text":"Mau Delete?", "status":"warning","yes_text":"Ya", "no_text":"No", "function_call":"cobain", "type":"confirmation"}');
    //Swal.fire('Success', 'Data Deleted', 'success');
  });
});
