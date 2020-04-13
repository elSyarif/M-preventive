

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('ses_Nama'); ?></p> <!-- get username -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li>
          <a href="<?php echo base_url('')?>"> <!-- link -->
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </span>
          </a>
        </li>
<?php if($this->session->userdata('Akses')=='1'):?>
        <li>
          <a href="<?php echo base_url('admin/user')?>">
            <i class="fa fa-user"></i>
            <span>Users</span>
          </a>
        </li>
 <?php endif;?>
        <li>
          <a href="<?php echo base_url('admin/jadwal')?>">
            <i class="fa fa-calendar"></i>
            <span>Jadwal Tugas</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url('admin/Mesin')?>">
            <i class="fa fa-gears"></i>
            <span>Data Mesin</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url('admin/history')?>">
            <i class="fa fa-history"></i>
            <span>Data History</span>
          </a>
        </li>
  <?php if($this->session->userdata('Akses')=='1'):?>      
          <li>
          <a href="<?php echo base_url('admin/laporan')?>">
            <i class="fa fa-line-chart"></i>
            <span>Laporan Inspeksi</span>
          </a>
        </li>
 <?php endif;?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

