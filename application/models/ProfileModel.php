<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class ProfileModel extends CI_Model {
	
		function getProfile()
		{
			return $this->db->get_where('profile', array('id' => 1))->row();
		}
		
		function updateProfile($data)
		{
			return $this->db->update('profile', $data, array('id' => 1));
		}
	}
	
	/* End of file ProfileModel.php */
	/* Location: ./application/models/ProfileModel.php */
?>