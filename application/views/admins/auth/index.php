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
        <?php echo lang('index_heading');?>
        <small><?php echo lang('index_subheading');?></small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <div id="infoMessage"><?php echo $message;?></div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                <?php echo anchor('admin/auth/create_user',lang('index_create_user_link'),array('class' => 'btn btn-block btn-success'))?>

              </h3>
              <h3 class="box-title">
                <?php echo anchor('admin/auth/create_group',lang('index_create_group_link'),array('class' => 'btn btn-block btn-info'))?>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><?php echo lang('index_fname_th');?></th>
                  <th><?php echo lang('index_lname_th');?></th>
                  <th><?php echo lang('index_email_th');?></th>
                  <th><?php echo lang('index_groups_th');?></th>
                  <th><?php echo lang('index_status_th');?></th>
                  <th><?php echo lang('index_action_th');?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user):?>
                <tr>
                   <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                  <td>
                       <?php foreach ($user->groups as $group):?>
                       <?php echo anchor("admin/auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
               </td>
                <td><?php echo ($user->active) ? anchor("admin/auth/deactivate/".$user->id, lang('index_active_link')) : anchor("admin/auth/activate/". $user->id, lang('index_inactive_link'));?></td>
                <td><?php echo anchor("admin/auth/edit_user/".$user->id, 'Edit') ;?></td>
                </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>




    <!-- /.content -->
  </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">

              	<?php echo anchor('auth/create_user',lang('index_create_user_link'),array('class' => 'btn btn-block btn-success'))?>

              </h3>
              <h3 class="box-title">
              	<?php echo anchor('auth/create_group',lang('index_create_group_link'),array('class' => 'btn btn-block btn-info'))?>
    </h3>
                            	
            </div>

           <div class="box-body">
              <table id="userTable" class="table table-bordered table-hover">
                <thead>
                	<tr>
						
					</tr>
                </thead>
                <tbody>
     			
                <tr>
                             
                </tr>
                	
            </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
<!-- Footer -->

<?php 
    $this->load->view('admins/_templates/footer'); 
    $this->load->view('admins/_templates/main_footer'); 
?>


<!-- DataTables -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/framework/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
