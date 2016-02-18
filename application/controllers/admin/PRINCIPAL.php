<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PRINCIPAL extends CI_Controller {
		function __construct(){
		parent::__construct();

		//$this->very_session();
		//$this->load->helper('mihelper');
		$this->load->helper('form');
		
		$this->load->library('form_validation');
		$this->load->helper("url");
		$this->load->model('ADMIN_MODEL');

	}

	public function index()
	{
			$this->load->view('bases/headers');
			$this->load->view('home/home');
			$this->load->view('admin/principal');
	}


	public function obtenTalleres()
	{

		$result=$this->ADMIN_MODEL->obtenerTalleres();

				if($result->num_rows()>1)
				{
					$respuesta="";
					$mensaje="";

					foreach ($result ->result() as $respuesta)
					{
						$respuesta->CURSOS=$this->obtenTalleresCursos($respuesta->ID);
					}
						$datos=array("talleres"=>$result );

						echo $this->load->view('admin/talleresPrincipal',$datos, TRUE);
						
				}
				else
					echo "0";
	}
	
	public function obtenTalleresCursos($id)
	{

		$result=$this->ADMIN_MODEL->obtenerTalleresCursos($id);

		if($result->num_rows()>1)
			{
					$respuesta="";
					$mensaje="";

					foreach ($result ->result() as $respuesta)
					{
						$mensaje=$mensaje."</br>".$respuesta->NOMBRE;
					}
			}

		return $mensaje;
	}

	public function listaPorCurso()
	{

		$result=$this->ADMIN_MODEL->listaPorCurso($this->input->post("cur"));

				if($result){
					if($result->num_rows()>0)
					{
						$respuesta="";
						$mensaje="";

							$datos=array("talleres"=>$result );
							echo $this->load->view('admin/listaAlumnosTaller',$datos, TRUE);
							
					}
					else{
						echo "0";}
				}
				else{}
					echo "0";
	}
	/*public function verificaEspera()
	{

		$result=$this->TALLERES_MODEL->verificaInscripcon($this->session->userdata('RUT'),$this->input->post("taller"));

				if($result->num_rows()==1)
				{
					$respuesta="";
					$mensaje="";

					foreach ($result ->result() as $respuesta)
					{
						$respuesta=$respuesta->resp;

					}

					switch ($respuesta) {
					    case "1":
					       $mensaje="1";
					        break;
					    case "2":
					        $mensaje="Ya posees un curso inscrito.";
					        break;
					    case "3":
					        $mensaje="1";
					        break;
					    default:
       						$mensaje="Lo setimos estamos experimentando dificultades de conexion,intentalo nuevamente!";
					}

					echo $mensaje; 

				}
				else
					echo "Lo setimos estamos experimentando dificultades de conexion,intentalo nuevamente!";
	}

	/*public function inscribeTaller()
	{
		
		echo "valorSerialize :".$this->input->post("optionsRadios");
		echo "tallercupo :".$this->input->post("taller".$this->input->post("optionsRadios"));
	}

		public function inscribeTaller()
	{
		$this->load->view('bases/headers');
		$this->load->view('home/home');


		$estado=2;
		if($this->input->post("taller".$this->input->post("optionsRadios"))!=0)
			$estado=1;


		$datos= array(
			$this->session->userdata('RUT'),
			$this->input->post("optionsRadios"),
			$estado);

		$respuestas=$this->TALLERES_MODEL->inscribeTaller($datos);

		$respuesta = $respuestas ->result();

		$tall= array("inscripciones"=>$this->obtenInscr());
		if($respuesta[0]->estado==1)
		{
				$this->load->view('talleres/inscripcion',$tall);
		}
		else
		{
			echo "no agregado";
		}


		$this->load->view('bases/footer');
		
	}

	public function obtenInscr()
	{
		$insc=$this->TALLERES_MODEL->obtenInscr($this->session->userdata('RUT'));
		return $insc;
	}

	function cargaVar()
	{
		 if($this->input->post("login")){

			$_SESSION["pdf"]=$this->input->post("var");
		 }
	}*/
}
?>