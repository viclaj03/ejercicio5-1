<?php  ?>

<html lang="es">
<body>
<h1>Juego del calamar</h1>
<h3><?=8?></h3>
<h1>Intentos <?=$_SESSION['intentos']?></h1>
<p> <?= $_SESSION['ofegat']->render() ?></p>
<form method="post" action="juego.php">
    <label for="respuesta">introduce una letra</label>
    <input name="respuesta"  type="text" id="respuesta">
</form>
<p>Letras usadas: <?=implode(',',($_SESSION['ofegat']->getLetters())) ?> </p>
</body>
</html>
