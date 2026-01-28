<?php
include __DIR__ . '/../koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM buku WHERE id = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id);
$result = $stmt->execute();

if ($result) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menghapus data";
}
