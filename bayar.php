<?php
session_start();
$total_belanja = 0;
foreach ($_SESSION['pembelajaan'] as $b) {
    $total_belanja += $b['harga'] * $b['jumlah'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        body {
            background-color: #f0f2f5;
        }

        .mid {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .tengah {
            background-color: darkolivegreen;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .judul {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        h2 {
            font-size: 32px;
            color:pink;
        }

        p {
            font-size: 18px;
            color: pink;
            margin-bottom: 10px;
        }

        input[type="number"] {
            width: 100%;
            height: 45px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            transition: 0.5s;
            font-size: 16px;
            padding: 10px;
        }

        input[type="number"]:hover {
            background-color: darkgreen;
            border: 1px solid green     ;
        }

        .echo {
            color: red;
            font-style: italic;
            margin-bottom: 10px;
        }

        h3 {
            font-size: 20px;
            color: pink;
            margin-bottom: 20px;
        }

        button {
            width: 100%;
            height: 45px;
            border-radius: 5px;
            border: none;
            margin-bottom: 10px;
            margin-top: 10px;
            transition: 0.5s;
            color: pink;
            background-color:darkgreen;
            font-size: 18px;
            cursor: pointer;
        }

        button:hover {
            background-color: green;
        }

        a:link,
        a:visited {
            background-color:darkgreen;
            color: pink;
            width: 100%;
            height: 45px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            line-height: 45px;
            font-size: 18px;
            transition: 0.5s;
        }

        a:hover,
        a:active {
            background-color: green;
        }

        .pember {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="mid">
        <div class="tengah">
            <div class="judul">
                <h2>Bayar Sekarang</h2>
            </div>
            <div class="masukan">
                <p>Masukan Nominal Uang</p>
            </div>
            <form action="" method="post">
                <div class="bayar">
                    <input type="number" name="bayar" placeholder="Pastikan uang yang Anda masukan cukup" required>
                </div>
                <div class="pember">
                    <h3>Uang yang harus Anda bayarkan adalah <?= "Rp." . number_format($total_belanja, 0, ',', '.'); ?></h3>
                </div>
                <?php
                if (isset($_POST['cash'])) {
                    $uang = $_POST['bayar'];
                    $bayar = $uang - $total_belanja;
                    if ($bayar < 0) {
                        echo "<p class='echo'>Uang anda kurang Rp. " . number_format(abs($bayar), 0, ',', '.') . "!!</p>";
                    } else {
                        $_SESSION['kembalian'] = $bayar;
                        $_SESSION['bayar'] = $uang;
                        header("Location: bon.php");
                        exit();
                    }
                }
                ?>
                <div class="tbn_bayar">
                    <button type="submit" name="cash">Bayar</button>
                </div>
                <a href="index.php">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>
