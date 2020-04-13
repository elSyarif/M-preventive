<?php 
$this->load->view('admins/_templates/meta');
$this->load->view('admins/_templates/header');
$this->load->view('admins/_templates/main_sidebar');
 ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('edit_user_heading');?>
        <small><?php echo lang('edit_user_subheading');?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User</a></li>
        <li class="active"><?php echo 'Edit Data User';?></li>
      </ol>
    </section>
<div id="infoMessage"></div>
<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data User</h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open('admin/user/edit/'.$data_user['id_user']); ?>

            <div class="box-body">
              <div class="clearfix">
                <div class="form-group">
                  <label for="nip" class="control-label"> NIP </label>
                  <input type="hidden" name="id" value="<?php echo $data_user['id_user']; ?>">
                  <input type="text" name="NIP" required="required" value="<?php echo $data_user['NIP'];?>" class="form-control"/> 
                </div>
                <div class="form-group">
                  <label for="nama" class="control-label"> Nama Lengkap </label>
                  <input type="text" name="nama" required="required" value="<?php echo $data_user['nama_lengkap'];?>" class="form-control"/> 
                </div>
                <div class="form-group">
                  <label for="username" class="control-label"> Username </label>
                  <input type="text" name="username" required="required" value="<?php echo $data_user['username'];?>" class="form-control"/> 
                </div>
                <div class="form-group">
                  <label for="pass" class="control-label"> Jabatan </label>
                  <input type="text" name="Jabatan" required="required" value="<?php echo $data_user['Jabatan'];?>" class="form-control"/> 
                </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-success">
                <i class="fa fa-check"></i> Update
              </button>
            </div>
            <?php echo Form_close();?>
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

<!-- iCheck -->
<script src="<?php echo base_url('assets/framework/')?>plugins/iCheck/icheck.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/framework/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>