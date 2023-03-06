-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2023 a las 20:03:48
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `programita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `Id` int(11) NOT NULL,
  `fecha` text NOT NULL,
  `nombre` text NOT NULL,
  `Id_Socio` text NOT NULL,
  `valor` text NOT NULL,
  `val_num` float NOT NULL,
  `motivo` text NOT NULL,
  `Caracter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`Id`, `fecha`, `nombre`, `Id_Socio`, `valor`, `val_num`, `motivo`, `Caracter`) VALUES
(1, '', 'Juan Perez', '1', '', 0, '', ''),
(2, '', 'Maria Rodriguez', '2', '', 0, '', ''),
(3, '', 'Pedro Martinez', '3', '', 0, '', ''),
(4, '', 'Isabel Gonzalez', '4', '', 0, '', ''),
(5, '', 'Javier Garcia', '5', '', 0, '', ''),
(6, '', 'Ana Lopez', '6', '', 0, '', ''),
(7, '', 'Carlos Ramirez', '7', '', 0, '', ''),
(8, '', 'Laura Jimenez', '8', '', 0, '', ''),
(9, '', 'Luis Perez', '9', '', 0, '', ''),
(10, '', 'Alicia Ramirez', '10', '', 0, '', ''),
(11, '', 'Jorge Garcia', '11', '', 0, '', ''),
(12, '', 'Adriana Lopez', '12', '', 0, '', ''),
(13, '', 'Ricardo Rodriguez', '13', '', 0, '', ''),
(14, '', 'Marta Perez', '14', '', 0, '', ''),
(15, '', 'Andres Martinez', '15', '', 0, '', ''),
(16, '', 'Lucia Gonzalez', '16', '', 0, '', ''),
(17, '', 'Pablo Garcia', '17', '', 0, '', ''),
(18, '', 'Carmen Lopez', '18', '', 0, '', ''),
(19, '', 'Daniel Ramirez', '19', '', 0, '', ''),
(20, '', 'Sofia Jimenez', '20', '', 0, '', ''),
(21, '', 'David Perez', '21', '', 0, '', ''),
(22, '', 'Antonia Ramirez', '22', '', 0, '', ''),
(23, '', 'Julio Garcia', '23', '', 0, '', ''),
(24, '', 'Raquel Lopez', '24', '', 0, '', ''),
(25, '', 'Eduardo Rodriguez', '25', '', 0, '', ''),
(26, '', 'Luz Martinez', '26', '', 0, '', ''),
(27, '', 'Gloria Gonzalez', '27', '', 0, '', ''),
(28, '', 'Enrique Garcia', '28', '', 0, '', ''),
(29, '', 'Marisol Lopez', '29', '', 0, '', ''),
(30, '', 'Miguel Ramirez', '30', '', 0, '', ''),
(31, '08/01/2023', 'Juan Perez', '1', 'Tres Mil Seiscientos', 3600, 'Abono a la cuota mensual', 'Ingreso'),
(32, '15/01/2023', 'Maria Rodriguez', '2', 'Ocho Mil', 8000, 'Pago de deuda', 'Egreso'),
(33, '20/01/2023', 'Pedro Martinez', '3', 'Cinco Mil', 5000, 'Abono a la cuota mensual', 'Ingreso'),
(34, '02/01/2023', 'Isabel Gonzalez', '4', 'Diez Mil', 10000, 'Pago de deuda', 'Egreso'),
(35, '06/01/2023', 'Javier Garcia', '5', 'Dos Mil', 2000, 'Abono a la cuota mensual', 'Ingreso'),
(36, '10/01/2023', 'Ana Lopez', '6', 'Nueve Mil Cien', 9100, 'Pago de deuda', 'Egreso'),
(37, '22/01/2023', 'Carlos Ramirez', '7', 'Seis Mil Trescientos', 6300, 'Abono a la cuota mensual', 'Ingreso'),
(38, '16/01/2023', 'Laura Jimenez', '8', 'Catorce Mil Ciento Veinte', 14120, 'Pago de deuda', 'Egreso'),
(39, '18/01/2023', 'Luis Perez', '9', 'Ocho Mil Ciento Veinte', 8120, 'Abono a la cuota mensual', 'Ingreso'),
(40, '23/01/2023', 'Alicia Ramirez', '10', 'Veinte Mil', 20000, 'Pago de deuda', 'Egreso'),
(41, '01/01/2023', 'Jorge Garcia', '11', 'Tres Mil', 3000, 'Abono a la cuota mensual', 'Ingreso'),
(42, '19/01/2023', 'Adriana Lopez', '12', 'Doce Mil', 12000, 'Pago de deuda', 'Egreso'),
(43, '12/01/2023', 'Ricardo Rodriguez', '13', 'Cinco Mil Ciento Veinte', 5120, 'Abono a la cuota mensual', 'Ingreso'),
(44, '04/01/2023', 'Marta Perez', '14', 'Cuatro Mil', 4000, 'Pago de deuda', 'Egreso'),
(45, '07/01/2023', 'Andres Martinez', '15', 'Seis Mil Quince', 6015, 'Abono a la cuota mensual', 'Ingreso'),
(46, '24/01/2023', 'Lucia Gonzalez', '16', 'Dieciocho Mil', 18000, 'Pago de deuda', 'Egreso'),
(47, '25/01/2023', 'Pablo Garcia', '17', 'Dos Mil Setecientos', 2700, 'Abono a la cuota mensual', 'Ingreso'),
(48, '26/01/2023', 'Carmen Lopez', '18', 'Diez Mil Ochocientos', 10800, 'Pago de deuda', 'Egreso'),
(49, '04/02/2023', 'Marisol Lopez', '29 ', 'Cinco mil', 5000, 'Cuota socio', 'Ingreso'),
(50, '04/02/2023', 'Carmen Lopez', '18 ', '', 2500, 'Deudas', 'Egreso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `Id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `fecha` text NOT NULL,
  `DNI` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`Id`, `nombre`, `fecha`, `DNI`) VALUES
(1, 'Juan Perez', '07/03/2021', 25000000),
(2, 'Maria Rodriguez', '24/06/2021', 29999999),
(3, 'Pedro Martinez', '20/12/2022', 30000000),
(4, 'Isabel Gonzalez', '02/08/2021', 31000000),
(5, 'Javier Garcia', '12/01/2023', 35000000),
(6, 'Ana Lopez', '15/04/2021', 36000000),
(7, 'Carlos Ramirez', '23/07/2022', 40000000),
(8, 'Laura Jimenez', '01/01/2020', 41000000),
(9, 'Luis Perez', '17/09/2022', 43000000),
(10, 'Alicia Ramirez', '08/02/2021', 45000000),
(11, 'Jorge Garcia', '11/11/2022', 46000000),
(12, 'Adriana Lopez', '20/06/2021', 47000000),
(13, 'Ricardo Rodriguez', '29/05/2021', 48000000),
(14, 'Marta Perez', '07/01/2021', 49000000),
(15, 'Andres Martinez', '19/04/2022', 49500000),
(16, 'Lucia Gonzalez', '02/10/2021', 49700000),
(17, 'Pablo Garcia', '10/03/2022', 49800000),
(18, 'Carmen Lopez', '17/12/2021', 49900000),
(19, 'Daniel Ramirez', '30/06/2022', 49950000),
(20, 'Sofia Jimenez', '08/08/2021', 49970000),
(21, 'David Perez', '24/01/2023', 49980000),
(22, 'Antonia Ramirez', '15/07/2021', 49990000),
(23, 'Julio Garcia', '11/05/2021', 49995000),
(24, 'Raquel Lopez', '16/12/2021', 49997000),
(25, 'Eduardo Rodriguez', '06/03/2021', 49998000),
(26, 'Luz Martinez', '12/08/2021', 49999000),
(27, 'Gloria Gonzalez', '19/11/2022', 49999500),
(28, 'Enrique Garcia', '01/01/2021', 49999700),
(29, 'Marisol Lopez', '29/06/2021', 49999800),
(30, 'Miguel Ramirez', '17/03/2021', 49999950);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(25) NOT NULL,
  `contra` varchar(25) NOT NULL,
  `creacion` date NOT NULL,
  `ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contra`, `creacion`, `ID`) VALUES
('a@a.com', 'a', '2023-01-23', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pagos` 
--
ALTER TABLE `pagos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
