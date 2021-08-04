<form action="<?php echo site_url('/pengajuan/seminar/'.$data[0]->pengajuan_id) ?>" method="POST">
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
          <label>Item Pengajuan</label>
          <input type="text" class="form-control" value="<?php echo $data[0]->item; ?>" readonly>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label>Qty</label>
          <input type="text" class="form-control" value="<?php echo $data[0]->qty; ?>" readonly>
        </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <label for="selectFloatingLabel2" class="placeholder">Item <code>*</code></label>
            <select name="id_item" class="form-control input-solid" id="selectFloatingLabel2" required>
              <option value="">&nbsp;</option>
              <?php 
                $this->db->select('*');
                $this->db->from('item');      
                $this->db->join('vendor','vendor.id_vendor=item.id_vendor');                 
                $query = $this->db->get();            
                foreach ($query->result() as $row)
                {
              ?>
                <option value="<?php echo $row->id_item;?>"<?php if($data[0]->id_item == $row->id_item){ echo 'selected'; }?>><?php echo $row->nama_item.' - '.$row->nama_vendor;?></option>
              <?php	} ?>
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