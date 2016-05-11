  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">

    <!-- BEGIN PAGE TITLE -->
    <div class="page-title dash">
      <h3>Profil</h3>
    </div>
    <!-- END OF PAGE TITLE -->

    <!-- BEGIN BREADCRUMB -->
    <ol class="breadcrumb dash">
      <li><a href="#">Halaman Utama</a></li>
      <li><a href="#">Profil</a></li>
      <li class="active">Profil User</li>
    </ol>
    <!-- END OF BREADCRUMB -->

    <div class="row">
      <!-- BEGIN PORTLET -->
      <div class="col-md-12">
        <div class="portlet box red">
          <!-- PORTLET TITLE -->
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-user"></i>Profil User
            </div>
          </div>
          <!-- END PORTLET TITLE -->
          <!-- PORTLET BODY -->
          <div class="portlet-body form">
            <!-- BEGIN FORM -->
            <form class="form-horizontal" role="form" method="POST" action="<?=base_url()?>P/Admin/update_profil/">
              <div class="form-body">
                <div class="form-group">
                  <label class="col-md-2 control-label">ID</label>
                  <div class="col-md-2">
                    <input type="text" class="form-control dash login-input" name="id" value="<?=$profil['id']?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Nama</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control dash" name="nama" value="<?=$profil['nama']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Instansi</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control dash" name="instansi" value="<?=$profil['instansi']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Jurusan</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control dash" name="jurusan" value="<?=$profil['jurusan']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Jenis</label>
                  <div class="col-md-4">
                    <select class="form-control " name="id_jenis" required>
                      <?php foreach ($jenis as $jen) : ?>
                        <option value="<?=$jen['id']?>" <?=($jen['id'] === $profil['id_jenis'])?'selected':''?>> <?=strtoupper($jen['jenis'])?> (<?=$jen['durasi']?> Bulan)</option>
                      <?php endforeach; ?>
                   </select>
                 </div>
               </div>

               <div class="form-group">
                <label class="col-md-2 control-label">Alamat</label>
                <div class="col-md-4">
                  <textarea class="form-control dash" name="alamat" ><?=$profil['alamat']?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Email</label>
                <div class="col-md-4">
                  <input type="email" class="form-control dash" name="email" value="<?=$profil['email']?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">HP</label>
                <div class="col-md-4">
                  <input type="text" class="form-control dash" name="hp" value="<?=$profil['hp']?>">
                </div>
              </div>

              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-2 col-md-9">
                    <input type="submit" class="btn btn-primary" name="btn" value="Submit">
                    <button type="button" class="btn btn-danger">Batal</button>
                  </div>
                </div>
              </div>
            </form>
            <!-- END FORM -->
          </div>
          <!-- END PORTLET BODY -->
        </div>
      </div>
      <!-- END OF PORTLET -->
    </div>
    <!-- END OF ROW -->
  </div>
  <!-- END OF CONTENT -->
</div>
<!-- END OF PAGE -->
