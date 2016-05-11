  <div class="page-wrapper">
    <div class="page-title dash">
      <h3>Administrasi User</h3>
    </div> 
    <ol class="breadcrumb dash">
      <li><a href="#">Home</a></li>
      <li><a href="<?php echo base_url().'admin/dashboard/administrasi';?>">Administrasi User</a></li>
      <li class="active">Tambah Data</li>
    </ol>

    <div class="row">
      <!-- Begin Portlet -->
      <div class="col-md-12">
        <div class="portlet box red">                          
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-plus"></i>Tambah Data
            </div>
          </div>
          <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="POST" action="<?php echo (isset($detail))?base_url().'p/admin/update?ref='.md5('updateAdmin'):base_url().'p/admin/add?ref='.md5('tambahAdmin');?>">
              <div class="form-body">
                <div class="form-group">
                  <label class="col-md-2 control-label">NIK</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="nip" maxlength="12" placeholder="NIK" value="<?php echo (isset($detail))? $detail->nip:''; ?>" <?php echo (isset($detail)?'readonly':'')?>> 
                  </div>
                  <span class="col-md-2" style="padding-top:7px"><i id="status" class="fa"></i></span>
                  <!-- fa fa-check-circle =centang ; fa fa-times-circle=x -->
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">Nama</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo (isset($detail))? $detail->nama:''; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">Unit Kerja</label>

                  <div class="col-md-5">
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
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">Level</label>
                  <div class="col-md-3">                                          
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
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">Jabatan</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control dash" name="jabatan" placeholder='Jabatan' value="<?php echo (isset($detail))? $detail->jabatan:''; ?>">
                  </div>
                </div> 
                <div class="form-group">
                  <label class="col-md-2 control-label">Nomor HP</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control dash" name="hp" placeholder='Nomor Handphone' value="<?php echo (isset($detail))? $detail->hp:''; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">Alamat</label>
                  <div class="col-md-4">
                    <textarea class="form-control dash" name="alamat" placeholder='Alamat'><?php echo (isset($detail))? $detail->alamat:''; ?></textarea>
                  </div>
                </div> 
                <div class="form-group">
                  <label class="col-md-2 control-label">Seorang Pembimbing</label>
                  <div class="col-md-4">
                    <div class="radio-list">
                      <label class="radio-inline">
                      <input type="radio" value="1" name="pembina" checked=""> Ya </label>
                      <label class="radio-inline">
                      <input type="radio" name="pembina" value="0"> Tidak </label>
                    </div>
                  </div>
                </div>                 
                <div class="form-group">
                  <label class="col-md-2 control-label">Captcha</label>
                  <div class="col-md-4">
                    <?php echo $captcha['image']; ?>
                    <br>
                    <input type="text" class="form-control dash" name="captcha" placeholder='Captcha'>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-offset-2 col-md-9">
                      <input type="submit" class="btn btn-primary" name="tb" value="Simpan">
                      <a href="<?php echo base_url().'dashboard/admin';?>"><button type="button" class="btn btn-danger">Batal</button></a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- end of form -->
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">

  $(document).ready(function($)
  {
    var nips   = $("input[name='nip']");
    var icon   = $("#status");
    var submit = $("input[type='submit']");
    var link   = '<?=base_url()?>p/admin/cek_nip';

    nips.keyup(function(){
      if(nips.val()==''){
        icon.removeClass("fa-times fa-check");
        submit.attr('disabled', 'disabled');
      }
      else
      {
        $.ajax({
          type: "POST",
          url: link,
          data:{nip:nips.val()},
          success: function(data){
              icon.removeClass("fa-check fa-times").addClass("fa-check");
              submit.removeAttr('disabled');
          },
          error: function(xhr, ajaxOption, thrownError){
              icon.removeClass("fa-times fa-check").addClass("fa-times");
              submit.attr('disabled', 'disabled');
          }
        });
      }
    });
  });
</script>