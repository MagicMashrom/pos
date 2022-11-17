
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Toko Aneka Jaya</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini <?=$this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null?>">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=site_url('dashboard')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>AJ</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Toko Aneka Jaya</b></span>
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
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="img-user fa fa-user"></i>
              
              <span class="hidden-xs"> <?= ucfirst($this->fungsi->user_login()->username) ?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>assets/dist/img/user.png" class="img-circle" alt="User Image">

                <p>
                <?= $this->fungsi->user_login()->name ?>
                  <small><?= $this->fungsi->user_login()->address ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= site_url('user/profile') ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=site_url('auth/logout') ?>" class="btn bg-red btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
          <img src="<?=base_url()?>assets/dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= ucfirst($this->fungsi->user_login()->username) ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?=site_url('dashboard')?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
      
        <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 3) { ?>
        <li <?= $this->uri->segment(1) == 'supplier' ? 'class="active"' : '' ?>>
          <a href="<?=site_url('supplier')?>">
            <i class="fa fa-truck"></i>
            <span>Suppliers</span>
          </a>
        </li>
        <?php } ?>
        
        <!-- <?php if($this->session->userdata('level') == 1) { ?>
        <li <?= $this->uri->segment(1) == 'customer' ? 'class="active"' : '' ?>>
          <a href="<?=site_url('customer')?>">
            <i class="fa fa-users"></i>
            <span>Customers</span>
          </a>
        </li>
        <?php } ?> -->
        <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 3) { ?>
        <li class="treeview <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' || $this->uri->segment(1) == 'barang' ? 'active' : '' ?>" >
          <a href="#">
            <i class="fa fa-archive"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 3) { ?>
            <!-- <li <?= $this->uri->segment(1) == 'category' ? 'class="active"' : '' ?>><a href="<?=site_url('category')?>"><i class="fa fa-circle-o"></i> Categories</a></li> -->
            <li <?= $this->uri->segment(1) == 'unit' ? 'class="active"' : '' ?>><a href="<?=site_url('unit')?>"><i class="fa fa-circle-o"></i>Units</a></li>
            <li <?= $this->uri->segment(1) == 'item' ? 'class="active"' : '' ?>><a href="<?=site_url('item')?>"><i class="fa fa-circle-o"></i> Items</a></li>
            <?php } ?>
            <?php if( $this->session->userdata('level') == 2) { ?>
            <li <?= $this->uri->segment(1) == 'barang' ? 'class="active"' : '' ?>><a href="<?=site_url('barang')?>"><i class="fa fa-circle-o"></i> Items</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>
        <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 3) { ?>
        <li class="treeview <?= $this->uri->segment(1) == 'stock' || $this->uri->segment(1) == 'penjualan' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) { ?>
            <li <?= $this->uri->segment(1) == 'penjualan' ? 'class="active"' : '' ?>>
            <a href="<?=site_url('penjualan/index/'.GetKodePenjualan())?>"><i class="fa fa-circle-o"></i> Sales</a>
          </li>
          <?php } ?>
            <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 3) { ?>
            <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"' : '' ?>>
                <a href="<?=site_url('stock/in')?>"><i class="fa fa-circle-o"></i> Stock In</a>
            </li>
            <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'class="active"' : '' ?>>
                <a href="<?=site_url('stock/out')?>"><i class="fa fa-circle-o"></i> Stock Out</a></li>
            <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'return' ? 'class="active"' : '' ?>>
                <a href="<?=site_url('stock/return')?>"><i class="fa fa-circle-o"></i> Return</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>
       
        <li class="treeview" <?= $this->uri->segment(1) == 'laporan' ? 'class="active"' : '' ?>>
          <a href="#">
            <i class="fa fa-pie-chart"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

          <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) { ?>
            <li <?= $this->uri->segment(1) == 'laporan' ? 'class="active"' : '' ?>>
              <a href="<?=site_url('laporan')?>"><i class="fa fa-circle-o"></i> Sales</a>
            </li>
          <?php } ?>

          <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 3) { ?>
            <li <?= $this->uri->segment(1) == 'laporan' && $this->uri->segment(2) == 'stock_in' ? 'class="active"' : '' ?>>
              <a href="<?=site_url('laporan/stock_in')?>"><i class="fa fa-circle-o"></i> Stock In</a>
            </li>
            <li <?= $this->uri->segment(1) == 'laporan' && $this->uri->segment(2) == 'stock_out' ? 'class="active"' : '' ?>>
              <a href="<?=site_url('laporan/stock_out')?>"><i class="fa fa-circle-o"></i> Stock Out / Opname</a></li>
            <li <?= $this->uri->segment(1) == 'laporan' && $this->uri->segment(2) == 'stock_return' ? 'class="active"' : '' ?>>
              <a href="<?=site_url('laporan/stock_return')?>"><i class="fa fa-circle-o"></i> Return</a></li>
          </ul>
        </li>
        <?php } ?>
        <?php if($this->fungsi->user_login()->level == 1) { ?>
        <li class="header">SETTINGS</li>
        <li><a href="<?=site_url('user')?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <?php } ?>

        <!-- <?php if($this->fungsi->user_login()->level == 1) { ?>
        <li class="header">SETTINGS</li>
        <li><a href="<?=site_url('')?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <?php } ?> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- =============================================== -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php echo $contents ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2021 <a href="">Chairul Anwar</a>.</strong> All rights
    reserved.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>

<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  $(document).ready(function(){
    $('#table1').DataTable()
  })
</script>
</body>
</html>
