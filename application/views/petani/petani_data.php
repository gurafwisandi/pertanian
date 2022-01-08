
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo $title;?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#"><?php echo $link;?></a></li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<?php if($this->session->flashdata('message') == 'Data Berhasil Disimpan'){ ?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i><?php echo $this->session->flashdata('message');?></h5>
					</div>
				<?php }elseif($this->session->flashdata('message') == 'Update Data Berhasil'){ ?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i><?php echo $this->session->flashdata('message');?></h5>
					</div>
				<?php }elseif($this->session->flashdata('message') == 'Delete Data Berhasil'){ ?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-ban"></i><?php echo $this->session->flashdata('message');?></h5>
					</div>
				<?php } ?>
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data Petani</h3>
						<div class="col-sm-12">
							<?php if($this->session->userdata("level") == '2'){?>
							<ol class="breadcrumb float-sm-right">
									<a href="<?=base_url('petani/add')?>"><li class="fa fa-user-plus">Add</li></a>
							</ol>
							<?php } ?>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Nik</th>
									<th>Kelompok Tani</th>
									<th>Tanaman</th>
									<th>Status</th>
									<?php if($this->session->userdata("level") == '2'){ ?>
										<th>Action</th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php $no=1;
								foreach ($row->result() as $key => $data) { ?>
									<tr>
										<td><?php echo $no++;?></td>
										<td><?php echo $data->nama?></td>
										<td><?php echo $data->nik?></td>
										<td><?php echo $data->koperasi?></td>
										<td><?php echo $data->penanaman_jenis?></td>
										<td><a class="btn btn-<?php if($data->status_petani == 'Aktif'){ echo 'success'; }else{ echo 'danger';} ?> btn-xs"><?php echo $data->status_petani?></a></td>
										<?php if($this->session->userdata("level") == '2'){ ?>
											<td class="text-center" width="160px">
												<a href="<?=site_url('petani/edit/'.$data->petani_id)?>"  class="btn btn-primary btn-xs">
												<i class="fa fa-edit"></i> Edit</a>
												<a href="<?=site_url('petani/del/'.$data->petani_id)?>" onclick="return confirm('Apakah Anda Yakin di Hapus')" class="btn btn-danger btn-xs">
												<i class="fa fa-trash"></i> Delete</a>
											</td>
											<?php } ?>
									</tr>
								<?php } ?>
							<tfoot>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Nik</th>
									<th>Kelompok Tani</th>
									<th>Tanaman</th>
									<th>Status</th>
									<?php if($this->session->userdata("level") == '2'){ ?>
										<th>Action</th>
									<?php } ?>
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