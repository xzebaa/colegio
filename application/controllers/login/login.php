<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
		function __construct(){
		parent::__construct();
		//$this->load->helper('mihelper');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper("url");
		$this->load->model('login_model');
		//$this->load->model('codigofacilito_model');

	}

	public function index()
	{
		$this->load->view('bases/headers');
		$this->load->view('home/home');
		$this->load->view('home/login');
		$this->load->view('bases/footer');
	}

	public function ingreso()
	{
		 if($this->input->post("login")){
		 	
		 	//Validaciones
            //name del campo, titulo, restricciones
			$this->form_validation->set_rules('user', 'Rut', 'required|min_length[3]|numeric|trim');

			//Mensajes
            // %s es el nombre del campo que ha fallado

			$this->form_validation->set_message('required','<h1>El campo %s es obligatorio</h1>');
			$this->form_validation->set_message('numeric','El campo %s debe estar compuesto solo por numeros');

			$this->form_validation->set_message('alpha','<h1>El campo %s debe estar compuesto solo por letras</h1>');

			$this->form_validation->set_message('min_length[3]','El campo %s debe tener mas de 3 caracteres');

			$this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
			
			if($this->form_validation->run()!=false){ 

				$alumnos=$this->login_model->verificaAlumno($this->input->post("user"));

				if($alumnos->num_rows()==1)
				{
					$alumno = $alumnos ->result();
					if($alumno[0]->CURSO ==1)
						redirect(base_url()."admin");
					else
						$this->cargaAlumno($alumno);

				}


			}
			else{ $this->index();}

		}else{$this->index();}
	
	}
	function cargaAlumno($alumno)
	{
		$this->session->set_userdata(array(
			"RUT"=>$this->input->post("user"),
			"NOMBRE"=>$alumno[0]->NOMBRE,
			"CURSO"=>$alumno[0]->CURSO
			));

		redirect(base_url()."talleres/".$this->input->post("user"));
	}

	function admin()
	{
				$this->load->view('bases/headers');
				$this->load->view('home/home');
				$this->load->view('home/loginAdmin');
				$this->load->view('bases/footer');
	}
}
?>