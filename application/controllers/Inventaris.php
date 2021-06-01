<?php

class Inventaris extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function vendor()
    {
        $data = [
            'judul'     => 'Vendor',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'vendor'    => $this->db->get('tb_vendor')->result()
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('inventaris/vendor');
        $this->load->view('template/_footer');
    }

    public function vendor_add()
    {
        $data = [
            'judul'     => 'Vendor',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row()
        ];
        $this->form_validation->set_rules('nama_vendor', 'nama_vendor', 'required|trim');
        $this->form_validation->set_rules('alamat_vendor', 'alamat_vendor', 'required|trim');
        $this->form_validation->set_rules('kontak_vendor', 'kontak_vendor', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/vendor_add');
            $this->load->view('template/_footer');
        } else {
            $nama_vendor        = $this->input->post('nama_vendor');
            $kontak_vendor      = $this->input->post('kontak_vendor');
            $alamat_vendor      = $this->input->post('alamat_vendor');

            $data = [
                'alamat_vendor'    => $alamat_vendor,
                'kontak_vendor'    => $kontak_vendor,
                'nama_vendor'      => $nama_vendor
            ];
            $this->db->insert('tb_vendor', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Vendor berhasil ditambah</div>');
            redirect('inventaris/vendor');
        }
    }

    public function vendor_edit($kode_vendor)
    {
        $data = [
            'judul'     => 'Vendor',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'vendor'    => $this->db->get_where('tb_vendor', ['kode_vendor' => $kode_vendor])->row()
        ];
        $this->form_validation->set_rules('nama_vendor', 'nama_vendor', 'required|trim');
        $this->form_validation->set_rules('alamat_vendor', 'alamat_vendor', 'required|trim');
        $this->form_validation->set_rules('kontak_vendor', 'kontak_vendor', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/vendor_edit');
            $this->load->view('template/_footer');
        } else {
            $kode_vendor   = $this->input->post('kode_vendor');
            $nama_vendor   = $this->input->post('nama_vendor');
            $kontak_vendor = $this->input->post('kontak_vendor');
            $alamat_vendor = $this->input->post('alamat_vendor');

            $this->db->set('nama_vendor', $nama_vendor);
            $this->db->set('kontak_vendor', $kontak_vendor);
            $this->db->set('alamat_vendor', $alamat_vendor);
            $this->db->where('kode_vendor', $kode_vendor);
            $this->db->update('tb_vendor');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Vendor berhasil diubah</div>');
            redirect('inventaris/vendor');
        }
    }

    public function vendor_delete($kode_vendor)
    {
        $this->db->where('kode_vendor', $kode_vendor);
        $this->db->delete('tb_vendor');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Vendor Berhasil Dihapus</div>');
        redirect('inventaris/vendor');
    }

    /* ==================== TRANSAKSI BERULANG =================================== */

    public function transaksi_berulang()
    {
        $data = [
            'judul'     => 'Transaksi Berulang',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'transaksi_berulang'    => $this->db->get('tb_transaksi_berulang')->result()
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('inventaris/transaksi_berulang');
        $this->load->view('template/_footer');
    }

    public function detail_transaksi_berulang($kode_transaksi)
    {
        $data = [
            'judul'     => 'Transaksi Berulang',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'transaksi_berulang'    => $this->db->get_where('tb_transaksi_berulang',['kode_transaksi' => $kode_transaksi])->row()
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('inventaris/transaksi_berulang_detail');
        $this->load->view('template/_footer');
    }

    public function transaksi_berulang_add()
    {
        $data = [
            'judul'     => 'Transaksi Berulang',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'transaksi_barang'  => $this->db->get('tb_transaksi')->result(),
            'vendor'    => $this->db->get('tb_vendor')->result(),
        ];
        $this->form_validation->set_rules('kode_transaksibarang', 'kode_transaksibarang', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
        $this->form_validation->set_rules('tgl_input', 'tgl_input', 'required|trim');
        $this->form_validation->set_rules('staff_onduty', 'staff_onduty', 'required|trim');
        $this->form_validation->set_rules('status_detail', 'status_detail', 'required|trim');
        $this->form_validation->set_rules('kode_vendor', 'kode_vendor', 'required|trim');
        $this->form_validation->set_rules('biaya_service', 'biaya_service', 'required|trim');
        if ($this->form_validation->run() == false) {

            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/transaksi_berulang_add');
            $this->load->view('template/_footer');
        } else {
            $kode_transaksibarang         = $this->input->post('kode_transaksibarang');
            $keterangan         = $this->input->post('keterangan');
            $tgl_input         = $this->input->post('tgl_input');
            $staff_onduty           = $this->input->post('staff_onduty');
            $status_detail   = $this->input->post('status_detail');
            $kode_vendor       = $this->input->post('kode_vendor');
            $biaya_service      = $this->input->post('biaya_service');

            $data = [
                'kode_transaksibarang'        => $kode_transaksibarang,
                'keterangan'        => $keterangan,
                'tanggal_input'     => $tgl_input,
                'staff_onduty'      => $staff_onduty,
                'status_detail'     => $status_detail,
                'kode_vendor'       => $kode_vendor,
                'biaya_service'     => $biaya_service
            ];
            $this->db->insert('tb_transaksi_berulang', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Transaksi berulang berhasil ditambah</div>');
            redirect('inventaris/transaksi_berulang');
        }
    }

    public function transaksi_berulang_edit($kode_transaksi)
    {
        $data = [
            'judul'     => 'Transaksi Berulang',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'transaksi_barang'  => $this->db->get('tb_transaksi')->result(),
            'vendor'    => $this->db->get('tb_vendor')->result(),
            'transaksi_berulang'    => $this->db->get_where('tb_transaksi_berulang', ['kode_transaksi' => $kode_transaksi])->row()
        ];

        $this->form_validation->set_rules('kode_transaksibarang', 'kode_transaksibarang', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
        $this->form_validation->set_rules('tgl_input', 'tgl_input', 'required|trim');
        $this->form_validation->set_rules('staff_onduty', 'staff_onduty', 'required|trim');
        $this->form_validation->set_rules('status_detail', 'status_detail', 'required|trim');
        $this->form_validation->set_rules('kode_vendor', 'kode_vendor', 'required|trim');
        $this->form_validation->set_rules('biaya_service', 'biaya_service', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/transaksi_berulang_edit');
            $this->load->view('template/_footer');
        } else {
            $kode_transaksibarang         = $this->input->post('kode_transaksibarang');
            $keterangan         = $this->input->post('keterangan');
            $tgl_input      = $this->input->post('tgl_input');
            $staff_onduty       = $this->input->post('staff_onduty');
            $status_detail      = $this->input->post('status_detail');
            $kode_vendor        = $this->input->post('kode_vendor');
            $biaya_service      = $this->input->post('biaya_service');

            $this->db->set('kode_transaksibarang', $kode_transaksibarang);
            $this->db->set('keterangan', $keterangan);
            $this->db->set('tanggal_input', $tgl_input);
            $this->db->set('staff_onduty', $staff_onduty);
            $this->db->set('status_detail', $status_detail);
            $this->db->set('kode_vendor', $kode_vendor);
            $this->db->where('kode_transaksi', $kode_transaksi);
            $this->db->update('tb_transaksi_berulang');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Transaksi berulang berhasil ditambah</div>');
            redirect('inventaris/transaksi_berulang');
        }
    }

    public function transaksi_berulang_delete($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->delete('tb_transaksi_berulang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Transaksi Berulang Dihapus</div>');
        redirect('inventaris/transaksi_berulang');
    }

    /* ================================= TRANSAKSI BARANG =================================== */

    public function transaksi_barang()
    {
        $data = [
            'judul'             => 'Transaksi Barang',
            'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'transaksi_barang'  => $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_vendor ON tb_transaksi.kode_vendor = tb_vendor.kode_vendor JOIN tb_statusbarang ON tb_transaksi.kode_statusbarang = tb_statusbarang.kode_statusbarang JOIN tb_deptownerid ON tb_transaksi.kode_deptowner = tb_deptownerid.kode_deptOwner")->result(),
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('inventaris/transaksi_barang');
        $this->load->view('template/_footer');
    }

    public function detail_transaksi_barang($kode_transaksibarang)
    {
        $data = [
            'judul'             => 'Transaksi Barang',
            'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'transaksi_barang'  => $this->db->query("SELECT * FROM tb_transaksi JOIN tb_koderadio ON tb_transaksi.kode_radio = tb_koderadio.kode_radio JOIN tb_jenisbarang ON tb_transaksi.kode_jenisbarang = tb_jenisbarang.kode_jenisbarang JOIN tb_vendor ON tb_transaksi.kode_vendor = tb_vendor.kode_vendor JOIN tb_statusbarang ON tb_transaksi.kode_statusbarang = tb_statusbarang.kode_statusbarang JOIN tb_deptownerid ON tb_transaksi.kode_deptowner = tb_deptownerid.kode_deptOwner WHERE kode_transaksibarang = $kode_transaksibarang")->row(),
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('inventaris/transaksi_barang');
        $this->load->view('template/_footer');
    }

    public function transaksi_barang_add()
    {
        $data = [
            'judul'             => 'Transaksi Barang',
            'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'kode_radio'        => $this->db->get('tb_koderadio')->result(),
            'jenis_barang'      => $this->db->get('tb_jenisbarang')->result(),
            'vendor'            => $this->db->get('tb_vendor')->result(),
            'status'            => $this->db->get('tb_statusbarang')->result(),
            'deptowner'         => $this->db->get('tb_deptownerid')->result()
        ];

        $this->form_validation->set_rules('kode_radio', 'kode_radio', 'required|trim');
        $this->form_validation->set_rules('harga_beli', 'harga_beli', 'required|trim');
        $this->form_validation->set_rules('tgl_beli', 'tgl_beli', 'required|trim');
        $this->form_validation->set_rules('kode_jenisbarang', 'kode_jenisbarang', 'required|trim');
        $this->form_validation->set_rules('versi_barang', 'versi_barang', 'required|trim');
        $this->form_validation->set_rules('serial_number', 'serial_number', 'required|trim');
        $this->form_validation->set_rules('kode_vendor', 'kode_vendor', 'required|trim');
        $this->form_validation->set_rules('masa_garansi', 'masa_garansi', 'required|trim');
        $this->form_validation->set_rules('path_foto', 'path_foto', 'required|trim');
        $this->form_validation->set_rules('kode_statusbarang', 'kode_statusbarang', 'required|trim');
        $this->form_validation->set_rules('user_ga', 'user_ga', 'required|trim');
        $this->form_validation->set_rules('tgl_input', 'tgl_input', 'required|trim');
        $this->form_validation->set_rules('kode_deptowner', 'kode_deptowner', 'required|trim');
        $this->form_validation->set_rules('user_owner', 'user_owner', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/transaksi_barang_add');
            $this->load->view('template/_footer');
        } else {
            $kode_transaksibarang         = $this->input->post('kode_transaksibarang');
            $kode_radio         = $this->input->post('kode_radio');
            $harga_beli         = $this->input->post('harga_beli');
            $tgl_beli           = $this->input->post('tgl_beli');
            $kode_jenisbarang   = $this->input->post('kode_jenisbarang');
            $versi_barang       = $this->input->post('versi_barang');
            $serial_number      = $this->input->post('serial_number');
            $kode_vendor        = $this->input->post('kode_vendor');
            $masa_garansi       = $this->input->post('masa_garansi');
            $path_foto          = $this->input->post('path_foto');
            $kode_statusbarang  = $this->input->post('kode_statusbarang');
            $user_ga            = $this->input->post('user_ga');
            $tgl_input          = $this->input->post('tgl_input');
            $kode_deptowner     = $this->input->post('kode_deptowner');
            $user_owner         = $this->input->post('user_owner');

            $data = [
                'kode_transaksibarang'        => $kode_transaksibarang,
                'kode_radio'        => $kode_radio,
                'harga_beli'        => $harga_beli,
                'tgl_beli'          => $tgl_beli,
                'kode_jenisbarang'  => $kode_jenisbarang,
                'versi_barang'      => $versi_barang,
                'serial_number'     => $serial_number,
                'kode_vendor'       => $kode_vendor,
                'masa_garansi'      => $masa_garansi,
                'path_foto'         => $path_foto,
                'kode_statusbarang' => $kode_statusbarang,
                'user_ga'           => $user_ga,
                'tgl_input'         => $tgl_input,
                'kode_deptowner'    => $kode_deptowner,
                'user_owner'        => $user_owner,
            ];
            $this->db->insert('tb_transaksi', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Transaksi berhasil ditambah</div>');
            redirect('inventaris/transaksi_barang');
        }
    }

    public function transaksi_barang_edit($kode_transaksibarang)
    {
        $data = [
            'judul'             => 'Transaksi Barang',
            'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'transaksi_barang'  => $this->db->get_where('tb_transaksi', ['kode_transaksibarang' => $kode_transaksibarang])->row(),
            'kode_radio'        => $this->db->get('tb_koderadio')->result(),
            'jenis_barang'      => $this->db->get('tb_jenisbarang')->result(),
            'vendor'            => $this->db->get('tb_vendor')->result(),
            'status'            => $this->db->get('tb_statusbarang')->result(),
            'deptowner'         => $this->db->get('tb_deptownerid')->result()
        ];
        $this->form_validation->set_rules('kode_radio', 'kode_radio', 'required|trim');
        $this->form_validation->set_rules('harga_beli', 'harga_beli', 'required|trim');
        $this->form_validation->set_rules('tgl_beli', 'tgl_beli', 'required|trim');
        $this->form_validation->set_rules('kode_jenisbarang', 'kode_jenisbarang', 'required|trim');
        $this->form_validation->set_rules('versi_barang', 'versi_barang', 'required|trim');
        $this->form_validation->set_rules('serial_number', 'serial_number', 'required|trim');
        $this->form_validation->set_rules('kode_vendor', 'kode_vendor', 'required|trim');
        $this->form_validation->set_rules('masa_garansi', 'masa_garansi', 'required|trim');
        $this->form_validation->set_rules('path_foto', 'path_foto', 'required|trim');
        $this->form_validation->set_rules('kode_statusbarang', 'kode_statusbarang', 'required|trim');
        $this->form_validation->set_rules('user_ga', 'user_ga', 'required|trim');
        $this->form_validation->set_rules('tgl_input', 'tgl_input', 'required|trim');
        $this->form_validation->set_rules('kode_deptowner', 'kode_deptowner', 'required|trim');
        $this->form_validation->set_rules('user_owner', 'user_owner', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/transaksi_barang_edit');
            $this->load->view('template/_footer');
        } else {
            $kode_transaksibarang         = $this->input->post('kode_transaksibarang');
            $kode_radio         = $this->input->post('kode_radio');
            $harga_beli         = $this->input->post('harga_beli');
            $tgl_beli           = $this->input->post('tgl_beli');
            $kode_jenisbarang   = $this->input->post('kode_jenisbarang');
            $versi_barang       = $this->input->post('versi_barang');
            $serial_number      = $this->input->post('serial_number');
            $kode_vendor        = $this->input->post('kode_vendor');
            $masa_garansi       = $this->input->post('masa_garansi');
            $path_foto          = $this->input->post('path_foto');
            $kode_statusbarang  = $this->input->post('kode_statusbarang');
            $user_ga            = $this->input->post('user_ga');
            $tgl_input          = $this->input->post('tgl_input');
            $kode_deptowner     = $this->input->post('kode_deptowner');
            $user_owner         = $this->input->post('user_owner');

            $this->db->set('kode_radio', $kode_radio);
            $this->db->set('harga_beli', $harga_beli);
            $this->db->set('tgl_beli', $tgl_beli);
            $this->db->set('kode_jenisbarang', $kode_jenisbarang);
            $this->db->set('versi_barang', $versi_barang);
            $this->db->set('serial_number', $serial_number);
            $this->db->set('kode_vendor', $kode_vendor);
            $this->db->set('masa_garansi', $masa_garansi);
            $this->db->set('path_foto', $path_foto);
            $this->db->set('kode_statusbarang', $kode_statusbarang);
            $this->db->set('user_ga', $user_ga);
            $this->db->set('tgl_input', $tgl_input);
            $this->db->set('kode_deptowner', $kode_deptowner);
            $this->db->set('user_owner', $user_owner);
            $this->db->where('kode_statusbarang', $kode_statusbarang);
            $this->db->update('tb_transaksi');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Transaksi berhasil diubah</div>');
            redirect('inventaris/transaksi_barang');
        }
    }

    public function transaksi_barang_delete($kode_transaksibarang)
    {
        $this->db->where('kode_transaksibarang', $kode_transaksibarang);
        $this->db->delete('tb_transaksi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Transaksi Barang Dihapus</div>');
        redirect('inventaris/transaksi_barang');
    }

    /* ================================ STATUS ===================================*/

    public function status()
    {
        $data = [
            'judul'     => 'Status',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'status'    => $this->db->get('tb_statusbarang')->result()
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('inventaris/status');
        $this->load->view('template/_footer');
    }

    public function status_add()
    {
        $query  = $this->db->query("SELECT MAX(kode_statusbarang) as kode FROM tb_statusbarang")->row();
        $urutan = $query->kode;    
        $kode_sekarang = $urutan + 1;
        $data = [
            'judul'     => 'Status',
            'kode'      => $kode_sekarang,
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'status'    => $this->db->get('tb_statusbarang')->result()
        ];
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/status_add');
            $this->load->view('template/_footer');
        } else {
            $kode_statusbarang        = $this->input->post('kode_statusbarang');
            $status        = $this->input->post('status');

            $data = [
                'kode_statusbarang'    => $kode_statusbarang,
                'status'    => $status,
            ];
            $this->db->insert('tb_statusbarang', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Status berhasil ditambah</div>');
            redirect('inventaris/status');
        }
    }

    public function status_edit($id_status)
    {
        $data = [
            'judul'     => 'Status',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'status'    => $this->db->get_where('tb_statusbarang', ['id_status' => $id_status])->row()
        ];
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/status_edit');
            $this->load->view('template/_footer');
        } else {
            $id_status   = $this->input->post('id_status');
            $kode_statusbarang   = $this->input->post('kode_statusbarang');
            $status              = $this->input->post('status');

            $this->db->set('status', $status);
            $this->db->set('kode_statusbarang', $kode_statusbarang);
            $this->db->where('id_status', $id_status);
            $this->db->update('tb_statusbarang');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Status berhasil diubah</div>');
            redirect('inventaris/status');
        }
    }

    public function status_delete($id_status)
    {
        $this->db->where('id_status', $id_status);
        $this->db->delete('tb_statusbarang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Status Berhasil Dihapus</div>');
        redirect('inventaris/status');
    }



    /* ================================ KODE RADIO ======================================= */

    public function kode_radio()
    {
        $data = [
            'judul'     => 'Kode Radio',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'kode_radio'    => $this->db->get('tb_koderadio')->result()
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('inventaris/kode_radio');
        $this->load->view('template/_footer');
    }

    public function kode_radio_add()
    {
        $query  = $this->db->query("SELECT MAX(kode_radio) as kode FROM tb_koderadio")->row();
        $urutan = $query->kode;    
        $kode_sekarang = $urutan + 1;
        $data = [
            'judul'         => 'Kode Radio',
            'kode'          => $kode_sekarang,
            'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'kode_radio'    => $this->db->get('tb_koderadio')->result()
        ];
        $this->form_validation->set_rules('nama_radio', 'nama_radio', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/kode_radio_add');
            $this->load->view('template/_footer');
        } else {
            $kode_radio        = $this->input->post('kode_radio');
            $nama_radio        = $this->input->post('nama_radio');

            $data = [
                'kode_radio'    => $kode_radio,
                'nama_radio'    => $nama_radio,
            ];
            $this->db->insert('tb_koderadio', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kode Radio berhasil ditambah</div>');
            redirect('inventaris/kode_radio');
        }
    }

    public function kode_radio_edit($id)
    {
        $data = [
            'judul'         => 'Kode Radio',
            'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'kode_radio'    => $this->db->get_where('tb_koderadio', ['id' => $id])->row()
        ];

        $this->form_validation->set_rules('kode_radio', 'kode_radio', 'required|trim');
        $this->form_validation->set_rules('nama_radio', 'nama_radio', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/kode_radio_edit');
            $this->load->view('template/_footer');
        } else {
            $id                = $this->input->post('id');
            $kode_radio        = $this->input->post('kode_radio');
            $nama_radio        = $this->input->post('nama_radio');

            $this->db->set('kode_radio', $kode_radio);
            $this->db->set('nama_radio', $nama_radio);
            $this->db->where('id', $id);
            $this->db->update('tb_koderadio');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kode Radio berhasil diubah</div>');
            redirect('inventaris/kode_radio');
        }
    }

    public function kode_radio_delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_koderadio');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kode Radio Berhasil Dihapus</div>');
        redirect('inventaris/kode_radio');
    }

    /* ============================ JENIS BARANG ========================================================== */

    public function jenis_barang()
    {
        $data = [
            'judul'         => 'Jenis Barang',
            'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'jenis_barang'  => $this->db->get('tb_jenisbarang')->result()
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('inventaris/jenis_barang');
        $this->load->view('template/_footer');
    }

    public function jenis_barang_add()
    {
        $data = [
            'judul'            => 'Jenis Barang',
            'user'             => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'jenis_barang'     => $this->db->get('tb_jenisbarang')->result()
        ];

        $this->form_validation->set_rules('nama_jenisbarang', 'nama_jenisbarang', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/jenis_barang_add');
            $this->load->view('template/_footer');
        } else {
            $nama_jenisbarang        = $this->input->post('nama_jenisbarang');

            $data = [
                'nama_jenisbarang'    => $nama_jenisbarang,
            ];
            $this->db->insert('tb_jenisbarang', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Jenis Barang berhasil ditambah</div>');
            redirect('inventaris/jenis_barang');
        }
    }

    public function jenis_barang_edit($kode_jenisbarang)
    {
        $data = [
            'judul'         => 'Jenis Barang',
            'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'jenis_barang'  => $this->db->get_where('tb_jenisbarang', ['kode_jenisbarang' => $kode_jenisbarang])->row()
        ];

        $this->form_validation->set_rules('nama_jenisbarang', 'nama_jenisbarang', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/jenis_barang_edit');
            $this->load->view('template/_footer');
        } else {
            $kode_jenisbarang        = $this->input->post('kode_jenisbarang');
            $nama_jenisbarang        = $this->input->post('nama_jenisbarang');

            $this->db->set('nama_jenisbarang', $nama_jenisbarang);
            $this->db->where('kode_jenisbarang', $kode_jenisbarang);
            $this->db->update('tb_jenisbarang');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Jenis Barang berhasil diubah</div>');
            redirect('inventaris/jenis_barang');
        }
    }

    public function jenis_barang_delete($kode_jenisbarang)
    {
        $this->db->where('kode_jenisbarang', $kode_jenisbarang);
        $this->db->delete('tb_jenisbarang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Jenis Barang Berhasil Dihapus</div>');
        redirect('inventaris/jenis_barang');
    }

    /* ===================================== DEPT OWNER ID ============================================ */

    public function deptOwner()
    {
        $data = [
            'judul'     => 'DeptOwner',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'deptOwner' => $this->db->get('tb_deptownerid')->result()
        ];
        $this->load->view('template/_header', $data);
        $this->load->view('inventaris/deptOwner');
        $this->load->view('template/_footer');
    }

    public function deptOwner_add()
    {
        $query  = $this->db->query("SELECT MAX(kode_deptOwner) as kode FROM tb_deptownerid")->row();
        $urutan = $query->kode;    
        $kode_sekarang = $urutan + 1;
        $data = [
            'judul'     => 'DeptOwner',
            'kode'      => $kode_sekarang,
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'deptOwner' => $this->db->get('tb_deptownerid')->result()
        ];
        $this->form_validation->set_rules('nama_deptOwner', 'nama_deptOwner', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/deptOwner_add');
            $this->load->view('template/_footer');
        } else {
            $kode_deptOwner        = $this->input->post('kode_deptOwner');
            $nama_deptOwner        = $this->input->post('nama_deptOwner');

            $data = [
                'kode_deptOwner'    => $kode_deptOwner,
                'nama_deptOwner'    => $nama_deptOwner,
            ];
            $this->db->insert('tb_deptownerid', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat DeptOwner berhasil ditambah</div>');
            redirect('inventaris/deptOwner');
        }
    }

    public function deptOwner_edit($id_dept)
    {
        $data = [
            'judul'     => 'DeptOwner',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
            'deptOwner' => $this->db->get_where('tb_deptownerid', ['id_dept' => $id_dept])->row()
        ];
        $this->form_validation->set_rules('nama_deptOwner', 'nama_deptOwner', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('inventaris/deptOwner_edit');
            $this->load->view('template/_footer');
        } else {
            $id_dept        = $this->input->post('id_dept');
            $kode_deptOwner        = $this->input->post('kode_deptOwner');
            $nama_deptOwner        = $this->input->post('nama_deptOwner');

            $this->db->set('kode_deptOwner', $kode_deptOwner);
            $this->db->set('nama_deptOwner', $nama_deptOwner);
            $this->db->where('id_dept', $id_dept);
            $this->db->update('tb_deptownerid');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat DeptOwner berhasil diubah</div>');
            redirect('inventaris/deptOwner');
        }
    }

    public function deptOwner_delete($id_dept)
    {
        $this->db->where('id_dept', $id_dept);
        $this->db->delete('tb_deptownerid');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">deptOwner Berhasil Dihapus</div>');
        redirect('inventaris/deptOwner');
    }
}
