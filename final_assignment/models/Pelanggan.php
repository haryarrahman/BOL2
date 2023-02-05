<?php 
  class Pelanggan {
    private $IdPengguna;

    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setIdPengguna($idPengguna) {
      $this->IdPengguna = $idPengguna;
    }
    
    function getIdPengguna() {
      return $IdPengguna;
    }

    function CreatePelanggan() {
      try {
        $query = "INSERT INTO pelanggan(`id_pengguna`) VALUES (?)";
        $prepareDB = $this->conn->prepare($query);
        $createPelanggan = $prepareDB->execute([$this->$IdPengguna]);
        
        return $createPelanggan;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function GetListPelanggan() {
      $query = "SELECT * FROM pelanggan ORDER BY id_pengguna ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $listPelanggan = $prepareDB->fetchAll();
      
      return $listPelanggan;
    }

    function FindPelangganById($id) {
      try {
        $query = "SELECT * FROM pelanggan WHERE id_Pelanggan = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$id]);
        $findPelangganById = $prepareDB->fetchAll();

        return $findPelangganById;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function DeletePelanggan($id) {
      try {
        $query = "DELETE FROM pelanggan WHERE id_Pelanggan = ?";
        $prepareDB = $this->conn->prepare($query);
        $deletePelanggan = $prepareDB->execute([$id]);

        return $deletePelanggan;
      } catch (Exception $e) {
      throw $e;
      }
    }
  }

?>