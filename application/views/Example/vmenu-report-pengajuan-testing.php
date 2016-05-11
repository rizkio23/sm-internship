
<div class="main">

  <!--judul menu-->
  <div class="page-title dash">
    <h3>Daftar Laporan</h3>
  </div> 

  <!--breadcrumb-->
  <ol class="breadcrumb dash">
    <li><a href="#">Home</a></li>
    <li class="active">Report Pengajuan PKL</li>            
  </ol>

  <!--buat baris untuk kolom langsung 1 tabel ke kiri-->
  <div class="row">
    <!-- BEGIN PORTLET -->
    <div class="col-md-12">
      <div class="portlet box blue">


        <!-- judul tabel-->
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-book"></i>Report Pengajuan PKL [Diklat]
          </div>
        </div>

        <!-- isi tabel-->
        <div class="portlet-body">          
          <!-- tombol tambah menu-->
          <div class="table-toolbar">
            <div class="row">
              <div class="col-md-12">
                <br>



                <!-- search bulan -->
                <div class="btn-group pull-left">
                <label class="col-md-5 control-label">Bulan</label>
                </div> 
                <div class="col-md-1 control-label">
                <select class="col-md-20 control-label" name="unit">
                    <!-- Name dicocokkan database -->
                      <option>januari</option>
                      <option>februari</option>
                      <option>maret</option>
                    </select>
                <br>
                </div> 

                <!-- search tahun -->
                <div class="btn-group pull-left">
                <label class="col-md-5 control-label">Tahun</label>
                </div> 

                <div class="col-md-1 control-label">
                <select class="col-md-20 control-label" name="unit">
                    <!-- Name dicocokkan database -->
                      <option>2001</option>
                      <option>2002</option>
                      <option>2003</option>
                    </select>
                <br>
                </div>   

                <!-- Unit kerja -->
                <div class="btn-group pull-left">
                <label class="col-md-30 control-label">Unit kerja</label>
                </div>                 

                <div class="col-md-1 control-label">
                <select class="col-md-20 control-label" name="unit">
                      <option>Unit kerja 1</option>
                      <option>Unit kerja 1</option>
                      <option>Unit kerja 1</option>
                    </select>
                <br>
                </div> 
                

                <!-- status -->
                <div class="btn-group pull-left">
                <label class="col-md-5 control-label">Status</label>
                </div>                 

                <div class="col-md-2 control-label">
                <select class="col-md-20 control-label" name="unit">
                    <!-- Name dicocokkan database -->
                      <option>Diterima</option>
                      <option>Diterima</option>
                      <option>Ditangguhkan</option>                      
                    </select>
                <br>
                <br>                

                </div> 

                <div class="btn-group pull-left">
                <button href="#responsive" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                </div>





                <div>
                  <vr> 
                  </div> 

                  <div class="btn-group pull-right">
                    Total pengajuan :<input type="text" class="form-control login-input" name="nama" placeholder="500" required >
                    Diterima :<input type="text" class="form-control login-input" name="nama" placeholder="25" required >
                    Ditolak :<input type="text" class="form-control login-input" name="nama" placeholder="75" required >
                    Ditangguhkan :<input type="text" class="form-control login-input" name="nama" placeholder="50" required >                                      
                    <br>
                    <br>
                  </div> 

                </div>
              </div>
            </div>  

            <!-- BEGIN TABLE  -->
            <table class="table table-striped table-bordered table-hover">
             <thead>
               <tr>
                 <th style="text-align:center">No</th>
                 <th>Nama</th>
                 <th>Nomer Induk</th>                 
                 <th>Instansi</th>                                   
                 <th>Bidang</th>
                 <th>status</th>
               </tr>
             </thead>

             <tr>                                  
               <td>1</td>
               <td>affn</td>
               <td>122410101001</td>                 
               <td>UNEJ</td>
               <td>Teknologi Informasi</td>
               <td> - </td>
            </tr> 

            <tr>                                  
               <td>2</td>
               <td>affnd</td>
               <td>122410101002</td>                 
               <td>UNEJ</td>
               <td>Teknologi Informasi</td>
               <td>Diterima</td>
          </tr> 

            <tr>                                  
               <td>3</td>
               <td>affng</td>
               <td>122410101003</td>                 
               <td>UNEJ</td>
               <td>Teknologi Informasi</td>
               <td>Ditolak</td>
          </tr> 

            <tr>                                  
               <td>4</td>
               <td>affnd</td>
               <td>122410101004</td>                 
               <td>UNEJ</td>
               <td>Teknologi Informasi</td>
               <td>Ditangguhkan</td>
          </tr> 


        </table> 
        <!-- END OF TABLE -->


                <button href="" class="btn btn-primary">Download</button>

      </div>
    </div>
  </div>
  <!-- ENF PORTLET -->
</div>
</div>
