
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b style="color: orange">A</b><?php echo $title_mini?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b  style="color: orange">Admin </b><?php echo $title_lg; ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


  <!-- user acount -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('ses_Username'); ?></span><!-- Diseting  -->
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                  <p><?php echo $this->session->userdata('ses_Nama'); ?><small><?php echo $this->session->userdata('ses_Jabatan'); ?></small></p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                </div>
                
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!-- <?php echo site_url('admin/users/profile/'.$user_login['id']); ?> -->
                  <a href="#" class="btn btn-default btn-flat"><?php echo 'profile'; ?></a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('admin/login/logout'); ?>" class="btn btn-default btn-flat"><?php echo 'Logout'; ?></a>
                </div>
              </li>
            </ul>
          </li>
<!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="<?php echo site_url('admin/chat');?>">
              <i class="fa fa-envelope-o"></i>
              <!-- <span class="label label-success">4</span> -->
            </a>

      </div>
    </nav>
  </header>