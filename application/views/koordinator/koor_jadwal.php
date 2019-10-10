<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penjadwalan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('koordinator/index'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Penjadwalan</li>
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
                <table class="table" id="data-jadwal">
                  <thead>
                    
                  </thead>
                  <tbody>
                    
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
  <script>
  
  </script>
        <div class="modal fade" id="modal-jadwal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title">Form Jadwal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" id="form-jadwal">
                <div class="card-body">
                  <div class="form-group">
                    <label>Dosen Penguji</label>
                    <select class="form-control select2" style="width: 100%;" id="dosen-penguji" name="id_dosen_penguji">
                      
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Sidang</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                         <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="date" class="form-control float-right" id="tgl_sidang" name="tgl_sidang">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Waktu</label>
                    <input type="text" class="form-control timemask" placeholder="Waktu" data-mask>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ruangan</label>
                    <input type="text" class="form-control" id="ruangan" name="ruangan" placeholder="Ruangan">
                  </div>
                </div>
              </form>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="save" type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
