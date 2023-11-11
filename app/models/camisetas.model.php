<?php
require_once 'model.php';

class CamisetasModel extends Model
{
  protected $db;

  function getcamisetas()
  {
    $query = $this->db->prepare('SELECT * FROM camisetas JOIN decadas ON camisetas.id_decada=decadas.id_decada  ');
    $query->execute();

    $camisetas = $query->fetchAll(PDO::FETCH_OBJ);
    return $camisetas;
  }

  function getCamisetasOrder($params)
  {

    $sql = 'SELECT * FROM camisetas JOIN decadas ON camisetas.id_decada=decadas.id_decada  ';

    if (isset($params['order'])) {
      $sql .= ' ORDER BY ' . $params['order'];
    }
    if (isset($params['sort'])) {
      $sql .= '  ' . $params['sort'];
    }
    $query = $this->db->prepare($sql);
    $query->execute();
    $camisetas = $query->fetchAll(PDO::FETCH_OBJ);
    return $camisetas;
  }


  function getCamisetaById($id)
  {
    $query = $this->db->prepare('SELECT * FROM camisetas JOIN decadas ON camisetas.id_decada=decadas.id_decada WHERE camisetas.id=?');
    $query->execute([$id]);

    $camiseta = $query->fetchAll(PDO::FETCH_OBJ);
    return $camiseta;
  }

  function updateCamisetasData($nombre_equipo, $categoria_camiseta, $tipo_camiseta, $imagen, $id_decada, $id)
  {

    $query = $this->db->prepare('UPDATE camisetas SET nombre_equipo=?, categoria_camiseta=?, tipo_camiseta=?,imagen=?, id_decada=?  WHERE camisetas.id=?');
    $query->execute([$nombre_equipo, $categoria_camiseta, $tipo_camiseta, $imagen, $id_decada, $id]);
  }



  public function createCamisetas($nombre_equipo, $categoria_camiseta, $tipo_camiseta, $imagen, $id_decada)
  {
    $query = $this->db->prepare('INSERT INTO camisetas (nombre_equipo, categoria_camiseta, tipo_camiseta, imagen, id_decada) VALUES (?, ?, ?, ?, ?)');
    $query->execute([$nombre_equipo, $categoria_camiseta, $tipo_camiseta, $imagen, $id_decada]);
  }
}
