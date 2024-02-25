<?php
    require "koneksi.php";

    if (Isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM tambahbarang WHERE id = $id";
        
        if ($conn-> query($query) === TRUE) {
            echo "<script>window.alert('Data Berhasil dihapus');window.location = ('barang.php');</script>";
        } else {
            echo "<script>window.alert('Data Gagal dihapus');window.location = ('barang.php');</script>";
        }
    }
?>