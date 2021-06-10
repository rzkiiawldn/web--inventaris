    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center">
                <h2>Transaksi berulang</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card shadow">
                    <div class="card-header">
                        Total Transaksi berulang
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th width="50%">Date</th>
                                <th width="50%">Total Transaksi</th>
                            </tr>
                            <tr>
                                <td><?= $hari ?> <?= $bulan ?> <?= $tahun; ?></td>
                                <td><?= $total; ?></td>
                            </tr>
                        </table>
                        <form action="<?= base_url('laporan/cetak_berulang') ?>" method="post">
                            <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                            <input type="hidden" name="id_level" value="<?= $user->id_level ?>">
                            <input type="hidden" name="bulan" value="<?= $bulan ?>">
                            <input type="hidden" name="tahun" value="<?= $tahun ?>">
                            <input type="hidden" name="kode_radio" value="<?= $kode_radio ?>">
                            <button type="submit" class="btn btn-primary float-right">Export PDF</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card shadow">
                    <div class="card-header">
                        Semua Transaksi berulang
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th width="50%">Date</th>
                                <th width="50%">kode radio</th>
                            </tr>
                            <?php $no = 1; foreach($transaksi_berulang as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->tanggal_input; ?></td>
                                <td><?= $row->nama_radio; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 