<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Laporan extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('PenjualanModel');
		}
	
		public function index()
		{
			$def['title'] = SHORT_SITE_URL.' | Laporan';
			$def['breadcrumb'] = 'Laporan';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('laporan');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/laporan');
		}

		public function get_Penjualan()
		{
			$list = $this->PenjualanModel->getPenjualanLaporan();
			// echo $this->db->last_query($list);
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

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->PenjualanModel->count_all_penjualanLaporan(),
	            "recordsFiltered" => $this->PenjualanModel->count_filtered_penjualanLaporan(),
	            "data" => $data
			);

			echo json_encode($output);
		}
	
	}
	
	/* End of file Laporan.php */
	/* Location: ./application/controllers/Laporan.php */
?>