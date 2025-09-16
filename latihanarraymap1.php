<?php
// Inisialisasi array data kosong
$data = [];

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil semua input yang dikirim
    for ($i = 0; $i < count($_POST['panggilan']); $i++) {
        if (!empty($_POST['panggilan'][$i]) && !empty($_POST['nama_lengkap'][$i]) && !empty($_POST['umur'][$i])) {
            $data[] = [
                "panggilan" => htmlspecialchars($_POST['panggilan'][$i]),
                "nama_lengkap" => htmlspecialchars($_POST['nama_lengkap'][$i]),
                "umur" => (int) $_POST['umur'][$i]
            ];
        }
    }
}

// Buat tabel dari data
$output = array_map(function($item) {
    return "<tr>
                <td>{$item['panggilan']}</td>
                <td>{$item['nama_lengkap']}</td>
                <td>{$item['umur']}</td>
            </tr>";
}, $data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Nama</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f6fa;
            padding: 40px;
        }
        form {
            margin-bottom: 30px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        input {
            margin: 5px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            padding: 10px 15px;
            background: #4a90e2;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #357ab8;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 14px 20px;
            text-align: left;
        }
        th {
            background: #4a90e2;
            color: #fff;
            font-size: 18px;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        tr:hover {
            background: #e6f0ff;
            transition: 0.3s;
        }
        caption {
            caption-side: top;
            margin-bottom: 15px;
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <form method="post">
        <h3>Input Data Nama</h3>
        <?php for ($i=0; $i<10; $i++): ?>
            <div>
                <input type="text" name="panggilan[]" placeholder="Nama Panggilan">
                <input type="text" name="nama_lengkap[]" placeholder="Nama Lengkap">
                <input type="number" name="umur[]" placeholder="Umur">
            </div>
        <?php endfor; ?>
        <button type="submit">Simpan Data</button>
    </form>

    <?php if (!empty($data)): ?>
    <table>
        <caption>Daftar Nama Lengkap dan Umur</caption>
        <thead>
            <tr>
                <th>Nama Panggilan</th>
                <th>Nama Lengkap</th>
                <th>Umur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($output as $row) echo $row; ?>
        </tbody>
    </table>
    <?php endif; ?>

</body>
</html>
