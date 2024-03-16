<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hitung Umur dan Gaji</title>
</head>
<body>

<?php
// Fungsi untuk menghitung umur berdasarkan tanggal lahir
function hitungUmur($tanggal_lahir) {
    $tgl_lahir = new DateTime($tanggal_lahir);
    $today = new DateTime('today');
    $umur = $today->diff($tgl_lahir)->y;
    return $umur;
}

// Fungsi untuk menampilkan gaji berdasarkan pekerjaan
function hitungGaji($pekerjaan) {
    switch ($pekerjaan) {
        case 'Pegawai':
            return 5000000;
            break;
        case 'Manager':
            return 15000000;
            break;
        case 'Direktur':
            return 20000000;
            break;
        default:
            return 0;
            break;
    }
}

// Memproses form jika telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $pekerjaan = $_POST["pekerjaan"];

    // Hitung umur berdasarkan tanggal lahir
    $umur = hitungUmur($tanggal_lahir);

    // Hitung gaji berdasarkan pekerjaan
    $gaji = hitungGaji($pekerjaan);

    // Tampilkan output
    echo "<h2>Output:</h2>";
    echo "<p>Nama: $nama</p>";
    echo "<p>Umur: $umur tahun</p>";
    echo "<p>Pekerjaan: $pekerjaan</p>";
    echo "<p>Gaji: Rp " . number_format($gaji, 0, ',', '.') . "</p>";
}
?>

<h2>Form Input</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama" required><br><br>
    <label for="tanggal_lahir">Tanggal Lahir:</label><br>
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br><br>
    <label for="pekerjaan">Pekerjaan:</label><br>
    <select id="pekerjaan" name="pekerjaan" required>
        <option value="Pegawai">Pegawai</option>
        <option value="Manager">Manager</option>
        <option value="Direktur">Direktur</option>
    </select><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>