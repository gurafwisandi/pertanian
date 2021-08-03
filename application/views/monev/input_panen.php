<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-4">
			<div class="col-sm-12">
				<h1>Input Penanaman</h1>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<?php if($this->session->flashdata('message') == 'Simpan Data Berhasil'){ ?>
<section class="content">
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h5><i class="icon fas fa-check"></i><?php echo $this->session->flashdata('message');?></h5>
	</div>
</section>
<?php }elseif($this->session->flashdata('message') == 'Data Berhasil Dihapus'){ ?>
<section class="content">
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h5><i class="icon fas fa-ban"></i><?php echo $this->session->flashdata('message');?></h5>
	</div>
</section>
<?php } ?>
<!-- Data Koperasi -->
<section class="content">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data Koperasi</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-3">
					<label>Nama Koperasi</label>
					<input type="text" class="form-control" value="<?php echo $row[0]->koperasi; ?>" disabled>
				</div>
				<div class="col-3">
					<label>Ketua Koperasi</label>
					<input type="text" class="form-control" value="<?php echo $row[0]->ketua; ?>" disabled>
				</div>
				<div class="col-3">
					<label>Alamat Koperasi</label>
					<input type="text" class="form-control" value="<?php echo $row[0]->alamat; ?>" disabled>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Proposal Permintaan -->
<section class="content">
		<div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Proposal Permintaan</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
			<input type="hidden" name="pengajuan_id" value="<?php echo $row[0]->pengajuan_id?>">
			<div class="card-body" style="display: block;">
				<div class="row">
          <div class="col-3">
            <label>No Pengajuan</label>
            <input type="text" class="form-control" value="<?php echo $row[0]->pengajuan_id; ?>" disabled>
          </div>
          <div class="col-3">
            <label>Tgl Pengajuan</label>
            <input type="text" class="form-control" value="<?php echo date('d F Y', strtotime($row[0]->tgl_proposal)); ?>" disabled>
          </div>
					<div class="col-3">
						<label>Dokumen Proposal</label><br>
						<?php if($row[0]->dokumen_proposal){ ?>
							<a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#doc"></i> Lihat Dokumen</a>
						<?php } ?>
					</div>
					<div class="col-3">
						<div class="form-group">
							<label>Jenis Bantuan</label>
							<select name="jenis_id" class="form-control select2" style="width: 100%;" disabled>
								<option value="">&nbsp;</option>
								<?php 
									$this->db->select('*');
									$this->db->from('jenis');                            
									$query = $this->db->get();            
									foreach ($query->result() as $data)
									{
								?>
									<option value="<?php echo $data->jenis_id;?>"<?php if($row[0]->jenis_id == $data->jenis_id){ echo 'selected'; }?>><?php echo $data->kebutuhan;?></option>
								<?php	} ?>
							</select>
						</div>
					</div>
        </div>
				<div class="row">
					<div class="col-3">
            <div class="form-group">
              <label>Perihal Pengajuan</label>
              <textarea class="form-control" disabled name="perihal_proposal" id="perihal_proposal" rows="3" placeholder="Perihal Pengajuan"><?php echo $row[0]->perihal_proposal;?></textarea>
            </div>
					</div>
        </div>
			</div>
		</div>
</section>
<!-- Data Petani -->
<section class="content">
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Data Petani</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
			</div>
		</div>
		<div class="card-body" style="display: block;">
			<table id="" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama Petani</th>
						<th>Tanaman</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1;
					foreach ($petani as $key => $pet) {?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $pet->nik?></td>
							<td><?php echo $pet->nama?></td>
							<td><?php echo $pet->jenis?></td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama Petani</th>
						<th>Tanaman</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</section>
<!-- Data Item Kebutuhan Tani -->
<section class="content">
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Data Item Kebutuhan Tani</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
			</div>
		</div>
		<div class="card-body" style="display: block;">
      <table id="" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Item Pengajuan</th>
              <th>Qty</th>
              <th>Keterangan</th>
              <th>Item Bantuan</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no=1;
            $no_t=1;
            $no_gt=0;
            foreach ($item as $key => $pet) {?>
              <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $pet->item?></td>
                <td><?php echo $pet->qty?></td>
                <td><?php echo $pet->keterangan?></td>
                <td>
                  <?php echo $pet->nama_item.'<br> Speck Item : '.$pet->spek_item.'<br> Vendor : '.$pet->nama_vendor;
                  if($pet->nama_item){
                    $no_gt +=$no_t++;
                  }
                  ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Item Pengajuan</th>
              <th>Qty</th>
              <th>Keterangan</th>
              <th>Item Bantuan</th>
            </tr>
          </tfoot>
        </table>
		</div>
	</div>
  <div class="modal fade" id="doc" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header no-bd">
          <h5 class="modal-title">
            <span class="fw-mediumbold">
            Dokumen - <?php echo $row[0]->pengajuan_id;?></span> 
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php 
          $doc = $row[0]->dokumen_proposal;
          ?>
          <?php $file=substr($doc,-3);
          if($file=='JPG' or $file=='PNG' or $file=='jpg' or $file=='jpeg' or $file=='png' or $file=='PEG' or $file=='peg'){?>
              <img src="<?php echo base_url() ?>assets/uploads/<?php echo $doc; ?>" width="450" class="img-responsive" id="rotate-image7" style="border-radius: 10px;display: block;margin-left: auto;margin-right: auto;">
          <?php }elseif( $file=='pdf' OR $file=='PDF'){?>
              <object data="<?php echo base_url() ?>assets/uploads/<?php echo $doc; ?>#view=Fit" type="application/pdf" width="100%" height='850px'>
              </object>
          <?php }else{ }?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- verifikasi admin -->
<section class="content">
  <div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Dokumen Pengesahan</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
			</div>
		</div>
    <div class="card-body">
      <div class="row">
        <?php if($row[0]->dokumen_biaya_bupati){ ?>
          <div class="col-3">
            <label>Dokumen Biaya Bantuan Bupati</label>
            <?php if($row[0]->dokumen_biaya_bupati){ ?>
              <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#doc_biaya_bupati"></i> Lihat Dokumen</a>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="modal fade" id="doc_biaya" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header no-bd">
          <h5 class="modal-title">
            <span class="fw-mediumbold">
            Dokumen - <?php echo $row[0]->pengajuan_id;?></span> 
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php 
          $doc = $row[0]->dokumen_biaya_admin;
          ?>
          <?php $file=substr($doc,-3);
          if($file=='JPG' or $file=='PNG' or $file=='jpg' or $file=='jpeg' or $file=='png' or $file=='PEG' or $file=='peg'){?>
              <img src="<?php echo base_url() ?>assets/uploads/<?php echo $doc; ?>" width="450" class="img-responsive" id="rotate-image7" style="border-radius: 10px;display: block;margin-left: auto;margin-right: auto;">
          <?php }elseif( $file=='pdf' OR $file=='PDF'){?>
              <object data="<?php echo base_url() ?>assets/uploads/<?php echo $doc; ?>#view=Fit" type="application/pdf" width="100%" height='850px'>
              </object>
          <?php }else{ }?>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="doc_biaya_bupati" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header no-bd">
          <h5 class="modal-title">
            <span class="fw-mediumbold">
            Dokumen - <?php echo $row[0]->pengajuan_id;?></span> 
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php 
          $doc = $row[0]->dokumen_biaya_bupati;
          ?>
          <?php $file=substr($doc,-3);
          if($file=='JPG' or $file=='PNG' or $file=='jpg' or $file=='jpeg' or $file=='png' or $file=='PEG' or $file=='peg'){?>
              <img src="<?php echo base_url() ?>assets/uploads/<?php echo $doc; ?>" width="450" class="img-responsive" id="rotate-image7" style="border-radius: 10px;display: block;margin-left: auto;margin-right: auto;">
          <?php }elseif( $file=='pdf' OR $file=='PDF'){?>
              <object data="<?php echo base_url() ?>assets/uploads/<?php echo $doc; ?>#view=Fit" type="application/pdf" width="100%" height='850px'>
              </object>
          <?php }else{ }?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- dokumentasi -->
<section class="content">
	<form action="<?=site_url('pengajuan/serah_terima/'.$row[0]->pengajuan_id)?>" method="POST" enctype="multipart/form-data" >
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Dokumentasi Serah Terima</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<input type="hidden" name="pengajuan_id" value="<?php echo $row[0]->pengajuan_id?>">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <legend>Dokumentasi</legend>
            <?php 
              $pengajuan_id=$row[0]->pengajuan_id;
              $this->db->where('pengajuan_id',$pengajuan_id);
              $query = $this->db->get('doc_serah_terima');
              foreach ($query->result() as $ro_p)
              {
            ?>
              <img src="<?php echo base_url('assets/uploads_serah_terima/').$ro_p->filename;?>" width="150" height="150">
            <?php	} ?>
          </div>
				</div>
			</div>
		</div>
	</form> 
</section>
<!-- input tanaman -->
<section class="content">
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Penanaman</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
		</div>
		<div class="card-body" style="display: block;">
			<table id="" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="50px">No</th>
						<th width="300px">Alamat Kebun</th>
						<th width="150px">Total Tanam</th>
						<th width="150px">Tanggal Tanam</th>
						<th width="150px">Tanggal Perkiraan panen</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no=1;
					foreach ($tanam as $key => $tan) {?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $tan->alamat_kebun?></td>
							<td><?php echo $tan->total_tanam?></td>
							<td><?php echo $tan->tgl_tanam?></td>
							<td><?php echo $tan->tgl_perkiraan_panen?></td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th width="50px">No</th>
						<th width="300px">Alamat Kebun</th>
						<th width="150px">Total Tanam</th>
						<th width="150px">Tanggal Tanam</th>
						<th width="150px">Tanggal Perkiraan panen</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</section>

<!-- hasil panen -->
<section class="content">
	<div class="card card-danger">
		<div class="card-header">
			<h3 class="card-title">Hasil Panen</h3>
		</div>
		<div class="modal fade" id="addRowModal_item" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header no-bd">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							Monev <?php echo $row[0]->pengajuan_id;?></span> 
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?php echo site_url('/monev/input_panen/'.$row[0]->pengajuan_id) ?>" method="POST">
							<div class="modal-body">
								<input type="hidden" name="pengajuan_id" class="form-control" value="<?php echo $row[0]->pengajuan_id;?>">
								<div class="row">
									<div class="col-sm-12">
											<div class="form-group form-floating-label">
												<label for="selectFloatingLabel2" class="placeholder">Tanaman</label>
												<select name="id_panen" class="form-control input-solid" id="selectFloatingLabel2" required>
													<option value="">&nbsp;</option>
													<?php 
														$pengajuan_id=$row[0]->pengajuan_id;
														$this->db->where('pengajuan_id', $pengajuan_id);
														$query = $this->db->get('tanam');
														foreach ($query->result() as $ro_p)
														{
													?>
														<option value="<?php echo $ro_p->id;?>"><?php echo number_format($ro_p->total_tanam).' - '.$ro_p->alamat_kebun;?></option>
													<?php	} ?>
												</select>
											</div>
									</div>
									<div class="col-sm-12">
											<div class="form-group form-floating-label">
												<label for="selectFloatingLabel2" class="placeholder">Jenis Panen</label>
												<select name="jenis_panen" class="form-control input-solid" id="selectFloatingLabel2" required>
													<option value="">&nbsp;</option>
													<option value="Berhasil">Berhasil</option>
													<option value="Gagal">Gagal</option>
												</select>
											</div>
									</div>
									<div class="col-sm-12">
											<div class="form-group form-floating-label">
												<label for="selectFloatingLabel2" class="placeholder">Tanggal Panen</label>
												<input type="date" required name="tgl_panen" class="form-control">
											</div>
									</div>
									<div class="col-sm-12">
											<div class="form-group form-floating-label">
												<label for="selectFloatingLabel2" class="placeholder">Total Panen</label>
												<input type="number" required min='0' name="jumlah_panen" class="form-control" value="">
											</div>
									</div>
								</div>
							</div>
							<div class="modal-footer no-bd">
								<button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body" style="display: block;">
				<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addRowModal_item">
				<i class="fa fa-plus"></i> Input Hasil Panen
				</button>
			<br>
			<br>
			<table id="" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="50px">No</th>
						<th width="300px">Alamat Kebun</th>
						<th width="300px">Jenis Panen</th>
						<th width="150px">Tanggal Panen</th>
						<th width="150px">Total Panen</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no=1;
					foreach ($panen as $key => $tan) {?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $tan->alamat_kebun?></td>
							<td>
								<?php if($tan->jenis_panen == 'Berhasil'){?>
									<a class="btn btn-success btn-sm"><?php echo $tan->jenis_panen?></a>
								<?php }else{?>
									<a class="btn btn-danger btn-sm"><?php echo $tan->jenis_panen?></a>
								<?php }?>
							</td>
							<td><?php echo $tan->tgl_panen?></td>
							<td><?php echo $tan->jumlah_panen?></td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th width="50px">No</th>
						<th width="300px">Alamat Kebun</th>
						<th width="300px">Jenis Panen</th>
						<th width="150px">Tanggal Panen</th>
						<th width="150px">Total Panen</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</section>



<!-- /.modal EDIT-->
<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog"> 
		<div class="modal-content"> 
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">Item Bantuan</span> 
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">              
				<div id="dynamic-content">
				</div>
			</div> 
		</div>
	</div>
</div>
<!-- /.modal EDIT-->

<script src="<?=base_url()?>assets/jquery.3.2.1.min.js"></script>
<script>
	$(document).ready(function(){
    console.log('xxx');
			$(document).on('click', '#get_data', function(e){
					e.preventDefault();
					var uid = $(this).data('id');   // it will get id of clicked row
					
					$('#dynamic-content').html(''); // leave it blank before ajax call
					$('#modal-loader').show();      // load ajax loader
					
					$.ajax({
							url  : "<?php echo site_url(); ?>pengajuan/get_conten/"+uid,
							type: 'POST',
							dataType: 'html'
					})
					.done(function(url){ 
							console.log(url);
							$('#dynamic-content').html(url); // load response 
					})
					.fail(function(){
							$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
							$('#modal-loader').hide();
					});
			});
	});
</script>