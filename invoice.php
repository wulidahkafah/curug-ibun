<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h2 class="text-center">Invoice Pemesanan</h2>
            </div>
            <div class="card-body">
                <?php
                // Simulasi data yang diterima dari form (ganti dengan $_POST jika terhubung dengan form asli)
                $nama_pemesanan = $_POST['nama_pemesanan'] ?? 'Nama Lengkap';
                $hp_pemesan = $_POST['hp_pemesan'] ?? '08XXXXXXXXXX';
                $waktu_wisata = $_POST['waktu_wisata'] ?? 'YYYY-MM-DD';
                $hari_wisata = $_POST['hari_wisata'] ?? 1;
                $jumlah_peserta = $_POST['jumlah_peserta'] ?? 1;
                $paket_transport = isset($_POST['paket_transport']) ? 3000 : 0;
                $paket_makan = isset($_POST['paket_makan']) ? 100000 : 0;

                // Hitung harga per paket
                $harga_per_paket = $paket_transport + $paket_makan;

                // Hitung total tagihan
                $total_tagihan = $harga_per_paket * $hari_wisata * $jumlah_peserta;
                ?>

                <p><strong>Nama Pemesan:</strong> <?= htmlspecialchars($nama_pemesanan); ?></p>
                <p><strong>Nomor Handphone:</strong> <?= htmlspecialchars($hp_pemesan); ?></p>
                <p><strong>Waktu Wisata:</strong> <?= htmlspecialchars($waktu_wisata); ?></p>
                <p><strong>Jumlah Hari:</strong> <?= htmlspecialchars($hari_wisata); ?> hari</p>
                <p><strong>Jumlah Peserta:</strong> <?= htmlspecialchars($jumlah_peserta); ?> orang</p>
                <hr>
                <h5>Rincian Biaya</h5>
                <ul>
                    <li>Transportasi: Rp <?= number_format($paket_transport, 0, ',', '.'); ?></li>
                    <li>Makan/Service: Rp <?= number_format($paket_makan, 0, ',', '.'); ?></li>
                </ul>
                <p><strong>Harga Per Paket:</strong> Rp <?= number_format($harga_per_paket, 0, ',', '.'); ?></p>
                <hr>
                <h4><strong>Total Tagihan:</strong> Rp <?= number_format($total_tagihan, 0, ',', '.'); ?></h4>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-success" onclick="window.print()">Cetak Invoice</button>
                <a href="form_pemesanan.php" class="btn btn-primary">Kembali ke Form</a>
            </div>
        </div>
    </div>
</body>
</html>
