<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admins/_templates/meta');
$this->load->view('admins/_templates/header');
$this->load->view('admins/_templates/main_sidebar');
 ?>
<div class="content-wrapper">
	<section class="content-header">
		<div class="row">
			<div class="col-lg-12">

          <!-- DIRECT CHAT DANGER -->
          <div class="box box-danger direct-chat direct-chat-danger" >
            <div class="box-header with-border">
              <h3 class="box-title">Emergency Chat</h3>

            <!-- /.box-header -->
            <div class="box-body" > 
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages" style="height:500px">

			<?php

			foreach ($getPesan as $pesan) :
				
				// echo "<strong>".$pesan->id_pengirim."</strong> - ";
				
        
        echo "</br>";
      ?>


        <!-- Message. Default to the left -->
        <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                     <span class="direct-chat-name pull-left"><?php echo "<strong>".$pesan->nama_lengkap."</strong>"; ?></span>  <!--Nama di pengirim -->
                    <span class="direct-chat-timestamp pull-right"><?php                 
                    echo date('d/m/Y - H:i',strtotime($pesan->time));?></span> <!--waktu pesan di kirim -->
                  </div>
                  <!-- /.direct-chat-info -->
            
                  <div class="direct-chat-text">
                    
									<?php echo $pesan->pesan.""; ?>
				          </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->



      <?php
        
      endforeach;
			?>
			
                <!-- /.direct-chat-msg -->	
              </div>
              <!--/.direct-chat-messages-->
            </div>
			
            <!-- /.box-body -->
            <div class="box-footer">
              <!-- <form action="#" method="post"> -->
                <div class="input-group">
                <input type="hidden" name="user" id="user" class="form-control" value="<?php echo $this->session->userdata('ses_Id'); ?>">
                  <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-danger btn-flat" onclick="addPesan();">Send</button>
                      </span>
                </div>
              <!-- </form> -->
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>
        <!-- /.col -->
			
			</div>
        </div>
      </section>
</div>




<?php 
    $this->load->view('admins/_templates/footer'); 
    $this->load->view('admins/_templates/main_footer'); 
?>
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>

  <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('6aca76fcd033f964372b', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
    
	function addPesan() {
  
		var value ={
      user : $('#user').val(),
			message : $('#message').val()
		}
    $.ajax({
      url: '<?=base_url();?>admin/chat/add_pesan',
      type: 'POST',
      data: value,
      dataType: 'JSON'
    })
    location.reload();
	}
</script>