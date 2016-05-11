  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">

    <!-- BEGIN PAGE TITLE -->
    <div class="page-title dash">
      <h3>Persetujuan Unit Kerja</h3>
    </div>
    <!-- END OF PAGE TITLE -->

    <!-- BEGIN BREADCRUMB -->
    <ol class="breadcrumb dash">
      <li><a href="#">Halaman Utama</a></li>
      <li class="active">Persetujuan Unit Kerja</li>
    </ol>
    <!-- END OF BREADCRUMB -->

    <div class="row">
      <!-- BEGIN PORTLET -->
      <div class="col-md-12">
        <div class="portlet box blue">
          <!-- PORTLET TITLE -->
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-check-square-o"></i>Persetujuan Unit Kerja
            </div>
          </div>
          <div class="portlet-body">
            <div class="table-toolbar">
              <div class="row">
                <div class="col-md-8">
                  <div class="filter-table">
                    <label class="control-label">Total pengajuan:</label>
                      <input type="text" style="width:100px;border-radius:4px;padding-left:10px" class="filter-status" placeholder="50" readonly>
                  </div>
                  <div class="filter-table">
                    <label class="control-label">Diterima:</label>
                    <input type="text" style="width:100px;border-radius:4px;padding-left:10px" class="filter-status"  placeholder="50" readonly>
                  </div>
                  <div class="filter-table">
                    <label class="control-label">Ditolak:</label>
                    <input type="text" style="width:100px;border-radius:4px;padding-left:10px" class="filter-status"  placeholder="50" readonly>
                  </div>
                </div>
              </div>
            </div>
            <!-- BEGIN TABLE -->
            <table class="table table-striped table-bordered table-hover" id="setujuUK">
              <thead>
                <tr>
                  <th class="center">Nomor Pengajuan</th>
                  <th class="center">Nomor Induk</th>
                  <th class="center">Nama</th>
                  <th class="center">Instansi</th>
                  <th class="center">Bidang</th>
                  <th class="center" width="150px">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1; foreach($data as $key):?>
                <tr id="data<?=$no?>">
                <td class="center"><input type="text" id="id<?=$no?>" value="<?=$key['id_pengajuan']?>" class="filter-status-sm" readonly></td>
                  <td class="center"><?=$key['no_induk']?></td>
                  <td class="center"><?=$key['nama']?></td>
                  <td class="center"><?=$key['instansi']?></td>
                  <td class="center"><?=$key['bagian']?></td>
                  <td class="center" id="status<?=$no?>">
                  <?php if($key['status'] === '1'): ?>
                    <button class="btn btn-success" onclick="verifikasi(<?=$no?>, 2)"><i class="fa fa-check"></i></button>
                    <button class="btn btn-danger" data-toggle="modal" href="#penolakan" onclick="tolak_klik(<?=$no?>)"><i class="fa fa-times"></i></button>
                  <?php elseif($key['status'] === '2'): ?>
                    <label class="label label-sm label-success">Diterima</label>
                  <?php elseif($key['status'] === '-1'): ?>
                    <label class="label label-sm label-danger">Ditolak</label>
                  <?php endif; ?>
                  </td>
                </tr>
              <?php $no++; endforeach; ?>
              </tbody>
            </table>
            <!-- END OF TABLE -->
          </div>
        </div>
        <!-- END PORTLET TITLE -->
      </div>
    </div>
    <!-- END OF PORTLET -->
  </div>
  <!-- END OF ROW -->
</div>
<!-- END OF CONTENT -->
</div>
<!-- END OF PAGE -->


<!-- BEGIN MODAL -->
<div class="modal fade" id="penolakan" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title"><span><i class="fa fa-plus"></i></span> Alasan Penolakan</h4>
      </div>
    <!-- BEGIN FORM  -->

    <!-- BEGIN MODAL BODY -->
      <div class="modal-body">
        <div style="height:350px" data-always-visible="1" data-rail-visible="1">

          <div class="form-body">
            <div class="form-group">
              <label>Alasan</label>
                <textarea type="text" class="form-control" id="deskripsi" placeholder="Deskripsi" rows="2" required></textarea>
            </div>
          </div>

        </div>
      </div>
      <!-- END OF MODAL BODY -->

      <!-- BEGIN MODAL FOOTER -->
      <div class="modal-footer">
        <button class="btn btn-danger" onclick="tolak(-1)" data-dismiss="modal">TOLAK</button>
        <button class="btn btn-warning">BATAL</button>
      </div>
      <!-- END OF MODAL FOOTER -->
    <!-- ENF OF FORM -->
    </div>
  </div>
</div>
<!-- END MODAL -->



<script type="text/javascript">

  var no = null;

  function tolak_klik(n)
  {
    this.no = n;
  }

  function tolak(s)
  {
    verifikasi(this.no, s);
  }

  function verifikasi(n, status)
  {
    verData(n, status);
  }

  /// JQUERY

  $(document).ready(function($){
    // simpan data
    window.verData = function(no, st)
    {
          var id        = $("#id"+no);
          var link      = '<?=base_url()?>p/member/verifikasi_diklat';
          var alasan    = 'none';

          if (st==-1) {
            alasan = $("#deskripsi").val();
          }

          $.ajax({
            type: "POST",
            url: link,
            data:{id_pengajuan:id.val(), status:st, alasan:alasan},
            success: function(data){
              $("#status"+no).empty();
              if (st==2) {
                $("#status"+no).html("<label class='label label-sm label-success'>Diterima</label>");
              }else{
                $("#data"+no).hide();
              }
            },
            error: function(xhr, ajaxOption, thrownError){
              //alert("Error: "+xhr.status+" "+thrownError);
              location.reload();
            }
          });
    }

  });
  /// END JQUERY
</script>
