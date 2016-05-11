  <div class="main">
    <div class="page-title dash">
      <h3>Pengajuan Magang</h3>
    </div> 

    <!-- BREADCRUMB -->
    <ol class="breadcrumb dash">
      <li><a href="#">Home</a></li>
      <li class="active">Pengajuan Magang</li>            
    </ol>

      <!-- BEGIN PORTLET -->
    <div class="row">
      <div class="col-md-7">
        <div class="portlet box blue">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-book"></i>Daftar Pengajuan Magang
            </div>
          </div>
          <div class="portlet-body">          
            <div class="table-toolbar">
              <div class="row">
                <div class="col-md-12">
                  <div class="btn-group pull-right">
                  <?php
                    $par = function($hay){
                        foreach ($hay as $key) {
                          if ($key['status'] >= 0) 
                          {
                            return FALSE;
                          }
                        }
                        return TRUE;
                    };

                    if((empty($data) || $par($data)) && !empty($berkas)):
                  ?>
                    <button data-toggle="modal" href="#pengajuan" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pengajuan</button>
                  <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>  

            <!-- BEGIN TABLE  -->
            <table class="table table-striped table-bordered table-hover">
             <thead>
               <tr>
                 <th class="center">No</th>
                 <th class="center">Bidang Keahlian</th>
                 <th class="center">Tanggal Pengajuan</th>                                                    
                 <th class="center">Status</th>
                 <th class="center" width="50">Aksi</th>
               </tr>
             </thead>
             <?php $no = 1; foreach($data as $key): ?>
              <tr>                                  
               <td class="center"><?=$no++?></td>
               <td class="center"><?=$key['bagian']?></td>
               <td class="center"><?=date('d M Y', strtotime($key['tgl_pengajuan']))?></td>                 

               <td class="center">
                  <?php
                  switch ($key['status']) {
                    case 0:
                        echo "<label class='label label-sm label-default'>Menunggu</label>";
                        break;
                    case 1:
                        echo "<label class='label label-sm label-success'>Disetujui</label>";
                        break;
                    case -1:
                        echo "<label class='label label-sm label-danger'>Ditolak</label>";
                        break;
                    default:
                        echo "<label class='label label-sm label-danger'>ERROR</label>";
                        break;
                    }
                  ?>
               </td>                                    
               <td class="center">
                <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i></button>
                </td>
              </tr>                                                                    
            <?php endforeach; ?>
            </table> 
            <!-- END OF TABLE -->

            <!-- BEGIN MODAL-->
            <div id="pengajuan" class="modal fade" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><span><i class="fa fa-plus"></i></span> Tambah Pengajuan PKL</h4>
                  </div>
                  <!-- BEGIN FORM  -->
                  <form role="form" method="POST" action="<?=base_url()?>p/member/add_magang?ref=<?=password_hash('tambahMagang', PASSWORD_BCRYPT)?>">        
                    <!-- BEGIN MODAL BODY -->
                    <div class="modal-body">
                      <div style="height:100px" data-always-visible="1" data-rail-visible="1">
                        <div class="form-body">
                          <div class="form-group">
                            <label>Bidang Keahlian</label>
                            <select class="form-control" name="id_bidang">
                              <?php foreach($bidang as $key):?>
                              <option value="<?=$key['id']?>"><?=$key['bagian']?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>                                                 
                        </div>
                      </div>
                    </div>  
                    <!-- END OF MODAL BODY -->
                    <!-- BEGIN MODAL FOOTER -->
                    <div class="modal-footer">
                      <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                      <input type="submit" class="btn btn-success" name="tb" class="btn btn-primary" value="Add">
                    </div>
                    <!-- END OF MODAL FOOTER -->
                  </form> 
                  <!-- END OF FORM -->
                </div>
              </div>
            </div>
            <!-- END MODAL -->                   
          </div>
        </div>
      </div>
      <!-- END PORTLET -->

      <!-- BEGIN PORTLET -->
      <div class="col-md-5">
        <div class="portlet box red">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-upload"></i>Proposal PKL
            </div>
          </div>
          <div class="portlet-body">  
            <!-- BEGIN TABLE -->
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
                <tr>
                  <td><?=(!empty($berkas))?$berkas[0]['nama_berkas']:'Belum mengunggah'?></td>
                  <td><?=(!empty($berkas))?$berkas[0]['date_updated']:'Belum mengunggah'?></td>
                  <td><button class="btn btn-warning"><i class="fa fa-download"></i></button></td>
                </tr>
            </table>
            <!-- END OF TABLE -->
            <!-- BEGIN FORM -->
            <form action="<?=base_url()?>p/member/upload_proposal?ref=<?=password_hash('uploadProposal', PASSWORD_BCRYPT)?>"  method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" name="proposal" class="form-control">
              </div>
              <input type="submit" class="btn btn-success btn-block" name="tb_upload" value="Upload">
            </form>
            <!-- END OF FORM -->
          </div>
        </div>                
      </div>
      <!-- END OF PORTLET -->
      
    </div>  
    <!-- END OF ROW -->
  </div>
</div>