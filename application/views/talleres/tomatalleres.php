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
      <form class="form">
		<div class="btn-group" data-toggle="buttons">
			

<?php if($talleres){
		foreach ($talleres ->result() as $taller)
		{?> 
		
			<label class="btn btn-default">
				<input name="year" value="2011" type="radio">
				<div class="col-md-12">
					<div class="table-responsive">          
						<table class="table">
							<thead>
								<tr>
									<th><?php ECHO $taller->NOMBRE?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Horario</td>
									<td><?php ECHO $taller->HORARIO?></td>
								</tr>
								<tr>
									<td>Profesor</td>
									<td><?php ECHO $taller->PROFESOR?></td>
								</tr>
								<tr>
									<td>Ubicacion</td>
									<td><?php ECHO $taller->UBICACION?></td>
								</tr>
								<tr>
									<td>Cupos</td>
									<td><?php ECHO $taller->CUPOS?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</label>
		<?php }
	}else{

		echo "<p>error en la aplicacion</p>";
		} ?>
        </div><button type="submit" class="btn btn-default">Submit</button></form>
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