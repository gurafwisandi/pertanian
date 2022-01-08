<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-4">
			<div class="col-sm-12">
				<h1>Verifikasi Pengajuan</h1>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<?php if($this->session->flashdata('message') == 'Update Data Berhasil'){ ?>
<section class="content">
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h5><i class="icon fas fa-check"></i><?php echo $this->session->flashdata('message');?></h5>
	</div>
</section>
<?php } ?>
<!-- Data Koperasi -->
<section class="content">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data Kelompok Tani</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-3">
					<label>Nama Kelompok Tani</label>
					<input type="text" class="form-control" value="<?php echo $row[0]->koperasi; ?>" disabled>
				</div>
				<div class="col-3">
					<label>Ketua Kelompok Tani</label>
					<input type="text" class="form-control" value="<?php echo $row[0]->ketua; ?>" disabled>
				</div>
				<div class="col-3">
					<label>Alamat Kelompok Tani</label>
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
		<div class="modal fade" id="addRowModal_item" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header no-bd">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							Pengajuan <?php echo $row[0]->pengajuan_id;?></span> 
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?php echo site_url('/pengajuan/add_item/'.$row[0]->pengajuan_id) ?>" method="POST">
							<div class="modal-body">
								<div class="row">
									<div class="col-sm-12">
											<div class="form-group form-floating-label">
												<label for="selectFloatingLabel2" class="placeholder">Nama Item</label>
												<input type="text" name="item" class="form-control" value="">
											</div>
									</div>
									<div class="col-sm-12">
											<div class="form-group form-floating-label">
												<label for="selectFloatingLabel2" class="placeholder">Qty</label>
												<input type="number" min='1' name="qty" class="form-control" value="">
											</div>
									</div>
									<div class="col-sm-12">
											<div class="form-group form-floating-label">
												<label for="inputFloatingLabel2" class="placeholder">Keterangan</label>
												<textarea name="keterangan" autocomplete="off" class="form-control input-solid" id="inputFloatingLabel2" rows="5"></textarea>
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
			<br>
			<br>
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
      <legend class=""></legend>
      <legend class=""><hr></legend>
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
<!-- verifikasi admin -->

<!-- Data Petani -->
<section class="content">
	<div class="card card-danger">
		<div class="card-header">
			<h3 class="card-title">Data Petani</h3>
		</div>
		<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header no-bd">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							Pengajuan <?php echo $row[0]->pengajuan_id;?></span> 
						</h5>
					</div>
				</div>
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
						<th>Seminar</th>
						<th>Action</th>
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
							<td>
							<?php 
								if($pet->kehadiran_seminar == 'Tidak Hadir'){ 
							?><a class="btn btn-danger btn-sm"><?php echo $pet->kehadiran_seminar?></a><?php
								}elseif($pet->kehadiran_seminar == 'Hadir'){ 
							?><a class="btn btn-success btn-sm"><?php echo $pet->kehadiran_seminar?></a><?php
								}
							?>
						</td>
							<td class="text-center" width="160px">
									<a href="javascript:void(0)" onclick="$('#view-modal').modal('show');" data-id="<?php echo $pet->id; ?>" id="get_data" data-toggle="tooltip" title="Pilih Item Bantuan">
										<span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-edit btn btn-primary btn-xs"> Item Bantuan</i></span>
									</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama Petani</th>
						<th>Tanaman</th>
						<th>Seminar</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</section>
<!-- serah terima -->
<section class="content">
	<form action="<?=site_url('pengajuan/serah_terima/'.$row[0]->pengajuan_id)?>" method="POST" enctype="multipart/form-data" >
		<div class="card card-danger">
			<div class="card-header">
				<h3 class="card-title">Serah Terima</h3>
			</div>
			<input type="hidden" name="pengajuan_id" value="<?php echo $row[0]->pengajuan_id?>">
			<div class="card-body">
        <div class="row">
          <div class="col-3">
            <div class="form-group">
              <label>Rencana Seminar dan Penyerahan Bantuan</label>
              <input type="date" class="form-control" name="tgl_seminar_kirim_bantuan" readonly value="<?php echo $row[0]->tgl_seminar_kirim_bantuan; ?>">
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <label>Realisasi Seminar dan Penyerahan Bantuan <code>*</code></label>
              <input type="date" required class="form-control" name="tgl_terima_bantuan" value="<?php echo $row[0]->tgl_terima_bantuan; ?>">
            </div>
          </div>
          <div class="col-3">
            <div class="form-group"><br>
              <label>Penanggung Jawab Dinas <code>*</code></label>
              <input type="text" required class="form-control" name="penanggung_jawab_dinas" value="<?php echo $row[0]->penanggung_jawab_dinas; ?>">
            </div>
          </div>
          <div class="col-3">
            <div class="form-group"><br>
              <label>Lokasi <code>*</code></label>
              <textarea class="form-control" required name="lokasi" id="lokasi" rows="3" placeholder="Lokasi"><?php echo $row[0]->lokasi;?></textarea>
            </div>
          </div>
				</div>
        <div class="row">
          <div class="col-3">
            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" name="keterangan_hasil_pengajuan" id="lokasi" rows="3" placeholder="Keterangan"><?php echo $row[0]->keterangan_hasil_pengajuan;?></textarea>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <label>Upload Dokumentasi <code>*</code></label>
              <input type="file" class="form-control" name="file" required>
            </div>
          </div>
					<div class="col-3">
						<label>&nbsp;</label><br>
						<?php if(count($absensi) == 0){ ?>
							<button type="submit" name="serah_terima" value="serah_terima" class="btn btn-primary">Simpan</button>
						<?php }else{ ?>
							<button disabled type="submit" name="serah_terima" value="serah_terima" class="btn btn-primary">Simpan</button>
						<?php } ?>
					</div>
				</div>
			</div>
      <div class="card-body">
        <div class="row">
					<legend>Dokumentasi</legend>
					<?php 
						$pengajuan_id=$row[0]->pengajuan_id;
						$this->db->where('pengajuan_id',$pengajuan_id);
						$query = $this->db->get('doc_serah_terima');
						foreach ($query->result() as $ro_p)
						{
							?>
							<div class="col-sm-2">
								<?php
									$doc = $ro_p->filename;
									$file=substr($doc,-3);
									if($file=='JPG' or $file=='PNG' or $file=='jpg' or $file=='jpeg' or $file=='png' or $file=='PEG' or $file=='peg'){
								?>
									<a target="_blank" href="<?php echo base_url('assets/uploads_serah_terima/').$ro_p->filename;?>"><img src="<?php echo base_url('assets/uploads_serah_terima/').$ro_p->filename;?>" width="150" height="150"></a>
								<?php	}else{ ?>
									<a target="_blank" href="<?php echo base_url('assets/uploads_serah_terima/').$ro_p->filename;?>">Lihat PDF</a>
								<?php } ?>
							</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</form> 
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
			$(document).on('click', '#get_data', function(e){
					e.preventDefault();
					var uid = $(this).data('id');   // it will get id of clicked row
					
					$('#dynamic-content').html(''); // leave it blank before ajax call
					$('#modal-loader').show();      // load ajax loader
					
					$.ajax({
							url  : "<?php echo site_url(); ?>pengajuan/get_kehadiran/"+uid,
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