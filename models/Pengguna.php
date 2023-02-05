<?php 
  class PenggunaModel {
    private $Username;
    private $Password;
    private $NamaDepan;
    private $NamaBelakang;
    private $NoHp;
    private $Alamat;
    private $IdAkses;

    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setUsername($username) {
      $this->Username = $username;
    }

    function setPassword($password) {
      $this->Password = $password;
    }

    function setNamaDepan($namaDepan) {
      $this->NamaDepan = $namaDepan;
    }

    function setNamaBelakang($namaBelakang) {
      $this->NamaBelakang = $namaBelakang;
    }

    function setNoHp($noHp) {
      $this->NoHp = $noHp;
    }

    function setAlamat($alamat) {
      $this->Alamat = $alamat;
    }

    function setIdAkses($idAkses) {
      $this->IdAkses = $idAkses;
    }

    function getIdPengguna() {
      return $IdPengguna;
    }
    
    function getUsername() {
      return $Username;
    }

    function getPassword() {
      return $Password;
    }

    function getNamaDepan() {
      return $NamaDepan;
    }

    function getNamaBelakang() {
      return $NamaBelakang;
    }

    function getNoHp() {
      return $NoHp;
    }

    function getAlamat() {
      return $Alamat;
    }

    function getIdAkses() {
      return $IdAkses;
    }
    
    function CreatePengguna() {
      try {
        $query = "INSERT INTO pengguna(`username`, `password`, `nama_depan`, `nama_belakang`, `no_hp`, `alamat`, `id_akses`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $SqlAddPengguna = $prepareDB->execute([$this->Username, $this->Password, $this->NamaDepan, $this->NamaBelakang, $this->NoHp, $this->Alamat, $this->IdAkses]);
        
        return $SqlAddPengguna;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function GetListPengguna() {
      $query = "SELECT * FROM pengguna ORDER BY username ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $ListPengguna = $prepareDB->fetchAll();
      
      return $ListPengguna;
    }

    function FindPenggunaById($id) {
      try {
        $query = "SELECT * FROM pengguna WHERE id_pengguna = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$id]);
        $FindPenggunaById = $prepareDB->fetchAll();

        return $FindPenggunaById;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function EditPengguna($id) {
      try {
        $query = "UPDATE pengguna SET `username` = ?, `password` = ?, `nama_depan` = ?, `nama_belakang` = ?, `no_hp` = ?, `alamat` = ?, `id_akses` = ? WHERE id_pengguna = ?";
        $prepareDB = $this->conn->prepare($query);
        $EditPengguna = $prepareDB->execute([$this->Username, $this->Password, $this->NamaDepan, $this->NamaBelakang, $this->NoHp, $this->Alamat, $this->IdAkses, $id]);

        return $EditPengguna;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function DeletePengguna($id) {
      try {
        $query = "DELETE FROM pengguna WHERE id_pengguna = ?";
        $prepareDB = $this->conn->prepare($query);
        $DeletePengguna = $prepareDB->execute([$id]);

        return $DeletePengguna;
      } catch (Exception $e) {
        throw $e;
      }
    }
  }
?>