<link rel="shortcut icon" href="<?=site_url()?>assets/dist/img/AdminLTELogo.png" />
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script>
<body></body>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<!-- /.card-header -->
					<div class="card-body">
          <table width='100%'>
            <tr>
              <td width="150" rowspan='4' style="text-align: center;"><img style="text-align: center;" src="<?=base_url()?>assets/logo.png" width="100px"></td>
              <td style="text-align: center;font-size:18px;"><b>PEMERINTAH KOTA BANJARMASIN</b></td>
              <td width="150" rowspan='4'>&nbsp;</td>
            </tr>
            <tr>
              <td style="text-align: center; center;font-size:18px;"><b>DINAS PERTAHANAN PANGAN, PERTANIAN DAN PERIKANAN KOTA BANJARMASIN</b></td>
            </tr>
            <tr>
              <td style="text-align: center; center;font-size:16px;">Jalan Pangeran Hidayatullah Komplek Screen House Kel Benua Anyar</td>
            </tr>
            <tr>
              <td style="text-align: center; center;font-size:16px;">Telp (0511)320 1327 Fax. (0511)3201326 Banjarmasin</td>
            </tr>
          </table>
          <div><hr style="border: 1px solid black;"><hr style="border: 1px solid black;"></div>
						<table id="" class="table table-bordered">
							<thead>
                <tr>
								<th>No</th>
								<th>No Pengajuan</th>
								<th>Nama Koperasi</th>
								<th>Alamat Kebun </th>
								<th>Total Tanam</th>
								<th>Tgl Tanam</th>
                <th>Jumlah Gagal Panen</th>
                <th>Tgl Gagal Panen</th>
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
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>