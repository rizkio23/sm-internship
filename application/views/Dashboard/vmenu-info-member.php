  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">

    <!-- BEGIN PAGE TITLE -->
    <div class="page-title dash">
      <h3>Info Member</h3>
    </div>
    <!-- END OF PAGE TITLE -->
    <div class="row">
      <!-- BEGIN PORTLET -->
      <div class="col-md-4 col-xs-12">
        <!-- PROFILE OVERVIEW -->
        <div class="profile-overview">
          <div class="portlet light profile-overview-portlet">
            <div class="profile-picture">
              <img src="<?php echo base_url()?>Documents/<?=$detail['id_user']?>/<?=$detail['foto']?>" class="img-responsive">
            </div>
            <div class="profile-basic-info">
              <div class="profile-basic-info name"><?=$detail['nama']?></div>
              <div class="profile-usermenu">
                <table class="table table-striped">
                  <tr>
                    <td width="100"><i class="fa fa-lg fa-male"></i></td>
                    <td style="text-align:left"><?=($detail['jk']==='1')?'Laki-laki':'Perempuan'?></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-lg fa-graduation-cap"></i></td>
                    <td style="text-align:left"><?=$detail['instansi']?></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-lg fa-birthday-cake"></i></td>
                    <td style="text-align:left"><?=date('d F Y', strtotime($detail['tgl_lahir']))?></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-lg fa-envelope-o"></i></td>
                    <td style="text-align:left"><?=$detail['email']?></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-lg fa-phone"></i></td>
                    <td style="text-align:left"><?=$detail['hp']?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- END PROFILE OVERVIEW -->
      </div>
      <!-- END OF PORTLET -->
      <div class="col-md-8 col-xs-12 pull-right">
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption font-red-sunglo">
              <i class="fa fa-lg fa-exclamation font-red-sunglo"></i>
              <span class="caption-subject bold uppercase"> Detail Informasi</span>
            </div>
          </div>
          <div class="form body">
            <div class="form-group form-md-line-input">
              <div class="input-icon">
                  <div class="form-control"><?=$detail['alamat']?></div>
                  <label for="form_control_1">Alamat</label>
                    <i class="fa fa-lg fa-map-marker"></i>
                </div>
            </div>
            <div class="form-group form-md-line-input">
              <div class="input-icon">
                    <div class="form-control"><?=$detail['jurusan']?></div>
                  <label for="form_control_1">Jurusan</label>
                    <i class="fa fa-lg fa-flask"></i>
                </div>
            </div>
            <div class="form-group form-md-line-input">
              <div class="input-icon">
                  <div class="form-control"><?=$detail['jenis']?></div>
                  <label for="form_control_1">Jenis</label>
                    <i class="fa fa-lg fa-institution"></i>
                </div>
            </div>
            <div class="form-group form-md-line-input">
              <div class="input-icon">
                  <div class="form-control"><?=ucwords($detail['tujuan'])?></div>
                  <label for="form_control_1">Tujuan</label>
                    <i class="fa fa-lg fa-rocket"></i>
                </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <a href="<?php echo base_url().'dashboard/member'; ?>"><button class="btn btn-primary pull-right">Kembali</button></a>                           
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END OF ROW -->
  </div>
  <!-- END OF CONTENT -->
</div>
<!-- END OF PAGE -->
