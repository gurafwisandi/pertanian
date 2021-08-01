
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
      <?php 
      $this->db->join('koperasi','koperasi.user_id=user.user_id');
      $this->db->where('user.user_id',$this->session->userdata("user_id"));
      $query = $this->db->get('user');
      foreach ($query->result() as $ro_p)
      {
        $koperasi=$ro_p->koperasi;
        $ketua=$ro_p->ketua;
        $foto=$ro_p->foto;
      }
      ?>
      <div class="image">
        <?php if($foto){ ?>
          <img src="<?=base_url('assets/user/'.$foto)?>" style="height:40px;width:40px;" class="img-circle elevation-2" alt="User Image">
        <?php }else{ ?>
          <img src="<?=base_url('assets/dist/img/avatar4.png')?>" style="height:40px;width:40px;" class="img-circle elevation-2" alt="User Image">
        <?php } ?>
      </div>
      <div class="info">
        <a class="d-block"><?php echo $koperasi;?><br><?php echo $ketua;?></a>
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
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <?php if($this->session->userdata("level") != '2'){ ?>
          <li class="nav-item
            <?php 
              if( $this->uri->segment('1') == 'user' ) { echo 'menu-open'; }
              if( $this->uri->segment('1') == 'koperasi' ) { echo 'menu-open'; }
              if( $this->uri->segment('1') == 'petani' ) { echo 'menu-open'; }
              if( $this->uri->segment('1') == 'penanaman' ) { echo 'menu-open';}
              if( $this->uri->segment('1') == 'jenis' ) { echo 'menu-open';}
              if( $this->uri->segment('1') == 'vendor' ) { echo 'menu-open';}
            ?> ">
            <a href="#" class="nav-link 
              <?php  
              if( 
                $this->uri->segment('1') == 'user' OR
                $this->uri->segment('1') == 'koperasi' OR
                $this->uri->segment('1') == 'petani' OR
                $this->uri->segment('1') == 'penanaman' OR
                $this->uri->segment('1') == 'vendor' OR
                $this->uri->segment('1') == 'jenis'
                ) 
              { echo 'active'; } ?>
              ">
              <i class="nav-icon fas fa-th"></i>
              <p>Master<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item 
                <?php 
                  if( $this->uri->segment('1') == 'user' ) { echo 'menu-open'; }
                ?> ">
                <a href="#" class="nav-link
                  <?php 
                    if( $this->uri->segment('1') == 'user' )
                    {
                      echo 'active';
                    }
                  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    User
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=base_url('user')?>" class="nav-link
                      <?php 
                        if( $this->uri->segment('1') == 'user' AND 
                        ($this->uri->segment('2') != 'dinas' AND $this->uri->segment('2') != 'edit_dinas') 
                        AND $this->uri->segment('2') != 'approve_dinas' AND $this->uri->segment('2') != 'add')
                        {
                          echo 'active';
                        }
                      ?>">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>
                        User Koperasi
                      </p>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a href="<?=base_url('user/dinas')?>" class="nav-link
                      <?php 
                        if( ($this->uri->segment('1') == 'user'
                        AND ($this->uri->segment('2') == 'approve_dinas' OR $this->uri->segment('2') == 'dinas' OR $this->uri->segment('2') == 'add' OR $this->uri->segment('2') == 'edit_dinas' ))
                        AND ($this->uri->segment('2') != 'edit') )
                        {
                          echo 'active';
                        }
                      ?>">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>
                        User Dinas
                      </p>
                    </a>
                  </li>
                </ul>
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
                  <p>Instansi</p>
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
              <li class="nav-item">
                <a href="<?=base_url('vendor')?>" class="nav-link
                  <?php 
                    if( $this->uri->segment('1') == 'vendor' )
                    {
                      echo 'active';
                    }
                  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vendor</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
        <li class="nav-item
          <?php 
            if( $this->uri->segment('1') == 'pengajuan'  OR $this->uri->segment('1') == 'monev') { echo 'menu-open'; }
          ?> ">
          <a href="#" class="nav-link <?php  if( $this->uri->segment('1') == 'pengajuan' OR $this->uri->segment('1') == 'monev' ) { echo 'active';} ?>">
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
                <p>Pengajuan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('monev')?>" class="nav-link
                <?php 
                  if( $this->uri->segment('1') == 'monev' )
                  {
                    echo 'active';
                  }
                ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Monev</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
            <a href="<?=base_url('laporan')?>" class="nav-link">           
            <i class="nav-icon fas fa-book"></i>
              <p>Laporan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=base_url('auth/logout')?>" class="nav-link">           
            <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Logout</p>
            </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>