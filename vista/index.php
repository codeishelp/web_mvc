<?php
require_once 'C:/xampp/htdocs/mvc/controlador/Controlador.php';
$controlador = new Controlador();

$productos = $controlador->mostrar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MVC</title>
</head>

<body>


  <div>
    <h1>MVC CRUD</h1>

    <br>

    <a href="index.php?action=insertar">
      Insertar
    </a>

    <br>
    <table>
      <thead>
        <td>Id</td>
        <td>Nombre</td>
        <td>Precio</td>
        <td>Opcion</td>
      </thead>
      <tbody>
        <?php foreach ($productos as $producto): ?>
          <tr>
            <td><?php echo $producto['id'] ?></td>
            <td><?php echo $producto['nombre'] ?></td>
            <td><?php echo $producto['precio'] ?></td>
            <td>
              <a href="index.php?action=editar&id=<?php echo $producto['id'] ?>">Editar</a>
              <a href="index.php?action=eliminar&id=<?php echo $producto['id'] ?>">Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $action = $_GET['action'] ?? '';
  $id = $_GET['id'] ?? '';

  if ($action == 'insertar') {
    echo 'Quiero insertar';
    $controlador->nuevo();
  }
  if ($action == 'editar') {
    echo 'Quiero editar';
    $controlador->editar($id);
  }
  if ($action == 'eliminar') {
    echo 'Quiero eliminar';
    $controlador->eliminar($id);
  }

  echo "principal";
}

?>