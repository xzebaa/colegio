<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class USUARIOS extends CI_Controller {
		function __construct(){
		parent::__construct();

		$this->very_session();
		//$this->load->helper('mihelper');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper("url");
		$this->load->model('USUARIOS_MODEL');
		//$this->load->model('codigofacilito_model');

	}

	public function index()
	{

		$this->load->view('bases/headers');
		$this->load->view('home/home');

		$datos=array("RUT"=>$this->session->userdata('RUT'),
					"NOMBRE"=>$this->session->userdata('NOMBRE'),
					"CURSO"=>$this->session->userdata('CURSO'),
					"talleres"=>$this->obtenTalleres());

		$this->load->view('talleres/tomatalleres',$datos);
		$this->load->view('bases/footer');
		//echo "hola usuariio".$this->session->userdata('NOMBRE');

	//	echo "aquiiii    ".$this->obtenTalleres();
	}

	public function very_session()
	{
		if(!$this->session->userdata('RUT'))
			redirect(base_url()."ingreso");

		
		if($this->session->userdata('CURSO') ==1)
			redirect(base_url()."admin");
		
	}

	public function obtenTalleres()
	{
		$talleres=$this->USUARIOS_MODEL->obtenerTalleres($this->session->userdata('RUT'));
		return $talleres;
	}
/*SELECT talleres.ID,talleres.NOMBRE,talleres.HORARIO,talleres.PROFESOR,talleres.UBICACION,talleres.CUPOS,talleres.INSCRITOS FROM t003_talleres as talleres 
left join t005_talleres_cursos as tallCursos on
talleres.ID=tallCursos.TALLER
where  tallCursos.CURSO=19*/
}
?>