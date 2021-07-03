<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class PelangganModel extends CI_Model {
		
		var $column_order = array(null, 'a.id', 'a.nama_lengkap', 'hp', 'a.alamat', 'a.created_at'); 
	    var $column_search = array('a.nama_lengkap', 'a.hp', 'a.alamat'); //field yang diizin untuk pencarian 
	    var $order = array('a.nama_lengkap' => 'asc'); // default order 
	    var $table = 'pelanggan';

	    // Datatable
		private function _get_datatables_query()
		{
			$this->db->select('a.*');
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

	// Datatable pelanggan

		function get_pelanggan()
		{
			$this->_get_datatables_query();
	        if($_POST['length'] != -1)
	        $this->db->limit($_POST['length'], $_POST['start']);


	        $query = $this->db->get();
	        return $query->result();
		}

		function count_filtered_pelanggan()
	    {
	        $this->_get_datatables_query();
	        $query = $this->db->get();
	        return $query->num_rows();
	    }
	 
	    function count_all_pelanggan()
	    {
	        $this->db->from($this->table);
	        return $this->db->count_all_results();
	    }
	// Datatable pelanggan

	    function addPelanggan($data)
	    {
			return $this->db->insert($this->table, $data);
	    }

	    function updatePelanggan($id, $data)
	    {
	    	return $this->db->update($this->table, $data, array('id' => $id));
	    }

	    function deletePelanggan($id)
	    {
	    	return $this->db->delete('pelanggan', array('id' => $id));
	    }
	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>