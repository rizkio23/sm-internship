  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">
  	<div class="row">
  		<!-- BEGIN PORTLET -->
  		<div class="col-md-12">
  			<!-- BEGIN PORTLET-->
  			<div class="portlet light ">
  				<div class="portlet-title">
  					<div class="caption">
  						<i class="fa fa-lg fa-bar-chart-o font-red-sunglo"></i>
  						<span class="caption-subject font-red-sunglo bold uppercase">Traffic Pengajuan</span>
  						<span class="caption-helper">Tahun 2015</span>
  					</div>
  				</div>
  				<div class="portlet-body">
  					<div id="site_statistics" class="chart">
  					</div>
  				</div>
  			</div>     
  			<!-- END OF PORTLET -->
  		</div>
  		<!-- END OF ROW -->
  		<div class="row">
  			<div class="col-md-4">
  				<div class="col-md-12 col-sm-6 col-xs-12">
  					<a class="dashboard-stat dashboard-stat-light red-soft">
  						<div class="visual">
  							<i class="fa fa-child"></i>
  						</div>
  						<div class="details">
  							<div class="number">
  								<?=($terima + $tolak + $pending)?>
  							</div>
  							<div class="desc">
  								Total Pengajuan
  							</div>
  						</div>
  					</a>
  				</div>

  				<div class="col-md-12 col-sm-6 col-xs-12">
  					<a class="dashboard-stat dashboard-stat-light blue-chambray">
  						<div class="visual">
  							<i class="fa fa-times"></i>
  						</div>
  						<div class="details">
  							<div class="number">
  								<?=$pending?>
  							</div>
  							<div class="desc">
  								Total Penangguhan
  							</div>
  						</div>
  					</a>
  				</div>

  				<div class="col-md-12 col-sm-6 col-xs-12">
  					<a class="dashboard-stat dashboard-stat-light green-jungle">
  						<div class="visual">
  							<i class="fa fa-check"></i>
  						</div>
  						<div class="details">
  							<div class="number">
  								<?=$terima?>
  							</div>
  							<div class="desc">
  								Total Diterima
  							</div>
  						</div>
  					</a>
  				</div>

          <div class="col-md-12 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-light red-thunderbird">
              <div class="visual">
                <i class="fa fa-times"></i>
              </div>
              <div class="details">
                <div class="number">
                  <?=$tolak?>
                </div>
                <div class="desc">
                  Total Ditolak
                </div>
              </div>
            </a>
          </div>    		
  			</div>

  			<div class="col-md-8">
  				<div class="col-md-12 col-sm-6 col-xs-12">
  					<!-- BEGIN PORTLET-->
  					<div class="portlet solid green-meadow">
  						<div class="portlet-title">
  							<div class="caption">
  								<i class="fa fa-lg fa-exclamation"></i>
  								<span class="caption-subject uppercase">Informasi</span>
  							</div>
  						</div>	
  							<div class="portlet-body">
                  <table class="table table-striped table-bordered table-hover">
                    <tr>
                      <td></td>
                    </tr>
                  </table>
  							</div>  						
  					</div>  
  					<!-- END OF PORTLET -->
  				</div>		
  			</div>
  		</div>
  	</div>  
  	<!-- END OF CONTENT -->
  </div>  
  <!-- END OF PAGE -->

<!-- FLOTCHART PLUGINS -->
<script src="<?php echo base_url().'assets/plugin/js/flot/jquery.flot.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugin/js/flot/jquery.flot.categories.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugin/js/index.js';?>"></script>
  <!-- CHART CONTENT -->
  <script type="text/javascript">
    $(document).ready(function() {
 		Index.initCharts(); 
    });
  </script>

