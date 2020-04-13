<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admins/_templates/meta');
$this->load->view('admins/_templates/header');
$this->load->view('admins/_templates/main_sidebar');
 ?>

<!-- isi -->

<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo lang('_mesin_heading');?>
			<small>Mesin</small>
		</h1>	
	  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Mesin</a></li>
        <li class="active">Data Mesin</li>
      </ol>

<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box box-info">
        <div class="box-header with-border ">
          <h3 class="box-title">
           Data Mesin
          </h3>
        </div>
        <!-- Isi -->
<?php echo form_open_multipart('admin/mesin/create_action'); ?>
    <div class="box-body">
      <div class="clearfix">
        <div class="form-group">
          <label for="no_mesin" class="control-label"><span class="text-danger">*</span>
            Nomer Mesin
          </label>
          <input type="text" name="No_Mesin" value="<?php echo $this->input->post('No_Mesin'); ?>" class="form-control" id="No_Mesin" />
          <span class="text-danger"><?php echo form_error('No_Mesin');?></span>
        </div>
        <div class="form-group">
          <label for="nama_mesin" class="control-label">
            Nama Mesin
          </label>
          <input type="text" name="Nama_Mesin" value="<?php echo $this->input->post('Nama_Mesin'); ?>" class="form-control" id="Nama_Mesin" />
        </div>
        <div class="form-group">
          <label for="area_mesin" class="control-label">
            Area
          </label>
          <input type="text" name="Area" value="<?php echo $this->input->post('Area'); ?>" class="form-control" id="Area" />
        </div>
        <div class="form-group">
          <label for="Gambar" class="control-label">
            Area
          </label>
          <input type="file" name="Gambar" id="Area" />
        </div>
      </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-success">
                <i class="fa fa-check"></i> Save
              </button>
            </div>
      </div>
  <?php echo form_close(); ?>    
      </div>
    </div>
  </div>

</section>

<!-- Batas Conten  -->
</section>
</div>






<?php 
    $this->load->view('admins/_templates/footer'); 
    $this->load->view('admins/_templates/main_footer'); 
?>