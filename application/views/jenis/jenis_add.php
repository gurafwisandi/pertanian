    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>Kebutuhan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Input</a></li>
              <li class="breadcrumb-item active">Jenis Kebutuhan</li>
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
                <h3 class="card-title">Input Data Kebutuhan</h3>
              </div>

              <form action="<?=site_url('jenis/process')?>" method="post">
                

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kebutuhan</label>
                    <input type="hidden" name="id" value="<?=$row->jenis_id?>" class="form-control">
                    <input type="text" class="form-control" name="kebutuhan" value="<?=$row->kebutuhan?>"placeholder="Masukan Nama" required>
                  </div>

                <div class="card-footer">
                  <button type="submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
    </section>
</div>