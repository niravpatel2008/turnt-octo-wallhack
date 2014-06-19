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
	public function selectData($table, $fields='*', $where='', $order_by="", $order_type="", $group_by="", $limit="", $rows="", $type='')
	{
		$this->db->select($fields);
		$this->db->from($table);
		if ($where != "") {
			$this->db->where($where);
		}	

		
	
		if ($order_by != '') {
			$this->db->order_by($order_by,$order_type);
		}
		
		if ($group_by != '') {
			$this->db->group_by($group_by);
		}

		if ($limit > 0 && $rows == "") {
			$this->db->limit($limit);
		}	
		if ($rows > 0) {
			$this->db->limit($rows, $limit);
		}
	
		
		$query = $this->db->get();
		
		if ($type == "rowcount") {
			$data = $query->num_rows();
		}else{
			$data = $query->result();
		}

		#echo "<pre>"; print_r($this->db->queries); exit;
		$query->free_result();

		return $data;
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
	
	public function deleteTags($de_autoid,$tag_ids)
	{
		$this->db->where_in('dm_dtid', $de_autoid);
		$this->db->where(array('dm_ddid'=>$tag_ids));
		$del = $this->db->delete(DEAL_MAP_TAGS);
		if($del){
			$delqry = "DELETE FROM deal_tags WHERE dt_autoid IN (".implode(",",$de_autoid).") AND (SELECT IF (COUNT(*)=0,1,0) FROM deal_map_tags WHERE dm_dtid = dt_autoid)";
			$this->db->query($delqry);
			return 1;
		}else{
			return 0;
		}	
	}

	public function getDealTags($dd_autoid)
	{
		$this->db->select("dt_autoid,dt_tag");
		$this->db->from(DEAL_TAGS);
		$this->db->join(DEAL_MAP_TAGS, "dm_dtid = dt_autoid");
		$this->db->where(array("dm_ddid"=>$dd_autoid));

		$query = $this->db->get();
		$tags = $query->result_array();
		$query->free_result();
		return ($tags);
	}

	public function assingImagesToDeal($deal_id,$image_ids)
	{
		$this->db->where_in('dl_autoid',$image_ids);
		$data = array("dl_ddid"=>$deal_id);
		if($this->db->update(DEAL_LINKS, $data)){
			return 1;
		}else{
			return 0;
		}
	}
	
	public function getTagAutoSuggest($tag)
	{
		$this->db->select('dt_tag');
		$this->db->from(DEAL_TAGS);
		$this->db->like('dt_tag', $tag, 'after');
		$query = $this->db->get();
		$tags = $query->result_array();
		$resTags = array();
		foreach($tags as $tag)
			$resTags[] = array($tag['dt_tag'],$tag['dt_tag']);
		return ($resTags);
	}

}
?>