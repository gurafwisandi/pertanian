
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo $title;?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
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
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data <?php echo $title;?></h3>
						<ol class="float-sm-right">
              <a href="<?php echo base_url('laporan/print_petani'); ?>" target="_blank" class="btn btn-primary">Print Kop Surat</a>
						</ol>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>Kelompok Tani</th>
								<th>NIK</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Status</th>
							</tr>
							</thead>
							<tbody>
							<?php $no=1;
							foreach ($row->result() as $key => $data) {?>
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $data->koperasi?></td>
								<td><?php echo $data->nik?></td>
								<td><?php echo $data->nama?></td>
								<td><?php echo $data->alamat?></td>
								<td><a class="btn btn-<?php if($data->status_petani == 'Aktif'){ echo 'success'; }else{ echo 'danger';} ?> btn-xs"><?php echo $data->status_petani?></a></td>
							</tr>
							<?php } ?>
							</tbody>
							<tfoot>
							<tr>
								<th>No</th>
								<th>Kelompok Tani</th>
								<th>NIK</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Status</th>
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