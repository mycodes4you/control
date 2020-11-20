-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-01-2020 a las 01:08:40
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `atm_cutc0ntr0l`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `administrador_id` int(11) NOT NULL,
  `administrador_apaterno` text NOT NULL,
  `administrador_amaterno` text NOT NULL,
  `administrador_1ernombre` text NOT NULL,
  `administrador_2donombre` text DEFAULT NULL,
  `administrador_email` text NOT NULL,
  `administrador_telefono` text NOT NULL,
  `administrador_foto` text NOT NULL,
  `administrador_activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`administrador_id`, `administrador_apaterno`, `administrador_amaterno`, `administrador_1ernombre`, `administrador_2donombre`, `administrador_email`, `administrador_telefono`, `administrador_foto`, `administrador_activo`) VALUES
(1, 'Vazquez', 'Ramirez', 'Carlos', 'Alejandro', 'alejandro@mail.com', '5586085623', ' assets/img/img-avatar.gif ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `alumno_id` int(11) NOT NULL,
  `alumno_matricula` varchar(255) NOT NULL,
  `alumno_apaterno` text NOT NULL,
  `alumno_amaterno` text NOT NULL,
  `alumno_1ernombre` text NOT NULL,
  `alumno_2donombre` text DEFAULT NULL,
  `alumno_email` varchar(255) NOT NULL,
  `alumno_telefono` mediumtext NOT NULL,
  `alumno_d_calle` mediumtext DEFAULT NULL,
  `alumno_d_n_exterior` mediumtext DEFAULT NULL,
  `alumno_d_n_interior` mediumtext DEFAULT NULL,
  `alumno_d_colonia` mediumtext DEFAULT NULL,
  `alumno_d_municipio` mediumtext DEFAULT NULL,
  `alumno_d_estado` mediumtext DEFAULT NULL,
  `alumno_d_cp` mediumtext DEFAULT NULL,
  `alumno_d_pais` mediumtext DEFAULT NULL,
  `alumno_carrera` text NOT NULL,
  `alumno_semestre` text NOT NULL,
  `alumno_contacto_e_nombre` text DEFAULT NULL,
  `alumno_contacto_e_telefono` text DEFAULT NULL,
  `alumno_contacto_e_parentesco` text DEFAULT NULL,
  `alumno_foto` text DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `alumno_activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`alumno_id`, `alumno_matricula`, `alumno_apaterno`, `alumno_amaterno`, `alumno_1ernombre`, `alumno_2donombre`, `alumno_email`, `alumno_telefono`, `alumno_d_calle`, `alumno_d_n_exterior`, `alumno_d_n_interior`, `alumno_d_colonia`, `alumno_d_municipio`, `alumno_d_estado`, `alumno_d_cp`, `alumno_d_pais`, `alumno_carrera`, `alumno_semestre`, `alumno_contacto_e_nombre`, `alumno_contacto_e_telefono`, `alumno_contacto_e_parentesco`, `alumno_foto`, `grupo_id`, `alumno_activo`) VALUES
(9, '654645654', 'Vazquez', 'Guzman', 'Alejandra', 'Angelica', 'alexbmo@icloud.com', '5586085623', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', '1', '1', 'null', 'null', 'null', 'imagenes/alumnos/alumno_9.jpeg', 1, 1),
(10, '231898799', 'Ramirez', 'Vazquez', 'Kalev', 'Emir', 'alejandrocarlos456@gmail.com', '5512770415', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', '1', '1', 'Raul Mendoza', '5588990658', 'Vecino', 'imagenes/alumnos/beautiful_garden-wallpaper-1680x1050.jpg', 1, 1),
(13, '982548884', 'Avalos', 'Ramirez', 'Carlos', 'Alberto', '3434@mail.com', '5588693256', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', '1', '1', 'null', 'null', 'null', 'imagenes/alumnos/beautiful_sydney-wallpaper-1680x1050.jpg', 1, 1),
(15, '6544455554', 'López', 'Zuñiga', 'Juan', 'Carlos', 'adolfo@test.com', '654654444', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', '2', '2', 'null', 'null', 'null', 'imagenes/alumnos/beautiful_garden-wallpaper-1680x1050.jpg', 2, 0),
(17, '65465456465', 'Vazquez', 'Avalos', 'Eric', 'Israel', 'eric@test.com', '5526010289', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', '2', '2', 'null', 'null', 'null', 'imagenes/alumnos/beautiful_garden-wallpaper-1680x1050.jpg', 2, 0),
(18, '6546546546', 'Vazquez', 'Avalos', 'Emir', 'Santiago', 'emir@test.com', '555444584', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', '2', '2', 'null', 'null', 'null', 'imagenes/alumnos/dragon_bridge-wallpaper-1680x1050.jpg', 2, 0),
(19, '0321121111111', 'Vazquez', 'Avalos', 'Alejandro', 'Antonio', 'kalev@test.com', '5512880415', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', '2', '3', 'null', 'null', 'null', 'imagenes/alumnos/kids_bicycle_a_riding_graffiti_art-wallpaper-1680x1050.jpg', 1, 0),
(20, '654654564', 'Avalos', 'Guzman', 'Alejandra', 'Karina', 'alejandra@test.com', '55512111504', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', '3', '1', 'null', 'null', 'null', 'imagenes/alumnos/654654564-1578738552.jpg', NULL, 2),
(38, '695465444', 'Jimenez', 'Romero', 'Karla', 'Gabriela', 'karla@test.com', '6555555556', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', '4', '3', 'null', 'null', 'null', 'imagenes/alumnos/langkawi_sky_bridge_malaysia-wallpaper-1680x1050.jpg', NULL, 0),
(53, '1234567890', 'Vazquez', 'Ramirez', 'Carlos', 'Alejandro', 'alex@mail.com', '5566778899', 'Allende', '', '', 'Los Heroes', 'Ixtapaluca', 'Mexico', '56585', 'México', '3', '3', 'null', 'null', 'null', 'imagenes/alumnos/european_architecture-wallpaper-1680x1050.jpg', NULL, 1),
(54, '1234567890', 'Herrera', 'Lopez', 'Gerardo', 'Alejandro', 'alex@mail.com', '5566778899', 'Allende', 'Mz42 Lt6', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Jalisco', '56585', 'México', '4', '2', 'null', 'null', 'null', 'imagenes/alumnos/rail_locomotive-wallpaper-1680x1050.jpg', NULL, 1),
(55, '1234567890', 'Jimenez', 'Matus', 'Jiovani', 'Asael', 'alex@mail.com', '5566778899', 'Allende', 'Mz42 Lt6', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Durango', '56585', 'México', '6', '2', 'null', 'null', 'null', 'imagenes/alumnos/-1578733776', NULL, 1),
(56, '1234567890', 'Vazquez', 'Matus', 'Carlos', 'Asael', 'test@test', '5566778899', 'Allende', 'Mz42 Lt6', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Baja California Sur', '56585', 'México', '3', '1', 'null', 'null', 'null', 'imagenes/alumnos/-1578734045', NULL, 1),
(61, '1234567890', 'Jimenez', 'Ramirez', 'Jiovani', 'Daniel', 'alex@mail.com', '6688378209', 'Allende', 'Mz42 Lt6', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Guerrero', '56585', 'México', '3', '1', 'null', 'null', 'null', 'imagenes/alumnos/-1578734060', NULL, 1),
(62, '1234567890', 'Hernandez', 'Mendoza', 'Julio', 'Cesar', 'alex@mail.com', '5566778899', 'Allende', 'Mz42 Lt6', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Ciudad de México', '56585', 'México', '6', '3', 'null', 'null', 'null', 'imagenes/alumnos/1234567890-1578734104', NULL, 1),
(63, '1234567890', 'Jimenez', 'Ramirez', 'Jiovani', 'Daniel', 'alex@mail.com', '6688378209', 'Allende', 'Mz42 Lt6', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Michoacan de Ocampo', '56585', 'México', '5', '5', 'null', 'null', 'null', 'imagenes/alumnos/1234567890-1578734527', NULL, 1),
(91, '1234567890', 'Fernandez', 'Lopez', 'Gerardo', 'Asael', 'test@test', '6688378209', 'Allende', 'Mz42 Lt6', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Hidalgo', '56585', 'México', '5', '2', 'null', 'null', 'null', 'imagenes/alumnos/1234567890-1578735398.jpg', NULL, 1),
(92, '1234567890', 'Campos', 'Leyva', 'Cesar', 'Antonio', 'alex@mail.com', '5566778899', 'Allende', 'Mz42 Lt6', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Tlaxcala', '56585', 'México', '6', '6', 'null', 'null', 'null', 'imagenes/alumnos/1234567890-1578735319.jpg', NULL, 1),
(96, '9892776255', 'Fernandez', 'Ramirez', 'Carlos', 'Antonio', 'test@test', '6688378209', 'Allende', 'Mz42 Lt6', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Durango', '56585', 'México', '2', '7', 'null', 'null', 'null', 'imagenes/alumnos/9892776255-1578734952.jpg', NULL, 1),
(156, '1234567890', 'Fernandez', 'Matus', 'Carlos', 'Asael', 'alex@mail.com', '6688378209', 'Allende', 'Mz42 Lt6', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Chiapas', '56585', 'México', '4', '6', NULL, NULL, NULL, 'imagenes/alumnos/1234567890-1578734819jpg', NULL, 1),
(157, 'VRF1234567', 'Vazquez', 'Romero', 'Fernando', 'Amador', 'demo@demo.com', '5545660415', 'Allende', '42', '6', 'Los Heroes', 'ixtapaluca', 'Mexico', '56585', 'México', '3', '2', 'Guadalupe Romero', '5523990235', 'Madre', 'imagenes/alumnos/123456789-1578807338.jpg', NULL, 1),
(158, '654654564', 'Fernandez', 'Avalos', 'Alejandra', 'Emir', 'alejandrocarlos456@gmail.com', '5566778899', 'Allende', 'Mz42 Lt6', '6', 'Los Heroes', 'ixtapaluca', 'Hidalgo', '56585', 'México', '1', '3', 'Raul Mendoza', '5588990658', 'Vecino', 'assets/img/img-avatar.gif', NULL, 1),
(159, '654654564', 'Avalos', 'Guzman', 'Carlos', 'Antonio', 'alejandra@test.com', '55512111504', 'Allende', 'Mz42 Lt6', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Hidalgo', '56585', 'México', '1', '3', 'Raul Mendoza', '5523990235', 'Vecino', 'assets/img/img-avatar.gif', NULL, 1),
(160, '1234567890', 'Avalos', 'Avalos', 'Alejandra', 'Emir', 'alejandra@test.com', '5566778899', 'Allende', 'Mz42 Lt6', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Mexico', '56585', 'México', '2', '3', 'Raul Mendoza', '5588990658', 'Vecino', 'assets/img/img-avatar.gif', NULL, 1),
(161, '1234567890', 'Avalos', 'Ramirez', 'Carlos', 'Antonio', 'alejandra@test.com', '55512111504', 'De las Minas', '48', 'Piso 1', 'San Buenaventura', 'Ixtapaluca', 'Mexico', '56536', 'México', '2', '2', 'Raul Mendoza', '5588990658', 'Vecino', 'assets/img/img-avatar.gif', NULL, 1),
(162, '654654564', 'Vazquez', 'Guzman', 'Carlos', 'Emir', 'alejandra@test.com', '55512111504', 'De las Flores', '42', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Aguascalientes', '56585', 'México', '2', '8', 'Guadalupe Romero', '5588990658', 'Vecino', 'assets/img/img-avatar.gif', NULL, 1),
(163, '654654564', 'Vazquez', 'Guzman', 'Carlos', 'Emir', 'alejandra@test.com', '55512111504', 'De las Flores', '42', 'Cs 10', 'Los Heroes', 'Ixtapaluca', 'Aguascalientes', '56585', 'México', '2', '8', 'Guadalupe Romero', '5588990658', 'Vecino', 'assets/img/img-avatar.gif', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `bitacora_id` int(11) NOT NULL,
  `bitacora_usuario` text DEFAULT NULL,
  `bitacora_fecha` datetime DEFAULT current_timestamp(),
  `bitacora_descripcion` text DEFAULT NULL,
  `bitacora_codigo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`bitacora_id`, `bitacora_usuario`, `bitacora_fecha`, `bitacora_descripcion`, `bitacora_codigo`) VALUES
(14, '2', '2020-01-09 02:59:29', 'Se registro el alumno: 1234567890', 'Registro Alumno'),
(23, '2', '2020-01-09 03:24:45', 'Se registro el alumno: 1234567890', 'Registro Alumno'),
(24, '2', '2020-01-09 03:25:00', 'Se registro el alumno: 9892776255', 'Registro Alumno'),
(25, '2', '2020-01-09 03:27:37', 'Se registro el alumno: 1234567890', 'Registro Alumno'),
(26, '2', '2020-01-10 00:28:43', 'Se registro el alumno: 1234567890', 'Registro Alumno'),
(37, '2', '2020-01-10 02:18:15', 'Se registro el alumno: 1234567890', 'Registro Alumno'),
(38, '2', '2020-01-10 02:22:36', 'Se registro el alumno: 1234567890', 'Registro Alumno'),
(42, '2', '2020-01-10 02:29:59', 'Se registro el alumno: 9892776255', 'Registro Alumno'),
(96, '2', '2020-01-10 04:32:20', 'Se registro el alumno: 1234567890', 'Registro Alumno'),
(97, '2', '2020-01-10 10:35:11', 'Se registro el alumno: 123456789', 'Registro Alumno'),
(98, '157', '2020-01-10 16:05:40', 'Se registro el alumno: ', 'Registro Alumno'),
(99, '2', '2020-01-11 03:10:07', 'Se registro el alumno: ', 'Registro Alumno'),
(100, '157', '2020-01-14 09:29:53', 'Se registro el alumno: 654654564', 'Registro Alumno'),
(101, '157', '2020-01-14 09:37:48', 'Se registro el alumno: 654654564', 'Registro Alumno'),
(102, '157', '2020-01-14 09:39:53', 'Se registro el alumno: 1234567890', 'Registro Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `calificacion_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `calificacion_parcial` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `calificacion_final` text NOT NULL,
  `calificacion_semestre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `carrera_id` int(11) NOT NULL,
  `carrera_nombre` text NOT NULL,
  `carrera_descripcion` text NOT NULL,
  `carrera_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`carrera_id`, `carrera_nombre`, `carrera_descripcion`, `carrera_foto`) VALUES
(1, 'Administración Pública', '', ''),
(2, 'Contaduría', '', ''),
(3, 'Economía', '', ''),
(4, 'Pedagogía', '', ''),
(5, 'Psicopedagogía', '', ''),
(6, 'Derecho', '', ''),
(7, 'Periodismo y comunicación', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` int(11) NOT NULL,
  `evento_nombre` text NOT NULL,
  `evento_descripcion` text NOT NULL,
  `evento_fecha_creado` datetime NOT NULL DEFAULT current_timestamp(),
  `evento_fecha` datetime NOT NULL,
  `evento_imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`evento_id`, `evento_nombre`, `evento_descripcion`, `evento_fecha_creado`, `evento_fecha`, `evento_imagen`) VALUES
(1, 'Primer Evento', 'Primer evento de pureba, esta es la descripcion de prueba', '2020-01-12 07:00:00', '2020-01-10 00:00:00', 'https://image.jimcdn.com/app/cms/image/transf/none/path/s5e457e00df677955/backgroundarea/ie089e94c38cbe61e/version/1536079410/image.jpg'),
(2, 'Segundo Evento', 'Segundo Evento de pureba, esta es la descripcion de prueba', '2020-01-11 10:00:00', '2020-02-25 00:00:00', 'https://i.ytimg.com/vi/h2FpJxusJiM/maxresdefault.jpg'),
(3, 'Tercer Evento', 'Tercer Evento de pureba, esta es la descripcion de prueba', '2020-01-09 16:00:00', '2020-02-12 00:00:00', 'https://image.jimcdn.com/app/cms/image/transf/none/path/s5e457e00df677955/image/i65bb37b599fcd33c/version/1461386519/image.jpg'),
(4, 'Evento prueba', 'Texto de prueba para la descripcion del evento', '2020-01-12 09:44:41', '2020-01-20 00:00:00', 'imagenes/eventos/1578840281.jpg'),
(5, 'Evento prueba', 'Texto de prueba para la descripcion del evento', '2020-01-12 09:45:34', '2020-01-20 00:00:00', 'imagenes/eventos/1578840334.jpg'),
(6, 'Evento prueba', 'probando la subida de imagenes', '2020-01-12 09:48:28', '2020-01-20 00:00:00', 'imagenes/eventos/1578840508.jpg'),
(9, 'Prueba 22', 'Dgghhhhhhyyy', '2020-01-12 18:30:24', '2020-01-09 00:00:00', 'imagenes/eventos/1578871824.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `grupo_id` int(11) NOT NULL,
  `grupo_nombre` text DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `grupo_semestre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`grupo_id`, `grupo_nombre`, `carrera_id`, `grupo_semestre`) VALUES
(1, '101', 1, 1),
(2, '102', 2, 1),
(3, '201', 1, 2),
(4, '301', 1, 1),
(5, '401', 7, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `materia_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `materia_semestre` int(11) NOT NULL,
  `materia_descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`materia_id`, `carrera_id`, `materia_semestre`, `materia_descripcion`) VALUES
(1, 1, 1, 'Introducción al estudio de la filosofía'),
(2, 1, 1, 'Administración I'),
(3, 1, 1, 'Estadística I'),
(4, 1, 1, 'Matemáticas Básicas'),
(5, 1, 1, 'Computación'),
(6, 1, 1, 'Lenguaje y Comunicación'),
(7, 1, 1, 'Bases Jurídicas'),
(8, 1, 2, 'Historia de la Filosofía I'),
(9, 1, 2, 'Administración II'),
(10, 1, 2, 'Estadística II'),
(11, 1, 2, 'Contabilidad I'),
(12, 1, 2, 'Microeconomía'),
(13, 1, 2, 'Matemáticas Financieras'),
(14, 1, 2, 'Psicología del Trabajo'),
(15, 1, 3, 'Historia de la Filosofía II'),
(16, 1, 3, 'Administración III'),
(17, 1, 3, 'Recursos Humanos I'),
(18, 1, 3, 'Contabilidad II'),
(19, 1, 3, 'Microeconomía'),
(20, 1, 3, 'Finanzas I'),
(21, 1, 3, 'Derecho Mercantil'),
(22, 1, 4, 'Economía Política I'),
(23, 1, 4, 'Administración IV'),
(24, 1, 4, 'Recursos Humanos II'),
(25, 1, 4, 'Contabilidad II'),
(26, 1, 4, 'Pensamiento Político I'),
(27, 1, 4, 'Mercadotecnia I'),
(28, 1, 4, 'Derecho Laboral'),
(29, 1, 5, 'Economía Política II'),
(30, 1, 5, 'Administración V'),
(31, 1, 5, 'Finanzas III'),
(32, 1, 5, 'Contabilidad II'),
(33, 1, 5, 'Nóminas'),
(34, 1, 5, 'Mercadotecnia II'),
(35, 1, 5, 'Administración del Sector Público'),
(36, 1, 6, 'Problemas Contemporáneos I'),
(37, 1, 6, 'Metodología de Investigación I'),
(38, 1, 6, 'Análisis de Políticas Públicas'),
(39, 1, 6, 'Derecho Fiscal'),
(40, 1, 6, 'Administración de Riesgos'),
(41, 1, 6, 'Defensa Fiscal y Procesos Administrativos'),
(42, 1, 6, 'Finanzas Públicas'),
(43, 1, 7, 'Problemas Contemporáneos II'),
(44, 1, 7, 'Metodología de Investigación II'),
(45, 1, 7, 'Idioma I'),
(46, 1, 7, 'Contencioso Administrativo'),
(47, 1, 7, 'Modernización Administrativa'),
(48, 1, 7, 'Seguridad Social'),
(49, 1, 7, 'Presupuestos'),
(50, 1, 8, 'Análisis Contemporáneos'),
(51, 1, 8, 'Metodología de Investigación III'),
(52, 1, 8, 'Idioma II'),
(53, 1, 8, 'Relaciones Intergubernamentales'),
(54, 1, 8, 'Sistemas de Partidos y Sistemas Electorales'),
(55, 1, 8, 'Adquisiciones y Abastecimiento'),
(56, 1, 8, 'Ética Profesional'),
(57, 2, 1, 'Introducción al estudio de la Filosofía'),
(58, 2, 1, 'Estadística I'),
(59, 2, 1, 'Contabilidad I'),
(60, 2, 1, 'Computaciòn'),
(61, 2, 1, 'Administración básica'),
(62, 2, 1, 'Derecho Mercantil'),
(63, 2, 1, 'Bases jurídicas'),
(64, 2, 2, 'Historia de la Filosofía I'),
(65, 2, 2, 'Costos I'),
(66, 2, 2, 'Estadística II'),
(67, 2, 2, 'Contabilidad II'),
(68, 2, 2, 'Microeconomía'),
(69, 2, 2, 'Matemáticas Financieras'),
(70, 2, 2, 'Seguridad Social'),
(71, 2, 3, 'Historia de la Filosofía II'),
(72, 2, 3, 'Auditoria I'),
(73, 2, 3, 'Costos II'),
(74, 2, 3, 'Contabilidad III'),
(75, 2, 3, 'Macroeconomía'),
(76, 2, 3, 'Recursos Humanos'),
(77, 2, 3, 'Sistemas de Control Interno'),
(78, 2, 4, 'Economía Política I'),
(79, 2, 4, 'Pensamiento Político I'),
(80, 2, 4, 'Finanzas I'),
(81, 2, 4, 'Idioma I'),
(82, 2, 4, 'Auditoria II'),
(83, 2, 4, 'Contabilidad IV'),
(84, 2, 4, 'Defensa Fiscal y Procesos Administrativos'),
(85, 2, 5, 'Economía Política II'),
(86, 2, 5, 'Pensamiento Político II'),
(87, 2, 5, 'Finanzas II'),
(88, 2, 5, 'Idioma II'),
(89, 2, 5, 'Auditoria III'),
(90, 2, 5, 'Contabilidad V'),
(91, 2, 5, 'Nòminas'),
(92, 2, 6, 'Problemas Contemporáneos I'),
(93, 2, 6, 'Régimen General de las Empresas I'),
(94, 2, 6, 'Metodología de la Investigación I'),
(95, 2, 6, 'Finanzas III'),
(96, 2, 6, 'Derecho Fiscal'),
(97, 2, 6, 'Auditoria Interna'),
(98, 2, 6, 'Contribuciones Indirectas y al Comercio Exterior'),
(99, 2, 7, 'Problemas Contemporáneos II'),
(100, 2, 7, 'Régimen General de las Empresas II'),
(101, 2, 7, 'Metodología de la Investigación II'),
(102, 2, 7, 'Finanzas IV'),
(103, 2, 7, 'Operaciones'),
(104, 2, 7, 'Presupuestos'),
(105, 2, 7, 'Derecho Laboral'),
(106, 2, 8, 'Análisis Contemporáneos'),
(107, 2, 8, 'Metodología de la Investigación III'),
(108, 2, 8, 'Finanzas V'),
(109, 2, 8, 'Mercadotecnia'),
(110, 2, 8, 'Ética profesional'),
(111, 2, 8, 'Personas Físicas No Empresariales'),
(112, 2, 8, 'Control de Gestión'),
(113, 3, 1, 'Introducción al estudio de la filosofía'),
(114, 3, 1, 'Geografía Económica'),
(115, 3, 1, 'Historia del pensamiento económico I'),
(116, 3, 1, 'Introducción a la economía'),
(117, 3, 1, 'Práctica de la Lengua Española'),
(118, 3, 1, 'Administración General'),
(119, 3, 1, 'Mercadotecnia I'),
(120, 3, 2, 'Historia de la filosofía I'),
(121, 3, 2, 'Contabilidad'),
(122, 3, 2, 'Historia del pensamiento económico II'),
(123, 3, 2, 'Matemáticas I'),
(124, 3, 2, 'Microeconomía I'),
(125, 3, 2, 'Mercadotecnia II'),
(126, 3, 2, 'Derecho económico'),
(127, 3, 3, 'Economía política I'),
(128, 3, 3, 'Historia de la filosofía II'),
(129, 3, 3, 'Sistema Monetario y Financiero'),
(130, 3, 3, 'Matemáticas II'),
(131, 3, 3, 'Microeconomía II'),
(132, 3, 3, 'Teoría Monetaria y Política Financiera'),
(133, 3, 3, 'Finanzas Públicas'),
(134, 3, 4, 'Economía política II'),
(135, 3, 4, 'Pensamiento político I'),
(136, 3, 4, 'Análisis e Interpretación de Estados Financieros'),
(137, 3, 4, 'Estadística I'),
(138, 3, 4, 'Computación'),
(139, 3, 4, 'Macroeconomía I'),
(140, 3, 4, 'Matemáticas III'),
(141, 3, 5, 'Economía política III'),
(142, 3, 5, 'Pensamiento político II'),
(143, 3, 5, 'Costos I'),
(144, 3, 5, 'Macroeconomía II'),
(145, 3, 5, 'Matemáticas IV'),
(146, 3, 5, 'Formulación y Evaluación de Proyectos I'),
(147, 3, 5, 'Estadística II'),
(148, 3, 6, 'Economía política IV'),
(149, 3, 6, 'Problemas contemporáneos I'),
(150, 3, 6, 'Metodología de la Investigación I'),
(151, 3, 6, 'Matemáticas V'),
(152, 3, 6, 'Costos II'),
(153, 3, 6, 'Formulación y Evaluación de Proyectos II'),
(154, 3, 6, 'Matemáticas Financiera'),
(155, 3, 7, 'Problemas contemporáneos II'),
(156, 3, 7, 'Metodología de la Investigación II'),
(157, 3, 7, 'Idioma I'),
(158, 3, 7, 'Econometría I'),
(159, 3, 7, 'Economía de México I'),
(160, 3, 7, 'Tendencias Económicas'),
(161, 3, 8, 'Análisis contemporáneos'),
(162, 3, 8, 'Metodología de la Investigación III'),
(163, 3, 8, 'Econometría II'),
(164, 3, 8, 'Idioma II'),
(165, 3, 8, 'Economía de México II'),
(166, 3, 8, 'Organización Industrial'),
(167, 4, 1, 'Introducción al estudio de la filosofía'),
(168, 4, 1, 'Español'),
(169, 4, 1, 'Computación'),
(170, 4, 1, 'Historia de la Educación y la Pedagogía'),
(171, 4, 1, 'Tecnologías en la Educación'),
(172, 4, 2, 'Historia de la filosofía I'),
(173, 4, 2, 'Educación y medio ambiente'),
(174, 4, 2, 'Sociología y Educación'),
(175, 4, 2, 'Psicología y Educación I'),
(176, 4, 2, 'Modelos educativos de nivel preescolar'),
(177, 4, 2, 'Teorías del aprendizaje'),
(178, 4, 3, 'Historia de la filosofía II'),
(179, 4, 3, 'Desarrollo Socialización de grupos   Didáctica I'),
(180, 4, 3, 'Psicología y Educación II'),
(181, 4, 3, 'Modelos educativos de nivel primaria'),
(182, 4, 3, 'Educación no formal I'),
(183, 4, 4, 'Economía política I'),
(184, 4, 4, 'Pensamiento político I'),
(185, 4, 4, 'Didáctica II'),
(186, 4, 4, 'Comunicación Educativa'),
(187, 4, 4, 'Modelos educativos para el nivel secundaria'),
(188, 4, 4, 'Educación no formal II'),
(189, 4, 5, 'Economía política II'),
(190, 4, 5, 'Pensamiento político II'),
(191, 4, 5, 'Orientación Educativa I'),
(192, 4, 5, 'Investigación I'),
(193, 4, 5, 'Modelos educativos de nivel medio superior'),
(194, 4, 5, 'Taller de psicopedagogía'),
(195, 4, 6, 'Problemas contemporáneos I'),
(196, 4, 6, 'Teoría curricular'),
(197, 4, 6, 'Orientación Educativa II'),
(198, 4, 6, 'Investigación II'),
(199, 4, 6, 'Modelos educativos de nivel superior'),
(200, 4, 7, 'Problemas contemporáneos II'),
(201, 4, 7, 'Diseño y Evaluación Curricular'),
(202, 4, 7, 'Legislación y Políticas Educativa'),
(203, 4, 7, 'Investigación III'),
(204, 4, 7, 'Atención Educativa en Situaciones de Aprendizaje Diferenciado'),
(205, 4, 8, 'Análisis contemporáneos'),
(206, 4, 8, 'Dirección y Gestión Educativa'),
(207, 4, 8, 'Identidad y Vinculación Profesional'),
(208, 4, 8, 'Seminario de Tesis'),
(209, 4, 8, 'laneación y Evaluación Educativas'),
(210, 5, 1, 'Introducción al estudio de la Filosofía'),
(211, 5, 1, 'Computación'),
(212, 5, 1, 'Sociología Educativa'),
(213, 5, 1, 'Fisiología e Higiene Escolar'),
(214, 5, 1, 'Introducción  a la Psicopedagogía'),
(215, 5, 2, 'Historia de la Filosofía I'),
(216, 5, 2, 'Psicología General'),
(217, 5, 2, 'Historia de la Educación I'),
(218, 5, 2, 'Español I'),
(219, 5, 2, 'Intervención Psicopedagógica'),
(220, 5, 3, 'Historia de la Filosofía II'),
(221, 5, 3, 'Historia de la Educación II'),
(222, 5, 3, 'Psicología de la Personalidad'),
(223, 5, 3, 'Español II'),
(224, 5, 3, 'Comunicación Educativa'),
(225, 5, 3, 'Modelos Educativos de Nivel Básico'),
(226, 5, 4, 'Economía Política I'),
(227, 5, 4, 'Psicología del Aprendizaje'),
(228, 5, 4, 'Pedagogía'),
(229, 5, 4, 'Psicología del Desarrollo I'),
(230, 5, 4, 'Pensamiento Político I'),
(231, 5, 4, 'Modelos Educativos de Nivel Medio Superior y Superior'),
(232, 5, 5, 'Economía Política II'),
(233, 5, 5, 'Psicología del Desarrollo II'),
(234, 5, 5, 'Didáctica General I'),
(235, 5, 5, 'Educación Ambiental'),
(236, 5, 5, 'Pensamiento Político II'),
(237, 5, 5, 'Investigación I'),
(238, 5, 6, 'Problemas Contemporáneos I'),
(239, 5, 6, 'Orientación Educativa I'),
(240, 5, 6, 'Didáctica General II'),
(241, 5, 6, 'Psicología de Grupo'),
(242, 5, 6, 'Fundamentos de Pedagogía Especial'),
(243, 5, 6, 'Investigación II'),
(244, 5, 7, 'Problemas Contemporáneos II'),
(245, 5, 7, 'Orientación Educativa II'),
(246, 5, 7, 'Tecnología Educativa I'),
(247, 5, 7, 'Diseño Curricular'),
(248, 5, 7, 'Psicopatología'),
(249, 5, 7, 'Investigación III'),
(250, 5, 8, 'Análisis Contemporáneos'),
(251, 5, 8, 'Orientación Educativa III'),
(252, 5, 8, 'Tecnología Educativa II'),
(253, 5, 8, 'Tendencias Pedagógicas Contemporáneas'),
(254, 5, 8, 'Dirección y Gestión Educacional'),
(255, 5, 8, 'Seminario de Tesis'),
(256, 6, 1, 'Introducción al estudio de la filosofía'),
(257, 6, 1, 'Filosofía del Derecho'),
(258, 6, 1, 'Computación'),
(259, 6, 1, 'Derecho Romano I'),
(260, 6, 1, 'Introducción al Estudio del Derecho'),
(261, 6, 1, 'Teoría del Estado'),
(262, 6, 2, 'Historia de la Filosofía I'),
(263, 6, 2, 'Garantías'),
(264, 6, 2, 'Derecho'),
(265, 6, 2, 'Constitucional'),
(266, 6, 2, 'Derecho Romano II'),
(267, 6, 2, 'Derecho Civil I'),
(268, 6, 2, 'Derecho Mercantil'),
(269, 6, 3, 'Historia de la Filosofía II'),
(270, 6, 3, 'Derecho Civil II'),
(271, 6, 3, 'Títulos y Operaciones de Crédito'),
(272, 6, 3, 'Principios generales del derecho en materia penal'),
(273, 6, 3, 'Criminalistica'),
(274, 6, 3, 'Derecho Fiscal'),
(275, 6, 4, 'Economía Política I'),
(276, 6, 4, 'Derecho Civil III'),
(277, 6, 4, 'Argumentación e interpretación jurídica en el procedimiento escrito y en el juicio oral'),
(278, 6, 4, 'Derecho Penal I'),
(279, 6, 4, 'Derecho Laboral I'),
(280, 6, 4, 'Derecho de la Seguridad Social'),
(281, 6, 4, 'Pensamiento político I'),
(282, 6, 5, 'Economía Política II'),
(283, 6, 5, 'Derecho Civil IV'),
(284, 6, 5, 'Teoría General del Proceso'),
(285, 6, 5, 'Derecho Laboral II'),
(286, 6, 5, 'Derecho Penal II'),
(287, 6, 5, 'Derecho Administrativo'),
(288, 6, 5, 'Pensamiento político II'),
(289, 6, 6, 'Problemas Contemporáneos I'),
(290, 6, 6, 'Derecho Procesal Civil'),
(291, 6, 6, 'Derecho Procesal Penal'),
(292, 6, 6, 'Derecho Procesal Laboral'),
(293, 6, 6, 'Derecho Procesal Fiscal'),
(294, 6, 6, 'Metodología De La Investigación I'),
(295, 6, 7, 'Problemas Contemporáneos II'),
(296, 6, 7, 'Metodología De La Investigación II'),
(297, 6, 7, 'Practica forense del juicio oral'),
(298, 6, 7, 'Contencioso Administrativo'),
(299, 6, 7, 'Administración Pública'),
(300, 6, 7, 'Juicio de Amparo'),
(301, 6, 8, 'Análisis Contemporáneos I'),
(302, 6, 8, 'Derecho Notarial y Registral'),
(303, 6, 8, 'Derecho Agrario'),
(304, 6, 8, 'Procedimiento especial para inimputables y procedimiento de justicia para adolecentes'),
(305, 6, 8, 'Metodología De La Investigación III'),
(306, 6, 8, 'Derecho Penitenciario'),
(307, 7, 1, 'Introducción al estudio de la Filosofía'),
(308, 7, 1, 'Introducción a la Comunicación'),
(309, 7, 1, 'Sociología I'),
(310, 7, 1, 'Géneros periodísticos I'),
(311, 7, 1, 'Lenguaje y Comunicación'),
(312, 7, 1, 'Historia del periodismo'),
(313, 7, 1, 'Laboratorio de Computación'),
(314, 7, 2, 'Historia de la Filosofía I'),
(315, 7, 2, 'Comunicación I'),
(316, 7, 2, 'Sociología II'),
(317, 7, 2, 'Géneros periodísticos II'),
(318, 7, 2, 'Legislación de Medios Electrónicos'),
(319, 7, 2, 'Letras Universales Contemporáneas'),
(320, 7, 2, 'Historia Mundial'),
(321, 7, 3, 'Historia de la Filosofía II'),
(322, 7, 3, 'Comunicación II'),
(323, 7, 3, 'Fotografía I'),
(324, 7, 3, 'Géneros periodísticos III'),
(325, 7, 3, 'Semiótica'),
(326, 7, 3, 'Letras Mexicanas'),
(327, 7, 3, 'Estructura Socioeconómica de México Contemporáneo'),
(328, 7, 4, 'Economía Política I'),
(329, 7, 4, 'Pensamiento Político I'),
(330, 7, 4, 'Fotografía II'),
(331, 7, 4, 'Géneros periodísticos IV'),
(332, 7, 4, 'Lenguaje Audiovisual'),
(333, 7, 4, 'Microeconomía'),
(334, 7, 4, 'Agencias Informativas'),
(335, 7, 5, 'Economía Política II'),
(336, 7, 5, 'Pensamiento Político II'),
(337, 7, 5, 'Diseño Gráfico I'),
(338, 7, 5, 'Géneros periodísticos V'),
(339, 7, 5, 'Introducción a la Producción  Audiovisual'),
(340, 7, 5, 'Macroeconomía'),
(341, 7, 5, 'Opinión Pública y Propaganda'),
(342, 7, 6, 'Problemas Contemporáneos I'),
(343, 7, 6, 'Metodología de la Investigación I'),
(344, 7, 6, 'Diseño Gráfico II'),
(345, 7, 6, 'Géneros periodísticos VI'),
(346, 7, 6, 'Producción Radiofónica'),
(347, 7, 6, 'Comunicación Social'),
(348, 7, 6, 'Mercadotecnia'),
(349, 7, 7, 'Problemas Contemporáneos II'),
(350, 7, 7, 'Metodología de la Investigación II'),
(351, 7, 7, 'Diseño Editorial I'),
(352, 7, 7, 'Géneros periodísticos informativos en Televisión'),
(353, 7, 7, 'Producción Televisiva'),
(354, 7, 7, 'Imagen Corporativa'),
(355, 7, 7, 'Publicidad'),
(356, 7, 8, 'Análisis Contemporáneo'),
(357, 7, 8, 'Metodología de la Investigación III'),
(358, 7, 8, 'Diseño Editorial II'),
(359, 7, 8, 'Géneros periodísticos de opinión en Televisión'),
(360, 7, 8, 'Géneros Periodísticos Interpretativos'),
(361, 7, 8, 'Taller de Guión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `profesor_id` int(11) NOT NULL,
  `profesor_apaterno` text NOT NULL,
  `pofesor_amaterno` text NOT NULL,
  `profesor_nombres` text NOT NULL,
  `profesor_email` text NOT NULL,
  `profesor_telefono` text NOT NULL,
  `profesor_activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promedios`
--

CREATE TABLE `promedios` (
  `promedio_id` int(11) NOT NULL,
  `semestre_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `promedio_valor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relaciones`
--

CREATE TABLE `relaciones` (
  `relaciones_id` int(11) NOT NULL,
  `profesor_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `materias_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `administrador_id` int(11) DEFAULT NULL,
  `profesor_id` int(11) DEFAULT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `usuario_correo` varchar(150) NOT NULL,
  `usuario_contrasena` text NOT NULL,
  `usuario_telegramID` text DEFAULT NULL,
  `usuario_contrasena_temporal` text NOT NULL,
  `usuario_foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `administrador_id`, `profesor_id`, `alumno_id`, `usuario_correo`, `usuario_contrasena`, `usuario_telegramID`, `usuario_contrasena_temporal`, `usuario_foto`) VALUES
(1, 0, NULL, 1, 'charlieblackbear@live.com', 'e8351ae6c0498aa891913c896bd2a9ca', NULL, '', NULL),
(2, 1, NULL, NULL, 'alejandro@mail.com', 'e8351ae6c0498aa891913c896bd2a9ca', NULL, '', NULL),
(8, NULL, NULL, 91, 'test@test', 'd41d8cd98f00b204e9800998ecf8427e', '1234567890', '', NULL),
(9, NULL, NULL, 92, 'alex@mail.com', 'd41d8cd98f00b204e9800998ecf8427e', '1234567890', 'ohdpJ2Yg', NULL),
(13, NULL, NULL, 96, 'demog@demo.com', '89ec5d213590da72335113cde687e6df', '1234567890', '0sIhS2R4', NULL),
(73, NULL, NULL, 156, 'alex1@mail.com', '568d880be47e28be9cd75100f93759ef', '1234567890', 'CxzWCJMA', NULL),
(74, 157, NULL, NULL, 'demo@demo.com', 'fe01ce2a7fbac8fafaed7c982a04e229', '1234567890', 'demo', ' assets/img/img-avatar.gif '),
(75, NULL, NULL, 158, '', 'e6114de8d5935170f2941f791e729faf', '', 'lOSjB0v', NULL),
(76, NULL, NULL, 159, '', '901f44f81eaa464999a84d07817ba050', '', 'b2PNDpjZ', NULL),
(77, NULL, NULL, 159, '', '30317deccc1231b679bb2e9d06b785fb', '1234567890', 'P1lNg4R8', NULL),
(78, NULL, NULL, 160, '', '71eaa20fe76fecdeeb37a65b63abc919', '1234567890', 'TfM8Mvfp', NULL),
(79, NULL, NULL, 161, '', '3e77f97ca671a4d0b8fa80f298dfcb57', '1234567890', '9KJpZjSr', NULL),
(80, NULL, NULL, 162, '', '7d8b197802bfb8b1ce2eac2aa548b8de', '1234567890', 'MuEgfi2T', NULL),
(81, NULL, NULL, 163, '', '4f566427205c67e85b3e40c5a64d1c70', '1234567890', 'QkKGXxF5', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`administrador_id`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`alumno_id`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`bitacora_id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`carrera_id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`grupo_id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`materia_id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`profesor_id`);

--
-- Indices de la tabla `promedios`
--
ALTER TABLE `promedios`
  ADD PRIMARY KEY (`promedio_id`);

--
-- Indices de la tabla `relaciones`
--
ALTER TABLE `relaciones`
  ADD PRIMARY KEY (`relaciones_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `administrador_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `alumno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `bitacora_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `carrera_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `grupo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `materia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `profesor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promedios`
--
ALTER TABLE `promedios`
  MODIFY `promedio_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `relaciones`
--
ALTER TABLE `relaciones`
  MODIFY `relaciones_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
