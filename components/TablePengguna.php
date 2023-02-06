<table>
  <tr>
    <th>Username : </th>
    <th>Password : </th>
    <th>Nama Depan : </th>
    <th>Nama Belakang : </th>
    <th>No HP : </th>
    <th>Alamat : </th>
    <th>Role : </th>
    <th>Action : </th>
  </tr>
  <?php foreach ($result as $user): ?>
  <tr>
      <td><?= $user['username'] ?></td>
      <td><?= $user['password'] ?></td>
      <td><?= $user['nama_depan'] ?></td>
      <td><?= $user['nama_belakang'] ?></td>
      <td><?= $user['no_hp'] ?></td>
      <td><?= $user['alamat'] ?></td>
      <td><?= $user['hak_akses'] ?></td>
      <td>
        <form method="post">
          <input type="hidden" name="edit" value="<?php echo $user['id_pengguna']; ?>">
          <input type="submit" value="Edit">
        </form>

        <form method="post">
          <input type="hidden" name="delete" value="<?php echo $user['id_pengguna']; ?>">
          <input type="submit" value="Delete">
        </form>
      </td>
  </tr>
  <?php endforeach; ?>
</table>