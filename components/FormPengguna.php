<form action="" method="post">
    <input type="text" name="username" placeholder="Username" value="<?php echo $defaultValue['username']; ?>"><br/>
    <input type="password" name="password" placeholder="Password" value="<?php echo $defaultValue['password']; ?>"><br/>
    <input type="text" name="nama_depan" placeholder="Nama Depan" value="<?php echo $defaultValue['nama_depan']; ?>"><br/>
    <input type="text" name="nama_belakang" placeholder="Nama Belakang" value="<?php echo $defaultValue['nama_belakang']; ?>"><br/>
    <input type="text" name="no_hp" placeholder="No HP"value="<?php echo $defaultValue['no_hp']; ?>"><br/>
    <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $defaultValue['alamat']; ?>"><br/>
    <input type="text" name="id_akses" placeholder="Hak Akses" value="<?php echo $defaultValue['id_akses']; ?>"><br/>
    <input type="hidden" name="id_pengguna" value="<?php echo $defaultValue['id_pengguna']; ?>" />
    <button type="submit">Submit</button>
</form>