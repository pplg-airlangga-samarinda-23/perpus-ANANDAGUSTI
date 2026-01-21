CREATE DATABASE perpus_B1;
USE perpus_B1;

CREATE TABLE pengguna (
    id_pengguna INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    peran ENUM('admin','petugas')
);

INSERT INTO pengguna VALUES
(NULL,'admin',MD5('admin'),'admin'),
(NULL,'petugas',MD5('petugas'),'petugas');

CREATE TABLE buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100),
    penulis VARCHAR(100),
    stok INT DEFAULT 1
);

CREATE TABLE peminjaman (
    id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    no_kartu VARCHAR(30),
    nama_peminjam VARCHAR(100),
    id_buku INT,
    tanggal_pinjam DATE,
    tanggal_kembali DATE,
    nama_petugas VARCHAR(100),
    status ENUM('dipinjam','dikembalikan') DEFAULT 'dipinjam',
    FOREIGN KEY (id_buku) REFERENCES buku(id_buku)
);
