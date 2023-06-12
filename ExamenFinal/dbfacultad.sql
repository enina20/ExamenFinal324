-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 01:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdfacultad`
--

CREATE DATABASE IF NOT EXISTS `bdfacultad` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bdfacultad`;

-- --------------------------------------------------------

--
-- Table structure for table `flujousuario`
--

CREATE TABLE `flujousuario` (
  `id` int(11) NOT NULL,
  `flujo` varchar(5) DEFAULT NULL,
  `proceso` varchar(5) DEFAULT NULL,
  `CI` varchar(20) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `estado` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `flujousuario`
--

INSERT INTO `flujousuario` (`id`, `flujo`, `proceso`, `CI`, `usuario`, `fechainicio`, `celular`, `estado`) VALUES
(1, 'F2', 'P10', '10068493', 'Alex Vera Rojas', '2023-06-12', '76877612', 1),
(2, 'F2', 'P10', '10068493', 'Alex Vera Rojas', '2023-06-12', '76877612', 2);

-- --------------------------------------------------------

--
-- Table structure for table `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL,
  `CIestudiante` int(12) NOT NULL,
  `Sigla` varchar(10) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT 0,
  `nota1` decimal(4,2) DEFAULT NULL,
  `nota2` decimal(4,2) DEFAULT NULL,
  `nota3` decimal(4,2) DEFAULT NULL,
  `notafinal` decimal(4,2) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `CIestudiante`, `Sigla`, `estado`, `nota1`, `nota2`, `nota3`, `notafinal`, `Created_at`) VALUES
(1, 80654330, 'INF-111', 1, 70.00, 80.00, 90.00, 80.00, '2023-06-07 19:35:19'),
(2, 23446789, 'INF-111', 0, 60.00, 70.00, 80.00, 70.00, '2023-06-07 19:41:12'),
(3, 23456719, 'INF-111', 0, 80.00, 90.00, 99.99, 90.00, '2023-06-07 19:41:12'),
(4, 27654323, 'INF-111', 0, 65.00, 75.00, 85.00, 75.00, '2023-06-07 19:41:12'),
(5, 34565890, 'INF-111', 0, 90.00, 95.00, 99.99, 95.00, '2023-06-07 19:41:12'),
(7, 21459789, 'INF-111', 0, 75.00, 85.00, 95.00, 85.00, '2023-06-07 19:41:12'),
(24, 10068493, 'INF-111', 0, NULL, NULL, NULL, NULL, '2023-06-08 03:03:10'),
(25, 10068493, 'MAT-115', 0, NULL, NULL, NULL, NULL, '2023-06-08 03:03:10'),
(26, 10068493, 'INF-113', 1, NULL, NULL, NULL, NULL, '2023-06-08 03:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `sigla` varchar(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`sigla`, `nombre`, `semestre`) VALUES
('INF-111', 'Introduccion a la Programacion', 1),
('LAB-111', 'Laboratorio de INF-111', 1),
('INF-112', 'Organizacion de Computadoras', 1),
('INF-113', 'Laboratorio de Computacion', 1),
('MAT-114', 'Matematica Discreta I', 1),
('MAT-115', 'Analisis Matematico I', 1),
('LIN-116', 'Gramatica Espanola', 1),
('INF-121', 'Algoritmos y Programación', 2),
('LAB-121', 'Laboratorio de INF-121', 2),
('FIS-122', 'Física I', 2),
('LAB-122', 'Laboratorio de Física I', 2),
('MAT-123', 'Matemática Discreta II', 2),
('MAT-124', 'Álgebra Lineal', 2),
('MAT-125', 'Análisis Matemático II', 2),
('INF-131', 'Estructura de Datos y Algoritmos', 3),
('LAB-131', 'Laboratorio de INF-131', 3),
('FIS-132', 'Física II', 3),
('LAB-132', 'Laboratorio de Física II', 3),
('EST-133', 'Estadística I', 3),
('MAT-134', 'Análisis Matemático III', 3),
('LIN-135', 'Idioma I', 3),
('INF-141', 'Sistemas de Gestión', 4),
('INF-142', 'Fundamentos Digitales', 4),
('INF-143', 'Taller de Programación', 4),
('INF-144', 'Lógica para la Ciencia de la Computación', 4),
('EST-145', 'Estadística II', 4),
('INF-151', 'Sistemas Operativos', 5),
('INF-152', 'Sistemas de Información Gerencial', 5),
('INF-153', 'Assembler', 5),
('INF-154', 'Lenguajes Formales y Autómatas', 5),
('EST-155', 'Investigación de Operaciones I', 5),
('MAT-156', 'Análisis Numérico', 5),
('INF-161', 'Diseño y Administración de Base de Datos', 6),
('INF-162', 'Análisis y Diseño de Sistemas de Información', 6),
('INF-163', 'Ingeniería de Software', 6),
('INF-164', 'Teoría de la Información y Codificación', 6),
('EST-165', 'Investigación de Operaciones II', 6),
('INF-166', 'Informática y Sociedad', 6);

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `ci` int(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `semestre` int(3) NOT NULL DEFAULT 1,
  `departamento` char(2) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `fecha_nacimiento`, `telefono`, `semestre`, `departamento`, `Created_at`) VALUES
(1234560, 'Gabriel Torres', '1980-05-25', '(591)76202345', 1, 'LP', '2023-04-16 05:09:30'),
(10068493, 'Alex Vera Rojas', '2023-06-29', '76877612', 1, NULL, '2023-06-04 16:19:38'),
(12168411, 'Ricardo Rios', '0000-00-00', '', 1, '', '2023-06-04 20:15:42'),
(12345678, 'Antonio Corrales', '2000-04-12', '(591)75757575', 1, 'LP', '2023-04-16 05:09:30'),
(12349900, 'Juan Oro', NULL, NULL, 1, NULL, '2023-06-07 19:08:14'),
(17654322, 'Aitana Perez', '2000-12-01', '(591)61123456', 1, 'PT', '2023-04-16 05:15:16'),
(19168110, 'Jose Cruz', '2023-06-14', '76527677', 1, NULL, '2023-06-05 02:36:25'),
(19168411, 'Test', '2023-06-12', '76527616', 1, 'LP', '2023-06-02 23:59:42'),
(19968490, 'Ana Flores', NULL, NULL, 1, NULL, '2023-06-04 14:21:11'),
(21459789, 'Elena Torres', '1959-11-27', '(591)73123459', 1, 'CH', '2023-04-16 05:09:30'),
(23446789, 'Pedro Rojas', '1995-11-22', '(591)71987456', 1, 'RU', '2023-04-16 05:09:30'),
(23456719, 'Jorge Perez', '1978-03-13', '(591)73121456', 1, 'CH', '2023-04-16 05:09:30'),
(27654323, 'Waldir Gómez', '1995-05-15', '(591)62123456', 1, 'TA', '2023-04-16 05:15:16'),
(34565890, 'Ana Lopez', '1993-09-10', '(591)76001234', 1, 'PT', '2023-04-16 05:09:30'),
(34567290, 'Marcela Rojas', '1976-10-09', '(591)74112345', 1, 'CB', '2023-04-16 05:09:30'),
(37654324, 'Edson Vasquez', '1992-09-06', '(591)64123456', 1, 'RU', '2023-04-16 05:15:16'),
(45378901, 'Juan Castro', '1997-07-15', '(591)75892345', 1, 'CB', '2023-04-16 05:09:30'),
(45673901, 'Luisa Ramirez', '1974-06-17', '(591)71456729', 1, 'RU', '2023-04-16 05:09:30'),
(47654325, 'Rayza Gutierrez', '1987-11-23', '(591)65123456', 1, 'PD', '2023-04-16 05:15:16'),
(56789012, 'Miguel Mendez', '1972-02-23', '(591)76234367', 1, 'PT', '2023-04-16 05:09:30'),
(56789612, 'Jose Suarez', '1990-06-30', '(591)71345678', 1, 'TA', '2023-04-16 05:09:30'),
(57654326, 'Valhery Arce', '1984-02-17', '(591)66123456', 1, 'BE', '2023-04-16 05:15:16'),
(67654327, 'Brandon Torres', '2003-08-12', '(591)67123456', 1, 'SC', '2023-04-16 05:15:16'),
(67840123, 'Fernando Flores', '1970-01-01', '(591)71648901', 1, 'TA', '2023-04-16 05:09:30'),
(70123456, 'Silvia Gonzalez', '1963-05-22', '(591)71007876', 1, 'PD', '2023-04-16 05:09:30'),
(77654328, 'Reyna Sánchez', '1998-01-29', '(591)68123456', 1, 'LP', '2023-04-16 05:15:16'),
(78501234, 'Monica Sandoval', '1967-12-28', '(591)76504567', 1, 'SC', '2023-04-16 05:09:30'),
(78901274, 'Carla Fernandez', '1988-01-04', '(591)76009876', 1, 'SC', '2023-04-16 05:09:30'),
(80654330, 'Alan Flores', '1989-12-17', '(591)60123456', 1, 'RU', '2023-04-16 05:15:16'),
(82345678, 'Daniel Chavez', '1961-03-11', '(591)76002385', 1, 'LP', '2023-04-16 05:09:30'),
(82654321, 'Maria Perez', '1998-02-20', '(591)73234567', 1, 'CH', '2023-04-16 05:09:30'),
(86012345, 'Roberto Castro', '1965-09-14', '(591)76062345', 1, 'BE', '2023-04-16 05:09:30'),
(87654321, 'Ramon Rodriguez', '1997-03-28', '(591)63123456', 1, 'CB', '2023-04-16 05:15:16'),
(88654329, 'Victor Pacheco', '1990-06-22', '(591)69123456', 1, 'CH', '2023-04-16 05:15:16'),
(89012348, 'Pablo Morales', '1985-12-01', '(591)76234567', 1, 'BE', '2023-04-16 05:09:30'),
(90123459, 'Laura Rodriguez', '1983-08-19', '(591)79567890', 1, 'PD', '2023-04-16 05:09:30'),
(123499003, 'Juan Orom', NULL, NULL, 1, NULL, '2023-06-07 19:09:06'),
(879994321, 'Hugo Balboa', '1996-02-29', '68189959', 1, NULL, '2023-06-05 17:41:23'),
(1234554000, 'Juan Perez', NULL, NULL, 1, NULL, '2023-06-07 19:07:38'),
(1234554321, 'Juan Perez', NULL, NULL, 1, NULL, '2023-06-07 19:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `proceso`
--

CREATE TABLE `proceso` (
  `codFlujo` varchar(2) NOT NULL,
  `codProceso` varchar(5) NOT NULL,
  `procesoSig` varchar(5) NOT NULL,
  `tipo` varchar(5) NOT NULL,
  `pantalla` varchar(50) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proceso`
--

INSERT INTO `proceso` (`codFlujo`, `codProceso`, `procesoSig`, `tipo`, `pantalla`, `rol`) VALUES
('F1', 'P1', 'P2', 'I', 'informacionRequisitos', 'Estudiante'),
('F1', 'P2', 'P3', 'P', 'inscripcionCurso', 'Estudiante'),
('F1', 'P3', 'P4', 'P', 'inscripcionMateria', 'Estudiante'),
('F1', 'P4', 'Fin', 'F', 'misMaterias', 'Estudiante'),
('F1', 'P5', 'Fin', 'C', 'revisarInscripcion', 'Kardex'),
('F1', 'P6', 'Fin', 'F', 'inscripcionHabilitada', 'Kardex'),
('F1', 'P7', 'Fin', 'F', 'inscripcionDenegada', 'Kardex'),
('F2', 'P8', 'P9', 'I', 'informacionBeca', 'Estudiante'),
('F2', 'P9', 'P10', 'P', 'obtencionRequisitosBeca', 'Estudiante'),
('F2', 'P10', 'P11', 'F', 'inscripcionBeca', 'Estudiante'),
('F2', 'P12', 'Fin', 'C', 'revisarPostulacion', 'Kardex'),
('F2', 'P13', 'P15', 'P', 'postulacionAceptada', 'Kardex'),
('F2', 'P14', 'P16', 'P', 'postulacionRechazada', 'Kardex'),
('F2', 'P16', 'Fin', 'P', 'notificarPostulacionRechazada', 'Kardex'),
('F2', 'P15', 'Fin', 'P', 'notificarPostulacionAceptada', 'Kardex'),
('F2', 'P11', 'Fin', 'P', 'miPostulacion', 'Estudiante');

-- --------------------------------------------------------

--
-- Table structure for table `procesocondicionante`
--

CREATE TABLE `procesocondicionante` (
  `Flujo` varchar(3) DEFAULT NULL,
  `Proceso` varchar(3) DEFAULT NULL,
  `ProcesoSI` varchar(3) DEFAULT NULL,
  `ProcesoNO` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `procesocondicionante`
--

INSERT INTO `procesocondicionante` (`Flujo`, `Proceso`, `ProcesoSI`, `ProcesoNO`) VALUES
('F1', 'P5', 'P6', 'P7'),
('F2', 'P12', 'P13', 'P14');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `CI` int(12) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(24) NOT NULL DEFAULT 'Invitado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuario`
--Para ingresar las contrasenhas son: usuario: Alex Vera pass: avera123
--Para ingresar las contrasenhas son: usuario: Antonio Rojas pass: arojas123
--Para ingresar las contrasenhas son: usuario: Edson Nina pass: admin123
--

INSERT INTO `usuario` (`CI`, `Usuario`, `Password`, `Created_at`, `role`) VALUES
(10068493, 'Alex Vera', '$2y$10$Awy9avK70QSlpCprcvMmSuoWPagfGmuYAYJJvrxh8vuxVk4cB9cou', '2023-06-04 16:19:38', 'Estudiante'),
(10568488, 'Antonio Rojas', '$2y$10$1Fvk.EO3g/LqRwi9NWOnrez/ASRoR7fopm8IiCqXCS4FE/nOJkqXG', '2023-06-04 13:56:43', 'Estudiante'),
(10568493, 'enina', '$2y$10$Fz/KiksJz58k6d6.mMWXSeCCeJaIIqtiJiYDIiltzQ9reKb9U96qa', '2023-04-16 02:44:13', 'Invitado'),
(12168490, 'Mario Ruiz', '$2y$10$bWMaYkseY8OVM9..weOCx.8Q/cuKx97MBF5/0Cpy4AwyMhssTWux6', '2023-06-04 03:24:03', 'Invitado'),
(12349900, 'Juan Oro', '$2y$10$AbosMzLf2mvySjgGnXFDxelnNEndJoo4WJZJ4VBimvQXHqIU2cAaa', '2023-06-07 19:08:14', 'Estudiante'),
(19168110, 'Jose Cruz', '$2y$10$2644UNFQl2Rj0FbXnIOFTuuXgvN1EaDAhFcCF95myJP3OSjTbZ7ne', '2023-06-05 02:36:25', 'Estudiante'),
(19968490, 'Ana Flores', '$2y$10$fhkOZ5rFahoY6dKw/W1eTOQHpRgrWgLeBmt0LDYOkIyvmnsFWkSbG', '2023-06-04 14:21:11', 'Estudiante'),
(105684932, 'Aitana', '$2y$10$oUSPwM14iw.Sb8Pm88asLeS5pyfq3dkIrXmY.BYXVf.0v5BpM.Hku', '2023-04-16 04:23:30', 'director'),
(105684939, 'Edson Nina', '$2y$10$Km9HdySUDSKtz5isbnATkOLK0g9Mee0UIX5OcfH5t3qbtPEdunFXm', '2023-04-16 04:25:47', 'director'),
(123499003, 'Juan Orom', '$2y$10$DaASTB.nN8jeqUqyvaQ8uOBSKYQSPiKbAnPhMMw4yKSLPTKBRMFH6', '2023-06-07 19:09:06', 'Estudiante'),
(879994321, 'Hugo Balboa', '$2y$10$LBvpRpEm5bEnGa7qW8UWqePPGxnVCTyGRJGuStZZfjbbfmI7Rpghu', '2023-06-05 17:41:23', 'Estudiante'),
(1234554321, 'Juan Perez', '$2y$10$rbr54lyFLE.k5DkjhyS6n.XcFltY71eDFLbNdTN8N7CY7nigOunEC', '2023-06-07 19:07:07', 'Estudiante');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flujousuario`
--
ALTER TABLE `flujousuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`) USING BTREE,
  ADD UNIQUE KEY `telefono` (`telefono`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CI`),
  ADD UNIQUE KEY `Usuario` (`Usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flujousuario`
--
ALTER TABLE `flujousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `FK_INSCRIPCION_PERSONA_CI` FOREIGN KEY (`CIestudiante`) REFERENCES `persona` (`CI`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
