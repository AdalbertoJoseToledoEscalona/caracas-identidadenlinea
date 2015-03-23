<script type="text/javascript">
	function open() {
		document.getElementById("listadoc").style.display="";
	}

	function close() {
		document.getElementById("listadoc").style.display="none";
	}
</script>

<div class="cont-doc">
	<!-- BÚSQUEDA CON LA CI -->
	<form class="form-ci" action="" method="post" name="form">
		<select>
			<option>Nacionalidad</option>
			<option>Venezuela</option>
			<option>Argentina</option>
			<option>Brasil</option>
		</select>
		
		<input class="campo-buscar" type="text" name="" placeholder="Ingrese la cédula de identidad del cliente">
		
		<button><span class="icon-search"></span>Buscar</button>
	</form>

	<!-- RESULTADOS TIPO TWITTER -->
		<div class="box-user">
			<img src="img/img-jorge.jpg">
			<p>
				<strong class="name-user">Jorge Luis García Gómez</strong>
				<br>
				<span class="icon-copy"></span>Cantidad de documentos: <b>20</b>
			</p>
			<a href="javascript:open()">Ver documentos</a>

			<!-- LISTA -->
				<form class="lista" action="" method="post" id="listadoc" name="listadoc" style="display:none">
					<div>
						<input type="checkbox">
						<p>123434567890 cedula de identidad</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 partida de nacimiento</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 pasaporte</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 nombre del archivo que cargo el usuario.extension</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 nombre del archivo que cargo el usuario.extension</p>
					</div>

					<a href="javascript:close()"><span class="icon-cross"></span>Cerrar</a>
					<button><span class="icon-mobile"></span>Enviar código</button>
				</form>
		</div>

		<div class="box-user">
			<img src="img/img-oscar.jpg">
			<p>
				<strong class="name-user">Oscar Arocha Osito</strong>
				<br>
				<span class="icon-copy"></span>Cantidad de documentos: <b>20</b>
			</p>
			<a href="">Ver documentos</a>

			<!-- LISTA -->
				<form class="lista" action="" method="post" id="listadoc" name="listadoc" style="display:none">
					<div>
						<input type="checkbox">
						<p>123434567890 cedula de identidad</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 partida de nacimiento</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 pasaporte</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 nombre del archivo que cargo el usuario.extension</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 nombre del archivo que cargo el usuario.extension</p>
					</div>

					<a href="javascript:close()"><span class="icon-cross"></span>Cerrar</a>
					<button><span class="icon-mobile"></span>Enviar código</button>
				</form>
		</div>

		<div class="box-user">
			<img src="img/img-rossana.jpg">
			<p>
				<strong class="name-user">Rossana Mejias Mis Simpatía</strong>
				<br>
				<span class="icon-copy"></span>Cantidad de documentos: <b>20</b>
			</p>
			<a href="">Ver documentos</a>

			<!-- LISTA -->
				<form class="lista" action="" method="post" id="listadoc" name="listadoc" style="display:none">
					<div>
						<input type="checkbox">
						<p>123434567890 cedula de identidad</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 partida de nacimiento</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 pasaporte</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 nombre del archivo que cargo el usuario.extension</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 nombre del archivo que cargo el usuario.extension</p>
					</div>

					<a href="javascript:close()"><span class="icon-cross"></span>Cerrar</a>
					<button><span class="icon-mobile"></span>Enviar código</button>
				</form>
		</div>

		<div class="box-user">
			<img src="img/img-douglas.jpg">
			<p>
				<strong class="name-user">Douglas Bautista Disque Periodista</strong>
				<br>
				<span class="icon-copy"></span>Cantidad de documentos: <b>20</b>
			</p>
			<a href="">Ver documentos</a>

			<!-- LISTA -->
				<form class="lista" action="" method="post" id="listadoc" name="listadoc" style="display:none">
					<div>
						<input type="checkbox">
						<p>123434567890 cedula de identidad</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 partida de nacimiento</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 pasaporte</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 nombre del archivo que cargo el usuario.extension</p>
					</div>

					<div>
						<input type="checkbox">
						<p>123434567890 nombre del archivo que cargo el usuario.extension</p>
					</div>

					<a href="javascript:close()"><span class="icon-cross"></span>Cerrar</a>
					<button><span class="icon-mobile"></span>Enviar código</button>
				</form>
		</div>

	<!-- PAGINACIÓN -->
	<nav class="paginas">
		<ul>
			<li><a href=""><-Primera hoja</a></li>
			<li><a href=""><< Anterior</a></li>
			<li><a href="">1</a></li>
			<li><a href="">2</a></li>
			<li><a href="">3</a></li>
			<li><a href="">Siguiente >></a></li>
			<li><a href="">Última hoja -></a></li>
		</ul>
	</nav>
</div>
