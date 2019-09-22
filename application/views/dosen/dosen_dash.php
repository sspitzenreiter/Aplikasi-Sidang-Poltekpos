<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

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

                      <td><a href="<?php echo base_url('Dosen/detil_proyek'); ?>"><button id="edit"  type="button" class="btn btn-block btn-success"> Tampilkan</button></td></a>
                    </tr>
                     <tr>
                      <td>2.</td>
                      <td>SP Proyek 2</td>
                      <td>Sistem Informasi Komputerisasi</td>

                      <td><a href="<?php echo base_url('Dosen/detil_proyek'); ?>"><button id="edit"  type="button" class="btn btn-block btn-success"> Tampilkan</button></td></a>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
  </div>
         -- /.container-fluid -->
    
<?php $this->load->view('common/footer');?>
    <!-- Main content -->

    