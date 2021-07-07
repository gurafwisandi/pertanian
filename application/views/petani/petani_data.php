
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
	<?php $this->view('messages')?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data Petani</h3>
						<div class="col-sm-12">
							<ol class="breadcrumb float-sm-right">
								<a href="<?=base_url('petani/add')?>"><li class="fa fa-user-plus">Add</li></a>
							</ol>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>ID Petani</th>
								<th>Nama</th>
								<th>Nik</th>
								<th>Koperasi</th>
								<th>Tanaman</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								<?php $no=1;
								foreach ($row->result() as $key => $data) { ?>
									
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $data->petani_id?></td>
								<td><?php echo $data->nama?></td>
								<td><?php echo $data->nik?></td>
								<td><?php echo $data->koperasi_nama?></td>
								<td><?php echo $data->penanaman_jenis?></td>
								<td class="text-center" width="160px">
                            			<a href="<?=site_url('petani/edit/'.$data->petani_id)?>"  class="btn btn-primary btn-xs">
     									<i class="fa fa-pencil"></i> Edit</a>
     									<a href="<?=site_url('petani/del/'.$data->petani_id)?>" onclick="return confirm('Apakah Anda Yakin di Hapus')" class="btn btn-warning btn-xs">
     									<i class="fa fa-trash"></i> Delete</a>
     							</td>
							</tr>
						<?php } ?>
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