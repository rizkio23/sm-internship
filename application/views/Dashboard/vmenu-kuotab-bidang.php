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
    <li class="active">Kuota</li>
  </ol>
  <!-- END OF BREADCRUMB -->

  <div class="row">
    <!-- BEGIN PORTLET -->
    <div class="col-md-12">
      <div class="portlet box red-thunderbird">
        <!-- PORTLET TITLE -->
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-users"></i>Input Kuota Bidang
          </div>
        </div>
        <!-- END PORTLET TITLE -->
        <!-- PORTLET BODY -->
        <div class="portlet-body">
          <!-- TABLE TOOLBAR -->
          <div class="table-toolbar">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-7">
                  <form role="form" action="<?=base_url()?>dashboard/kuota_bidang" method="get">
                    <label class="control-label"><b>Tahun</b></label>
                    <select style="width:70px" name="tahun">
                      <?php
                      $now = date('Y');
                      $to  = '2010';
                      for($i = $now; $i >= $to; $i--)
                      {
                        if ($i === $now || $i == $filter['tahun']) {
                          echo "<option value='$i' selected>$i</option>";
                          continue;
                        }

                        echo "<option value='$i'>$i</option>";
                      }
                      ?>
                    </select>
                    <label style="margin-left:10px"class="control-label"><b>Bulan</b></label>
                    <select name="bulan">
                      <?php
                      $now = date('m');
                      for($i = 1; $i <= 12; $i++)
                      {
                        if ($i === $now || $i == $filter['bulan']) {
                          echo "<option value='$i' selected>".date('F', strtotime('2000-'.$i.'-1'))."</option>";
                          continue;
                        }

                        echo "<option value='$i'>".date('F', strtotime('2000-'.$i.'-1'))."</option>";
                      }
                      ?>
                    </select>
                    <input type="submit" class="btn btn-primary" value="cek">
                  </form>
                </div>
                <!-- STATUS  -->
                <div class="pull-right">
                  <label class="control-label"><b>Total</b></label>
                  <input type="text" class="filter-status" style="width:150px;border-radius:4px;padding-left:10px" id="total" value="<?=$total?>" readonly>
                  <label class="control-label"><b>Sisa</b></label>
                  <input type="text" class="filter-status" style="width:150px;border-radius:4px;padding-left:10px" id="sisa" value="<?=$total?>" readonly>
                </div>
                <!-- END OF STATUS  -->
              </div>
            </div>
          </div>
          <!-- END TABLE TOOLBAR -->
          <!-- BEGIN TABLE -->
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="center">No</th>
                <th class="center">Bidang</th>
                <th class="center">Jumlah Kuota</th>
                <th class="center">Terpakai</th>
                <th class="center">Sisa</th>
              </tr>
            </thead>
            <tbody>
              <form action="<?=base_url()?>p/kuota/add_kuota_bidang" method="POST">
                <?php $no = 1; foreach($bidang as $key): ?>
                  <input type="hidden" name="bulan" value="<?=$filter['tahun'].''.$filter['bulan']?>">
                  <tr>
                    <td class="center" width="50"><?=$no?></td>
                    <td style="padding-left:15px"><?=$key['bagian']?></td>
                    <td class="center">
                      <input type="number" id="k<?=$no++?>" class="kuota" name="bidang[<?=$key['id']?>]" value="<?=$key['kuota']?>">
                    </td>
                    <td class="center"><?=$key['kuota']-$key['sisa']?></td>
                    <td class="center"><?=$key['sisa']?></td>
                  </tr>
                <?php endforeach; ?>
                <tr>
                  <td colspan="5" align="right">
                    <input type="submit" name="btn_simpan" class="btn btn-success" value="Simpan">
                  </td>
                </tr>
              </form>
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
          <h4 class="modal-title"><span><i class="fa fa-plus"></i></span> Tambah Kuota Bidang</h4>
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

<script type="text/javascript">
  $(document).ready(function(){
      var total_kuota  = <?=$total?>;
      var total_bidang = <?=($no-1)?> 
      var sisa_kuota   = total_kuota;

      for (var i = 1; i <= total_bidang; i++) {
        sisa_kuota -= Number($("#k"+i).val());
      }

      $("#sisa").val(sisa_kuota);

      $(".kuota").keyup(function()
      {
          if (! $(this).val())
          {
            $(this).css("background-color", "red");
            $("input[name='btn_simpan']").prop("disabled",true);
          }else{
            // HITUNG
            var sisa_kuota   = total_kuota;

            for (var i = 1; i <= total_bidang; i++) {
              sisa_kuota -= Number($("#k"+i).val());
            }

            $("#sisa").val(sisa_kuota);

            $(this).css("background-color", "white");
            $("input[name='btn_simpan']").prop("disabled",false);
          }

      });
  });
</script>
