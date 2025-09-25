<!DOCTYPE html>
<html>
<head>
    <title>Form Biodata Siswa (Metode Array)</title>
</head>
<body>

<?php
// Step 1: Cek apakah jumlah data sudah diinput
if (!isset($_POST['jumlah'])) {
?>

    <h2>Masukkan Jumlah Data Siswa</h2>
    <form method="post">
        Jumlah Siswa: <input type="number" name="jumlah" min="1" required>
        <input type="submit" value="Lanjut">
    </form>

<?php
} elseif (!isset($_POST['simpan'])) {
    // Step 2: Tampilkan form input berdasarkan jumlah
    $jumlah = $_POST['jumlah'];
?>

    <h2>Input Data Siswa</h2>
    <form method="post">
        <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
        <?php
        for ($i = 0; $i < $jumlah; $i++) {
            echo "<fieldset>";
            echo "<legend>Data Siswa " . ($i + 1) . "</legend>";
            echo "NISN: <input type='text' name='data[$i][nisn]' required><br>";
            echo "Nama Panjang: <input type='text' name='data[$i][nama]' required><br>";
            echo "Alamat: <input type='text' name='data[$i][alamat]' required><br>";
            echo "</fieldset><br>";
        }
        ?>
        <input type="submit" name="simpan" value="Simpan dan Tampilkan Data">
    </form>

<?php
} else {
    // Step 3: Tampilkan hasil data
    $data_siswa = $_POST['data'];
?>

    <h2>Data Siswa yang Diinput</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama Panjang</th>
            <th>Alamat</th>
        </tr>
        <?php
        foreach ($data_siswa as $index => $siswa) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>" . htmlspecialchars($siswa['nisn']) . "</td>";
            echo "<td>" . htmlspecialchars($siswa['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($siswa['alamat']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

<?php
}
?>

</body>
</html>