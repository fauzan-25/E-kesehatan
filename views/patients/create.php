<form method="POST" action="../../controllers/PatientController.php">
    <h2>Tambah Pasien</h2>
    <input type="text" name="name" placeholder="Nama Lengkap" required><br>
    <input type="text" name="nik" placeholder="NIK" required><br>
    <input type="number" name="age" placeholder="Umur" required><br>
    <textarea name="address" placeholder="Alamat" required></textarea><br>
    <input type="text" name="phone" placeholder="No. Telepon"><br>
    <button type="submit" name="create">Simpan</button>
</form>
<a href="index.php">Kembali</a>
