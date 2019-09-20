<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
</section>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dash Dosen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('mahasiswa/index'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Dash Dosen</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content-header">
      <div class="container-fluid">
                 <div class="col-md-7">
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
                      <th ">Kegiatan</th>
                      <th ">Judul</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Proyek 3</td>
                      <td>Sistem Informasi Bajaj Online</td>

                      <td><button id="edit" data-toggle="modal" data-target="#modal1" type="button" class="btn btn-block btn-success"> Tampilkan</button></td>
                    </tr>
                     <tr>
                      <td>2.</td>
                      <td>SP Proyek 2</td>
                      <td>Sistem Informasi Komputerisasi</td>

                      <td><button id="edit" data-toggle="modal" data-target="#modal1" type="button" class="btn btn-block btn-success"> Tampilkan</button></td>
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
    

    <!-- Main content -->

    <section class="content">
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
                <div class="col-sm-2">
                <div class="form-group">
                  
                    <label >NPM</label>
                    <input type="text" style ="border:none" class="form-control" id="exampleInputEmail1" placeholder="NPM" readonly>
                  </div>
                </div>
                <div class="col-sm-3">
                <div class="form-group">
                  
                    <label >Nama</label>
                    <input type="text" style ="border:none" class="form-control" id="exampleInputEmail1" placeholder="Nama" readonly>
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
    <!-- /.content -->
  </div>
  <?php $this->load->view('common/footer');?>
  <script>
    $(function(){
      $("#save").click(function(){
        $('#modal-default').modal('toggle');
        Swal.fire('Success', 'Approved ', 'success');
      });
      $("#delete").click(function(){

        Swal.fire('Success', 'Data Deleted', 'success');
      });

    });
  </script>
        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title">Form Bimbingan</h4>
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
                    <label>Pembahasan</label>
                    <textarea class="form-control" rows="3" placeholder="Pembahasan"></textarea>
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
<?php $this->load->view('common/footer'); ?>
