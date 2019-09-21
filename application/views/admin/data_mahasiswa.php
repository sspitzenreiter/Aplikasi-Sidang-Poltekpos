<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Daftar Mahasiswa</h1>
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

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                     <button data-toggle="modal" data-target="#modal-file" type="button" class="btn btn-block btn-primary btn-sm"><i class="fa fa-plus"></i> ADD</button>
                  </div>
                  <div class="col-md-7"></div>
                  <div class="col-md-3 text-right">
                    <div class="input-group">
                      <input type="text" id="mhs_search" class="form-control form-control-sm">
                      <div class="input-group-append">
                        <button class="btn btn-default btn-sm" disabled><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <table class="table" id="data-mahasiswa">
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
