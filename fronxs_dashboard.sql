-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2025 at 01:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fronxs_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesses`
--

CREATE TABLE `accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accesses`
--

INSERT INTO `accesses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'All Access', '2025-07-11 06:57:19', '2025-07-11 06:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `country_code` char(2) DEFAULT NULL,
  `iso_code` char(3) DEFAULT NULL,
  `phone_code` varchar(10) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL,
  `currency_name` varchar(50) DEFAULT NULL,
  `continent` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_code`, `iso_code`, `phone_code`, `currency_code`, `currency_name`, `continent`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', '+93', 'AFN', 'Afghan afghani', 'Asia', NULL, NULL),
(2, 'Albania', 'AL', 'ALB', '+355', 'ALL', 'Albanian lek', 'Europe', NULL, NULL),
(3, 'Algeria', 'DZ', 'DZA', '+213', 'DZD', 'Algerian dinar', 'Africa', NULL, NULL),
(4, 'Andorra', 'AD', 'AND', '+376', 'EUR', 'Euro', 'Europe', NULL, NULL),
(5, 'Angola', 'AO', 'AGO', '+244', 'AOA', 'Angolan kwanza', 'Africa', NULL, NULL),
(6, 'Antigua and Barbuda', 'AG', 'ATG', '+1-268', 'XCD', 'Eastern Caribbean dollar', 'North America', NULL, NULL),
(7, 'Argentina', 'AR', 'ARG', '+54', 'ARS', 'Argentine peso', 'South America', NULL, NULL),
(8, 'Armenia', 'AM', 'ARM', '+374', 'AMD', 'Armenian dram', 'Asia', NULL, NULL),
(9, 'Australia', 'AU', 'AUS', '+61', 'AUD', 'Australian dollar', 'Oceania', NULL, NULL),
(10, 'Austria', 'AT', 'AUT', '+43', 'EUR', 'Euro', 'Europe', NULL, NULL),
(11, 'Azerbaijan', 'AZ', 'AZE', '+994', 'AZN', 'Azerbaijani manat', 'Asia', NULL, NULL),
(12, 'Bahamas', 'BS', 'BHS', '+1-242', 'BSD', 'Bahamian dollar', 'North America', NULL, NULL),
(13, 'Bahrain', 'BH', 'BHR', '+973', 'BHD', 'Bahraini dinar', 'Asia', NULL, NULL),
(14, 'Bangladesh', 'BD', 'BGD', '+880', 'BDT', 'Bangladeshi taka', 'Asia', NULL, NULL),
(15, 'Barbados', 'BB', 'BRB', '+1-246', 'BBD', 'Barbadian dollar', 'North America', NULL, NULL),
(16, 'Belarus', 'BY', 'BLR', '+375', 'BYN', 'Belarusian ruble', 'Europe', NULL, NULL),
(17, 'Belgium', 'BE', 'BEL', '+32', 'EUR', 'Euro', 'Europe', NULL, NULL),
(18, 'Belize', 'BZ', 'BLZ', '+501', 'BZD', 'Belize dollar', 'North America', NULL, NULL),
(19, 'Benin', 'BJ', 'BEN', '+229', 'XOF', 'West African CFA franc', 'Africa', NULL, NULL),
(20, 'Bhutan', 'BT', 'BTN', '+975', 'BTN', 'Bhutanese ngultrum', 'Asia', NULL, NULL),
(21, 'Bolivia', 'BO', 'BOL', '+591', 'BOB', 'Bolivian boliviano', 'South America', NULL, NULL),
(22, 'Bosnia and Herzegovina', 'BA', 'BIH', '+387', 'BAM', 'Bosnia and Herzegovina convertible mark', 'Europe', NULL, NULL),
(23, 'Botswana', 'BW', 'BWA', '+267', 'BWP', 'Botswana pula', 'Africa', NULL, NULL),
(24, 'Brazil', 'BR', 'BRA', '+55', 'BRL', 'Brazilian real', 'South America', NULL, NULL),
(25, 'Brunei', 'BN', 'BRN', '+673', 'BND', 'Brunei dollar', 'Asia', NULL, NULL),
(26, 'Bulgaria', 'BG', 'BGR', '+359', 'BGN', 'Bulgarian lev', 'Europe', NULL, NULL),
(27, 'Burkina Faso', 'BF', 'BFA', '+226', 'XOF', 'West African CFA franc', 'Africa', NULL, NULL),
(28, 'Burundi', 'BI', 'BDI', '+257', 'BIF', 'Burundian franc', 'Africa', NULL, NULL),
(29, 'Cambodia', 'KH', 'KHM', '+855', 'KHR', 'Cambodian riel', 'Asia', NULL, NULL),
(30, 'Cameroon', 'CM', 'CMR', '+237', 'XAF', 'Central African CFA franc', 'Africa', NULL, NULL),
(31, 'Canada', 'CA', 'CAN', '+1', 'CAD', 'Canadian dollar', 'North America', NULL, NULL),
(32, 'Cape Verde', 'CV', 'CPV', '+238', 'CVE', 'Cape Verdean escudo', 'Africa', NULL, NULL),
(33, 'Central African Republic', 'CF', 'CAF', '+236', 'XAF', 'Central African CFA franc', 'Africa', NULL, NULL),
(34, 'Chad', 'TD', 'TCD', '+235', 'XAF', 'Central African CFA franc', 'Africa', NULL, NULL),
(35, 'Chile', 'CL', 'CHL', '+56', 'CLP', 'Chilean peso', 'South America', NULL, NULL),
(36, 'China', 'CN', 'CHN', '+86', 'CNY', 'Chinese yuan', 'Asia', NULL, NULL),
(37, 'Colombia', 'CO', 'COL', '+57', 'COP', 'Colombian peso', 'South America', NULL, NULL),
(38, 'Comoros', 'KM', 'COM', '+269', 'KMF', 'Comorian franc', 'Africa', NULL, NULL),
(39, 'Congo', 'CG', 'COG', '+242', 'XAF', 'Central African CFA franc', 'Africa', NULL, NULL),
(40, 'Costa Rica', 'CR', 'CRI', '+506', 'CRC', 'Costa Rican colon', 'North America', NULL, NULL),
(41, 'Croatia', 'HR', 'HRV', '+385', 'HRK', 'Croatian kuna', 'Europe', NULL, NULL),
(42, 'Cuba', 'CU', 'CUB', '+53', 'CUP', 'Cuban peso', 'North America', NULL, NULL),
(43, 'Cyprus', 'CY', 'CYP', '+357', 'EUR', 'Euro', 'Europe', NULL, NULL),
(44, 'Czech Republic', 'CZ', 'CZE', '+420', 'CZK', 'Czech koruna', 'Europe', NULL, NULL),
(45, 'Denmark', 'DK', 'DNK', '+45', 'DKK', 'Danish krone', 'Europe', NULL, NULL),
(46, 'Djibouti', 'DJ', 'DJI', '+253', 'DJF', 'Djiboutian franc', 'Africa', NULL, NULL),
(47, 'Dominica', 'DM', 'DMA', '+1-767', 'XCD', 'Eastern Caribbean dollar', 'North America', NULL, NULL),
(48, 'Dominican Republic', 'DO', 'DOM', '+1-809, +1', 'DOP', 'Dominican peso', 'North America', NULL, NULL),
(49, 'Ecuador', 'EC', 'ECU', '+593', 'USD', 'United States dollar', 'South America', NULL, NULL),
(50, 'Egypt', 'EG', 'EGY', '+20', 'EGP', 'Egyptian pound', 'Africa', NULL, NULL),
(51, 'El Salvador', 'SV', 'SLV', '+503', 'USD', 'United States dollar', 'North America', NULL, NULL),
(52, 'Equatorial Guinea', 'GQ', 'GNQ', '+240', 'XAF', 'Central African CFA franc', 'Africa', NULL, NULL),
(53, 'Eritrea', 'ER', 'ERI', '+291', 'ERN', 'Eritrean nakfa', 'Africa', NULL, NULL),
(54, 'Estonia', 'EE', 'EST', '+372', 'EUR', 'Euro', 'Europe', NULL, NULL),
(55, 'Eswatini', 'SZ', 'SWZ', '+268', 'SZL', 'Swazi lilangeni', 'Africa', NULL, NULL),
(56, 'Ethiopia', 'ET', 'ETH', '+251', 'ETB', 'Ethiopian birr', 'Africa', NULL, NULL),
(57, 'Fiji', 'FJ', 'FJI', '+679', 'FJD', 'Fijian dollar', 'Oceania', NULL, NULL),
(58, 'Finland', 'FI', 'FIN', '+358', 'EUR', 'Euro', 'Europe', NULL, NULL),
(59, 'France', 'FR', 'FRA', '+33', 'EUR', 'Euro', 'Europe', NULL, NULL),
(60, 'Gabon', 'GA', 'GAB', '+241', 'XAF', 'Central African CFA franc', 'Africa', NULL, NULL),
(61, 'Gambia', 'GM', 'GMB', '+220', 'GMD', 'Gambian dalasi', 'Africa', NULL, NULL),
(62, 'Georgia', 'GE', 'GEO', '+995', 'GEL', 'Georgian lari', 'Asia', NULL, NULL),
(63, 'Germany', 'DE', 'DEU', '+49', 'EUR', 'Euro', 'Europe', NULL, NULL),
(64, 'Ghana', 'GH', 'GHA', '+233', 'GHS', 'Ghanaian cedi', 'Africa', NULL, NULL),
(65, 'Greece', 'GR', 'GRC', '+30', 'EUR', 'Euro', 'Europe', NULL, NULL),
(66, 'Grenada', 'GD', 'GRD', '+1-473', 'XCD', 'Eastern Caribbean dollar', 'North America', NULL, NULL),
(67, 'Guatemala', 'GT', 'GTM', '+502', 'GTQ', 'Guatemalan quetzal', 'North America', NULL, NULL),
(68, 'Guinea', 'GN', 'GIN', '+224', 'GNF', 'Guinean franc', 'Africa', NULL, NULL),
(69, 'Guinea-Bissau', 'GW', 'GNB', '+245', 'XOF', 'West African CFA franc', 'Africa', NULL, NULL),
(70, 'Guyana', 'GY', 'GUY', '+592', 'GYD', 'Guyanese dollar', 'South America', NULL, NULL),
(71, 'Haiti', 'HT', 'HTI', '+509', 'HTG', 'Haitian gourde', 'North America', NULL, NULL),
(72, 'Honduras', 'HN', 'HND', '+504', 'HNL', 'Honduran lempira', 'North America', NULL, NULL),
(73, 'Hungary', 'HU', 'HUN', '+36', 'HUF', 'Hungarian forint', 'Europe', NULL, NULL),
(74, 'Iceland', 'IS', 'ISL', '+354', 'ISK', 'Icelandic króna', 'Europe', NULL, NULL),
(75, 'India', 'IN', 'IND', '+91', 'INR', 'Indian rupee', 'Asia', NULL, NULL),
(76, 'Indonesia', 'ID', 'IDN', '+62', 'IDR', 'Indonesian rupiah', 'Asia', NULL, NULL),
(77, 'Iran', 'IR', 'IRN', '+98', 'IRR', 'Iranian rial', 'Asia', NULL, NULL),
(78, 'Iraq', 'IQ', 'IRQ', '+964', 'IQD', 'Iraqi dinar', 'Asia', NULL, NULL),
(79, 'Ireland', 'IE', 'IRL', '+353', 'EUR', 'Euro', 'Europe', NULL, NULL),
(80, 'Israel', 'IL', 'ISR', '+972', 'ILS', 'Israeli new shekel', 'Asia', NULL, NULL),
(81, 'Italy', 'IT', 'ITA', '+39', 'EUR', 'Euro', 'Europe', NULL, NULL),
(82, 'Ivory Coast', 'CI', 'CIV', '+225', 'XOF', 'West African CFA franc', 'Africa', NULL, NULL),
(83, 'Jamaica', 'JM', 'JAM', '+1-876', 'JMD', 'Jamaican dollar', 'North America', NULL, NULL),
(84, 'Japan', 'JP', 'JPN', '+81', 'JPY', 'Japanese yen', 'Asia', NULL, NULL),
(85, 'Jordan', 'JO', 'JOR', '+962', 'JOD', 'Jordanian dinar', 'Asia', NULL, NULL),
(86, 'Kazakhstan', 'KZ', 'KAZ', '+7', 'KZT', 'Kazakhstani tenge', 'Asia', NULL, NULL),
(87, 'Kenya', 'KE', 'KEN', '+254', 'KES', 'Kenyan shilling', 'Africa', NULL, NULL),
(88, 'Kiribati', 'KI', 'KIR', '+686', 'AUD', 'Australian dollar', 'Oceania', NULL, NULL),
(89, 'Korea, North', 'KP', 'PRK', '+850', 'KPW', 'North Korean won', 'Asia', NULL, NULL),
(90, 'Korea, South', 'KR', 'KOR', '+82', 'KRW', 'South Korean won', 'Asia', NULL, NULL),
(91, 'Kuwait', 'KW', 'KWT', '+965', 'KWD', 'Kuwaiti dinar', 'Asia', NULL, NULL),
(92, 'Kyrgyzstan', 'KG', 'KGZ', '+996', 'KGS', 'Kyrgyzstani som', 'Asia', NULL, NULL),
(93, 'Laos', 'LA', 'LAO', '+856', 'LAK', 'Lao kip', 'Asia', NULL, NULL),
(94, 'Latvia', 'LV', 'LVA', '+371', 'EUR', 'Euro', 'Europe', NULL, NULL),
(95, 'Lebanon', 'LB', 'LBN', '+961', 'LBP', 'Lebanese pound', 'Asia', NULL, NULL),
(96, 'Lesotho', 'LS', 'LSO', '+266', 'LSL', 'Lesotho loti', 'Africa', NULL, NULL),
(97, 'Liberia', 'LR', 'LBR', '+231', 'LRD', 'Liberian dollar', 'Africa', NULL, NULL),
(98, 'Libya', 'LY', 'LBY', '+218', 'LYD', 'Libyan dinar', 'Africa', NULL, NULL),
(99, 'Liechtenstein', 'LI', 'LIE', '+423', 'CHF', 'Swiss franc', 'Europe', NULL, NULL),
(100, 'Lithuania', 'LT', 'LTU', '+370', 'EUR', 'Euro', 'Europe', NULL, NULL),
(101, 'Luxembourg', 'LU', 'LUX', '+352', 'EUR', 'Euro', 'Europe', NULL, NULL),
(102, 'Madagascar', 'MG', 'MDG', '+261', 'MGA', 'Malagasy ariary', 'Africa', NULL, NULL),
(103, 'Malawi', 'MW', 'MWI', '+265', 'MWK', 'Malawian kwacha', 'Africa', NULL, NULL),
(104, 'Malaysia', 'MY', 'MYS', '+60', 'MYR', 'Malaysian ringgit', 'Asia', NULL, NULL),
(105, 'Maldives', 'MV', 'MDV', '+960', 'MVR', 'Maldivian rufiyaa', 'Asia', NULL, NULL),
(106, 'Mali', 'ML', 'MLI', '+223', 'XOF', 'West African CFA franc', 'Africa', NULL, NULL),
(107, 'Malta', 'MT', 'MLT', '+356', 'EUR', 'Euro', 'Europe', NULL, NULL),
(108, 'Marshall Islands', 'MH', 'MHL', '+692', 'USD', 'United States dollar', 'Oceania', NULL, NULL),
(109, 'Mauritania', 'MR', 'MRT', '+222', 'MRU', 'Mauritanian ouguiya', 'Africa', NULL, NULL),
(110, 'Mauritius', 'MU', 'MUS', '+230', 'MUR', 'Mauritian rupee', 'Africa', NULL, NULL),
(111, 'Mexico', 'MX', 'MEX', '+52', 'MXN', 'Mexican peso', 'North America', NULL, NULL),
(112, 'Micronesia', 'FM', 'FSM', '+691', 'USD', 'United States dollar', 'Oceania', NULL, NULL),
(113, 'Moldova', 'MD', 'MDA', '+373', 'MDL', 'Moldovan leu', 'Europe', NULL, NULL),
(114, 'Monaco', 'MC', 'MCO', '+377', 'EUR', 'Euro', 'Europe', NULL, NULL),
(115, 'Mongolia', 'MN', 'MNG', '+976', 'MNT', 'Mongolian tögrög', 'Asia', NULL, NULL),
(116, 'Montenegro', 'ME', 'MNE', '+382', 'EUR', 'Euro', 'Europe', NULL, NULL),
(117, 'Morocco', 'MA', 'MAR', '+212', 'MAD', 'Moroccan dirham', 'Africa', NULL, NULL),
(118, 'Mozambique', 'MZ', 'MOZ', '+258', 'MZN', 'Mozambican metical', 'Africa', NULL, NULL),
(119, 'Myanmar', 'MM', 'MMR', '+95', 'MMK', 'Burmese kyat', 'Asia', NULL, NULL),
(120, 'Namibia', 'NA', 'NAM', '+264', 'NAD', 'Namibian dollar', 'Africa', NULL, NULL),
(121, 'Nauru', 'NR', 'NRU', '+674', 'AUD', 'Australian dollar', 'Oceania', NULL, NULL),
(122, 'Nepal', 'NP', 'NPL', '+977', 'NPR', 'Nepalese rupee', 'Asia', NULL, NULL),
(123, 'Netherlands', 'NL', 'NLD', '+31', 'EUR', 'Euro', 'Europe', NULL, NULL),
(124, 'New Zealand', 'NZ', 'NZL', '+64', 'NZD', 'New Zealand dollar', 'Oceania', NULL, NULL),
(125, 'Nicaragua', 'NI', 'NIC', '+505', 'NIO', 'Nicaraguan córdoba', 'North America', NULL, NULL),
(126, 'Niger', 'NE', 'NER', '+227', 'XOF', 'West African CFA franc', 'Africa', NULL, NULL),
(127, 'Nigeria', 'NG', 'NGA', '+234', 'NGN', 'Nigerian naira', 'Africa', NULL, NULL),
(128, 'North Macedonia', 'MK', 'MKD', '+389', 'MKD', 'Macedonian denar', 'Europe', NULL, NULL),
(129, 'Norway', 'NO', 'NOR', '+47', 'NOK', 'Norwegian krone', 'Europe', NULL, NULL),
(130, 'Oman', 'OM', 'OMN', '+968', 'OMR', 'Omani rial', 'Asia', NULL, NULL),
(131, 'Pakistan', 'PK', 'PAK', '+92', 'PKR', 'Pakistani rupee', 'Asia', NULL, NULL),
(132, 'Palau', 'PW', 'PLW', '+680', 'USD', 'United States dollar', 'Oceania', NULL, NULL),
(133, 'Panama', 'PA', 'PAN', '+507', 'USD', 'United States dollar', 'North America', NULL, NULL),
(134, 'Papua New Guinea', 'PG', 'PNG', '+675', 'PGK', 'Papua New Guinean kina', 'Oceania', NULL, NULL),
(135, 'Paraguay', 'PY', 'PRY', '+595', 'PYG', 'Paraguayan guaraní', 'South America', NULL, NULL),
(136, 'Peru', 'PE', 'PER', '+51', 'PEN', 'Peruvian sol', 'South America', NULL, NULL),
(137, 'Philippines', 'PH', 'PHL', '+63', 'PHP', 'Philippine peso', 'Asia', NULL, NULL),
(138, 'Poland', 'PL', 'POL', '+48', 'PLN', 'Polish złoty', 'Europe', NULL, NULL),
(139, 'Portugal', 'PT', 'PRT', '+351', 'EUR', 'Euro', 'Europe', NULL, NULL),
(140, 'Qatar', 'QA', 'QAT', '+974', 'QAR', 'Qatari riyal', 'Asia', NULL, NULL),
(141, 'Romania', 'RO', 'ROU', '+40', 'RON', 'Romanian leu', 'Europe', NULL, NULL),
(142, 'Russia', 'RU', 'RUS', '+7', 'RUB', 'Russian ruble', 'Europe', NULL, NULL),
(143, 'Rwanda', 'RW', 'RWA', '+250', 'RWF', 'Rwandan franc', 'Africa', NULL, NULL),
(144, 'Saint Kitts and Nevis', 'KN', 'KNA', '+1-869', 'XCD', 'Eastern Caribbean dollar', 'North America', NULL, NULL),
(145, 'Saint Lucia', 'LC', 'LCA', '+1-758', 'XCD', 'Eastern Caribbean dollar', 'North America', NULL, NULL),
(146, 'Saint Vincent and the Grenadines', 'VC', 'VCT', '+1-784', 'XCD', 'Eastern Caribbean dollar', 'North America', NULL, NULL),
(147, 'Samoa', 'WS', 'WSM', '+685', 'WST', 'Samoan tālā', 'Oceania', NULL, NULL),
(148, 'San Marino', 'SM', 'SMR', '+378', 'EUR', 'Euro', 'Europe', NULL, NULL),
(149, 'Sao Tome and Principe', 'ST', 'STP', '+239', 'STN', 'São Tomé and Príncipe dobra', 'Africa', NULL, NULL),
(150, 'Saudi Arabia', 'SA', 'SAU', '+966', 'SAR', 'Saudi riyal', 'Asia', NULL, NULL),
(151, 'Senegal', 'SN', 'SEN', '+221', 'XOF', 'West African CFA franc', 'Africa', NULL, NULL),
(152, 'Serbia', 'RS', 'SRB', '+381', 'RSD', 'Serbian dinar', 'Europe', NULL, NULL),
(153, 'Seychelles', 'SC', 'SYC', '+248', 'SCR', 'Seychellois rupee', 'Africa', NULL, NULL),
(154, 'Sierra Leone', 'SL', 'SLE', '+232', 'SLL', 'Sierra Leonean leone', 'Africa', NULL, NULL),
(155, 'Singapore', 'SG', 'SGP', '+65', 'SGD', 'Singapore dollar', 'Asia', NULL, NULL),
(156, 'Slovakia', 'SK', 'SVK', '+421', 'EUR', 'Euro', 'Europe', NULL, NULL),
(157, 'Slovenia', 'SI', 'SVN', '+386', 'EUR', 'Euro', 'Europe', NULL, NULL),
(158, 'Solomon Islands', 'SB', 'SLB', '+677', 'SBD', 'Solomon Islands dollar', 'Oceania', NULL, NULL),
(159, 'Somalia', 'SO', 'SOM', '+252', 'SOS', 'Somali shilling', 'Africa', NULL, NULL),
(160, 'South Africa', 'ZA', 'ZAF', '+27', 'ZAR', 'South African rand', 'Africa', NULL, NULL),
(161, 'South Sudan', 'SS', 'SSD', '+211', 'SSP', 'South Sudanese pound', 'Africa', NULL, NULL),
(162, 'Spain', 'ES', 'ESP', '+34', 'EUR', 'Euro', 'Europe', NULL, NULL),
(163, 'Sri Lanka', 'LK', 'LKA', '+94', 'LKR', 'Sri Lankan rupee', 'Asia', NULL, NULL),
(164, 'Sudan', 'SD', 'SDN', '+249', 'SDG', 'Sudanese pound', 'Africa', NULL, NULL),
(165, 'Suriname', 'SR', 'SUR', '+597', 'SRD', 'Surinamese dollar', 'South America', NULL, NULL),
(166, 'Sweden', 'SE', 'SWE', '+46', 'SEK', 'Swedish krona', 'Europe', NULL, NULL),
(167, 'Switzerland', 'CH', 'CHE', '+41', 'CHF', 'Swiss franc', 'Europe', NULL, NULL),
(168, 'Syria', 'SY', 'SYR', '+963', 'SYP', 'Syrian pound', 'Asia', NULL, NULL),
(169, 'Taiwan', 'TW', 'TWN', '+886', 'TWD', 'New Taiwan dollar', 'Asia', NULL, NULL),
(170, 'Tajikistan', 'TJ', 'TJK', '+992', 'TJS', 'Tajikistani somoni', 'Asia', NULL, NULL),
(171, 'Tanzania', 'TZ', 'TZA', '+255', 'TZS', 'Tanzanian shilling', 'Africa', NULL, NULL),
(172, 'Thailand', 'TH', 'THA', '+66', 'THB', 'Thai baht', 'Asia', NULL, NULL),
(173, 'Togo', 'TG', 'TGO', '+228', 'XOF', 'West African CFA franc', 'Africa', NULL, NULL),
(174, 'Tonga', 'TO', 'TON', '+676', 'TOP', 'Tongan paʻanga', 'Oceania', NULL, NULL),
(175, 'Trinidad and Tobago', 'TT', 'TTO', '+1-868', 'TTD', 'Trinidad and Tobago dollar', 'North America', NULL, NULL),
(176, 'Tunisia', 'TN', 'TUN', '+216', 'TND', 'Tunisian dinar', 'Africa', NULL, NULL),
(177, 'Turkey', 'TR', 'TUR', '+90', 'TRY', 'Turkish lira', 'Asia', NULL, NULL),
(178, 'Turkmenistan', 'TM', 'TKM', '+993', 'TMT', 'Turkmenistan manat', 'Asia', NULL, NULL),
(179, 'Tuvalu', 'TV', 'TUV', '+688', 'AUD', 'Australian dollar', 'Oceania', NULL, NULL),
(180, 'Uganda', 'UG', 'UGA', '+256', 'UGX', 'Ugandan shilling', 'Africa', NULL, NULL),
(181, 'Ukraine', 'UA', 'UKR', '+380', 'UAH', 'Ukrainian hryvnia', 'Europe', NULL, NULL),
(182, 'United Arab Emirates', 'AE', 'ARE', '+971', 'AED', 'United Arab Emirates dirham', 'Asia', NULL, NULL),
(183, 'United Kingdom', 'GB', 'GBR', '+44', 'GBP', 'British pound', 'Europe', NULL, NULL),
(184, 'United States', 'US', 'USA', '+1', 'USD', 'United States dollar', 'North America', NULL, NULL),
(185, 'Uruguay', 'UY', 'URY', '+598', 'UYU', 'Uruguayan peso', 'South America', NULL, NULL),
(186, 'Uzbekistan', 'UZ', 'UZB', '+998', 'UZS', 'Uzbekistani soʻm', 'Asia', NULL, NULL),
(187, 'Vanuatu', 'VU', 'VUT', '+678', 'VUV', 'Vanuatu vatu', 'Oceania', NULL, NULL),
(188, 'Vatican City', 'VA', 'VAT', '+379', 'EUR', 'Euro', 'Europe', NULL, NULL),
(189, 'Venezuela', 'VE', 'VEN', '+58', 'VES', 'Venezuelan bolívar', 'South America', NULL, NULL),
(190, 'Vietnam', 'VN', 'VNM', '+84', 'VND', 'Vietnamese đồng', 'Asia', NULL, NULL),
(191, 'Yemen', 'YE', 'YEM', '+967', 'YER', 'Yemeni rial', 'Asia', NULL, NULL),
(192, 'Zambia', 'ZM', 'ZMB', '+260', 'ZMW', 'Zambian kwacha', 'Africa', NULL, NULL),
(193, 'Zimbabwe', 'ZW', 'ZWE', '+263', 'ZWL', 'Zimbabwean dollar', 'Africa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '0001_01_01_000000_create_users_table', 1),
(11, '0001_01_01_000001_create_cache_table', 1),
(12, '0001_01_01_000002_create_jobs_table', 1),
(13, '2025_07_03_092858_create_platforms_table', 1),
(14, '2025_07_03_102926_create_technologies_table', 1),
(15, '2025_07_03_111509_create_projects_table', 1),
(16, '2025_07_07_085030_create_countries_table', 1),
(17, '2025_07_07_114942_create_project_guides_table', 1),
(18, '2025_07_11_111850_create_project_user_table', 1),
(19, '2025_07_14_090230_create_transactions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `platforms`
--

CREATE TABLE `platforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `platforms`
--

INSERT INTO `platforms` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Fiver', 'fiver', '2025-07-11 06:59:20', '2025-07-11 06:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `clint_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `platform_id` bigint(20) UNSIGNED DEFAULT NULL,
  `technology_id` bigint(20) UNSIGNED DEFAULT NULL,
  `priority` varchar(255) NOT NULL DEFAULT 'low',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `earn_from_project` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paid_to_outside` decimal(10,2) NOT NULL DEFAULT 0.00,
  `work_done_by` varchar(255) DEFAULT NULL,
  `project_guide` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `progress` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `clint_name`, `country`, `platform_id`, `technology_id`, `priority`, `start_date`, `end_date`, `earn_from_project`, `paid_to_outside`, `work_done_by`, `project_guide`, `status`, `progress`, `created_at`, `updated_at`) VALUES
(1, 'Rosalyn Mathis', 'Fiona Wagner', '65', 1, 1, 'low', '2020-06-11', '2026-01-01', 32.00, 93.00, NULL, NULL, 'Completed', 100, '2025-07-11 07:19:50', '2025-07-14 03:50:10'),
(2, 'Savannah Huber', 'Azalia Hatfield', '88', 1, 1, 'low', '1977-01-13', '2003-04-27', 64.00, 91.00, NULL, NULL, 'pending', 0, '2025-07-12 03:44:49', '2025-07-12 03:44:49'),
(3, 'Savannah Huber', 'Azalia Hatfield', '88', 1, 1, 'low', '1977-01-13', '2003-04-27', 64.00, 91.00, NULL, NULL, 'In Progress', 25, '2025-07-12 03:46:29', '2025-07-14 03:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `project_guides`
--

CREATE TABLE `project_guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `project_description` text DEFAULT NULL,
  `cpanel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_guides`
--

INSERT INTO `project_guides` (`id`, `project_id`, `website_url`, `project_description`, `cpanel`, `email`, `password`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'http://127.0.0.1:8000/projects/create', 'bc bv bv', 'bnbnm', 'admin@gmail.com', 'abc', 'bvcgfghj', '2025-07-11 07:19:50', '2025-07-11 07:19:50'),
(2, 3, 'http://127.0.0.1:8000/projects/create', 'vhhgvghvg', 'jkbnjkbjkb', 'admin@gmail.com', 'dfgh', 'jhvjhvh', '2025-07-12 03:46:29', '2025-07-12 03:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Employee', '2025-07-11 06:57:07', '2025-07-11 06:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ooZRmy9yRpfKSRljgdNdFm9sI0hVJzqraKYZpAbu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSEVzTldXWEdoRkZWT3pKbFMyOU9Tb2swMzJIZkFLaGpFRHhvNGtLNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9qZWN0cy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1752485577);

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `name`, `slug`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Lravel', 'laravel', NULL, '2025-07-11 06:59:38', '2025-07-11 06:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `transaction_date` date NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `access_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile`, `name`, `email`, `email_verified_at`, `password`, `phone`, `gender`, `status`, `role_id`, `access_id`, `remember_token`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 'profile_photos/1752239272.png', 'Arsalan', 'arsalanshamsher980@gmail.com', NULL, '$2y$12$GG4sCSd0k/40bq0ULIMWjObPhv6u6UIR7FG4esZ57vN7kr3xM6PWC', '03042109730', 'male', 'active', 1, 1, NULL, NULL, '2025-07-11 06:58:44', '2025-07-11 08:07:52'),
(2, NULL, 'Azlan', 'azlan@gmail.com', NULL, '$2y$12$hk/spLV3oDMY6OKxRjaLaOg1eJ91RJmjJ1yrknC4ENvtlo0BOPDQy', '03042109730', 'male', 'active', 1, 1, NULL, NULL, '2025-07-11 07:24:47', '2025-07-11 07:24:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `platforms_slug_unique` (`slug`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_platform_id_foreign` (`platform_id`),
  ADD KEY `projects_technology_id_foreign` (`technology_id`);

--
-- Indexes for table `project_guides`
--
ALTER TABLE `project_guides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_guides_project_id_foreign` (`project_id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_user_project_id_foreign` (`project_id`),
  ADD KEY `project_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `technologies_name_unique` (`name`),
  ADD UNIQUE KEY `technologies_slug_unique` (`slug`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_access_id_foreign` (`access_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_guides`
--
ALTER TABLE `project_guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_platform_id_foreign` FOREIGN KEY (`platform_id`) REFERENCES `platforms` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `projects_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `project_guides`
--
ALTER TABLE `project_guides`
  ADD CONSTRAINT `project_guides_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_user`
--
ALTER TABLE `project_user`
  ADD CONSTRAINT `project_user_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_access_id_foreign` FOREIGN KEY (`access_id`) REFERENCES `accesses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
