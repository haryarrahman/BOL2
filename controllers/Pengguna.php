<?php 
   require_once '../BOL2/config.php';
   require_once '../BOL2/models/Pengguna.php';
   require_once '../BOL2/models/HakAkses.php';
   require_once '../BOL2/views/Pengguna.php';

   class PenggunaController {

      private $model;
      private $view;
      private $hakAksesModel;

      public function __construct() {
        $config = new DatabaseConfig();
        $pdo = $config->getConnection();
  
        $this->model = new PenggunaModel($pdo);
        $this->view = new PenggunaView();
        $this->hakAksesModel = new HakAksesModel($pdo);
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
        $hakAkses = $this->hakAksesModel->GetListAkses();
        $defaultValue=[
          'username' => '',
          'password' => '',
          'nama_depan' => '',
          'nama_belakang' => '',
          'no_hp' => '',
          'alamat' => '',
          'id_akses' => ''
        ];

        $this->view->Form($defaultValue, $hakAkses);
      }

      public function TablePengguna() {
        $data = $this->model->GetListPengguna();

        $result = [];

        foreach ($data as $user) {
          $dataHakAkses = $this->hakAksesModel->FindAksesById($user['id_akses'])[0];

          $dataUser = [
            'username' => $user['username'],
            'password' => $user['password'],
            'nama_depan' => $user['nama_depan'],
            'nama_belakang' => $user['nama_belakang'],
            'no_hp' => $user['no_hp'],
            'alamat' => $user['alamat'],
            'hak_akses' => $dataHakAkses['nama_akses']
          ];

          array_push($result, $dataUser);
        }

        $this->view->Table($result);
      }

      private function FormEditPengguna() {
        $id = $_POST['edit'];
        $prevData = $this->model->FindPenggunaById($id)[0];
        $hakAkses = $this->hakAksesModel->GetListAkses();
  
        $defaultValue=[
          'username' => $prevData['username'],
          'password' => $prevData['password'],
          'nama_depan' => $prevData['nama_depan'],
          'nama_belakang' => $prevData['nama_belakang'],
          'no_hp' => $prevData['no_hp'],
          'alamat' => $prevData['alamat'],
          'id_akses' => $prevData['id_akses']
        ];

        $this->view->Form($defaultValue, $hakAkses);
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