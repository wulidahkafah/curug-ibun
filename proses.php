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
        header('Location: daftar.php');
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
        header("Location: daftar.php"); // Redirect to refresh the page
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>


