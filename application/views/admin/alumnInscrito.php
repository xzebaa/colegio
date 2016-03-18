	<div class="table-responsive">          
				<table class="table">
					<thead>
					<tr>
							<th>RUT</th>
							<th>NOMBRE</th>
							<th>TALLER</th>
							<th>CURSO</th>
							<th>INSCRITO</th>
							<th>ESTADO</th>
						</tr>
						
					</thead>
					<tbody>
<?php if($talleres){

		foreach ($talleres ->result() as $taller)
		{?> 

						<tr >
							<td><?php ECHO $taller->RUT?></td>
							<td><?php ECHO $taller->NOMBRE?></td>
							<td><?php ECHO $taller->TALLER?></td>
							<td><?php ECHO $taller->CURSO?></td>
							<td><?php ECHO $taller->INSCRITO?></td>
							<td><?php ECHO $taller->ESTADO?></td>
							</td>

						</tr>
					
			<?php }
	}else{
		echo "<p>error en la aplicacion</p>";
		} ?>

		</tbody>
				</table>
			</div>