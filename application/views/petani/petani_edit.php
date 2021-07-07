    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>Petani</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Input</a></li>
              <li class="breadcrumb-item active">Petani</li>
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
            <h3 class="card-title">Input Data Petani</h3>
          </div>

          <form action="<?=site_url('petani/process')?>" method="post">
            <input type="hidden" class="form-control" name="id" value="<?=$row->petani_id?>">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Petani</label>
                <input type="text" class="form-control" name="nama" value="<?=$row->nama?>"placeholder="Masukan Nama">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nik</label>
                <input type="number" class="form-control" name="nik" value="<?=$row->nik?>" placeholder="Masukan Nomor KTP">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?=$row->alamat?>"placeholder="Alamat">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nomor HP</label>
                <input type="number" class="form-control" name="no_hp" value="<?=$row->no_hp?>"placeholder="Nomor HP">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Koperasi</label>
                <?php echo form_dropdown('koperasi', $koperasi, $selectedkoperasi,
                        ['class'=>'form-control','required' =>'required']);?>
              </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Jenis Penanaman</label>
                <?php echo form_dropdown('penanaman', $penanaman, $selectedpenanaman,
                        ['class'=>'form-control','required' =>'required']);?>
                </div>

            <div class="card-footer">
              <button type="submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
    </section>
</div>