<?php $this->load->view('common/header'); ?>
<div class="content-wrapper">
<section class="content-header">
   <div class="container-fluid">
                 <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">

                <h5 style="font-size:30px">Detail Proyek</h5>

              <div class="col-8">
              </div>
              
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
      
<?php $this->load->view('common/footer');?>