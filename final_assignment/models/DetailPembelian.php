<?php 
  class DetailPembelian {
    private $IdPembelian;
    private $IdBarang;

    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setIdPembelian($idPembelian) {
      $this->IdPembelian = $idPembelian;
    }

    function setIdBarang($IdBarang) {
      $this->IdBarang = $IdBarang;
    }

    function getIdPembelian() {
      return $IdPembelian;
    }

    function getIdBarang() {
      return $IdBarang;
    }

    function CreateDetailPembelian() {
      try {
        $query = "INSERT INTO detail_pembelian(`id_pembelian`, `id_barang`) VALUES (?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $createDetailPembelian = $prepareDB->execute([$this->$IdPembelian, $this->IdBarang]);
        
        return $createDetailPembelian;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function GetListDetailPembelian() {
      $query = "SELECT * FROM detail_pembelian ORDER BY id_pembelian ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $listDetailPembelian = $prepareDB->fetchAll();
      
      return $listDetailPembelian;
    }

    function FindDetailPembelianById($id) {
      try {
        $query = "SELECT * FROM detail_pembelian WHERE id_detail_pembelian = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$id]);
        $findDetailPembelianById = $prepareDB->fetchAll();

        return $findDetailPembelianById;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function DeleteDetailPembelian($id) {
      try {
        $query = "DELETE FROM detail_pembelian WHERE id_detail_pembelian = ?";
        $prepareDB = $this->conn->prepare($query);
        $deleteDetailPembelian = $prepareDB->execute([$id]);

        return $deleteDetailPembelian;
      } catch (Exception $e) {
      throw $e;
      }
    }
  }
?>