var id_proyek = "";
var judul_proyek = "";
var dsn_table = $('#data-dosen').DataTable({
    "ajax": {
        "type":"GET",
        "url":window.location.href+":Data",
        "dataSrc": function(json){
        var dump = JSON.parse(JSON.stringify(json));
        if(dump.data!=null){
            if(dump.data.length>0){
            id_proyek = dump.extras.id_proyek;
            judul_proyek = dump.extras.judul_proyek;
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
        {"data": "nik", title:"NIK"},
        {"data": "nama", title:"Nama"},
        {"render":
        function(data, type, row, meta){
            return "<a href='https://"+row.link_jurnal+"'>"+row.judul_jurnal+"</a>";
        }, title:"Jurnal"
        },
        {"data": "research_interest", title:"Research Interest"},
        {"data": "total_pembimbing", title:"Total Anak Bimbingan"},
        {
        "render":
        function (data, type, row, meta){
            var maks_anak = row.maks_anak;
            if(maks_anak-parseInt(maks_anak)>=0.5){
                maks_anak = parseInt(maks_anak)+1;
            }
            if(parseInt(row.total_pembimbing) < parseInt(maks_anak)){
                return "<button class='btn btn-block btn-default' id='pilih_dosen'>Pilih Dosen</button>";
            }else{
                return "<button class='btn btn-block btn-warning' id='pilih_dosen_error'>Pilih Dosen</button>";
            }
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
    "order": [[ 5, 'asc' ]],
    "dom":'t<"bottom"p>'
});
  
dsn_table.on( 'order.dt search.dt', function () {
    dsn_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();

function pilih_pembimbing(nik){
    var fd = new FormData();
    fd.append('id_dosen_pembimbing', nik);
    fd.append('id_proyek', id_proyek);
    $.ajax({
      url:window.location.href+":Update",
      type:'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
        if(JSON.parse(response).status=="success"){
            $.redirect(window.location.href+":Sukses", {link:document.referrer, notification:response});
        }else{
            alert_toast(response);
        }
      }
    }); 
}

$(function(){
    $("#data-dosen tbody").on('click', '#pilih_dosen', function(){
        var data = dsn_table.row( $(this).parents('tr') ).data();
        var notif_config = {
            title:"Anda yakin memilih "+data.nama+" ini sebagai pembimbing?",
            message:"Judul Proposal : "+judul_proyek,
            status:"question",
            yes_text:"Ya",
            no_text:"Tidak",
            function_call:"pilih_pembimbing",
            param:data.nik,
            type:"confirmation"
          };
          alert_toast(JSON.stringify(notif_config));
    });

    $("#data-dosen tbody").on('click', '#pilih_dosen_error', function(){
        var data = dsn_table.row( $(this).parents('tr') ).data();
        var notif_config = {
            title:"Dosen Ini tidak bisa dipilih",
            message:"Kebanyakan Anak bimbingan dengan total : "+data.total_pembimbing,
            status:"warning",
            type:"normal"
          };
          alert_toast(JSON.stringify(notif_config));
    });

    $("#button-placement").html('<button id="button_kembali" type="button" class="btn btn-block btn-default btn-sm"><i class="fa fa-backspace"></i> Back</button>');

    $("#button_kembali").click(function(){
    window.history.back();
    });
});