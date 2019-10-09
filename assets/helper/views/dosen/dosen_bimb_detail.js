var bimb_table = $('#data-bimbingan').DataTable({
    "ajax": {
      "type":"POST",
      "data":function(d){
          d.opsi_tampil = $('#opsi-tampil').children('option:selected').val();
      },
      "url":window.location.href+":Data",
      "dataSrc": function(json){
        activate_tombol_sidang(json.total_bimbingan);
        return json.data;
      }
    },
    "columns": [
      {"render":function(data, type, row, meta){return '';}, title:"#", "orderable":false},
      {"data": "tgl_bimbingan", title:"Tanggal Bimbingan"},
      {"data": "keterangan", title:"Pembahasan"},
      {"render":
        function(data, type, row, meta){
            if(row.status_bimbingan=="0"){
                return "<button class='btn btn-primary' id='approve'>Approve</button>";
            }else{
                return "Sudah Diapprove";
            }
        }, title:"Status Approval"
      }
    ],
    "paging": true,
    "scrollX": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": false,
    "responsive":true,
    "autoWidth": false,
    "order": [[ 1, 'asc' ]],
    "dom":'t<"bottom"p>'
  });
  
  bimb_table.on( 'order.dt search.dt', function () {
      bimb_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
      });
  }).draw();

$(function(){
    $("#data-bimbingan tbody").on('click', '#approve', function(){
        var data = bimb_table.row( $(this).parents('tr') ).data();
        var fd = {id_bimbingan:data.id_bimbingan, id_proyek:data.id_proyek};
        var notif_config = {
            title:"Approve Bimbingan?",
            message:"Yang sudah di approve tidak bisa di cancel",
            status:"question",
            yes_text:"Ya",
            no_text:"Tidak",
            function_call:"approve_bimbingan",
            param:fd,
            type:"confirmation"
          };
        alert_toast(JSON.stringify(notif_config));
    });
    $('#opsi-tampil').on('change', function(){
        bimb_table.ajax.reload();
    });
});
function approve_bimbingan(data){
    var fd = new FormData();
    for ( var key in data ) {
        fd.append(key, data[key]);
    }

    $.ajax({
        url:window.location.href+":Approve",
        data:fd,
        type:'POST',
        contentType: false,
        processData: false,
        success: function(response){
            var result = JSON.parse(response);
            if(result.status=="success"){
                bimb_table.ajax.reload();
            }
            alert_toast(response);
        }
    });
}
function activate_tombol_sidang(total){
    var tombol_sidang = $('#button-sidang');
    if(total>=8){
        $('#button-sidang').on('click', function(){
            $.redirect(window.location.href+":Sidang", {total_bimbingan:total});
        });
        tombol_sidang.prop('disabled', false);
    }else{
        tombol_sidang.prop('disabled', true);
    }
}