<?php
    require "../koneksi.php";

    $kdbarang = $_POST['kodeBrg'];
    $namaBrg = $_POST['namaBrg'];
    $hargaBrg = $_POST['hargaBrg'];
    $tglBrg = $_POST['tglBrg'];
    $submit = $_POST['submit'];

    if ($submit) {
        $query = "INSERT INTO tambahbarang VALUE ('', '$kdbarang', '$namaBrg', '$hargaBrg', '$tglBrg')";

        $result = mysqli_query($conn, $query);

        echo "<script>window.alert('Data Berhasil Ditambahkan');window.location = ('../barang.php');</script>";
    }
?>