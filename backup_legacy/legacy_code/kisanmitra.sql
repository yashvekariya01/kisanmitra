
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `apmc_members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` enum('Farmer','Company','Chairman','Member') NOT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `joined` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `apmc_members` (`id`, `name`, `role`, `contact`, `joined`) VALUES
(1, 'Rajesh Patel', 'Farmer', 'rajpatel@gmail.com', '2025-08-01 09:00:00'),
(2, 'Suresh Kumar', 'Farmer', 'suresh123@yahoo.com', '2025-08-02 10:15:00'),
(3, 'Mahindra Agro Ltd.', 'Company', 'contact@mahindraagro.com', '2025-08-03 11:30:00'),
(4, 'FreshFarm Traders', 'Company', 'freshfarm@traders.com', '2025-08-04 12:45:00'),
(5, 'Yash', 'Chairman', '7211158996', '2025-08-05 09:30:00'),
(6, 'Raju', 'Member', '72111589541', '2025-08-06 10:45:00'),
(7, 'Anil Mehta', 'Farmer', 'anilmehta@gmail.com', '2025-08-07 08:50:00'),
(8, 'Pooja Sharma', 'Farmer', 'pooja123@gmail.com', '2025-08-07 09:20:00'),
(9, 'AgroTech Pvt. Ltd.', 'Company', 'info@agrotech.com', '2025-08-08 10:10:00'),
(10, 'GreenFields Traders', 'Company', 'contact@greenfields.com', '2025-08-08 11:00:00'),
(11, 'Vikram Singh', 'Chairman', '9876543210', '2025-08-09 09:30:00'),
(12, 'Sneha Joshi', 'Member', '9988776655', '2025-08-09 10:15:00'),
(13, 'Ramesh Gupta', 'Farmer', 'ramesh.g@gmail.com', '2025-08-10 08:40:00'),
(14, 'Kiran Patel', 'Farmer', 'kiranpatel@yahoo.com', '2025-08-10 09:05:00'),
(15, 'Harvest Corp.', 'Company', 'sales@harvestcorp.com', '2025-08-11 11:20:00'),
(16, 'AgriMart Ltd.', 'Company', 'contact@agrimart.com', '2025-08-11 12:00:00'),
(17, 'Manoj Sharma', 'Chairman', '9123456780', '2025-08-12 08:50:00'),
(18, 'Rekha Singh', 'Member', '9876543291', '2025-08-12 09:10:00'),
(19, 'Deepak Kumar', 'Farmer', 'deepak.k@gmail.com', '2025-08-13 09:30:00'),
(20, 'Nisha Verma', 'Farmer', 'nishaverma@yahoo.com', '2025-08-13 10:00:00'),
(21, 'AgroPlus Pvt. Ltd.', 'Company', 'contact@agroplus.com', '2025-08-14 11:15:00'),
(22, 'FarmFresh Traders', 'Company', 'info@farmfresh.com', '2025-08-14 12:00:00'),
(23, 'Rahul Yadav', 'Chairman', '9012345678', '2025-08-15 09:20:00'),
(24, 'Seema Rani', 'Member', '9988112233', '2025-08-15 10:05:00'),
(25, 'yash', 'Chairman', '72111589541', '2025-08-25 10:44:46');


CREATE TABLE `apmc_products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `old_price` decimal(10,2) NOT NULL,
  `new_price` decimal(10,2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `apmc_products` (`id`, `name`, `old_price`, `new_price`, `updated_at`) VALUES
(1, 'Wheat', 550.00, 560.00, '2025-08-25 04:30:00'),
(2, 'Rice', 720.00, 710.00, '2025-08-25 04:35:00'),
(3, 'Maize', 400.00, 420.00, '2025-08-25 04:40:00'),
(4, 'Barley', 380.00, 375.00, '2025-08-25 04:45:00'),
(5, 'Jowar', 500.00, 505.00, '2025-08-25 04:50:00'),
(6, 'Bajra', 450.00, 440.00, '2025-08-25 04:55:00'),
(7, 'Cotton', 900.00, 920.00, '2025-08-25 05:00:00'),
(8, 'Sugarcane', 300.00, 310.00, '2025-08-25 05:05:00'),
(9, 'Soybean', 650.00, 640.00, '2025-08-25 05:10:00'),
(10, 'Groundnut', 700.00, 710.00, '2025-08-25 05:15:00'),
(11, 'Sunflower', 480.00, 490.00, '2025-08-25 05:20:00'),
(12, 'Mustard', 520.00, 515.00, '2025-08-25 05:25:00'),
(13, 'Tomato', 120.00, 125.00, '2025-08-25 05:30:00'),
(14, 'Onion', 100.00, 95.00, '2025-08-25 05:35:00'),
(15, 'Potato', 90.00, 92.00, '2025-08-25 05:40:00'),
(16, 'Carrot', 110.00, 115.00, '2025-08-25 05:45:00'),
(17, 'Chili', 200.00, 205.00, '2025-08-25 05:50:00'),
(18, 'Garlic', 250.00, 240.00, '2025-08-25 05:55:00'),
(19, 'Cabbage', 70.00, 75.00, '2025-08-25 06:00:00'),
(20, 'Spinach', 50.00, 55.00, '2025-08-25 06:05:00'),
(21, 'Apple', 150.00, 155.00, '2025-08-25 06:10:00'),
(22, 'Banana', 60.00, 65.00, '2025-08-25 06:15:00'),
(23, 'Mango', 200.00, 210.00, '2025-08-25 06:20:00'),
(24, 'Papaya', 90.00, 95.00, '2025-08-25 06:25:00'),
(25, 'Guava', 120.00, 125.00, '2025-08-25 06:30:00');


CREATE TABLE `crops` (
  `id` int(11) NOT NULL,
  `farmer_username` varchar(50) NOT NULL,
  `crop_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('available','sold') DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `crops` (`id`, `farmer_username`, `crop_name`, `price`, `quantity`, `status`, `created_at`) VALUES
(24, 'Raj', 'Wheat', 550.00, 90, 'available', '2025-08-25 08:25:11'),
(25, 'Meera', 'Rice', 720.00, 80, 'available', '2025-08-25 08:25:11'),
(26, 'Vivek', 'Maize', 400.00, 120, 'available', '2025-08-25 08:25:11'),
(27, 'Sita', 'Barley', 380.00, 90, 'available', '2025-08-25 08:25:11'),
(28, 'Rahul', 'Jowar', 500.00, 90, 'available', '2025-08-25 08:25:11'),
(29, 'Anita', 'Bajra', 450.00, 90, 'available', '2025-08-25 08:25:11'),
(30, 'Sunil', 'Cotton', 900.00, 70, 'available', '2025-08-25 08:25:11'),
(31, 'Deepa', 'Sugarcane', 300.00, 200, 'available', '2025-08-25 08:25:11'),
(32, 'Kiran', 'Soybean', 650.00, 60, 'available', '2025-08-25 08:25:11'),
(33, 'Arjun', 'Groundnut', 700.00, 50, 'available', '2025-08-25 08:25:11'),
(34, 'Preeti', 'Sunflower', 480.00, 80, 'available', '2025-08-25 08:25:11'),
(35, 'Manoj', 'Mustard', 520.00, 75, 'available', '2025-08-25 08:25:11'),
(36, 'Nisha', 'Tomato', 120.00, 200, 'available', '2025-08-25 08:25:11'),
(37, 'Ajay', 'Onion', 100.00, 180, 'available', '2025-08-25 08:25:11'),
(38, 'Reena', 'Potato', 90.00, 220, 'available', '2025-08-25 08:25:11'),
(39, 'Vikram', 'Carrot', 110.00, 150, 'available', '2025-08-25 08:25:11'),
(40, 'Sona', 'Chili', 200.00, 100, 'available', '2025-08-25 08:25:11'),
(41, 'Rajesh', 'Garlic', 250.00, 80, 'available', '2025-08-25 08:25:11'),
(42, 'Tina', 'Cabbage', 70.00, 140, 'available', '2025-08-25 08:25:11'),
(43, 'Sachin', 'Spinach', 50.00, 160, 'available', '2025-08-25 08:25:11'),
(44, 'yash', 'apple', 600.00, 11978, 'available', '2025-08-25 08:25:46');


CREATE TABLE `login_users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('farmer','buyer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `login_users` (`id`, `fullname`, `username`, `email`, `password`, `role`) VALUES
(1, '', 'yash', 'yash@gmail.com', '123', 'farmer'),
(2, '', 'jalpit', 'jalpit@gmail.com', '123', 'buyer');


CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `buyer_username` varchar(50) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `orders` (`id`, `buyer_username`, `crop_id`, `crop_name`, `quantity`, `price`, `total`, `order_date`) VALUES
(1, 'jalpit', 1, 'Wheat', 50, 560.00, 28000.00, '2025-08-25 08:20:12'),
(2, 'jalpit', 24, 'Wheat', 10, 550.00, 5500.00, '2025-08-25 08:25:21'),
(3, 'jalpit', 27, 'Barley', 30, 380.00, 11400.00, '2025-08-25 08:26:53'),
(4, 'jalpit', 44, 'apple', 1500, 600.00, 900000.00, '2025-08-25 08:27:03'),
(5, 'jalpit', 29, 'Bajra', 20, 450.00, 9000.00, '2025-08-25 08:27:06'),
(6, 'jalpit', 44, 'apple', 1522, 600.00, 913200.00, '2025-08-25 08:27:14'),
(7, 'jalpit', 26, 'Maize', 30, 400.00, 12000.00, '2025-08-25 08:27:18');


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('farmer','buyer','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'farmer1', '12345', 'farmer', '2025-08-25 08:02:14'),
(2, 'buyer1', '12345', 'buyer', '2025-08-25 08:02:14'),
(3, 'admin', 'admin123', 'admin', '2025-08-25 08:02:14');

ALTER TABLE `apmc_members`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `apmc_products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `crops`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `login_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `apmc_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE `apmc_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE `crops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

ALTER TABLE `login_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

