<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Penjualan extends CI_Controller {
	
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
	
	}
	
	/* End of file Penjualan.php */
	/* Location: ./application/controllers/admin/Penjualan.php */
?>