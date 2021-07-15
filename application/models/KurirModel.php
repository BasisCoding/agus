<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class KurirModel extends CI_Model {
		
		var $column_order = array(null, 'a.id', 'a.nama_lengkap', 'hp', 'a.alamat', 'a.created_at'); 
	    var $column_search = array('a.nama_lengkap', 'a.hp', 'a.alamat'); //field yang diizin untuk pencarian 
	    var $order = array('a.nama_lengkap' => 'asc'); // default order 
	    var $table = 'users';

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

	// Datatable Kurir

		function get_Kurir()
		{
			$this->_get_datatables_query();
	        if($_POST['length'] != -1)
	        $this->db->limit($_POST['length'], $_POST['start']);
	    	$this->db->where('level', 2);

	        $query = $this->db->get();
	        return $query->result();
		}

		function count_filtered_Kurir()
	    {
	        $this->_get_datatables_query();
	    	$this->db->where('level', 2);
	        $query = $this->db->get();
	        return $query->num_rows();
	    }
	 
	    function count_all_Kurir()
	    {
	        $this->db->from($this->table);
	    	$this->db->where('level', 2);

	        return $this->db->count_all_results();
	    }
	// Datatable Kurir

	    function addKurir($data)
	    {
			return $this->db->insert($this->table, $data);
	    }

	    function updateKurir($id, $data)
	    {
	    	return $this->db->update($this->table, $data, array('id' => $id));
	    }

	    function deleteKurir($id)
	    {
	    	return $this->db->delete($this->table, array('id' => $id));
	    }
	    
	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>