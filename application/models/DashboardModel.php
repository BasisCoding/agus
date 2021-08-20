<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class DashboardModel extends CI_Model {
	
		function getPelanggan()
		{
			return $this->db->get('pelanggan');
		}

		function getKurir()
		{
			return $this->db->get_where('users', array('level' => 2));
		}

		function getPenjualan()
		{
			return $this->db->get('penjualan');
		}

		function getPenjualanById($get)
		{
			return $this->db->get_where('penjualan', array($get['jenis'] => $get['id_pelanggan']));
		}
	
	}
	
	/* End of file DashboardModel.php */
	/* Location: ./application/models/DashboardModel.php */
?>