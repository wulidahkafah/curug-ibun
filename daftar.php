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
	<link rel="stylesheet" href="style.css">
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
                    <a class="nav-link" href="pemesanan.php">FORM PEMESANAN</a>
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
                            <a href="proses.php?delete_id=' . $row['id'] . '" class="btn btn-danger">Hapus</a>
                          </td>';
                          echo '<td>
                          <a href="invoice.php?delete_id=' . $row['id'] . '" class="btn btn-success">Invoice</a>
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
