<?php 
  require_once 'controllers/HakAkses.php';
  require_once 'controllers/Pengguna.php';

  $hakAkses = new HakAksesController();
  $pengguna = new PenggunaController;

  echo 'FORM PENGGUNA';
  $pengguna->FormPengguna();
  echo '<br/>';

  echo 'TABEL PENGGUNA';
  $pengguna->TablePengguna();
  echo '<br/>';

  echo 'FORM HAK AKSES';
  $hakAkses->FormHakAkses();
  echo '<br/>';

  echo 'TABEL HAK AKSES';
  $hakAkses->TableHakAkses();
  
?>