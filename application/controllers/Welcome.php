<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

			function __construct(){
		parent::__construct();
		//$this->load->helper('mihelper');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper("url");

		//$this->load->model('codigofacilito_model');

	}

	public function index()
	{
		$datos['string']=":D";
		$this->load->view('bases/headers');
		//$datos['headers']=$this->load->view('codigoFacil/headers','',true);
		//$this->load->view('welcome_message',$datos);
		$this->load->view('home/home');
		$this->load->view('home/login');
		$this->load->view('bases/footer');
	}
}
