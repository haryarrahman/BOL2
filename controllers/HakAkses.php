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

    public function TableHakAkses() { 
      $result = $this->model->GetListAkses();
      $this->view->Table($result);
    }

    public function FormHakAkses() {
      if (isset($_POST['nama_akses']) && isset($_POST['keterangan'])) {
        $this->model->setNamaAkses($_POST['nama_akses']);
        $this->model->setKeterangan($_POST['keterangan']);
        $this->model->CreateAkses();

        echo 'create successfully';
      } else {
        $this->view->Form();
      }
    }
  }
?>