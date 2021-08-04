<form action="<?php echo site_url('/pengajuan/kehadiran/'.$data[0]->pengajuan_id) ?>" method="POST">
	<div class="modal-body">
		<input type="hidden" name="id" value="<?php echo $data[0]->id;?>">
		<div class="row">
    <div class="col-sm-12">
      <div class="col-12">
        <div class="form-group">
          <label>Pengajuan</label>
          <input type="text" name="pengajuan_id" class="form-control" value="<?php echo $data[0]->pengajuan_id; ?>" readonly>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" value="<?php echo $data[0]->nama; ?>" readonly>
        </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <label for="selectFloatingLabel2" class="placeholder">Kehadiran <code>*</code></label>
            <select name="kehadiran" class="form-control input-solid" id="selectFloatingLabel2" required>
              <option value="">&nbsp;</option>
              <option value="Hadir" <?php if($data[0]->kehadiran_seminar == 'Hadir'){ echo 'selected'; } ?>>Hadir</option>
              <option value="Tidak Hadir" <?php if($data[0]->kehadiran_seminar == 'Tidak Hadir'){ echo 'selected'; } ?>>Tidak Hadir</option>
            </select>
          </div>
      </div>
		</div>
	</div>
	<div class="modal-footer no-bd">
		<button type="submit" name="submit" value="item_bantuan" class="btn btn-primary">Simpan</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	</div>
</form>