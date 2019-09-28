$(function(){
  setContentView();
  function setContentView(){
    $.ajax({
      url:window.location.href+"/Data",
      type:'get',
      contentType: false,
      processData: false,
      success: function(response){
        var data = JSON.parse(response);
        if(data.col_config!=""){
          $('#content-data').load(window.location.href+"/Content", {content:data.col_config}, function(){
            setContentData(data.col_config);
          });
        }
      }
    }); 
  }
  
  function setContentData(config){
    var fd = new FormData();
    fd.append('config', config);
    if(config=="detail"){
      $.ajax({
        url:window.location.href+"/Data:Proyek",
        type:'POST',
        data:fd,
        contentType: false,
        processData: false,
        success: function(response){
          var data = JSON.parse(response);
          switch(data.data[0].status){
            case "0": data.data[0].status="Belum Diterima"; break;
            case "1": data.data[0].status="Diterima"; break;
          }
          form_setter(data.data);
        }
      });
    }else{
      var kegiatan_table = $('#data-kegiatan').DataTable({
        "ajax": {
          "type":"POST",
          "data":{
            "config":config
          },
          "url":window.location.href+"/Data:Proyek",
          "dataSrc": function(json){
            return json.data;
          }
        },
        "columns": [
          {"render":function(data, type, row, meta){return '';}, title:"#", "orderable":false},
          {"data": "nama_kegiatan",title:"Kegiatan"},
          {"render":
            function(data, type, row, meta){
              return date_converter(row.tgl_mulai)+"-"+date_converter(row.tgl_selesai);
            }, title:"Tanggal Kegiatan"
          },
          {"data": "prodi", title:"Program Studi"},
          {"render":
            function(data, type, row, meta){
              return '<button type="button" class="btn btn-default" id="btn-pilih-kegiatan">Ikuti</button>';
            }, title:"Aksi"
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
  
      kegiatan_table.on( 'order.dt search.dt', function () {
        kegiatan_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
      }).draw();

      var id_kegiatan = "";
      $("#data-kegiatan tbody").on('click', '#btn-pilih-kegiatan', function(){
        var data = kegiatan_table.row( $(this).parents('tr') ).data();
        id_kegiatan = data.id_kegiatan;
        $("#modal-pilih-kegiatan").modal('toggle');
      });
      $("#modal-pilih-kegiatan").on('click', '#save-pilih-kegiatan', function(){
        $("#modal-pilih-kegiatan").modal('toggle');
        var fd = form_data('form-pilih-kegiatan');
        fd.append('id_kegiatan', id_kegiatan);
        id_kegiatan = "";
        $.ajax({
          url:window.location.href+"/Insert",
          type:'POST',
          data:fd,
          contentType: false,
          processData: false,
          success: function(response){
            var data = JSON.parse(response);
            alert_toast(response);
            if(data.status=="success"){
              setContentView();
            }
          },error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
            alert(xhr.responseText);
          }
        });
      });
    }
  }
});