<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $orang = [];
    for ($i = 0; $i < 10; $i++) {
        $orang[] = [
            "nama_panggilan" => $_POST["nama_panggilan"][$i],
            "nama_lengkap"   => $_POST["nama_lengkap"][$i],
            "umur"           => $_POST["umur"][$i]
        ];
    }

    
    echo "<h2>Data yang Dimasukkan</h2>";
    foreach ($orang as $index => $data) {
        echo "<b>Data ke-" . ($index + 1) . "</b><br>";
        echo "Nama Panggilan: " . htmlspecialchars($data["nama_panggilan"]) . "<br>";
        echo "Nama Lengkap: " . htmlspecialchars($data["nama_lengkap"]) . "<br>";
        echo "Umur: " . htmlspecialchars($data["umur"]) . " tahun<br><br>";
    }
}
?>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Input Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url("https://wallpapercave.com/wp/wp11456485.jpg") no-repeat center center fixed;
            background-size: cover;
        }

        form {
            max-width: 600px;
            margin: 30px auto;
            background: linear-gradient(180deg, #8bc34a42, #ccdc3933);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffffff;
            box-shadow: 10px 4px 8px rgba(0,0,0,0.3);
            background-color: #006421ff;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            margin-top: 10px;
        }

        input[type="submit"] {
            background-color: #2196F3;
            color: white;
            margin-right: 10px;
        }

        input[type="submit"]:hover {
            background-color: #1976D2;
        }

        input[type="reset"] {
            background-color: #9E9E9E;
            color: white;
        }

        input[type="reset"]:hover {
            background-color: #757575;
        }

        .group {
            border: 1px solid #bbb;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            background: #f9f9f9;
        }

        .group h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <form method="post">
        <h2>Form Input Data (10 Orang)</h2>
        <?php for ($i = 0; $i < 10; $i++): ?>
            <div class="group">
                <h3>Data ke-<?= $i+1; ?></h3>
                <label>Nama Panggilan:</label>
                <input type="text" name="nama_panggilan[]" required>

                <label>Nama Lengkap:</label>
                <input type="text" name="nama_lengkap[]" required>

                <label>Umur:</label>
                <input type="number" name="umur[]" min="1" required>
            </div>
        <?php endfor; ?>

        <input type="submit" value="Kirim">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
