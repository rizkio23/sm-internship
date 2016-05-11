	<div style="margin-left: 195px;margin-top: 0px;min-height: 600px;padding: 25px 20px 10px">

		<!-- BEGIN PORTLET -->
		<div class="col-md-12">
		  <div class="portlet box blue">
		    <div class="portlet-title">
		      <div class="caption">
		        <i class="fa fa-book"></i>Daftar Member
		      </div>
		    </div>
		    <div class="portlet-body">          
		      <div class="table-toolbar">
		        <div class="row">
		          <div class="col-md-12">
		            <div class="btn-group pull-right">
		              <button data-toggle="modal" href="#responsive" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Member</button>
		            </div>
		          </div>
		        </div>
		      </div>  

		      <!-- BEGIN TABLE  -->
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
		              <td><input type="number" name="kuota" maxlength="3" class="form-control kuota" id="k" value=""></td>
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
		              <td><input type="number" name="kuota" maxlength="3" class="form-control kuota" id="k" value=""></td>
		            </tr>
		          </table>
		          <span style="color:red">*</span> <span style="font-style:italic;font-weight:bold">Menekan Enter berarti mengirim !</span>
		        </div>
		      </div>

		      <div class="divider-vertical pull-left"></div>

		      <div class="col-md-2">
		          <h2 style="margin-top:-4px">Sisa Kuota</h2>
		          <hr>
		          <input type="text" style="width:100px;padding-left:10px;background-color:transparent;font-size:25px;font-weight:bold;padding-bottom:5px;margin-top:-15px; " class="filter-status col-md-2" id="sisa" value="" readonly>
		          <input type="submit" class="btn default btn-block green-stripe" style="font-weight:bold" name="tb" value="Simpan">
		          <button class="btn default btn-block red-stripe" style="font-weight:bold">Batal</button>
		      </div>
		      <!-- END OF TABLE -->

		      <!-- BEGIN MODAL -->
		      <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
		        <div class="modal-dialog">
		          <div class="modal-content">
		            <!-- judul modal  -->
		            <div class="modal-header">
		              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		              <h4 class="modal-title"><span><i class="fa fa-plus"></i></span> Tambah Member</h4>
		            </div>
		            <!-- BEGIN FORM  -->
		            <form role="form" method="POST" action="<?=base_url()?>p/role/menu_add?ref=<?=password_hash('tambahMenu', PASSWORD_BCRYPT)?>">        
		              <!-- BEGIN MODAL BODY -->
		              <div class="modal-body">
		                <div style="height:660px" data-always-visible="1" data-rail-visible="1">
		                  <div class="form-body">
		                    <div class="form-group">
		                      <label>Nama</label>
		                      <input type="text" class="form-control login-input" name="nama" required>
		                    </div>
		                    <div class="form-group">
		                      <label>No. Induk</label>
		                      <input type="text" class="form-control login-input" name="no_induk" required>
		                    </div>
		                    <div class="form-group">
		                      <label>Alamat</label>
		                      <textarea type="text" class="form-control" name="deskripsi" placeholder="Alamat" rows="2" required></textarea>
		                    </div>  
		                    <div class="form-group">
		                      <label>Jenis kelamin</label>                                                          
		                      <br>                                                          
		                      <input style="padding: 600px 10000px;" type="radio" name='visible' value="1" checked=""> Laki - laki
		                      <input type="radio" name='visible' value="0"> Perempuan
		                    </div>
		                    <div class="form-group">
		                      <br>
		                      <label>No. Handphone</label>
		                      <input type="text" class="form-control login-input" placeholder="08xxxxxxxxxx" name="no_hp" required>
		                    </div>   
		                    <div class="form-group">
		                      <label>Tanggal lahir</label>
		                      <br> 
		                      <input type="text" id="datepicker" name="tanggal_lahir" required>
		                    </div>   
		                    <div class="form-group">
		                      <label>Foto</label>
		                      <input type="file" name="foto" required>
		                      <p class="help-block">Max file 250kb, max size (1024 x 768 px).</p>  
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
		  </div>
		</div>
		<!-- END PORTLET -->    



	</div>
</div>