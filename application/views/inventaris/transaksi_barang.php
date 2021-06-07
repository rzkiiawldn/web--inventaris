<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="<?= base_url('inventaris/transaksi_barang_add'); ?>" class="btn btn-primary mb-3 "><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="col">
            <div class="btn-group float-right">
                <button type="button" class="btn btn-primary "><i class="fas fa-print"></i> Cetak data</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cetakdata">Cetak seluruh data</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cetakdatawilayah">cetak data perwilayah</a>
                </div>
            </div>
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
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($transaksi_barang as $row) { ?>
                        <tbody>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->kode_transaksibarang; ?></td>
                                <td><?= $row->nama_radio; ?></td>
                                <td><?= $row->tgl_beli; ?></td>
                                <td><?= $row->nama_jenisbarang; ?></td>
                                <td><?= $row->versi_barang; ?></td>
                                <td>
                                    <a href="<?= base_url('inventaris/daftar_transaksi_berulang/' . $row->kode_transaksibarang); ?>" class="btn btn-sm btn-primary" title="daftar transaksi berulang"><i class="fas fa-undo-alt"></i></a>
                                    <a href="<?= base_url('inventaris/transaksi_barang_detail/' . $row->id_transaksi); ?>" class="btn btn-sm btn-info" title="detail transaksi"><i class="fas fa-eye"></i></a>
                                    <a href="<?= base_url('inventaris/transaksi_barang_edit/' . $row->id_transaksi); ?>" class="btn btn-sm btn-success" title="Edit"><i class="fas fa-pen"></i></a>
                                    <a href="<?= base_url('inventaris/transaksi_barang_delete/' . $row->id_transaksi); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus ?')" title="hapus"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Cetak Add -->
<div class="modal fade" id="cetakdata" tabindex="-1" role="dialog" aria-labelledby="cetakdataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cetakdataLabel">Cetak Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('inventaris/cetak'); ?>" target="_blank">
                <div class="modal-body">
                    <input type="hidden" name="id_level" value="<?= $user->id_level ?>">
                    <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" name="tanggalawal" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" name="tanggalakhir" required="" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="tambah">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Cetak Add -->
<div class="modal fade" id="cetakdatawilayah" tabindex="-1" role="dialog" aria-labelledby="cetakdataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cetakdataLabel">Cetak Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('inventaris/cetak_perwilayah'); ?>" target="_blank">
                <div class="modal-body">
                    <input type="hidden" name="id_level" value="<?= $user->id_level ?>">
                    <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" name="tanggalawal" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" name="tanggalakhir" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Daerah</label>
                        <select name="nama_radio" id="nama_radio" class="form-control">
                            <option value="" selected disabled>-- pilih --</option>
                            <?php foreach ($radio as $row) : ?>
                                <option value="<?= $row->kode_radio ?>"><?= $row->nama_radio; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="tambah">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>