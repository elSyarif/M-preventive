<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admins/_templates/meta');
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

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">            	
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nomor Mesin</th>
                  <th>Nama Mesin</th>
                  <th>Area</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
               <?php $no=1;
               	foreach ($data_history as $r) {
               	?>
                <tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $r['No_Mesin']; ?></td>
					<td><?php echo $r['Nama_Mesin'];?></td>
					<td><?php echo $r['Area'];?></td>
					<td><?php echo $r['Tgl_inspeksi'];?></td>
					<td>
						<a href="<?php echo base_url('admin/history/detail/'.$r['id_mesin']); ?>" class="btn btn-block btn-default">
						Info</a> 
						
					</td>
                </tr>
                <?php	
               	}
                ?>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
<!-- Batas Conten  -->
</section>
</div>

<?php 
    $this->load->view('admins/_templates/footer'); 
    $this->load->view('admins/_templates/main_footer'); 
?>
<!-- DataTables -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/framework/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>