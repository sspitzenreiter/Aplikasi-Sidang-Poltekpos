<?php $this->load->view('common/header'); ?>
  <div class="content-wrapper">
    <div class="content-header">
    <?php $row = $data_mahasiswa->row(); ?>
      <section class="col-lg-12 connectedSortable">
        <div class="container-fluid">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h2>Profile</h2>
                  </div>
                  <div class="col-md-2">
                    <button id="lengkapi" data-toggle="modal" data-target="#modal2" type="button" class="btn btn-block btn-success"> Lengkapi</button>
                  </div>
                  <div class="col-md-2">
                    <button id="lengkapi" data-toggle="modal" data-target="#modal1" type="button" class="btn btn-block btn-success"> Ganti Password</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
              <form id="form-profile-preview">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group" >
                      <label >NPM</label>
                      <input style ="border:none" type="text" class="form-control" value ="<?php echo $row->npm; ?>" id="npm" placeholder="NPM" readonly>
                    </div>
                  </div>
                  <div class ="col-sm-2"></div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label >NAMA</label>
                      <input style ="border:none" type="text" class="form-control" value ="<?php echo $row->nama; ?>"id="nama" placeholder="NONE" width="10px" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group">
                      <label >ALAMAT</label>
                      <input style ="border:none" type="text" class="form-control" value ="<?php echo $row->alamat; ?>"id="alamat" placeholder="NONE" width="10px" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group" >
                      <label >Angkatan</label>
                      <input style ="border:none" type="text" class="form-control" value ="<?php echo $row->angkatan; ?>"id="angkatan" placeholder="NONE" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group" >
                      <label >Tempat Lahir</label>
                      <input style ="border:none" type="text" class="form-control" value ="<?php echo $row->tempat_lahir; ?>"id="tempat_lahir" placeholder="NONE" readonly>
                   </div>
                  </div>
                <div class="col-sm-3">
                  <div class="form-group" >
                    <label >Tanggal Lahir</label>
                    <input style ="border:none" type="date" class="form-control" value ="<?php echo $row->tgl_lahir; ?>"id="tgl_lahir" placeholder="NONE" readonly>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </section>
</div>
</div>
<?php $this->load->view('common/footer'); ?>

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
                      <label >NPM</label>
                      <input  type="text" class="form-control" value="<?php echo $row->npm; ?>" name="npm" placeholder="NPM"  readonly>
                    </div>
                  </div>
                  <div class ="col-sm-2">
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label >NAMA</label>
                      <input  type="text" class="form-control" value="<?php echo $row->nama; ?>"name="nama" placeholder="NONE" width="10px" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group">
                      <label >ALAMAT</label>
                      <input  type="text" class="form-control" value="<?php echo $row->alamat; ?>"name="alamat" placeholder="NONE" width="10px" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group" >
                      <label >Angkatan</label>
                      <input  type="text" class="form-control" value="<?php echo $row->angkatan; ?>"name="angkatan" placeholder="NONE" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group" >
                      <label >Tempat Lahir</label>
                      <input  type="text" class="form-control" value="<?php echo $row->tempat_lahir; ?>" name="tempat_lahir" placeholder="NONE" >
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group" >
                      <label >Tanggal Lahir</label>
                      <input  type="date" class="form-control" value="<?php echo $row->tgl_lahir; ?>"name="tgl_lahir" placeholder="NONE" >
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