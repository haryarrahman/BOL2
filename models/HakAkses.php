<?php 
  class HakAksesModel {
    private $NamaAkses;
    private $Keterangan;

    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setNamaAkses($namaAkses) {
      $this->NamaAkses = $namaAkses;
    }

    function setKeterangan($keterangan) {
      $this->Keterangan = $keterangan;
    }
    
    function getNamaAkses() {
      return $NamaAkses;
    }
    
    function getKeterangan() {
      return $Keterangan;
    }

    function CreateAkses() {
      try {
        $query = "INSERT INTO hak_akses(`nama_akses`, `keterangan`) VALUES (?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $createAkses = $prepareDB->execute([$this->NamaAkses, $this->Keterangan]);
        
        return $createAkses;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function GetListAkses() {
      $query = "SELECT * FROM hak_akses ORDER BY nama_akses ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $listAkses = $prepareDB->fetchAll();

      return $listAkses;
    }

    function FindAksesById($id) {
      try {
        $query = "SELECT * FROM hak_akses WHERE id_akses = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$id]);
        $findAksesById = $prepareDB->fetchAll();

        return $findAksesById;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function EditAkses($id) {
      try {
        $query = "UPDATE hak_akses SET `nama_akses`=? , `keterangan`=? WHERE id_akses = ?";
        $prepareDB = $this->conn->prepare($query);
        $editAkses = $prepareDB->execute([$this->NamaAkses, $this->Keterangan, $id]);

        return $editAkses;
      } catch (Exception $e) {
      throw $e;
      }
    }

    function DeleteAkses($id) {
      try {
        $query = "DELETE FROM hak_akses WHERE id_akses = ?";
        $prepareDB = $this->conn->prepare($query);
        $deleteAkses = $prepareDB->execute([$id]);

        return $deleteAkses;
      } catch (Exception $e) {
      throw $e;
      }
    }
  }
?>
