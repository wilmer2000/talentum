<?php

	include '../lib/conexion.php';

	$nombre = $_POST['categoria'];
	if (isset($_POST['img'])){
			$img = $_POST['img'];
		}else{
			$img="";
		}

	if ($nombre == "") 
	{
		?>

		<h2>Favor ingrese todos los datos</h2><br>
		<a href="menu.html.php">Volver</a>

		<?php
	}else
	if ($img == ""){
		try {

			$sql = 'UPDATE categoria SET
			nombre = :nombre WHERE
			id = :id';

			$s = $pdo->prepare($sql);
			$s->bindValue(':nombre',$nombre);
			$s->bindValue(':id',$_POST['id']);
			$s->execute();
					
		} catch (PDOException $e) {
			
			echo "Error al Modificar";
			exit();
		}

		?>	

		<h2>Categoria Modificada</h2><br>
		<a href="menu.html.php">Volver</a>

		<?php 

	}else
	{
		try {

			$sql = 'UPDATE categoria SET
			nombre = :nombre,
			img = :img WHERE
			id = :id';

			$s = $pdo->prepare($sql);
			$s->bindValue(':nombre',$nombre);
			$s->bindValue(':img',$img);
			$s->bindValue(':id',$_POST['id']);
			$s->execute();
					
		} catch (PDOException $e) {
			
			echo "Error al Modificar";
			exit();
		}

		?>	

		<h2>Categoria Modificada</h2><br>
		<a href="menu.html.php">Volver</a>

		<?php 
	}

?>