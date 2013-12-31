
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Speach extends CI_Controller{
 
 public function __construct() {
        parent::__construct();
    
    }

 public function index(){
     $this->load->view('speach_form');
    }

 public function req_handle(){
 	if($this->input->is_ajax_request())
	 	{
	    $name =$this->input->post('username');
	    $this->load->model("speach_model");
	    $data['result']=$this->speach_model->validate($name);
	     
	     if( $data['result']=$this->speach_model->validate($name))
	     	echo "data";
	    }
	 else 
	 	echo "No Direct SCRIPT is allowed";
   }
}