<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admins/_templates/meta');
$this->load->view('admins/_templates/header');
$this->load->view('admins/_templates/main_sidebar');
 ?>


<!-- isi -->

<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo lang('edit_group_heading');?>
			<small></small>
		</h1>	
	  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active"><?php echo lang('edit_group_heading');?></li>
      </ol>
      <?php if ($this->session->flashdata('message')):?>
       <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?php echo $this->session->flashdata('message'); ?>
              </div>
      <?php endif ?>
<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('edit_group_subheading');?></h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open(current_url());?>
              <div class="box-body">
                <div class="form-group">
                  <label for="groupname">
                  <?php echo lang('edit_group_name_label', 'group_name');?> </label>
                  <?php echo form_input($group_name);?>
                </div>
                <div class="form-group">
                  <label for="description"><?php echo lang('edit_group_desc_label', 'description');?></label>
                  <?php echo form_input($group_description);?>
                </div>     
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><?php echo lang('edit_group_submit_btn');?></button>
              </div>
          <?php echo form_close();?>
          </div>
          <!-- /.box -->
      </div>
   </div>
</section>
</div>
<h1></h1>



<?php 
    $this->load->view('admins/_templates/footer'); 
    $this->load->view('admins/_templates/main_footer'); 
?>