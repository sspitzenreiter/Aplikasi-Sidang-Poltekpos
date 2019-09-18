<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Daftar Dosen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/index'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Dosen</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              	<div class="col-md-2">
                   <button id="tolol" data-toggle="modal" data-target="#modal-file" type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> ADD</button>
               </div>

                <div class="card-tools">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>NPM</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Angkatan</th>
                      <th>Tempat & Tanggal Lahir</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!isset($data_mahasiswa)){
                      ?>
                      <tr>
                        <td colspan="7" align="center" style="background-color:#ffffff;">Data tidak bisa dimuat</td>
                      </tr>
                      <?php
                    }else{
                    foreach($data_mahasiswa->result() as $row){ ?>
                    <tr>
                      <td>1.</td>
                      <td><?=$row->npm?></td>
                      <td><?=$row->nama?></td>
                      <td><?=$row->alamat?></td>
                      <td><?=$row->angkatan?></td>
                      <td><?=$row->tempat_lahir.','.$row->tgl_lahir?></td>
                      <td><button id="edit" data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-block btn-warning"> EDIT</button>
                      <button id="delete"  type="button" class="btn btn-block btn-danger"> DELETE</button></td>
                    </tr>
                    <?php }} ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php $this->load->view('common/footer');?>



    <div class="modal fade" id="modal-file">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Upload File</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="inputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="file">
                  <label class="custom-file-label" id="file-label" for="file">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-default" id="button_download_format"><i class="fa fa-file-excel"></i> Format</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="button_upload" type="button" class="btn btn-primary" disabled>Upload</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


  <script>
  	$(function(){
  		$("#save").click(function(){
  			$('#modal-default').modal('toggle');
  			Swal.fire('Success', 'Data Submitted ', 'success');
  		});
  		$("#delete").click(function(){
        alert_toast('{"title":"Coba", "text":"Mau Delete?", "status":"warning","yes_text":"Ya", "no_text":"No", "function_call":"cobain", "type":"confirmation"}');
  			//Swal.fire('Success', 'Data Deleted', 'success');
  		});
      $('#button_upload').click(function(){
        var filename = document.getElementById('file-label').innerHTML;
        alert_toast('{"title":"Apakah File Sudah Benar?", "message":"Nama File : '+filename+'", "status":"question","yes_text":"Ya", "no_text":"Tidak", "function_call":"upload_data", "type":"confirmation"}');
      });
      $('input[type=file]').change(function(e){
        var filename = e.target.files[0].name;
        document.getElementById('file-label').innerHTML=filename;
        document.getElementById('button_upload').disabled=false;
      });
  	});

    $('#button_download_format').click(function(){
      document.location = '<?=base_url('Admin/download_format_excel')?>';
    });

    function cobain(){
      Swal.fire('Sukses', 'Data Berhasil Dihapus', 'success');
    }

    function upload_data(){
      var fd = new FormData();
      var files = $('#file')[0].files[0];
      fd.append('file', files);
      alert_toast('{"type":"loading", "message":"Loading..."}');
      $.ajax({url:'<?=base_url('Admin/upload_data_excel')?>', type:'post', data: fd, contentType: false, processData: false, success: function(response){
        alert_toast(response);
        if(JSON.parse(response).status=="success"){
          $('#modal-file').modal('toggle');
          document.getElementById('file').value=null;
          document.getElementById('file-label').innerHTML="Choose File";
        }
        document.getElementById('button_upload').disabled=true;
      }});
    }

    <?php if(isset($error_message)){ ?>
      var error = JSON.parse('<?=str_replace("'", "", $error_message)?>');
      alert_toast('{"title":"Aww..", "message":"Data tidak bisa diambil, Error yang didapat : '+error.message+' ('+error.code+')", "type":"normal", "status":"error"}');
    <?php } ?>
  </script>
