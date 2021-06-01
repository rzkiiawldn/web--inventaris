<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col">
      <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="col">
      <a href="<?= base_url('inventaris/status'); ?>" class="btn btn-primary mb-3 float-right"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
    </div>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 text-uppercase">
    <div class="card-body justify-content-center">
      <form method="post" action="">

        <input type="hidden" class="form-control" id="id_status" name="id_status" value="<?= $status->id_status ?>">
        <div class="form-group row">
          <label for="kode_statusbarang" class="col-sm-3 col-form-label">kode_statusbarang</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kode_statusbarang" name="kode_statusbarang" readonly value="<?= $status->kode_statusbarang ?>">
            <?= form_error('kode_statusbarang', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="status" class="col-sm-3 col-form-label">Status</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="status" name="status" value="<?= $status->status ?>">
            <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <button class="btn btn-primary float-right" type="submit">Simpan</button>
      </form>
    </div>
  </div>
</div>