<?php
include __DIR__ . '/../koneksi.php';

$sql = "SELECT * FROM buku";
$result = $koneksi->query($sql);

$books = [];
if ($result) {
    $books = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<h1>Data Buku</h1>
<a href="create.php">Tambah</a>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($books) > 0): ?>
            <?php $no = 1; foreach ($books as $book): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($book['judul']); ?></td>
                    <td><?= htmlspecialchars($book['pengarang']); ?></td>
                    <td><?= $book['stok']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $book['id']; ?>">Edit</a> |
                        <a href="delete.php?id=<?= $book['id']; ?>"
                           onclick="return confirm('Yakin mau hapus buku ini?')">
                           Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" align="center">Data buku kosong</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
