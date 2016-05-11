<div class="page-wrapper">

  <div class="page-title dash">
    <h3>Master Menu</h3>
  </div> 

  <ol class="breadcrumb dash">
    <li><a href="<?php echo base_url().'dashboard';?>">Halaman Utama</a></li>
    <li><a href="<?php echo base_url().'master_menu';?>">Master Menu</a></li>
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
                <th width="150">Menu</th>
                <th width="50" style="text-align:center">Checklist</th>
               </tr>
            </thead>
            <tbody>
                <?php 
                $p = function($ned, $hay){
                  foreach ($hay as $key) {
                    if($key['id_menu']===$ned){
                      return TRUE;
                    }
                  }
                  return FALSE;
                };

                foreach ($master_menu as $key) : ?>
                  <tr>
                    <td style="text-align:center"><input name="menu<?=$key['id']?>" class="chkView" type="checkbox" <?=($p($key['id'], $hak))?'checked':''?>></td>
                    <td><?=$key['menu']?></td>
                    <td style="text-align:center"><input type="checkbox" name="menu<?=$key['id']?>c" class="chkC" disabled/></td>
                    <td style="text-align:center"><input type="checkbox" name="menu<?=$key['id']?>r" class="chkR" disabled/></td>
                    <td style="text-align:center"><input type="checkbox" name="menu<?=$key['id']?>u" class="chkU" disabled/></td>
                    <td style="text-align:center"><input type="checkbox" name="menu<?=$key['id']?>d" class="chkD" disabled/></td>
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
