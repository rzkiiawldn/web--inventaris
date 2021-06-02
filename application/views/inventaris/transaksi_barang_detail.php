<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col">
      <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="col">
      <a href="<?= base_url('inventaris/transaksi_barang'); ?>" class="btn btn-primary mb-3 float-right"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
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
            <td>: <?= $transaksi_barang->kode_transaksibarang ?></td>
          </tr>
          <tr>
            <th width="30%">Kode Radio</th>
            <td>: <?= $transaksi_barang->nama_radio ?></td>
          </tr>
          <tr>
            <th width="30%">Harga Beli</th>
            <td>: <?= $transaksi_barang->harga_beli ?></td>
          </tr>
          <tr>
            <th width="30%">Tanggal Beli</th>
            <td>: <?= $transaksi_barang->tgl_beli ?></td>
          </tr>
          <tr>
            <th width="30%">Jenis Barang</th>
            <td>: <?= $transaksi_barang->nama_jenisbarang ?></td>
          </tr>
          <tr>
            <th width="30%">Versi Barang</th>
            <td>: <?= $transaksi_barang->versi_barang ?></td>
          </tr>
          <tr>
            <th width="30%">Nomor Seri</th>
            <td>: <?= $transaksi_barang->serial_number ?></td>
          </tr>
          <tr>
            <th width="30%">Kode Vendor</th>
            <td>: <?= $transaksi_barang->nama_vendor ?></td>
          </tr>
          <tr>
            <th width="30%">Kode Vendor</th>
            <td>: <?= $transaksi_barang->kode_vendor ?></td>
          </tr>
          <tr>
            <th width="30%">Masa Garansi</th>
            <td>: <?= $transaksi_barang->masa_garansi ?></td>
          </tr>
          <tr>
            <th width="30%">Foto Item</th>
            <td>: <img src="<?= base_url('assets/img/transaksi/' . $transaksi_barang->foto_item) ?>" alt="" width="200px"></td>
          </tr>
          <tr>
            <th width="30%">Status Barang</th>
            <td>: <?= $transaksi_barang->status ?></td>
          </tr>
          <tr>
            <th width="30%">User GA</th>
            <td>: <?= $transaksi_barang->user_ga ?></td>
          </tr>
          <tr>
            <th width="30%">Tanggal Input</th>
            <td>: <?= $transaksi_barang->tgl_input ?></td>
          </tr>
          <tr>
            <th width="30%">User Owner</th>
            <td>: <?= $transaksi_barang->nama ?></td>
          </tr>
          <tr>
            <th width="30%">Departemen</th>
            <td>: <?= $transaksi_barang->nama_deptOwner ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>