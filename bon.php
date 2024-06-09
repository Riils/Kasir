<?php
session_start();
$total_belanja = 0;
foreach ($_SESSION['pembelajaan'] as $belan => $b) {
    $total_belanja += $b['harga'] * $b['jumlah'];
}
$bayar = $_SESSION['bayar'] - $total_belanja;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bon</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        body {
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .mid {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        .judul {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        h1 {
            font-weight: 300;
            color: #525CEB;
            font-size: 24px;
        }

        .random {
            margin-bottom: 40px;
        }

        .rand,
        .alon {
            margin-bottom: 10px;
        }

        h4 {
            font-weight: 400;
            color: #333;
        }

        .nama {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .harga,
        .jumlah {
            text-align: right;
        }

        .total {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #333;
        }

        .ref {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        a:link,
        a:visited {
            background-color: darkgreen;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        a:hover,
        a:active {
            background-color: green;
        }

        button {
            background-color: darkgreen;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: green;
        }
    </style>
    <script>
        function updateDateTime() {
            const dateElement = document.getElementById('liveDate');
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };
            const formattedDate = now.toLocaleDateString('id-ID', options);
            dateElement.innerHTML = formattedDate;
        }

        setInterval(updateDateTime, 1000);

        function printPage() {
            window.print();
        }
    </script>
</head>

<body onload="updateDateTime()">
    <div class="mid">
        <div class="container">
            <div class="judul">
                <h1>Bukti Pembayaran</h1>
            </div>
            <div class="random">
                <div class="rand">
                    <h4>No.Transaksi#<?= rand() ?></h4>
                </div>
                <div class="alon">
                    <h4>Bulan, Tanggal# <span id="liveDate"></span></h4>
                </div>
            </div>
            <hr>
            <?php
            foreach ($_SESSION['pembelajaan'] as $belan => $b) :
            ?>
                <div class="nama">
                    <p><?= $b['barang'] ?></p>
                    <div class="harga">
                        <p>Rp. <?= number_format($b['harga'], 0, ',', '.') ?></p>
                        <div class="jumlah">
                            <p><b>x<?= $b['jumlah'] ?></b></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr>
            <div class="total">
                <p>Uang yang dibayarkan adalah</p>
                <div class="uang">
                    <p>Rp. <?= number_format($_SESSION['bayar'], 0, ',', '.') ?></p>
                </div>
            </div>
            <div class="total">
                <p>Total harga</p>
                <div class="uang">
                    <p>Rp. <?= number_format($total_belanja, 0, ',', '.') ?></p>
                </div>
            </div>
            <div class="total">
                <p>Kembalian</p>
                <div class="uang">
                    <p>Rp. <?= number_format($bayar, 0, ',', '.') ?></p>
                </div>
            </div>
            <div class="ref">
                <p>Terimakasih telah berbelanja di toko <b>Purils</b></p>
                <a href="index.php" onclick="<?php session_destroy(); ?>">Kembali</a>
            </div>
            <div class="ref">
                <button onclick="printPage()">Cetak</button>
            </div>
        </div>
    </div>
</body>

</html>
