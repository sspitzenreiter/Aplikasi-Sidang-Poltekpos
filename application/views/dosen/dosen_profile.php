<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <div class="content-header">
<?php $row = $data_dosen->row(); ?>
      <section class="col-lg-12 connectedSortable">
         <div class="container-fluid">
                 <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">

                <h5 style="font-size:30px">Profile</h5>

              <div class="col-7">
              </div>
              <div class="col-sm-2">
              <button id="lengkapi" data-toggle="modal" data-target="#modal2" type="button" class="btn btn-block btn-success"> Lengkapi</button></div>
              <div class="col-sm-2">
              <button id="lengkapi" data-toggle="modal" data-target="#modal1" type="button" class="btn btn-block btn-success"> Ganti Password</button></div>
              </div>
            </div>
              <div class="card-body">
               <div class="row">
                  <div class="col-sm-2">
                  <form id="form-profile-preview">
                <div class="form-group" >
                    <label >NIK</label><br>
                    <label  id="nik"><?php echo $row->nik; ?></label>
                  </div>
                </div>
                <div class ="col-sm-1">
              </div>
                <div class="col-sm-6">
                <div class="form-group">
                    <label >NAMA</label><br>
                    <label id="nama"><?php echo $row->nama; ?></label>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-sm-10">
                <div class="form-group">
                    <label >ALAMAT</label><br>
                    <label id="alamat" ><?php echo $row->alamat; ?></label>
                  </div>
                </div>
              </div>
              
                <div class="row">
                  <div class="col-sm-3">
                <div class="form-group" >
                    <label >Tempat Lahir</label><br>
                    <label id="tempat_lahir"><?php echo $row->tempat_lahir; ?></label>
                  </div>
                </div>
                 <div class="col-sm-3">
                <div class="form-group" >
                    <label >Tanggal Lahir</label><br>
                    <label id="tgl_lahir"><?php echo $row->tgl_lahir; ?></label>
                  </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-2">
                <div class="form-group" >
                    <label >Judul jurnal</label><br>
                    <label id="judul_jurnal"><?php echo $row->judul_jurnal; ?></label>
                  </div>

                </div>
                <div class="col-sm-2">
                <div class="form-group" >
                    <label >Link jurnal</label><br>
                    <label id="link_jurnal"><?php echo $row->link_jurnal; ?></label>
                  </div>
                  
                </div>
              </div>
              <div class="row">
              <div class="col-sm-2">
                <div class="form-group" >
                    <label >Research Interest</label><br>
                    <label id="research_interest"><?php echo $row->research_interest; ?></label>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </section>
</div>
</div>
<?php $this->load->view('common/footer'); ?>
    <script>
    
    </script>
 <?php
      foreach($data_dosen->result() as $row){ ?>
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
              <form id="form-profile">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group" >
                      <label >NIK</label>
                      <input  type="text" class="form-control" value="<?php echo $row->nik; ?>" name="nik" id="nik" placeholder="nik"  readonly>
                    </div>
                  </div>
                  <div class ="col-sm-2">
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label >NAMA</label>
                      <input  type="text" class="form-control" value="<?php echo $row->nama; ?>"name="nama" id="nama" placeholder="NONE" width="10px" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group">
                      <label >ALAMAT</label>
                      <input  type="text" class="form-control" value="<?php echo $row->alamat; ?>"name="alamat" id="alamat" placeholder="NONE" width="10px" >
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group" >
                      <label >Tempat Lahir</label>
                      <input  type="text" class="form-control" value="<?php echo $row->tempat_lahir; ?>" name="tempat_lahir" id="tempat_lahir" placeholder="NONE" >
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group" >
                      <label >Tanggal Lahir</label>
                      <input  type="date" class="form-control" value="<?php echo $row->tgl_lahir; ?>"name="tgl_lahir" placeholder="NONE" id="tgl_lahir" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group" >
                      <label >Judul Jurnal</label>
                      <input  type="text" class="form-control" value="<?php echo $row->judul_jurnal; ?>"name="judul_jurnal" placeholder="NONE" id="judul_jurnal">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group" >
                      <label >Link Jurnal</label>
                      <input  type="text" class="form-control" value="<?php echo $row->link_jurnal; ?>"name="link_jurnal" placeholder="NONE" id="link_jurnal">
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-sm-8">
                    <div class="form-group" >
                      <label >Research Interest</label>
                      <input  type="text" class="form-control" value="<?php echo $row->research_interest; ?>"name="research_interest" placeholder="NONE" id="research_interest">
                    </div>
                  </div>
                </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="save" type="button" class="btn btn-primary" value="Update">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>

     <?php } ?>
<div class="modal fade" id="modal1">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title">Change Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                    <div class="form-group">
                      <label >New Password</label>
                      <input  type="text" class="form-control" name="txt_namamahasiswa" placeholder="NONE" width="10px" >
                    </div>
                  <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="save" type="submit" class="btn btn-primary" value="Update">Save changes</button>
            </div>
            </div>
          </div>
        </div>
</div>