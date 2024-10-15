<?php
require_once 'C:/xampp/htdocs/mvc/controlador/Controlador.php';
$controlador = new Controlador();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'] ?? '';
  $producto = $controlador->mostrarById($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $controlador->actualizar();
}

?>

<form action="editar.php" method="POST">
  <h1>ACTUALIZAR PRODUCTO</h1>
  <input type="hidden" name="id" value="<?php echo $producto['id'] ?>">
  <input type="text" name="nombre" value="<?php echo $producto['nombre'] ?>">
  <input type="number" name="precio" value="<?php echo $producto['precio'] ?>">
  <input type="submit" value="actualizar">
</form>