<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * @property Login_control $Login_control
 * @property Aauth $aauth Description
 */
class Example extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library("Aauth");
    }

    public function index() {

         //if ($this->aauth->login('admin@admin.com', 'password', true))
		  if ($this->aauth->login('ali@ali.com','alispass',true))
			echo 'tmm';

        else 
              "check";
        //echo date("Y-m-d H:i:s");
    }

    function debug(){

        echo "<pre>";
    
        echo '<br>---- error --- <br>';
        echo $this->aauth->get_errors();

        echo '<br>---- info --- <br>';
        echo $this->aauth->get_infos();

        echo "</pre>";
    }
    
    public function is_loggedin() {

        if ($this->aauth->is_loggedin())
            echo 'girdin';
    }

    public function logout() {

        $this->aauth->logout();
    }

    public function is_member() {

        if ($this->aauth->is_member('Admin'))
            echo 'uye';
    }

    public function is_admin() {

        if ($this->aauth->is_member('Admin'))
            echo 'adminovic';
    }

    public function check_email() {

        if ($this->aauth->check_email("emre@emreakay.com"))
            echo 'uygun ';
        else
            echo 'alindi ';

        echo $this->aauth->get_errors();

        echo ' sadsad';
    }

    function create_user() {
       $a = $this->aauth->create_user("shagufta_shamsi@yahoo.com", "asd123", "shagufta");
         //For checking permission create 2 users
		 //$a = $this->aauth->create_user('ali@ali.com','alispass','Ali Akay');
 		// $a = $this->aauth->create_user('john@john.com','johnspass','John Button');
		print_r($this->aauth->get_user($a));
    }

	  function create_group() {

        $a = $this->aauth->create_group("governors");
		$b=$this->aauth->create_group('commons');
    }

    function update_user() {
        $a = $this->aauth->update_user(3, "xxx@ssdas.com", "asd", "asdasd");
		print_r($a);
    }
    

    function add_member() {

        $a = $this->aauth->add_member(1, 4);
    }
    
	/// ADDED BY SHAGUFTA -> For Permission///
	  /// Reset Password///
    function reset_pass(){
     if($this->aauth->reset_password(10))
	 echo "======Successfully Reset=====";
	}	 
	
	/// Create Permission///
	function create_perm(){
	
		$this->aauth->create_perm('increase_tax');
		$this->aauth->create_perm('change_government');
	}
	/// Allow Permission/////
	function allow_perm(){
	    $this->aauth->allow('governors','increase_tax');
        $this->aauth->allow('commons','change_government');
		$this->aauth->allow('commons','increase_tax');
	}
	/// Deny Permissions ////
	function deny_perm(){
	    $this->aauth->deny('commons','increase_tax');
	 }
	/// Check Permission////
	function check_perm(){
	     if($this->aauth->is_allowed('commons','increase_tax')){
          // i dont think so
		    echo "==== Common Person allowed to increase tax=====";
       } else {
         // do sth in the middle
		   echo "==== Common is not allowed to increase tax=====";
       }
	
	}

}

/* End of file welcome.php */
