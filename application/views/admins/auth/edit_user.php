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
        <li><a href="#">Forms</a></li>
        <li class="active"><?php echo lang('create_user_heading');?></li>
      </ol>
    </section>
<div id="infoMessage"><?php echo $message;?></div>
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

            <!-- form start -->
            <?php echo form_open(uri_string());?>
              <div class="box-body">
                <div class="form-group">
                  <label for="firstname">
                  <?php echo lang('edit_user_fname_label', 'first_name');?></label>
                  <?php echo form_input($first_name);?>
                </div>
                <div class="form-group">
                  <label for="lastname"><?php echo lang('edit_user_lname_label', 'last_name');?></label>
                  <?php echo form_input($last_name);?>
                </div>
                     
                <div class="form-group">
                  <label for="company"><?php echo lang('edit_user_company_label', 'company');?></label>
                   <?php echo form_input($company);?>
                </div>
                <div class="form-group">
                  <label for="phone"><?php echo lang('edit_user_phone_label', 'phone');?></label>
                    <?php echo form_input($phone);?>
                </div>
                <div class="form-group">
                   <label for="pass"> <?php echo lang('edit_user_password_label', 'password');?></label>
                    <?php echo form_input($password);?>
                </div>
                <div class="form-group">
                   <label for="confrmpass"> <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></label>
                    <?php echo form_input($password_confirm);?>
                </div>
                <?php if ($this->ion_auth->is_admin()): ?>
                <div class="form-group">
                 <label><?php echo lang('edit_user_groups_heading');?></label> 
                  <?php foreach ($groups as $group):?>                 
              <label class="checkbox icheck">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
            </label>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
            <?php endforeach?>

            <?php endif ?>

            <?php echo form_hidden('id', $user->id);?>
            <?php echo form_hidden($csrf); ?>
                </div>      
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><?php echo lang('create_user_submit_btn');?></button>
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