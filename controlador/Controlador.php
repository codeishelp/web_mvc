<?php
require_once 'C:/xampp/htdocs/mvc/modelo/Modelo.php';

class Controlador
{
  private $model;

  public function __construct()
  {
    $this->model = new Modelo();
  }

  public function mostrar()
  {
    $productos = $this->model->mostrar();
    return $productos;
  }
  public function mostrarById($id)
  {
    $producto = $this->model->mostrarById($id);
    return $producto;
  }

  public function insertar()
  {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    $this->model->insertar($nombre, $precio);
    header('Location: ./index.php');
  }

  public function actualizar()
  {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $id = $_POST['id'];

    $this->model->actualizar($id, $nombre, $precio);
    header('Location: ./index.php');
  }

  public function eliminar($id)
  {
    $this->model->eliminar($id);
    header('Location: ./index.php');
  }

  // Redireccion a rutas
  public function nuevo()
  {
    header('Location: ./insertar.php');
  }
  public function editar($id)
  {
    header('Location: ./editar.php?id=' . $id);
  }
}
