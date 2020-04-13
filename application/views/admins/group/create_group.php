<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admins/_templates/meta');
$this->load->view('admins/_templates/header');
$this->load->view('admins/_templates/main_sidebar');
 ?>


<!-- isi -->

<div class="content-wrapper">
	<section class="content-header">
		<h1>Data Grup
			<small><?php echo lang('create_group_heading');?></small>
		</h1>	
	  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active"><?php echo lang('create_group_heading');?></li>
      </ol>
<div id="infoMessage"><?php echo $message;?></div>
<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Group</h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open("admin/auth/create_group");?>
              <div class="box-body">
                <div class="form-group">
                  <label for="groupname">
                  <?php echo lang('create_group_name_label', 'group_name');?> </label>
                  <?php echo form_input($group_name);?>
                </div>
                <div class="form-group">
                  <label for="description"><?php echo lang('create_group_desc_label', 'description');?></label>
                  <?php echo form_input($description);?>
                </div>     
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><?php echo lang('create_group_submit_btn');?></button>
              </div>
          <?php echo form_close();?>
          </div>
          <!-- /.box -->
      </div>
   </div>


</section>
</div>


<?php 
    $this->load->view('admins/_templates/footer'); 
    $this->load->view('admins/_templates/main_footer'); 
?>