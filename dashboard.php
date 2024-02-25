<?php
    require "koneksi.php";

    $query = "SELECT * FROM tambahbarang";
    $tampil = mysqli_query($conn, $query);

    $barangDetails = array();

    // Loop melalui hasil query dan sisipkan data ke dalam array
    while ($data = mysqli_fetch_array($tampil)) {
        $barangDetails[$data['kd_barang']] = array(
            'nama_barang' => $data['nama_barang'],
            'harga_barang' => $data['harga_barang']
        );
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard/style.css">

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
                <div class="garis"></div>
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
            <div class="card">
                <form action="dashboard/simpanDashboard.php" method="post">
                <div class="input">
                    <label for="tgl">Tgl. Transaksi</label>
                    <input type="date" name="tgl" id="tgl">
                </div>
                <div class="input">
                    <label for="kode" class="kode">Kode Barang</label>
                    <select name="barang" id="barangDropdown" onchange="showDetails()">
                        <option value="">Pilih Produk</option>
                        <?php foreach ($barangDetails as $kode => $detail) : ?>
                            <option value="<?= $kode; ?>"><?= $kode; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input inputNama">
                    <label for="nama" class="nama">Nama Barang</label>
                    <input type="text" name="nama" id="nama">
                </div>
                <div class="input">
                    <label for="harga" class="harga">Harga Barang</label>
                    <input type="text" name="harga" id="harga">
                </div>
                <div class="input">
                    <label for="jumlah" class="Jumlah">Quantity</label>
                    <input type="number" name="jumlah" id="jumlah" min='1' value="1" oninput="hitungTotal()">
                </div>
                <div class="input">
                    <label for="sub" class="sub">Total Harga</label>
                    <input type="text" name="sub" id="total" readonly>
                </div>
                <br><br>
                <div class="input">
                    <label for="bayar" class="bayar1">Bayar</label>
                    <input type="text" name="bayar" id="bayar" oninput="hitungKembalian()">
                </div>
                <div class="input">
                    <label for="kembali" class="kembali">Kembali</label>
                    <input type="text" name="kembali" id="kembali" readonly>
                </div>

                <input type="submit" name="submit" value="Tambah Transaksi" class="submit">
                </form>
            </div>
        </div>  
    </div>

    <!-- Script JavaScript -->
    <script>
        function showDetails() {
            var selectedOption = document.getElementById('barangDropdown').value;
            var namaInput = document.getElementById('nama');
            var hargaInput = document.getElementById('harga');

            // Mengambil data nama barang dan harga barang dari array yang sudah disisipkan
            var details = <?php echo json_encode($barangDetails); ?>;
            var selectedDetails = details[selectedOption];

            // Mengatur nilai input nama dan harga berdasarkan data yang sudah disisipkan
            namaInput.value = selectedDetails.nama_barang;
            hargaInput.value = selectedDetails.harga_barang;
        }

        function hitungTotal() {
            var hargaBarangInput = document.getElementById('harga').value;
            var jumlahBarang = document.getElementById('jumlah').value;
            var totalBarang = parseInt(hargaBarangInput) * parseInt(jumlahBarang);
            document.getElementById('total').value = totalBarang;
        }

        function hitungKembalian() {
            var totalBelanjaInput = parseFloat(document.getElementById('total').value);
            var jumlahBayarInput = parseFloat(document.getElementById('bayar').value);
            var kembalianInput = document.getElementById('kembali');

            // Menghitung kembalian
            var kembalian = jumlahBayarInput - totalBelanjaInput;

            // Menampilkan kembalian ke dalam input kembalian
            kembalianInput.value = kembalian.toFixed(2); // Menampilkan dengan dua angka di belakang koma
        }
    </script>
    <!-- End of Script JavaScript -->
</body>
</html>
