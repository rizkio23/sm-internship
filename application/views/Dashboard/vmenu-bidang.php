  <div class="page-wrapper">

    <div class="page-title dash">
      <h3>Profil</h3>
    </div> 

    <ol class="breadcrumb dash">
      <li><a href="<?php echo base_url().'dashboard';?>">Halaman Utama</a></li>
      <li class="active">Bidang Keahlian</li>
    </ol>

    <div class="row">
      <div class="col-md-12">
        <!-- BEGIN PORTLET -->
          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-briefcase"></i>Bidang Keahlian 
               </div>
            </div>
            <div class="portlet-body">
              <div class="table-toolbar">
                <div class="row">
                  <div class="col-md-12">
                    <div class="btn-group pull-right">
                      <button data-toggle="modal" href="#addBagian" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Bidang </button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- BEGIN TABLE -->
              <table class="table table-striped table-bordered table-hover" id="testabel">
                <thead>
                  <tr>
                    <th style="text-align:center" width="50">No</th>
                    <th width="200">Bidang Keahlian</th>
                    <th>Deskripsi</th>
                    <th style="text-align:center" width="150">Status</th>
                    <th style="text-align:center" width="150">Aksi</th>
                  </tr>
                </thead>
         
                <tbody>
                  <?php $no = 1; foreach ($bidang as $key) :?>
                    <tr>
                      <td><?=$no?></td>
                      <td><?=ucwords(strtolower($key['bagian']))?></td>
                      <td><?=$key['deskripsi']?></td>
                      <td style="text-align:center" >
                          <button onclick="gantiStatus('<?=$key['id']?>', '<?=($key['status']>0)?'0':'1'?>')" id="tb<?=$key['id']?>" class="label label-sm <?=($key['status']>0)?'label-success':'label-danger'?>"><?=($key['status']>0)?'Available':'Unavailable'?></button>
                      </td>
                      <td style="text-align:center"><a>
                          <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                        </a>
                        <a href="<?=base_url()?>p/bidang/bidang_delete?id=<?=$key['id']?>&ref=<?=password_hash('hapusBidang', PASSWORD_BCRYPT)?>">
                          <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></button>
                        </a>
                        </td>
                    </tr>
                  <?php $no++; endforeach; ?>
                </tbody>
              </table> 
              <!-- END OF TABLE -->

              <!-- BEGIN MODAL -->
              <div id="addBagian" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                      <h4 class="modal-title"><span><i class="fa fa-plus"></i></span> Tambah Bagian</h4>
                    </div>
                  <!-- BEGIN FORM  -->
                  <form action="<?=base_url()?>p/bidang/bidang_add?ref=<?=password_hash('tambahBidang', PASSWORD_BCRYPT)?>" role="form" method="POST">        

                  <!-- BEGIN MODAL BODY -->
                    <div class="modal-body">
                      <div style="height:300px" data-always-visible="1" data-rail-visible="1">
                        <div class="form-body">

                          <div class="form-group">
                            <label>ID</label>
                              <input type="text" class="form-control login-input" style="text-alignment:center" name="id" value="<?=$id?>" readonly>
                          </div>

                          <div class="form-group">
                            <label>Bagian Keahlian</label>
                              <input type="text" class="form-control" name="bagian" placeholder="Bagian" required>
                          </div>  

                          <div class="form-group">
                            <label>Deskripsi</label>
                              <textarea type="text" class="form-control" name="deskripsi" rows="2" placeholder="Deskripsi" required> </textarea>
                          </div>  

                        </div>
                      </div>
                    </div>  
                    <!-- END OF MODAL BODY -->              
                    <!-- BEGIN MODAL FOOTER -->
                    <div class="modal-footer">
                      <button type="button" data-dismiss="modal" class="btn btn-default"> Batal </button>
                      <input type="submit" class="btn btn-success" name="tb" class="btn btn-primary" value="add">
                    </div>
                    <!-- END OF MODAL FOOTER -->
                  </form> 
                  <!-- END OF FORM -->
                  </div>
                </div>
            </div>
            <!-- END MODAL -->  
          </div> 
          <!-- END OF PORTLET  -->
     
     </div>
    <!-- END OF ROW -->
  </div>  
  <!-- END OF CONTENT  -->
</div>  
<!-- END OF PAGE -->

<script type="text/javascript">

  function gantiStatus(id, status)
  {
    ganti(id, status);
  }

  $(document).ready(function($){

    // simpan data
    window.ganti = function(idB, st)
    {
          var link = '<?=base_url()?>p/bidang/change_status';

          $.ajax({
            type: "POST",
            url: link,
            data:{id:idB, status:st},
            
            success: function(data){

              if (st==1) {
                $("#tb"+idB).removeClass('label-danger').addClass('label-success').empty().html("Available");
              }else{
                $("#tb"+idB).removeClass('label-success').addClass('label-danger').empty().html("Unavailable");
              }
            },

            error: function(xhr, ajaxOption, thrownError){
              alert("Error: "+xhr.status+" "+thrownError);
              location.reload();
            }
          });
    }

  });
</script>