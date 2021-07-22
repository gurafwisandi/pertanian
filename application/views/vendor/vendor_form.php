    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>Vendor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Input</a></li>
              <li class="breadcrumb-item active">Data Vendor</li>
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
          <h3 class="card-title">Input Data Vendor</h3>
        </div>

        <form action="<?=site_url('vendor/process')?>" method="post">
          <input type="hidden" class="form-control" name="id" value="<?=$row->id_vendor?>"> 
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Vendor</label>
              <input type="text" class="form-control" name="nama_vendor" value="<?=$row->nama_vendor?>" placeholder="Masukan Nama Vendor" required>
            </div>

          <div class="card-footer">
            <button type="submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
              <a href="<?=site_url('vendor')?>" class="btn btn-warning">Cancel</a>
          </div>
          </form>
        </div>
    </section>
</div>