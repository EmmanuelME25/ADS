-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 03:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escuela`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividad`
--

CREATE TABLE `actividad` (
  `idactividad` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `objetivos` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `materiales_adj` text DEFAULT NULL,
  `materiales_ini` text DEFAULT NULL,
  `materiales_adi` text DEFAULT NULL,
  `planeacion_idplaneacion` int(11) NOT NULL,
  `planeacion_profesor_usuario_correo` varchar(150) NOT NULL,
  `planeacion_materia_idmateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actividad`
--

INSERT INTO `actividad` (`idactividad`, `nombre`, `objetivos`, `descripcion`, `fecha`, `materiales_adj`, `materiales_ini`, `materiales_adi`, `planeacion_idplaneacion`, `planeacion_profesor_usuario_correo`, `planeacion_materia_idmateria`) VALUES
(1, 'Actividad1', 'ObjetivosA1', 'DescripcionA1', '2022-12-15', 'Materiales_adjA1', 'Material_iniA1', 'Materiales_adiA1', 1, 'profesor1@gmail.com', 1),
(2, 'Actividad2', 'ObjetivosA2', 'DescripcionA2', '2022-12-16', 'Materiales_adjA2', 'Materiales_iniA2', 'Materiales_adiA2', 2, 'profesor2@gmail.com', 3),
(3, 'Actividad3', 'ObjetivosA3', 'DescripcionA3', '2022-12-14', 'Materiales_adjA3', 'Materiales_iniA3', 'Materiales_adiA3', 3, 'profesor3@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `usuario_correo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`usuario_correo`) VALUES
('admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE `alumno` (
  `grupo` int(11) NOT NULL,
  `usuario_correo` varchar(150) NOT NULL,
  `padre_usuario_correo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`grupo`, `usuario_correo`, `padre_usuario_correo`) VALUES
(1, 'ayuda1@gmail.com', 'padre1@gmail.com'),
(1, 'ayuda2@gmail.com', 'padre2@gmail.com'),
(1, 'ayuda3@gmial.com', 'padre3@gmail.com'),
(2, 'ayuda4@gmail.com', 'padre3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `alumno_grupo`
--

CREATE TABLE `alumno_grupo` (
  `alumno_usuario_correo` varchar(150) NOT NULL,
  `grupo_idgrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumno_grupo`
--

INSERT INTO `alumno_grupo` (`alumno_usuario_correo`, `grupo_idgrupo`) VALUES
('ayuda1@gmail.com', 1),
('ayuda2@gmail.com', 1),
('ayuda3@gmial.com', 1),
('ayuda4@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `alumno_materia`
--

CREATE TABLE `alumno_materia` (
  `alumno_usuario_correo` varchar(150) NOT NULL,
  `materia_idmateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumno_materia`
--

INSERT INTO `alumno_materia` (`alumno_usuario_correo`, `materia_idmateria`) VALUES
('ayuda1@gmail.com', 1),
('ayuda1@gmail.com', 2),
('ayuda2@gmail.com', 1),
('ayuda3@gmial.com', 3),
('ayuda4@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `asistencia`
--

CREATE TABLE `asistencia` (
  `idasistencia` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(50) NOT NULL,
  `grupo_idgrupo` int(11) NOT NULL,
  `materia_idmateria` int(11) NOT NULL,
  `alumno_usuario_correo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asistencia`
--

INSERT INTO `asistencia` (`idasistencia`, `fecha`, `estado`, `grupo_idgrupo`, `materia_idmateria`, `alumno_usuario_correo`) VALUES
(1, '2022-12-16 00:00:00', 'Presente', 1, 1, 'ayuda1@gmail.com'),
(2, '2022-12-16 00:00:00', 'Justificado', 1, 1, 'ayuda2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `calif_act`
--

CREATE TABLE `calif_act` (
  `idcalif_act` int(11) NOT NULL,
  `calificacion` decimal(10,2) DEFAULT NULL,
  `alumno_usuario_correo` varchar(150) NOT NULL,
  `actividad_planeacion_idplaneacion` int(11) NOT NULL,
  `actividad_idactividad` int(11) NOT NULL,
  `actividad_planeacion_profesor_usuario_correo` varchar(150) NOT NULL,
  `actividad_planeacion_materia_idmateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calif_act`
--

INSERT INTO `calif_act` (`idcalif_act`, `calificacion`, `alumno_usuario_correo`, `actividad_planeacion_idplaneacion`, `actividad_idactividad`, `actividad_planeacion_profesor_usuario_correo`, `actividad_planeacion_materia_idmateria`) VALUES
(1, '8.50', 'ayuda1@gmail.com', 1, 1, 'profesor1@gmail.com', 1),
(2, '9.00', 'ayuda4@gmail.com', 3, 3, 'profesor3@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `calif_pf`
--

CREATE TABLE `calif_pf` (
  `idcalif_pf` int(11) NOT NULL,
  `calificacion_p1` decimal(10,2) DEFAULT NULL,
  `calificacion_p2` decimal(10,2) DEFAULT NULL,
  `calificacion_P3` decimal(10,2) DEFAULT NULL,
  `calificacion_final` decimal(10,2) DEFAULT NULL,
  `materia_idmateria` int(11) NOT NULL,
  `alumno_usuario_correo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calif_pf`
--

INSERT INTO `calif_pf` (`idcalif_pf`, `calificacion_p1`, `calificacion_p2`, `calificacion_P3`, `calificacion_final`, `materia_idmateria`, `alumno_usuario_correo`) VALUES
(1, '10.00', NULL, NULL, NULL, 4, 'ayuda4@gmail.com'),
(2, '8.00', NULL, NULL, NULL, 1, 'ayuda1@gmail.com'),
(3, '5.00', NULL, NULL, NULL, 2, 'ayuda1@gmail.com'),
(4, '6.00', NULL, NULL, NULL, 3, 'ayuda3@gmial.com');

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE `grupo` (
  `idgrupo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grupo`
--

INSERT INTO `grupo` (`idgrupo`, `nombre`) VALUES
(1, '5CM1'),
(2, '3CM1');

-- --------------------------------------------------------

--
-- Table structure for table `grupo_materia`
--

CREATE TABLE `grupo_materia` (
  `grupo_idgrupo` int(11) NOT NULL,
  `materia_idmateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grupo_materia`
--

INSERT INTO `grupo_materia` (`grupo_idgrupo`, `materia_idmateria`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `idmateria` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `codigo` varchar(80) NOT NULL,
  `plan_estudio` varchar(45) NOT NULL,
  `grado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`idmateria`, `nombre`, `plan_estudio`, `grado`) VALUES
(1, 'Matemáticas', '2022', '5'),
(2, 'Español', '2021', '5'),
(3, 'Ciencias', '2022', '5'),
(4, 'Geografía', '2019', '4');

-- --------------------------------------------------------

--
-- Table structure for table `padre`
--

CREATE TABLE `padre` (
  `usuario_correo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `padre`
--

INSERT INTO `padre` (`usuario_correo`) VALUES
('padre1@gmail.com'),
('padre2@gmail.com'),
('padre3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `planeacion`
--

CREATE TABLE `planeacion` (
  `idplaneacion` int(11) NOT NULL,
  `profesor_usuario_correo` varchar(150) NOT NULL,
  `materia_idmateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `planeacion`
--

INSERT INTO `planeacion` (`idplaneacion`, `profesor_usuario_correo`, `materia_idmateria`) VALUES
(1, 'profesor1@gmail.com', 1),
(2, 'profesor2@gmail.com', 3),
(3, 'profesor3@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pregunta`
--

CREATE TABLE `pregunta` (
  `idpregunta` int(11) NOT NULL,
  `asunto` text NOT NULL,
  `pregunta` longtext NOT NULL,
  `estado` int(11) NOT NULL,
  `grupo_idgrupo` int(11) NOT NULL,
  `alumno_usuario_correo` varchar(150) NOT NULL,
  `padre_usuario_correo` varchar(150) NOT NULL,
  `profesor_usuario_correo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pregunta`
--

INSERT INTO `pregunta` (`idpregunta`, `asunto`, `pregunta`, `estado`, `grupo_idgrupo`, `alumno_usuario_correo`, `padre_usuario_correo`, `profesor_usuario_correo`) VALUES
(1, 'Tarea', '¿Cuando se entrega la tarea?', 0, 1, 'ayuda2@gmail.com', 'padre2@gmail.com', 'profesor1@gmail.com'),
(2, 'Reporte', '¿Qué tenia que llevar el marco teorico de la práctica?', 0, 1, 'ayuda3@gmial.com', 'padre3@gmail.com', 'profesor2@gmail.com'),
(2, 'Calificaciones', '¿Qué puede hacer mi hijo para subir sus calificaciones?', 0, 2, 'ayuda4@gmail.com', 'padre3@gmail.com', 'profesor3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `profesor`
--

CREATE TABLE `profesor` (
  `usuario_correo` varchar(150) NOT NULL,
  `rfc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profesor`
--

INSERT INTO `profesor` (`usuario_correo`, `rfc`) VALUES
('profesor1@gmail.com', 'profesor11'),
('profesor2@gmail.com', 'profesor21'),
('profesor3@gmail.com', 'profesor31');

-- --------------------------------------------------------

--
-- Table structure for table `profesor_alumno`
--

CREATE TABLE `profesor_alumno` (
  `profesor_usuario_correo` varchar(150) NOT NULL,
  `alumno_usuario_correo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profesor_alumno`
--

INSERT INTO `profesor_alumno` (`profesor_usuario_correo`, `alumno_usuario_correo`) VALUES
('profesor1@gmail.com', 'ayuda1@gmail.com'),
('profesor1@gmail.com', 'ayuda2@gmail.com'),
('profesor1@gmail.com', 'ayuda3@gmial.com'),
('profesor2@gmail.com', 'ayuda1@gmail.com'),
('profesor2@gmail.com', 'ayuda2@gmail.com'),
('profesor2@gmail.com', 'ayuda3@gmial.com'),
('profesor3@gmail.com', 'ayuda4@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `profesor_grupo`
--

CREATE TABLE `profesor_grupo` (
  `profesor_usuario_correo` varchar(150) NOT NULL,
  `grupo_idgrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profesor_grupo`
--

INSERT INTO `profesor_grupo` (`profesor_usuario_correo`, `grupo_idgrupo`) VALUES
('profesor1@gmail.com', 1),
('profesor2@gmail.com', 1),
('profesor3@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `profesor_materia`
--

CREATE TABLE `profesor_materia` (
  `profesor_usuario_correo` varchar(150) NOT NULL,
  `materia_idmateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profesor_materia`
--

INSERT INTO `profesor_materia` (`profesor_usuario_correo`, `materia_idmateria`) VALUES
('profesor1@gmail.com', 1),
('profesor1@gmail.com', 2),
('profesor2@gmail.com', 3),
('profesor3@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `respuesta`
--

CREATE TABLE `respuesta` (
  `idrespuesta` int(11) NOT NULL,
  `respuesta` text NOT NULL,
  `pregunta_idpregunta` int(11) NOT NULL,
  `pregunta_grupo_idgrupo` int(11) NOT NULL,
  `pregunta_alumno_usuario_correo` varchar(150) NOT NULL,
  `pregunta_profesor_usuario_correo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(150) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `ap_paterno` varchar(80) NOT NULL,
  `ap_materno` varchar(80) NOT NULL,
  `correoAux` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`correo`, `clave`, `nombre`, `ap_paterno`, `ap_materno`, `correoAux`) VALUES
('admin@gmail.com', 'admin', 'Admin', 'ApellidoP_Admin', 'ApellidoM_Admin', 'adminaux@gmail.com'),
('ayuda1@gmail.com', 'ayuda1', 'Alejandro', 'Tamayo', 'Castro', 'ayuda1aux@gmail.com'),
('ayuda2@gmail.com', 'ayuda2', 'Braulio Sebastián', 'Vázquez', 'Reyes', 'ayuda2aux@gmail.com'),
('ayuda3@gmial.com', 'ayuda3', 'Ana Paola', 'Rebolloso', 'Saucedo', 'ayuda3aux@gmail.com'),
('ayuda4@gmail.com', 'ayuda4', 'Eliane Danae', 'Trejo', 'Aguiñaga', 'ayuda4aux@gmail.com'),
('padre1@gmail.com', 'padre1', 'Padre1', 'ApellidoP_Padre1', 'ApellidoM_Padre1', 'padre1aux@gmail.com'),
('padre2@gmail.com', 'padre2', 'Padre2', 'ApellidoP_Padre2', 'ApellidoM_Padre2', 'padre2aux@gmail.com'),
('padre3@gmail.com', 'padre3', 'Padre3', 'ApellidoP_Padre3', 'ApellidoM_Padre3', 'padre3aux@gmail.com'),
('profesor1@gmail.com', 'profesor1', 'Profesor1', 'ApellidoP_Profesor1', 'ApellidoM_Profesor1', 'profesor1aux@gmail.com'),
('profesor2@gmail.com', 'profesor2', 'Profesor2', 'ApellidoP_Profesor2', 'ApellidoM_Profesor2', 'profesor2aux@gmail.com'),
('profesor3@gmail.com', 'profesor3', 'Profesor3', 'ApellidoP_Profesor3', 'ApellidoM_Profesor3', 'profesor3aux@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idactividad`,`planeacion_idplaneacion`,`planeacion_profesor_usuario_correo`,`planeacion_materia_idmateria`),
  ADD KEY `fk_actividad_planeacion1_idx` (`planeacion_idplaneacion`,`planeacion_profesor_usuario_correo`,`planeacion_materia_idmateria`);

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`usuario_correo`),
  ADD KEY `fk_administrador_usuario1_idx` (`usuario_correo`);

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`usuario_correo`),
  ADD KEY `fk_alumno_padre1_idx` (`padre_usuario_correo`);

--
-- Indexes for table `alumno_grupo`
--
ALTER TABLE `alumno_grupo`
  ADD PRIMARY KEY (`alumno_usuario_correo`,`grupo_idgrupo`),
  ADD KEY `fk_alumno_has_grupo_grupo1_idx` (`grupo_idgrupo`),
  ADD KEY `fk_alumno_has_grupo_alumno1_idx` (`alumno_usuario_correo`);

--
-- Indexes for table `alumno_materia`
--
ALTER TABLE `alumno_materia`
  ADD PRIMARY KEY (`alumno_usuario_correo`,`materia_idmateria`),
  ADD KEY `fk_alumno_has_materia_materia1_idx` (`materia_idmateria`),
  ADD KEY `fk_alumno_has_materia_alumno1_idx` (`alumno_usuario_correo`);

--
-- Indexes for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idasistencia`,`grupo_idgrupo`,`materia_idmateria`,`alumno_usuario_correo`),
  ADD KEY `fk_asistencia_grupo1_idx` (`grupo_idgrupo`),
  ADD KEY `fk_asistencia_materia1_idx` (`materia_idmateria`),
  ADD KEY `fk_asistencia_alumno1_idx` (`alumno_usuario_correo`);

--
-- Indexes for table `calif_act`
--
ALTER TABLE `calif_act`
  ADD PRIMARY KEY (`idcalif_act`,`alumno_usuario_correo`),
  ADD KEY `fk_calif_act_alumno1_idx` (`alumno_usuario_correo`),
  ADD KEY `fk_calif_act_actividad1_idx` (`actividad_idactividad`,`actividad_planeacion_idplaneacion`,`actividad_planeacion_profesor_usuario_correo`,`actividad_planeacion_materia_idmateria`);

--
-- Indexes for table `calif_pf`
--
ALTER TABLE `calif_pf`
  ADD PRIMARY KEY (`idcalif_pf`,`materia_idmateria`,`alumno_usuario_correo`),
  ADD KEY `fk_calif_pf_materia1_idx` (`materia_idmateria`),
  ADD KEY `fk_calif_pf_alumno1_idx` (`alumno_usuario_correo`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idgrupo`);

--
-- Indexes for table `grupo_materia`
--
ALTER TABLE `grupo_materia`
  ADD PRIMARY KEY (`grupo_idgrupo`,`materia_idmateria`),
  ADD KEY `fk_grupo_has_materia_materia1_idx` (`materia_idmateria`),
  ADD KEY `fk_grupo_has_materia_grupo1_idx` (`grupo_idgrupo`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idmateria`);

--
-- Indexes for table `padre`
--
ALTER TABLE `padre`
  ADD PRIMARY KEY (`usuario_correo`),
  ADD KEY `fk_padre_usuario1_idx` (`usuario_correo`);

--
-- Indexes for table `planeacion`
--
ALTER TABLE `planeacion`
  ADD PRIMARY KEY (`idplaneacion`,`profesor_usuario_correo`,`materia_idmateria`),
  ADD KEY `fk_planeacion_profesor1_idx` (`profesor_usuario_correo`),
  ADD KEY `fk_planeacion_materia1_idx` (`materia_idmateria`);

--
-- Indexes for table `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`idpregunta`,`grupo_idgrupo`,`alumno_usuario_correo`,`profesor_usuario_correo`),
  ADD KEY `fk_pregunta_grupo1_idx` (`grupo_idgrupo`),
  ADD KEY `fk_pregunta_alumno1_idx` (`alumno_usuario_correo`),
  ADD KEY `fk_pregunta_padre1_idx` (`padre_usuario_correo`),
  ADD KEY `fk_pregunta_profesor1_idx` (`profesor_usuario_correo`);

--
-- Indexes for table `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`usuario_correo`),
  ADD KEY `fk_profesor_usuario1_idx` (`usuario_correo`);

--
-- Indexes for table `profesor_alumno`
--
ALTER TABLE `profesor_alumno`
  ADD PRIMARY KEY (`profesor_usuario_correo`,`alumno_usuario_correo`),
  ADD KEY `fk_profesor_has_alumno_alumno1_idx` (`alumno_usuario_correo`),
  ADD KEY `fk_profesor_has_alumno_profesor1_idx` (`profesor_usuario_correo`);

--
-- Indexes for table `profesor_grupo`
--
ALTER TABLE `profesor_grupo`
  ADD PRIMARY KEY (`profesor_usuario_correo`,`grupo_idgrupo`),
  ADD KEY `fk_profesor_has_grupo_grupo1_idx` (`grupo_idgrupo`),
  ADD KEY `fk_profesor_has_grupo_profesor1_idx` (`profesor_usuario_correo`);

--
-- Indexes for table `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD PRIMARY KEY (`profesor_usuario_correo`,`materia_idmateria`),
  ADD KEY `fk_profesor_has_materia_materia1_idx` (`materia_idmateria`),
  ADD KEY `fk_profesor_has_materia_profesor1_idx` (`profesor_usuario_correo`);

--
-- Indexes for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idrespuesta`),
  ADD KEY `fk_respuesta_pregunta1_idx` (`pregunta_idpregunta`,`pregunta_grupo_idgrupo`,`pregunta_alumno_usuario_correo`,`pregunta_profesor_usuario_correo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idactividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `idasistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `calif_act`
--
ALTER TABLE `calif_act`
  MODIFY `idcalif_act` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `calif_pf`
--
ALTER TABLE `calif_pf`
  MODIFY `idcalif_pf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `idgrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `idmateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `planeacion`
--
ALTER TABLE `planeacion`
  MODIFY `idplaneacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idpregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `idrespuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `fk_actividad_planeacion1` FOREIGN KEY (`planeacion_idplaneacion`,`planeacion_profesor_usuario_correo`,`planeacion_materia_idmateria`) REFERENCES `planeacion` (`idplaneacion`, `profesor_usuario_correo`, `materia_idmateria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_administrador_usuario1` FOREIGN KEY (`usuario_correo`) REFERENCES `usuario` (`correo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_alumno_padre1` FOREIGN KEY (`padre_usuario_correo`) REFERENCES `padre` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_usuario` FOREIGN KEY (`usuario_correo`) REFERENCES `usuario` (`correo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `alumno_grupo`
--
ALTER TABLE `alumno_grupo`
  ADD CONSTRAINT `fk_alumno_has_grupo_alumno1` FOREIGN KEY (`alumno_usuario_correo`) REFERENCES `alumno` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_has_grupo_grupo1` FOREIGN KEY (`grupo_idgrupo`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `alumno_materia`
--
ALTER TABLE `alumno_materia`
  ADD CONSTRAINT `fk_alumno_has_materia_alumno1` FOREIGN KEY (`alumno_usuario_correo`) REFERENCES `alumno` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_has_materia_materia1` FOREIGN KEY (`materia_idmateria`) REFERENCES `materia` (`idmateria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_asistencia_alumno1` FOREIGN KEY (`alumno_usuario_correo`) REFERENCES `alumno` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asistencia_grupo1` FOREIGN KEY (`grupo_idgrupo`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asistencia_materia1` FOREIGN KEY (`materia_idmateria`) REFERENCES `materia` (`idmateria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `calif_act`
--
ALTER TABLE `calif_act`
  ADD CONSTRAINT `fk_calif_act_actividad1` FOREIGN KEY (`actividad_idactividad`,`actividad_planeacion_idplaneacion`,`actividad_planeacion_profesor_usuario_correo`,`actividad_planeacion_materia_idmateria`) REFERENCES `actividad` (`idactividad`, `planeacion_idplaneacion`, `planeacion_profesor_usuario_correo`, `planeacion_materia_idmateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calif_act_alumno1` FOREIGN KEY (`alumno_usuario_correo`) REFERENCES `alumno` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `calif_pf`
--
ALTER TABLE `calif_pf`
  ADD CONSTRAINT `fk_calif_pf_alumno1` FOREIGN KEY (`alumno_usuario_correo`) REFERENCES `alumno` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calif_pf_materia1` FOREIGN KEY (`materia_idmateria`) REFERENCES `materia` (`idmateria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `grupo_materia`
--
ALTER TABLE `grupo_materia`
  ADD CONSTRAINT `fk_grupo_has_materia_grupo1` FOREIGN KEY (`grupo_idgrupo`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_has_materia_materia1` FOREIGN KEY (`materia_idmateria`) REFERENCES `materia` (`idmateria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `padre`
--
ALTER TABLE `padre`
  ADD CONSTRAINT `fk_padre_usuario1` FOREIGN KEY (`usuario_correo`) REFERENCES `usuario` (`correo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `planeacion`
--
ALTER TABLE `planeacion`
  ADD CONSTRAINT `fk_planeacion_materia1` FOREIGN KEY (`materia_idmateria`) REFERENCES `materia` (`idmateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_planeacion_profesor1` FOREIGN KEY (`profesor_usuario_correo`) REFERENCES `profesor` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_pregunta_alumno1` FOREIGN KEY (`alumno_usuario_correo`) REFERENCES `alumno` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pregunta_grupo1` FOREIGN KEY (`grupo_idgrupo`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pregunta_padre1` FOREIGN KEY (`padre_usuario_correo`) REFERENCES `padre` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pregunta_profesor1` FOREIGN KEY (`profesor_usuario_correo`) REFERENCES `profesor` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `fk_profesor_usuario1` FOREIGN KEY (`usuario_correo`) REFERENCES `usuario` (`correo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profesor_alumno`
--
ALTER TABLE `profesor_alumno`
  ADD CONSTRAINT `fk_profesor_has_alumno_alumno1` FOREIGN KEY (`alumno_usuario_correo`) REFERENCES `alumno` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profesor_has_alumno_profesor1` FOREIGN KEY (`profesor_usuario_correo`) REFERENCES `profesor` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profesor_grupo`
--
ALTER TABLE `profesor_grupo`
  ADD CONSTRAINT `fk_profesor_has_grupo_grupo1` FOREIGN KEY (`grupo_idgrupo`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profesor_has_grupo_profesor1` FOREIGN KEY (`profesor_usuario_correo`) REFERENCES `profesor` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD CONSTRAINT `fk_profesor_has_materia_materia1` FOREIGN KEY (`materia_idmateria`) REFERENCES `materia` (`idmateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profesor_has_materia_profesor1` FOREIGN KEY (`profesor_usuario_correo`) REFERENCES `profesor` (`usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_respuesta_pregunta1` FOREIGN KEY (`pregunta_idpregunta`,`pregunta_grupo_idgrupo`,`pregunta_alumno_usuario_correo`,`pregunta_profesor_usuario_correo`) REFERENCES `pregunta` (`idpregunta`, `grupo_idgrupo`, `alumno_usuario_correo`, `profesor_usuario_correo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
