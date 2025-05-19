-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: May 19, 2025 at 05:19 PM
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
  `fecha_entrega` int DEFAULT NULL,
  `estado` varchar(50) DEFAULT 'Pendiente',
  `tecnico_encargado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ordenes_servicio`
--

INSERT INTO `ordenes_servicio` (`id`, `nombre_cliente`, `dato_contacto`, `tipo_dispositivo`, `marca`, `modelo`, `descripcion`, `diagnostico_tecnico`, `fecha_ingreso`, `fecha_entrega`, `estado`, `tecnico_encargado`) VALUES
(1, 'Carlos Pérez', 'carlos.perez@gmail.com', 'Laptop', 'Dell', 'Inspiron 15', 'No enciende.', 'Fallo en la fuente de poder.', '2025-05-01', 20250505, 'Reparado', 'Técnico A'),
(2, 'Ana Torres', 'ana.torres@yahoo.com', 'Celular', 'Samsung', 'Galaxy A52', 'Pantalla rota.', 'Reemplazo de display.', '2025-05-02', 20250507, 'En proceso', 'Técnico B'),
(3, 'Luis Martínez', 'luismtz@hotmail.com', 'Tablet', 'Apple', 'iPad Air 4', 'No carga.', 'Puerto de carga dañado.', '2025-05-03', 20250509, 'Pendiente', 'Técnico A'),
(4, 'María Gómez', 'mariag@example.com', 'PC de escritorio', 'HP', 'Pavilion', 'Ruido al encender.', 'Fallo en ventilador.', '2025-05-04', 20250508, 'Reparado', 'Técnico C'),
(5, 'José Ramírez', 'jramirez@gmail.com', 'Laptop', 'Lenovo', 'ThinkPad T14', 'Teclado no responde.', 'Reemplazo de teclado.', '2025-05-05', 20250510, 'En espera de repuestos', 'Técnico B'),
(6, 'Lucía Navarro', 'lucia.nav@gmail.com', 'Celular', 'Xiaomi', 'Redmi Note 11', 'Batería se descarga rápido.', 'Reemplazo de batería.', '2025-05-06', 20250511, 'Reparado', 'Técnico A'),
(7, 'Pedro Sánchez', 'psanchez@outlook.com', 'Laptop', 'Acer', 'Aspire 5', 'Pantalla negra.', 'Inversor dañado.', '2025-05-07', 20250512, 'Pendiente', 'Técnico C'),
(8, 'Andrea Rivas', 'arivas@gmail.com', 'Celular', 'Motorola', 'Moto G Power', 'No prende.', 'Corto en placa base.', '2025-05-08', 20250514, 'No reparable', 'Técnico B'),
(9, 'Jorge Herrera', 'jorge.h@gmail.com', 'Tablet', 'Huawei', 'MediaPad T5', 'Reinicio constante.', 'Reinstalación de firmware.', '2025-05-09', 20250513, 'En proceso', 'Técnico A'),
(10, 'Sofía Díaz', 'sofiad@hotmail.com', 'PC de escritorio', 'ASUS', 'ROG Strix', 'No da video.', 'Fallo en tarjeta gráfica.', '2025-05-10', 20250515, 'Pendiente', 'Técnico C'),
(11, 'Ricardo Molina', 'rmolina@empresa.com', 'Laptop', 'Apple', 'MacBook Air M1', 'Teclado bloqueado.', 'Limpieza interna de componentes.', '2025-05-11', 20250517, 'Reparado', 'Técnico A'),
(12, 'Camila López', 'clopez@gmail.com', 'Celular', 'Realme', '8 Pro', 'Cámara borrosa.', 'Cambio de módulo óptico.', '2025-05-12', 20250516, 'En proceso', 'Técnico B'),
(13, 'Andrés Valle', 'andres.v@correo.com', 'Tablet', 'Samsung', 'Galaxy Tab S6', 'Táctil no responde.', 'Pantalla táctil defectuosa.', '2025-05-13', 20250518, 'Reparado', 'Técnico C'),
(14, 'Verónica Paredes', 'vparedes@empresa.com', 'Laptop', 'HP', 'EliteBook 840', 'Calentamiento excesivo.', 'Reemplazo de pasta térmica y limpieza.', '2025-05-14', 20250520, 'Pendiente', 'Técnico A'),
(15, 'Esteban Ruiz', 'eruiz@gmail.com', 'Celular', 'OnePlus', '9 Pro', 'Micrófono no funciona.', 'Sustitución de módulo de audio.', '2025-05-15', 20250521, 'En espera de repuestos', 'Técnico B'),
(16, 'Natalia Cabrera', 'nati.cabrera@gmail.com', 'Tablet', 'Lenovo', 'Tab M10', 'No carga batería.', 'Reemplazo de batería.', '2025-05-16', 20250522, 'Reparado', 'Técnico C'),
(17, 'Héctor Funes', 'hectorf@correo.com', 'Laptop', 'MSI', 'Modern 14', 'Pantalla con rayas.', 'Reemplazo de pantalla LCD.', '2025-05-17', 20250524, 'En proceso', 'Técnico A'),
(18, 'Isabel Castro', 'isacastro@outlook.com', 'Celular', 'ZTE', 'Blade V30', 'No reconoce SIM.', 'Daño en lector SIM.', '2025-05-18', 20250525, 'Pendiente', 'Técnico B'),
(19, 'Raúl Moreno', 'rmoreno@yahoo.com', 'PC de escritorio', 'Dell', 'OptiPlex 7090', 'Sistema no arranca.', 'Reinstalación de sistema operativo.', '2025-05-18', 20250526, 'Reparado', 'Técnico C'),
(20, 'Daniela Méndez', 'daniela.m@empresa.com', 'Laptop', 'Toshiba', 'Satellite C55', 'Teclado dañado.', 'Requiere reemplazo completo.', '2025-05-19', 20250528, 'En espera de repuestos', 'Técnico A');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
