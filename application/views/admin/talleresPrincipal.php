<style type="text/css">
	.dispo{color: green;font-weight: bold;}
	.nodispo{color: red;font-weight: bold;}
	.lab{ 
   cursor:pointer;
	}
	.lab:hover {
	color:white;
    background-color: #337ab7;
    font-weight: bold;
}
</style>
<div class="container-fluid">
	<div class="row">

<div class="col-md-12">
	<div class="panel panel-info">
		<div class="panel-heading">Nota !</div>
		<div class="panel-body">
			<div class="row">
				Para mas informacion de los cursos puedes precionar en el nombre y podras extraer una lista con los alumnos inscrito y en lista de espera.
			</div>
		</div>
	</div>

			<div class="panel panel-primary">
			  <div class="panel-heading">TALLERES ACTUALES EN SISTEMA</div>
				  <div class="panel-body">

			<div class="row">
			
			<div class="table-responsive">          
				<table class="table">
					<thead>
					<tr>
							<th>#</th>
							<th>NOMBRE</th>
							<th>HORARIO</th>
							<th>PROFESOR</th>
							<th>UBICACION</th>
							<th>CUPOS</th>
							<th>INSCRITOS</th>
							<th>ESPERA</th>
							<th>ESTADO</th>
							<th>CURSOS</th>
						</tr>
						
					</thead>
					<tbody>
<?php if($talleres){

		foreach ($talleres ->result() as $taller)
		{?> 

						<tr >
							<td ><?php ECHO $taller->ID?></td>
							<td class="lab" onclick="cargaInfoCurso(<?php ECHO $taller->ID?>);"><?php ECHO $taller->NOMBRE?></td>
							<td><?php ECHO $taller->HORARIO?></td>
							<td><?php ECHO $taller->PROFESOR?></td>
							<td><?php ECHO $taller->UBICACION?></td>
							<td><?php ECHO $taller->CUPOS?></td>
							<td><?php ECHO $taller->INSCRITOS?></td>
							<td class="<?php ECHO ($taller->ESPERA > 0) ? 'nodispo' : 'dispo'; ?>"><?php ECHO $taller->ESPERA?></td>
							<td class="<?php ECHO ($taller->DISPO > 0) ? 'dispo' : 'nodispo'; ?>"><?php ECHO $taller->ESTADO?></td>
							<td><button style="margin:7px 15px 17px 0;" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="" data-original-title="<?php ECHO $taller->CURSOS?>">INFO</button>
								</td>

						</tr>
					
			<?php }
	}else{
		echo "<p>error en la aplicacion</p>";
		} ?>

		</tbody>
				</table>
			</div>
			</div>

				   
				  </div>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({html:true}); 
});

function cargaInfoCurso(id)
{
	alert(id);
	var resp = ajax_({'cur':id},'<?php echo base_url("admin/PRINCIPAL/listaPorCurso");?>');
    if(resp!=0)
       $( "#contDinamico" ).html(resp);
   else
   	BootstrapDialog.show({
				            title: 'Ops!',
				            message: 'Este curso no posee alumnos inscritos'});

}

</script>