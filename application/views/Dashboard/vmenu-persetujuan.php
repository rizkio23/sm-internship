  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">

    <!-- BEGIN PAGE TITLE -->
    <div class="page-title dash">
      <h3>Persetujuan</h3>
    </div>
    <!-- END OF PAGE TITLE -->

    <!-- BEGIN BREADCRUMB -->
    <ol class="breadcrumb dash">
      <li><a href="<?php echo base_url().'dashboard/insight';?>">Halaman Utama</a></li>
      <li class="active">Persetujuan Magang</li>
    </ol>
    <!-- END OF BREADCRUMB -->

    <div class="row">
      <!-- BEGIN PORTLET -->
      <div class="col-md-12">
        <div class="portlet box green-jungle">
          <!-- PORTLET TITLE -->
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-users"></i>Kuota
            </div>
          </div>
          <!-- END PORTLET TITLE -->
          <!-- PORTLET BODY -->
          <div class="portlet-body">
            <!-- TABLE TOOLBAR -->
            <div class="table-toolbar">
              <!-- BEGIN FILTER -->
              <div class="row">

                  <div class="col-md-6">
                    <div class="filter-table col-md-5">
                      <label class="control-label"><b>Kuota :</b></label>
                        <input type="text" style="width:100px;border-radius:4px;padding-left:10px" id="kuota" class="filter-status" readonly>
                    </div>
                    <div class="filter-table col-md-5">
                      <label class="control-label"><b>Budget :</b></label>
                        <input type="text" style="width:100px;border-radius:4px;padding-left:10px" id="budget" class="filter-status" readonly>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="filter-table">
                      <label class="control-label"><b>Bidang</b></label>
                        <select style="width:155px;height:30px" id="bidang">
                          <?php
                          foreach ($bidang as $data) {
                            echo "<option value='".$data['id']."'>".$data['bagian']."</option>";
                          }
                          ?>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="filter-table">
                      <label class="control-label"><b>Kuota Tahun</b></label>
                        <select style="width:100px;height:30px" id="tahun">
                          <option value="0">Pilih Tahun</option>
                          <?php foreach($tahun as $key): ?>
                          <option value="<?=$key['tahun']?>"><?=$key['tahun']?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                  </div>
              </div>
            </div>
            <hr>
            <!-- END TABLE TOOLBAR -->
              <!-- BEGIN TABLE -->
              <table class="table table-bordered table-striped">
                <thead>
                  <tr class="warning">
                    <th width="80" class="center">Jan</th>
                    <th width="80" class="center">Feb</th>
                    <th width="80" class="center">Mar</th>
                    <th width="80" class="center">Apr</th>
                    <th width="80" class="center">Mei</th>
                    <th width="80" class="center">Jun</th>
                    <th width="80" class="center">Jul</th>
                    <th width="80" class="center">Agt</th>
                    <th width="80" class="center">Sep</th>
                    <th width="80" class="center">Okt</th>
                    <th width="80" class="center">Nov</th>
                    <th width="80" class="center">Des</th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="tabel">
                  </tr>
                </tbody>
              </table>
              <!-- END OF TABLE -->
          </div>
          <!-- END PORTLET BODY -->
        </div>
      </div>
      <!-- END OF PORTLET -->

      <!-- BEGIN PORTLET -->
      <div class="col-md-12">
        <div class="portlet box blue">
          <!-- PORTLET TITLE -->
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-check"></i>Persetujuan Magang
            </div>
          </div>
          <!-- END PORTLET TITLE -->
          <!-- PORTLET BODY -->
          <div class="portlet-body">
            <!-- TABLE TOOLBAR -->
            <div class="table-toolbar">
              <!-- BEGIN STATUS -->
              <div class="row">
                <div class="col-md-12" >
                  <div class="filter-table">
                    <label class="control-label">Total pengajuan:</label>
                      <input type="text" style="width:100px;border-radius:4px;padding-left:10px" class="filter-status" value="<?=$total['terima']+$total['tolak']+$total['pending']?>" readonly>
                  </div>
                  <div class="filter-table">
                    <label class="control-label">Diterima:</label>
                      <input type="text" style="width:100px;border-radius:4px;padding-left:10px" class="filter-status"  value="<?=$total['terima']?>" readonly>
                  </div>
                  <div class="filter-table">
                    <label class="control-label">Ditolak:</label>
                      <input type="text" style="width:100px;border-radius:4px;padding-left:10px" class="filter-status"  value="<?=$total['tolak']?>" readonly>
                  </div>
                <div class="filter-table">
                    <label class="control-label">Pending:</label>
                      <input type="text" style="width:100px;border-radius:4px;padding-left:10px" class="filter-status"  value="<?=$total['pending']?>" readonly>
                  </div>
                </div>
              </div>
              <!-- END STATUS -->
              <div class="col-md-12">
                <hr>
              </div>
              <!-- BEGIN FILTER -->
              <div class="row">
                <form method="GET" action="<?=base_url()?>dashboard/persetujuan_magang">
                  <div class="col-md-11">
                    <div class="filter-table ">
                      <label class="control-label">Bidang:</label>
                        <select style="width:130px;height:30px" name="bidang">
                          <option value="0">Semua</option>
                          <?php foreach($bidang as $key): ?>
                            <option value="<?=$key['id']?>" <?=(isset($cari) && $cari['bidang']===$key['id'])?'selected':''?>><?=$key['bagian']?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="filter-table ">
                      <label class="control-label">Tujuan:</label>
                        <select style="width:100px;height:30px" name="tujuan">
                          <option value="0" <?=(isset($cari) && $cari['tujuan']==='0')?'selected':''?>>Semua</option>
                          <option value="pkl" <?=(isset($cari) && $cari['tujuan']==='pkl')?'selected':''?>>Internship</option>
                          <option value="research" <?=(isset($cari) && $cari['tujuan']==='research')?'selected':''?>>Research</option>
                        </select>
                    </div>
                    <div class="filter-table ">
                      <label class="control-label" >Tahun:</label>
                        <select style="width:80px;height:30px" name="tahun">
                          <option value="0" selected>Semua</option>
                          <?php $thn = 2010; for($i = 0; $i <= date('Y')-$thn; $i++): ?>
                            <option value="<?=$thn+$i?>" <?=(isset($cari) && $cari['tahun']==$thn+$i)?'selected':''?>><?=$thn+$i?></option>
                          <?php endfor; ?>
                        </select>
                    </div>
                    <div class="filter-table  ">
                      <label class="control-label">Bulan:</label>
                        <select style="width:100px;height:30px" name="bulan">
                          <option value="0">Semua</option>
                          <?php $bln = array('januari', 'februari' ,'maret','april','mei','juni','juli','agustus','september','oktober','november','desember');?>
                          <?php for($b = 0; $b < 12; $b++) :?>
                            <option value="<?=$b+1?>" <?=(isset($cari) && $cari['bidang']===$b)?'selected':''?>><?=ucfirst($bln[$b])?></option>
                          <?php endfor; ?>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="btn-group pull-right">
                    <input type="submit" class="btn btn-success" name="tb" value="Filter">
                    </div>
                  </div>
                </form>
              </div>
              <!-- END FILTER -->
            </div>
            <!-- END TABLE TOOLBAR -->
            <hr>
            <table class="table table-striped table-bordered table-hover" id="test2">
              <thead>
                <tr>
                 <th class="center" width="100">Nomor Pendaftaran</th>
                 <th class="center">Instansi</th>
                 <th class="center">Bidang</th>
                 <th class="center">Jenis</th>
                 <th class="center">Tujuan</th>
                 <th class="center">Bulan</th>
                 <th class="center">Jumlah Anggota</th>
                 <th class="center" width="100">Aksi</th>
               </tr>
              </thead>
              <tbody>
              <?php $no = 1; foreach($member as $key): ?>
                <tr>
                  <td class="center"><?=$key['id']?></td>
                  <td class="center"><?=$key['instansi']?></td>
                  <td class="center"><?=$key['bagian']?></td>
                  <td class="center"><?=$key['jenis']?> (<?=$key['durasi']?> bulan)</td>
                  <td class="center"><?=strtoupper($key['tujuan'])?></td>
                  <td class="center"><?=date('F Y', strtotime($key['bulan_pengajuan']))?></td>
                  <td class="center"><?=$key['jumlah']?> Orang</td>
                  <td>
                    <a href="<?=base_url()?>dashboard/kelompok_detail?id=<?=$key['id']?>">
                      <button class="btn btn-xs btn-warning btn-icon"><i class="fa fa-list"></i></button>
                    </a>
                    <?php
                    if ($key['status']==1) {
                    ?>
                    <a href="<?=base_url()?>p/member/verifikasi?id=<?=$key['id']?>&status=2">
                      <button href="" class="btn btn-xs btn-success"><i class="fa fa-check"></i></button>
                    </a>
                    <?php } ?>
                    <a href="<?=base_url()?>p/member/verifikasi?id=<?=$key['id']?>&status=0">
                      <button class="btn btn-xs btn-danger" onclick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-times"></i></button>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
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

<script type="text/javascript">
  $(document).ready(function(){
      $("#bidang").change(function(){
        $("#tahun").prop('selectedIndex',0);
      });

      $("#tahun").change(function(){
          if ($("#tahun").val() > 0)
          {
              var link = '<?=base_url()?>p/kuota/get_data?tahun='+$("#tahun").val()+'&bidang='+$("#bidang").val();

              $.getJSON(link, function(result){
                  $("#kuota").val(result[0].kuota);
                  $("#budget").val(result[0].budget);
                  $("#tabel").empty();

                  var bulan; 
                  var kosong = true;

                  for (var i = 1; i <= 12; i++) {
                    for (var j = 0; j < result[1].length; j++) {
                      bulan = result[1][j].bulan; 
                      if (bulan.substring(4) == i){
                        $("#tabel").append("<td class='center'>"+result[1][j].sisa+"<hr style='margin:6px -10px'>"+result[1][j].kuota+"</td>");
                        kosong = false;
                        break;
                      }
                    }
                    
                    if (kosong) {
                      $("#tabel").append("<td class='center'>BELUM INPUT</td>");
                    }
                    kosong = true;
                  }
                });
          }
          else
          {
            $("#kuota, #budget").val("");
          }
      });
  });
</script>
