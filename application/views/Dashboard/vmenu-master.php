<div class="page-wrapper">
  <div class="page-title dash">
    <h3>Master Menu</h3>
  </div> 
  <ol class="breadcrumb dash">
    <li><a href="<?php echo base_url().'dashboard';?>">Halaman Utama</a></li>
    <li class="active">Master Menu</li>
  </ol>

  <div class="row">
        <!-- BEGIN PORTLET -->          
        <div class="col-md-12">
          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-book"></i>Master Menu
              </div>
            </div>
            <div class="portlet-body">          
              <div class="table-toolbar">
                <div class="row">
                  <div class="col-md-12">
                    <div class="btn-group pull-right">
                      <button data-toggle="modal" href="#addMenu" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Menu</button>
                    </div>
                  </div>
                </div>
              </div>  

              <!-- BEGIN TABLE  -->
              <table class="table table-striped table-bordered table-hover" id="mMenu">
               <thead>
                 <tr>
                   <th style="text-align:center">No</th>
                   <th>Menu</th>
                   <th>Deskripsi</th>                 
                   <th>Link</th>
                   <th style="text-align:center">Tampil Di Sidebar</th>
                   <th style="text-align:center" width="150">Aksi</th>
                 </tr>
               </thead>
               <?php $n = 1; foreach ($data as $key) : ?>
               <tr>
                <td style="text-align:center"><?=$n++?></td>
                <td><?=$key['menu']?></td>
                <td><?=$key['deskripsi']?></td>
                <td><?=$key['link']?></td>
                <td style="text-align:center"><?=($key['visible']==1)?'Ya':'Tidak'?></td>
                <td style="text-align:center">
                  <button href="" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                  <a href="<?=base_url()?>p/role/menu_delete?id=<?=$key['id']?>&ref=<?=password_hash('hapusMenu', PASSWORD_BCRYPT)?>">
                    <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i></button>
                  </a>
                </td>
              </tr>
            <?php endforeach;?>
          </table> 
          <!-- END OF TABLE -->

          <!-- BEGIN MODAL == POPUP -->
          <div id="addMenu" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                  <h4 class="modal-title"><span><i class="fa fa-plus"></i></span> Tambah Menu</h4>
                </div>

                <!-- BEGIN FORM  -->
                <form role="form" method="POST" action="<?=base_url()?>p/role/menu_add?ref=<?=password_hash('tambahMenu', PASSWORD_BCRYPT)?>">        

                  <!-- BEGIN MODAL BODY -->
                  <div class="modal-body">
                    <div style="height:430px" data-always-visible="1" data-rail-visible="1">
                      <div class="form-body">

                        <div class="form-group">
                          <label>ID</label>
                          <input type="text" class="form-control login-input" name="id" value="<?=$next_id?>" readonly>
                        </div>

                        <div class="form-group">
                          <label>Menu</label>
                          <input type="text" class="form-control" name="menu" placeholder="Menu" required>
                        </div>

                        <div class="form-group">
                          <label>Link</label>
                          <input type="text" class="form-control" name="link" placeholder="Link" required>
                        </div>  

                        <div class="form-group">
                          <label>Deskripsi</label>
                          <textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" rows="2" required></textarea>
                        </div>   

                        <div class="form-group">
                          <label>Tampilkan di Sidebar</label><br>
                          <input style="padding: 6px 25px;" type="radio" name='visible' value="1" checked=""> Ya
                          <input type="radio" name='visible' value="0"> Tidak
                        </div> 

                      </div>
                    </div>
                  </div>  
                  <!-- END OF MODAL BODY -->

                  <!-- BEGIN MODAL FOOTER -->
                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                    <input type="submit" class="btn btn-success" name="tb" class="btn btn-primary" value="add">
                  </div>
                  <!-- END OF MODAL FOOTER -->
                </form> 
                <!-- ENF OF FORM -->
              </div>
            </div>
          </div>
          <!-- END MODAL -->            
        </div>
      </div>
    </div>
    <!-- END PORTLET -->
  </div>
  <!-- END OF ROW -->
</div>
<!-- END OF CONTENT -->
</div>  
<!-- END OF PAGE -->
