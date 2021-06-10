<?php

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = [
            'judul'     => 'Laporan',
            'bulan'     => bulan(),
            'radio'     => $this->db->get('tb_koderadio')->result(),
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('laporan/index');
        $this->load->view('template/_footer');
    }
    public function transaksi_barang()
    {
        $data = [
            'judul'     => 'Laporan',
            'bulan'     => bulan(),
            'radio'     => $this->db->get('tb_koderadio')->result(),
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('laporan/transaksi_barang');
        $this->load->view('template/_footer');
    }

    public function transaksi_barang_detail()
    {
        $hari       = $this->input->post('hari');
        $bulan      = $this->input->post('bulan');
        $tahun      = $this->input->post('tahun');
        $kode_radio = $this->input->post('kode_radio');
        $id_level   = $this->input->post('id_level');
        $id_user    = $this->input->post('id_user');

        if ($id_level == 3 || $id_level == 1) {
            if(!$this->input->post('kode_radio') && !$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun'")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun'")->num_rows();
            } elseif(!$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->num_rows();
            } elseif(!$this->input->post('kode_radio') && !$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun'")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun'")->num_rows();
            } elseif(!$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->num_rows();
            } elseif(!$this->input->post('kode_radio')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun'")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun'")->num_rows();
            } else {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->num_rows();
            }
        } else {
            if(!$this->input->post('kode_radio') && !$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user")->num_rows();
            } elseif(!$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND user_owner = $id_user")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND user_owner = $id_user")->num_rows();
            } elseif(!$this->input->post('kode_radio') && !$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user")->num_rows();
            } elseif(!$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND user_owner = $id_user")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND user_owner = $id_user")->num_rows();
            } elseif(!$this->input->post('kode_radio')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user")->num_rows();
            } else {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND user_owner = $id_user")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND user_owner = $id_user")->num_rows();
            }
        }
        $data = [
            'judul'             => 'Laporan',
            'hari'              => $hari,
            'bulan'             => $bulan,
            'tahun'             => $tahun,
            'kode_radio'        => $kode_radio,
            'total'             => $total,
            'radio'             => $this->db->get('tb_koderadio')->result(),
            'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'transaksi'         => $transaksi
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('laporan/transaksi_barang_detail');
        $this->load->view('template/_footer');
    }

    public function cetak()
    {
        
        $hari       = $this->input->post('hari');
        $bulan      = $this->input->post('bulan');
        $tahun      = $this->input->post('tahun');
        $kode_radio = $this->input->post('kode_radio');
        $id_level   = $this->input->post('id_level');
        $id_user    = $this->input->post('id_user');

        if ($id_level == 3 || $id_level == 1) {
            if(!$this->input->post('kode_radio') && !$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun'")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun'")->num_rows();
            } elseif(!$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->num_rows();
            } elseif(!$this->input->post('kode_radio') && !$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun'")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun'")->num_rows();
            } elseif(!$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->num_rows();
            } elseif(!$this->input->post('kode_radio')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun'")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun'")->num_rows();
            } else {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->num_rows();
            }
        } else {
            if(!$this->input->post('kode_radio') && !$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user")->num_rows();
            } elseif(!$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND user_owner = $id_user")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND user_owner = $id_user")->num_rows();
            } elseif(!$this->input->post('kode_radio') && !$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user")->num_rows();
            } elseif(!$this->input->post('hari')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND user_owner = $id_user")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND user_owner = $id_user")->num_rows();
            } elseif(!$this->input->post('kode_radio')) {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND user_owner = $id_user")->num_rows();
            } else {
                $transaksi  = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND user_owner = $id_user")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tgl_beli) = '$hari' AND MONTH(tgl_beli) = '$bulan' AND YEAR(tgl_beli) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND user_owner = $id_user")->num_rows();
            }
        }

        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'data_filter'      => $transaksi,
            'user'             => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view('inventaris/cetak_transaksi', $data);

        $paper_size         = 'A4';
        $orientation        = 'potrait';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
    }

    // BERULANG
    public function transaksi_berulang()
    {
        $data = [
            'judul'     => 'Laporan',
            'bulan'     => bulan(),
            'radio'     => $this->db->get('tb_koderadio')->result(),
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('laporan/transaksi_berulang');
        $this->load->view('template/_footer');
    }
    public function transaksi_berulang_detail()
    {
        $hari       = $this->input->post('hari');
        $bulan      = $this->input->post('bulan');
        $tahun      = $this->input->post('tahun');
        $kode_radio = $this->input->post('kode_radio');
        $id_level   = $this->input->post('id_level');
        $id_user    = $this->input->post('id_user');

        if ($id_level == 3 || $id_level == 1) {
            if(!$this->input->post('kode_radio') && !$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun'")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun'")->num_rows();
            } elseif(!$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->num_rows();
            } elseif(!$this->input->post('kode_radio') && !$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun'")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun'")->num_rows();
            } elseif(!$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->num_rows();
            } elseif(!$this->input->post('kode_radio')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun'")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun'")->num_rows();
            } else {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->num_rows();
            }
        } else {
            if(!$this->input->post('kode_radio') && !$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND staff_onduty = $id_user")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND staff_onduty = $id_user")->num_rows();
            } elseif(!$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND staff_onduty = $id_user")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND staff_onduty = $id_user")->num_rows();
            } elseif(!$this->input->post('kode_radio') && !$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND staff_onduty = $id_user")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND staff_onduty = $id_user")->num_rows();
            } elseif(!$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND staff_onduty = $id_user")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND staff_onduty = $id_user")->num_rows();
            } elseif(!$this->input->post('kode_radio')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND staff_onduty = $id_user")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND staff_onduty = $id_user")->num_rows();
            } else {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND staff_onduty = $id_user")->result();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND staff_onduty = $id_user")->num_rows();
            }
        }
        $data = [
            'judul'             => 'Laporan',
            'hari'              => $hari,
            'bulan'             => $bulan,
            'tahun'             => $tahun,
            'kode_radio'        => $kode_radio,
            'total'             => $total,
            'radio'             => $this->db->get('tb_koderadio')->result(),
            'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'transaksi_berulang'=> $transaksi_berulang
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('laporan/transaksi_berulang_detail');
        $this->load->view('template/_footer');
    }

    public function cetak_berulang()
    {
        
        $hari       = $this->input->post('hari');
        $bulan      = $this->input->post('bulan');
        $tahun      = $this->input->post('tahun');
        $kode_radio = $this->input->post('kode_radio');
        $id_level   = $this->input->post('id_level');
        $id_user    = $this->input->post('id_user');

        if ($id_level == 3 || $id_level == 1) {
            if(!$this->input->post('kode_radio') && !$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun'")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun'")->num_rows();
            } elseif(!$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->num_rows();
            } elseif(!$this->input->post('kode_radio') && !$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun'")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun'")->num_rows();
            } elseif(!$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->num_rows();
            } elseif(!$this->input->post('kode_radio')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun'")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun'")->num_rows();
            } else {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio")->num_rows();
            }
        } else {
            if(!$this->input->post('kode_radio') && !$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND staff_onduty = $id_user")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND staff_onduty = $id_user")->num_rows();
            } elseif(!$this->input->post('bulan') && !$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND staff_onduty = $id_user")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND staff_onduty = $id_user")->num_rows();
            } elseif(!$this->input->post('kode_radio') && !$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND staff_onduty = $id_user")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND staff_onduty = $id_user")->num_rows();
            } elseif(!$this->input->post('hari')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND staff_onduty = $id_user")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND staff_onduty = $id_user")->num_rows();
            } elseif(!$this->input->post('kode_radio')) {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND staff_onduty = $id_user")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND staff_onduty = $id_user")->num_rows();
            } else {
                $transaksi_berulang  = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND staff_onduty = $id_user")->result_array();
                $total      = $this->db->query("SELECT * FROM tb_transaksi_berulang JOIN tb_transaksi ON tb_transaksi_berulang.kode_transaksibarang = tb_transaksi.kode_transaksibarang JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang WHERE DAY(tb_transaksi_berulang.tanggal_input) = '$hari' AND MONTH(tb_transaksi_berulang.tanggal_input) = '$bulan' AND YEAR(tb_transaksi_berulang.tanggal_input) = '$tahun' AND tb_transaksi.kode_radio = $kode_radio AND staff_onduty = $id_user")->num_rows();
            }
        }

        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'data_filter'      => $transaksi_berulang,
            'user'             => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view('inventaris/cetak_transaksi_berulang', $data);

        $paper_size         = 'A4';
        $orientation        = 'potrait';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
    }
}