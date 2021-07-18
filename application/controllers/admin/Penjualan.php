<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Penjualan extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('PenjualanModel');
		}
	
		public function index()
		{
			$def['title'] = SHORT_SITE_URL.' | Penjualan';
			$def['breadcrumb'] = 'Penjualan';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/penjualan');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/penjualan');
		}

		public function get_Penjualan()
		{
			$list = $this->PenjualanModel->getPenjualan();
			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $ls->nama_pelanggan;
				$row[] = $ls->nama_kurir;
				$row[] = $ls->jumlah;
				$row[] = number_format($ls->jumlah*HARGA_SATUAN);
				$row[] = $ls->tanggal_dibuat;
				$row[] = $ls->tanggal_dikirim;
				$row[] = $ls->tanggal_diterima;

				$row[] = '
					<div class="btn-group">
						<button data-id="'.$ls->id.'" data-nama="'.$ls->nama_pelanggan.'" class="btn btn-danger delete-data btn-sm"><span class="fas fa-times"></span></button>
					</div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->PenjualanModel->count_all_penjualan(),
	            "recordsFiltered" => $this->PenjualanModel->count_filtered_penjualan(),
	            "data" => $data
			);

			echo json_encode($output);
		}
		
		public function addPenjualan()
		{
			if ($this->input->post('id_pelanggan') == "") {
				$data['id_pelanggan'] = NULL;
			}else{
				$data['id_pelanggan'] = $this->input->post('id_pelanggan');
			}
			
			$data['jumlah'] = $this->input->post('jumlah');

			$act = $this->PenjualanModel->addPenjualan($data);
			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Penjualan berhasil dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Penjualan gagal dikirim'
				);
			}

			echo json_encode($response);
		}

		public function updatePenjualan()
		{
			$id = $this->input->post('id');
			if ($this->input->post('id_pelanggan') == "") {
				$data['id_pelanggan'] = NULL;
			}else{
				$data['id_pelanggan'] = $this->input->post('id_pelanggan');
			}
			
			$data['jumlah'] = $this->input->post('jumlah');

			$act = $this->PenjualanModel->updatePenjualan($id, $data);
			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Penjualan berhasil diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Penjualan gagal diubah'
				);
			}

			echo json_encode($response);
		}

		public function deletePenjualan()
		{
			$id = $this->input->post('id');
			$act = $this->PenjualanModel->deletePenjualan($id);
			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Penjualan berhasil dihapus'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Penjualan gagal dihapus'
				);
			}

			echo json_encode($response);
		}
	}
	
	/* End of file Penjualan.php */
	/* Location: ./application/controllers/admin/Penjualan.php */
?>