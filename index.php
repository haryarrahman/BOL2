<?php 
  require_once 'controllers/HakAkses.php';
  require_once 'controllers/Pengguna.php';

  $hakAkses = new HakAksesController();
  $pengguna = new PenggunaController;

  $pengguna->FormPengguna();
?>