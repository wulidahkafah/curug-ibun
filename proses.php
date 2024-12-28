<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'curug ibun');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert booking (Form submission)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pemesanan = $_POST['nama_pemesanan'];
    $hp_pemesan = $_POST['hp_pemesan'];
    $waktu_wisata = $_POST['waktu_wisata'];
    $hari_wisata = $_POST['hari_wisata'];
    $paket_transport = isset($_POST['paket_transport']) ? 1 : 0;
    $paket_makan = isset($_POST['paket_makan']) ? 1 : 0;
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $harga = $_POST['harga'];
    $total = $_POST['total'];

    // Insert query
    $sql = "INSERT INTO pemesanan (nama_pemesanan, hp_pemesan, waktu_wisata, hari_wisata, paket_transport, paket_makan, jumlah_peserta, harga, total)
            VALUES ('$nama_pemesanan', '$hp_pemesan', '$waktu_wisata', '$hari_wisata', '$paket_transport', '$paket_makan', '$jumlah_peserta', '$harga', '$total')";

    if ($conn->query($sql) === TRUE) {
        echo "New booking created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch bookings
$sql = "SELECT * FROM pemesanan";
$result = $conn->query($sql);

// Delete booking (if delete link is clicked)
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM pemesanan WHERE id = $delete_id";
    if ($conn->query($delete_sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']); // Redirect to refresh the page
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Curug Ibun Pelangi - Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: transparent; position: absolute; width: 100%; z-index: 10;">
    <div class="container">
        <a class="navbar-brand" href="#">CurugIbun.com</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pemesanan">FORM PEMESANAN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Pemesanan Form -->
<div id="pemesanan" class="header">
    <img alt="Scenic view of Curug Ibun Pelangi waterfall" height="1080" src="img/jembatan.jpg" width="1920"/>
    <div class="overlay">
        <h1>CURUG IBUN PELANGI</h1>
        <div class="location"><p>Sukasari Kaler, Kecamatan Argapura, Majalengka</p></div>
        <div class="search">
            <input placeholder="Search..." type="text"/>
            <button><i class="fas fa-search"></i></button>
        </div>
    </div>
</div>

<main class="flex-shrink-0">
    <div class="container">
        <form method="POST" action="">
            <div class="card mt-2">
                <div class="card-header bg-dark text-white">Form Pemesanan Paket Wisata</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama_pemesanan" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_pemesanan" name="nama_pemesanan" placeholder="Nama Lengkap Sesuai Tanda Pengenal" required>
                    </div>
                    <div class="mb-3">
                        <label for="hp_pemesan" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" id="hp_pemesan" name="hp_pemesan" placeholder="Nomor Handphone 08..." required>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_wisata" class="form-label">Waktu Mulai Perjalanan</label>
                        <input type="date" class="form-control" id="waktu_wisata" name="waktu_wisata" placeholder="Waktu Mulai Perjalanan" required>
                    </div>
                    <div class="mb-3">
                        <label for="hari_wisata" class="form-label">Hari Wisata</label>
                        <input type="number" class="form-control" id="hari_wisata" name="hari_wisata" value="1" placeholder="Jumlah Hari Perjalanan" required>
                    </div>
                    <div class="mb-3">
                        <label for="paket_transport" class="form-label">Transportasi</label>
                        <input type="checkbox" name="paket_transport" value="1" id="paket_transport"> Rp.3.000
                    </div>
                    <div class="mb-3">
                        <label for="paket_makan" class="form-label">Service/Makan</label>
                        <input type="checkbox" name="paket_makan" value="1" id="paket_makan"> Rp.100.000
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                        <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="1" placeholder="Jumlah Peserta" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Paket</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Paket Perjalanan" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">Total Tagihan</label>
                        <input type="number" class="form-control" id="total" name="total" placeholder="Total Paket Perjalanan" readonly>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                    <input type="reset" class="btn btn-danger" value="Ulangi">
                </div>
            </div>
        </form>
    </div>
</main>

<!-- Display Bookings -->
<div class="container mt-5">
    <h2>Daftar Pemesanan</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pemesanan</th>
                <th>Nomor HP</th>
                <th>Tanggal</th>
                <th>Jumlah Peserta</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['nama_pemesanan'] . '</td>';
                    echo '<td>' . $row['hp_pemesan'] . '</td>';
                    echo '<td>' . $row['waktu_wisata'] . '</td>';
                    echo '<td>' . $row['jumlah_peserta'] . '</td>';
                    echo '<td>' . $row['harga'] . '</td>';
                    echo '<td>' . $row['total'] . '</td>';
                    echo '<td>
                            <a href="?delete_id=' . $row['id'] . '" class="btn btn-danger">Hapus</a>
                          </td>';
                    echo '</tr>';
                }
            } else {
                echo "<tr><td colspan='8'>No bookings found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php $conn->close(); ?>
