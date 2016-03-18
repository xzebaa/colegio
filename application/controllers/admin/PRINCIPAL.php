<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PRINCIPAL extends CI_Controller {
		function __construct(){
		parent::__construct();

		$this->very_session();
		//$this->load->helper('mihelper');
		$this->load->helper('form');
		
		$this->load->library('form_validation');
		$this->load->helper("url");
		$this->load->model('ADMIN_MODEL');
		//$this->load->library('Excel');
		$this->load->library('Classes/PHPExcel.php');

	}

	public function index()
	{
			$this->load->view('bases/headers');
			$this->load->view('home/home');
			$this->load->view('admin/principal');

	}

    public function expExcel($datosQRy,$Cabezeras,$FileName)
	{

        // configuramos las propiedades del documento
    $this->phpexcel->getProperties()->setCreator("Arkos Noem Arenom")
                                 ->setLastModifiedBy("Arkos Noem Arenom")
                                 ->setTitle("Office 2007 XLSX Test Document")
                                 ->setSubject("Office 2007 XLSX Test Document")
                                 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                 ->setKeywords("office 2007 openxml php")
                                 ->setCategory("Test result file");


			 $this->phpexcel->getActiveSheet()->fromArray($Cabezeras, null, 'A1');


               // $datosQRy=$this->ADMIN_MODEL->get();
                $exceldata="";
		        foreach ($datosQRy->result_array() as $row){
		                $exceldata[] = $row;
		                //echo ''.$row;
		        }
                //Fill data 
                $this->phpexcel->getActiveSheet()->fromArray($exceldata, null, 'A2');
     
    // Renombramos la hoja de trabajo
    $this->phpexcel->getActiveSheet()->setTitle('Simple');
     
     
    // configuramos el documento para que la hoja
    // de trabajo número 0 sera la primera en mostrarse
    // al abrir el documento
    $this->phpexcel->setActiveSheetIndex(0);
     
     
    // redireccionamos la salida al navegador del cliente (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$FileName.'.xlsx"');
    header('Cache-Control: max-age=0');
     
    $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
    $objWriter->save('php://output');

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

						$nombreDoc="Taller";
						$taller=$this->ADMIN_MODEL->obtenernNombreTaller($this->input->post("cur"));

						if($taller)
						{
							if($taller->num_rows()==1)
							{
								$tall = $taller ->result();
								$nombreDoc=$tall[0]->TALLERNOMBRE; 
							}
						}

							$datos=array("talleres"=>$result,"CUR"=>$this->input->post("cur"),"nomTall"=>$nombreDoc);
							echo $this->load->view('admin/listaAlumnosTaller',$datos, TRUE);
							
					}
					else
						echo "0";
				}
				else
					echo "0";
	}

	public function principalBusqueda()
	{

		$datos=null;
		echo $this->load->view('admin/busquedaAlumno',$datos, TRUE);

	}

	public function busquedaAlumnRut()
	{

				$result=$this->ADMIN_MODEL->obtenerAlumnoInscrito($this->input->post("rr"));

				if($result){
					if($result->num_rows()>0)
					{
						$datos=array("talleres"=>$result );
						echo $this->load->view('admin/alumnInscrito',$datos, TRUE);
					}
				}
				else
				{
					$result=$this->ADMIN_MODEL->obtenerAlumno($this->input->post("rr"));
					if($result){
						if($result->num_rows()>0)
						{
							$datos=array("talleres"=>$result );
							echo $this->load->view('admin/alumnoBusq',$datos, TRUE);
						}
					}
					else
						echo "0";
					
				}

	}

	public function listaPorCursoPDF()
	{

		$result=$this->ADMIN_MODEL->listaPorCurso($this->uri->segment(4));

				if($result){
					if($result->num_rows()>0)
					{
						$respuesta="";
						$mensaje="";

						 $sheet = array(
			    array(
			      'RUT',
			      'NOMBRE',
			      'TALLER',
			      'CURSO',
			      'INSCRITO',
			      'ESTADO'
			    )
			  );

				$nombreDoc="Taller";
				$taller=$this->ADMIN_MODEL->obtenernNombreTaller($this->uri->segment(4));

				if($taller)
				{
					if($taller->num_rows()==1)
					{
						$tall = $taller ->result();
						$nombreDoc=$tall[0]->TALLERNOMBRE; 
					}
				}

							$this->expExcel($result,$sheet,$nombreDoc);
							
					}
					else
						echo "SE GENERO UN PROBLEMA AL EXPORTAR EXECEL,FAVOR INTENTAR NUEVAMENTE,";
				}
				else
					echo "SE GENERO UN PROBLEMA AL EXPORTAR EXECEL,FAVOR INTENTAR NUEVAMENTE,";
	}

		public function very_session()
	{
		if(!$this->session->userdata('RUT'))
			redirect(base_url()."ingreso");

		
		if($this->session->userdata('CURSO')>1)
			redirect(base_url()."ingreso");
		
	}


	
}
?>