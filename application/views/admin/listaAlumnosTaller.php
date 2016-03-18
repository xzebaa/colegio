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
		En esta área puedes encontrar todos los alumnos inscritos a este taller además de su estado de inscripción, puedes exportar la lista de los alumnos inscrito presionando el botón "Exportar".		
			</div>
		</div>
	</div>

			<div class="panel panel-primary">
			  <div class="panel-heading">Listado alumnos <?php ECHO $nomTall?></div>
				  <div class="panel-body">

			<div class="row">
			
			<div class="table-responsive">          
				<table class="table">
					<thead>
					<tr>
							<th>RUT</th>
							<th>NOMBRE</th>
							<th>TALLER</th>
							<th>CURSO</th>
							<th>INSCRITO</th>
							<th>ESTADO</th>
						</tr>
						
					</thead>
					<tbody>
<?php if($talleres){

		foreach ($talleres ->result() as $taller)
		{?> 

						<tr >
							<td><?php ECHO $taller->RUT?></td>
							<td><?php ECHO $taller->NOMBRE?></td>
							<td><?php ECHO $taller->TALLER?></td>
							<td><?php ECHO $taller->CURSO?></td>
							<td><?php ECHO $taller->INSCRITO?></td>
							<td><?php ECHO $taller->ESTADO?></td>
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

	  <div class="col-md-6 col-md-offset-4">
    <a href='<?php echo base_url("admin/PRINCIPAL/listaPorCursoPDF/".$CUR);?>' id="EXPO" style="margin-left: 38px;"><img src="<?php echo base_url("assets/img/descarga_excel.gif"); ?>" alt=""></a>
</div>

</div>
<script type="text/javascript">

</script>