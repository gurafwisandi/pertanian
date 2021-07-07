    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>Koperasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Input</a></li>
              <li class="breadcrumb-item active">Data Koperasi</li>
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
                <h3 class="card-title">Input Data Koperasi</h3>
              </div>

              <form action="<?=site_url('koperasi/process')?>" method="post">
                <input type="hidden" class="form-control" name="create_by" value="<?=$this->fungsi->user_login()->user_id?>">
                <input type="hidden" class="form-control" name="id" value="<?=$row->koperasi_id?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Koperasi</label>
                    <input type="text" class="form-control" name="nama" value="<?=$row->nama?>"placeholder="Masukan Nama Koperasi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ketua Koperasi</label>
                    <input type="text" class="form-control" name="ketua" value="<?=$row->ketua?>"placeholder="Masukan Nama ketua Koperasi">
                  </div>
<!--                   <div class="form-group">
                    <label>Ketua</label>
                    <?php echo form_dropdown('petani', $petani, $selectedpetani,
                            ['class'=>'form-control','required' =>'required']);?>
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?=$row->alamat?>"placeholder="Alamat Koperasi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nomor Telepon</label>
                    <input type="number" class="form-control" name="telpon" value="<?=$row->telpon?>"placeholder="Masukan Telpon">
                  </div>
<!--                   <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
<!--                   <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div> -->
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
    </section>
</div>