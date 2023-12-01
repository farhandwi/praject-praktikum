<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hasil Perhitungan IPK dan Status Kelulusan</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mendapatkan nilai array dari input checkbox
        $countNilai = count($_POST["nilai"]);
        $values = $_POST["nilai"];
        $jumlah = 0;
        $statusKelulusan = "Tidak Lulus";
        foreach ($values as $value) {
            $jumlah += $value;
        }
        $IPK = ($jumlah/($countNilai*100))*4;
        if ($IPK >= 1.0) {
            $statusKelulusan = "Lulus";

        }
    }
    ?>
    <h4>IPK: <?=$IPK ?></h4>
    <h4>Status Kelulusan: <?= $statusKelulusan ?></h4>
    <a href="index.html">Kembali</a>
</body>
</html>
