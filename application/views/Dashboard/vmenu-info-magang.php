  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">

    <!-- BEGIN PAGE TITLE -->
    <div class="page-title dash">
      <h3>Info Member</h3>
    </div> 
    <!-- END OF PAGE TITLE -->
    <div class="row">
      <!-- BEGIN PORTLET -->
      <div class="col-md-4 col-xs-12">
        <!-- PROFILE OVERVIEW -->
        <div class="profile-overview">
          <div class="portlet light profile-overview-portlet">
            <div class="profile-picture">
              <img src="<?php echo base_url().'assets/img/profpic/default_blank.png';?>" class="img-responsive">
            </div>
            <div class="profile-basic-info">
              <div class="profile-basic-info name"><?=$detail['nama']?></div>
              <div class="profile-usermenu">
                <table class="table table-striped">
                  <tr>
                    <td width="100"><i class="fa fa-lg fa-male"></i></td>
                    <td style="text-align:left"><?=($detail['jk']==='1')?'Laki-laki':'Perempuan'?></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-lg fa-graduation-cap"></i></td>
                    <td style="text-align:left"><?=$detail['instansi']?></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-lg fa-birthday-cake"></i></td>
                    <td style="text-align:left"><?=date('d F Y', strtotime($detail['tgl_lahir']))?></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-lg fa-envelope-o"></i></td>
                    <td style="text-align:left"><?=$detail['email']?></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-lg fa-phone"></i></td>
                    <td style="text-align:left"><?=$detail['hp']?></td>
                  </tr>
                </table>              
              </div>
            </div>
          </div>                    
        </div>
        <!-- END PROFILE OVERVIEW -->
      </div>     
      <!-- END OF PORTLET -->
      <div class="col-md-8 col-xs-12 pull-right">
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption font-green-meadow">
              <i class="fa fa-lg fa-laptop font-green-meadow"></i>
              <span class="caption-subject bold uppercase"> Detail Magang</span>
            </div>
          </div>
          <div class="form body">
            <div class="form-group form-md-line-input">
              <div class="input-icon">
                  <div class="form-control"></div>
                  <label for="form_control_1">Unit Kerja</label>
                    <i class="fa fa-lg fa-briefcase"></i>
                </div>
            </div>
            <div class="form-group form-md-line-input">
              <div class="input-icon">
                  <div class="form-control"></div>
                  <label for="form_control_1">Pembina</label>
                    <i class="fa fa-lg fa-user"></i>
                </div>
            </div>
            <div class="form-group form-md-line-input">
              <div class="input-icon">
                  <div class="form-control"></div>
                  <label for="form_control_1">Bulan Pengajuan</label>
                    <i class="fa fa-lg fa-sign-in"></i>
                </div>
            </div> 
          </div>

          <div class="portlet-title">
            <div class="caption font-green-meadow">
              <i class="fa fa-lg fa-archive font-green-meadow"></i>
              <span class="caption-subject bold uppercase"> Berkas</span>
            </div>
          </div>
           <div class="form body">
           		<table class="table table-striped table-hover">
           			<thead>
           				<tr>
           					<th>Berkas</th>
           					<th class="center">Unduh</th>
           				</tr>
           			</thead>
           			<tbody>
           				<tr>
           					<td>id_card.pdf</td>
           					<td class="center"><button class="btn green-haze" type="button"><i class="fa fa-download"></i></button></td>
           				</tr>           			          				
           			</tbody>
           		</table>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-primary pull-right">Kembali</button>                              
              </div>
            </div>
          </div>
        </div>       
      </div>
    </div>
    <!-- END OF ROW -->
  </div>  
  <!-- END OF CONTENT -->
</div>  
<!-- END OF PAGE -->


