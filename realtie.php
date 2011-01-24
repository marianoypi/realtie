<?php

class Realtie extends Controller {

	function Realtie()
	{
		parent::Controller();	
		$this->load->helper('url');
		$this->load->database();
		//$this->load->library('tbs');
		// uncomment the line below to load the library under the name "smarty", if desired
		// $this->load->_ci_varmap['smarty_parser'] = 'smarty';
		$this->load->library('smarty_parser');		
		//echo "hello";
	}
	
	function index()
	{
		$data['template_dir']=base_url()."templates/";
		$data['photos_dir']=base_url()."pictures/";
		$data['base_dir']=base_url();
		$query = $this->db->get('listings');
		$query2 = $this->db->get('ads');
		$data['test']="test";	
		$data['listings']=$query->result_array();
		$data['ads']=$query2->result_array();
		$this->smarty_parser->parse("main_template.php", $data);
		//echo $this->someclass->some_function();		
	}
	
	function commoninfo(){
		$data['menu_listings']="Listings";
		$data['menu_members']="Member";
		$data['menu_other']="Listings";
		return $data;
	}
	
	function listingdetails($id){
		$data['template_dir']=base_url()."templates/";
		$data['photos_dir']=base_url()."pictures/";
		$data['base_dir']=base_url();
		$query = $this->db->get_where('listings', array('id' => $id));	
		$queryPhotos = $this->db->get_where('pictures', array('listingID' => $id));	
		$data['photos'] = $queryPhotos->result_array();
		$data['listinginfo']=$query->result_array();
		$this->smarty_parser->parse("listingdetails_template.php", $data);
		//echo $this->someclass->some_function();
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
