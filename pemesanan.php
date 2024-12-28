<!DOCTYPE html>
<html lang="en">
<head>
  <title>
   Curug Ibun Pelangi
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;family=Roboto:wght@300;400;700&amp;display=swap" rel="stylesheet"/>
  <link href="style.css" rel="stylesheet"/>
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
            <a class="nav-link active" href="index.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pemesanan">FORM PEMESANAN</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="pemesanan" class="header">
      <header class="position-absolute top-0 end-0 d-flex justify-content-end">
      </header>
      <img alt="Scenic view of Curug Ibun Pelangi waterfall with a bridge over the river" height="1080" src="img/jembatan.jpg" width="1920"/>
      <div class="overlay">
    <h1>
     CURUG IBUN PELANGI
    </h1>
    <div class="location">
     <p>
      Sukasari Kaler, Kecamatan Argapura, Majalengka
     </p>
    </div>
    <div class="search">
     <input placeholder="Search..." type="text"/>
     <button>
      <i class="fas fa-search">
      </i>
     </button>
    </div>
   </div>
  </div>
  <div class="section-title">
   <h2>
    Curug
   </h2>
   <h3>
    IBUN PELANGI
   </h3>
  </div>
<body>
    <main id="pemesanan" class="flex-shrink-0">
        <div class="container">
          <form method="post" action="daftar.php">
      <div class="card mt-2">
        <div class="card-header bg-dark text-white">
          Form Pemesanan Paket Wisata
        </div>
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
            <input type="number" class="form-control" id="hari_wisata" value="1" name="hari_wisata" placeholder="Jumlah Hari Perjalanan" required>
          </div>
          </div>
          <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="paket_transport" value="1" id="paket_transport">
                <label class="form-check-label" for="paket_transport">
                  Transportasi (Rp.3.000)
                </label>
              </div>
          </div>
          <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="paket_makan" value="1" id="paket_makan">
                <label class="form-check-label" for="paket_makan">
                  Service/ Makan (Rp. 100.000)
                </label>
              </div>
          </div>
          <div class="mb-3">
            <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
            <input type="number" class="form-control" id="jumlah_peserta" value="1" name="jumlah_peserta" placeholder="Jumlah Hari Perjalanan" required>
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
      <script>
      //tentukan konstanta biaya masing-masing
      const paket_transport = 3000;
      const paket_makan = 100000;
      
      function updateTotalCost()
      {
          //inisisi harga paket 0
          let totalCost = 0;
          
          //referensi dari checkbox
          const inapCheckbox = document.getElementById('paket_inap');
          const transportCheckbox = document.getElementById('paket_transport');
          const makanCheckbox = document.getElementById('paket_makan');
          
          //jika inap checkbox ter-check
          if(inapCheckbox.checked)
          {
              totalCost+=paket_inap;
          }
          
          //jika transport checkbox ter-check
          if(transportCheckbox.checked)
          {
              totalCost+=paket_transport;
          }
          
          //jika makan checkbox ter-check
          if(makanCheckbox.checked)
          {
              totalCost+=paket_makan;
          }
          
          document.getElementById('harga').value = totalCost;
      }
      
      function updateTotal()
      {
          let TotalTagihan = 0;
          
          var hari_wisata = document.getElementById('hari_wisata').value;
          var jumlah_peserta = document.getElementById('jumlah_peserta').value;
          var harga = document.getElementById('harga').value;
          
          TotalTagihan = hari_wisata * jumlah_peserta * harga;
          
          document.getElementById('total').value = TotalTagihan;
      }
      
      document.getElementById('paket_inap').addEventListener('change', updateTotalCost);
      document.getElementById('paket_transport').addEventListener('change', updateTotalCost);
      document.getElementById('paket_makan').addEventListener('change', updateTotalCost);
      
      document.getElementById('paket_inap').addEventListener('change', updateTotal);
      document.getElementById('paket_transport').addEventListener('change', updateTotal);
      document.getElementById('paket_makan').addEventListener('change', updateTotal);
      
      document.getElementById('hari_wisata').addEventListener('change', updateTotalCost);
      document.getElementById('jumlah_peserta').addEventListener('change', updateTotalCost);
      
      document.getElementById('hari_wisata').addEventListener('change', updateTotal);
      document.getElementById('jumlah_peserta').addEventListener('change', updateTotal);
      
      updateTotalCost();
      updateTotal();
      </script>  </div>
      </main>
      <div style="background-image: url(img/bawah.png);" class="footer">
   <div class="footer-content">
    <div>
     <h4>
      About
     </h4>
     <p>
      Home
     </p>
     <p>
      Features
     </p>
     <p>
      Reviews
     </p>
     <p>
      Help &amp; Support
     </p>
    </div>
    <div>
     <h4>
      Contact Us
     </h4>
     <p>
      support@jalaninaja.com
     </p>
     <p>
      Jl. Pahlawan No. 123
     </p>
     <p>
      +62 838 9599 4855
     </p>
    </div>
   </div>
  </div>
</body>
</html>
</body>
</html>