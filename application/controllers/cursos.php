<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {
		function __construct(){
		parent::__construct();
		$this->load->helper('mihelper');
		$this->load->helper('form');
		$this->load->model('codigofacilito_model');

	}

	public function nuevo()
	{
		$dato['string']="bienenido";
		$this->load->view('codigoFacil/headers');
		$this->load->view('cursos/formulario');
	}

	function recibirdatos()
	{
		$data =array(
			'nombre'=>$this->input->post('nombre'),
			'video'=>$this->input->post('videos')
			);
		$this->codigofacilito_model->crearCurso($data);

		$this->load->view('codigoFacil/headers');
		$this->load->view('codigoFacil/bienvenido');
	}

	function index()
	{
		$data['segmento']=$this->uri->segment(3);
		
		$this->load->view('codigoFacil/headers');

		if(!$data['segmento']){
			$data['cursos']=$this->codigofacilito_model->obtenerCursos();
		}
		else{
			$data['cursos']=$this->codigofacilito_model->obtenerCurso($data['segmento']);
		}

		$this->load->view('cursos/cursos',$data);
	}

		function editar()
	{
		$data['segmento']=$this->uri->segment(3);
		
		$this->load->view('codigoFacil/headers');

		if($data['segmento']){
		
			$data['cursos']=$this->codigofacilito_model->obtenerCurso($data['segmento']);
		}

		$this->load->view('cursos/editar',$data);
	}

		function actualizar()
	{

		$data =array(
			'nombre'=>$this->input->post('nombre'),
			'video'=>$this->input->post('videos')
			);
		$this->codigofacilito_model->actualizarCurso($this->uri->segment(3),$data);

		$this->load->view('codigoFacil/headers');
		$this->load->view('codigoFacil/bienvenido');
		redirect(base_url());


	}


		function borrar()
	{
		$id=$this->uri->segment(3);
		
		$this->load->view('codigoFacil/headers');

		if($id){
		
			$this->codigofacilito_model->eliminarCurso($id);
		}

		//$this->load->view('cursos/editar',$data);
	}
}
?>