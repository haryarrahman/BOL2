<?php 
  class Pembelian {
    private $IdSupplier;
    private $JumlahPembelian;
    private $HargaBeli;

    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setIdSupplier($idSupplier) {
      $this->IdSupplier = $idSupplier;
    }

    function setJumlahPembelian($jumlahPembelian) {
      $this->JumlahPembelian = $JumlahPembelian;
    }

    function setHargaBeli($hargaBeli) {
      $this->HargaBeli = $hargaBeli;
    }
    
    function getIdSupplier() {
      return $IdSupplier;
    }
    
    function getJumlahPembelian() {
      return $JumlahPembelian;
    }

    function getHargaBeli() {
      return $HargaBeli;
    }

    function CreatePembelian() {
      try {
        $query = "INSERT INTO pembelian(`id_supplier`, `jumlah_pembelian`, `harga_beli`) VALUES (?, ?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $createPembelian = $prepareDB->execute([$this->$IdSupplier, $this->JumlahPembelian, $this->HargaBeli]);
        
        return $createPembelian;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function GetListPembelian() {
      $query = "SELECT * FROM pembelian ORDER BY id_supplier ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $listPembelian = $prepareDB->fetchAll();
      
      return $listPembelian;
    }

    function FindPembelianById($id) {
      try {
        $query = "SELECT * FROM pembelian WHERE id_pembelian = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$id]);
        $findPembelianById = $prepareDB->fetchAll();

        return $findPembelianById;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function DeletePembelian($id) {
      try {
        $query = "DELETE FROM pembelian WHERE id_pembelian = ?";
        $prepareDB = $this->conn->prepare($query);
        $deletePembelian = $prepareDB->execute([$id]);

        return $deletePembelian;
      } catch (Exception $e) {
      throw $e;
      }
    }
  }

?>