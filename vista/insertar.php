<?php
require_once 'C:/xampp/htdocs/mvc/controlador/Controlador.php';
$controlador = new Controlador();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $controlador->insertar();
}

?>

<form action="insertar.php" method="POST">
  <h1>INSERTAR PRODUCTO</h1>
  <input type="text" name="nombre">
  <input type="number" name="precio">
  <input type="submit" value="Insertar">
</form>