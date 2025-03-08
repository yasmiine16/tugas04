<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Konversi foto ke base64
    $foto_base64 = '';
    if (!empty($_FILES['foto']['tmp_name'])) {
        $foto_data = file_get_contents($_FILES['foto']['tmp_name']);
        $foto_base64 = 'data:' . $_FILES['foto']['type'] . ';base64,' . base64_encode($foto_data);
    }

    $_SESSION['cv_data'] = [
        'deskripsi' => $_POST['deskripsi'],
        'nama' => $_POST['nama'],
        'ttl' => $_POST['ttl'],
        'no_telp' => $_POST['no_telp'],
        'alamat' => $_POST['alamat'],
        'hobi' => $_POST['hobi'],
        'skill' => $_POST['skill'],
        'status' => $_POST['status'],
        'pendidikan' => $_POST['pendidikan'],
        'portofolio' => $_POST['portofolio'],
        'foto' => $foto_base64
    ];

    header("Location: cv_display.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form CV</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Buat CV</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="deskripsi">Deskripsi Singkat:</label>
            <textarea name="deskripsi" id="deskripsi" required></textarea>

            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="ttl">Tempat, Tanggal Lahir:</label>
            <input type="text" name="ttl" id="ttl" required>

            <label for="no_telp">Nomor Telepon:</label>
            <input type="text" name="no_telp" id="no_telp" required>

            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" required>

            <label for="hobi">Hobi:</label>
            <input type="text" name="hobi" id="hobi" required>

            <label for="skill">Skill:</label>
            <input type="text" name="skill" id="skill" required>

            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="pelajar">Pelajar</option>
                <option value="bekerja">Bekerja</option>
                <option value="tidak bekerja">Tidak Bekerja</option>
                <option value="belum sekolah">Belum Sekolah</option>
            </select>

            <label for="pendidikan">Riwayat Pendidikan:</label>
            <textarea name="pendidikan" id="pendidikan" required></textarea>

            <label for="portofolio">Portofolio (Opsional):</label>
            <input type="text" name="portofolio" id="portofolio">

            <label for="foto">Pas Foto:</label>
            <input type="file" name="foto" id="foto" required>

            <button type="submit">Submit</button>
        </form>
        <a href="cv_display.php?logout=1">Logout</a>
    </div>
</body>
</html>