<?php
if (isset($_GET['error'])) {
    echo "<p style='color:red;'>Email atau password salah.</p>";
}
if (isset($_GET['success'])) {
    echo "<p style='color:green;'>Registrasi berhasil! Silakan login.</p>";
}
?>
<form method="POST" action="../../controllers/AuthController.php">
    <h2>Login</h2>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Kata Sandi" required><br>
    <label><input type="checkbox" name="remember"> Ingat saya</label><br>
    <button type="submit" name="login">Masuk</button>
</form>
<p>Belum punya akun? <a href="register.php">Daftar</a></p>
