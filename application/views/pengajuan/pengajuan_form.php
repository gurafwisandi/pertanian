
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-4">
			<div class="col-sm-12">
				<h1>Pengajuan</h1>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- Data Koperasi -->
<section class="content">
	<div class="card card-success">
		<div class="card-header">
			<h3 class="card-title">Data Pengajuan Koperasi</h3>
		</div>
		<div class="card-body">
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
					<label>Nama Koperasi</label>
					<input type="text" class="form-control" value="<?php echo $row[0]->nama; ?>" disabled>
				</div>
				<div class="col-3">
					<label>Ketua Koperasi</label>
					<input type="text" class="form-control" value="<?php echo $row[0]->ketua; ?>" disabled>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Proposal Permintaan -->
<section class="content">
	<form action="<?=site_url('pengajuan/proses/'.$row[0]->pengajuan_id)?>" method="POST" enctype="multipart/form-data" >
		<div class="card card-danger">
				<div class="card-header">
					<h3 class="card-title">Proposal Permintaan</h3>
				</div>
				<input type="text" name="pengajuan_id" value="<?php echo $row[0]->pengajuan_id?>">
				<div class="card-body">
					<div class="row">
						<div class="col-3">
							<label>Dokumen Proposal</label>
							<input type="file" name="file" class="form-control">
								<a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#doc"></i> Lihat Dokumen</a>
						</div>
						<div class="col-3">
							<div class="form-group">
								<label>Jenis Bantuan</label>
								<select name="jenis_id" class="form-control select2" style="width: 100%;">
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
						<?php if(count($petani) > 1 AND count($petani) > 1){ ?>
							<div class="col-3">
								<div class="form-group">
									<label>Status Bantuan</label>
									<select name="status_proposal" class="form-control select2" style="width: 100%;">
										<option value="Proses Pengajuan" <?php if($row[0]->status_proposal == 'Proses Pengajuan'){ echo 'selected'; }?>>Proses Pengajuan</option>
										<option value="Selesai Pengajuan" <?php if($row[0]->status_proposal == 'Selesai Pengajuan'){ echo 'selected'; }?>>Selesai Pengajuan</option>
									</select>
								</div>
							</div>
						<?php }else{ ?>
							<div class="col-3">
								<div class="form-group">
									<label>Status Bantuan</label>
									<select name="status_proposal" class="form-control select2" style="width: 100%;">
										<option value="Proses Pengajuan" <?php if($row[0]->status_proposal == 'Proses Pengajuan'){ echo 'selected'; }?>>Proses Pengajuan</option>
									</select>
								</div>
							</div>
						<?php } ?>
						<div class="col-3">
							<label>&nbsp;</label><br>
							<button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
		</div>
	</form> 
</section>
<!-- Data Petani -->
<section class="content">
	<div class="card card-danger">
		<div class="card-header">
			<h3 class="card-title">Data Petani</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
				<button type="button" class="btn btn-tool" data-card-widget="remove">
					<i class="fas fa-times"></i>
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
			<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addRowModal">
			<i class="fa fa-plus"></i> Petani
			</button>
			<br>
			<br>
			<table id="" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama Petani</th>
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
						<td class="text-center" width="160px">
							<a href="<?php echo base_url('/pengajuan/delete/'.$row[0]->pengajuan_id.'/'.$pet->petani_id);?>" onclick="return confirm('Apakah Anda Yakin di Hapus')" class="btn btn-warning btn-xs">
								<i class="fa fa-trash"></i> Delete
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
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</section>
<!-- Data Item Kebutuhan Tani -->
<section class="content">
	<div class="card card-danger">
		<div class="card-header">
			<h3 class="card-title">Data Item Kebutuhan Tani</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
				<button type="button" class="btn btn-tool" data-card-widget="remove">
					<i class="fas fa-times"></i>
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
				<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addRowModal_item">
				<i class="fa fa-plus"></i> Item
				</button>
				<br>
				<br>
				<table id="" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama Petani</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php $no=1;
					foreach ($item as $key => $pet) {?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $pet->item?></td>
							<td><?php echo $pet->qty?></td>
							<td><?php echo $pet->keterangan?></td>
							<td class="text-center" width="160px">
								<a href="<?php echo base_url('/pengajuan/delete_item/'.$row[0]->pengajuan_id.'/'.$pet->id);?>" onclick="return confirm('Apakah Anda Yakin di Hapus')" class="btn btn-warning btn-xs">
									<i class="fa fa-trash"></i> Delete
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
						<th>Action</th>
					</tr>
					</tfoot>
				</table>
		</div>
	</div>
</section>

<div class="modal fade" id="doc" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
					Dokumen <?php echo $row[0]->pengajuan_id;?></span> 
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"><?php echo base_url() ?>
				<?php 
				$doc = $row[0]->dokumen_proposal;
				?>
				<?php $file=substr($doc,-3);
				if($file=='JPG' or $file=='PNG' or $file=='jpg' or $file=='jpeg' or $file=='png' or $file=='PEG' or $file=='peg'){?>1
						<img src="<?php echo base_url() ?>assets/uploads/<?php echo $doc; ?>" width="450" class="img-responsive" id="rotate-image7" style="border-radius: 10px;display: block;margin-left: auto;margin-right: auto;">
				<?php }elseif( $file=='pdf' OR $file=='PDF'){?>2
						<object data="<?php echo base_url() ?>assets/uploads/<?php echo $doc; ?>#view=Fit" type="application/pdf" width="100%" height='850px'>
						</object>
				<?php }else{ }?>
			</div>
		</div>
	</div>
</div>