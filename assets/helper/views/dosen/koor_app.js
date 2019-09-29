var approval_table = $('#data-approval').DataTable({
    "ajax": {
      "type":"POST",
      "url":window.location.href+"/Data",
      "dataSrc": function(json){
        return json.data;
      }
    },
    "columns": [
      {"render":function(data, type, row, meta){return '';}, title:"#", "orderable":false},
      {"data": "judul_proyek", title:"Judul Proyek"},
      {"data": "nama_kegiatan",title:"Kegiatan"},
      {"render":
        function(data, type, row, meta){
          return '<button type="button" class="btn btn-default" id="btn-approve">Approve</button><button type="button" class="btn btn-default" id="btn-tolak">Tolak</button>';
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

  approval_table.on( 'order.dt search.dt', function () {
    approval_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    });
  }).draw();

  function proyek_tolak(id){
    var fd = new FormData();
    fd.append('id_proyek', id);
    $.ajax({
        url:window.location.href+"/Tolak",
        type:'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response){
          alert_toast(response);
          if(JSON.parse(response).status=="success"){
            approval_table.ajax.reload();
            
          }
        }
      });
  }

$(function(){    
      $("#data-approval tbody").on('click', '#btn-approve', function(){
        var data = approval_table.row( $(this).parents('tr') ).data();
        $.redirect(window.location.href+"/PilihPembimbing", {id_proyek:data.id_proyek, judul_proyek:data.judul_proyek});
      });

      $("#data-approval tbody").on('click', '#btn-tolak', function(){
        var data = approval_table.row( $(this).parents('tr') ).data();
        var notif_config = {
            title:"Anda yakin mau menolak proposal ini?",
            message:"Judul Proposal : "+data.judul_proyek,
            status:"question",
            yes_text:"Ya",
            no_text:"Tidak",
            function_call:"proyek_tolak",
            param:data.id_proyek,
            type:"confirmation"
          };
          alert_toast(JSON.stringify(notif_config));
      });
});