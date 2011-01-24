<?php
session_start();
class Admin extends Controller {

	function Admin()
	{
		parent::Controller();
		$this->load->database();
		$this->load->helper(array('form','url','file'));
		if (!isset($_SESSION['logined'])):
			redirect('login');
		endif;
	}
	
	function index()
	{
		$this->listings();
	}
	
	function test()
	{
		$data['content'] = $this->load->view('admin/testupload','', true);  // load the content plus data
		$this->load->view('admin/layout.php',$data);
	}
	
	/* Listings */
	function listings()
	{
		$data['query'] = $this->db->get('listings');
		$data['content'] = $this->load->view('admin/listing_admin_view',$data, true);  // load the content plus data
		$this->load->view('admin/layout.php',$data);
	}
	
	function newlisting()
	{
		$data['types'] = $this->db->get('types');
		$data['content'] = $this->load->view('admin/newlisting_admin_view',$data, true);  // load the content plus data
		$this->load->view('admin/layout.php',$data);
	}
	
	function viewlisting($id)
	{
		$data['types'] = $this->db->get('types');
		$data['photos'] = $this->db->get_where('pictures', array('listingID' => $id));	
		$query = $this->db->get_where('listings', array('id' => $id),1);
		$data['listing'] = $query->row();
		$data['content'] = $this->load->view('admin/viewlisting_admin_view',$data, true);  // load the content plus data
		$this->load->view('admin/layout.php',$data);
	}
	
	function save_listing()
	{	
		$data = array(
			   'id' => '',
			   'title' => $this->input->post('title'),
			   'type' => $this->input->post('type'),
			   'location' => $this->input->post('location'),		   			   			   			   
			   'price' => $this->input->post('price'),
			   'area' => $this->input->post('area')		   			   			   			   				  
			);
		
		if ($this->db->insert('listings', $data))		
			$this->picupload($this->db->insert_id());	
			//redirect('/admin/listings/', 'refresh');
		else
			echo "error";
	}
	
	function update_listing($id)
	{	
		$data = array(
			   'title' => htmlspecialchars($this->input->post('title')),
			   'type' => htmlspecialchars($this->input->post('type')),
			   'location' => htmlspecialchars($this->input->post('location')),	   			   			   			   
			   'price' => $this->input->post('price'),
			   'area' => $this->input->post('area'),
			   'description' => $this->input->post('description'),
			   'timestamp' => date("Y-m-d H:i:s")		   			   			   			   				  
			);
		
		$this->db->where('id', $id);
		if ($this->db->update('listings', $data)){
			$this->picupload($id);
			redirect('/admin/viewlisting/'.$id, 'refresh');			
		}	
	}
	
	function delete_listing_silent()
	{	
		$items = explode(",", $_POST["arr"]);
		
		foreach ($items  as $id):
			$this->db->delete('listings', array('id' => $id)); 	
		endforeach;

	}
	
	function delete_listing_photos()
	{	
		$items = explode(",", $_POST["arr"]);
		
		foreach ($items  as $id):
			$pInfo =  $this->photoInfo($id);
			unlink("./pictures/".$pInfo->imagename); 
			unlink("./pictures/".$pInfo->thumbnail); 
			$this->db->delete('pictures', array('picID' => $id)); 
		endforeach;
		
	}
	
	function photoInfo($id){
		$query = $this->db->get_where('pictures', array('picID' => $id));
		$row = $query->row();
		return $row;
	}
	
	/* Type */
	function type()
	{
		$data['query'] = $this->db->get('types');
		$data['content'] = $this->load->view('admin/type_admin_view',$data, true);  // load the content plus data
		$this->load->view('admin/layout.php',$data);
	}
	
	function save_type()
	{	
		$data = array(
			   'id' => '',
			   'type' => htmlspecialchars($this->input->post('type'))			   			   			   				  
			);
		
		if ($this->db->insert('types', $data))			
			redirect('/admin/type/', 'refresh');
		else
			echo "error";
	}
	
	/* Ads */
	function ads()
	{
		$data['query'] = $this->db->get('ads');
		$data['content'] = $this->load->view('admin/ads_admin_view',$data, true);  // load the content plus data
		$this->load->view('admin/layout.php',$data);
	}
	
	function save_ads()
    {
		$link=$this->input->post('link');
        //Load Model
        $this->load->model('Process_image');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']    = '2048'; //2 meg
	$config['max_width']  = '200';
	$config['max_height']  = '125';

        $this->load->library('upload');

        foreach($_FILES as $key => $value)
        {
            if( ! empty($key['name']))
            {
                $this->upload->initialize($config);
        
                if ( ! $this->upload->do_upload($key))
                {
                    $errors[] = $this->upload->display_errors();
                    if (count($errors)>0){
						$this->displayerror($errors);
					}
                }    
                else
                {
                    $this->Process_image->process_ads_pic($link);
                }
             }
        }
        
        
        $data['success'] = 'Thank You, Files Upladed!';

        redirect('/admin/ads', 'refresh');	 //Load view listing details
		    
    }
	
	
	/* Useful Functions */
	function getType($id){
		$this->db->select('type'); 
		$this->db->where('id', $id); 
		$this->db->from('types');
		$query = $this->db->get();
		$row = $query->row();
		return $row->type;
	}
	
	function picupload($listingID)
    {
        //Load Model
        $this->load->model('Process_image');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']    = '2048'; //2 meg


        $this->load->library('upload');

        foreach($_FILES as $key => $value)
        {
            if( ! empty($key['name']))
            {
                $this->upload->initialize($config);
        
                if ( ! $this->upload->do_upload($key))
                {
                    $errors[] = $this->upload->display_errors();
                }    
                else
                {

                    $this->Process_image->process_pic($listingID);

                }
             }
        
        }
        
        
        $data['success'] = 'Thank You, Files Upladed!';

        redirect('/admin/viewlisting/'.$listingID, 'refresh');	 //Load view listing details

        
    }
	
	
	/* Display Error */
	
	function displayerror($errors){
		$data['error'] = $errors;
		$data['content'] = $this->load->view('admin/error_view',$data, true);  // load the content plus data
		$this->load->view('admin/layout.php',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
