<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admins/_templates/meta');
$this->load->view('admins/_templates/header');
$this->load->view('admins/_templates/main_sidebar');
 ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('create_user_heading');?>
        <small><?php echo lang('create_user_subheading');?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
        <li class="active"><?php echo lang('create_user_heading');?></li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data User</h3>
            </div>
            <!-- /.box-header -->

           <div class="box-body table-responsive">
             <?php echo form_open('admin/user/create');?>
                <div class="box-body">
                  <div class="clearfix">
                    <div class="form-group">
                      <label for="NIP" class="control-label">NIP</label>
                      <input type="text" name="NIP" class="form-control" required="required" value="<?php echo $this->input->post('NIP');?>">
                    </div>
                    <div class="form-group">
                      <label for="name" class="control-label">Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" required="required" value="<?php echo $this->input->post('nama');?>">
                    </div>
                    <div class="form-group">
                      <label for="username" class="control-label">Username</label>
                      <input type="text" name="username" required="required" class="form-control" value="<?php echo $this->input->post('username');?>">
                    </div>
                    <div class="form-group">
                      <label for="pass" class="control-label">Password</label>
                      <input type="Password" name="pass" required="required" class="form-control" value="<?php echo $this->input->post('pass');?>">
                    </div>
                    <div class="form-group">
                      <label for="jabatan" class="control-label">Jabatan</label>
                      <input type="text" name="jabatan"required="required" class="form-control" value="<?php echo $this->input->post('jabatan');?>">
                    </div>
                    <div class="form-group">
                      <label for="pass" class="control-label">Hak Akses</label>
                      <input type="text" name="Akses" required="required" class="form-control" value="<?php echo $this->input->post('Akses');?>">
                    </div>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-success">
                      <i class="fa fa-check"></i> Save
                    </button>
                 </div>
                </div>
             <?php echo form_close();?>
           </div>
          <!-- /.box -->
      </div>
   </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
    $this->load->view('admins/_templates/footer'); 
    $this->load->view('admins/_templates/main_footer'); 
?>
<!-- DataTables -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/framework/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
</body>
</html>