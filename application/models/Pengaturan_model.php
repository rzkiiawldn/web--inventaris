<?php

class Pengaturan_model extends CI_Model
{

    public function filter_all($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio WHERE tgl_beli BETWEEN '$tanggalawal' AND '$tanggalakhir' ORDER BY tgl_beli ASC ");
        return $query->result_array();
    }

    public function filterbytanggal_all($tanggalawal, $tanggalakhir, $nama_radio)
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio WHERE tgl_beli BETWEEN '$tanggalawal' AND '$tanggalakhir' AND tb_transaksi.kode_radio ='$nama_radio' ORDER BY tgl_beli ASC ");
        return $query->result_array();
    }
    public function filter_id($tanggalawal, $tanggalakhir, $id_user)
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio WHERE tgl_beli BETWEEN '$tanggalawal' AND '$tanggalakhir' AND user_owner = $id_user ORDER BY tgl_beli ASC ");
        return $query->result_array();
    }

    public function filterbytanggal_id($tanggalawal, $tanggalakhir, $nama_radio, $id_user)
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio WHERE tgl_beli BETWEEN '$tanggalawal' AND '$tanggalakhir' AND tb_transaksi.kode_radio ='$nama_radio'  AND user_owner = $id_user ORDER BY tgl_beli ASC ");
        return $query->result_array();
    }
}
