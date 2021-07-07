
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Pengjuan</h1>
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
						<h3 class="card-title">Data jenis Penanaman</h3>
						<ol class="breadcrumb float-sm-right">
							<a href="<?=base_url('pengajuan/no_pengajuan')?>"><li class="fa fa-user-plus">Add</li></a>
						</ol>
					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>No Pengajuan</th>
								<th>Nama Tanaman</th>
								<th>Jenis</th>
								<th>Created</th>
								<th>Status</th>
								<th>Action</th>

							</tr>
							</thead>
							<tbody>
							<?php $no=1;
							foreach ($row->result() as $key => $data) {?>
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $data->pengajuan_id?></td>
								<td><?php echo $data->koperasi_id?></td>
								<td><?php echo $data->jenis_id?></td>
								<td><?php echo $data->tanggal_tanam?></td>
								<td><?php echo $data->status?></td>
								<td class="text-center" width="160px">
                            
     						<a href="<?=site_url('pengajuan/edit/'.$data->pengajuan_id)?>"  class="btn btn-primary btn-xs">
     							<i class="fa fa-pencil"></i> Edit
     						</a>
     						<a href="<?=site_url('pengajuan/del/'.$data->pengajuan_id)?>" onclick="return confirm('Apakah Anda Yakin di Hapus')" class="btn btn-warning btn-xs">
     							<i class="fa fa-trash"></i> Delete
     						</a>
     							
     					</td>
							</tr>
						<?php } ?>
							</tbody>
							<tfoot>
							<tr>
								<th>No</th>
								<th>ID Penamanan</th>
								<th>Nama Tanaman</th>
								<th>Jenis</th>
								<th>Jenis</th>
								<th>Created</th>
								<th>Action</th>
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