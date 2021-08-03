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
        <h3 class="card-title">Input Data Instansi</h3>
      </div>
      <form action="<?=site_url('koperasi/process')?>" enctype="multipart/form-data" method="post">
        <input type="hidden" class="form-control" name="id" value="<?=$row->koperasi_id?>">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Instansi</label>
            <input type="text" class="form-control" name="nama" value="<?=$row->koperasi?>"placeholder="Masukan Nama Koperasi">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama</label>
            <input type="text" class="form-control" name="ketua" value="<?=$row->ketua?>"placeholder="Masukan Nama ketua Koperasi">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?=$row->alamat?>"placeholder="Alamat Koperasi">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nomor Telepon</label>
            <input type="number" class="form-control" name="telpon" value="<?=$row->telpon?>"placeholder="Masukan Telpon">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Foto</label>
            <input type="file" class="form-control" name="file" <?php if($page == 'approve_dinas'){ echo "disabled"; }else{ if($row->foto){ }else{ echo "required";} }?> placeholder="Telpon">
            <?php if($row->foto){ ?>
              <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#doc"></i> Lihat Dokumen</a>
            <?php } ?>
          </div>
        <div class="card-footer">
          <button type="submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
</section>

<div class="modal fade" id="doc" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
					Foto</span> 
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php 
				$doc = $row->foto;
				?>
				<?php $file=substr($doc,-3);
				if($file=='JPG' or $file=='PNG' or $file=='jpg' or $file=='jpeg' or $file=='png' or $file=='PEG' or $file=='peg'){?>
						<img src="<?php echo base_url() ?>assets/user/<?php echo $doc; ?>" width="450" class="img-responsive" id="rotate-image7" style="border-radius: 10px;display: block;margin-left: auto;margin-right: auto;">
				<?php }elseif( $file=='pdf' OR $file=='PDF'){?>
						<object data="<?php echo base_url() ?>assets/user/<?php echo $doc; ?>#view=Fit" type="application/pdf" width="100%" height='850px'>
						</object>
				<?php }else{ }?>
			</div>
		</div>
	</div>
</div>