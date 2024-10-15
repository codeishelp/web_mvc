<?php
class Modelo
{
  private $db;
  private $productos;

  public function __construct()
  {
    try {
      $this->db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
      echo 'Conexion exitosa';
    } catch (PDOException $e) {
      echo 'Error de conexion' . $e->getMessage();
    }
  }

  public function insertar($nombre, $precio)
  {
    $sql = 'INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':precio', $precio);
    $stmt->execute();
  }

  public function mostrar()
  {
    $sql = 'SELECT * FROM productos';
    foreach ($this->db->query($sql) as $row) {
      $this->productos[] = $row;
    }
    return $this->productos;
  }

  public function eliminar($id)
  {
    $sql = 'DELETE FROM productos WHERE id = :id';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }

  public function mostrarById($id)
  {
    $sql = 'SELECT * FROM productos WHERE id = :id';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    return $producto;
  }

  public function actualizar($id, $nombre, $precio)
  {
    $sql = 'UPDATE productos SET nombre = :nombre, precio = :precio WHERE id = :id';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
}

// $model = new Modelo();
// $model->mostrar();
