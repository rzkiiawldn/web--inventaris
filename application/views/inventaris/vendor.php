<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
        </div>
        <div class="col">
            <a href="<?= base_url('inventaris/vendor_add'); ?>" class="btn btn-primary mb-3 float-right"><i class="fas fa-plus"></i> Tambah</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Kode Vendor</th>
                            <th>Nama Vendor</th>
                            <th>Kontak Vendor</th>
                            <th>Alamat Vendor</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($vendor as $row) { ?>
                        <tbody>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->kode_vendor; ?></td>
                                <td><?= $row->nama_vendor; ?></td>
                                <td><?= $row->kontak_vendor; ?></td>
                                <td><?= $row->alamat_vendor; ?></td>
                                <td>
                                    <a href="<?= base_url('inventaris/vendor_edit/' . $row->id_vendor); ?>" class="btn btn-sm btn-success">edit</a>
                                    <a href="<?= base_url('inventaris/vendor_delete/' . $row->id_vendor); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus ?')">hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>