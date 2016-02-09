<div>
<div id="certInsc" class="col-md-6 col-md-offset-3">
<div style="border:2px solid #004A21; width:615px; text-align:center;">
  <img src="<?php echo base_url("assets/img/baner.png"); ?>" alt=""><br>

  <div>
  Comprobante Inscripción de taller Colegio salesiano El Patrocino de San José 2016

  </div>
  <div>
<Strong> Datos de Inscripción</Strong>
</div>

  

  <?php if($inscripciones){

    foreach ($inscripciones ->result() as $inscripcion)
    {?> 
  <div   style="text-align:center;">
   <table  border="1" width="516" cellspacing="0" bordercolor="black" cellpadding="5" align="center">



        <tr><th>N° inscripcion</th><td><?php ECHO $inscripcion->REGISTRO?></td></tr>
        <tr><th>RUT</th><td><?php ECHO $inscripcion->RUT?></td></tr>
          <tr><th>Nombre</th><td><?php ECHO $inscripcion->NOMBRE?></td></tr>
          <tr><th>Curso</th><td><?php ECHO $inscripcion->CURSO?></td></tr>
          <tr><th>Taller</th><td><?php ECHO $inscripcion->TALLER?></td></tr>
          <tr><th>Estado</th><td><?php ECHO $inscripcion->ESTADO?></td></tr>
          <tr><th>Fecha Toma</th><td><?php ECHO $inscripcion->FECHA?></td></tr>
  </table>
  </div>
    <?php }
  }else{
    echo "<p>error en la aplicacion</p>";
    } ?>
  
  <div>
    *Te recomendamos guardar este comprobante
    <img width="30" height="30" src="<?php echo base_url("assets/img/check.png"); ?>" alt="">
  </div>

</div>
</div>

  <div class="col-md-6 col-md-offset-4">
    <a href="#" id="imprimir" style="margin-left: 38px;"><img src="<?php echo base_url("assets/img/boton-descargar-imprimir.png"); ?>" alt=""></a>
</div>
</div>
<script type="text/javascript">

// Create Base64 Object
var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}

// Define the string


/* Decode the String
var decodedString = Base64.decode(encodedString);
console.log(decodedString); // Outputs: "Hello World!"*/

$('#imprimir').click(function() {

window.open('<?php echo base_url("assets/PDF/TEMPL/certificado.php"); ?>?I='+Base64.encode('<?php ECHO $inscripcion->REGISTRO?>')+'&R='+Base64.encode('<?php ECHO $inscripcion->RUT?>')+'&N='+Base64.encode('<?php ECHO $inscripcion->NOMBRE?>')+'&C='+Base64.encode('<?php ECHO $inscripcion->CURSO?>')+'&T='+Base64.encode('<?php ECHO $inscripcion->TALLER?>')+'&E='+Base64.encode('<?php ECHO $inscripcion->ESTADO?>')+'&F='+Base64.encode('<?php ECHO $inscripcion->FECHA?>')+'&IM='+Base64.encode('<?php echo base_url("assets/img/baner.png"); ?>'),'_blank');
});
</script>
