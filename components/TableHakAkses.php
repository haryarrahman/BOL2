<table>
  <tr>
    <th>Nama Akses : </th>
    <th>Keterangan : </th>
    <th>Action : </th>
  </tr>
  <?php foreach ($result as $akses): ?>
  
  <tr>
      <td><?= $akses['nama_akses'] ?></td>
      <td><?= $akses['keterangan'] ?></td>
      <td>
        <form method="post">
          <input type="hidden" name="edit" value="<?php echo $akses['id_akses']; ?>">
          <input type="submit" value="Edit">
        </form>

        <form method="post">
          <input type="hidden" name="delete" value="<?php echo $akses['id_akses']; ?>">
          <input type="submit" value="Delete">
        </form>
      </td>
  </tr>
  <?php endforeach; ?>
</table>