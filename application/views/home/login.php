<div class="container-fluid">
<div class="row">

<div class="col-md-4">
				<div class="loginmodal-container">
					<h1>Ingreso</h1><br>
				 <?php echo form_open('ingreso',array('id' => 'formLogin'));?>
					<input type="text" name="user" placeholder="RUT">
					<?php echo  validation_errors();?><!--mostrar los errores de validación-->
					<input type="submit" name="login" class="login loginmodal-submit" value="Ingresar">
				  <?php echo form_close()?>
					
				  <div class="login-help">

				  </div>
				</div>
</div>
<div class="col-md-7">

<div class="panel panel-success">
 <div class="panel-heading">Instrucciones</div>
  <div class="panel-body">
 En esta área puedes consultar un alumno para verificar si posee una inscripción.</br></br>
-Debes ingresar el Rut sin puntos ni guion, si el número verificador es K remplazarlo por un cero (0).</br>
 <STRONG>Ejemplo</STRONG> </br>
Si el RUT es 12.345.678-9   ingresar 123456789</br>
Si el RUT es 12.345.678-K   ingresar 123456780
  </div>
</div>
</div>
</div>
</div>

<link rel="stylesheet" href="<?php echo base_url("assets/css/login.css"); ?>" />

<script type="text/javascript">
		$(document).ready(function(){
			$("#formLogin").submit(function(){
				$.ajax({
					url: $(this).attr("action"),
					type: $(this).attr("method"),
					data: $(this).serialize(),
					beforeSend:function(){
						$(".loader").show();
					},
                    success:function(data){
                        //alert(data);

                    }
				});

			});
			return false;
		});
</script>