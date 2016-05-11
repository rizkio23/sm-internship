    <!-- BEGIN CONTENT -->
    <div class="page-wrapper">

      <!-- BEGIN PAGE TITLE -->
      <div class="page-title dash">
        <h3>Profil</h3>
      </div>
      <!-- END OF PAGE TITLE -->
      <div class="row">
        <!-- BEGIN PORTLET -->
        <div class="col-md-4 col-xs-12">
          <!-- PROFILE OVERVIEW -->
          <div class="profile-overview">
            <div class="portlet light profile-overview-portlet">
              <div class="profile-picture">
                <img src="<?php echo base_url()?>Documents/<?=$biodata['id_user']?>/<?=$biodata['foto']?>" class="img-responsive">
              </div>
              <div class="profile-basic-info">
                <div class="profile-basic-info name"><?=$biodata['nama']?></div>
                <div class="profile-usermenu">
                  <table class="table table-striped">
                    <tr>
                      <td width="100"><i class="fa fa-lg fa-male"></i></td>
                      <td style="text-align:left"><?=($biodata['jk']==1)?'Laki-laki':'Perempuan'?></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-lg fa-graduation-cap"></i></td>
                      <td style="text-align:left"><?=$biodata['instansi']?></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-lg fa-birthday-cake"></i></td>
                      <td style="text-align:left"><?=date('d F Y', strtotime($biodata['tgl_lahir']))?></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-lg fa-envelope-o"></i></td>
                      <td style="text-align:left"><?=$biodata['email']?></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-lg fa-phone"></i></td>
                      <td style="text-align:left"><?=$biodata['hp']?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- END PROFILE OVERVIEW -->
        </div>
        <!-- END OF PORTLET -->
        <div class="col-md-8 col-xs-12">
          <a class="dashboard-stat dashboard-stat-light green-jungle">
            <div class="visual">
              <i class="fa fa-check"></i>
            </div>
            <div class="details">
              <div class="number">
              Status
              </div>
              <div class="desc">
                Anda Telah Diterima !
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-8 col-xs-12 pull-right">
          <div class="portlet light">
            <div class="portlet-title">
              <div class="caption font-red-sunglo">
                <i class="fa fa-lg fa-archive font-red-sunglo"></i>
                <span class="caption-subject bold uppercase"> Detail Magang</span>
              </div>
            </div>
            <div class="form body">
              <div class="table-scrollable">
                <table class="table table-borderless table-hover table-striped" style="font-size:12pt">

                  <tr>
                    <td style="width:10px"><i class="fa fa-lg fa-briefcase"></i></td>
                    <td style="width:20%">Unit Kerja</td>
                    <td>: <?=$magang['deskripsi']?></td>
                  </tr>
                  <tr>
                    <td style="width:10px"><i class="fa fa-lg fa-car"></i></td>
                    <td style="width:20%">Lokasi</td>
                    <td>: unknown</td>
                  </tr>
                  <tr>
                    <td style="width:10px"><i class="fa fa-lg fa-male"></i></td>
                    <td style="width:20%">Pembina</td>
                    <td>: <?=$magang['pembina']?></td>
                  </tr>
                  <tr>
                    <td style="width:10px"><i class="fa fa-lg fa-calendar"></i></td>
                    <td style="width:20%">Waktu Magang</td>
                    <td>: <?=date('F Y', strtotime($magang['bulan_pengajuan']))?> <b>s/d</b> <?=date('F Y', strtotime("+ $magang[durasi] Months", strtotime($magang['bulan_pengajuan'])))?></td>
                  </tr>

                </table>
                </div>
            </div>
          </div>
        </div>

        <div class="col-md-8 col-xs-12 pull-right">
          <div class="portlet light">
            <div class="portlet-title">
              <div class="caption font-red-sunglo">
                <i class="fa fa-lg fa-archive font-red-sunglo"></i>
                <span class="caption-subject bold uppercase"> Berkas</span>
              </div>
            </div>
            <div class="form body">
              <div class="portlet box red-flamingo">
                <div class="portlet-title">
                  <div class="caption" style="font-size:14px">
                    <i class="fa fa-exclamation"></i>Berkas yang perlu diunduh
                  </div>
                </div>
                <div class="portlet-body">
                  <div class="table-scrollable">
                    <table class="table table-borderless table-hover table-striped">
                      <tr>
                        <td class="center">1.</td>
                        <td style="padding-left:30px">ID Card Peserta</td>
                        <td class="center"><a href="<?=base_url()?>p/pdf/idcard?id=<?=$biodata['id']?>" target="_blank" class="btn btn-xs yellow-lemon"><i class="fa fa-download"></i> Unduh</a></td>
                      </tr>
                      <?php $no=2; foreach($dokumen as $data): ?>
                      <tr>
                        <td class="center"><?=$no++?>.</td>
                        <td style="padding-left:30px"><?=$data['nama']?></td>
                        <td class="center">
                          <a href="<?=base_url()?>download/dokumen?fname=<?=$data['file']?>&ref=<?=password_hash(date('dmYh'), PASSWORD_BCRYPT)?>" class="btn btn-xs yellow-lemon">
                            <i class="fa fa-download"></i> Unduh
                          </a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </table>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <a href="<?php echo base_url().'dashboard/berkas_member';?>"><button class="btn btn-primary pull-right">Kembali</button></a>                              
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
