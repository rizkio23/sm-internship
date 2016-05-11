<div class="page-wrapper">

  <div class="page-title dash">
    <h3>Administrasi User</h3>
  </div>
  <ol class="breadcrumb dash">
    <li><a href="#">Halaman Utama</a></li>
    <li><a href="<?php echo base_url().'admin/dashboard/administrasi';?>">Administrasi User</a></li>
    <li class="active">Form Member</li>
  </ol>

  <div class="row">
    <div class="col-md-12">
      <!-- Begin Portlet -->
      <div class="portlet box red">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-plus"></i>Tambah Data
          </div>
        </div>
        <div class="portlet-body form">
          <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="<?=isset($detail)? base_url().'p/member/edit_member?id='.$id.'&ref='.password_hash('editMember', PASSWORD_BCRYPT) : base_url().'p/member/add_member?ref='.password_hash('tambahMember', PASSWORD_BCRYPT)?>">
            <div class="form-body">

              <div class="form-group">
                <label class="col-md-2 control-label">Nama</label>
                <div class="col-md-4">
                  <input type="text" class="form-control dash" name="nama" placeholder="Nama" value="<?=(isset($detail))?$detail['nama']:''?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Nomor Induk</label>
                <div class="col-md-4">
                  <input type="number" min="0" step="1" pattern="\d+" class="form-control dash" name="no_induk" placeholder="Nomor Induk" value="<?=(isset($detail))?$detail['no_induk']:''?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Alamat</label>
                <div class="col-md-4">
                  <textarea type="text" class="form-control dash" name="alamat" placeholder="Alamat" required><?=(isset($detail))?$detail['alamat']:''?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Jenis Kelamin</label>
                <div class="col-md-4">
                  <div class="radio-list">
                    <label class="radio-inline">
                      <input type="radio" value="1" name="jk" checked=""> Laki - laki </label>
                      <label class="radio-inline">
                        <input type="radio" name='jk' value="0" <?=(isset($detail) && $detail['jk']==0)?'checked':''?>> Perempuan </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">No. Handphone</label>
                    <div class="col-md-4">
                      <input type="number" min="0" step="1" pattern="\d+" class="form-control dash" maxlength="12" placeholder="08xxxxxxxxxx" name="hp" value="<?=(isset($detail))?$detail['hp']:''?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Tanggal Lahir</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control dash" id="datepicker" value="<?=(isset($detail))?date('d/m/Y', strtotime($detail['tgl_lahir'])):''?>" name="tgl_lahir" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Foto</label>
                    <div class="col-md-4">
                      <?php if(isset($detail)): ?>
                        <img class="img-thumbnail" width="120px" src="<?php echo base_url().'Documents/'.$detail['id_user'].'/'.$detail['foto'];?>">
                      <?php endif; ?>
                      <input type="file" name="foto" <?=(isset($detail))?'':'required'?>>
                      <span class="help-block">
                        file type .jpg, Max file 300kb, max size (1024 x 768 px).
                      </span>
                    </div>
                  </div>

                  <div class="form-actions">
                    <div class="row">
                      <div class="col-md-offset-2 col-md-9">
                        <?php if(isset($detail)): ?>
                          <?php if($detail['status']< 0): ?>
                            <input type="submit" class="btn btn-success" name="tb" value="Edit">
                          <?php endif; else: ?>
                            <input type="submit" class="btn btn-success" name="tb" value="Add">
                          <?php endif; ?>
                          <a href="<?php echo base_url().'dashboard/member';?>"><button type="button" class="btn btn-danger">Batal</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- end of form -->
          </div>
        </div>
      </div>
    </div>
