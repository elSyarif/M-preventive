<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admins/_templates/meta');
$this->load->view('admins/_templates/header');
$this->load->view('admins/_templates/main_sidebar');
 ?>

<!-- isi -->
<?php ?>

<div class="content-wrapper">
	<section class="content-header">
		<h1>Data Mesin
			<small>Mesin</small>
		</h1>	
	  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Mesin</a></li>
        <li class="active">Data Mesin</li>
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
                <?php echo anchor('admin/mesin/create',lang('_mesin_btn_tambah'),array('class' => 'btn btn-block btn-success'))?>

              </h3>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
            <div class="box-body">
              <table id="example" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th><?php echo lang('index_fno_mesin_th');?></th>
                  <th><?php echo lang('index_fnama_mesin_th');?></th>
                  <th><?php echo lang('index_farea_mesin_th');?></th>
                  <th><?php echo lang('index_fgambar_mesin_th');?></th>
                  <th><?php echo lang('index_action_th');?></th>
                </tr>
                </thead>

                <tbody>

                <?php 
                $no=1;
                foreach($data_mesin as $m): ?>
                <tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $m['No_Mesin']; ?></td>
					<td><?php echo $m['Nama_Mesin']; ?></td>
					<td><?php echo $m['Area']; ?></td>
          <td>
            <img src="<?php echo base_url ().'upload/images/'.$m['Gambar']; ?>" width="50px" height="auto">
          </td>
					<td>
					<a href="<?php echo base_url('admin/mesin/edit/'.$m['ID']); ?>" class="btn btn-info btn-xs">
						<span class="fa fa-edit"></span></a> 

          <a href="<?php echo base_url('admin/mesin/delete/'.$m['ID']); ?>" class="btn btn-danger btn-xs">
              <span class="fa fa-trash"></span></a>
					</td>
                </tr>
				<?php endforeach;?>
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
    $('#example').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>
