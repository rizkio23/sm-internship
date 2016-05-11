  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">

    <!-- BEGIN PAGE TITLE -->
    <div class="page-title dash">
      <h3>Daftar Laporan</h3>
    </div> 
    <!-- END OF PAGE TITLE -->

    <!-- BEGIN BREADCRUMB -->
    <ol class="breadcrumb dash">
      <li><a href="<?php echo base_url().'dashboard/insight';?>">Halaman Utama</a></li>
      <li><a href="<?php echo base_url().'dashboard/pengajuan_unit';?>">Daftar Pengajuan PKL</a></li>
      <li class="active">Detail Kelompok</li>
    </ol>
    <!-- END OF BREADCRUMB -->

    <div class="row">
      <!-- BEGIN PORTLET -->
      <div class="col-md-12">
        <div class="portlet box green">
          <!-- PORTLET TITLE -->
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-check-square-o"></i>Detail Kelompok
            </div>
          </div>  
          <div class="portlet-body">
            <form action="" method="POST">
              <!-- BEGIN TABLE -->
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="center">Anggota</th>
                    <th class="center">Unit Kerja</th>                 
                    <th class="center">Pembimbing</th>
                    <th class="center">Instansi</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($rekap as $key): ?>
                  <tr>
                    <td class="center" ><a href="<?=base_url()?>dashboard/info_member?id=<?=$key['id']?>" style="color:#F57869" target="_blank"><?=$key['nama']?></a></td>
                    <td class="center"><?=$key['deskripsi']?></td>
                    <td class="center"><?=$key['pembina']?></td>
                    <td class="center"><?=$key['instansi']?></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              <!-- END OF TABLE -->
              <!-- SUBMIT BUTTON -->
              <div class="table-toolbar">
                <div class="row">
                  <div class="col-md-12">
                    <div class="pull-right">
                      <a href="<?=base_url()?>p/member/ajukan_final">
                      <buton class="btn btn-success" onclick="return confirm('Apakah anda yakin?')">Ajukan</buton>
                      </a>
                      <a href="<?php echo base_url().'dashboard/pengajuan_unit';?>"><button class="btn btn-danger">Batal</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END OF SUBMIT BUTTON -->              
            </form>
          </div>
          <!-- END PORTLET TITLE -->
        </div>  
      </div>     
      <!-- END OF PORTLET -->
    </div>
    <!-- END OF ROW -->
  </div>  
  <!-- END OF CONTENT -->
</div>  
<!-- END OF PAGE -->