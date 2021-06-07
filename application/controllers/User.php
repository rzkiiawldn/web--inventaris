<?php

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		belum_login();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()

	{
		$username  = $this->session->userdata('username');
		$id_user   = $this->session->userdata('id_user');
		$data = [
			'judul'     					=> 'Dashboard',
			'user'      					=> $this->db->query("SELECT * FROM user JOIN user_level ON user.id_level = user_level.id_level WHERE username = '$username' ")->row(),
			'deptowner' 					=> $this->db->get('tb_deptownerid')->num_rows(),
			'jenis_barang' 				=> $this->db->get('tb_jenisbarang')->num_rows(),
			'kode_radio' 					=> $this->db->get('tb_koderadio')->num_rows(),
			'status' 							=> $this->db->get('tb_statusbarang')->num_rows(),
			'vendor' 							=> $this->db->get('tb_vendor')->num_rows(),
			'transaksi_barang' 			=> $this->db->get('tb_transaksi')->num_rows(),
			'transaksi_berulang' 		=> $this->db->get('tb_transaksi_berulang')->num_rows(),
			'transaksi_barang_id' 	=> $this->db->get_where('tb_transaksi', ['user_owner' => $id_user])->num_rows(),
			'transaksi_berulang_id' => $this->db->get_where('tb_transaksi_berulang', ['staff_onduty' => $id_user])->num_rows(),
		];
		$this->load->view('template/_header', $data);
		$this->load->view('index');
		$this->load->view('template/_footer');
	}

	/* ======================================= KELOLA USER ======================================= */

	public function data_user()
	{
		$data = [
			'judul'		=> 'Data User',
			'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
			'data_user'	=> $this->user_model->get()
		];
		$this->load->view('template/_header', $data);
		$this->load->view('user/index');
		$this->load->view('template/_footer');
	}

	public function tambah_user()
	{
		$this->form_validation->set_rules('username', 'username', 'required|trim');
		$this->form_validation->set_rules('id_level', 'Level', 'required');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
			'min_length' => 'password terlalu lemah',
			'matches'    => 'password tidak sama'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == false) {
			$data = [
				'judul'		=> 'Data User',
				'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
				'data_user'	=> $this->user_model->get(),
				'level'		=> $this->user_model->get_level(),
			];

			$this->load->view('template/_header', $data);
			$this->load->view('user/tambah_user');
			$this->load->view('template/_footer');
		} else {
			$data = [
				'nama'      	=> htmlspecialchars($this->input->post('nama', TRUE)),
				'username'      => htmlspecialchars($this->input->post('username', TRUE)),
				'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'id_level'      => $this->input->post('id_level')
			];
			$this->db->insert("user", $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Ditambah</div>');
			redirect('user/data_user');
		}
	}

	public function edit_user($id_user)
	{
		$this->form_validation->set_rules('username', 'username', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'trim|min_length[4]', [
			'min_length' => 'password terlalu lemah',
		]);
		if ($this->form_validation->run() == false) {
			$data = [
				'judul'			=> 'Data User',
				'data_user'	=> $this->db->query("SELECT * FROM user WHERE id_user = $id_user")->row_array(),
				'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
				'level'			=> $this->user_model->get_level(),
			];
			$this->load->view('template/_header', $data);
			$this->load->view('user/edit_user');
			$this->load->view('template/_footer');
		} else {
			$id_user 		= $this->input->post('id_user', TRUE);
			$password 	= $this->input->post('password1');
			$id_level 	= $this->input->post('id_level', TRUE);
			$username 	= $this->input->post('username', TRUE);
			$nama 	= $this->input->post('nama', TRUE);

			$this->db->set('nama', $nama);
			$this->db->set('username', $username);
			$this->db->set('id_level', $id_level);
			if (!empty($password)) {
				$this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
			}
			$this->db->where('id_user', $id_user);
			$this->db->update('user');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat data user berhasil diubah</div>');
			redirect('user/data_user');
		}
	}

	public function hapus_user($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
		redirect('user/data_user');
	}
	/* ======================================= AKHIR KELOLA USER ======================================= */

	/* ======================================= KELOLA LEVEL ======================================= */

	public function level()
	{
		$data = [
			'judul'		=> 'Level',
			'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row(),
			'level'		=> $this->user_model->get_level()
		];
		$this->load->view('template/_header', $data);
		$this->load->view('user/level');
		$this->load->view('template/_footer');
	}

	public function tambah_level()
	{
		$data = [
			'level'			=> $this->input->post('level')
		];
		$this->db->insert('user_level', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Level Berhasil ditambah</div>');
		redirect('user/level');
	}

	public function edit_level($id_level)
	{
		$id_level		= $this->input->post('id_level');
		$level			= $this->input->post('level');

		$this->db->set('level', $level);
		$this->db->where('id_level', $id_level);
		$this->db->update('user_level');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Level Berhasil diubah</div>');
		redirect('user/level');
	}

	public function hapus_level($id_level)
	{
		$this->db->where('id_level', $id_level);
		$this->db->delete('user_level');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Level Berhasil Dihapus</div>');
		redirect('user/level');
	}

	/* ======================================= AKHIR KELOLA LEVEL ======================================= */
}
