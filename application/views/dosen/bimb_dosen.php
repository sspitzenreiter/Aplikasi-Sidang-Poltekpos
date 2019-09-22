<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

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

                      <td><a href="<?php echo base_url('Dosen/detil_bimbingan'); ?>"><button id="edit" data-toggle="modal" data-target="#modal1" type="button" class="btn btn-block btn-success"> Tampilkan</button></td></a>
                    </tr>
                     <tr>
                      <td>2.</td>
                      <td>SP Proyek 2</td>
                      <td>Sistem Informasi Komputerisasi</td>

                      <td><a href="<?php echo base_url('Dosen/detil_bimbingan'); ?>"><button id="edit" data-toggle="modal" data-target="#modal1" type="button" class="btn btn-block btn-success"> Tampilkan</button></td></a>
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
    
<?php $this->load->view('common/footer'); ?>
