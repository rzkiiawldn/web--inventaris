    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center">
                <h2>Transaksi berulang</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="<?= base_url('laporan') ?>" class="btn btn-primary mb-2">Kembali</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-header">
                        <b>
                            Laporan Harian
                        </b>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('laporan/transaksi_berulang_detail') ?>" method="post">
                        <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                        <input type="hidden" name="id_level" value="<?= $user->id_level ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hari</label>
                                    <select name="hari" id="hari" class="form-control">
                                        <?php for($hari = 1; $hari < 32; $hari++): ?>
                                        <option value="<?= $hari ?>"><?= $hari; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <?php for($tahun = date('Y'); $tahun >= (date('Y')-3); $tahun--): ?>
                                        <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Go</button>
                        </form>
                    </div>
                </div>
            </div> 
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-header">
                        <b>
                            Laporan Harian Perdaerah
                        </b>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('laporan/transaksi_berulang_detail') ?>" method="post">
                        <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                        <input type="hidden" name="id_level" value="<?= $user->id_level ?>">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Hari</label>
                                    <select name="hari" id="hari" class="form-control">
                                        <?php for($hari = 1; $hari < 32; $hari++): ?>
                                        <option value="<?= $hari ?>"><?= $hari; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <?php for($tahun = date('Y'); $tahun >= (date('Y')-3); $tahun--): ?>
                                        <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Daerah</label>
                                    <select name="kode_radio" id="kode_radio" class="form-control">
                                        <?php foreach($radio as $row): ?>
                                        <option value="<?= $row->kode_radio; ?>"><?= $row->nama_radio; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Go</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-header">
                        <b>
                            Laporan Bulanan
                        </b>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('laporan/transaksi_berulang_detail') ?>" method="post">
                        <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                        <input type="hidden" name="id_level" value="<?= $user->id_level ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <?php for($tahun = date('Y'); $tahun >= (date('Y')-3); $tahun--): ?>
                                        <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Go</button>
                        </form>
                    </div>
                </div>
            </div> 
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-header">
                        <b>
                            Laporan Bulanan Perdaerah
                                        </b>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('laporan/transaksi_berulang_detail') ?>" method="post">
                        <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                        <input type="hidden" name="id_level" value="<?= $user->id_level ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <?php for($tahun = date('Y'); $tahun >= (date('Y')-3); $tahun--): ?>
                                        <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Daerah</label>
                                    <select name="kode_radio" id="kode_radio" class="form-control">
                                        <?php foreach($radio as $row): ?>
                                        <option value="<?= $row->kode_radio; ?>"><?= $row->nama_radio; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Go</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-header">
                        <b>
                            Laporan Tahunan
                                        </b>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('laporan/transaksi_berulang_detail') ?>" method="post">
                        <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                        <input type="hidden" name="id_level" value="<?= $user->id_level ?>">
                        <div class="row">                            
                            <div class="col">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <?php for($tahun = date('Y'); $tahun >= (date('Y')-3); $tahun--): ?>
                                        <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Go</button>
                        </form>
                    </div>
                </div>
            </div> 
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-header">
                        <b>
                            Laporan Tahunan Perdaerah
                                        </b>
                    </div>
                    <div class="card-body">
                    <form action="<?= base_url('laporan/transaksi_berulang_detail') ?>" method="post">
                    <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                        <input type="hidden" name="id_level" value="<?= $user->id_level ?>">
                        <div class="row">
                        <div class="col">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <?php for($tahun = date('Y'); $tahun >= (date('Y')-3); $tahun--): ?>
                                        <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Daerah</label>
                                    <select name="kode_radio" id="kode_radio" class="form-control">
                                        <?php foreach($radio as $row): ?>
                                        <option value="<?= $row->kode_radio; ?>"><?= $row->nama_radio; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Go</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div> 