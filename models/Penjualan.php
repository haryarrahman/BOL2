<?php 
  class Penjualan {
    private $IdPelanggan;
    private $JumlahPenjualan;
    private $HargaJual;

    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setIdPelanggan($idPelanggan) {
      $this->IdPelanggan = $idPelanggan;
    }

    function setJumlahPenjualan($jumlahPenjualan) {
      $this->JumlahPenjualan = $JumlahPenjualan;
    }

    function setHargaJual($hargaJual) {
      $this->HargaJual = $hargaJual;
    }
    
    function getIdPelanggan() {
      return $IdPelanggan;
    }
    
    function getJumlahPenjualan() {
      return $JumlahPenjualan;
    }

    function getHargaJual() {
      return $HargaJual;
    }


    function CreatePenjualan() {
      try {
        $query = "INSERT INTO penjualan(`id_pelanggan`, `jumlah_penjualan`, `harga_Jual`) VALUES (?, ?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $createPenjualan = $prepareDB->execute([$this->$IdPelanggan, $this->JumlahPenjualan, $this->HargaJual]);
        
        return $createPenjualan;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function GetListPenjualan() {
      $query = "SELECT * FROM penjualan ORDER BY id_pelanggan ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $listPenjualan = $prepareDB->fetchAll();
      
      return $listPenjualan;
    }

    function FindPenjualanById($id) {
      try {
        $query = "SELECT * FROM penjualan WHERE id_penjualan = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$id]);
        $findPenjualanById = $prepareDB->fetchAll();

        return $findPenjualanById;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function DeletePenjualan($id) {
      try {
        $query = "DELETE FROM penjualan WHERE id_penjualan = ?";
        $prepareDB = $this->conn->prepare($query);
        $deletePenjualan = $prepareDB->execute([$id]);

        return $deletePenjualan;
      } catch (Exception $e) {
      throw $e;
      }
    }
  }

?>