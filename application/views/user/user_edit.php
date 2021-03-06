    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>User</h1>
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

          <form action="<?=site_url('user/process')?>" enctype="multipart/form-data" method="post">
            <input type="hidden" class="form-control" name="id" value="<?=$row->user_id?>">
            <input type="hidden" class="form-control" name="koperasi_id" value="<?=$row->koperasi_id?>">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nip <code>*</code></label>
                <input autocomplete="off" type="text" class="form-control" name="nip" required value="<?=$row->nip?>" <?php if($page == 'approve_dinas'){ echo "readonly"; }?> placeholder="Nip">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama <code>*</code></label>
                <input autocomplete="off" type="text" class="form-control" name="ketua" required value="<?=$row->ketua?>" <?php if($page == 'approve_dinas'){ echo "readonly"; }?> placeholder="<?php if($page == 'dinas'){ echo "Nama"; }else{ echo "Ketua Koperasi"; } ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Jabatan <code>*</code></label>
                <input autocomplete="off" type="text" class="form-control" name="jabatan" required value="<?=$row->jabatan?>" <?php if($page == 'approve_dinas'){ echo "readonly"; }?> placeholder="Jabatan">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Alamat <code>*</code></label>
                <input autocomplete="off" type="text" class="form-control" name="alamat" required value="<?=$row->alamat?>" <?php if($page == 'approve_dinas'){ echo "readonly"; }?> placeholder="Alamat">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Telpon <code>*</code></label>
                <input autocomplete="off" type="text" class="form-control" name="telpon" required value="<?=$row->telpon?>" <?php if($page == 'approve_dinas'){ echo "readonly"; }?> placeholder="Telpon">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Foto <code>*</code></label>
                <input type="file" class="form-control" name="file" <?php if($page == 'approve_dinas'){ echo "disabled"; }else{ if($row->foto){ }else{ echo "required";} }?> placeholder="Telpon">
                <?php if($row->foto){ ?>
                  <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#doc"></i> Lihat Dokumen</a>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">email <code>*</code></label>
                <input autocomplete="off" type="email" class="form-control" name="email" required value="<?=$row->email?>" <?php if($page == 'approve_dinas'){ echo "readonly"; }?> placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password <code>*</code></label>
                <input type="hidden" class="form-control" name="password_old" value="<?=$row->password?>">
                <input autocomplete="off" type="password" class="form-control" name="password" required value="<?=$row->password?>" <?php if($page == 'approve_dinas'){ echo "readonly"; }?> placeholder="password">
              </div>
              <div class="form-group">
                <label for="selectFloatingLabel2" class="placeholder">Jenis Akun <code>*</code></label>
                <select name="level" class="form-control input-solid" id="selectFloatingLabel2" <?php if($page == 'approve_dinas'){ echo "disabled"; }else{ echo "required";}?> >
                  <option value="">&nbsp;</option>
                  <option value="1" <?php if($row->level == '1'){ echo "selected"; }?>>Dinas</option>
                  <option value="3" <?php if($row->level == '3'){ echo "selected"; }?>>Admin</option>
                </select>  
              </div>
              <div class="form-group">
                <label for="selectFloatingLabel2" class="placeholder">Status</label>
                <select name="status" class="form-control input-solid" id="selectFloatingLabel2" required>
                  <option value="">&nbsp;</option>
                  <option value="1" <?php if(isset($row->status) AND $row->status == '1'){ echo "selected"; }?>>Aktif</option>
                  <option value="2" <?php if(isset($row->status) AND $row->status == '2'){ echo "selected"; }?>>Tidak Aktif</option>
                </select>  
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