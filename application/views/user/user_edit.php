    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>user</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Input</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Input Data User</h3>
          </div>

          <form action="<?=site_url('user/process')?>" method="post">
            <input type="hidden" class="form-control" name="id" value="<?=$row->user_id?>">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Koperasi</label>
                <input type="text" class="form-control" name="nama" value="<?=$row->koperasi?>" readonly placeholder="Nama Koperasi">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Ketua Koperasi</label>
                <input type="text" class="form-control" name="nama" value="<?=$row->ketua?>" readonly placeholder="Ketua Koperasi">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">email</label>
                <input type="email" class="form-control" name="email" <?php if($page == 'approve'){ echo "readonly"; }?> value="<?=$row->email?>"placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="text" class="form-control" name="password_old" value="<?=$row->password?>">
                <input type="password" class="form-control" name="password" <?php if($page == 'approve'){ echo "readonly"; }?> value="<?=$row->password?>"placeholder="password">
              </div>
              <div class="form-group">
                <label for="selectFloatingLabel2" class="placeholder">Jenis Akun</label>
                <select name="level" class="form-control input-solid" id="selectFloatingLabel2" required <?php if($page == 'approve'){ echo "readonly"; }?>>
                  <option value="">&nbsp;</option>
                  <option value="1" <?php if($row->level == '1'){ echo "selected"; }?>>Dinas</option>
                  <option value="2" <?php if($row->level == '2'){ echo "selected"; }?>>Koperasi</option>
                  <option value="3" <?php if($row->level == '3'){ echo "selected"; }?>>Admin</option>
                </select>  
              </div>
              <div class="form-group">
                <label for="selectFloatingLabel2" class="placeholder">Status</label>
                <select name="status" class="form-control input-solid" id="selectFloatingLabel2" required>
                  <option value="">&nbsp;</option>
                  <option value="1" <?php if($row->status == '1'){ echo "selected"; }?>>Aktif</option>
                  <option value="2" <?php if($row->status == '2'){ echo "selected"; }?>>Tidak Aktif</option>
                </select>  
              </div>
              <div class="card-footer">
                <button type="submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
    </section>
</div>