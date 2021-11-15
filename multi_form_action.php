<?php
include('header.php');
include_once("conexionDb.php");
?>

<div class="container">

	<div class="row well alert alert-success">
		<?php

		function validar($dato)
		{
			echo $dato;
			$result = "";
			if (isset($dato) and !empty($dato)) {
				$result = $dato;
			} else {
				if (is_Numeric($dato)) {
					$result = 0;
				} else if (is_String($dato)) {
					$result = "";
				}else{
					$result = "";
				}
			}
			return $result;
		};

		if (isset($_POST['submit'])) {
			$update = false;
			$iduser = 1;
			$usuario = validar($_POST["usuario"]);
			$apellido = validar($_POST["apellido"]);
			$fechanacimiento = validar($_POST["fechanacimiento"]);
			$dni = validar($_POST["dni"]);
			$genero = validar($_POST["genero"]);
			echo "aaaaaaaaaaaa" . $_POST["genero"];

			$discapacidades = validar($_POST["discapacidades"]);
			$ecivil = validar($_POST["ecivil"]);
			$correo =  validar($_POST["email"]);
			$contacto = validar($_POST["contacto"]);
			$codpostal = validar($_POST["codpostal"]);
			$domicilio = validar($_POST["domicilio"]);
			$localidad = validar($_POST["localidad"]);
			$departamento = validar($_POST["departamento"]);
			$provincia = validar($_POST["provincia"]);
			$idpais = validar($_POST["pais"]);
			$cursos = validar($_POST["cursos"]);

			if (isset($_FILES["pdf"])) {
				$pdf = $_FILES['pdf']['name'];
				$temp = $_FILES['pdf']['tmp_name'];
				move_uploaded_file($temp, 'cv/' . $pdf);
			} else {
				$pdf = NULL;
			}
			$licencia = validar($_POST["licencia"]);
			$auto = validar($_POST["auto"]);
			$situacionlab = validar($_POST["slaboral"]);
			$area = validar($_POST["area"]);
			$salariomin	= validar($_POST["sma"]);
			$dispoviajar = validar($_POST["dv"]);
			$dispomuda = validar($_POST["dcr"]);
			$progs = validar($_POST["progs"]);
			$niveledu = validar($_POST["neducativo"]);
			$puestodeseado = validar($_POST["pdeseado"]);

			//no recibe foto con metodo $_FILES
			if (isset($_POST["foto"])) {
				/*
				echo "entroo" ;
				$b = 1;*/
				$foto = $_POST['foto'];/*
				echo $foto;
				echo $foto['name'];
				$temp = $_POST['foto']['tmp_name'];
				move_uploaded_file($temp, 'images/' . $foto);
				*/
			} else {
				$foto = NULL;
			}

			

			/*INSERT INTO `usuario`(`iduser`, `usuario`, `apellido`, `fechanacimiento`, `dni`, `genero`, `discapacidades`, `ecivil`, `correo`, `contacto`, `codpostal`, `domicilio`, `localidad`, `departamento`, `provincia`, `idpais`, `idlog`, `lastlogin`, `cursos`, `pdf`, `licencia`, `auto`, `situacionlab`, `area`, `salariomin`, `dispoviajar`, `dispomuda`, `progs`, `foto`, `niveledu`, `puestodeseado`)*/

			if (mysqli_query($conexion, "INSERT INTO `usuario`(`usuario`, `apellido`, `fechanacimiento`, `dni`, `genero`, `discapacidades`, `ecivil`, `correo`, `contacto`, `codpostal`, `domicilio`, `localidad`, `departamento`, `provincia`, `idpais`, `cursos`, `pdf`, `licencia`, `auto`, `situacionlab`, `area`, `salariomin`, `dispoviajar`, `dispomuda`, `progs`, `foto`, `niveledu`, `puestodeseado`) 
			VALUES ('$usuario', '$apellido', '$fechanacimiento', '$dni', '$genero','$discapacidades','$ecivil','$correo','$contacto','$codpostal','$domicilio', '$localidad', '$departamento', '$provincia', '$idpais','$cursos','$pdf','$licencia','$auto','$situacionlab', '$area', '$salariomin','$dispoviajar','$dispomuda','$progs','$foto','$niveledu','$puestodeseado')")) {
				echo "You're Registered Successfully!";
			} else {
				echo "Error in registering...Please try again later!";
			}
		}
		?>
	</div>

</div>