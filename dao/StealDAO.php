<?php

require_once( __DIR__ . '/DAO.php');

class StealDAO extends DAO {
    public function selectAllCrimes(){
    $sql = "SELECT * FROM `crimes`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectLastCrime(){
    $sql = "SELECT * FROM `crimes` getLastRecord ORDER BY id DESC LIMIT 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectCrimeByID($id){
    $sql = "SELECT * FROM `crimes` WHERE `id`=:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectItemByID($id)
  {
    $sql = "SELECT * FROM `suplies` WHERE `id`=:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectSupliesByCrimeID($crimeid){
    $sql = "SELECT * FROM `suplies` WHERE `crime_id`=:crime_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':crime_id', $crimeid);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function createCrime($data){
    //controleren of er data ontbreekt of foutief is
    $errors = $this->validate($data);
    //indien alles ok toevoegen in tabel
    if (empty($errors)) {
      $sql = "INSERT INTO `crimes` (name, type, subtype, transportation, date, loot, chanceofsucces) VALUES(:name, :type, :subtype, :transportation, :date, :loot, :chanceofsucces)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':name', $data['name']);
      $stmt->bindValue(':type', $data['type']);
      $stmt->bindValue(':subtype', $data['subtype']);
      $stmt->bindValue(':transportation', $data['transportation']);
      $stmt->bindValue(':date', $data['date']);
      $stmt->bindValue(':loot', $data['loot']);
      $stmt->bindValue(':chanceofsucces', $data['chanceofsucces']);
      if ($stmt->execute()) {
        $lastId = $this->pdo->lastInsertId();
        return $this->selectCrimeByID($lastId);
      }
    }
  }

  public function createItems($dataTwo)
  {
    //controleren of er data ontbreekt of foutief is

    //indien alles ok toevoegen in tabel
    if (empty($errors)) {
      $sql = "INSERT INTO `suplies` (crime_id, suplies) VALUES(:crime_id, :suplies)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':crime_id', $dataTwo['crime_id']);
      $stmt->bindValue(':suplies', $dataTwo['suplies']);
      if ($stmt->execute()) {
        $lastId = $this->pdo->lastInsertId();
        return $this->selectItemByID($lastId);
      }
    }
  }




  //valideren van de input
 public function validate($data)
  {
    $errors = [];

    if (empty($data['name'])) {
      $errors['name'] = 'Please give your picture a name';
    }
    if (empty($data['type'])) {
      $errors['type'] = 'Please give your picture some context';
    }
    if (empty($data['subtype'])) {
      $errors['subtype'] = 'Please upload a picture';
    }
    if (empty($data['transportation'])) {
      $errors['transportation'] = 'Please upload a picture';
    }
    if (empty($data['date'])) {
      $errors['date'] = 'Please upload a picture';
    }
    if (empty($data['loot'])) {
      $errors['loot'] = 'Please upload a picture';
    }
    if (empty($data['chanceofsucces'])) {
      $errors['chanceofsucces'] = 'Please upload a picture';
    }
    return $errors;
  }
}

