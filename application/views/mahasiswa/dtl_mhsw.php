<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <section class="content-header">
   <div class="container-fluid">
                 <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">

                <h5 style="font-size:30px">Detail Proyek</h5>

              <div class="col-8">
              </div>
              <div class="col-sm-2">
              <button id="lengkapi" data-toggle="modal" data-toggle="modal" data-target="#modal-default" class="btn btn-block btn-success" > Upload File</button></div>
              </div>
            </div>
              <div class="card-body">
                <div class ="row">
               <div class="col-sm-6">
                <div class="form-group">
                  
                    <label >Judul Proyek</label>
                    <input type="text" style ="border:none" class="form-control" id="exampleInputEmail1" placeholder="Judul Proyek" readonly>
                  </div>
                </div>
                <div class="col-sm-1">
                </div>
                <div class="col-sm-5">
                <div class="form-group">
                  
                    <label >Dosen Pembimbing</label>
                    <input type="text" style ="border:none" class="form-control" id="exampleInputEmail1" placeholder="Dosen Pembimbing" readonly>
                  </div>
                </div>
              </div>
              <div class ="row">
                <div class="col-sm-6">
                   <div class="form-group">
                   
                    <label>Abstrak</label>
                    <textarea class="form-control" style ="border:none" rows="3" placeholder="Abstrak" readonly></textarea>
                  </div>
                </div>
<div class="col-sm-1">
                </div>
                <div class="col-sm-5">
                <div class="form-group">
                  
                    <label >Dosen Penguji</label>
                    <input type="text" style ="border:none"  class="form-control" id="exampleInputEmail1" placeholder="Dosen Penguji" readonly>
                  </div>
                </div>
              </div>
              <div class ="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    
                    <label>Latar Belakang</label>
                    <textarea class="form-control" style ="border:none" rows="3" placeholder="Latar Belakang" readonly></textarea>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    
                    <label>Identifikasi Masalah</label>
                    <textarea class="form-control" style ="border:none" rows="3" placeholder="Identifikasi Masalah" readonly></textarea readonly>
                  </div>
                </div>
                <div class="col-sm-1">
                </div>
                <div class="col-sm-3">
                <div class="form-group">
                  
                    <label >Tanggal Sidang</label>
                    <input type="date" style ="border:none" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Sidang" readonly>
                  </div>
                </div>
                <div class="col-sm-2">
                <div class="form-group">
                  
                    <label >Ruangan</label>
                    <input type="text" style ="border:none" class="form-control" id="exampleInputEmail1" placeholder="Ruangan" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    
                    <label>Daftar Pustaka</label>
                    <textarea class="form-control" style ="border:none" rows="3" placeholder="Daftar Pustaka" readonly></textarea>
                  </div>
                </div>
                <div class="col-sm-1">
                </div>
                <div class="col-sm-2">
                <div class="form-group">
                  
                    <label >Nilai</label>
                    <input type="text" style ="border:none" class="form-control" id="exampleInputEmail1" placeholder="Nilai" readonly>
                  </div>
                </div>
                <div class="col-sm-3">
                <div class="form-group">
                  
                    <label >Status Nilai</label>
                    <input type="text"style ="border:none" class="form-control" id="exampleInputEmail1" placeholder="Status" readonly>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
</section>

    <!-- Main content -->


    <!-- /.content -->
  </div>
  <?php $this->load->view('common/footer'); ?>
  <script>
  	$(function(){
  		$("#save").click(function(){
  			$('#modal-default').modal('toggle');
  			Swal.fire('Success', 'File Uploaded ', 'success');
  		});
      $('#timepicker').datetimepicker({
      format: 'LT'
    });

  	});
  </script>
        <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-default">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title">Upload File</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


            <!-- general form elements -->


              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                    </div>
                  </div>

                </div>
                <!-- /.card-body -->


              </form>



            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="save" type="button" class="btn btn-primary">Upload</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
