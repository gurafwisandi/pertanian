
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
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data Koperasi</h3>

							<ol class="breadcrumb float-sm-right">
								<a href="<?=base_url('koperasi/add')?>"><li class="fa fa-user-plus">Add</li></a>
							</ol>
						
					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>ID</th>
								<th>Nama Koperasi</th>
								<th>Ketua</th>
								<th>Alamat</th>
								<th>Telpon</th>
								<th>Diinput</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php $no=1;
							foreach ($row->result() as $key => $data) {?>
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $data->koperasi_id?></td>
								<td><?php echo $data->nama?></td>
								<td><?php echo $data->ketua?></td>
								<td><?php echo $data->alamat?></td>
								<td><?php echo $data->telpon?></td>
								<td><?php echo $data->user_nama	?></td>
								<td>
																	
                            			<a href="<?=site_url('koperasi/edit/'.$data->koperasi_id)?>"  class="btn btn-primary btn-xs">
     									<i class="fa fa-pencil"></i> Edit</a>
     									<a href="<?=site_url('koperasi/del/'.$data->koperasi_id)?>" onclick="return confirm('Apakah Anda Yakin di Hapus')" class="btn btn-warning btn-xs">
     									<i class="fa fa-trash"></i> Delete</a>
     							
								</td>
							</tr>
						<?php } ?>
							</tbody>
							<tfoot>
							<tr>
								<th>No</th>
								<th>ID</th>
								<th>Nama Koperasi</th>
								<th>Ketua</th>
								<th>Alamat</th>
								<th>Telpon</th>
								<th>Diinput</th>
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