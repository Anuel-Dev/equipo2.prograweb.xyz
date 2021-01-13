	<nav>
		<?php
			if (isset($_SESSION["usrFirmado"])){
		?>
			<a id="menuInicio" href="resulLogin.php" class="menu">Inicio</a>
			<a id="menuMuebles" href="consultaJuegos.php" class="menu">Comprar</a>
			<a id="menuSalir" href="ctrlPhp/ctrlLogout.php" class="menu">Salir</a>
		<?php
			}else{
		?>
		<center>
			<a id="menuInicio" href="index.php" class="menu">Login</a>
			<a id="menuRegistro" href="registro.php" class="menu">Reg&iacute;strate</a>
			<a id="menuMuebles" href="consultaJuegos.php" class="menu">Plataformas</a>
        </center>
		<?php
			}
		?>
	</nav>