<?php
require "../koneksi.php";

$id = $_POST['id'];
$nama = $_POST['namaBrg'];
$harga = $_POST['hargaBrg'];
$tgl = $_POST['tglBrg'];

$data = mysqli_query($conn, "UPDATE tambahbarang SET nama_barang = '$nama', harga_barang = '$harga', tgl_barang = '$tgl' WHERE id = '$id'");

if ($data) {
    echo "<script>window.alert('Data Berhasil diupdate');window.location = ('../barang.php');</script>";
} else {
    echo "<script>window.alert('Data gagal dihapus');window.location = ('../barang.php');</script>";
}

?>