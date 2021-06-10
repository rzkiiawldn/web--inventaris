<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col">
      <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="col">
      <a href="<?= base_url('inventaris/transaksi_berulang'); ?>" class="btn btn-primary mb-3 float-right"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
    </div>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 text-uppercase">
    <div class="card-body justify-content-center">
      <form method="post" action="">
        <input type="hidden" class="form-control" id="id_berulang" name="id_berulang" value="<?= $transaksi_berulang->id_berulang ?>">
        <div class="form-group row">
          <label for="kode_transaksi" class="col-sm-3 col-form-label">Kode Transaksi</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kode_transaksi" name="kode_transaksi" value="<?= $transaksi_berulang->kode_transaksi ?>" readonly>
            <?= form_error('kode_transaksi', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="kode_transaksibarang" class="col-sm-3 col-form-label">Kode Transaksi Barang</label>
          <div class="col-sm-9">
            <select name="kode_transaksibarang" id="kode_transaksibarang" class="form-control" required>
              <option value="">-- pilih --</option>
              <?php foreach ($transaksi_barang as $row) : ?>
                <?php if ($row->kode_transaksibarang == $transaksi_berulang->kode_transaksibarang) { ?>
                  <option value="<?= $row->kode_transaksibarang ?>" selected><?= $row->kode_transaksibarang ?></option>
                <?php } else { ?>
                  <option value="<?= $row->kode_transaksibarang ?>"><?= $row->kode_transaksibarang ?></option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
            <?= form_error('kode_transaksibarang', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="kode_jenisbarang" class="col-sm-3 col-form-label">Jenis Barang</label>
          <div class="col-sm-9">
          <input type="text" readonly class="kode_jenisbarang form-control" id="kode_jenisbarang" name="jenisbarang" value="<?= $transaksi_berulang->jenisbarang ?>">
            <?= form_error('kode_transaksibarang', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
          <div class="col-sm-9">
            <textarea name="keterangan" id="keterangan" rows="8" class="form-control"><?= $transaksi_berulang->keterangan ?></textarea>
            <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="status_detail" class="col-sm-3 col-form-label">Status Detail</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="status_detail" name="status_detail" value="<?= $transaksi_berulang->status_detail ?>">
            <?= form_error('status_detail', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="kode_vendor" class="col-sm-3 col-form-label">Kode Vendor</label>
          <div class="col-sm-9">
            <select name="kode_vendor" id="kode_vendor" class="form-control" required>
              <option value="">-- pilih --</option>
              <?php foreach ($vendor as $row) : ?>
                <?php if ($transaksi_berulang->kode_vendor == $row->kode_vendor) { ?>
                  <option value="<?= $row->kode_vendor ?>" selected><?= $row->nama_vendor ?></option>
                <?php } else { ?>
                  <option value="<?= $row->kode_vendor ?>"><?= $row->nama_vendor ?></option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
            <?= form_error('kode_vendor', '<small class="text-danger text-center">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="biaya_service" class="col-sm-3 col-form-label">Biaya Service</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="biaya_service" name="biaya_service" value="<?= $transaksi_berulang->biaya_service ?>">
            <?= form_error('biaya_service', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <button class="btn btn-primary float-right" type="submit">Simpan</button>
      </form>
    </div>
  </div>
</div>