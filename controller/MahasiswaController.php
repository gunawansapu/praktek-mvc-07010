<?php
require_once __DIR__ . '/../model/Mahasiswa.php';

class MahasiswaController {
    private $model;

    public function __construct() {
        $this->model = new Mahasiswa();
    }

    public function handleRequest() {
    // Tambah data
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $this->model->add([
            'nama' => $_POST['nama'],
            'nim' => $_POST['nim'],
            'jurusan' => $_POST['jurusan']
        ]);
        header("Location: index.php?success=1");
        exit;
    }

    // Hapus data
    if (isset($_GET['delete'])) {
        $this->model->delete($_GET['delete']);
        header("Location: index.php");
        exit;
    }

    $mahasiswa = $this->model->getAll();
    include __DIR__ . '/../view/mahasiswa_view.php';
}

}
