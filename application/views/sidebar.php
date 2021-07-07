
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a class="brand-link">
    <img src="<?=base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Pertanian</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?=$this->fungsi->user_login()->nama?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?=base_url('dashboard')?>" class="nav-link 
            <?php 
              if( $this->uri->segment('1') == 'dashboard' )
              {
                echo 'active';
              }
            ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item
          <?php 
            if( $this->uri->segment('1') == 'user' ) { echo 'menu-open'; }
            if( $this->uri->segment('1') == 'koperasi' ) { echo 'menu-open'; }
            if( $this->uri->segment('1') == 'petani' ) { echo 'menu-open'; }
            if( $this->uri->segment('1') == 'penanaman' ) { echo 'menu-open';}
            if( $this->uri->segment('1') == 'jenis' ) { echo 'menu-open';}
          ?> ">
          <a href="#" class="nav-link 
          <?php  
          if( 
            $this->uri->segment('1') == 'user' OR
            $this->uri->segment('1') == 'koperasi' OR
            $this->uri->segment('1') == 'petani' OR
            $this->uri->segment('1') == 'penanaman' OR
            $this->uri->segment('1') == 'jenis'
            ) 
          { echo 'active'; } ?>
          ">
            <i class="nav-icon fas fa-edit"></i>
            <p>Master<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=base_url('user')?>" class="nav-link
                      <?php 
                        if( $this->uri->segment('1') == 'user' )
                        {
                          echo 'active';
                        }
                      ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>User</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('koperasi')?>" class="nav-link
                      <?php 
                        if( $this->uri->segment('1') == 'koperasi' )
                        {
                          echo 'active';
                        }
                      ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Koperasi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('petani')?>" class="nav-link
                      <?php 
                        if( $this->uri->segment('1') == 'petani' )
                        {
                          echo 'active';
                        }
                      ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Petani</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('penanaman')?>" class="nav-link
                      <?php 
                        if( $this->uri->segment('1') == 'penanaman' )
                        {
                          echo 'active';
                        }
                      ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Penanaman</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('jenis')?>" class="nav-link
                      <?php 
                        if( $this->uri->segment('1') == 'jenis' )
                        {
                          echo 'active';
                        }
                      ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Jenis Alat Pertanian</p>
                    </a>
                  </li>
          </ul>

           <li class="nav-item
          <?php 
            if( $this->uri->segment('1') == 'pengajuan' ) { echo 'menu-open'; }
          ?> ">
          <a href="#" class="nav-link <?php  if( $this->uri->segment('1') == 'pengajuan' ) { echo 'active';} ?>">
            <i class="nav-icon fas fa-edit"></i>
            <p>Pengajuan<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=base_url('pengajuan')?>" class="nav-link
                      <?php 
                        if( $this->uri->segment('1') == 'pengajuan' )
                        {
                          echo 'active';
                        }
                      ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>pengajuan</p>
                    </a>
                  </li>
          </ul>

          <li class="nav-item">
              <a href="<?=base_url('auth/logout')?>" class="nav-link">           
              <i class="far fa-circle nav-icon"></i>
                <p>Logout</p>
              </a>
          </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>