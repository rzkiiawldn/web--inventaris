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
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                    <th>Kode Transaksi</th>
                    <td>: <?= $transaksi_berulang->kode_transaksi ?></td>
                    </tr>
                    <tr>
                    <th>Kode Transaksi</th>
                    <td>: <?= $transaksi_berulang->kode_transaksi ?></td>
                    </tr>
                    <tr>
                    <th>Kode Transaksi</th>
                    <td>: <?= $transaksi_berulang->kode_transaksi ?></td>
                    </tr>
                    <tr>
                    <th>Kode Transaksi</th>
                    <td>: <?= $transaksi_berulang->kode_transaksi ?></td>
                    </tr>
                    <tr>
                    <th>Kode Transaksi</th>
                    <td>: <?= $transaksi_berulang->kode_transaksi ?></td>
                    </tr>
                    <tr>
                    <th>Kode Transaksi</th>
                    <td>: <?= $transaksi_berulang->kode_transaksi ?></td>
                    </tr>
                    <tr>
                    <th>Kode Vendor</th>
                    <td>: <?= $transaksi_berulang->kode_vendor ?></td>
                    </tr>
                    <tr>
                    <th>Biaya Service</th>
                    <td>: <?= $transaksi_berulang->biaya_service ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>