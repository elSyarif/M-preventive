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

</section>
</div>


<?php 
    $this->load->view('admins/_templates/footer'); 
    $this->load->view('admins/_templates/main_footer'); 
?>