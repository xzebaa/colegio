<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LOGIN extends CI_Controller {
		function __construct(){
		parent::__construct();
		//$this->load->helper('mihelper');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper("url");
		$this->load->model('LOGIN_MODEL');
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
			$this->form_validation->set_rules('user', 'Rut', 'required|min_length[7]|numeric|trim');

			//Mensajes
            // %s es el nombre del campo que ha fallado

			$this->form_validation->set_message('required','El campo %s es obligatorio');
			$this->form_validation->set_message('numeric','El campo %s debe estar compuesto solo por numeros');

			$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');

			$this->form_validation->set_message('min_length','El campo %s es muy corto !');

			$this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
			
			if($this->form_validation->run()!=false){ 

				$alumnos=$this->LOGIN_MODEL->verificaAlumno($this->input->post("user"));

				if($alumnos)
				{
					if($alumnos->num_rows()==1)
					{
						$alumno = $alumnos ->result();
						if($alumno[0]->CURSOID ==1)
							redirect(base_url()."admin");
						else
							$this->cargaUser($alumno);

					}
				}
				else
				{

					$this->form_validation->set_rules('myfield', 'My Field Name', 'callback_name_function');
					$this->form_validation->run();
					$this->index();
				}



			}
			else{ $this->index();}

		}else if($this->session->userdata('CURSO')){
			$this->redirectUserAct();
		}else{

			$this->index();}
	
	}

		public function ingresoADM()
	{
		 if($this->input->post("login")){
		 	
		 	//Validaciones
            //name del campo, titulo, restricciones
			$this->form_validation->set_rules('user', 'Rut', 'required|min_length[7]|numeric|trim');
			$this->form_validation->set_rules('pass', 'Password', 'required|min_length[4]|numeric|trim');

			//Mensajes
            // %s es el nombre del campo que ha fallado

			$this->form_validation->set_message('required','El campo %s es obligatorio');
			$this->form_validation->set_message('numeric','El campo %s debe estar compuesto solo por numeros');

			$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');

			$this->form_validation->set_message('min_length','El campo %s es muy corto !');


			$this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
			
			if($this->form_validation->run()!=false){ 

				$alumnos=$this->LOGIN_MODEL->verificaAlumno($this->input->post("user"));

				if($alumnos)
				{
					if($alumnos->num_rows()==1)
					{
						$alumno = $alumnos ->result();
						$this->cargaUser($alumno);

					}
				}
				else
				{

					$this->form_validation->set_rules('myfield', 'My Field Name', 'callback_name_function');
					$this->form_validation->run();
					$this->admin();
				}



			}
			else{ $this->admin();}

		}else if($this->session->userdata('CURSO')){
			$this->redirectUserAct();
		}else{

			$this->admin();}
	
	}

	public function name_function()
    {
        $this->form_validation->set_message('name_function', 'Lo sentimos, no tenemos registro de este alumno!');
        return false;
    }
	function cargaUser($alumno)
	{
		$this->session->set_userdata(array(
			"RUT"=>$this->input->post("user"),
			"NOMBRE"=>$alumno[0]->NOMBRE,
			"CURSO"=>$alumno[0]->CURSOID,
			"NOMCURSO"=>$alumno[0]->CURSO
			));
		if($alumno[0]->CURSO ==1)
			redirect(base_url()."panel/".str_ireplace(" ","_",str_ireplace(",","",$this->session->userdata('NOMBRE'))));
		else
			redirect(base_url()."talleres/".str_ireplace(" ","_",str_ireplace(",","",$this->session->userdata('NOMBRE'))));

	}

	function redirectUserAct()
	{
		if($this->session->userdata('CURSO') ==1)
			redirect(base_url()."admin");
		else if($this->session->userdata('CURSO') >1)
			redirect(base_url()."talleres/".str_ireplace(" ","_",str_ireplace(",","",$this->session->userdata('NOMBRE'))));
	}

	function admin()
	{
				$this->load->view('bases/headers');
				$this->load->view('home/home');
				$this->load->view('home/loginAdmin');
				$this->load->view('bases/footer');
	}

	function killSession()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
?>