<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admins/_templates/meta');
echo '<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">';
$this->load->view('admins/_templates/header');
$this->load->view('admins/_templates/main_sidebar');
 ?>

<!-- isi -->

<div class="content-wrapper">
	<section class="content-header">
		<h1>Data History
			<small>History</small>
		</h1>	
	  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Data History</a></li>
        <li class="active">Data History</li>
      </ol>

<?php 
        foreach ($this->data['detail_history'] as $value) {
        	$Nomor = $value->No_Mesin;
        	$Nama_Mesin = $value->Nama_Mesin;
        	$Area = $value->Area;
        }

			
?>
<section class="invoice">
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">
				<span class="fa fa-line-chart">  Data Detail Inspeksi</span>
				<small class="pull-right"> Tanggal : <?php echo date('d-m-y'); ?> </small>
			</h3>
		</div>
	</div>
	<div class="row invoice-info">
		<div class="col-sm-4 invoice-col">
			<table class="table table-hover">
				<tr>
					<th>Area</th>
					<td><span>: </span> <?php echo $Area; ?> </td>
				</tr>
				<tr>
					<th>Nama Mesin</th>
					<td><span>: </span> <?php echo $Nama_Mesin; ?> </td>
				</tr>
				<tr>
					<th>Nomor Mesin</th>
					<td><span>: </span><?php echo $Nomor; ?>  </td>
				</tr>
			</table>
        </div>
        <div class="col-sm-4 invoice-col">
			
        </div>
		</div>
		<div class="row">
			<div class="col-xs-12 table-responsive">
				<section class="col-lg-8 connectedSortable">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs pull-right">
					 		<li class="active"><a href="#Inspeksi-chart" data-toggle="tab">Inspeksi</a></li>
					 		<li ><a href="#Temp-chart" data-toggle="tab">Temperature</a></li>
							<li class="pull-left header"><i class="fa fa-gears "></i>Graph Inspeksi</li>
						</ul>
						<!-- chart -->
					<div class="tab-content no-padding">
						<div class="chart tab-pane active" id="Inspeksi-chart" style="height: auto;"></div>
						<div class="chart tab-pane" id="Temp-chart" style="position: relative; height: 300px;"></div>
					</div>
					</div>
				</section>
				<section class="col-lg-4 connectedSortable">
					<table class="table table-hover">
						<tr>
							<th colspan="2"> Keterangan</th>
						</tr>
						<tr>
							<th style="color:#00ced1;"><span class="fa  fa-stop"></span></th>
							<td>Drive End OV H </td>
						</tr>
						<tr>
							<th style="color:#990000;"><span class="fa  fa-stop"></span></th>
							<td>Drive End OV V </td>
						</tr>
						<tr>
							<th style="color:#3a3a55;"><span class="fa  fa-stop"></span></th>
							<td>Drive End BV H </td>
						</tr>
						<tr>
							<th style="color:#f56924;"><span class="fa  fa-stop"></span></th>
							<td>Drive End BV V </td>
						</tr>
						<tr>
							<th style="color:#e79191;"><span class="fa  fa-stop"></span></th>
							<td>Non Drive End OV H </td>
						</tr>
						<tr>
							<th style="color:#7c4f4f;"><span class="fa  fa-stop"></span></th>
							<td>Non Drive End OV V </td>
						</tr>
						<tr>
							<th style="color:#30c6fa;"><span class="fa  fa-stop"></span></th>
							<td>Non Drive End BV H </td>
						</tr>
						<tr>
							<th style="color:#008000;"><span class="fa  fa-stop"></span></th>
							<td>Non Drive End BV V </td>
						</tr>
						<tr>
							<th style="color:#a0d0e0;"><span class="fa  fa-stop"></span></th>
							<td>Temperatur Drive </td>
						</tr>
						<tr>
							<th style="color:#3c8dbc;"><span class="fa  fa-stop"></span></th>
							<td>Temperatur Non Drive </td>
						</tr>
					</table>
				</section>
			</div>
			<div class="row">
				<div class="col-xs-12">

				</div>
			</div>
		</div>

	</div> 
</section>
<div class="clearfix"></div>


<!-- Batas Conten  -->
</section>
</div>

<?php 
    $this->load->view('admins/_templates/footer'); 
?>
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/framework/')?>dist/js/adminlte.min.js"></script>


<script src="<?php echo base_url('assets/framework/')?>/bower_components/raphael/raphael.min.js"></script>

<script src="<?php echo base_url('assets/framework/')?>/bower_components/morris.js/morris.min.js"></script>


<script>
	$(function(){

		"use strict";
	
		var backend_url     = '<?php echo base_url(); ?>'; 
		var chartData 		= '<?php echo $ChartData; ?>';
		
		var Line = new Morris.Line({
			  // ID of the element in which to draw the chart.
			  element: 'Inspeksi-chart',
			  resize: true,
			  grid:true,
			  // Chart data records -- each entry in this array corresponds to a point on
			  // the chart.
			  data: <?php echo $ChartData; ?>,

			  // The name of the data record attribute that contains x-values.
			  xkey: 'date',
			  // A list of names of data record attributes that contain y-values.
			  ykeys: ['value','value2','value3','value4','value5','value6','value7','value8'],
			  // Labels for the ykeys -- will be displayed when you hover over the
			  // chart.
			  labels: ['Drive End OV H','Drive End OV V','Drive End BV H','Drive End BV V',
			  'Non Drive End OV H','Non Drive End OV V','Non Drive End BV H','Non Drive End BV V'],
			  lineColors: ['#00ced1','#990000','#3a3a55','#f56924',
			  '#e79191','#7c4f4f','#30c6fa','#008000'],
			});

		
		var area = new Morris.Area({
		    element   : 'Temp-chart',
		    resize    : true,
		    data      : <?php echo $Tem_Chart; ?>,
		    xkey      : 'date',
		    ykeys     : ['item', 'item2'],
		    labels    : ['Temperatur Drive', 'Temperatur Non Drive'],
		    lineColors: ['#a0d0e0', '#3c8dbc'],
		    hideHover : 'auto'
  });
	});

</script>

</body>
</html>