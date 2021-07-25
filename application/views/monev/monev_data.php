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
				<h1>Monev</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Pengajuan / Monev Data</a></li>
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
						<h3 class="card-title">Data Monev</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th width="150px">No Pengajuan</th>
								<th width="300px">Nama Koperasi</th>
								<th width="100px">Tgl Tanam</th>
								<th width="250px">Tgl Perkiraan Panen</th>
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
										<td><?php echo $data->koperasi?></td>
										<td><?php echo $data->tgl_tanam?></td>
										<td><?php echo $data->tgl_perkiraan_panen?></td>
										<td>
												<a class="btn btn-<?php 
													if($data->status_tanam == 'Proses Panen'){ 
														echo 'info';
														$status_tanam = 'Proses Panen';
													}elseif($data->status_tanam == 'Selesai Panen'){ 
														echo 'success';
														$status_tanam = 'Selesai Panen';
													}else{
														echo 'secondary';
														$status_tanam = 'Proses Tanam';
													}
												?>
												btn-sm"><?php echo $status_tanam?></a>
										</td>
										<td class="text-center" width="160px">
												<?php if($this->session->userdata("level") == '2'){ ?>
													<!-- admin -->
													<?php if($data->tgl_perkiraan_panen AND $data->status_tanam == null){ ?>
														<!-- push -->
															<a href="<?=site_url('monev/push_tanam/'.$data->pengajuan_id)?>" onclick="return confirm('Apakah Anda Yakin Akan Push Penanaman')" class="btn btn-success btn-xs">
																<i class="fa fa-check"></i> Push
															</a>
													<?php } ?>
													<?php if($data->status_tanam == null){ ?>
														<!-- monev -->
															<a href="<?=site_url('monev/input_monev/'.$data->pengajuan_id)?>" class="btn btn-primary btn-xs">
																<i class="fa fa-edit"></i> Penanaman
															</a>
													<?php } ?>
												<?php } ?>
												
												<?php if($this->session->userdata("level") == '3'){ ?>
													<?php if($data->push_tanam  AND $data->status_tanam != 'Selesai Panen'){ ?>
														<?php if($data->flag_panen){ ?>
															<!-- push -->
																<a href="<?=site_url('monev/push_panen/'.$data->pengajuan_id)?>" onclick="return confirm('Apakah Anda Yakin Akan Push Penanaman')" class="btn btn-success btn-xs">
																	<i class="fa fa-check"></i> Push
																</a>
														<?php } ?>
														<!-- monev -->
															<a href="<?=site_url('monev/input_panen/'.$data->pengajuan_id)?>" class="btn btn-primary btn-xs">
																<i class="fa fa-edit"></i> Panen
															</a>
													<?php } ?>
												<?php } ?>
												<a href="<?=site_url('monev/view_panen/'.$data->pengajuan_id)?>" class="btn btn-info btn-xs">
													<i class="fa fa-eye"></i> Lihat
												</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
							<tfoot>
							<tr>
								<th>No</th>
								<th width="150px">No Pengajuan</th>
								<th width="300px">Nama Koperasi</th>
								<th width="100px">Tgl Tanam</th>
								<th width="250px">Tgl Perkiraan Panen</th>
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