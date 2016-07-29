<!-- BEGIN CONTENT -->
<div class="page-wrapper">
  <!-- BEGIN PAGE TITLE -->
  <div class="page-title dash">
    <h3>Pembina</h3>
  </div>
  <!-- END OF PAGE TITLE -->

  <!-- BEGIN BREADCRUMB -->
  <ol class="breadcrumb dash">
    <li><a href="#">Halaman Utama</a></li>
    <li class="active">Detail Bimbingan</li>
  </ol>
  <!-- END OF BREADCRUMB -->

  <div class="row">
    <!-- BEGIN PORTLET -->
    <div class="col-md-8">
      <div class="portlet box blue-chambray">
        <!-- PORTLET TITLE -->
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-lg fa-users"></i>Detail Bimbingan
          </div>
        </div>
        <!-- END PORTLET TITLE -->
        <!-- PORTLET BODY  -->
        <div class="portlet-body">
          <div class="table-toolbar">
            <div class="row">
              <form method="GET" action="<?=base_url()?>dashboard/report">
                <div class="col-md-11">
                  <div class="filter-table ">
                    <label class="control-label">Tahun:</label>
                      <select style="width:75px;height:30px" name="tahun">
                        <option value="all" selected>Semua</option>
                      </select>
                  </div>
                  <div class="filter-table">
                    <label class="control-label">Bulan:</label>
                      <select style="width:100px;height:30px" name="bulan">
                        <option value="all" selected>Semua</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="btn-group pull-right">
                  <input type="submit" class="btn btn-success" name="tb" value="Filter">
                  </div>
                </div>
              </form>
              <div class="col-md-12">
                <hr>
              </div>
            </div>
          </div>
          <!-- BEGIN TABLE -->
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="center">No ID</th>
                <th class="center">Nama</th>
                <th class="center">Unit Kerja</th>
                <th class="center">Bulan</th>
                <th class="center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="center"></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="center" width:"100">
                  <a href="">
                    <a href="#"><button class="btn btn-xs btn-warning btn-icon"><i class="fa fa-search"></i> DETAIL</button></a>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- END OF TABLE -->
        </div>
        <!-- END OF PORTLET BODY -->
      </div>
    </div>

    <div class="col-md-4">
      <a class="dashboard-stat dashboard-stat-light green-meadow">
        <div class="visual">
          <i class="fa fa-users"></i>
        </div>
        <div class="details">
          <div class="number">
            100 <b>Orang</b>
          </div>
          <div class="desc">
            Jumlah Bimbingan Bulan Ini
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
<!-- END OF PAGE -->
