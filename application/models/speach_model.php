<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Speach_model extends CI_Model{

/*
This fubction name is in database or not
@param: name
@return: query
*/
 public function validate($name){
  		$this->db->like('name',$name);
  		$query=  $this->db->get('search')->result_array();
  		return $query;
	}
}
