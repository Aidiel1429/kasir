<?php
    require "../koneksi.php";

    $tgl = $_POST['tgl'];
    $kode = $_POST['barang'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['sub'];
    $bayar = $_POST['bayar'];
    $kembali = $_POST['kembali'];
    $submit = $_POST['submit'];

    if ($submit) {
        $query = "INSERT INTO transaksi VALUE ('', '$tgl', '$nama', '$jumlah', '$harga', '$total', '$bayar', '$kembali')";

        $result = mysqli_query($conn, $query);
        echo "<script>window.alert('Data Berhasil ditambahkan');window.location = ('../laporan.php');</script>";
    }
?>