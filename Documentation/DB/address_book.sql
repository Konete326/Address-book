-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 04:44 PM
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
-- Database: `address_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`) VALUES
(9, 'jewellery', NULL, NULL),
(10, 'cosmetics', NULL, NULL),
(13, 'Lip Products', 10, 'uploads/subcategories/WWD-RMS-RED-900X1084_720x-removebg-preview.png'),
(16, 'Earings', 9, 'uploads/subcategories/i-3.png'),
(17, 'Rings', 9, 'uploads/subcategories/i-2.png'),
(18, 'Face Products', 10, 'uploads/subcategories/EYELIGHTS-PPAGE-900x1084-Eclipse-removebg-preview.png'),
(19, 'Eye Products', 10, 'uploads/subcategories/MASCARA-900X1084_2_720x-removebg-preview.png'),
(21, 'bracelets', 9, 'uploads/subcategories/bracelets.png');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 'sameer akram', 'asad@gmail.com', '3225655655', 'hkhk', '2025-03-04 21:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(50) NOT NULL DEFAULT 'Cash on Delivery'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `order_status`, `created_at`, `payment_method`) VALUES
(4, 4, 300.00, 'Completed', '2025-03-03 12:54:14', 'Cash on Delivery'),
(5, 4, 300.00, 'Completed', '2025-03-03 12:56:45', 'Cash on Delivery'),
(6, 4, 333.00, 'Pending', '2025-03-03 13:17:36', 'Cash on Delivery'),
(7, 4, 33.00, 'Pending', '2025-03-03 13:19:02', 'Cash on Delivery'),
(8, 4, 300.00, 'Pending', '2025-03-03 13:27:23', 'Cash on Delivery'),
(9, 4, 333.00, 'Pending', '2025-03-03 13:32:21', 'Cash on Delivery'),
(10, 4, 4.00, 'Pending', '2025-03-04 08:31:22', 'Cash on Delivery'),
(11, 5, 4500.00, 'Pending', '2025-03-04 08:52:15', 'Cash on Delivery'),
(12, 6, 44521.00, 'Pending', '2025-03-04 21:16:18', 'Cash on Delivery'),
(13, 5, 3400.00, 'Pending', '2025-03-05 07:43:10', 'Cash on Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total_price`) VALUES
(15, 12, 22, 1, 18121.00, 18121.00),
(17, 13, 24, 1, 3400.00, 3400.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `image_url`, `description`, `category_id`) VALUES
(14, 'UnCoverup Concealer', 11150.00, 20, 'uploads/900x1084-ucu-000_720x.png', '*Cocos Nucifera (Coconut) Oil, *Ricinus Communis (Castor) Seed Oil, *Cera Alba (Beeswax), *Theobroma Cacao (Cocoa) Seed Butter, *Simmondsia Chinensis (Jojoba) Seed Oil, Tocopherol(non-GMO), *Rosmarinus officinalis (Rosemary) Extract, and may contain [+/-]: Titanium Dioxide (CI 77891), Iron Oxides (CI 77492, CI 77491, CI 77499) *CERTIFIED ORGANIC', 18),
(15, 'ReDimension Hydra Bronzer', 10030.00, 30, 'uploads/hydrabronzer-900x1084-ppage-pack.png', 'Beachwalk Betty: Mica, Coco-Caprylate/Caprate, Cetearyl Ethylhexanoate, Glycerin, Sorbitan Oleate Decylglucoside Crosspolymer, Water/Aqua/Eau, Hydrolyzed Rice Protein, Sodium Isostearate, Squalane, Caprylyl Glycol, Ethylhexylglycerin, Aluminum Hydroxide, 1,2-Hexanediol, Pentylene Glycol, Gellan Gum, Calcium Chloride, Sodium Chloride, Pentaerythrityl Tetra-di-t-butyl Hydroxyhydrocinnamate, Zinc Stearate, Lauroyl Lysine, Tin Oxide, *Simmondsia Chinensis (Jojoba) Seed Oil, Sodium Citrate, Xanthan Gum, **Mauritia Flexuosa (Buriti) Fruit Oil, Rosmarinus Officinalis (Rosemary) Leaf Extract, Helianthus Annuus (Sunflower) Seed Oil, Tocopherol (non-GMO), Titanium Dioxide (CI 77891), Iron Oxides (CI 77491, CI 77492, CI 77499), Manganese Violet (CI 77742), Red 30 Lake (CI 73360).', 18),
(16, 'SuperNatural Radiance Serum Broad Spectrum SPF 30 Sunscreen', 13660.00, 10, 'uploads/supernatural-ppage-900x1084-ligh.png', 'Pelargonium Graveolens Flower Oil, Sodium Benzoate, Copaifera Officinalis (Balsam Copaiba) Resin, Polygonum Cuspidatum Root Extract, Portulaca Oleracea Extract, Glycine Soja (Soybean) Oil, Artemisia Vulgaris Oil, Myrtus Communis Oil, Pelargonium Capitatum Leaf Extract, Rosa Damascena Flower Oil, Ferula Galbaniflua (Galbanum) Resin Oil, Limonene, Linalool, Citronellol, Mica, Titanium Dioxide (CI 77891), Iron Oxides (CI 77491) May Contain: Iron Oxides (CI 77492, CI 77499).', 18),
(17, 'Straight Line Kohl Eye Pencil', 6970.00, 20, 'uploads/KohlEyePencil-PPAGE-900x1084-Pac.png', 'HD Black: Hydrogenated Jojoba Oil, Limnanthes Alba (Meadowfoam) Seed Oil, Caprylic/Capric Triglyceride, Mica, Mangifera Indica (Mango) Seed Oil, Euphorbia Cerifera (Candelilla) Wax/Candelilla Cera/Cire de candelilla, Silica, Glyceryl Caprylate, Copernicia Cerifera (Carnauba) Wax/Cera Carnauba/Cire de carnauba, *Simmondsia Chinensis (Jojoba) Seed Oil, Tocopherol (non-GMO), Helianthus Annuus (Sunflower) Seed Oil, Ascorbyl Palmitate, Iron Oxides (CI 77491, CI 77492, CI 77499). *organic', 19),
(18, 'Straight Up™ Volumizing Peptide Mascara', 8000.00, 30, 'uploads/MASCARA-900X1084_2_720x.png', 'Water/Aqua/Eau, Euphorbia Cerifera (Candelilla) Wax/Candelilla Cera/Cire de candelilla, *Butyrospermum Parkii (Shea) Butter, Polyglyceryl-6 Distearate, Glycerin, Dimer Dilinoleyl Dimer Dilinoleate, Copernicia Cerifera (Carnauba) Wax/Cera Carnauba/Cire de carnauba, Polyglyceryl-10 Myristate, Cetyl Alcohol, Glyceryl Caprylate, Leuconostoc/Radish Root Ferment Filtrate, *Zea Mays (Corn) Starch (non-GMO), Butylene Glycol, Xanthan Gum, Arginine, Phenethyl Alcohol, Portulaca Grandiflora Extract, Camellia Sinensis (White Tea) Leaf Extract, Glycoproteins, Oligopeptide-2, Iron Oxides (CI 77499).', 19),
(19, 'Eyelights Cream Eyeshadow', 8000.00, 40, 'uploads/EYELIGHTS-PPAGE-900x1084-Eclipse.png', 'spark: Water/Aqua/Eau, Mica, Propanediol, Caprylic/Capric Triglyceride, Polyglyceryl-4 Caprate, Silica, Glycerin, Sodium Dehydroacetate, Aminomethyl Propanediol, Caprylyl Glycol, Ethylhexylglycerin, Tin Oxide, Chenopodium Quinoa Seed Extract, *Camellia Sinensis (Green Tea) Leaf Extract, Sodium Benzoate, Potassium Sorbate, Iron Oxides (CI 77491, CI 77499), Titanium Dioxide (CI 77891).\r\n', 19),
(20, 'Wild With Desire Lipstick', 8350.00, 40, 'uploads/WWD-RMS-RED-900X1084_720x.png', '*Withania Somnifera Root Powder, *Glycyrrhiza Glabra (Licorice) Leaf Extract, *Olea Europaea (Olive) Leaf Extract, Lecithin, Propanediol, Pentylene glycol, Oryza Sativa (Rice) Bran Wax, Propylene Carbonate, Limnanthes Alba (Meadowfoam) Seed Oil, **Mauritia Flexuosa (Buriti) Fruit Oil. May Contain [-/+]: Iron Oxides (CI 77491, CI 77492, CI 77499), Titanium Dioxide (CI 77891), Red 28 (CI 45410), Mica, Blue 1 (CI 42090), Red 6 (CI 15850), Red 7 (CI 15850), Red 40 (CI 16035), Yellow 5 (CI 19140), Yellow 6 (CI 15985).', 13),
(21, 'Legendary Serum Lipstick: The Nudes', 10000.00, 10, 'uploads/LegendaryNudes-PDP-900x1084-Pack.png', 'Jayne: *Prunus Cerasus (Bitter Cherry) Fruit Water, Jojoba Esters, Helianthus Annuus (Sunflower) Seed Wax, Water/Aqua/Eau, *Alcohol Denat., Squalane (vegetable), Glycerin, Helianthus Annuus (Sunflower) Seed Oil Unsaponifiables, Silica, Polyglyceryl-4 Caprate, Polyglyceryl-3 Polyricinoleate, Isononyl Isononanoate, Acacia Decurrens Flower Wax, Polyglycerin-3, Potassium Sorbate, Tocopheryl Acetate, *Vanilla Planifolia Fruit Extract, Polyglyceryl-3 Diisostearate, *Simmondsia Chinensis (Jojoba) Seed Oil, Tocopherol (non-GMO), *Calendula Officinalis (Marigold) Flower, *Equisetum Arvense (Horsetail) Leaf Extract, *Hypericum Perforatum (St. John’s Wort) Flower/Leaf/Stem Extract, *Curcuma Longa (Turmeric) Root, *Hemidesmus Indicus (Country Sarsaparilla) Root Extract, *Withania Somnifera (Ashwagandha) Root Extract, Terminalia Ferdinandiana (Kakadu Plum) Fruit Extract, *Glycyrrhiza Glabra (Licorice) Root, *Olea Europaea (Olive) Leaf, Titanium Dioxide (CI 77891), Yellow 5 Lake (CI 19140), Red 7 (CI 15850), Iron Oxides (CI 77491, CI 77499).', 13),
(22, 'The Lip Oil To-Go Set', 18121.00, 10, 'uploads/PouchBundlePDP-PACKSHOT-1_2x_1_7.png', 'Legendary Lip Oil Karolina, Elle, Amber, Lily, Milla, Alessandra, Lucia: Cocoglycerides, Ethylcellulose, *Vanilla Planifolia Fruit Extract, Mica, Prunus Cerasus (Bitter Cherry) Seed Oil, *Simmondsia Chinensis (Jojoba) Seed Oil,', 13),
(23, 'feminine flower blue oval drop silver tops', 2950.00, 20, 'uploads/563_1701677481_656d89a9846b9_277.png', 'DIMENSIONS\r\nLength:1.8 Width:1.2 cm', 16),
(24, 'modern fashionable silver clip tops', 3400.00, 20, 'uploads/672_1701677208_656d88983f042_259.png', 'DIMENSIONS\r\nLength:1.2 Width:1.2 CM', 16),
(25, 'modest blue round silver tops', 3200.00, 30, 'uploads/908_1701677359_656d892f88d19_268.png', 'DIMENSIONS\r\nLength:0.6 Width:0.6 cm', 16),
(26, 'intertwined pave ring', 6400.00, 40, 'uploads/147_1701934860_6571770c6781e_333.png', 'STYLE # 33353', 17),
(27, 'captivating marquise silver ring', 5400.00, 50, 'uploads/884_1701775612_656f08fcc4189_258.png', 'STYLE # 25890', 17),
(28, 'graceful intricate silver helix ring', 5500.00, 10, 'uploads/349_1701935931_65717b3b9b611_130.png', 'STYLE # 13072', 17),
(32, 'fine round silver tennis bracelet', 10800.00, 20, 'uploads/795_1701935796_65717ab4bee88_653.png', 'DIMENSIONS\r\nDiameter:6.8 Width Top:0.4 cm', 21),
(33, 'feminine thin gold leaf bracelet', 8800.00, 10, 'uploads/536_1701937057_65717fa11d1bb_204 (1).png', 'DIMENSIONS\r\nLength:15.6 Width Top:1.0 Cm', 21),
(34, 'linear cluster set tennis bracelet', 13800.00, 20, 'uploads/715_1701936545_65717da124e9f_158 (1).png', 'DIMENSIONS\r\nLength:16 Top Width:1.6 cm', 21);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT 2,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `work_phone` varchar(20) DEFAULT NULL,
  `cell_phone` varchar(20) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `password`, `name`, `address`, `work_phone`, `cell_phone`, `date_of_birth`, `created_at`) VALUES
(3, 1, 'admin@gmail.com', 'admin@gmail.com', 'admin@gmail.com', '', '', NULL, '', NULL, '2025-03-03 08:42:36'),
(4, 2, 'demoss@gmail.com', 'demoss@gmail.com', 'demoss@gmail.com', '', '', NULL, '', NULL, '2025-03-03 12:39:11'),
(5, 2, 'sameer.hussain.aptech@gmail.com', 'sameer.hussain.aptech@gmail.com', 'sameer.hussain.aptech@gmail.com', '', '', NULL, '', NULL, '2025-03-04 08:51:24'),
(6, 2, 'sameer', 'asad@gmail.com', 'sameer123', '', '', NULL, '', NULL, '2025-03-04 21:13:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
