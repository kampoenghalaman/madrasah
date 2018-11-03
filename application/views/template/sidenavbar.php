<!-- Side Navbar -->
<?php 
  $user = $this->session->userdata('nama');
  $akses = $this->session->userdata('akses');
  if($akses == 0){
    $jabatan = 'GURU';
  }elseif($akses = 1){
    $jabatan = 'TATA USAHA';
  }
?>
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <div class="sidenav-header-inner text-center"><img src="<?php echo base_url();?>assets/backend/img/avatar-1.jpg" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5 text-uppercase"><?php echo strtoupper($user);?></h2><span class="text-uppercase"><?php echo $jabatan;?></span>

          </div>
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">
            <li> <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i class="icon-interface-windows"></i><span>Kelas</span>
                <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
              <ul id="pages-nav-list" class="collapse list-unstyled">
                <li> <a href="<?php echo base_url('Siswa/index.html?kelas='.'1') ?>">Kelas 1</a></li>
                <li> <a href="<?php echo base_url('Siswa/index.html?kelas='.'2') ?>">Kelas 2</a></li>
                <li> <a href="<?php echo base_url('Siswa/index.html?kelas='.'3') ?>">Kelas 3</a></li>
                <li> <a href="<?php echo base_url('Siswa/index.html?kelas='.'4') ?>">Kelas 4</a></li>
                <li> <a href="<?php echo base_url('Siswa') ?>">Semua Siswa</a></li>
              </ul>
            </li>            
            <?php if($akses == 1){?>      
            <li> <a href="<?php echo base_url('Duid') ?>"> <i class='icon-presentation'></i><span>Keuangan  </span></a></li>
            <?php }?>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page home-page">