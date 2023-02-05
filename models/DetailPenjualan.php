<?php 
  class DetailPenjualan {
    private $IdPenjualan;
    private $IdBarang;

    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setIdPenjualan($idPenjualan) {
      $this->IdPenjualan = $idPenjualan;
    }

    function setIdBarang($IdBarang) {
      $this->IdBarang = $IdBarang;
    }

    function getIdPenjualan() {
      return $IdPenjualan;
    }

    function getIdBarang() {
      return $IdBarang;
    }

    function CreateDetailPenjualan() {
      try {
        $query = "INSERT INTO detail_penjualan(`id_penjualan`, `id_barang`) VALUES (?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $createDetailPenjualan = $prepareDB->execute([$this->$IdPenjualan, $this->IdBarang]);
        
        return $createDetailPenjualan;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function GetListDetailPenjualan() {
      $query = "SELECT * FROM detail_penjualan ORDER BY id_penjualan ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $listDetailPenjualan = $prepareDB->fetchAll();
      
      return $listDetailPenjualan;
    }

    function FindDetailPenjualanById($id) {
      try {
        $query = "SELECT * FROM detail_penjualan WHERE id_detail_penjualan = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$id]);
        $findDetailPenjualanById = $prepareDB->fetchAll();

        return $findDetailPenjualanById;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function DeleteDetailPenjualan($id) {
      try {
        $query = "DELETE FROM detail_penjualan WHERE id_detail_penjualan = ?";
        $prepareDB = $this->conn->prepare($query);
        $deleteDetailPenjualan = $prepareDB->execute([$id]);

        return $deleteDetailPenjualan;
      } catch (Exception $e) {
      throw $e;
      }
    }
  }
?>