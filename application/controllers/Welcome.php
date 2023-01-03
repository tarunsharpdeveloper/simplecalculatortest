<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	 function __construct()
	 {
		 parent::__construct();
		 
		 $this->load->helper('form');
		 $this->load->library('form_validation');
	 }
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function calculate(){
		
	$this->form_validation->set_rules('one', 'One', 'required');
    $this->form_validation->set_rules('two', 'Two', 'required');
	$this->form_validation->set_rules('Operation', 'Operation', 'required');
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('welcome_message');
    }
    else
    {
       $operation = $this->input->post('Operation');
	   $one = $this->input->post('one');
	   $two = $this->input->post('two');
	   $result['result'] ='';
	   if($operation == 'SUM'){
		$result['result'] = $one+$two;
	   }else if($operation == 'SUB'){
		$result['result'] = $one-$two;
	   }else if($operation == 'DIV'){
		$result['result'] = $one/$two;
	   }else if($operation == 'MUL'){
		$result['result'] = $one*$two;
	   }
        $this->load->view('welcome_message',$result);
    }
		

	}
}
