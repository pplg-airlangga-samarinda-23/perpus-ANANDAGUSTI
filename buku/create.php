<?php
include __DIR__ . '/../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $stok = $_POST['stok'];

    $sql = "INSERT INTO buku (judul, pengarang, stok) VALUES (?, ?, ?)";

    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssi", $judul, $pengarang, $stok);
    $result = $stmt->execute();

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menambahkan buku";
    }
}
?>

<h1>Tambah Buku</h1>

<form action="" method="post">
    <div class="form-item">
        <label>Judul</label>
        <input type="text" name="judul" required>
    </div>

    <div class="form-item">
        <label>Pengarang</label>
        <input type="text" name="pengarang" required>
    </div>

    <div class="form-item">
        <label>Stok</label>
        <input type="number" name="stok" min="0" required>
    </div>

    <button type="submit">Tambah</button>
</form>
