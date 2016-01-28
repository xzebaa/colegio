<?php if($cursos){
		foreach ($cursos ->result() as $curso)
		{?> 
		
			<ul>
				<li><a href="<?php echo $curso->idCurso; ?>"><?php echo $curso->nombreCUrso; ?></a></li>
			</ul>
		
		<?php }
	}else{

		echo "<p>error en la aplicacion</p>";
		} ?>
</body>
</html>