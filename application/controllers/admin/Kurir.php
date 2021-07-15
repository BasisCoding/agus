<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Kurir extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('KurirModel');
		}
	
		public function index()
		{
			$def['title'] = SHORT_SITE_URL.' | Kurir';
			$def['breadcrumb'] = 'Kurir';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/kurir');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/kurir');
		}

		public function get_kurir()
		{
			$list = $this->KurirModel->get_kurir();

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
	            "recordsTotal" => $this->KurirModel->count_all_kurir(),
	            "recordsFiltered" => $this->KurirModel->count_filtered_kurir(),
	            "data" => $data
			);

			echo json_encode($output);
		}
		
		public function addKurir()
		{
			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['hp'] = $this->input->post('hp');
			$data['alamat'] = $this->input->post('alamat');
			$data['username'] = $this->input->post('username');
			$data['password'] =hash('sha512', $this->input->post('password').config_item('encryption_key'));
			$data['level'] = 2;
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

				$act = $this->KurirModel->addKurir($data);
				
				if ($act) {
					$response = array(
						'type' => 'success',
						'message' => 'Data Kurir berhasil dikirim'
					);
				}else{
					$response = array(
						'type' => 'danger',
						'message' => 'Data Kurir gagal dikirim'
					);
				}
			}

			echo json_encode($response);
		}

		public function updateKurir()
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

			$act = $this->KurirModel->updateKurir($id, $data);
			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Kurir berhasil diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Kurir gagal diubah'
				);
			}

			echo json_encode($response);
		}

		public function deleteKurir()
		{
			$id = $this->input->post('id');
			$foto = $this->input->post('foto');
			$act = $this->KurirModel->deleteKurir($id);
			if ($act) {
				@unlink("./assets/assets/img/users/".$this->input->post('foto'));
				$response = array(
					'type' => 'success',
					'message' => 'Data Kurir berhasil dihapus'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Kurir gagal dihapus'
				);
			}

			echo json_encode($response);
		}

	}
	
	/* End of file Kurir.php */
	/* Location: ./application/controllers/admin/Kurir.php */
?>