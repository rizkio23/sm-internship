  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">

    <!-- BEGIN PAGE TITLE -->
    <div class="page-title dash">
      <h3>Profil</h3>
    </div> 
    <!-- END OF PAGE TITLE -->

    <!-- BEGIN BREADCRUMB -->
    <ol class="breadcrumb dash">
      <li><a href="<?php echo base_url().'dashboard/insight';?>">Halaman Utama</a></li>
      <li class="active">Profil</li>
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
              <!-- Input Text -->
              <div class="form-group">
                <label class="col-md-2 control-label">NIK</label>
                <div class="col-md-4">
                  <input type="text" class="form-control dash" name="nip" value="<?=$profil['nip']?>" placeholder="NIK" disabled>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Nama</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" value="<?=$profil['nama']?>" name="nama" placeholder="Nama">
                </div>
              </div>      

              <div class="form-group">
                <label class="col-md-2 control-label">Unit Kerja</label>
                <div class="col-md-5">
                  <select class="form-control" name="id_unitkerja">
                    <?php foreach($unit as $key):?>
                      <option value="<?=$key['id']?>" <?php echo ($key['id']===$profil['id_unitkerja'])?'selected':'' ?> ><?=$key['deskripsi']?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Jabatan</label>
                <div class="col-md-4">
                  <input type="text" class="form-control dash" value="<?=$profil['jabatan']?>" name="jabatan" >
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-2 control-label">Nomor HP</label>
                <div class="col-md-4">
                  <input type="text" class="form-control dash" value="<?=$profil['hp']?>" name="hp" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Alamat</label>
                <div class="col-md-4">
                  <textarea class="form-control dash" name="alamat" ><?=$profil['alamat']?></textarea>
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