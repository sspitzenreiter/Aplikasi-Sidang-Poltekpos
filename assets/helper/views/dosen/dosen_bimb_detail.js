var bimb_table = $('#data-bimbingan').DataTable({
    "ajax": {
      "type":"GET",
      "url":window.location.href+":Data",
      "dataSrc": function(json){
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
        var fd = new FormData();
        fd.append('id_bimbingan', data.id_bimbingan);
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
    });
});