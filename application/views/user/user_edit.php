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
                    <label for="exampleInputEmail1">Nama User</label>
                    <input type="text" class="form-control" name="nama" value="<?=$row->nama?>"placeholder="Masukan Nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                    <input type="text" class="form-control" name="nip" value="<?=$row->nip?>" placeholder="Masukan NIP">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" value="<?=$row->jabatan?>" placeholder="Masukan Jabatan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" class="form-control" name="username" value="<?=$row->username?>"placeholder="Alamat">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">email</label>
                    <input type="email" class="form-control" name="email" value="<?=$row->email?>"placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" value="<?=$row->password?>"placeholder="password">
                  </div>
                  

                <div class="card-footer">
                  <button type="submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
    </section>
</div>