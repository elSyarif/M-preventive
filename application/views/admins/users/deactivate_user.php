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

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                 <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">

						<?php echo sprintf(lang('deactivate_subheading'));?>
                        		<span class="label label-primary"><?php echo $user->first_name.' '.$user->last_name;?></span>
                        	</h3>
                    </div>      

                 <!-- isi -->
                <div class="box-body">
                <?php echo form_open("admin/user/deactivate/".$user->id);?>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="confirm" id="confirm1" value="yes" checked="checked"> <?php echo strtoupper(lang('deactivate_confirm_y_label', 'confirm')); ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="confirm" id="confirm0" value="no"> <?php echo strtoupper(lang('deactivate_confirm_n_label', 'confirm')); ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <?php echo form_hidden($csrf); ?>
                            <?php echo form_hidden(array('id'=>$user->id)); ?>
                            <div class="btn-group">
                                <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('deactivate_submit_btn'))); ?>
                                <?php echo anchor('admin/user', lang('deactivate_Batal_btn'), array('class' => 'btn btn-default btn-flat')); ?>
                            </div>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>

<!-- Batas Conten  -->
</section>
</div>






<?php 
    $this->load->view('admins/_templates/footer'); 
    $this->load->view('admins/_templates/main_footer'); 
?>