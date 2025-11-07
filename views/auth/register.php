<?php
if (isset($_GET['error'])) {
    echo "<p style='color:red;'>Gagal mendaftar. Email mungkin sudah digunakan.</p>";
}
?>
<form method="POST" action="../../controllers/AuthController.php">
    <h2>Register</h2>
    <input type="text" name="name" placeholder="Nama Lengkap" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Kata Sandi" required><br>
    <button type="submit" name="register">Daftar</button>
</form>
<p>Sudah punya akun? <a href="login.php">Masuk di sini</a></p>
