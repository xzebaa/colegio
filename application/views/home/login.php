<div class="container-fluid" id>
<div class="row">

<div class="col-md-4">
				<div class="loginmodal-container">
					<h1>Ingreso toma de talleres</h1><br>
				 <?php echo form_open('/login/login/ingreso',array('id' => 'formLogin'));?>
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
  <div class="panel-heading">Informacion Sobre toma de talleres</div>
  <div class="panel-body">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id leo at est cursus cursus sit amet at risus. Nulla facilisi. Mauris scelerisque leo non neque aliquam, venenatis faucibus mauris semper. Duis id lacus ac mauris tincidunt facilisis tincidunt nec purus. Sed a libero id metus tempus semper sed ut ante. Nunc pharetra nisl placerat mi blandit tincidunt. Aliquam congue vitae nisi at maximus. Quisque suscipit tellus quam, eu interdum nulla hendrerit non. Sed luctus dignissim nulla, ut iaculis magna faucibus et. Morbi consectetur, odio non feugiat cursus, elit ante dictum mi, condimentum pharetra leo magna eu mauris. Aenean consectetur aliquet dui non dapibus. Nulla pretium pharetra eros, quis pellentesque ex dignissim pellentesque.

Quisque posuere, dui at tempor posuere, diam turpis blandit lorem, nec interdum ligula metus id est. Proin id urna leo. Fusce suscipit, ipsum quis viverra cursus, urna lectus consequat nisi, laoreet dictum risus magna placerat arcu. Morbi.
  </div>
</div>
</div>
</div>
</div>

<link rel="stylesheet" href="<?php echo base_url("assets/css/login.css"); ?>" />

<script type="text/javascript">
		$(document).ready(function(){
			$("#formLogin").submit(function(){
				alert("ada");
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