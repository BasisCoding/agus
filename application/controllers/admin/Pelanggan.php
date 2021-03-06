<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pelanggan extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('PelangganModel');
		}
	
		public function index()
		{
			$def['title'] = SHORT_SITE_URL.' | Pelanggan';
			$def['breadcrumb'] = 'Pelanggan';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/pelanggan');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/pelanggan');
		}

		public function get_pelanggan()
		{
			$list = $this->PelangganModel->get_pelanggan();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $ls->username;
				$row[] = $ls->nama_lengkap;
				$row[] = $ls->hp;
				$row[] = $ls->alamat;
				$row[] = $ls->created_at;

				$row[] = '
					<div class="btn-group">
						<button class="btn btn-default btn-sm update-data" data-nama="'.$ls->nama_lengkap.'" data-username="'.$ls->username.'" data-foto="'.$ls->foto.'"  data-id="'.$ls->id.'" data-hp="'.$ls->hp.'" data-alamat="'.$ls->alamat.'"><span class="fas fa-users-cog"></span></button>
						<button data-id="'.$ls->id.'" data-foto="'.$ls->foto.'" data-nama="'.$ls->nama_lengkap.'" class="btn btn-danger delete-data btn-sm"><span class="fas fa-times"></span></button>
					</div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->PelangganModel->count_all_pelanggan(),
	            "recordsFiltered" => $this->PelangganModel->count_filtered_pelanggan(),
	            "data" => $data
			);

			echo json_encode($output);
		}
		
		public function addPelanggan()
		{
			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['hp'] = $this->input->post('hp');
			$data['alamat'] = $this->input->post('alamat');
			$data['username'] = $this->input->post('username');
			$data['password'] =hash('sha512', $this->input->post('password').config_item('encryption_key'));
			$data['level'] = 4;
			$data['status'] = 1;

			$validasi = $this->db->get_where('users', array('username' => $data['username']));
			if ($validasi->num_rows() > 0) {
				$response = array(
					'type' => 'danger',
					'message' => 'Data Gagal Dikirim karena username sudah tersedia'
				);
			}else{
				$config['upload_path'] = './assets/assets/img/users/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg';
		        $config['max_size'] = '1024';
		        $config['overwrite'] = true;
		        $config['file_name'] = $data['username'];
		        $this->load->library('upload', $config);

		        if($this->upload->do_upload("foto")){
					$data['foto'] = $this->upload->file_name;
				} else {
					$data['foto'] = NULL;
				}

				$act = $this->PelangganModel->addPelanggan($data);
				if ($act) {
					$response = array(
						'type' => 'success',
						'message' => 'Data Pelanggan berhasil dikirim'
					);
				}else{
					$response = array(
						'type' => 'danger',
						'message' => 'Data Pelanggan gagal dikirim'
					);
				}
			}

			echo json_encode($response);
		}

		public function updatePelanggan()
		{
			$id = $this->input->post('id');
			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['hp'] = $this->input->post('hp');
			$data['alamat'] = $this->input->post('alamat');
			$data['username'] = $this->input->post('username');

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
			} else {
				$data['foto'] = $this->input->post('foto_lama');
			}

			$act = $this->PelangganModel->updatePelanggan($id, $data);
			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Pelanggan berhasil diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Pelanggan gagal diubah'
				);
			}

			echo json_encode($response);
		}

		public function deletePelanggan()
		{
			$id = $this->input->post('id');
			$foto = $this->input->post('foto');
			$act = $this->PelangganModel->deletePelanggan($id);
			if ($act) {
				@unlink("./assets/assets/img/users/".$this->input->post('foto'));
				$response = array(
					'type' => 'success',
					'message' => 'Data Pelanggan berhasil dihapus'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Pelanggan gagal dihapus'
				);
			}

			echo json_encode($response);
		}

		public function selectPelanggan()
		{
			$get = $this->PelangganModel->selectPelanggan();
			echo json_encode($get);
		}
	}
	
	/* End of file Pelanggan.php */
	/* Location: ./application/controllers/admin/Pelanggan.php */
?>