<?php
require_once __DIR__ . '/model/Mahasiswa.php';

$model = new Mahasiswa();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$data = $model->getById($id);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model->update($id, [
        'nama' => $_POST['nama'],
        'nim' => $_POST['nim'],
        'jurusan' => $_POST['jurusan'],
        'alamat' => $_POST['alamat'],
        'telepon' => $_POST['telepon']
    ]);
    header("Location: index.php?updated=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Edit Data Mahasiswa</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" id="nim" name="nim" class="form-control" value="<?= htmlspecialchars($data['nim']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <select id="jurusan" name="jurusan" class="form-select" required>
                        <?php
                        $jurusan_list = [
                            "Informatika", "Sistem Informasi", "Teknik Elektro",
                            "Teknik Industri", "Desain Komunikasi Visual",
                            "Manajemen", "Akuntansi"
                        ];
                        foreach ($jurusan_list as $j) {
                            $selected = $data['jurusan'] === $j ? 'selected' : '';
                            echo "<option value=\"$j\" $selected>$j</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea id="alamat" name="alamat" class="form-control" rows="3" required><?= htmlspecialchars($data['alamat']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">No. Telepon</label>
                    <input type="text" id="telepon" name="telepon" class="form-control" value="<?= htmlspecialchars($data['telepon']) ?>" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="index.php" class="btn btn-secondary ms-2">Kembali</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
