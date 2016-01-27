<?php echo form_open('/cursos/recibirdatos');?>
<?php 
	$nombre =array('name'=>'nombre',
		'placeholder'=>'escribe tu nombre');

		$videos =array('name'=>'videos',
		'placeholder'=>'escribe tu video');
?>
<?php echo form_label('Nombre=','nombre')?>
<?php echo form_input($nombre)?>
<?php echo form_label('Numero video=','video')?>
<?php echo form_input($videos)?>


<?php echo form_submit('','Subir curso')?>
<?php echo form_close()?>

</body>
</html>