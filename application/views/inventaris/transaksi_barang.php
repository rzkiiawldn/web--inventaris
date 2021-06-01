<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
        </div>
        <div class="col">
            <a href="<?= base_url('inventaris/transaksi_barang_add'); ?>" class="btn btn-primary mb-3 float-right"><i class="fas fa-plus"></i> Tambah</a>
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
                            <th>Kode Transaksi Barang</th>
                            <th>Kode Radio</th>
                            <th>Tanggal Beli</th>
                            <th>Kode Jenis Barang</th>
                            <th>Versi Barang</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($transaksi_barang as $row) { ?>
                        <tbody>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->kode_transaksibarang; ?></td>
                                <td><?= $row->kode_radio; ?></td>
                                <td><?= $row->tgl_beli; ?></td>
                                <td><?= $row->kode_jenisbarang; ?></td>
                                <td><?= $row->versi_barang; ?></td>
                                <td>
                                    <a href="<?= base_url('inventaris/transaksi_barang_edit/' . $row->kode_transaksibarang); ?>" class="btn btn-sm btn-success">edit</a>
                                    <a href="<?= base_url('inventaris/transaksi_barang_delete/' . $row->kode_transaksibarang); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus ?')">hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>