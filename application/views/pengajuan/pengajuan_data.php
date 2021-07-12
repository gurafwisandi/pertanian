<section class="content"><br>
	<?php if($this->session->flashdata('message') == 'Update Data Berhasil'){ ?>
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i><?php echo $this->session->flashdata('message');?></h5>
		</div>
	<?php }elseif($this->session->flashdata('message') == 'Push Pengajuan Berhasil'){ ?>
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i><?php echo $this->session->flashdata('message');?></h5>
		</div>
	<?php }elseif($this->session->flashdata('message') == 'Pengajuan Dikembalikan'){ ?>
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-ban"></i><?php echo $this->session->flashdata('message');?></h5>
		</div>
	<?php }elseif($this->session->flashdata('message') == 'Approve Administrasi'){ ?>
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i><?php echo $this->session->flashdata('message');?></h5>
		</div>
	<?php }elseif($this->session->flashdata('message') == 'Approve Bupati'){ ?>
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i><?php echo $this->session->flashdata('message');?></h5>
		</div>
	<?php } ?>
</section>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Pengajuan</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Pengajuan Data</a></li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<?php $this->view('messages')?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data Pengajuan</h3>
						<ol class="breadcrumb float-sm-right">
							<a href="<?=base_url('pengajuan/no_pengajuan')?>"><li class="fa fa-user-plus"> Add</li></a>
						</ol>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th width="80px">No Pengajuan</th>
								<th width="100px">Tgl Pengajuan</th>
								<th width="300px">Nama Koperasi</th>
								<th width="150px">Jenis Kebutuhan</th>
								<th width="200px">Status</th>
								<th width="200px">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php $no=1;
							foreach ($row->result() as $key => $data) {?>
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $data->pengajuan_id?></td>
								<td><?php echo $data->tgl_proposal?></td>
								<td><?php echo $data->koperasi?></td>
								<td><?php echo $data->kebutuhan?></td>
								<td>
										<a class="btn btn-<?php 
											if($data->status_proposal == 'Selesai Pengajuan'){ 
												echo 'info';
											}elseif($data->status_proposal == 'Proses Verifikasi'){ 
												echo 'warning';
											}elseif($data->status_proposal == 'Kembalikan Pengajuan'){ 
												echo 'danger';
											}elseif($data->status_proposal == 'Approve Administrasi'){ 
												echo 'primary';
											}elseif($data->status_proposal == 'Proses Verifikasi Bupati'){ 
												echo 'warning';
											}elseif($data->status_proposal == 'Approve Bupati'){ 
												echo 'primary';
											}elseif($data->status_proposal == 'Kembalikan Administrasi'){ 
												echo 'danger';
											}elseif($data->status_proposal == 'Proses Penyaluran'){ 
												echo 'primary';
											}else{
												echo 'secondary';
											}
										?>
										 btn-sm"><?php echo $data->status_proposal?></a>
								</td>
								<td class="text-center" width="160px">
									<!-- Admin -->
										<!-- verifikasi -->
										<?php if(($data->status_proposal == 'Proses Verifikasi' OR $data->status_proposal == 'Approve Administrasi' OR $data->status_proposal == 'Kembalikan Administrasi') AND $data->push_pengajuan == '1'){ ?>
											<a href="<?=site_url('pengajuan/verifikasi/'.$data->pengajuan_id)?>" class="btn btn-primary btn-xs">
												<i class="fa fa-edit"></i> Verifikasi
											</a>
										<?php } ?>
										<!-- push -->
										<?php if($data->status_proposal == 'Approve Administrasi'){ ?>
											<a href="<?=site_url('pengajuan/push_admin/'.$data->pengajuan_id)?>" onclick="return confirm('Apakah Anda Yakin Akan Push Pengajuan')" class="btn btn-success btn-xs">
												<i class="fa fa-check"></i> Push A
											</a>
										<?php } ?>
									<!-- Admin -->

									<!-- bupati -->
										<!-- verifikasi -->
										<?php if($data->status_proposal == 'Proses Verifikasi Bupati' OR $data->status_proposal == 'Approve Bupati'){ ?>
											<a href="<?=site_url('pengajuan/verifikasi_bupati/'.$data->pengajuan_id)?>" class="btn btn-primary btn-xs">
												<i class="fa fa-edit"></i> Verifikasi B
											</a>
										<?php } ?>
										<!-- push -->
										<?php if($data->status_proposal == 'Approve Bupati'){ ?>
											<a href="<?=site_url('pengajuan/push_bupati/'.$data->pengajuan_id)?>" onclick="return confirm('Apakah Anda Yakin Akan Push Pengajuan')" class="btn btn-success btn-xs">
												<i class="fa fa-check"></i> Push B
											</a>
										<?php } ?>
									<!-- bupati -->

									<!-- koperasi -->
									<?php if($data->status_proposal == 'Selesai Pengajuan'){ ?>
										<a href="<?=site_url('pengajuan/push/'.$data->pengajuan_id)?>" onclick="return confirm('Apakah Anda Yakin Akan Push Pengajuan')" class="btn btn-success btn-xs">
											<i class="fa fa-check"></i> Push
										</a>
									<?php } ?>
									<?php if($data->status_proposal == 'Selesai Pengajuan' OR $data->status_proposal == 'Kembalikan Pengajuan' OR $data->status_proposal == 'Proses Pengajuan'){ ?>
										<a href="<?=site_url('pengajuan/add/'.$data->pengajuan_id)?>" class="btn btn-primary btn-xs">
											<i class="fa fa-edit"></i> Edit
										</a>
										<a href="<?=site_url('pengajuan/del/'.$data->pengajuan_id)?>" onclick="return confirm('Apakah Anda Yakin di Hapus')" class="btn btn-danger btn-xs">
											<i class="fa fa-trash"></i> Delete
										</a>
									<?php } ?>
									<!-- koperasi -->
								</td>
							</tr>
						<?php } ?>
							</tbody>
							<tfoot>
							<tr>
								<th>No</th>
								<th width="80px">No Pengajuan</th>
								<th width="100px">Tgl Pengajuan</th>
								<th width="300px">Nama Koperasi</th>
								<th width="150px">Jenis Kebutuhan</th>
								<th width="200px">Status</th>
								<th width="200px">Action</th>
							</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>