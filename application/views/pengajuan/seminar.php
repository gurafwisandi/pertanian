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
		<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
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
						<form action="<?php echo site_url('/pengajuan/add_petani/'.$row[0]->pengajuan_id) ?>" method="POST">
							<div class="modal-body">
								<div class="row">
									<div class="col-sm-12">
											<div class="form-group form-floating-label">
												<label for="selectFloatingLabel2" class="placeholder">Nama Petani</label>
												<select name="petani_id" class="form-control input-solid" id="selectFloatingLabel2" required>
													<option value="">&nbsp;</option>
													<?php 
														$pengajuan_id=$row[0]->pengajuan_id;
														$where = "petani_id NOT IN (select petani_id FROM petani_pengajuan where pengajuan_id= '$pengajuan_id')";
														$this->db->where($where);
														$query = $this->db->get('petani');
														foreach ($query->result() as $ro_p)
														{
													?>
														<option value="<?php echo $ro_p->petani_id;?>"><?php echo $ro_p->nama;?></option>
													<?php	} ?>
												</select>
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
			<!-- <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addRowModal">
			<i class="fa fa-plus"></i> Petani
			</button> -->
			<br>
			<br>
			<table id="" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama Petani</th>
						<th>Tanaman</th>
						<!-- <th>Action</th> -->
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
							<!-- <td class="text-center" width="160px">
								<a href="<?php echo base_url('/pengajuan/delete/'.$row[0]->pengajuan_id.'/'.$pet->petani_id);?>" onclick="return confirm('Apakah Anda Yakin di Hapus')" class="btn btn-danger btn-xs">
									<i class="fa fa-trash"></i> Delete
								</a>
							</td> -->
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama Petani</th>
						<th>Tanaman</th>
						<!-- <th>Action</th> -->
					</tr>
				</tfoot>
			</table>
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

<section class="content">
	<form action="<?=site_url('pengajuan/seminar/'.$row[0]->pengajuan_id)?>" method="POST" enctype="multipart/form-data" >
		<div class="card card-danger">
			<div class="card-header">
				<h3 class="card-title">Penjadwalan Seminar dan Pemberian Bantuan</h3>
			</div>
			<input type="hidden" name="pengajuan_id" value="<?php echo $row[0]->pengajuan_id?>">
			<div class="card-body">
        <legend class="text-info"><b>Pengajuan Item Bantuan</b></legend>
        <table id="" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Item Pengajuan</th>
              <th>Qty</th>
              <th>Keterangan</th>
              <th>Item Bantuan</th>
              <th>Action</th>
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
                  <?php echo $pet->nama_item;
                  if($pet->nama_item){
                    $no_gt +=1;
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
        </table>
        <legend class=""><hr></legend>
        <div class="row">
          <div class="col-3">
            <div class="form-group">
              <label>Tgl Seminar dan Penyerahan Bantuan <code>*</code></label>
              <input type="date" required class="form-control" name="tgl_seminar_kirim_bantuan" value="<?php echo $row[0]->tgl_seminar_kirim_bantuan; ?>">
            </div>
          </div>
					<div class="col-3">
            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" name="ket_seminar_kirim_bantuan" id="ket_seminar_kirim_bantuan" rows="3" placeholder="Keterangan"><?php echo $row[0]->ket_seminar_kirim_bantuan;?></textarea>
            </div>
					</div>
					<div class="col-3">
						<label>&nbsp;</label><br>
						<button type="submit" name="seminar" value="seminar" class="btn btn-primary" <?php if($no_gt != count($item)){ echo "disabled"; };?>>Simpan</button>
					</div>
          <?php if($no_gt != count($item)){ ?>
            <legend class="text-danger"><b>Harap Pilih Item Bantuan Terlebih Dahulu</b></legend>
          <?php } ?>
				</div>
			</div>
		</div>
	</form> 
</section>
<!-- verifikasi -->

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