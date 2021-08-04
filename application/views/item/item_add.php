<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-md-6">
        <h1>Kebutuhan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Input</a></li>
          <li class="breadcrumb-item active">Jenis Kebutuhan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Input Data Kebutuhan</h3>
    </div>
    <div class="card-body">
      <form action="<?=site_url('item/process')?>" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Item <code>*</code></label>
            <input type="hidden" name="id" value="<?=$row->id_item?>" class="form-control">
            <input type="text" required class="form-control" name="nama_item" value="<?=$row->nama_item?>"placeholder="Nama Item" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Keterangan <code>*</code></label>
            <input type="text" required class="form-control" name="keterangan" value="<?=$row->keterangan?>"placeholder="Keterangan" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Harga <code>*</code></label>
            <input type="number" required class="form-control" name="harga" value="<?=$row->harga?>"placeholder="Harga" required>
          </div>
          <div class="form-group">
            <label>Vendor <code>*</code></label>
            <select name="id_vendor" class="form-control select2" style="width: 100%;" required>
              <option value="">&nbsp;</option>
              <?php 
                $this->db->select('*');
                $this->db->from('vendor');                            
                $query = $this->db->get();            
                foreach ($query->result() as $data)
                {
              ?>
                <option value="<?php echo $data->id_vendor;?>"<?php if($row->id_vendor == $data->id_vendor){ echo 'selected'; }?>><?php echo $data->nama_vendor;?></option>
              <?php	} ?>
            </select>
          </div>
          <div class="card-footer">
            <button type="submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
</section>