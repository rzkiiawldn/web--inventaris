<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col">
      <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="col">
      <a href="<?= base_url('inventaris/deptOwner'); ?>" class="btn btn-primary mb-3 float-right"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
    </div>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 text-uppercase">
    <div class="card-body justify-content-center">
      <form method="post" action="">

        <input type="hidden" class="form-control" id="id_dept" name="id_dept" value="<?= $deptOwner->id_dept ?>">
        <div class="form-group row">
          <label for="kode_deptOwner" class="col-sm-3 col-form-label">Kode Dept Owner</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kode_deptOwner" name="kode_deptOwner" readonly value="<?= $deptOwner->kode_deptOwner ?>">
            <?= form_error('kode_deptOwner', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama_deptOwner" class="col-sm-3 col-form-label">Nama Dept Owner</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nama_deptOwner" name="nama_deptOwner" value="<?= $deptOwner->nama_deptOwner ?>">
            <?= form_error('nama_deptOwner', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        
        <button class="btn btn-primary float-right" type="submit">Simpan</button>
      </form>
    </div>
  </div>
</div>