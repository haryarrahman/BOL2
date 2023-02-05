<?php
  require_once '../BOL2/config.php';
  require_once '../BOL2/models/HakAkses.php';
  require_once '../BOL2/views/HakAkses.php';

  class HakAksesController {

    private $model;
    private $view;

    public function __construct() {
      $config = new DatabaseConfig();
      $pdo = $config->getConnection();

      $this->model = new HakAksesModel($pdo);
      $this->view = new HakAksesView();
    }

    private function SaveCreate() {
      $this->model->setNamaAkses($_POST['nama_akses']);
      $this->model->setKeterangan($_POST['keterangan']);
      $data = $this->model->CreateAkses();

      if ($data) {
        header("location: index.php");
      }
    }

    private function CreateNewAkses() {
      $defaultValue=[
        'id_akses' => '',
        'nama_akses' => '',
        'keterangan' => ''
      ];

      $this->view->Form($defaultValue);
    }

    private function SaveEdit() {
      $this->model->setNamaAkses($_POST['nama_akses']);
      $this->model->setKeterangan($_POST['keterangan']);
      $data = $this->model->EditAkses($_POST['id_akses']);

      if ($data) {
        header("location: index.php");
      }
    }

    private function FormEditAkses() {
      $id = $_POST['edit'];
      $prevData = $this->model->FindAksesById($id)[0];

      $defaultValue=[
        'id_akses' => $prevData['id_akses'],
        'nama_akses' => $prevData['nama_akses'],
        'keterangan' => $prevData['keterangan']
      ];

      $this->view->Form($defaultValue);
    }

    private function DeleteHakAkses() {
      $data = $this->model->DeleteAkses($_POST['delete']);

      if ($data) {
        header("location: index.php");
      }
    }

    public function TableHakAkses() { 
      if (isset($_POST['id_akses']) && isset($_POST['nama_akses']) && isset($_POST['keterangan'])) {
          $this->SaveEdit();
          return;
      } 
      
      if (isset($_POST['edit']) ) {
          $this->FormEditAkses();
          return;
      } 
      
      if (isset($_POST['delete'])) {
          $this->DeleteHakAkses();
          return;
      }

      $result = $this->model->GetListAkses();
      $this->view->Table($result);
    }

    public function FormHakAkses() {
      if (isset($_POST['nama_akses']) && isset($_POST['keterangan'])) {
          $this->SaveCreate();
          return;
      } 
          
      $this->CreateNewAkses();
    }
  }
?>