-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2017 at 08:57 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concrtme_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `name`, `email`, `mobile`, `type`, `created_at`, `updated_at`, `password`) VALUES
(1, 'admin@dexbytes.com', 'Admin', 'admin@dexbytes.com', '9584938010', 'admin', '2017-07-11 13:06:12', '2017-07-11 13:06:12', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `compaigns`
--

CREATE TABLE `compaigns` (
  `id` int(10) NOT NULL,
  `time_slot_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL COMMENT 'sender user ',
  `receiver_id` int(10) NOT NULL DEFAULT '0' COMMENT 'Not required in event booking',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL DEFAULT '0' COMMENT '0 Inactive , 1 Active',
  `progress_status` int(10) NOT NULL DEFAULT '0' COMMENT '0 in progress, 1 successful, -1 fail, 2 complete',
  `approve_status` int(10) NOT NULL DEFAULT '0' COMMENT '0 pending, 1 approve , -1 reject',
  `free_paid` int(10) NOT NULL DEFAULT '0' COMMENT '0 free , 1 paid',
  `lock_pancil` int(10) NOT NULL,
  `stolen_status` int(10) NOT NULL,
  `recurring_type` int(10) NOT NULL DEFAULT '0' COMMENT '0 not recurring, 1 weekly, 2 Bi-Weekly, 3 once in a month'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `compaign_metas`
--

CREATE TABLE `compaign_metas` (
  `id` int(10) NOT NULL,
  `compaing_id` int(10) NOT NULL,
  `meta_key` varchar(100) NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` int(10) NOT NULL DEFAULT '0',
  `user_type` int(10) NOT NULL DEFAULT '1' COMMENT '1 manager , 2  employee',
  `venue_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `compaign_id` int(10) NOT NULL DEFAULT '0',
  `venue_id` int(10) NOT NULL DEFAULT '0',
  `user_id` int(10) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `reply` varchar(50) NOT NULL,
  `sent_type` int(10) NOT NULL DEFAULT '1' COMMENT '1 single , 2 multiple',
  `interval_time` int(10) NOT NULL COMMENT 'in seconds if user_type multiple',
  `sent_count` int(10) NOT NULL DEFAULT '0',
  `status` int(10) NOT NULL DEFAULT '0',
  `error` int(10) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `compaign_id` int(10) NOT NULL,
  `read_status` int(10) NOT NULL DEFAULT '0' COMMENT '0 unread , 1 read',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(10) NOT NULL,
  `site_key` varchar(255) NOT NULL,
  `site_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_key`, `site_value`) VALUES
(3, 'sid', ''),
(4, 'token', ''),
(5, 'secret_key', ''),
(6, 'publishable_key', ''),
(7, 'ticket_amount', '10.00'),
(8, 'traditional_amount', '75.00');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) NOT NULL,
  `compaign_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ticket_code` varchar(50) NOT NULL,
  `total_ticket` int(10) NOT NULL,
  `total_amount` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `payment_status` int(10) NOT NULL DEFAULT '0' COMMENT '0 pending , 1 success , -1 fail , 2 refund, 3 transfer to musician',
  `name` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `stripe_customer_id` varchar(100) NOT NULL,
  `stripe_payment_status` int(10) NOT NULL DEFAULT '0' COMMENT '0 pending, 1 charge ',
  `checkIn_status` int(10) NOT NULL DEFAULT '0',
  `checkIn_time` varchar(50) NOT NULL,
  `checkIn_manager_id` int(10) NOT NULL,
  `payee_id` int(10) NOT NULL,
  `stripe_transactions_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `id` int(10) NOT NULL,
  `venue_id` int(10) NOT NULL,
  `slot_date` varchar(50) NOT NULL,
  `slot_time` varchar(50) NOT NULL,
  `slot_interval` int(10) NOT NULL DEFAULT '60' COMMENT '60 min defaults',
  `time_slot_display` int(10) NOT NULL DEFAULT '1' COMMENT '1 show , 0 hide',
  `status` int(10) NOT NULL DEFAULT '1' COMMENT '1 available , 2 booked',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(10) NOT NULL DEFAULT '0',
  `role` int(10) NOT NULL DEFAULT '1' COMMENT '1 musician , 2 Organiser',
  `genre` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `username`, `password`, `active`, `role`, `genre`, `updated_at`, `created_at`) VALUES
(1, 'Musician A', '', '9584938010', '9584938010', '$2y$10$e8Mzxthd2h64tcZHww./fOBiQTsCPA/lGwCh8SLdtCHicfGLZEe4i', 1, 1, '', '2017-07-13 07:07:13', '2017-07-04 20:40:13'),
(2, 'Musician B', '', '9893141979', '9893141979', '$2y$10$wiJkM1xocI5DYmlNLrn08.E3si4EO0sNENS6ZDZjbrFPCfGNmBSQa', 1, 1, '', '2017-07-13 07:07:07', '2017-07-08 21:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_metas`
--

CREATE TABLE `user_metas` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `meta_key` varchar(50) NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` text NOT NULL,
  `subdomain` varchar(100) NOT NULL,
  `age_restricted` int(10) NOT NULL DEFAULT '0',
  `parent_vanue` int(10) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `open_time` time NOT NULL COMMENT 'shop open time between 6.00 to 24.00',
  `close_time` time NOT NULL,
  `slot_interval` int(10) NOT NULL DEFAULT '60' COMMENT '60 min default',
  `break_time` int(10) NOT NULL DEFAULT '0' COMMENT 'in min'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `venue_metas`
--

CREATE TABLE `venue_metas` (
  `id` int(10) NOT NULL,
  `venue_id` int(10) NOT NULL,
  `meta_key` varchar(100) NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compaigns`
--
ALTER TABLE `compaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compaign_metas`
--
ALTER TABLE `compaign_metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_metas`
--
ALTER TABLE `user_metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue_metas`
--
ALTER TABLE `venue_metas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `compaigns`
--
ALTER TABLE `compaigns`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `compaign_metas`
--
ALTER TABLE `compaign_metas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_metas`
--
ALTER TABLE `user_metas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `venue_metas`
--
ALTER TABLE `venue_metas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
