<?php
require_once __DIR__ . '/../config/database.php';

class Mahasiswa {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM mahasiswa");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($data) {
        $stmt = $this->conn->prepare("INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (:nama, :nim, :jurusan)");
        $stmt->execute([
            ':nama' => $data['nama'],
            ':nim' => $data['nim'],
            ':jurusan' => $data['jurusan']
        ]);
    }

    public function delete($id)
{
    $stmt = $this->conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
    $stmt->execute([$id]);
}

public function getById($id)
{
    $stmt = $this->conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update($id, $data)
{
    $stmt = $this->conn->prepare("UPDATE mahasiswa SET nama = ?, nim = ?, jurusan = ? WHERE id = ?");
    $stmt->execute([
        $data['nama'],
        $data['nim'],
        $data['jurusan'],
        $id
    ]);
}


}
