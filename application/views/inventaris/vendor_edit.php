<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col">
      <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="col">
      <a href="<?= base_url('inventaris/vendor'); ?>" class="btn btn-primary mb-3 float-right"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
    </div>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 text-uppercase">
    <div class="card-body justify-content-center">
      <form method="post" action="">

        <input type="hidden" class="form-control" id="kode_vendor" name="kode_vendor" value="<?= $vendor->kode_vendor ?>">
        <div class="form-group row">
          <label for="nama_vendor" class="col-sm-3 col-form-label">nama vendor</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" value="<?= $vendor->nama_vendor ?>">
            <?= form_error('nama_vendor', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="kontak_vendor" class="col-sm-3 col-form-label">kontak vendor</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kontak_vendor" name="kontak_vendor" value="<?= $vendor->kontak_vendor ?>">
            <?= form_error('kontak_vendor', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="alamat_vendor" class="col-sm-3 col-form-label">alamat vendor</label>
          <div class="col-sm-9">
            <textarea name="alamat_vendor" id="alamat_vendor" rows="8" class="form-control"><?= $vendor->alamat_vendor ?></textarea>
            <?= form_error('alamat_vendor', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <button class="btn btn-primary float-right" type="submit">Simpan</button>
      </form>
    </div>
  </div>
</div>