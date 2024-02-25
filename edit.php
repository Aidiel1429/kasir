<?php
    require "koneksi.php";

    // mengambil kode produk dengan jumlah terbesar
    $query = mysqli_query($conn, "SELECT max(kd_barang) as kdterbesar from tambahbarang");
    $hasil = mysqli_fetch_array($query);
    $kdbarang = $hasil['kdterbesar'];

    // mengambil angka terbesar dari kode produk
    $urutan = (int) substr($kdbarang, 1, 3);
    $urutan++;
    $huruf = "B";
    $kdbarang = $huruf . sprintf("%03s", $urutan);

    $brg = mysqli_query($conn, "SELECT * FROM tambahbarang");

    // update
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM tambahbarang WHERE id = '$id'");
    $data = mysqli_fetch_array($query);   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
    <link rel="stylesheet" href="barang/style.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <!-- end -->

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- end -->
</head>
<body>
    <div class="container">
        <div class="header">
            <i class="fa-solid fa-cart-shopping icon"></i>
            <h3>CikiStore</h3>
        </div>
        <div class="main">
            <div class="sidebar">
                <div class="judul">
                    <p>Hello, <b>admin!</b></p>
                </div>
                <div class="garis">
                </div>
                <div class="list">
                    <i class="fa-solid fa-desktop"></i>
                    <a href="dashboard.php">Kasir</a>
                </div>
                <div class="list">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <a href="barang.php" class="a2">Barang</a>
                </div>
                <div class="list">
                    <i class="fa-regular fa-calendar-days"></i>
                    <a href="dashboard.php" class="a2">Laporan</a>
                </div>
            </div>
            <div class="card">
                <div class="head">
                    <h3 class="tambahBrg">Tambah Barang</h3>
                </div>
                <div class="garis"></div>
                <div class="ROW">
                    <div class="inputBrg">
                        <form action="ubah/funcEdit.php" method="post">
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <div class="kodeBarang">
                                <label for="kodeBrg">Kode Barang</label><br>
                                <input type="text" id="kodeBrg" name="kodeBrg" value="<?= $data['kd_barang']; ?>" readonly required>
                            </div>
                            <div class="namaBarang">
                                <label for="namaBrg">Nama Barang</label><br>
                                <input type="text" id="namaBrg" name="namaBrg" required value="<?= $data['nama_barang']; ?>">
                            </div>
                            <div class="hargaBarang">
                                <label for="hargaBrg">harga Barang</label><br>
                                <input type="text" id="hargaBrg" name="hargaBrg" required value="<?= $data['harga_barang']; ?>">
                            </div>
                            <div class="tglBarang">
                                <label for="tglBrg">Tanggal Input</label><br>
                                <input type="date" id="tglBrg" name="tglBrg" required value="<?= $data['tgl_barang']; ?>">
                            </div>
                            <div class="simpan">
                                <input type="submit" value="Update" class="submit" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
                    
                </div>
            </div>
                

        </div>  
    </div>
</body>
</html>