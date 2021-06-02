<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col">
      <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="col">
      <a href="<?= base_url('inventaris/jenis_barang'); ?>" class="btn btn-primary mb-3 float-right"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
    </div>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 text-uppercase">
    <div class="card-body justify-content-center">
      <form method="post" action="">

        <input type="hidden" class="form-control" id="id_jenisbarang" name="id_jenisbarang" value="<?= $jenis_barang->id_jenisbarang ?>">
        <div class="form-group row">
          <label for="kode_jenisbarang" class="col-sm-3 col-form-label">Kode Jenis Barang</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kode_jenisbarang" name="kode_jenisbarang" readonly value="<?= $jenis_barang->kode_jenisbarang ?>">
            <?= form_error('kode_jenisbarang', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama_jenisbarang" class="col-sm-3 col-form-label">Nama Jenis Barang</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nama_jenisbarang" name="nama_jenisbarang" value="<?= $jenis_barang->nama_jenisbarang ?>">
            <?= form_error('nama_jenisbarang', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <button class="btn btn-primary float-right" type="submit">Simpan</button>
      </form>
    </div>
  </div>
</div>