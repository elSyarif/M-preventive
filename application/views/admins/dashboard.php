<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admins/_templates/meta');
$this->load->view('admins/_templates/header');
?>

<?php 
$this->load->view('admins/_templates/main_sidebar');
 ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Dashboard
      <small>Control Panel</small>
    </h1> 
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> home</a></li>
        <li class="active">Dashboard</li>
      </ol>

      <!-- conten Utama -->
      <section class="content">
        <div class="row">
          <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php echo $count_mesin; ?></h3> <!-- data yang tampil dari database -->
                <p>Data Mesin</p>
              </div>
              <div class="icon">
                <i class="ion ion-gear-b"></i>
              </div>
              <a class="small-box-footer" href="<?php echo base_url('admin/mesin'); ?>">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div> 
          <!-- data 2 -->
        <div class="col-lg-6 col-xs-6">
          <!-- Isi box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $count_users; ?></h3> <!--  data yang tampil dari database-->
              <p>Data User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('admin/user'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./data -->
        <!-- data 3 -->
        <div class="col-lg-6 col-xs-6">
          <!-- Isi box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php echo $count_inspeksi; ?></h3> <!--  data yang tampil dari database-->
              <p>Data Inspeksi</p>
            </div>
            <div class="icon">
               <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('admin/laporan'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./data -->
        <!-- data 4 -->
        <div class="col-lg-6 col-xs-6">
          <!-- Isi box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $count_jadwal; ?></h3> <!--  data hari-->
              <p>Data Jadwal Inspeksi</p>
            </div>
            <div class="icon">
               <i class="ion-android-calendar"></i>
            </div>
            <a href="<?php echo base_url('admin/Jadwal'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./data -->
        </div>
  <!-- <div class="row"> -->
        <!-- Left col -->
        <!-- <section class="col-lg-12 connectedSortable"> -->
          <!-- Custom tabs (Charts with tabs)-->
          <!-- <div class="nav-tabs-custom"> -->
            <!-- Tabs within a box -->
            <!-- <ul class="nav nav-tabs pull-right"> -->
      <!--         <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li class="pull-left header"><i class="fa fa-gears "></i>Graph Inspeksi</li>
            </ul>
            <div class="tab-content no-padding"> -->
              <!-- Morris chart - Sales -->
              <!-- <div class="chart" id="revenue-chart" style="height: 300px;"></div> -->
              <!-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div> -->
    <!--         </div>
          </div>
        </section>
</div> -->
      </section>
<!-- Batas Conten  -->
</section>
</div>


<!-- Footer -->

<?php 
    $this->load->view('admins/_templates/footer'); 
?>
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url('assets/framework/')?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/framework/')?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/framework/')?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url('assets/framework/')?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/framework/')?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/framework/')?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/framework/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/framework/')?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/framework/')?>dist/js/demo.js"></script>
<script>
  $(function () {

    "use strict";
    // AREA CHART
    var line = new Morris.Line({
      element: 'revenue-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 1285, item2: 2666, item3: 854},
        {y: '2011 Q2', item1: 2778, item2: 2294, item3: 2854},
        {y: '2011 Q3', item1: 4912, item2: 1969, item3: 2854},
        {y: '2011 Q4', item1: 3767, item2: 3597, item3: 2854},
        {y: '2012 Q1', item1: 6810, item2: 1914, item3: 2854},
        {y: '2012 Q2', item1: 5670, item2: 4293, item3: 2854},
        {y: '2012 Q3', item1: 4820, item2: 3795, item3: 2854},
        {y: '2012 Q4', item1: 15073, item2: 5967, item3: 2854},
        {y: '2013 Q1', item1: 10687, item2: 4460, item3: 2854},
        {y: '2013 Q2', item1: 8432, item2: 5713, item3: 2854}
      ],
      xkey: 'y',
      ykeys: ['item1', 'item2','item3'],
      labels: ['Item 1', 'Item 2','item3'],
      lineColors: ['#a0d0e0', '#3c8dbc','#3a9dbc'],
      hideHover: 'auto'
    });
  });
  </script>
</body>
</html>
