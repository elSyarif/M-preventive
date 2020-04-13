<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admins/_templates/meta');
$this->load->view('admins/_templates/header');
$this->load->view('admins/_templates/main_sidebar');
 ?>
<div class="content-wrapper">
	<section class="content-header">
		<div class="row">
			<div class="col-lg-8">
        <div class="box box-info direct-chat direct-chat-info">
          <div class="box-header with-border">
            <h3 class="box-title"> Chat Emergency</h3>
              <span class="pull-right" style="padding-right: 30px"><button class="btn btn-info btn-toolbar"> Pesan Baru</button></span>
          </div>
          <div class="box-body">

                <div class="direct-chat-messages">
                <?php foreach ($getPesan as $Key):
                    
                    $nama = $Key->nama_lengkap;
                    $pesan = $Key->pesan;
                    $waktu = $Key->time;


                 ?>
                    <!-- isi chat  -->
                    <a href="#" class="hover" data-toggle="modal" data-target="#modal-edit<?php  ?>"> 
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"> <?php  echo $nama;?> </span>
                        <span class="direct-chat-timestamp pull-right"><?php echo $waktu ?></span>
                      </div>
                      <div class="direct-chat-info">
                          <?php echo $pesan;?> 
                        </div>
                    </div></a>
                  <?php  endforeach;?>

                  <!-- lanjutan -->
                  <a href="#" class="hover"> 
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"> Nama </span>
                        <span class="direct-chat-timestamp pull-right"> 2018-22-09</span>
                      </div>
                      <div class="direct-chat-info">
                          assalamualaikaum 
                        </div>
                    </div></a>
                </div>

          </div>
          <div class="box-footer">
            
          </div>
        </div>
            
          </div> 
        </div>
      </select>

			
			</div>
        </div>
      </section>
</div>

  <div class="modal fade" id="modal-title">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Pesan</h4>
        </div>
      </div>
  </div>
  </div>


<?php 
    $this->load->view('admins/_templates/footer'); 
    $this->load->view('admins/_templates/main_footer'); 
?>

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