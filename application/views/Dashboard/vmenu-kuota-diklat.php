  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">

    <!-- BEGIN PAGE TITLE -->
    <div class="page-title dash">
      <h3>Kuota</h3>
    </div> 
    <!-- END OF PAGE TITLE -->

    <!-- BEGIN BREADCRUMB -->
    <ol class="breadcrumb dash">
      <li><a href="<?php echo base_url().'dashboard';?>">Home</a></li>
      <li class="active">Kuota Per Tahun</li>
    </ol>
    <!-- END OF BREADCRUMB -->

    <div class="row">
      <!-- BEGIN PORTLET -->
      <div class="col-md-12">
        <div class="portlet box green-jungle">
          <!-- PORTLET TITLE -->
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-users"></i>Kuota Per Tahun
            </div>
          </div>
          <!-- END PORTLET TITLE -->
          <!-- PORTLET BODY -->
          <div class="portlet-body">
            <!-- TABLE TOOLBAR -->
            <div class="table-toolbar">
              <div class="row">
                <div class="col-md-12">
                  <div class="btn-group pull-right">
                    <button class="btn btn-primary" data-toggle="modal" href="#responsive"><i class="glyphicon glyphicon-plus"></i> Tambah Data</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- END TABLE TOOLBAR -->
            <!-- BEGIN TABLE -->
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th class="center">No</th>
                  <th class="center">Tahun</th>
                  <th class="center">Jumlah Kuota</th>
                  <th class="center">Budget</th>
                  <th class="center">Aksi</th>
                </tr> 
              </thead>
              <tbody>
                <?php $no = 1; foreach($data as $key):?>
                <tr>
                  <td class="center"  width="50"><?=$no++?></td>
                  <td class="center"><?=$key['tahun']?></td>
                  <td class="center"><?=$key['kuota']?></td>
                  <td class="center">Rp <?=number_format($key['budget'],0,",", ".")?></td>
                  <td class="center" width="120">
                  <button href="" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                  <a href="<?=base_url()?>dashboard/kuota_detail?tahun=<?=$key['tahun']?>"><button class="btn btn-warning"><i class="fa fa-info"></i></button></a>
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

    <!-- BEGIN MODAL -->
    <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title"><span><i class="fa fa-plus"></i></span> Tambah Kuota Per Tahun</h4>
          </div>
        <!-- BEGIN FORM  -->
        <form role="form" method="POST" action="<?=base_url()?>p/Kuota/add_kuota">        

        <!-- BEGIN MODAL BODY -->
          <div class="modal-body">
            <div style="height:300px" data-always-visible="1" data-rail-visible="1">
              <div class="form-body">
                <div class="form-group">
                  <label>Tahun</label>
                    <input type="number" class="form-control" style="text-alignment:center" min="<?=date('Y')?>" name="tahun" required>
                </div>
                <div class="form-group">
                  <label>Jumlah Kuota</label>
                    <input type="number" class="form-control" style="text-alignment:center" name="kuota" required>
                </div>
                <div class="form-group">
                  <label>Budget</label>
                    <div class="row">
                      <div class="col-md-1" style="padding-top:10px">Rp.</div>
                      <div class="col-md-11">
                      <input type="text" class="form-control" style="text-alignment:center" name="budget" required>                      
                      </div>                      
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
  <!-- END OF CONTENT -->
</div>  
<!-- END OF PAGE -->