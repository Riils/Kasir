<?php
require_once "logika.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Purils</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: darkolivegreen;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .mid {
            text-align: center;
            margin-bottom: 20px;
        }

        .mid h1 {
            color: #007bff;
        }

        form {
            background-color:greenyellow;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto 20px;
        }

        form div {
            margin-bottom: 15px;
        }

        form input {
            width: calc(100% - 22px);
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: greenyellow;
        }

        td button {
            background-color: darkgreen;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        td button:hover {
            background-color: green;
        }
.bg{
    background-color: whitesmoke    ;
}
        

        @media (max-width: 600px) {
            form {
                padding: 15px;
            }

            form input {
                font-size: 0.9em;
            }

            form button {
                font-size: 0.9em;
                padding: 8px;
            }

            table, th, td {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="mid">
        <h1>Masukan Belajaan</h1>
    </div>
    <form action="" method="post">
        <div class="barang">
            <input type="text" name="barang" placeholder="Masukan Barang" required>
        </div>
        <div class="harga">
            <input type="number" name="harga" placeholder="Harga" required>
        </div>
        <div class="jumlah">
            <input type="number" name="jumlah" placeholder="Jumlah" required>
        </div>
        <div class="btn_tambah">
            <button type="submit" name="tambah">Tambah</button>
        </div>
    </form>
    <br>
    <div class="bg">
    <table border="1" cellpadding="6" cellspacing="6">
       
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        </div>
        <?php
        $i = 1;
        $total_belanja = 0;
        $item_exists = false;
        foreach ($_SESSION['pembelajaan'] as $belan => $b) :
            $total_belanja += $b['harga'] * $b['jumlah'];
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= htmlspecialchars($b['barang']) ?></td>
            <td><?= "Rp." . number_format($b['harga'], 0, ',', '.') ?></td>
            <td><?= htmlspecialchars($b['jumlah']) ?></td>
            <td><?= number_format($b['harga'] * $b['jumlah'], 0, ',', '.') ?></td>
            <td>
                <div class="hapus"></div>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="hapus_key" value="<?= $belan ?>">
                    <button type="submit" name="hapus">Hapus</button>
                </form>    
                </div>
            </td>
        </tr>
        <?php $i++; endforeach; ?>
        <tr>
            <td colspan="5"> Total Barang</td>
            <td><?= count($_SESSION['pembelajaan']) ?></td>
        </tr>
        <tr>
            <td colspan="5">Total Belanja</td>
            <td><?= "Rp." . number_format($total_belanja, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td colspan="6">
                <form action="" method="post">
                    <button type="submit" name="bayar">Bayar</button>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>