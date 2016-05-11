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
      <li><a href="<?php echo base_url().'dashboard/kuota';?>">Kuota Per Tahun</a></li>
      <li class="active">Detail Kuota Per Tahun</li>
    </ol>
    <!-- END OF BREADCRUMB -->

    <div class="row">
      <!-- BEGIN PORTLET -->
      <div class="col-md-12">
        <div class="portlet box red-thunderbid">
          <!-- PORTLET TITLE -->
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-users"></i>Input Kuota Per Tahun
            </div>
          </div>
          <!-- END PORTLET TITLE -->
          <!-- PORTLET BODY -->
          <div class="portlet-body">
          <!-- TABLE TOOLBAR -->
          <div class="table-toolbar">
            <!-- BEGIN STATUS -->
            <div class="row">
              <div class="col-md-12">
                <div class="filter-table col-md-5">
                  <label class="control-label col-md-4"><b>Total Kuota :</b></label>
                    <input type="text" style="width:100px;border-radius:4px;padding-left:10px" class="filter-status" id="total" value="<?=$jumlah?>" readonly>
                </div>
              </div>
              <div class="col-md-12">
                <div class="filter-table col-md-5">
                  <label class="control-label col-md-4"><b>Budget :</b></label>
                    <input type="text" style="width:150px;border-radius:4px;padding-left:10px" class="filter-status col-md-2" value="Rp <?=number_format($budget,0,',', '.')?>" readonly>                  
                </div> 
                <div class="filter-table pull-right">
                  <button class="btn btn-success" id="bagirata">Bagi Rata Sisa Kuota</button>
                </div>                                     
              </div>          
            </div> 
            <!-- END STATUS -->
            <div class="col-md-12">
              <hr>              
            </div> 
          </div>
          <!-- END TABLE TOOLBAR -->
            <!-- BEGIN TABLE -->
            <form action="<?=base_url()?>p/kuota/save_kuota" role="form" method="POST">
              <div class="col-md-12">
                <div class="portlet light">
                  <div class="portlet-title">
                    <div class="caption">
                      Kuota Tahun <input type="input" name="tahun" value="<?=$tahun?>" style="border:transparent" readonly>
                    </div>
                  </div>
                  <br>
                  <div class="portlet-body">
                    <div class="row">
                      <div class="col-md-9">
                        <div class="col-md-12">
                          <table class="table table-bordered">
                            <tr class="warning">
                              <th width="80" class="center">Januari</th>
                              <th width="80" class="center">Februari</th>
                              <th width="80" class="center">Maret</th>
                              <th width="80" class="center">April</th>
                              <th width="80" class="center">Mei</th>
                              <th width="80" class="center">Juni</th>
                            </tr>
                            <tr>
                            <?php for($i = 1; $i <= 6; $i++):?>
                              <td><input type="number" name="kuota[<?=$i?>]" maxlength="3" class="form-control kuota" id="k<?=$i?>" value="<?=(isset($data[$i]))?$data[$i]:0?>"></td>
                            <?php endfor; ?>
                            </tr>
                          </table>
                        </div>
                        <div class="col-md-12">
                          <table class="table table-bordered">
                            <tr class="warning">
                              <th width="80" class="center">Juli</th>
                              <th width="80" class="center">Agustus</th>
                              <th width="80" class="center">September</th>
                              <th width="80" class="center">Oktober</th>
                              <th width="80" class="center">November</th>
                              <th width="80" class="center">Desember</th>
                            </tr>
                            <tr>
                            <?php for($i = 7; $i <= 12; $i++):?>
                              <td><input type="number" name="kuota[<?=$i?>]" maxlength="3" class="form-control kuota" id="k<?=$i?>" value="<?=(isset($data[$i]))?$data[$i]:0?>"></td>
                            <?php endfor; ?>
                            </tr>
                          </table>
                          <span style="color:red">*</span> <span style="font-style:italic;font-weight:bold">Menekan Enter berarti mengirim !</span>
                        </div>
                      </div>

                      <div class="divider-vertical pull-left"></div>

                      <div class="col-md-2">
                          <h2 style="margin-top:-4px">Sisa Kuota</h2>
                          <hr>
                          <input type="text" style="width:100px;padding-left:10px;background-color:transparent;font-size:25px;font-weight:bold;padding-bottom:5px;margin-top:-15px; " class="filter-status col-md-2" id="sisa" value="<?=$jumlah?>" readonly>
                          <input type="submit" class="btn default btn-block green-stripe" style="font-weight:bold" name="tb" value="Simpan">
                          <a href="<?php echo base_url().'dashboard/kuota';?>" class="btn default btn-block red-stripe" style="font-weight:bold">Batal</a>
                      </div>
                    </div>
                  </div>
                </div>                  
              </div>
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-12">
                    <div class="pull-right">
                    </div>  
                  </div>
                </div>
              </div>
            </form>  
            <!-- END OF TABLE -->
          </div>  
          <!-- END PORTLET BODY -->
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
      // BEGIN LOAD
      var jum = 0;

      for (var i = 1; i <= 12; i++) 
      {
        jum += Number($("#k"+i).val());
      }

      $("#sisa").val($("#total").val() - jum);
      // BEGIN LOAD

      // BEGIN FUNCTION
      $(".kuota").change(function(){
          jum = 0;
          for (var i = 1; i <= 12; i++) 
          {
            jum += Number($("#k"+i).val());
          }
          
          if ($("#total").val() - jum < 0) 
          {
            alert("Sisa kuota sudah kosong");
            $(this).val(Number($(this).val()) + ($("#total").val() - jum))
          }
          else
          {
            $("#sisa").val($("#total").val() - jum);
          }
      });

      $("#bagirata").click(function(){
          var mod = 0;
          for (var i = 1; i <= 12; i++) 
          {
            if($("#k"+i).val() == 0)
            {
              mod++;
            } 
          }

          if (mod == 0 || $("#sisa").val() == 0) 
          {
              alert("Kuota tidak ada yang kosong atau sisa kuota = 0");
              return;
          }

          for (var i = 1; i <= 12; i++) 
          {
            if($("#k"+i).val() == 0)
            {
              $("#k"+i).val(Math.round($("#sisa").val() / mod));
            } 
          }
          
          $("#sisa").val($("#sisa").val() % mod);
      });

      // END FUNCTION

  });
</script>