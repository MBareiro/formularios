<?php
include('header.php');
include('conexionDb.php')
?>
<title>phpzag.com : Demo Multi Step Form using jQuery, Bootstrap and PHP</title>
<script type="text/javascript" src="script/form.js"></script>
<script type="text/javascript" src="app.js"></script>

<style type="text/css">
	#register_form fieldset:not(:first-of-type) {
		display: none;
	}
</style>

<div class="container">
	<br>
	<h2 align="center">Informacion del usuario:</h2>

	<div class="progress">
		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
	</div>

	<div class="alert alert-success hide"></div>


	<form enctype="multipart/form-data" id="register_form" novalidate action="multi_form_action.php"  method="post">
		<!-- ----------------------------------------------------------------------------------------------------------------------------->
		<fieldset>

			<h2>Datos personales:</h2>

			<div class="form-group">
				<label for="usuario">Nombre:</label>
				<input type="text" class="form-control" name="usuario" value="">
			</div>

			<div class="form-group">
				<label for="apellido">Apellido:</label>
				<input type="text" class="form-control" name="apellido" value="">
			</div>

			<div class="form-group">
				<label for="email">Email address*</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="Email">
			</div>

			<div class="form-group">
				<label for="dni">Numero documento:</label>
				<input type="text" class="form-control" name="dni">
			</div>

			<div class="form-group">
				<label for="fechanacimiento">Fecha de nacimiento:</label>
				<input type="date" class="form-control" name="fechanacimiento" value="" min="1900/01/01" max="<?php echo date('Y-m-d') ?>">
			</div>


			<div class="form-group">
				<label for="genero">Genero:</label>
				<input type="radio" name="genero" value="mujer">Mujer
				<input type="radio" name="genero" value="hombre">Hombre
				<input type="radio" name="genero" value="otro">Otro
			</div>

			<div class="form-group">
				<label for="ecivil">Estado civil:</label>
				<select id="ecivil" name="ecivil" value="">
					<option value=""></option>
					<option value="Soltero">Soltero</option>
					<option value="Casado">Casado</option>
				</select>
			</div>

			<div class="form-group">
				<label for="contacto">Telefono:</label>
				<input type="tel" class="form-control" name="contacto" value="">
			</div>

			<table>
				<tr>
					<th>Localidad</th>
				</tr>
				<tr>
					<td>
						<select name="localidad" class="form-control">
							<?php
							include 'db_connect.php';
							$sql = "SELECT * FROM localidad";
							$lista = mysqli_query($conexion, $sql);
							while ($fila = $lista->fetch_assoc()) {
								$localidad = $fila['idloc'];
								$nombre = $fila['localidad'];
								echo "<option value=$localidad>$nombre</option>";
							}
							?>
						</select>
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<th>Departamento</th>
				</tr>
				<tr>
					<td>
						<select name="departamento" class="form-control">
							<?php
							include 'db_connect.php';
							$sql = "SELECT * FROM departamento";
							$lista = mysqli_query($conexion, $sql);
							while ($fila = $lista->fetch_assoc()) {
								$id = $fila['idep'];
								$nombre = $fila['departamento'];
								echo "<option value=$id>$nombre</option>";
							}
							?>
						</select>
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<th>Provincia</th>
				</tr>
				<tr>
					<td>
						<select name="provincia" class="form-control">
							<?php
							include 'db_connect.php';
							$sql = "SELECT * FROM provincia";
							$lista = mysqli_query($conexion, $sql);
							while ($fila = $lista->fetch_assoc()) {
								$id = $fila['idpro'];
								$nombre = $fila['provincia'];
								echo "<option value=$id>$nombre</option>";
							}
							?>
						</select>
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<th>Paises</th>
				</tr>
				<tr>
					<td>
						<select name="pais" class="form-control">
							<?php
							include 'db_connect.php';
							$sql = "SELECT * FROM pais";
							$lista = mysqli_query($conexion, $sql);
							while ($fila = $lista->fetch_assoc()) {
								$idpais = $fila['idpais'];
								$nombre = $fila['pais'];
								echo "<option value = $idpais >$nombre</option>";
							}
							?>
						</select>
					</td>
				</tr>
			</table>

			<div class="form-group">
				<label for="codpostal"> Codigo postal:</label>
				<input type="number" class="form-control" name="codpostal" value="">
			</div>
			<div class="form-group">
				<label for="domicilio">Direccion:</label>
				<input type="text" class="form-control" name="domicilio" value="">
			</div>
			<div class="form-group">
				<label for="licencia">Licencia de conducir:</label>
				<input type="radio" name="licencia" value="2" id="licsi" onclick="vehiculo()">Si
				<input type="radio" name="licencia" value="1" onclick="vehiculo()">No
			</div>

			<div id="auto" class="form-group" style="display:none">
				<label for="auto">Dispone de vehiculo propio:</label>
				<input id="vsi" type="radio" name="auto" value="2">Si
				<input id="vno" type="radio" name="auto" value="1">No
			</div>

			<div class="form-group">
				<label for="disc">Discapacidad:</label>
				<input id="discsi" type="radio" name="disc" value="si" onclick="mostrar()">Si
				<input type="radio" name="disc" value="no" onclick="mostrar()">No
			</div>

			<div id="disc" class="form-group" style="display:none">
				<label for="discapacidades">Especifique su discapacidad:</label>
				<textarea id="discapacidades" name="discapacidades" rows="5" cols="40" value=""></textarea>
			</div>


			<div class="form-group">
				<label for="foto">Sube tu foto:</label>
				<input type="file" name="foto" accept="image/*" class="form-control" id="foto"><br>
			</div>

			<div class="form-group">
				<label for="pdf">CV: </label>
				<input type="hidden" name="MAX_FILE_SIZE" value="512000000" />
				<input type="file" id="pdf" class="form-control" name="pdf" accept="aplicaction/pdf">
			</div>



			<input type="button" class="next-form btn btn-info" value="Next" />
		</fieldset>

		<!-- ----------------------------------------------------------------------------------------------------------------------------->

		<fieldset>
			<h2> Datos Academicos</h2>
			<div class="form-group">
				<label for="neducativo">Indicá tu nivel educativo alcanzado:</label><br>
				<input type="radio" name="neducativo" value="Terciario incompleto">Terciario incompleto<br>
				<input type="radio" name="neducativo" value="Terciario completo">Terciario completo<br>
				<input type="radio" name="neducativo" value="Universitario incompleto">Universitario incompleto<br>
				<input type="radio" name="neducativo" value="Universitario completo">Universitario completo<br><br>
			</div>

			<div class="form-group">
				<label for="cursos">Cursos realizados:</label>
				<textarea name="cursos" rows="5" cols="40" value="<?php echo $result['$cursos'] ?>"></textarea>
			</div>

			<input type="button" name="previous" class="previous-form btn btn-default" value="Previous" />
			<input type="button" name="next" class="next-form btn btn-info" value="Next" />
		</fieldset>
		<!-- ----------------------------------------------------------------------------------------------------------------------------->
		<fieldset>
			<h2> Conocimientos y habilidades</h2>

			<div class="form-group">
				<label for=""> Idiomas:</label>
				<input type="checkbox" name="idiomas[]" value="1">Español</input>
				<input type="checkbox" name="idiomas[]" value="2">Inglés</input>
				<input type="checkbox" name="idiomas[]" value="3">Francés</input>
				<input type="checkbox" name="idiomas[]" value="4">Alemán</input>
				<input type="checkbox" name="idiomas[]" value="5">Alemán</input>
				<input type="checkbox" name="idiomas[]" value="6">Otro</input>
			</div>

			<div class="form-group">
				<label for="progs">Que programas domina/conoce:</label>
				<textarea name="progs" rows="4" cols="40" value=""></textarea><br>
			</div>

			<input type="button" name="previous" class="previous-form btn btn-default" value="Previous" />
			<input type="button" name="next" class="next-form btn btn-info" value="Next" />
		</fieldset>
		<!-- ----------------------------------------------------------------------------------------------------------------------------->
		<fieldset>
			<h2> Preferencias laborales</h2>

			<div class="form-group">
				<label for="slaboral">Situacion actual:</label>
				<select id="slaboral" name="slaboral" value="">
					<option value=""></option>
					<option value=1>Disponible</option>
					<option value=0>Ocupado</option>
				</select>
			</div>

			<div class="form-group">
				<label for="pdeseado">Puesto de trabajo deseado:</label>
				<input type="text" name="pdeseado" value="">
			</div>
			<label for="">Area:</label>
			<input type="text" name="area" value="">

			<div class="form-group">
				<label for="sma">Salaro minimo aceptado:</label>
				<input type="number" name="sma" value="">
			</div>

			<div class="form-group">
				<label for="dcr">Disponibilidad para viajar:</label>
				<input type="radio" name="dv" value=2>Si
				<input type="radio" name="dv" value=1>No
			</div>

			<div class="form-group">
				<label for="dcr">Disponibilidad para cambio de residencia:</label>
				<input type="radio" name="dcr" value=2>Si
				<input type="radio" name="dcr" value=1>No
			</div>

			<input type="button" name="previous" class="previous-form btn btn-default" value="Previous" />
			<input type="submit" name="submit" class="submit btn btn-success" value="Submit" />
		</fieldset>

	</form>




</div>