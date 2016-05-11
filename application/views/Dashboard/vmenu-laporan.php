  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">

    <!-- BEGIN PAGE TITLE -->
    <div class="page-title dash">
      <h3>Laporan</h3>
    </div> 
    <!-- END OF PAGE TITLE -->

    <!-- BEGIN BREADCRUMB -->
    <ol class="breadcrumb dash">
      <li><a href="#">Home</a></li>
      <li class="active">Laporan</li>
    </ol>
    <!-- END OF BREADCRUMB -->

    <div class="row">
  
     <!-- BEGIN PORTLET -->
      <div class="col-md-12">
        <div class="portlet box yellow-crusta">
          <!-- PORTLET TITLE -->
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-archive"></i>Laporan
            </div>
          </div>
          <!-- END PORTLET TITLE -->
          <!-- PORTLET BODY -->
          <div class="portlet-body">
            <!-- TABLE TOOLBAR -->
            <div class="table-toolbar">
              <div class="row">
                <form method="GET" action="<?=base_url()?>dashboard/report">
                  <div class="col-md-11">            
                    <div class="filter-table ">
                      <label class="control-label">Tahun:</label>
                        <select style="width:60px;height:30px" name="tahun">
                          <option value="all" selected>Semua</option>
                          <?php
                            $now = date('Y'); 
                            for($i = 2010; $i <= $now; $i++)
                            {
                              if ($filter['tahun']==$i)
                              {
                                echo "<option value='$i' selected>$i</option>";
                                continue;
                              }
                              
                              echo "<option value='$i'>$i</option>";
                            }
                          ?>
                        </select>
                    </div>
                    <div class="filter-table">
                      <label class="control-label">Bulan:</label>
                        <select style="width:100px;height:30px" name="bulan">
                          <option value="all" selected>Semua</option>
                          <?php
                              for($i=1; $i<=12; $i++)
                              {
                                if ($filter['bulan']==$i) 
                                {
                                  echo "<option value='$i' selected>".date('F', strtotime("2000-$i-2"))."</option>";
                                }

                                echo "<option value='$i'>".date('F', strtotime("2000-$i-2"))."</option>";
                              }
                          ?>
                        </select>
                    </div>
                    <div class="filter-table">
                      <label class="control-label">Status:</label>
                        <select style="width:100px;height:30px" name="status">
                          <option value="all" selected>Semua</option>
                          <option value="1" <?=($filter['status']==1)?'selected':''?> >Menunggu</option>
                          <option value="2" <?=($filter['status']==2)?'selected':''?> >Pengajuan Pembina</option>
                          <option value="3" <?=($filter['status']==3)?'selected':''?> >Diterima</option>
                          <option value="0" <?=($filter['status']=='0')?'selected':''?> >Ditolak</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="btn-group pull-right">
                    <input type="submit" class="btn btn-success" name="tb" value="Filter">
                    </div>                  
                  </div>  
                </form>  
                <div class="col-md-12">
                  <hr>
                </div>
                <div class="col-md-12">
                  <div class="pull-right">
                    <label class="control-label" style="font-size:17px;">Cetak Sebagai</label>
                    <a href="" class="btn btn-sm green-jungle">Excel <i class="fa fa-file-excel-o"></i></a>
                    <a href="<?=base_url()?>p/pdf/report?tahun=<?=$filter['tahun']?>&bulan=<?=$filter['bulan']?>&status=<?=$filter['status']?>" class="btn btn-sm red-flamingo">PDF <i class="fa fa-file-pdf-o"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- END TABLE TOOLBAR -->
            <!-- BEGIN TABLE -->
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th class="center">ID</th>
                  <th class="center">Nama</th>
                  <th class="center">Instansi</th>
                  <th class="center">Jenis</th>
                  <th class="center">Bidang</th>
                  <th class="center">Tujuan</th>
                  <th class="center">Status</th>
                </tr> 
              </thead>
              <tbody>
              <?php foreach($data as $key): ?>
                <tr>
                  <td class="center" width="50"><?=$key['id_user']?></td>
                  <td class="center"><?=$key['nama']?></td>
                  <td class="center"><?=$key['instansi']?></td>
                  <td class="center"><?=$key['jenis']?> (<?=$key['durasi']?> Bulan)</td>
                  <td class="center"><?=$key['bagian']?></td>
                  <td class="center"><?=strtoupper($key['tujuan'])?></td>
                  <td class="center">
                    <?php
                  switch ($key['status']) {
                    case 1:
                        echo "<label class='label label-sm label-default'>Menunggu</label>";
                        break;
                    case 2:
                        echo "<label class='label label-sm label-default'>Menunggu</label>";
                        break;
                    case 3:
                        echo "<label class='label label-sm label-success'>Disetujui</label>";
                        break;
                    case 0:
                        echo "<label data-toggle='modal' href='#tolak' class='label label-sm label-danger'>Ditolak</label>";
                        break;
                    default:
                        echo "<label class='label label-sm label-danger'>ERROR</label>";
                        break;
                    }
                  ?>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
            <!-- END OF TABLE -->
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
