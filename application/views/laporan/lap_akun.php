
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
									<a href="<?php echo base_url('laporan/print_akun'); ?>" target="_blank" class="btn btn-primary">Print Kop Surat</a>
						</ol>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>Jenis Instansi</th>
								<th>Instansi</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Alamat</th>
								<th>Telpon</th>
								<th>Status</th>
							</tr>
							</thead>
							<tbody>
							<?php $no=1;
							foreach ($row->result() as $key => $data) {?>
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php if($data->level == '1'){ echo "Dinas"; }elseif($data->level == '2'){ echo "Koperasi"; }else{ echo "Admin";}?></td>
								<td><?php echo $data->koperasi?></td>
								<td><?php echo $data->ketua?></td>
								<td><?php echo $data->email?></td>
								<td><?php echo $data->alamat?></td>
								<td><?php echo $data->telpon?></td>
								<td>
									<a class="btn btn-<?php 
										if($data->status == '1'){ echo "success"; 
										}elseif($data->status == '2'){ echo "secondary"; 
										}else{ echo "warning";}
										?> btn-xs">
										<?php 
										if($data->status == '1'){ echo "Aktif"; 
										}elseif($data->status == '2'){ echo "Tidak Aktif"; 
										}else{ echo "Menunggu Konfirmasi";}
										?>
									</a>
								</td>
							</tr>
							<?php } ?>
							</tbody>
							<tfoot>
							<tr>
								<th>No</th>
								<th>Jenis Instansi</th>
								<th>Instansi</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Alamat</th>
								<th>Telpon</th>
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