<div class="container-fluid">
	<div class="row">

		<div class="col-md-5">
			<div class="loginmodal-container">
				<h2>Toma de talleres 2016</h2><br>
			 						 <div class="table-responsive">          
						  <table class="table">
						    <thead>
						      <tr>
						        <th colspan="2">Informacion Personal</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <td>Rut</td>
						        <td><?php echo $RUT ?></td>
						      </tr>
						      <tr>
						        <td>Nombre</td>
						        <td><?php echo $NOMBRE ?></td>
						      </tr>
						      <tr>
						        <td>Curso</td>
						        <td><?php echo $CURSO ?></td>
						      </tr>
						    </tbody>
						  </table>
  						</div>
			</div>
		</div>
		<div class="col-md-12">

			<div class="panel panel-success">
			  <div class="panel-heading">Opciones toma talleres</div>
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
						</tr>
						
					</thead>
					<tbody>
<?php if($talleres){

		foreach ($talleres ->result() as $taller)
		{?> 

						<tr>
						<td><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></td>
							<td><?php ECHO $taller->NOMBRE?></td>
							<td><?php ECHO $taller->HORARIO?></td>
							<td><?php ECHO $taller->PROFESOR?></td>
							<td><?php ECHO $taller->UBICACION?></td>
							<td><?php ECHO $taller->CUPOS?></td>

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
$('.form').submit(function(){
    //alert($('input[name=year]:checked').val());
  
  	alert($(this).serialize());
  
    return false;
});
</script>