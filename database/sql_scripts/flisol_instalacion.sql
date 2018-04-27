-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2018 at 06:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flisol_instalacion`
--

-- --------------------------------------------------------

--
-- Table structure for table `computadora`
--

CREATE TABLE `computadora` (
  `id` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `ram` varchar(10) NOT NULL,
  `procesador` varchar(45) NOT NULL,
  `so_a_instalar` varchar(60) NOT NULL,
  `so_actual` varchar(40) NOT NULL,
  `persona_instalada_id` int(11) NOT NULL,
  `se_puede_instalar` tinyint(1) NOT NULL,
  `tipo` enum('Laptop','Escritorio','Celular') NOT NULL,
  `detalles` text,
  `creado_en` datetime DEFAULT NULL,
  `actualizado_en` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `persona_instalada`
--

CREATE TABLE `persona_instalada` (
  `id` int(11) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `creado_en` datetime NOT NULL,
  `actualizado_en` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `creado_en` datetime NOT NULL,
  `actualizado_en` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuario_registra_computadora`
--

CREATE TABLE `usuario_registra_computadora` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `computadora_id` int(11) NOT NULL,
  `creado_en` datetime NOT NULL,
  `actualizado_en` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computadora`
--
ALTER TABLE `computadora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_computadora_persona_instalada1_idx` (`persona_instalada_id`);

--
-- Indexes for table `persona_instalada`
--
ALTER TABLE `persona_instalada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_registra_computadora`
--
ALTER TABLE `usuario_registra_computadora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_registra_computadora_usuario_idx` (`usuario_id`),
  ADD KEY `fk_usuario_registra_computadora_computadora1_idx` (`computadora_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `computadora`
--
ALTER TABLE `computadora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `persona_instalada`
--
ALTER TABLE `persona_instalada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuario_registra_computadora`
--
ALTER TABLE `usuario_registra_computadora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `computadora`
--
ALTER TABLE `computadora`
  ADD CONSTRAINT `fk_computadora_persona_instalada1` FOREIGN KEY (`persona_instalada_id`) REFERENCES `persona_instalada` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuario_registra_computadora`
--
ALTER TABLE `usuario_registra_computadora`
  ADD CONSTRAINT `fk_usuario_registra_computadora_computadora1` FOREIGN KEY (`computadora_id`) REFERENCES `computadora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_registra_computadora_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
