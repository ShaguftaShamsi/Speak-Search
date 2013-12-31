<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Speach_model extends CI_Model{

public function validate($name){
 $query = $this->db->get_where('search',array('name' => $name));
   // echo " something";
  return $query->result();
}

}
