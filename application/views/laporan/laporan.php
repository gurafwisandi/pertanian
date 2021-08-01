<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Laporan</h3>
    </div>
    <div class="card-body">
      <form action="<?=site_url('laporan/process')?>" method="post">
        <div class="form-group">
          <label>Jenis Laporan</label>
          <select name="jenis_laporan" class="form-control select2" style="width: 100%;" required>
            <option value="">&nbsp;</option>
              <option value="Pengajuan">Pengajuan</option>
              <option value="Penyerahan">Penyerahan</option>
              <option value="Seminar Penagjuan">Seminar Penagjuan</option>
              <option value="Jenis Kebutuhan Petani">Jenis Kebutuhan Petani</option>
              <option value="Koperasi">Jumlah Pengajuan Koperasi</option>
          </select>
        </div>
        <div class="card-footer">
          <button type="submit" name="laporan" value="laporan" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>