<?php 
   require_once '../BOL2/config.php';
   require_once '../BOL2/models/Pengguna.php';
   require_once '../BOL2/views/Pengguna.php';

   class PenggunaController {

      private $model;
      private $view;

      public function __construct() {
        $config = new DatabaseConfig();
        $pdo = $config->getConnection();
  
        $this->model = new PenggunaModel($pdo);
        $this->view = new PenggunaView();
      }

      private function SaveCreate() {
        $this->model->setUsername($_POST['username']);
        $this->model->setPassword($_POST['password']);
        $this->model->setNamaDepan($_POST['nama_depan']);
        $this->model->setNamaBelakang($_POST['nama_belakang']);
        $this->model->setNoHp($_POST['no_hp']);
        $this->model->setAlamat($_POST['alamat']);
        $this->model->setIdAkses($_POST['id_akses']);

        $data = $this->model->CreatePengguna();
  
        echo $data;
        if ($data) {
          header("location: index.php");
        }
      }
  

      private function CreateNewPengguna() {
        $defaultValue=[
          'username' => '',
          'password' => '',
          'nama_depan' => '',
          'nama_belakang' => '',
          'no_hp' => '',
          'alamat' => '',
          'id_akses' => ''
        ];
  
        $this->view->Form($defaultValue);
      }

      public function TablePengguna() {
        $result = $this->model->GetListPengguna();
        $this->view->Table($result);
      }

      public function FormPengguna() {
        $isSubmitting = isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nama_depan']) && isset($_POST['nama_belakang']) && isset($_POST['no_hp']) && isset($_POST['alamat']) && isset($_POST['id_akses']);
 
        if ($isSubmitting) {
          $this->SaveCreate();
          return;
      }

        $this->CreateNewPengguna();
      }
  }

?>