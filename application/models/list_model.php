<?php
class List_model extends CI_Model {

	public $list = null;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_by_user($id)
    {
    	$user_id = $id;
    	if (!is_numeric($id))
    	{
    		$this->db->select('id');
	        $this->db->where('email', $id);
	        $query = $this->db->get('users');

	        if ($query->num_rows() === 1) {
	        	$user = $query->result_array();
	            $user_id = $user[0]['id'];
	        }
    	}

    	$this->db->select('*');
    	$this->db->where('user_id', $user_id);
		$query = $this->db->get('lists');
		
		if ($query->num_rows() > 1) {
			$this->list = $query->result_array();
			return $this->_organize_by_heading();
		}
    }

    private function _organize_by_heading()
    {
    	if (!count($this->list))
    	{
    		return null;
    	}

    	$revised_list = array();
    	$headers = $this->_get_headers();

    	foreach($headers as $header)
    	{
    		$sub_items_ids = array_keys($this->header_id_values, $header['id'], true);
    		$item = $header;
    		$item['sub_item'] = array();
    		foreach($sub_items_ids as $id)
    		{
    			array_push($item['sub_item'], $this->list[$id]);
    		}
    		array_push($revised_list, $item);
    	}

    	return $revised_list;
    }

    private function _get_headers()
    {
    	$this->header_id_values = array_column($this->list, 'header');
    	$header_ids = array_keys($this->header_id_values, NULL, true);
    	$headers = array();

    	foreach($header_ids as $id)
    	{
    		// Get this header by id and remove the 'header' column before adding 
    		// to the array of headers to return from this function
    		$header = $this->list[$id];
    		unset($header['header']);
    		array_push($headers, $header);
    	}

    	return $headers;
    }

}