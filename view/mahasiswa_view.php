<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="bg-light">
<div class="container py-5">

    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success text-center">Data berhasil ditambahkan!</div>
    <?php elseif (isset($_GET['updated'])): ?>
        <div class="alert alert-info text-center">Data berhasil diperbarui!</div>
    <?php elseif (isset($_GET['deleted'])): ?>
        <div class="alert alert-warning text-center">Data berhasil dihapus!</div>
    <?php endif; ?>

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Tambah Mahasiswa</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <select name="jurusan" class="form-select" required>
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Industri">Teknik Industri</option>
                        <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                        <option value="Manajemen">Manajemen</option>
                        <option value="Akuntansi">Akuntansi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" name="telepon" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Tambah Mahasiswa</button>
            </form>
        </div>
    </div>

    <div class="mt-5">
        <h4 class="mb-3">Daftar Mahasiswa</h4>

        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari berdasarkan semua kolom...">
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle" id="mahasiswaTable">
                <thead class="table-primary">
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($mahasiswa) && is_array($mahasiswa)): ?>
                    <?php foreach ($mahasiswa as $mhs): ?>
                        <tr>
                            <td><?= htmlspecialchars($mhs['nama']) ?></td>
                            <td><?= htmlspecialchars($mhs['nim']) ?></td>
                            <td><?= htmlspecialchars($mhs['jurusan']) ?></td>
                            <td><?= htmlspecialchars($mhs['alamat']) ?></td>
                            <td><?= htmlspecialchars($mhs['telepon']) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $mhs['id'] ?>" class="btn btn-info btn-sm me-1">✎ Edit</a>
                                <a href="index.php?delete=<?= $mhs['id'] ?>" 
                                   onclick="return confirm('Yakin ingin menghapus data ini?')" 
                                   class="btn btn-danger btn-sm">🗑 Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="text-center">Belum ada data mahasiswa.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- jQuery Filter -->
<script>
    $(document).ready(function () {
        $("#searchInput").on("keyup", function () {
            let value = $(this).val().toLowerCase();
            $("#mahasiswaTable tbody tr").filter(function () {
                $(this).toggle(
                    $(this).text().toLowerCase().indexOf(value) > -1
                );
            });
        });
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
