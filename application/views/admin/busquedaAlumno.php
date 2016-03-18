<div class="container-fluid">
<div class="row">

<div class="col-md-12">
	<div class="panel panel-info">
		<div class="panel-heading"><STRONG>Nota!</STRONG></div>
		<div class="panel-body">
			<div class="row">
-En esta área puedes consultar un alumno para verificar si posee una inscripción.</br>
-Debes ingresar el Rut sin puntos ni guion, si el número verificador es K remplazarlo por un cero (0).</br></br>

 <STRONG>Ejemplo</STRONG> </br>
Si el RUT es 12.345.678-9   ingresar 123456789</br>
Si el RUT es 12.345.678-K   ingresar 123456780
			</div>
		</div>
	</div>

			<div class="panel panel-primary">
			  <div class="panel-heading">Busqueda de alumnos por rut</div>
				  <div class="panel-body">

			<div class="row">
			
	<div class="col-lg-6">
    <div class="input-group">
      <input type="text" id="txtRut" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-default"id="btnBusq" type="button">Buscar</button>
      </span>
    </div>
  </div>
		
			</div>

						<div class="row">
			
	<div class="col-lg-12">
    <div id="resultBusqueda">
     
    </div>
  </div>
		
			</div>

				   
				  </div>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript">

$( "#btnBusq" ).click(function() {
     //alert(id);
     $( "#resultBusqueda" ).html("");
	var resp = ajax_({'rr':$("#txtRut").val()},'<?php echo base_url("admin/PRINCIPAL/busquedaAlumnRut");?>');
    if(resp!=0)
       $( "#resultBusqueda" ).html(resp);
   else
   	BootstrapDialog.show({
				            title: 'Ops!',
				            message: 'No tenemos registro de este alumno!'});
});


</script>