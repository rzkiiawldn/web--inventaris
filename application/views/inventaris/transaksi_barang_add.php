<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col">
      <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="col">
      <a href="<?= base_url('inventaris/transaksi_barang'); ?>" class="btn btn-primary mb-3 float-right"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
    </div>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 text-uppercase">
    <div class="card-body justify-content-center">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group row">
          <label for="kode_transaksibarang" class="col-sm-3 col-form-label">Kode Transaksi Barang</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kode_transaksibarang" name="kode_transaksibarang" readonly value="<?= sprintf("%09s", $kode) ?>">
            <?= form_error('kode_transaksibarang', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="kode_radio" class="col-sm-3 col-form-label">Lokasi Barang</label>
          <div class="col-sm-9">
            <select name="kode_radio" id="kode_radio" class="form-control" required>
              <option value="">-- pilih --</option>
              <?php foreach ($kode_radio as $row) : ?>
                <option value="<?= $row->kode_radio ?>"><?= $row->nama_radio ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('kode_radio', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="kode_vendor" class="col-sm-3 col-form-label">Nama vendor</label>
          <div class="col-sm-9">
            <select name="kode_vendor" id="kode_vendor" class="form-control" required>
              <option value="">-- pilih --</option>
              <?php foreach ($vendor as $row) : ?>
                <option value="<?= $row->kode_vendor ?>"><?= $row->nama_vendor ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('kode_vendor', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="kode_jenisbarang" class="col-sm-3 col-form-label">Jenis Barang</label>
          <div class="col-sm-9">
            <select name="kode_jenisbarang" id="kode_jenisbarang" class="form-control" required>
              <option value="">-- pilih --</option>
              <?php foreach ($jenis_barang as $row) : ?>
                <option value="<?= $row->kode_jenisbarang ?>"><?= $row->nama_jenisbarang ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('kode_jenisbarang', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="kode_deptowner" class="col-sm-3 col-form-label">Departemen</label>
          <div class="col-sm-9">
            <select name="kode_deptowner" id="kode_deptowner" class="form-control" required>
              <option value="">-- pilih --</option>
              <?php foreach ($deptowner as $row) : ?>
                <option value="<?= $row->kode_deptOwner ?>"><?= $row->nama_deptOwner ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('kode_deptowner', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="harga_beli" class="col-sm-3 col-form-label">Harga Beli</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="<?= set_value('harga_beli') ?>">
            <?= form_error('harga_beli', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="masa_garansi" class="col-sm-3 col-form-label">Masa Garansi</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="masa_garansi" name="masa_garansi" value="<?= set_value('masa_garansi') ?>">
            <?= form_error('masa_garansi', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="versi_barang" class="col-sm-3 col-form-label">Versi Barang</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="versi_barang" name="versi_barang" value="<?= set_value('versi_barang') ?>">
            <?= form_error('versi_barang', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="tgl_beli" class="col-sm-3 col-form-label">Tanggal Beli</label>
          <div class="col-sm-9">
            <input type="date" class="form-control" id="tgl_beli" name="tgl_beli" value="<?= set_value('tgl_beli') ?>">
            <?= form_error('tgl_beli', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="kode_statusbarang" class="col-sm-3 col-form-label">Kondisi Barang</label>
          <div class="col-sm-9">
            <select name="kode_statusbarang" id="kode_statusbarang" class="form-control" required>
              <option value="">-- pilih --</option>
              <?php foreach ($status as $row) : ?>
                <option value="<?= $row->kode_statusbarang ?>"><?= $row->status ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('kode_statusbarang', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="serial_number" class="col-sm-3 col-form-label">Nomor Seri</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="serial_number" name="serial_number" value="<?= set_value('serial_number') ?>">
            <?= form_error('serial_number', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="user_ga" class="col-sm-3 col-form-label">User GA</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="user_ga" name="user_ga" value="<?= set_value('user_ga') ?>">
            <?= form_error('user_ga', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3">Foto Item</label>
          <div class="col-sm-9">
            <input type="file" name="foto_item" class="form-control">
            <?= form_error('foto_item', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <button class="btn btn-primary float-right" type="submit">Simpan</button>
      </form>
    </div>
  </div>
</div>