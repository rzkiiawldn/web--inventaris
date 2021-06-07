<?php

class Pengaturan_model extends CI_Model
{

    public function filter_all($bulan, $tahun)
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun'");
        return $query->result_array();
    }

    public function filterbytanggal_all($bulan, $tahun, $nama_radio)
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio ='$nama_radio'");
        return $query->result_array();
    }
    public function filter_id($bulan, $tahun, $id_user)
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user");
        return $query->result_array();
    }

    public function filterbytanggal_id($bulan, $tahun, $nama_radio, $id_user)
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio ='$nama_radio'  AND user_owner = $id_user");
        return $query->result_array();
    }
// TAHUN
    public function filter_tahunall($tahun)
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio WHERE YEAR(tgl_beli) = '$tahun'");
        return $query->result_array();
    }

    public function filterbytanggal_tahunall($tahun, $nama_radio)
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio WHERE YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio ='$nama_radio'");
        return $query->result_array();
    }
    public function filter_tahunid($tahun, $id_user)
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio WHERE YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user");
        return $query->result_array();
    }

    public function filterbytanggal_tahunid($tahun, $nama_radio, $id_user)
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio WHERE YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio ='$nama_radio'  AND user_owner = $id_user");
        return $query->result_array();
    }
}
