<style type="text/css">
	.dispo{color: green;}
	.nodispo{color: red;}
</style>
<div class="container-fluid">
	<div class="row">
		<?php echo form_open('talleres/'.$this->uri->segment(2)."/inscrito",array('class' => 'form'));?>
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
							<th>ESTADO</th>
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
						<td><input type="radio" name="optionsRadios" value="<?php ECHO $taller->ID?>" id="optionsRadios2" value="option2"></td>
							<td><?php ECHO $taller->NOMBRE?></td>
							<td><?php ECHO $taller->ESTADO?></td>
							<td><?php ECHO $taller->HORARIO?></td>
							<td><?php ECHO $taller->PROFESOR?></td>
							<td><?php ECHO $taller->UBICACION?></td>
							<td><?php ECHO $taller->CUPOSTOTALES?></td>

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
		<div class="col-md-12">
		<button type="button" id="btInsc" class="btn btn-success btn-lg">Validar</button>
  <a href="<?php echo base_url("ingreso"); ?>" class="btn btn-danger btn-lg">Reiniciar encuesta</a>
  </div>
  </form >
	</div>

</div>
<script type="text/javascript">
$('#btInsc').click(function() {
   // alert($('input[name=optionsRadios]:checked').val());
  
  	if(!$('input[name=optionsRadios]:checked').val()){
       BootstrapDialog.alert({
          type:  BootstrapDialog.TYPE_DANGER,
          title: 'Oops! ',
          message: 'Debes seleccion un cursopara seguir !',
          buttons: [{
              label: 'Ok'
          }]
      });
    return false;
	}
	else
	{
			        BootstrapDialog.confirm({
            title: 'ATENCION',
            message: 'Estas apunto de inscribir tu taller, estas seguro?',
            type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            btnCancelLabel: 'cancelar', // <-- Default value is 'Cancel',
            btnOKLabel: 'inscribir', // <-- Default value is 'OK',
            btnOKClass: 'btn-success', // <-- If you didn't specify it, dialog type will be used,
            callback: function(result) {
                // result will be true if button was click, while it will be false if users close the dialog directly.
                if(result) {
                    $( ".form" ).submit();
                }
            }
        });

	}
});
</script>