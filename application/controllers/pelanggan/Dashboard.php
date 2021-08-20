<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('DashboardModel');
		}
	
		public function index()
		{
			$def['title'] = SHORT_SITE_URL.' | Dashboard';
			$def['breadcrumb'] = '';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('pelanggan/dashboard');
			$this->load->view('partials/footer');
			$this->load->view('pelanggan/plugins/dashboard');
		}

		public function getTotal()
		{
			$get['jenis'] = 'id_pelanggan';
			$get['id_pelanggan'] = $this->session->userdata('id');
			$data['penjualan'] 	= $this->DashboardModel->getPenjualanById($get)->num_rows();

			echo json_encode($data);
		}
	
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/admin/Dashboard.php */
?>