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
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th width="30%">Kode Transaksi</th>
                        <td>: <?= $transaksi_berulang->kode_transaksi ?></td>
                    </tr>
                    <tr>
                        <th width="30%">Kode Transaksi Barang</th>
                        <td>: <?= $transaksi_berulang->kode_transaksibarang ?></td>
                    </tr>
                    <tr>
                        <th width="30%">Keterangan</th>
                        <td>: <?= $transaksi_berulang->keterangan ?></td>
                    </tr>
                    <tr>
                        <th width="30%">Tanggal input</th>
                        <td>: <?= $transaksi_berulang->tanggal_input ?></td>
                    </tr>
                    <tr>
                        <th width="30%">Staff On Duty</th>
                        <td>: <?= $transaksi_berulang->nama ?></td>
                    </tr>
                    <tr>
                        <th width="30%">Status Detail</th>
                        <td>: <?= $transaksi_berulang->status_detail ?></td>
                    </tr>
                    <tr>
                        <th width="30%">Nama Vendor</th>
                        <td>: <?= $transaksi_berulang->nama_vendor ?></td>
                    </tr>
                    <tr>
                        <th width="30%">Biaya Service</th>
                        <td>: <?= $transaksi_berulang->biaya_service ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>