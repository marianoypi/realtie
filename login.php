<?php
session_start();
class Login extends Controller {

	function Login()
	{
		parent::Controller();
		$this->load->database();
		$this->load->helper(array('form','url','file'));
	}
	
	function index()
	{
		$this->load->view('login_view.php');
	}
	
	function verify(){
		if ($this->input->post('username')=="admin" && $this->input->post('password')){
			$_SESSION['logined']=TRUE;
			redirect('admin');
		}else{
			die("Invalid username and password");
		}	
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
