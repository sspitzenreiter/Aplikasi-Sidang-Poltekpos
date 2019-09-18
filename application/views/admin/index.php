<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kegiatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/index'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Kegiatan</li>
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
                      <th>Kegiatan</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Dosen Koordinator</th>
                      <th>Tahun Ajaran</th>
                      <th>Semester</th>
                      <th>Prodi</th>
                      <th>Status</th>
                      <th style="width: 50px">Action</th>
                      <th style="width: 50px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Proyek 1</td>
                      <td>
                        15/02/2019
                      </td>
                      <td>15/03/2019</td>
                      
                      <td>Tia</td>
                      <td>2019/2020</td>
                      <td>2</td>
                      <td>D4 Teknik Informatika</td>
                      <td>Berjalan</td>
                      <td><button id="edit" data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-block btn-warning"> EDIT</button>
                      </td>
                      <td><button id="delete"  type="button" class="btn btn-block btn-danger"> DELETE</button></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Proyek 2</td>
                      <td>
                        15/02/2019
                      </td>
                      <td>15/03/2019</td>
                      <td>Upi</td>
                      <td>2018/2019</td>
                      <td>3</td>
                      <td>D4 Teknik Informatika</td>
                      <td>Selesai</td>
                      <td><button id="edit" data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-block btn-warning"> EDIT</button>
                      </td>
                      <td><button id="delete"  type="button" class="btn btn-block btn-danger"> DELETE</button></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Proyek 3</td>
                      <td>
                        15/02/2019
                      </td>
                      <td>15/03/2019</td>
                      <td>Bin</td>
                      <td>2017/2018</td>
                      <td>5</td>
                      <td>D4 Teknik Informatika</td>
                      <td>Berjalan</td>
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

  			Swal.fire('Success', 'Data Deleted', 'success');
  		});

  	});
  </script>
        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title">Form Kegiatan</h4>
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
                    <label for="exampleInputEmail1">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Kegiatan">
                  </div>
                <div class="form-group">
                  <label>Tanggal Mulai</label>

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
                  <label>Tanggal Selesai</label>

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
                  <label>Dosen Koordinator</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Tia</option>
                    <option>Upi</option>
                    <option>Bin</option>

                  </select>
                </div>
                  <div class="form-group">
                  <label>Tahun Ajaran</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">2016/2017</option>
                    <option>2017/2018</option>
                    <option>2019/2020</option>
                    <option>2020/2021</option>
                    <option>2021/2022</option>
                    <option>2022/2023</option>
                    <option>2023/2024</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Semester</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                  </select>
                </div>
                  <div class="form-group">
                  <label>Prodi</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">D4 Teknik Informatika</option>

                    <option>D3 Teknik Informatika</option>
                  </select>
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
