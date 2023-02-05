<?php 
  class Barang {
    private $NamaBarang;
    private $Keterangan;
    private $Satuan;

    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setNamaBarang($namaBarang) {
      $this->NamaBarang = $Role;
    }

    function setKeterangan($keterangan) {
      $this->Keterangan = $keterangan;
    }
    
    function setSatuan($satuan) {
      $this->Satuan = $satuan;
    }

    function getNamaBarang() {
      return $NamaBarang;
    }
    
    function getKeterangan() {
      return $Keterangan;
    }

    function getSatuan() {
      return $Satuan;
    }

    function CreateBarang() {
      try {
        $query = "INSERT INTO barang(`nama_barang`, `keterangan`, `satuan) VALUES (?, ?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $createBarang = $prepareDB->execute([$this->NamaBarang, $this->Keterangan, $this->satuan]);
        
        return $createBarang;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function GetListBarang() {
      $query = "SELECT * FROM barang ORDER BY nama_barang ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $listBarang = $prepareDB->fetchAll();
      
      return $listBarang;
    }

    function FindBarangById($id) {
      try {
        $query = "SELECT * FROM barang WHERE id_barang = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$id]);
        $findBarangById = $prepareDB->fetchAll();

        return $findBarangById;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function EditBarang($id) {
      try {
        $query = "UPDATE barang SET nama_barang = ? , keterangan = ?, satuan = ? WHERE id_barang = ?";
        $prepareDB = $this->conn->prepare($query);
        $editBarang = $prepareDB->execute([$this->NamaBarang, $this->Keterangan, $this->Satuan, $id]);

        return $editBarang;
      } catch (Exception $e) {
      throw $e;
      }
    }

    function DeleteBarang($id) {
      try {
        $query = "DELETE FROM barang WHERE id_barang = ?";
        $prepareDB = $this->conn->prepare($query);
        $deleteBarang = $prepareDB->execute([$id]);

        return $deleteBarang;
      } catch (Exception $e) {
      throw $e;
      }
    }
  }

  // ** cara pakai!! **
  // $akses = new HakBarang("blablaa");
  // $akses->setNamaBarang('blabla');
  // $akses->setKeterangan('blabla');
  // $akses->PostBarang();
?>
