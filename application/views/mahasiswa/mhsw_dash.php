<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
                 <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Kegiatan</h3>


              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Kegiatan</th>
                      <th>Tanggal</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Proyek 3</td>
                      <td>12/02/2019</td>

                      <td><button id="edit" data-toggle="modal" data-target="#modal-lg" type="button" class="btn btn-block btn-success"> IKUTI</button></td>
                    </tr>
                     <tr>
                      <td>2.</td>
                      <td>SP Proyek 2</td>
                      <td>12/02/2019</td>

                      <td><button id="edit" data-toggle="modal" data-target="#modal-lg" type="button" class="btn btn-block btn-success"> IKUTI</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->


    <!-- /.content -->
  </div>
  <?php $this->load->view('common/footer'); ?>
  <script>
  	$(function(){
  		$("#save").click(function(){
  			$('#modal-lg').modal('toggle');
  			Swal.fire('Success', 'Data Submitted ', 'success');
  		});
      $('#timepicker').datetimepicker({
      format: 'LT'
    });

  	});
  </script>
        <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title">Form Pengajuan Proposal</h4>
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
                    <label>Select Disabled</label>
                    <select class="form-control" disabled>
                      <option>Proyek 3</option>

                    </select>
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul Proyek</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Judul Proyek">
                  </div>
                   <div class="form-group">
                    <label>Abstrak</label>
                    <textarea class="form-control" rows="3" placeholder="Abstrak"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Latar Belakang</label>
                    <textarea class="form-control" rows="3" placeholder="Latar Belakang"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Identifikasi Masalah</label>
                    <textarea class="form-control" rows="3" placeholder="Identifikasi Masalah"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Daftar Pustaka</label>
                    <textarea class="form-control" rows="3" placeholder="Daftar Pustaka"></textarea>
                  </div>

                </div>
                <!-- /.card-body -->


              </form>



            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="save" type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
