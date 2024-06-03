<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="https://wahdicenter.id/wp-content/uploads/2023/09/logo-wahdi-center.png?w=200" class="rounded-circle mr-1">
              <b><?php echo $this->session->userdata('admin_username') ?></b></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('Admin/logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a>Web Pembayaran SPP</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a>MN</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
              <a href="<?php echo base_url('Admin/dashboard') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Data</li>
            <li><a class="nav-link" href="kelas.php"><i class="fas fa-database"></i> <span>DATA KELAS</span></a></li>
            <li class="menu-header">Personal</li>
            <li><a class="nav-link" href="petugas.php"><i class="fas fa-user-edit"></i> <span>PETUGAS</span></a></li>
            <li><a class="nav-link" href="siswa.php"><i class="fas fa-user-graduate"></i> <span>SISWA</span></a></li>
            <li class="menu-header">Fitur</li>
            <li><a class="nav-link" href="transaksi.php"><i class="fas fa-money-check-alt"></i> <span>TRANSAKSI PEMBAYARAN</span></a></li>
            <li><a class="nav-link" href="laporan.php"><i class="fas fa-book"></i> <span>LAPORAN</span></a></li>
        </aside>
      </div>