<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admins/_templates/meta');
$this->load->view('admins/_templates/header');
$this->load->view('admins/_templates/main_sidebar');
 ?>

<!-- isi -->

<div class="content-wrapper">
	<section class="content-header">
		<h1>Data Inspeksi
			<small>Laporan inspeksi</small>
		</h1>	
	  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
        <li class="active">Data Inspeksi</li>
      </ol>
<!-- Main content -->
    <section class="content">
      <?php if ($this->session->flashdata('warning')):?>
      <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                <?php echo $this->session->flashdata('warning'); ?>
        </div>
      <?php endif ?>
      <?php if ($this->session->flashdata('success')):?>
       <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?php echo $this->session->flashdata('success'); ?>
              </div>
      <?php endif ?>
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
                  <th>Checker</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
               <?php $no=1;
               	foreach ($data_laporan as $r) {
               	?>
                <tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $r['No_Mesin']; ?></td>
					<td><?php echo $r['Nama_Mesin'];?></td>
					<td><?php echo $r['Area'];?></td>
					<td><?php echo $r['nama_lengkap']?></td>
					<td><?php echo $r['Tgl_inspeksi'];?></td>
					<td>
						<a href="<?php echo base_url('admin/laporan/detail_laporan/'.$r['Id']); ?>" class="btn btn-block btn-default">
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
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>