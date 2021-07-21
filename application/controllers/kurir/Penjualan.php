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
			$this->load->view('kurir/penjualan');
			$this->load->view('partials/footer');
			$this->load->view('kurir/plugins/penjualan');
		}

		public function get_Penjualan()
		{
			$list = $this->PenjualanModel->getPenjualanKurir();
			$data = array();
			$no = $_POST['start'];
			$button = '';
			foreach ($list as $ls) {
				if ($ls->tanggal_dibuat != null) {
					$button = '<button data-id="'.$ls->id.'" data-nama="'.$ls->nama_pelanggan.'" class="btn btn-success btn-kirim btn-sm"><span class="ni ni-delivery-fast"></span> Kirim
							</button>';
					if ($ls->tanggal_dikirim != null) {
						$button = '<span class="btn btn-primary btn-sm"><span class="ni ni-delivery-fast"></span> Tunggu Konfirmasi</span>';
						if ($ls->tanggal_diterima != null) {
							$button = '<span class="btn btn-warning btn-sm"><span class="ni ni-delivery-fast"></span> Selesai</span>';
						}
					}
				}
				
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $ls->nama_pelanggan;
				$row[] = $ls->jumlah;
				$row[] = number_format($ls->jumlah*HARGA_SATUAN);
				$row[] = $ls->tanggal_dibuat;
				$row[] = $ls->tanggal_dikirim;
				$row[] = $ls->tanggal_diterima;

				$row[] = $button;

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->PenjualanModel->count_all_penjualankurir(),
	            "recordsFiltered" => $this->PenjualanModel->count_filtered_penjualankurir(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function kirimBarang()
		{
			$id = $this->input->post('id');
			
			$data['id_kurir'] = $this->session->userdata('id');
			$data['tanggal_dikirim'] = date('Y-m-d H:i:s');

			$act = $this->PenjualanModel->updatePenjualan($id, $data);
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

	}
	
	/* End of file Penjualan.php */
	/* Location: ./application/controllers/admin/Penjualan.php */
?>