
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>User</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">User</a></li>
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
				<?php if($this->session->flashdata('message') == 'Approve Data Berhasil'){ ?>
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
						<h3 class="card-title">Data user</h3>
							<ol class="breadcrumb float-sm-right">
								<a href="<?=base_url('user/add')?>"><li class="fa fa-user-plus">Add</li></a>
							</ol>
					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Level</th>
								<th>Status</th>
								<th width="120px">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php $no=1;
							foreach ($row->result() as $key => $data) {?>
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $data->koperasi?></td>
								<td><?php echo $data->email?></td>
								<td><?php if($data->level == '1'){ echo "Dinas"; }elseif($data->level == '2'){ echo "Koperasi"; }else{ echo "Admin";}?></td>
								<td class="text-left" >
									<a class="btn btn-<?php 
										if($data->status == '1'){ echo "success"; 
										}elseif($data->status == '2'){ echo "secondary"; 
										}
										?> btn-xs">
										<?php 
										if($data->status == '1'){ echo "Aktif"; 
										}elseif($data->status == '2'){ echo "Tidak Aktif"; 
										}
										?>
									</a>
								</td>
								<td class="text-left" width="">
									<?php if($data->status ==  null){ ?> 
										<a href="<?=site_url('user/approve_dinas/'.$data->user_id)?>"  class="btn btn-info btn-xs">
											<i class="fa fa-check"></i> Approve
										</a>
										<a href="<?=site_url('user/del_dinas/'.$data->user_id)?>" onclick="return confirm('Apakah Anda Yakin di Hapus')" class="btn btn-danger btn-xs">
											<i class="fa fa-trash"></i> Delete
										</a>
									<?php }else{ ?>
										<a href="<?=site_url('user/edit_dinas/'.$data->user_id)?>"  class="btn btn-primary btn-xs">
											<i class="fa fa-edit"></i> Edit
										</a>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
							</tbody>
							<tfoot>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Level</th>
								<th>Status</th>
								<th width="120px">Action</th>
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