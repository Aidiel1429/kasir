<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (Isset($_POST['submit'])) {
            $username = $_POST["user"];
            $password = $_POST["pw"];

            if ($username === "admin" && $password === "admin") {
            echo "<script>window.alert('Login berhasil');window.location = ('../dashboard.php');</script>";
            } else {
            echo "<script>window.alert('Login Gagal');window.location = ('../index.php');</script>";
            }
        }
    }
?>