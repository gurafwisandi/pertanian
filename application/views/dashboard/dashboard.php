
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Dashboard</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<h3><?php echo $total_koperasi;?></sup></h3>

						<p>Kelompok Tani</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="<?=site_url('koperasi')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3><?php echo $total_pengajuan; ?></h3>

						<p>Pengajuan</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="<?=site_url('pengajuan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
					<div class="inner">
						<h3><?php echo $total_petani;?></h3>

						<p>Petani</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="<?=site_url('petani')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-danger">
					<div class="inner">
						<h3><?php echo $total_monev;?></h3>

						<p>Monev</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="<?=site_url('monev')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<section class="content">
	<?php $this->view('messages')?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data Monev</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
					<?php
						$date = date('Y');
						$dataPoints1 = [];
						$dataPoints2 = [];

						$query = $this->db->query("SELECT * from hasil_panen where tgl_panen LIKE '%$date%' GROUP BY DATE_FORMAT(tgl_panen, '%Y%m')");
						foreach ($query->result() as $row){
							$bulan = date('Y-m', strtotime($row->tgl_panen));
							
							$query_panen = $this->db->query("SELECT sum(jumlah_panen) as jumlah_panen, tgl_panen from hasil_panen where tgl_panen LIKE '%$bulan%' AND jenis_panen='Berhasil' GROUP BY DATE_FORMAT(tgl_panen, '%Y%m')");
							if(count($query_panen->result()) > 0){
								foreach ($query_panen->result() as $row){
									array_push($dataPoints1,array("label"=> date('F Y', strtotime($row->tgl_panen)), "y"=> $row->jumlah_panen));
								}
							}else{
								array_push($dataPoints1,array("label"=> date('F Y', strtotime($bulan)), "y"=> '0'));
							}
							
							$query_gagal = $this->db->query("SELECT sum(jumlah_panen) as jumlah_panen, tgl_panen from hasil_panen where tgl_panen LIKE '%$bulan%' AND jenis_panen='Gagal' GROUP BY DATE_FORMAT(tgl_panen, '%Y%m')");
							if(count($query_gagal->result()) > 0){
								foreach ($query_gagal->result() as $row){
									array_push($dataPoints2,array("label"=> date('F Y', strtotime($row->tgl_panen)), "y"=> $row->jumlah_panen));
								}
							}else{
								array_push($dataPoints2,array("label"=> date('F Y', strtotime($bulan)), "y"=> '0'));
							}
						}
					?>
					<script>
						Tahun = new Date().getFullYear();
						window.onload = function () {
							var chart = new CanvasJS.Chart("chartContainer", {
								animationEnabled: true,
								theme: "light2",
								title:{
									text: "Grafik Panen Kelompok Tani "+ Tahun
								},
								axisY:{
									includeZero: true
								},
								legend:{
									cursor: "pointer",
									verticalAlign: "center",
									horizontalAlign: "right",
									itemclick: toggleDataSeries
								},
								data: [{
									type: "column",
									name: "Berhasil Panen",
									indexLabel: "{y}",
									yValueFormatString: "#0.##",
									showInLegend: true,
									dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
								},{
									type: "column",
									name: "Gagal Panen",
									indexLabel: "{y}",
									yValueFormatString: "#0.##",
									showInLegend: true,
									dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
								}]
							});
							chart.render();
							function toggleDataSeries(e){
								if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
									e.dataSeries.visible = false;
								}
								else{
									e.dataSeries.visible = true;
								}
								chart.render();
							}
						}
					</script>
					<div id="chartContainer" style="height: 370px; width: 100%;"></div>
					<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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