<table>
  <tr>
    <th>ID : </th>
    <th>Nama Akses : </th>
    <th>Keterangan :</th>
  </tr>
  <?php foreach ($result as $akses): ?>
  <tr>
      <td><?= $akses['id_akses'] ?></td>
      <td><?= $akses['nama_akses'] ?></td>
      <td><?= $akses['keterangan'] ?></td>
  </tr>
  <?php endforeach; ?>
</table>