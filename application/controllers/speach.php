
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Speach extends CI_Controller{
 
 public function __construct() {
        parent::__construct();
    }

 public function index(){
     $this->load->view('speach_form');
    }
 /*
 This function hanhle ajax response
 @param null
 @return Json object 
 */
 public function req_handle(){
	 	if($this->input->is_ajax_request()){
		    $name =$this->input->post('type');
		    $this->load->model("speach_model");
		    $data['result']=$this->speach_model->validate($name);
		    echo json_encode($data['result']);
		}
		else{ 
	   	 	echo "No Direct SCRIPT is allowed";
	    }   
   }
}