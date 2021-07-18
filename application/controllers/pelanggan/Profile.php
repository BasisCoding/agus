<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profile extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('KurirModel');
		}
	
		public function index()
		{
			$def['title'] = SHORT_SITE_URL.' | Profil Anda';
			$def['breadcrumb'] = $this->session->userdata('nama_lengkap');

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('kurir/profile');
			$this->load->view('partials/footer');
			$this->load->view('kurir/plugins/profile');
		}

		public function getProfile()
		{
			$id = $this->session->userdata('id');
			$get = $this->KurirModel->getProfile($id);
			echo json_encode($get);
		}

		public function updateProfile()
		{
			$id = $this->session->userdata('id');
			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['hp'] = $this->input->post('hp');
			$data['alamat'] = $this->input->post('alamat');
			$data['username'] = $this->input->post('username');

			if (!empty($this->input->post('password'))) {
				$data['password'] =hash('sha512', $this->input->post('password').config_item('encryption_key'));
			}

			$config['upload_path'] = './assets/assets/img/users/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['overwrite'] = true;
	        $config['file_name'] = $data['username'];
	        $this->load->library('upload', $config);

	        if($this->upload->do_upload("foto")){
	        	if ($this->input->post('foto_lama') != '') {
					@unlink("./assets/assets/img/users/".$this->input->post('foto_lama'));
	        	}
	        	
				$data['foto'] = $this->upload->file_name;
				$this->session->set_userdata('foto', $data['foto']);
			} else {
				$data['foto'] = $this->input->post('foto_lama');
			}

			$act = $this->KurirModel->updateKurir($id, $data);
			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Anda berhasil diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Anda gagal diubah'
				);
			}

			echo json_encode($response);
		}
	
	}
	
	/* End of file Profile.php */
	/* Location: ./application/controllers/admin/Profile.php */
?>