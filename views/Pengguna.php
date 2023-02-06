<?php 
    class PenggunaView {

      public function Table($result) {
          require_once '../BOL2/components/TablePengguna.php';
      }

      public function Form($defaultValue, $hakAkses) {
        require_once '../BOL2/components/FormPengguna.php';
      }

  }
?>