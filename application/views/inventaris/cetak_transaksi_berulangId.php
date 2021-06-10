<html><head>
  <title><?= $judul; ?></title>

  <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>

</head><body>

  <center>
    <table width="530" style="text-align: left;margin-top: 5px;">
      <tr style="margin-bottom: 5">
        <td width="20px"><b>No</b></td>
        <td><b>Tanggal Beli</b></td>
        <td><b>Transaksi Barang</b></td>
        <td><b>Jenis Barang</b></td>
      </tr>
      <?php $no = 1; ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $data_filter['tanggal_input']; ?></td>
          <td><?= $data_filter['kode_transaksibarang']; ?></td>
          <td><?= $data_filter['jenisbarang']; ?></td>
        </tr>
    </table>
  </center>
</body></html>