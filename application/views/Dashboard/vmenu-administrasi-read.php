  <div class="page-wrapper">
    <div class="page-title dash">
      <h3>Administrasi User</h3>
    </div> 
    <ol class="breadcrumb dash">
      <li><a href="<?php echo base_url().'dashboard';?>">Halaman Utama</a></li>
      <li class="active">Administrasi User</li>
    </ol>
    <div class="row">
    <!-- BEGIN PORTLET -->
        <div class="col-md-12">
          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-user-secret"></i>Administrasi User
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-toolbar">
                <div class="row">
                  <div class="col-md-12">
                    <div class="btn-group pull-right">
                      <a href="<?php echo base_url().'dashboard/admin_form';?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</button></a>
                    </div>

                  </div>
                </div>
              </div>
              <table class="table table-striped table-bordered table-hover" >
               <thead>
                 <tr>
                   <th class="center">NIK</th>
                   <th class="center">Nama</th>
                   <th class="center">Unit Kerja</th>
                   <th class="center">Jabatan</th>
                   <th class="center">Level</th>
                   <th class="center">Status</th>
                   <th class="center">Pembimbing</th>
                   <th class="center" width="120">Aksi</th>
                 </tr>
               </thead>
               <?php
               foreach ($dat as $data) {
                echo "<tr>";
                echo "<td class='center'>".$data->nip."</td>";
                echo "<td class='center'>".$data->nama."</td>"; 
                echo "<td class='center'>".$data->deskripsi."</td>";
                echo "<td class='center'>".$data->jabatan."</td>";
                echo "<td class='center'>".$data->level."</td>";
                echo "<td class='center'>".(($data->status==1)?'Aktif':'Tidak Aktif')."</td>";
                echo "<td class='center'>".(($data->is_pembina==1)?'Ya':'Tidak')."</td>";
                echo "<td class='center'>";
                echo "<a href='".base_url()."dashboard/admin_form?id=".$data->nip."&ref=".md5('editAdmin')."'><button class='btn btn-primary'><i class='fa fa-search'></i></button></a>";
                echo "<a href='".base_url()."admin/delete?id=".$data->nip."&ref=".md5('deleteAdmin')."'><button class='btn btn-danger' onclick='return confirm(\"Apakah anda yakin?\")'><i class='fa fa-trash'></i></button></a>";
                echo "</td>";
                echo "</tr>";
                }
               ?>                            
            </table> 
            <!-- BEGIN MODAL -->
            <div id="addAdministrasi" class="modal fade" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><span><i class="fa fa-plus"></i></span>Tambah Admin</h4>
                  </div>
                <!-- BEGIN FORM  -->
                <form action="" role="form" method="POST">        

                <!-- BEGIN MODAL BODY -->
                  <div class="modal-body">
                    <div style="height:700px" data-always-visible="1" data-rail-visible="1">
                    <div class="form-body">

                      <div class="form-group">
                        <label>NIP</label>
                          <input type="text" class="form-control" name="nip" maxlength="12" placeholder="NIP" value="<?php echo (isset($detail))? $detail->nip:''; ?>" <?php echo (isset($detail)?'readonly':'')?>>
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                          <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo (isset($detail))? $detail->nama:''; ?>">
                      </div>
                      <div class="form-group">
                        <label>Unit Kerja</label>
                          <select class="form-control" name="unit">
                            <?php
                            foreach ($unit as $key) {                                                            
                              if (isset($detail))                                                             
                              {     
                                if ($key->id == $detail->id_unitkerja)                                                                   
                                {
                                  echo "<option value='".$key->id."' selected>".$key->deskripsi."</option>";
                                  continue;
                                }
                              }

                              echo "<option value='".$key->id."'>".$key->deskripsi."</option>";
                            }
                            ?>
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Level</label>                                      
                          <select class="form-control" name="level">
                            <?php
                            foreach ($level as $key) {
                              if (isset($detail)) 
                              {
                                if ($key->level == $detail->level) 
                                {
                                  echo "<option value='".$key->level."' selected>".$key->nama."</option>";
                                  continue;
                                }
                              }                                                            
                              echo "<option value='".$key->level."'>".$key->nama."</option>";
                            }
                            ?>
                          </select>
                      </div>
                      <div class="form-group">
                        <label >Jabatan</label>
                          <input type="text" class="form-control dash" name="jabatan" placeholder='Jabatan' value="<?php echo (isset($detail))? $detail->jabatan:''; ?>">
                      </div> 
                      <div class="form-group">
                        <label>Nomor HP</label>
                          <input type="text" class="form-control dash" name="hp" placeholder='Nomor Handphone' value="<?php echo (isset($detail))? $detail->hp:''; ?>">
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                          <textarea class="form-control dash" name="alamat" rows="2" placeholder='Alamat'><?php echo (isset($detail))? $detail->alamat:''; ?></textarea>
                      </div> 
                      <div class="form-group">
                        <label>Ada Pembina</label><br>
                        <input style="padding: 6px 25px;" type="radio" name='visible' value="1" checked=""> Ya
                        <input type="radio" name='visible' value="0"> Tidak
                      </div> 

                    </div>
                    </div>
                  </div>
                </div>  
                  <!-- END OF MODAL BODY -->              
                  <!-- BEGIN MODAL FOOTER -->
                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
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
        </div>
      </div>
      <!-- END OF PORTLET -->
    </div>
    <!-- END OF ROW -->
  </div>
</div>  
