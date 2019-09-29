<?php $this->load->view('common/header'); ?>
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bimbingan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('mahasiswa/index'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Bimbingan</li>
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
                   <button id="tolol"  type="button" class="btn btn-block btn-primary"> SIDANG</button>
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
                      <th>Tanggal Bimbingan</th>
                      <th>Pembahasan</th>
                      <th>Approval Dosen</th>
                      <th style="width: 50px">Action</th>
                      <th style="width: 50px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>
                        15/02/2019
                      </td>
                      <td>Membahas rancangan database</td>
                      <td>Belum di Approved</td>
                      <td><button id="delete"  type="button" class="btn btn-block btn-primary"> APPROVE</button></td>
                    </tr>

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
  	$(function(){
  		
  		$("#delete").click(function(){

  			Swal.fire('Success', 'Data Approved', 'success');
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