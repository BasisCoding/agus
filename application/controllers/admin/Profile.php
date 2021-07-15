<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profile extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('ProfileModel');
		}
	
		public function index()
		{
			$def['title'] = SHORT_SITE_URL.' | Profil';
			$def['breadcrumb'] = 'Profil';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/profile');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/profile');
		}

		public function getProfile()
		{
			$get = $this->ProfileModel->getProfile();
			echo json_encode($get);
		}

		public function updateProfile()
		{
			$config['upload_path'] = './assets/assets/img/brand/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['overwrite'] = true;
	        $config['file_name'] = 'logo-depot.png';
	        $this->load->library('upload', $config);

	        if($this->upload->do_upload("logo")){
				$logo = $this->upload->file_name;
			} else {
				$logo = 'logo-depot.png';
			}

			$data = array(
	 			'nama_depot' 				=> $this->input->post('nama_depot'),
	 			'nama_pimpinan' 			=> $this->input->post('nama_pimpinan'),
	 			'email' 					=> $this->input->post('email'),
	 			'telepon' 					=> $this->input->post('telepon'),
	 			'alamat' 					=> $this->input->post('alamat'),
	 			
	 			'update_at' 				=> date('Y-m-d H:i:s'),
	 			'update_by' 				=> $this->session->userdata('id'),
	 			'logo' 						=> $logo
			);

			$act = $this->ProfileModel->updateProfile($data);
			
			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Profil Berhasil Diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Profil Gagal Diubah'
				);
			}

			echo json_encode($response);
		}
	
	}
	
	/* End of file Profile.php */
	/* Location: ./application/controllers/admin/Profile.php */
?>