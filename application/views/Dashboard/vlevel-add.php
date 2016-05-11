<div class="page-wrapper">
  <div class="page-title dash">
    <h3>Master Level</h3>
  </div> 
  <ol class="breadcrumb dash">
    <li><a href="<?php echo base_url().'dashboard';?>">Halaman Utama</a></li>
    <li class="active">Master Level</li>
  </ol>
  <div class="row">
    <!-- BEGIN PORTLET -->
    <div class="col-md-7">
      <div class="portlet box blue">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-th-list"></i>Daftar Level
          </div>
        </div>
        <div class="portlet-body">
          <!-- BEGIN TABLE  -->
          <table class="table table-striped table-bordered table-hover">
            <thead>
             <tr>
               <th class="center">Level</th>
               <th class="center">Nama</th>
               <th class="center">Kategori</th>
               <th class="center">Deskripsi</th>
               <th class="center" width="200">Aksi</th>
             </tr>
           </thead>
           <?php foreach ($data as $key) : ?>
             <tr>
              <td class="center"><?=$key['level']?></td>
              <td class="center"><?=$key['nama']?></td>
              <td class="center"><?=$key['kategori'] ?></td>
              <td class="center"><?=$key['deskripsi']?></td>
              <td class="center">
              <?php if($key['level'] > 4): ?>
                <button href="" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                <a href="<?=base_url()?>p/role/level_delete?level=<?=$key['level']?>&ref=<?=password_hash('hapusLevel', PASSWORD_BCRYPT)?>">
                  <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i></button>
                </a>
              <?php endif; ?>
                <a href="<?=base_url()?>dashboard/hak_akses?level=<?=$key['level']?>&nama=<?=$key['nama']?>&ref=<?=password_hash('editHakAkses', PASSWORD_BCRYPT)?>">
                  <button class="btn btn-warning"><i class="fa fa-user"></i></button>
                </a>
              </td>
            </tr> 
          <?php endforeach; ?>
          </table> 
          <!-- END OF TABLE -->
        </div>
      </div>
    </div>
    <!-- END PORTLET -->
    <!-- BEGIN PORTLET -->
    <div class="col-md-5">
      <div class="portlet box red">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-plus"></i>Tambah Level
          </div>
        </div>
        <!-- BEGIN FORM -->
        <div class="portlet-body form">
          <form class="form-horizontal" role="form" method="POST" action="<?=base_url()?>p/role/level_add?ref=<?=password_hash('tambahLevel', PASSWORD_BCRYPT)?>">
            <div class="form-body">
              <div class="form-group">
                <label class="col-md-3 control-label">Level</label>
                <div class="col-md-2">
                  <input type="text" class="form-control login-input" style="text-alignment:center" name="level" placeholder="Level" value="<?=$next_level?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Nama</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                </div>
              </div>  
              <div class="form-group">
                <label class="col-md-3 control-label">Kategori</label>
                <div class="col-md-8">
                  <select class="form-control" name="kategori" required> 
                    <option value="super">Super Admin</option>
                    <option value="diklat">Diklat</option>
                    <option value="unit_kerja">Unit Kerja</option>
                    <option value="user">User</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Deskripsi</label>
                <div class="col-md-8">
                  <textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" required></textarea>
                </div>
              </div>      
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-8s">
                    <input type="submit" name="tb" class="btn btn-primary" value="add">
                    <button type="button" class="btn btn-danger">Batal</button>
                  </div>
                </div>
              </div>
            </div>  
          </form>
        </div>
        <!-- END OF FORM -->
      </div>
    </div>
    <!-- END PORTLET -->
  </div>
</div>
