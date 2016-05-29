<!-- BEGIN CONTENT -->
<div class="page-wrapper">

  <!-- BEGIN PAGE TITLE -->
  <div class="page-title dash">
    <h3>Berkas</h3>
  </div>
  <!-- END OF PAGE TITLE -->

  <!-- BEGIN BREADCRUMB -->
  <ol class="breadcrumb dash">
    <li><a href="#">Halaman Utama</a></li>
    <li class="active">Berkas Laporan</li>
  </ol>
  <!-- END OF BREADCRUMB -->

  <div class="row">
    <!-- BEGIN PORTLET -->
    <div class="col-md-7">
      <div class="portlet box blue-hoki">
        <!-- PORTLET TITLE -->
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-lg fa-archive"></i>Berkas
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
              <tr>
                <th class="center">No</th>
                <th class="center">Nama Berkas</th>
                <th class="center">Nama File</th>
                <th class="center">Unduh</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            foreach($data as $key):
            ?>
              <tr>
                <td class="center"><?=$no++?></td>
                <td class="center"><?=$key['nama']?></td>
                <td class="center"><?=$key['file']?></td>
                <td class="center">
                  <a href="">
                    <button class="btn btn-warning"><i class="fa fa-download"></i></button>
                  </a>
                </td>
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
          <i class="fa fa-lg fa-upload"></i> Unggah Berkas
        </div>
      </div>
      <!-- END PORTLET TITLE -->
      <!-- BEGIN FORM -->
      <div class="portlet-body form">
        <form enctype="multipart/form-data" class="form-horizontal"  role="form" method="POST" action="<?=base_url()?>p/berkas/upload_dokumen">
          <div class="form-body">
            <div class="form-group">
              <label class="col-md-3 control-label">Nama</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="nama" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Berkas</label>
              <div class="col-md-8">
                <input type="file" class="form-control" name="file" required>
              </div>
            </div>
            <div class="form-actions">
              <div class="row">
                <div class="col-md-offset-3 col-md-8s">
                  <input type="submit" name="tb" class="btn btn-primary" value="Simpan">
                  <button type="button" class="btn btn-danger">Batal</button>
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
