    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>Penanaman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Input</a></li>
              <li class="breadcrumb-item active">Data Jenis Penanaman</li>
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
          <h3 class="card-title">Input Data Penanaman</h3>
        </div>

        <form action="<?=site_url('penanaman/process')?>" method="post">
          <input type="hidden" class="form-control" name="id" value="<?=$row->penanaman_id?>"> 
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Jenis <code>*</code></label>
              <input type="text" required class="form-control" name="jenis" value="<?=$row->jenis?>" placeholder="Masukan Nama">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Deskripsi <code>*</code></label>
              <input type="text" required class="form-control" name="deskripsi" value="<?=$row->deskripsi?>" placeholder="Jenis">
            </div>

          <div class="card-footer">
            <button type="submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
              <a href="<?=site_url('penanaman')?>" class="btn btn-warning">Cancel</a>
          </div>
          </form>
        </div>
    </section>
</div>