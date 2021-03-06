<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
          
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->


    <!-- /.content -->
  </div>
  <?php $this->load->view('common/footer'); ?>
  <script>
  	$(function(){
  		$("#save").click(function(){
  			$('#modal1').modal('toggle');
  			Swal.fire('Success', 'Data Submitted ', 'success');
  		});
      $("#saveprof").click(function(){

      });
      $('#timepicker').datetimepicker({
      format: 'LT'
    });

  	});
  </script>
        <div class="modal fade" id="modal1">
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
                    <label >Judul Proyek</label>
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
    </div>

    <?php
      foreach($data_mahasiswa->result() as $row){ ?>
    <div class="modal fade" id="modal2">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title">Profile</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('Mahasiswa/update') ?>" method="post">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group" >
                      <label >NPM</label>
                      <input  type="text" class="form-control" value="<?php echo $row->npm; ?>" name="txt_hidden" placeholder="NPM"  readonly>
                    </div>
                  </div>
                  <div class ="col-sm-2">
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label >NAMA</label>
                      <input  type="text" class="form-control" value="<?php echo $row->nama; ?>"name="txt_namamahasiswa" placeholder="NONE" width="10px" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group">
                      <label >ALAMAT</label>
                      <input  type="text" class="form-control" value="<?php echo $row->alamat; ?>"name="txt_alamatmahasiswa" placeholder="NONE" width="10px" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group" >
                      <label >Angkatan</label>
                      <input  type="text" class="form-control" value="<?php echo $row->angkatan; ?>"name="txt_angkatanmahasiswa" placeholder="NONE" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group" >
                      <label >Tempat Lahir</label>
                      <input  type="text" class="form-control" value="<?php echo $row->tempat_lahir; ?>" name="txt_tmptlhrmahasiswa" placeholder="NONE" >
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group" >
                      <label >Tanggal Lahir</label>
                      <input  type="date" class="form-control" value="<?php echo $row->tgl_lahir; ?>"name="txt_tgllhrmahasiswa" placeholder="NONE" >
                    </div>
                  </div>
                </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="saveprof" type="submit" class="btn btn-primary" value="Update">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>

     <?php } ?>
