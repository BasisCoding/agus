<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class PenjualanModel extends CI_Model {
		
		var $column_order = array(null, 'b.nama_lengkap', 'a.jumlah', 'a.created_at'); 
	    var $column_search = array('b.nama_lengkap', 'a.jumlah'); //field yang diizin untuk pencarian 
	    var $order = array('a.created_at' => 'asc'); // default order 
	    var $table = 'penjualan';

	// Datatable
		private function _get_datatables_query()
		{
			$this->db->select('a.*, b.nama_lengkap as nama_pelanggan, c.nama_lengkap as nama_kurir');
			$this->db->join('users as b', 'b.id = a.id_pelanggan', 'left');
			$this->db->join('users as c', 'c.id = a.id_kurir', 'left');

			$this->db->from($this->table.' as a');
	        $i = 0;
	     	
	        foreach ($this->column_search as $item) // looping awal
	        {
	            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
	            {
	                 
	                if($i===0) // looping awal
	                {
	                    $this->db->group_start();
	                    $this->db->like($item, $_POST['search']['value']); 
	                }
	                else
	                {
	                    $this->db->or_like($item, $_POST['search']['value']);
	                }
	 
	                if(count($this->column_search) - 1 == $i) 
	                    $this->db->group_end(); 
	            }
	            $i++;
	        }
	         
	        if(isset($_POST['order'])) { // here order processing
	            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	        }  else if(isset($order)) {
	            $order = $order;
	            $this->db->order_by(key($order), $order[key($order)]);
	        }
		}

	// Datatable Penjualan

		// Admin
			function getPenjualan()
			{
				$this->_get_datatables_query();
		        if($_POST['length'] != -1)
		        $this->db->limit($_POST['length'], $_POST['start']);

		        $query = $this->db->get();
		        return $query->result();
			}

			function count_filtered_penjualan()
		    {
		        $this->_get_datatables_query();
		        $query = $this->db->get();
		        return $query->num_rows();
		    }
		 
		    function count_all_penjualan()
		    {
		        $this->db->from($this->table);
		        return $this->db->count_all_results();
		    }
		// Admin

		// Kurir

		    function getPenjualanKurir()
		    {
		    	$this->_get_datatables_query();
		        if($_POST['length'] != -1)
		        $this->db->limit($_POST['length'], $_POST['start']);

		    	$this->db->where('id_kurir', $this->session->userdata('id'));
		    	$this->db->or_where('id_kurir', NULL);

		        $query = $this->db->get();
		        return $query->result();
		    }

		    function count_filtered_penjualankurir()
		    {
		        $this->_get_datatables_query();
		        $this->db->where('id_kurir', $this->session->userdata('id'));
		    	$this->db->or_where('id_kurir', NULL);

		        $query = $this->db->get();
		        return $query->num_rows();
		    }
		 
		    function count_all_penjualankurir()
		    {
		        $this->db->from($this->table);
		        $this->db->where('id_kurir', $this->session->userdata('id'));
		    	$this->db->or_where('id_kurir', NULL);

		        return $this->db->count_all_results();
		    }

		// Kurir

		// Pelanggan

		    function getPenjualanPelanggan()
		    {
		    	$this->_get_datatables_query();
		        if($_POST['length'] != -1)
		        $this->db->limit($_POST['length'], $_POST['start']);

		    	$this->db->where('id_pelanggan', $this->session->userdata('id'));

		        $query = $this->db->get();
		        return $query->result();
		    }

		    function count_filtered_penjualanPelanggan()
		    {
		        $this->_get_datatables_query();
		        $this->db->where('id_pelanggan', $this->session->userdata('id'));

		        $query = $this->db->get();
		        return $query->num_rows();
		    }
		 
		    function count_all_penjualanPelanggan()
		    {
		        $this->db->from($this->table);
		        $this->db->where('id_pelanggan', $this->session->userdata('id'));
		    	
		        return $this->db->count_all_results();
		    }
		    
		// Pelanggan

	// Datatable Penjualan

	    function addPenjualan($data)
	    {
			return $this->db->insert($this->table, $data);
	    }

	    function updatePenjualan($id, $data)
	    {
	    	return $this->db->update($this->table, $data, array('id' => $id));
	    }

	    function deletePenjualan($id)
	    {
	    	return $this->db->delete($this->table, array('id' => $id));
	    }
	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>