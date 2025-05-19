-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: May 19, 2025 at 01:30 AM
-- Server version: 8.0.42
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `st-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ordenes_servicio`
--

CREATE TABLE `ordenes_servicio` (
  `id` int NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `dato_contacto` varchar(100) NOT NULL,
  `tipo_dispositivo` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `descripcion` text,
  `diagnostico_tecnico` text,
  `fecha_ingreso` date NOT NULL,
  `estado` varchar(50) DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ordenes_servicio`
--

INSERT INTO `ordenes_servicio` (`id`, `nombre_cliente`, `dato_contacto`, `tipo_dispositivo`, `marca`, `modelo`, `descripcion`, `diagnostico_tecnico`, `fecha_ingreso`, `estado`) VALUES
(1, 'Carlos Ramírez', 'c.ramirez@example.com', 'Laptop', 'HP', 'Pavilion 15', 'No enciende al presionar el botón de encendido.', 'Fuente de poder defectuosa, se requiere reemplazo.', '2025-05-15', 'En Proceso'),
(2, 'María González', '+56 9 1234 5678', 'Smartphone', 'Samsung', 'Galaxy S21', 'Pantalla quebrada por caída.', 'Pantalla LCD y digitalizador deben ser reemplazados.', '2025-05-14', 'Pendiente'),
(3, 'Javier Soto', 'j.soto@empresa.cl', 'Tablet', 'Apple', 'iPad Air 4', 'No carga correctamente.', 'Puerto de carga dañado. Requiere cambio.', '2025-05-10', 'Finalizado'),
(4, 'Lucía Fernández', '+56 9 8765 4321', 'PC de Escritorio', 'Dell', 'OptiPlex 7070', 'No arranca el sistema operativo.', 'Disco duro dañado. Se recomienda reemplazo y reinstalación de sistema.', '2025-05-13', 'En Proceso'),
(5, 'Andrés Muñoz', 'a.munoz@gmail.com', 'Impresora', 'Epson', 'EcoTank L3150', 'No imprime a color.', 'Cabezal de impresión obstruido. Se sugiere limpieza técnica.', '2025-05-11', 'Pendiente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ordenes_servicio`
--
ALTER TABLE `ordenes_servicio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ordenes_servicio`
--
ALTER TABLE `ordenes_servicio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
