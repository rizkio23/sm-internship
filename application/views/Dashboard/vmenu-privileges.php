<div class="page-wrapper">

  <div class="page-title dash">
    <h3>Master Menu</h3>
  </div>

  <ol class="breadcrumb dash">
    <li><a href="<?php echo base_url().'dashboard/';?>">Halaman Utama</a></li>
    <li><a href="<?php echo base_url().'dashboard/level';?>">Master Level</a></li>
    <li class="active">Privileges</li>
  </ol>

  <!-- BEGIN PORTLET -->
  <div class="row">
    <div class="col-md-12">
      <div class="portlet box blue">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-user"></i>Menu Privileges
          </div>
        </div>
        <div class="portlet-body">
          <div class="table-toolbar">
            <div >
              <div class="col-md-2 col-xs-6">
                <label style="font-weight:bold">Level</label>
                <input type="text" class="form-control login-input" value="<?=$par['level']?>" readonly>
              </div>


              <div class="col-md-2 col-xs-6">
                <label style="font-weight:bold">Nama</label>
                <input type="text" class="form-control login-input" value="<?=$par['nama']?>" readonly>
              </div>
            </div>
          </div>
          <form>
            <!-- BEGIN TABLE  -->
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th width="50" style="text-align:center">No</th>
                  <th >Menu</th>
                  <th>Deskripsi</th>
                  <th width="50" style="text-align:center">Checklist</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                $p = function($ned, $hay){
                  foreach ($hay as $key) {
                    if($key['id_menu']===$ned){
                      return TRUE;
                    }
                  }
                  return FALSE;
                };

                foreach ($master_menu as $key) : ?>
                <tr class="chkView">
                  <td class="checkA" style="text-align:center"><?=$no++?></td>
                  <td class="checkB"><?=$key['menu']?></td>
                  <td class="checkC"><?=$key['deskripsi']?></td>
                  <td style="text-align:center"><input name="menu<?=$key['id']?>" class="checkS" type="checkbox" <?=($p($key['id'], $hak))?'checked':''?>></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- END OF TABLE -->
          <!-- SUBMIT BUTTON -->
          <div class="table-toolbar">
            <div class="row">
              <div class="col-md-12">
                <div class="btn-group pull-right">
                  <input type="submit" class="btn btn-success" value="Submit">
                </div>
              </div>
            </div>
          </div>
          <!-- END OF SUBMIT BUTTON -->
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END OF PORTLET -->
</div>
<script>
$(document).on('change','.chkView',function(){
  var row = $(this).closest('tr');
  if($(this).is(':checked'))
  {
    $(row).find('.checkA,.checkB,.checkC,.checkD').css("background-color", "red");
  }
  else
  {
    $(row).find('.checkA,.checkB,.checkC,.checkD').css("background-color", "white");
  }
    if ($(this).is(':unchecked'))
    {
      $(row).find('.checkA,.checkB,.checkC,.checkD').css("background-color", "white");
    }
});


</script>
