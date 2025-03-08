<?php
session_start();

if (!isset($_SESSION['email']) || !isset($_SESSION['cv_data'])) {
    header("Location: index.php");
    exit();
}

$cv_data = $_SESSION['cv_data'];

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 04</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Curriculum Vitae</h1>
        <div class="cv-container">
            <div class="foto">
                <?php if (!empty($cv_data['foto'])): ?>
                    <img src="<?php echo $cv_data['foto']; ?>" alt="Pas Foto">
                <?php else: ?>
                    <p>Tidak ada foto</p>
                <?php endif; ?>
            </div>
            <div class="deskripsi">
                <h2>Yasmine Nailatul</h2>
                <p><?php echo $cv_data['deskripsi']; ?></p>
            </div>
        </div>
        <div class="biodata">
            <h2>Biodata</h2>
            <p><strong>Nama Lengkap:</strong> <?php echo $cv_data['nama']; ?></p>
            <p><strong>Tempat, Tanggal Lahir:</strong> <?php echo $cv_data['ttl']; ?></p>
            <p><strong>Nomor Telepon:</strong> <?php echo $cv_data['no_telp']; ?></p>
            <p><strong>Alamat:</strong> <?php echo $cv_data['alamat']; ?></p>
            <p><strong>Hobi:</strong> <?php echo $cv_data['hobi']; ?></p>
            <p><strong>Skill/Kelebihan Diri:</strong> <?php echo $cv_data['skill']; ?></p>
            <p><strong>Status:</strong> <?php echo $cv_data['status']; ?></p>
            <p><strong>Riwayat Pendidikan:</strong> <?php echo $cv_data['pendidikan']; ?></p>
            <?php if (!empty($cv_data['portofolio'])): ?>
                <p><strong>Portofolio (opsional):</strong> <?php echo $cv_data['portofolio']; ?></p>
            <?php endif; ?>
        </div>
        <a href="?logout=1">Logout</a>
    </div>
</body>
</html>