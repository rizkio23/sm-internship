    <!-- BEGIN CONTENT -->
    <div class="page-wrapper">

      <!-- BEGIN PAGE TITLE -->
      <div class="page-title dash">
        <h3>Notifikasi</h3>
      </div> 
      <!-- END OF PAGE TITLE -->

      <!-- BEGIN BREADCRUMB -->
      <ol class="breadcrumb dash">
        <li><a href="<?php echo base_url().'dashboard/insight';?>">Halaman Utama</a></li>
        <li class="active">Notifikasi</li>
      </ol>
      <!-- END OF BREADCRUMB -->

      <div class="row">
        <!-- BEGIN PORTLET -->
        <div class="col-md-7">
          <div class="portlet box blue-hoki">
            <!-- PORTLET TITLE -->
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-lg fa-th-list"></i>Data User
              </div>
            </div>  
            <!-- END PORTLET TITLE -->
            <!-- PORTLET BODY  -->
            <div class="portlet-body">
              <div class="table-toolbar">
                <div class="row">
                </div>      
              </div>
              <!-- BEGIN TABLE -->
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr class="success">
                    <th class="center">No</th>
                    <th class="center">Penerima</th>
                    <th class="center">Pesan</th>
                    <th class="center">Tanggal Kirim</th>
                    <!-- <th class="center">Aksi</th> -->
                  </tr> 
                </thead>
                <tbody>
                  <?php
                    foreach($data as $notif):
                  ?>
                  <tr>
                    <td class="center"><?=$notif['no']?></td>
                    <td class="center"><?=($notif['penerima']=='0')?'Semua':$notif['penerima']?></td>
                    <td class="center"><?=$notif['pesan']?></td>
                    <td class="center"><?=date('d-M-Y (h:i)', strtotime($notif['no']))?></td>
                    <!-- <td class="center"><button class="btn default btn-xs blue-stripe">Edit</button></td> -->
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              <!-- END OF TABLE -->
            </div>
            <!-- END OF PORTLET BODY -->
          </div>
        </div>  
        <!-- END OF PORTLET --> 
        <!-- BEGIN PORTLET -->
        <div class="col-md-5">
          <div class="portlet box red-thunderbird">
            <!-- PORTLET TITLE -->
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-lg fa-bullhorn"></i>Form Pesan
              </div>
            </div>  
            <!-- END PORTLET TITLE -->
            <!-- BEGIN FORM -->
            <div class="portlet-body form">
              <form class="form-horizontal" role="form" method="POST" action="<?=base_url()?>p/notifikasi/add">
                <div class="form-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Penerima</label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" id="penerima" name="penerima" required>
                    </div>
                    <div class="col-md-1">
                      <input type="checkbox" class="form-control" id="chk" name="semua">
                    </div>
                      <label class="control-label" >Semua</label>
                  </div>     
                  <div class="form-group">
                    <label class="col-md-3 control-label">Pesan</label>
                    <div class="col-md-8">
                      <textarea type="text" class="form-control" name="pesan" id="txt" required></textarea>
                    </div>
                  </div>     
                  <div class="form-actions">
                    <div class="row">
                      <div class="col-md-offset-3 col-md-8s">
                        <input type="submit" name="tb" class="btn btn-primary" value="Kirim">
                        <button type="reset" class="btn btn-danger">Batal</button>
                      </div>
                    </div>
                  </div>
                </div>  
              </form>
            </div>
            <!-- END OF FORM -->
          </div>
        </div>   
        <!-- END OF PORTLET -->
    </div>
    <!-- END OF ROW -->
  </div>  
  <!-- END OF CONTENT -->
</div>  
<!-- END OF PAGE -->

<script type="text/javascript">
  
$(document).ready(function(){
    $("#chk, button[type='reset']").click(function(){
        if ($(this).prop("checked")==true) 
        {
          $("#penerima").prop("disabled", true).val("");
        }
        else
        {
          $("#penerima").prop("disabled", false);
        }
    });
});

</script>
