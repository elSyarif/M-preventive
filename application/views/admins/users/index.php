<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admins/_templates/meta');
$this->load->view('admins/_templates/header');
$this->load->view('admins/_templates/main_sidebar');
 ?>

<!-- isi -->

<div class="content-wrapper">
	<section class="content-header">
		<h1>Data Users
			<small>User</small>
		</h1>	
	  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> users</a></li>
        <li class="active">Data Users</li>
      </ol>
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
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
<?php if($this->session->userdata('Akses')=='1'):?>
            <div class="box-header">
              <h3 class="box-title">           	
               <?php echo anchor('admin/user/create',lang('index_create_user_link'),array('class' => 'btn btn-block btn-success'))?>               </h3>
            </div>
  <?php endif;?>

            <!-- /.box-header -->
            <div class="table-responsive">
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width: 10px"><?php echo '#';?></th>
                  <th><?php echo 'NIP';?></th>
                  <th><?php echo 'Nama Lengkap';?></th>
                  <th><?php echo 'Jabatan';?></th>
                  <th><?php echo lang('index_action_th');?></th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($data_user as $user):?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $user['NIP']; ?></td>
                  <td><?php echo $user['nama_lengkap']; ?></td>
                  <td><?php echo $user['Jabatan']; ?></td>               
                <td> 
                <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-edit<?php echo $user['id_user']; ?>">
                      <span class="fa fa-edit"></span></a> 
                <a href="<?php echo site_url('admin/user/delete/'.$user['id_user']); ?>" class="btn btn-danger btn-xs">
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
      <!-- Edit User -->
      <?php $no=1; foreach ($data_user as $user):
        $id_user  = $user['id_user'];
        $NIP      = $user['NIP'];
        $nama     = $user['nama_lengkap'];
        $username = $user['username'];
        $Jabatan  = $user['Jabatan'];
      ?>
        <div class="modal fade" id="modal-edit<?php echo $user['id_user']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Data User</h4>
              </div>
              <?php echo form_open('admin/user/edit/'.$id_user);?>
                <div class="box-body">
                  <div class="clearfix">
                    <div class="form-group">
                      <label for="NIP" class="control-label">NIP</label>
                      <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
                      <input type="text" name="NIP" class="form-control" value="<?php echo $user['NIP'];?>">
                    </div>
                    <div class="form-group">
                      <label for="name" class="control-label">Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" value="<?php echo $user['nama_lengkap'];?>">
                    </div>
                    <div class="form-group">
                      <label for="username" class="control-label">Username</label>
                      <input type="text" name="username" class="form-control" value="<?php echo $user['username'];?>">
                    </div>
                    <div class="form-group">
                      <label for="Jabatan" class="control-label">Jabatan</label>
                      <input type="text" name="Jabatan" class="form-control" value="<?php echo $Jabatan;?>">
                    </div>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-success">
                      <i class="fa fa-check"></i> Save
                    </button>
                 </div>
                </div>
            </div>
             <?php echo form_close();?>
          </div>
        </div>
            <!-- /.modal-content -->
       <?php endforeach;?>     
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
      'info'        : false,
      'autoWidth'   : false
    })
  })
</script>
<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</body>
</html>