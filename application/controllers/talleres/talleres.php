<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Talleres extends CI_Controller {
		function __construct(){
		parent::__construct();

		//$this->very_session();
		//$this->load->helper('mihelper');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper("url");
		$this->load->model('talleres_model');
		//$this->load->model('codigofacilito_model');

	}

	public function verifica()
	{

		$result=$this->talleres_model->verificaInscripcon($this->session->userdata('RUT'),$this->input->post("taller"));

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
					        $mensaje="Lo sentimos, este curso se ha completado.";
					        break;
					    default:
       						$mensaje="Lo setimos estamos experimentando dificultades de conexion,intentalo nuevamente!";
					}

					echo $mensaje; 

				}
				else
					echo "Lo setimos estamos experimentando dificultades de conexion,intentalo nuevamente!";

	//	echo "aquiiii    ".$this->obtenTalleres();
	}

	/*public function inscribeTaller()
	{
		
		echo "valorSerialize :".$this->input->post("optionsRadios");
		echo "tallercupo :".$this->input->post("taller".$this->input->post("optionsRadios"));
	}*/

		public function inscribeTaller()
	{
		$estado=2;
		if($this->input->post("taller".$this->input->post("optionsRadios"))!=0)
			$estado=1;


		$datos= array(
			$this->session->userdata('RUT'),
			$this->input->post("optionsRadios"),
			$estado);

		$this->talleres_model->inscribeTaller($datos);



		$this->load->view('bases/headers');
		$this->load->view('home/home');
		echo "agregado";
		
	}
}
?>

