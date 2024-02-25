<?php
    require "koneksi.php";

    $query = "SELECT * FROM transaksi";
    

    // search
    if (isset($_POST['tombolCari'])) {
        $cari = $_POST['cari'];
        $result = mysqli_query($conn, "SELECT * FROM transaksi WHERE nama_barang LIKE '$cari%'");
    } else {
        $result = mysqli_query($conn, "SELECT * FROM transaksi");
    }

    
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
<body bgcolor="#eaeaea">
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
                    <a href="laporan.php" class="a2">Laporan</a>
                </div>
            </div> 
                    <div class="card2">
                        <div class="head">
                            <h3 class="tambahBrg">Data Transaksi</h3>
                        </div>
                        <div class="garis"></div>
                        <div class="search">
                            <form action="" method="POST" class="formSearch">
                                <input type="text" name="cari" class="search" id="search" placeholder="Cari Nama Barang.." autocomplete="off">
                                <button type="submit" value="Cari" name="tombolCari" class="cari">Cari!</button>
                            </form>
                            
                        </div>
                        <div class="table">
                            <table border="1" cellspacing="0">
                                <tr>
                                    <th>No</th>
                                    <th>Tgl Input</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Total</th>
                                    <th>Opsi</th>
                                </tr>
                                <?php $no = 1; ?>
                                <?php while ($data = mysqli_fetch_array($result)) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $data['tgl_input']; ?></td>
                                    <td><?= $data['nama_barang']; ?></td>
                                    <td><?= $data['jumlah']; ?></td>
                                    <td><?= $data['harga']; ?></td>
                                    <td><?= $data['total']; ?></td>
                                    <td>
                                        <a href="hapus.php?id=<?= $data['id']; ?>" class="hapus" onclick="return confirm('yakin?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                                <?php endwhile; ?>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
                

        </div>  
    </div>
</body>
</html>