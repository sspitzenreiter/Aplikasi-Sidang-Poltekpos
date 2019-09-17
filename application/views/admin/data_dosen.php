<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Daftar Dosen</h1>
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
              	<div class="col-md-2">
                   <button id="tolol" data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> ADD</button>
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
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Judul Jurnal</th>
                      <th>Link jurnal</th>
                      <th>Research Interest</th>
                      <th style="width: 50px">Action</th>
                      <th style="width: 50px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>1221132412</td>
                      <td>
                        Tia
                      </td>
                      <td>Sumedang</td>
                      <td>12/2/1968</td>
                      <td>Jl beceek......</td>
                      <td>Komputer Segalanya</td>
                      <td>https://jurnal.com</td>
                      <td>Iot</td>
                      <td><button id="edit" data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-block btn-warning"> EDIT</button>
                      </td>
                      <td><button id="delete"  type="button" class="btn btn-block btn-danger"> DELETE</button></td>
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
  		$("#save").click(function(){
  			$('#modal-default').modal('toggle');
  			Swal.fire('Success', 'Data Submitted ', 'success');
  		});
  		$("#delete").click(function(){
        alert_toast('{"title":"Coba", "text":"Mau Delete?", "status":"warning","yes_text":"Ya", "no_text":"No", "function_call":"cobain", "type":"confirmation"}');
  			//Swal.fire('Success', 'Data Deleted', 'success');
  		});
  	});
    
    function cobain(){
      Swal.fire('Sukses', 'Data Berhasil Dihapus', 'success');
    }
  </script>
        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title">Form Dosen</h4>
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
                    <label for="exampleInputEmail1">NIK</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Kegiatan">
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Tempat Lahir">
                  </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" class="form-control float-right" id="reservation">
                  </div>
                  <!-- /.input group -->
                </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Alamat">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul Jurnal</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Judul Jurnal">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Link Jurnal</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Link Jurnal">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Research Interest</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Research Interest">
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
