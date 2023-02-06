<form action="" method="post">
    <input type="text" name="nama_akses" placeholder="Nama Akses" value="<?php echo $defaultValue['nama_akses']; ?>">
    <input type="text" name="keterangan" placeholder="Keterangan" value="<?php echo $defaultValue['keterangan']; ?>">
    <input type="hidden" name="id_akses" value="<?php echo $defaultValue['id_akses']; ?>" />
    <button type="submit">Submit</button>
</form>