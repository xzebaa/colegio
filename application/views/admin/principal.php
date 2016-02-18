<div class="container-fluid">
	<div class="row">
		<div></div>
		<div id="contMenu"  class="col-md-2">
				
<div class="list-group">
  <a href="#Talleres" id="talle" class="list-group-item">
    <h4 class="list-group-item-heading">Talleres</h4>
    <p class="list-group-item-text">Informacion sobre cupos, lista espera, inscritos</p>
  </a>

  <a href="#Alumnos" id="alum" class="list-group-item">
    <h4 class="list-group-item-heading">Alumnos</h4>
    <p class="list-group-item-text">consulta de estado del alumno por rut.</p>
  </a>

</div>


		</div>
		<div id="contDinamico" class="col-md-10"></div>
	</div>
</div>
<script type="text/javascript">

$( "#talle" ).click(function() {
      var resp = ajax_({},'<?php echo base_url("admin/PRINCIPAL/OBTENTALLERES");?>');
    if(resp!=0){
       $( "#contDinamico" ).html(resp);
       $("a").removeClass( "active" );
       $(this).addClass( "active" );
     }
});

$( "#alum" ).click(function() {
      var resp = ajax_({},'<?php echo base_url("admin/PRINCIPAL/OBTENTALLERES");?>');
    if(resp!=0){
       $( "#contDinamico" ).html(resp);
       $("a").removeClass( "active" );
       $(this).addClass( "active" );
     }
});

    

</script>