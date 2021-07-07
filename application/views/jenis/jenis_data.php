
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Jenis</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">jj</a></li>
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
						<h3 class="card-title">Data jenis Alat</h3>

							<ol class="breadcrumb float-sm-right">
								<a href="<?=base_url('jenis/add')?>"><li class="fa fa-user-plus">Add</li></a>
							</ol>
						
					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>Jenis Kebutuhan</th>
								<th>Created</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php $no=1;
							foreach ($row->result() as $key => $data) {?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$data->kebutuhan?></td>
								<td><?=$data->created?></td>
								
								<td class="text-center" width="160px">
                            
     						<a href="<?=site_url('jenis/edit/'.$data->jenis_id)?>"  class="btn btn-primary btn-xs">
     							<i class="fa fa-pencil"></i> Edit
     						</a>
     						<a href="<?=site_url('jenis/del/'.$data->jenis_id)?>" onclick="return confirm('Apakah Anda Yakin di Hapus')" class="btn btn-warning btn-xs">
     							<i class="fa fa-trash"></i> Delete
     						</a>
     							
     					</td>
							</tr>
					<?php } ?>
							</tbody>
							<tfoot>
							<tr>
								<th>No</th>
								<th>Jenis Kebutuhan</th>
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