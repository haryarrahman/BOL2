<?php 
    class HakAksesView {

      public function Table($result) {
          require_once '../BOL2/components/TableHakAkses.php';
      }

      public function Form($defaultValue) {
        require_once '../BOL2/components/FormHakAkses.php';
      }

  }
?>