<?php
include __DIR__ . '/../koneksi.php';

/* AMBIL DATA BUKU */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM buku WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $book = $stmt->get_result()->fetch_assoc();

    if (!$book) {
        echo "Data buku tidak ditemukan";
        exit;
    }
}

/* PROSES UPDATE */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $stok = $_POST['stok'];

    $sql = "UPDATE buku SET judul=?, pengarang=?, stok=? WHERE id=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssii", $judul, $pengarang, $stok, $id);
    $result = $stmt->execute();

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal update data";
    }
}
?>

<h1>Edit Buku</h1>

<form method="post">
    <div class="form-item">
        <label>Judul</label>
        <input type="text" name="judul" value="<?= htmlspecialchars($book['judul']); ?>" required>
    </div>

    <div class="form-item">
        <label>Pengarang</label>
        <input type="text" name="pengarang" value="<?= htmlspecialchars($book['pengarang']); ?>" required>
    </div>

    <div class="form-item">
        <label>Stok</label>
        <input type="number" name="stok" value="<?= $book['stok']; ?>" min="0" required>
    </div>

    <button type="submit">Edit</button>
</form>
