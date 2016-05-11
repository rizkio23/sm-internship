  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">

    <!-- BEGIN PAGE TITLE -->
    <div class="page-title dash">
      <h3>Detail Kelompok</h3>
    </div> 
    <!-- END OF PAGE TITLE -->
    <div class="row">
      <!-- BEGIN PORTLET -->
      <div class="col-md-6 col-xs-12 ">
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption font-red-sunglo">
              <i class="fa fa-lg fa-asterisk font-red-sunglo"></i>
              <span class="caption-subject bold uppercase">Biodata</span>
            </div>
          </div>
          <div class="form body">
            <div class="form-group form-md-line-input">
              <div class="input-icon">
                  <div class="form-control"><?=$biodata['id']?></div>
                  <label for="form_control_1">Nomor Pendaftaran</label>
                    <i class="fa fa-lg fa-calendar"></i>
                </div>
            </div>
            <div class="form-group form-md-line-input">
              <div class="input-icon">
                  <div class="form-control"><?=$biodata['bagian']?></div>
                  <label for="form_control_1">Bidang</label>
                    <i class="fa fa-lg fa-building"></i>
                </div>
            </div>
            <div class="form-group form-md-line-input">
              <div class="input-icon">
                  <label for="form_control_1" style="color:#888">Anggota Kelompok</label>
                  <?php foreach($anggota as $data): ?>
                  <table class="table table-borderless" style="margin-bottom:0px;">
                    <tr>
                      <td style="color:#888" width="30"><i class="fa fa-user"></i></td>
                      <td style="font-size:16px"><?=$data['nama']?></td>
                      <td width="30"><a href="<?=base_url()?>dashboard/info_member?id=<?=$data['id']?>" target="_blank"><span class="btn btn-xs blue-stripe">Detail</span></a></td>
                    </tr>
                  </table>
                  <?php endforeach; ?>
                </div>
            </div> 

            <div class="form-group form-md-line-input">
              <div class="input-icon">
                  <div class="form-control"><?=$biodata['instansi']?></div>
                  <label for="form_control_1">Instansi</label>
                    <i class="fa fa-lg fa-graduation-cap"></i>
                </div>
            </div>

            <div class="form-group form-md-line-input">
              <div class="input-icon">
                    <div class="form-control"><?=$biodata['jurusan']?></div>
                  <label for="form_control_1">Jurusan</label>
                    <i class="fa fa-lg fa-flask"></i>
                </div>
            </div>  

            <div class="row">
              <div class="col-md-6">
                <div class="form-group form-md-line-input">
                  <div class="input-icon">
                      <div class="form-control"><?=$biodata['jenis']?> (<?=$biodata['durasi']?> bulan)</div>
                      <label for="form_control_1">Jenis</label>
                        <i class="fa fa-lg fa-tags"></i>
                    </div>
                </div>              
              </div>
              <div class="col-md-6">
                <div class="form-group form-md-line-input">
                  <div class="input-icon">
                      <div class="form-control"><?=$biodata['tujuan']?></div>
                      <label for="form_control_1">Tujuan</label>
                        <i class="fa fa-lg fa-rocket"></i>
                    </div>
                </div>                            
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group form-md-line-input">
                  <div class="input-icon">
                      <div class="form-control" style="padding-left: 5px; border:transparent">
                      <?php
                        switch ($anggota[0]['status']) {
                          case '0':
                            echo "<span class='label label-danger'>Ditolak</span>";
                            break;
                          case '1':
                            echo "<span class='label label-success'>Menunggu</span>";
                            break;
                          case '2':
                            echo "<span class='label label-success'>Menunggu</span>";
                            break;
                          case '3':
                            echo "<span class='label label-success'>Diterima</span>";
                            break;
                          default:
                            # code...
                            break;
                        }
                      ?>
                      </div>
                      <label for="form_control_1">Status</label>
                    </div>
                </div>              
              </div>
              <div class="col-md-6">
                <div class="form-group form-md-line-input">
                  <div class="input-icon">
                      <div class="form-control" style="border:transparent;overflow:hidden">PRPOPOSAL.PDF</div>
                      <label for="form_control_1">Proposal</label>
                      <i class="fa fa-lg fa-file-text"></i>
                  </div>
                  <div class="input-icon">
                      <div><a href="<?=base_url()?>download/proposal/<?=$biodata['id'].'?ref='.PASSWORD_HASH(date('dmYh'), PASSWORD_BCRYPT)?>"><button class="btn btn-xs btn red-thunderbird btn-block btn-icon"><i class="fa fa-download"></i> Download</button></a></div>
                  </div>                  
                </div>                            
              </div>
            </div>
          </div>
        </div>       
      </div>
      <!-- END OF PORTLET -->

      <!-- BEGIN PORTLET -->
      <div class="col-md-6 col-xs-12 ">
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption font-red-sunglo">
              <i class="fa fa-lg fa-suitcase font-red-sunglo"></i>
              <span class="caption-subject bold uppercase"> Detail Magang</span>
            </div>
          </div>
          <div class="form body">

            <div class="form-group form-md-line-input">
              <div class="input-icon">
                    <div class="form-control"><?=date('F Y', strtotime($biodata['bulan_pengajuan']))?> s/d <?=date('F Y', strtotime("+ $biodata[durasi] Months", strtotime($biodata['bulan_pengajuan'])))?></div>
                  <label for="form_control_1">Durasi Magang</label>
                    <i class="fa fa-lg fa-calendar-o"></i>
                </div>
            </div>              
          </div>
        </div>
      </div>
      <!-- END OF PORTLET -->

      <!-- BEGIN PORTLET -->
      <div class="col-md-6 col-xs-12 ">
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption font-red-sunglo">
              <i class="fa fa-lg fa-desktop font-red-sunglo"></i>
              <span class="caption-subject bold uppercase"> Unit Kerja</span>
            </div>
          </div>
          <div class="form body">

            <div class="table-scrollable">
              <table class="table table-bordered table-striped"> 
                <thead>
                <?php
                  if (!empty($unit)) {
                   foreach($unit as $data):?>
                    <tr class="danger">
                    <td><?=$data['nama']?></td>
                    <td><?=$data['deskripsi']?></td>
                    <td><?=$data['pegawai']?></td>
                    </tr>
                <?php endforeach; }?>
                </thead>
                </tbody>
              </table>
            </div>              
          </div>
        </div>
      </div>
      <!-- END OF PORTLET -->

      <!-- BEGIN PORTLET -->
      <div class="col-md-6 col-xs-12 ">
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption font-red-sunglo">
              <i class="fa fa-lg fa-paper-plane font-red-sunglo"></i>
              <span class="caption-subject bold uppercase"> Notifikasi</span>
            </div>
          </div>
          <div class="form body">
            <form method="POST" action="<?=base_url()?>p/notifikasi/add">
              <div class="form-group form-md-line-input">
                <div class="input-icon">
                    <input type="hidden" name="penerima" value="<?=$biodata['id']?>">
                    <textarea name="pesan" class="form-control" style="padding-left:0" placeholder="Tulis pesan disini.."></textarea>
                </div>
                <br>
                <input class="btn btn green pull-right" type="Submit" value="Kirim">                
              </div>
            </form>             
          </div>
        </div>
      </div>
      <!-- END OF PORTLET -->

      <!-- BEGIN BUTTON -->
      <div class="col-md-6">
        <a href=""><button class="btn btn blue btn-block"><b>Kembali</b></button></a>
      </div>
      <!-- END OF BUTTON -->

    </div>
    <!-- END OF ROW -->
  </div>  
  <!-- END OF CONTENT -->
</div>  
<!-- END OF PAGE -->


