
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
								<th>Nama Vendor</th>
								<th>Harga</th>
								<th>Qty</th>
								<th>Id Item</th>
								<th>Penyerahan Pihak Dinas</th>
								<th>Dokumen</th>
							</tr>
							</thead>
							<tbody>
							<?php $no=1;
							foreach ($row->result() as $key => $data) {?>
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $data->pengajuan_id?></td>
								<td><?php echo $data->tgl_terima_bantuan?></td>
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
                  $pieces = explode(",", $data->nama_vendor);
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
                  $pieces = explode(",", $data->item_harga);
                  for ($x = 0; $x <= count($pieces) - 1; $x++) {
                    echo number_format($pieces[$x]);
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
                    echo number_format($pieces[$x]);
                    if($x < count($pieces)){
                      echo "<br>";
                    }
                  }
                  ?>
                </td>
								<td>
                  <?php 
                  $pieces = explode(",", $data->id_item);
                  for ($x = 0; $x <= count($pieces) - 1; $x++) {
                    echo number_format($pieces[$x]);
                    if($x < count($pieces)){
                      echo "<br>";
                    }
                  }
                  ?>
								</td>
								<td><?php echo $data->penanggung_jawab_dinas?></td>
								<td><a href="<?php echo base_url('assets/uploads/'.$data->dokumen_biaya_bupati) ?>" target="_blank">Lihat Dokumen</a></td>
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
								<th>Nama Vendor</th>
								<th>Harga</th>
								<th>Qty</th>
								<th>Id Item</th>
								<th>Penyerahan Pihak Dinas</th>
								<th>Dokumen</th>
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