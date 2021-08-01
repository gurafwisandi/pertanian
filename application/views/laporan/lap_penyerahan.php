
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
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>No Pengajuan</th>
								<th>Tgl Penyerahan</th>
								<th>Nama Koperasi</th>
								<th>ketua Koperasi</th>
								<th>Kebutuhan</th>
								<th>Item Pengajuan</th>
								<th>Vendor</th>
								<th>Qty</th>
								<th>Penyerahan Pihak Dinas</th>
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
								<td><?php echo $data->ketua?></td>
								<td>
                  <?php 
                  $pieces = explode(",", $data->item_kebutuhan);
                  for ($x = 0; $x <= count($pieces) - 1; $x++) {
                    echo $pieces[$x];
                    if($x < count($pieces)){
                      echo "<br>";
                    }
                  }
                  ?>
                </td>
								<td>
                  <?php 
                  $pieces = explode(",", $data->item_pengajuan);
                  for ($x = 0; $x <= count($pieces) - 1; $x++) {
                    echo $pieces[$x];
                    if($x < count($pieces)){
                      echo "<br>";
                    }
                  }
                  ?>
                </td>
								<td>
                  <?php 
                  $pieces = explode(",", $data->item_qty);
                  for ($x = 0; $x <= count($pieces) - 1; $x++) {
                    echo $pieces[$x];
                    if($x < count($pieces)){
                      echo "<br>";
                    }
                  }
                  ?>
                </td>
								<td><?php echo $data->kebutuhan?></td>
								<td><?php echo $data->jml_anggota?></td>
								<td><?php echo $data->status_proposal?></td>
							</tr>
							<?php } ?>
							</tbody>
							<tfoot>
							<tr>
								<th>No</th>
								<th>No Pengajuan</th>
								<th>Tgl Penyerahan</th>
								<th>Nama Koperasi</th>
								<th>ketua Koperasi</th>
								<th>Kebutuhan</th>
								<th>Item Pengajuan</th>
								<th>Vendor</th>
								<th>Qty</th>
								<th>Penyerahan Pihak Dinas</th>
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