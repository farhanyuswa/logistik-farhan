
-- SQL Dump for db_logistik_farhan
CREATE DATABASE IF NOT EXISTS db_logistik_farhan CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_logistik_farhan;

-- Drop tables if exist
DROP TABLE IF EXISTS barang_keluars;
DROP TABLE IF EXISTS barang_masuks;
DROP TABLE IF EXISTS barangs;

-- Create master table barangs
CREATE TABLE barangs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_barang VARCHAR(50) UNIQUE,
    nama_barang VARCHAR(100),
    gambar VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create table barang_masuks
CREATE TABLE barang_masuks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    no_barang_masuk VARCHAR(50) UNIQUE,
    kode_barang VARCHAR(50),
    quantity INT,
    origin VARCHAR(100),
    tanggal_masuk DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (kode_barang) REFERENCES barangs(kode_barang) ON DELETE CASCADE
);

-- Create table barang_keluars
CREATE TABLE barang_keluars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    no_barang_keluar VARCHAR(50) UNIQUE,
    kode_barang VARCHAR(50),
    quantity INT,
    destination VARCHAR(100),
    tanggal_keluar DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (kode_barang) REFERENCES barangs(kode_barang) ON DELETE CASCADE
);

-- Dummy data: barangs
INSERT INTO barangs (kode_barang, nama_barang, gambar, created_at, updated_at) VALUES
('BRG001','Kabel LAN','barang/placeholder.jpg', NOW(), NOW()),
('BRG002','Switch Hub','barang/placeholder.jpg', NOW(), NOW()),
('BRG003','Router','barang/placeholder.jpg', NOW(), NOW()),
('BRG004','UPS','barang/placeholder.jpg', NOW(), NOW()),
('BRG005','Monitor','barang/placeholder.jpg', NOW(), NOW()),
('BRG006','Mouse','barang/placeholder.jpg', NOW(), NOW()),
('BRG007','Keyboard','barang/placeholder.jpg', NOW(), NOW()),
('BRG008','Flashdisk','barang/placeholder.jpg', NOW(), NOW()),
('BRG009','HDD Eksternal','barang/placeholder.jpg', NOW(), NOW()),
('BRG010','Webcam','barang/placeholder.jpg', NOW(), NOW()),
('BRG011','Speaker','barang/placeholder.jpg', NOW(), NOW()),
('BRG012','Headset','barang/placeholder.jpg', NOW(), NOW()),
('BRG013','Printer','barang/placeholder.jpg', NOW(), NOW()),
('BRG014','Scanner','barang/placeholder.jpg', NOW(), NOW()),
('BRG015','Projector','barang/placeholder.jpg', NOW(), NOW());

-- Dummy data: barang_masuks
INSERT INTO barang_masuks (no_barang_masuk, kode_barang, quantity, origin, tanggal_masuk) VALUES
('BM001','BRG001',20,'Jakarta','2025-04-20'),
('BM002','BRG002',15,'Bandung','2025-04-21'),
('BM003','BRG003',10,'Surabaya','2025-04-22'),
('BM004','BRG004',25,'Medan','2025-04-23'),
('BM005','BRG005',30,'Yogyakarta','2025-04-24'),
('BM006','BRG006',12,'Semarang','2025-04-25'),
('BM007','BRG007',18,'Bali','2025-04-26'),
('BM008','BRG008',22,'Makassar','2025-04-27'),
('BM009','BRG009',14,'Palembang','2025-04-28'),
('BM010','BRG010',16,'Malang','2025-04-29');

-- Dummy data: barang_keluars
INSERT INTO barang_keluars (no_barang_keluar, kode_barang, quantity, destination, tanggal_keluar) VALUES
('BK001','BRG001',5,'Bogor','2025-04-30'),
('BK002','BRG002',3,'Depok','2025-05-01'),
('BK003','BRG003',2,'Tangerang','2025-05-01'),
('BK004','BRG004',10,'Bekasi','2025-05-02'),
('BK005','BRG005',7,'Cirebon','2025-05-02');

