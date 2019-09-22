var id_kegiatan = "";
var dsn_table = $('#data-dosen').DataTable({
  "ajax": {
    "type":"GET",
    "url":window.location.href+":Data",
    "dataSrc": function(json){
      var dump = JSON.parse(JSON.stringify(json));
      if(dump.data!=null){
        if(dump.data.length>0){
          id_kegiatan = dump.extras.id_kegiatan;
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
    {
      "render":
      function (data, type, row, meta){
        return "<button class='btn btn-block btn-default' id='pilih_dosen'>Pilih Dosen</button>";
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

dsn_table.on( 'order.dt search.dt', function () {
    dsn_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();

$("#dsn_search").on('keyup', function(){
  dsn_table.search( this.value ).draw();
});

$("#button-placement").html('<button id="button_kembali" type="button" class="btn btn-block btn-default btn-sm"><i class="fa fa-backspace"></i> Back</button>');

$("#button_kembali").click(function(){
  window.history.back();
});

$("#data-dosen tbody").on('click', '#pilih_dosen', function(){
  var data = dsn_table.row( $(this).parents('tr') ).data();
  var notif_config = {
    message:"Anda yakin mau memilih "+data.nama+" sebagai koor?",
    title:"Umm..",
    status:"question",
    yes_text:"Ya",
    no_text:"Tidak",
    function_call:"pilih_koor",
    param:'{"nik":"'+data.nik+'"}',
    type:"confirmation"
  };
  alert_toast(JSON.stringify(notif_config));
});

function pilih_koor(data){
  var isi = JSON.parse(data);
  var fd = new FormData();
  fd.append('id_koordinator', isi.nik);
  fd.append('id_kegiatan', id_kegiatan);
  $.ajax({
    url:window.location.href+":Insert",
    type:'post',
    data: fd,
    contentType: false,
    processData: false,
    success: function(response){
      if(JSON.parse(response).status=="success"){
        $.redirect(document.referrer, {notification:JSON.parse(response)});
      }else{
        alert_toast(response);
      }
    }
  });
}
