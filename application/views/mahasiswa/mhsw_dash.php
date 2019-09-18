<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
                 <div class="col-md-5">
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

                      <td><button id="edit" data-toggle="modal" data-target="#modal1" type="button" class="btn btn-block btn-success"> IKUTI</button></td>
                    </tr>
                     <tr>
                      <td>2.</td>
                      <td>SP Proyek 2</td>
                      <td>12/02/2019</td>

                      <td><button id="edit" data-toggle="modal" data-target="#modal1" type="button" class="btn btn-block btn-success"> IKUTI</button></td>
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
<?php
foreach($data_mahasiswa->result() as $row){ ?>
<section class="col-lg-12 connectedSortable">
   <div class="container-fluid">
                 <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">

                <h5 style="font-size:30px">Profile</h5>

              <div class="col-9">
              </div>
              <div class="col-sm-2">
              <button id="lengkapi" data-toggle="modal" data-target="#modal2" type="button" class="btn btn-block btn-success"> Lengkapi</button></div>
              </div>
            </div>
              <div class="card-body">
               <div class="row">
                  <div class="col-sm-2">
                <div class="form-group" >
                    <label >NPM</label>
                    <input style ="border:none" type="text" class="form-control" value ="<?php echo $row->npm; ?>" id="exampleInputEmail1" placeholder="NPM" readonly>
                  </div>
                </div>
                <div class ="col-sm-2">
              </div>
                <div class="col-sm-6">
                <div class="form-group">
                    <label >NAMA</label>
                    <input style ="border:none" type="text" class="form-control" value ="<?php echo $row->nama; ?>"id="exampleInputEmail1" placeholder="NONE" width="10px" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-sm-10">
                <div class="form-group">
                    <label >ALAMAT</label>
                    <input style ="border:none" type="text" class="form-control" value ="<?php echo $row->alamat; ?>"id="exampleInputEmail1" placeholder="NONE" width="10px" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                <div class="form-group" >
                    <label >Angkatan</label>
                    <input style ="border:none" type="text" class="form-control" value ="<?php echo $row->angkatan; ?>"id="exampleInputEmail1" placeholder="NONE" readonly>
                  </div>
                </div>
              </div>
                <div class="row">
                  <div class="col-sm-3">
                <div class="form-group" >
                    <label >Tempat Lahir</label>
                    <input style ="border:none" type="text" class="form-control" value ="<?php echo $row->tempat_lahir; ?>"id="exampleInputEmail1" placeholder="NONE" readonly>
                  </div>
                </div>
                 <div class="col-sm-3">
                <div class="form-group" >
                    <label >Tanggal Lahir</label>
                    <input style ="border:none" type="date" class="form-control" value ="<?php echo $row->tgl_lahir; ?>"id="exampleInputEmail1" placeholder="NONE" readonly>
                  </div>
                </div>
                </div>
            </div>
            </div>
          </div>
        </div>
</section>
<?php } ?>

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
