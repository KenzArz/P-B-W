<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kasir Toko Modern</title>
    <style>
        /* Menggunakan Style Konsisten dari Kasus Sebelumnya */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        header {
            background-color: #9c1328; /* Header Merah */
            color: white;
            text-align: center;
            padding: 25px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 25px;
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .content {
            flex: 2;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid #e0e0e0;
        }

        .sidebar {
            flex: 1;
            padding: 25px;
            background-color: #bdc3c7; /* Sidebar Abu-abu */
            border-radius: 12px;
            height: fit-content;
        }

        h2 {
            margin-bottom: 25px;
            color: #2c3e50;
            border-left: 5px solid #9c1328;
            padding-left: 15px;
        }

        /* Styling Form & Select Option */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #34495e;
        }

        select, input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        select:focus, input:focus {
            border-color: #9c1328;
            outline: none;
        }

        .btn-hitung {
            width: 100%;
            padding: 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-hitung:hover {
            background-color: #2980b9;
        }

        /* Struk Pembayaran */
        .struk {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            border: 1px dashed #7f8c8d;
        }

        .struk-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .total-row {
            font-weight: bold;
            font-size: 1.2rem;
            color: #c0392b;
            border-top: 2px solid #333;
            margin-top: 10px;
            padding-top: 10px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #2c3e50;
            color: white;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Selamat Datang di Website Sederhana</h1>
    </header>

    <div class="container">
        <main class="content">
            <h2>Pilih Barang Belanjaan</h2>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="barang">Pilih Produk:</label>
                    <select name="pilih_barang" id="barang" required>
                        <option value="">-- Silahkan Pilih --</option>
                        <option value="Keyboard">Keyboard - Rp 150.000</option>
                        <option value="Mouse">Mouse - Rp 80.000</option>
                        <option value="Monitor">Monitor - Rp 1.200.000</option>
                        <option value="Headset">Headset - Rp 250.000</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah Beli:</label>
                    <input type="number" name="jumlah" id="jumlah" min="1" value="1" required>
                </div>

                <button type="submit" name="hitung" class="btn-hitung">Hitung Total Bayar</button>
            </form>

            <?php
            if (isset($_POST['hitung'])) {
                // 1. Pajak dijadikan konstanta
                define("PAJAK", 0.10); 

                // 2. Data barang dalam array (untuk pencarian harga)
                $daftarHarga = [
                    "Keyboard" => 150000,
                    "Mouse" => 80000,
                    "Monitor" => 1200000,
                    "Headset" => 250000
                ];

                $namaBarang = $_POST['pilih_barang'];
                $hargaSatuan = $daftarHarga[$namaBarang];
                
                // 3. Jumlah beli dari variabel input
                $jumlah = $_POST['jumlah'];

                // 4. Perhitungan aritmatika
                $totalSebelumPajak = $hargaSatuan * $jumlah;
                $pajakNominal = $totalSebelumPajak * PAJAK;
                $totalAkhir = $totalSebelumPajak + $pajakNominal;

                function formatIDR($angka) {
                    return "Rp " . number_format($angka, 0, ',', '.');
                }
                ?>

                <div class="struk">
                    <h3>Perhitungan Total Pembelian (Dengan Array)</h3>
                    <div class="struk-row"><span>Nama Barang:</span> <span><?php echo $namaBarang; ?></span></div>
                    <div class="struk-row"><span>Harga Satuan:</span> <span><?php echo formatIDR($hargaSatuan); ?></span></div>
                    <div class="struk-row"><span>Jumlah Beli:</span> <span><?php echo $jumlah; ?></span></div>
                    <div class="struk-row"><span>Total Harga (Sebelum Pajak):</span> <span><?php echo formatIDR($totalSebelumPajak); ?></span></div>
                    <div class="struk-row"><span>Pajak (10%):</span> <span><?php echo formatIDR($pajakNominal); ?></span></div>
                    <div class="struk-row total-row"><span>Total Bayar:</span> <span><?php echo formatIDR($totalAkhir); ?></span></div>
                </div>
            <?php } ?>
        </main>

        <aside class="sidebar">
            <h3>Sidebar</h3>
            <p>Bagian sidebar dapat berisi tautan, iklan, atau informasi tambahan.</p>
        </aside>
    </div>

    <footer>
        <p>&copy; 2026 Halaman Web Altics, dibuat dengan cinta</p>
    </footer>

</body>
</html>