	  <!-- BEGIN CONTENT -->
	  <div class="page-wrapper">

	    <!-- BEGIN PAGE TITLE -->
	    <div class="page-title dash">
	      <h3>Kelompok</h3>
	    </div>
	    <!-- END OF PAGE TITLE -->

	    <!-- BEGIN BREADCRUMB -->
	    <ol class="breadcrumb dash">
	      <li><a href="#">Home</a></li>
	      <li class="active">Kelompok</li>
	    </ol>
	    <!-- END OF BREADCRUMB -->

	    <div class="row">
	      <!-- BEGIN PORTLET -->
	      <div class="col-md-12">
	        <div class="portlet box green-jungle">
	          <!-- PORTLET TITLE -->
	          <div class="portlet-title">
	            <div class="caption">
	              <i class="fa fa-exchange"></i>Data Kelompok
	            </div>
	          </div>
	          <!-- END PORTLET TITLE -->
	          <!-- PORTLET BODY -->
	          <div class="portlet-body">
	            <!-- BEGIN TABLE -->
	            <table class="table table-hover table-bordered" id="tujuh">
	            	<thead>
	            		<tr>
	            			<th class="center">Nomer Pendaftaran</th>
	            			<th class="center">Instansi</th>
	            			<th class="center">Bidang Diajukan</th>
	            			<th class="center">Tujuan</th>
	            			<th class="center">Bulan Pengajuan</th>
	            			<th class="center">Jumlah Anggota</th>
	            			<th class="center">Status</th>
	            			<th class="center">Aksi</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            	<?php foreach($member as $key): ?>
	            		<tr>
	            			<td class="center"><?=$key['id']?></td>
	            			<td class="center"><?=$key['instansi']?></td>
	            			<td class="center"><?=$key['bagian']?></td>
	            			<td class="center"><?=$key['jenis']?> (<?=$key['durasi']?> bulan)</td>
	            			<td class="center"><?=date('F Y', strtotime($key['bulan_pengajuan']))?></td>
	            			<td class="center"><?=$key['jumlah']?></td>
	            			<td class="center">
			                <?php
			                switch ($key['status']) {
			                  case 1:
			                      echo "<label class='label label-sm label-default'>Menunggu</label>";
			                      break;
			                  case 2:
			                      echo "<label class='label label-sm label-success'>Menunggu</label>";
			                      break;
			                  case 3:
			                      echo "<label class='label label-sm label-success'>Disetujui</label>";
			                      break;
			                  case 0:
			                      echo "<label data-toggle='modal' href='#tolak' class='label label-sm label-danger'>Ditolak</label>";
			                      break;
			                  case -1:
			                      echo "<label class='label label-sm label-default'>draft</label>";
			                      break;
			                  default:
			                      echo "<label class='label label-sm label-danger'>ERROR</label>";
			                      break;
			                  }
			                ?>
			                </td>
                  			<td class="center">
                  				<a href="<?=base_url()?>dashboard/kelompok_detail?id=<?=$key['id']?>" target="_blank">
			                      <button class="btn btn-xs btn-warning btn-icon"><i class="fa fa-list"></i></button>
			                    </a>
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
	  </div>
	  <!-- END OF CONTENT -->
	</div>
	<!-- END OF PAGE -->
