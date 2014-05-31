<?php
class common_model extends CI_Model{
	public function  __construct(){
		parent::__construct();
		$this->load->database();
	}


	/*
	| -------------------------------------------------------------------
	| Select data
	| -------------------------------------------------------------------
	| 
	| general function to get result by passing nesessary parameters
	|
	*/
	public function selectData($table, $fields='*', $where, $order_by="", $order_type="", $group_by="", $limit="")
	{
		$this->db->select($fields);
		$this->db->from($table);
		$this->db->where($where);
	
		if ($order_by != '') {
			$this->db->order_by($order_by,$order_type);
		}
		
		if ($group_by != '') {
			$this->db->group_by($group_by);
		}

		if ($limit > 0) {
			$this->db->limit($limit);
		}
		
		$query = $this->db->get();
		return $data=$query->result();
	}


	/*
	| -------------------------------------------------------------------
	| Insert data
	| -------------------------------------------------------------------
	| 
	| general function to insert data in table
	|
	*/
	public function insertData($table, $data)
	{
		$result = $this->db->insert($table, $data);
		if($result == 1){
			return $this->db->insert_id();
		}else{
			return false;
		}	
	}		


	/*
	| -------------------------------------------------------------------
	| Update data
	| -------------------------------------------------------------------
	| 
	| general function to update data
	|
	*/
	public function updateData($table, $data, $where)
	{
		$this->db->where($where);
		if($this->db->update($table, $data)){
			return 1;
		}else{
			return 0;
		}
	}

	/*
	| -------------------------------------------------------------------
	| Delere data
	| -------------------------------------------------------------------
	| 
	| general function to delete the records
	|
	*/
	public function deleteData($table, $data)
	{
		if($this->db->delete($table, $data)){
			return 1;
		}else{
			return 0;
		}	
	}


}
?>