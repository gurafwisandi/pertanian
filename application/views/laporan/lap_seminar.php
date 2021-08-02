
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
								<th>Tgl Seminar</th>
								<th>Lokasi</th>
								<th>Nama Koperasi</th>
								<th>Terdaftar Seminar</th>
								<th>Keterangan Hasil Pengajuan</th>
								<th>Kehadiran Anggota</th>
							</tr>
							</thead>
							<tbody>
							<?php $no=1;
							foreach ($row->result() as $key => $data) {?>
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $data->pengajuan_id?></td>
								<td><?php echo $data->tgl_terima_bantuan?></td>
								<td><?php echo $data->lokasi?></td>
								<td><?php echo $data->koperasi?></td>
								<td><?php echo $data->jml_anggota?></td>
								<td><?php echo $data->keterangan_hasil_pengajuan?></td>
								<td>
                  <?php 
                  $pieces = explode(",", $data->nama_hadir);
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
								<th>Tgl Seminar</th>
								<th>Lokasi</th>
								<th>Nama Koperasi</th>
								<th>Anggota Seminar</th>
								<th>Keterangan Hasil Pengajuan</th>
								<th>Anggota Seminar</th>
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