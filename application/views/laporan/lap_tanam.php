
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
							<?php if($title == 'Laporan Gagal Panen'){?>
								<a href="<?php echo base_url('laporan/print_panen_gagal'); ?>" target="_blank" class="btn btn-primary">Print Kop Surat</a>
							<?php }else{ ?>
								<a href="<?php echo base_url('laporan/print_panen_berhasil'); ?>" target="_blank" class="btn btn-primary">Print Kop Surat</a>
							<?php } ?>
									
						</ol>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>No Pengajuan</th>
								<th>Nama Kelompok Tani</th>
								<th>Alamat Kebun </th>
								<th>Total Tanam</th>
								<th>Tgl Tanam</th>
                <?php if($title == 'Laporan Gagal Panen'){?>
								  <th>Jumlah Gagal Panen</th>
                  <th>Tgl Gagal Panen</th>
                <?php }else{ ?>
                  <th>Jumlah Panen</th>
                  <th>Tgl Panen</th>
                <?php } ?>
							</tr>
							</thead>
							<tbody>
							<?php $no=1;
							foreach ($row->result() as $key => $data) {?>
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $data->pengajuan_id?></td>
								<td><?php echo $data->koperasi?></td>
								<td><?php echo $data->alamat_kebun?></td>
								<td><?php echo number_format($data->total_tanam)?></td>
								<td><?php echo $data->tgl_tanam?></td>
								<td>
                  <?php 
                  $pieces = explode(",", $data->jumlah_panen);
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
                  $pieces = explode(",", $data->tgl_panen);
                  for ($x = 0; $x <= count($pieces) - 1; $x++) {
                    echo $pieces[$x];
                    if($x < count($pieces)){
                      echo "<br>";
                    }
                  }
                  ?>
                </td>
              </tr>
							<?php } ?>
							</tbody>
							<tfoot>
							<tr>
								<th>No</th>
								<th>No Pengajuan</th>
								<th>Nama Kelompok Tani</th>
								<th>Alamat Kebun </th>
								<th>Total Tanam</th>
								<th>Tgl Tanam</th>
                <?php if($title == 'Laporan Gagal Panen'){?>
								  <th>Jumlah Gagal Panen</th>
                  <th>Tgl Gagal Panen</th>
                <?php }else{ ?>
                  <th>Jumlah Panen</th>
                  <th>Tgl Panen</th>
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