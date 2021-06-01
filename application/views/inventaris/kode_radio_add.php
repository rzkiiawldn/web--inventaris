<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col">
      <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="col">
      <a href="<?= base_url('inventaris/kode_radio'); ?>" class="btn btn-primary mb-3 float-right"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
    </div>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 text-uppercase">
    <div class="card-body justify-content-center">
      <form method="post" action="">
        <div class="form-group row">
          <label for="kode_radio" class="col-sm-3 col-form-label">Kode Radio</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="kode_radio" name="kode_radio" value="<?= sprintf("%02s", $kode) ?>" readonly>
            <?= form_error('kode_radio', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama_radio" class="col-sm-3 col-form-label">Nama Radio</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nama_radio" name="nama_radio" value="<?= set_value('nama_radio') ?>">
            <?= form_error('nama_radio', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <button class="btn btn-primary float-right" type="submit">Simpan</button>
      </form>
    </div>
  </div>
</div>