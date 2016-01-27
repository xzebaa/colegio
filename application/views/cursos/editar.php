<?php echo form_open('/cursos/actualizar/'.$segmento);?>
<?php 
	$nombre =array('name'=>'nombre',
		'placeholder'=>'escribe tu nombre',
		'value'=>$cursos->result()[0]->nombreCUrso
		);

		$videos =array('name'=>'videos',
		'placeholder'=>'escribe tu video',
		'value'=>$cursos->result()[0]->videosCursos
		);
?>
<?php echo form_label('Nombre=','nombre')?>
<?php echo form_input($nombre)?>
<?php echo form_label('Numero video=','video')?>
<?php echo form_input($videos)?>


<?php echo form_submit('','Actualizar')?>
<?php echo form_close()?>

</body>
</html>