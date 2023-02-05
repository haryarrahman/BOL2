<?php 
  class Supplier {
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

    function CreateSupplier() {
      try {
        $query = "INSERT INTO supplier(`id_pengguna`) VALUES (?)";
        $prepareDB = $this->conn->prepare($query);
        $createSupplier = $prepareDB->execute([$this->$IdPengguna]);
        
        return $createSupplier;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function GetListSupplier() {
      $query = "SELECT * FROM supplier ORDER BY id_pengguna ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $listSupplier = $prepareDB->fetchAll();
      
      return $listSupplier;
    }

    function FindSupplierById($id) {
      try {
        $query = "SELECT * FROM supplier WHERE id_supplier = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$id]);
        $findSupplierById = $prepareDB->fetchAll();

        return $findSupplierById;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function DeleteSupplier($id) {
      try {
        $query = "DELETE FROM supplier WHERE id_supplier = ?";
        $prepareDB = $this->conn->prepare($query);
        $deleteSupplier = $prepareDB->execute([$id]);

        return $deleteSupplier;
      } catch (Exception $e) {
      throw $e;
      }
    }
  }

?>