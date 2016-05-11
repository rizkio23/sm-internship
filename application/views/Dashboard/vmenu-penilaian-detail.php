<!-- BEGIN CONTENT -->
<div class="page-wrapper">

  <!-- BEGIN PAGE TITLE -->
  <div class="page-title dash">
    <h3>Detail Nilai</h3>
  </div>
  <!-- END OF PAGE TITLE -->

  <!-- BEGIN BREADCRUMB -->
  <ol class="breadcrumb dash">
    <li><a href="<?php echo base_url().'dashboard/insight';?>">Halaman Utama</a></li>
    <li><a href="#">Penilaian Magang</a></li>
    <li class="active">Detail Nilai</li>
  </ol>
  <!-- END OF BREADCRUMB -->

  <div class="row">
    <!-- BEGIN PORTLET -->
    <div class="col-md-12 col-xs-12">

      <!-- TABEL TEKNIS -->
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption font-red-thunderbird">
              <i class="fa fa-lg fa-plus-circle font-red-thunderbird"></i>
              <span class="caption-subject bold uppercase"> Nilai Teknis</span>
            </div>
            <div class="pull-right">
              <a href="" ><button class="btn red-thunderbird"><i class="glyphicon glyphicon-plus"></i> Tambah Nilai</button></a>
            </div>
          </div>
            <thead>
              <table class="table table-striped">
                <tr>
                  <th class="center">No</th>
                  <th class="center">ID Member</th>
                  <th class="center">Nama</th>
                  <th class="center">Unit</th>
                  <th class="center">Bidang</th>
                  <th class="center">Jenis Kegiatan</th>
                  <th class="center">Jumlah Jam</th>
                  <th class="center">Nilai</th>
                </tr>
            </table>
            </thead>
        </div>
      <!-- END TABEL TEKNIS -->

      <!-- TABEL NON TEKNIS -->
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption font-red-thunderbird">
              <i class="fa fa-lg fa-plus-circle font-red-thunderbird"></i>
              <span class="caption-subject bold uppercase"> Nilai Non Teknis</span>
            </div>
            <div class="pull-right">
              <a href="" ><button class="btn red-thunderbird"><i class="glyphicon glyphicon-plus"></i> Tambah Nilai</button></a>
            </div>
          </div>
            <thead>
              <table class="table table-striped">
                <tr>
                  <th class="center" width="50" style="font-size:13px">No</th>
                  <th class="center" style="font-size:13px">ID Member</th>
                  <th class="center" style="font-size:13px">Nama</th>
                  <th class="center" style="font-size:13px">Unit Kerja</th>
                  <th class="center" style="font-size:13px">Bidang</th>
                  <th class="center"  style="font-size:13px">Disiplin</th>
                  <th class="center"  style="font-size:13px">Kerjasama</th>
                  <th class="center"  style="font-size:13px">Inisiatif</th>
                  <th class="center" width="50" style="font-size:13px">Tanggung Jawab</th>
                  <th class="center"  style="font-size:13px">Keberhasilan</th>
                </tr>
            </table>
            </thead>
        </div>
      <!-- END TABEL NON TEKNIS -->

      <!-- NILAI -->
      <div class="portlet light">
        <div class="portlet-body">
          <div class="portlet-title">
            <div class="caption font-red-thunderbird">
              <i class="fa fa-lg fa-asterisk font-red-thunderbird"></i>
              <span class="caption-subject bold uppercase"> Keterangan</span>
            </div>
          </div>
          <h4 style="font-weight:bold">A = 9-10, B = 7-8, C = 6, D = 2-5</h4>
        </div>
      </div>
      <!--END OF NILAI  -->
    </div>
    <!-- END OF PORTLET -->
  </div>
</div>
<!-- END OF PAGE -->
