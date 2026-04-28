-- phpMyAdmin SQL Dump
-- Database name: ai_mvp_builder

-- CREATE DATABASE IF NOT EXISTS `ai_mvp_builder`;
-- USE `ai_mvp_builder`;-

-- Table: users
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `payment_status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: videos
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text,
  `video_url` varchar(500) NOT NULL,
  `thumbnail_url` varchar(500) DEFAULT NULL,
  `notes_url` varchar(500) DEFAULT NULL,
  `duration` varchar(20) DEFAULT NULL,
  `order_num` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: payments
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `razorpay_payment_id` varchar(100) NOT NULL,
  `razorpay_order_id` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `coupon_code` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'success',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: coupons (for discount system)
CREATE TABLE `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL UNIQUE,
  `discount_percent` int(11) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: admin_users
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin (username: admin, password: admin123)
INSERT INTO `admin_users` (`username`, `password`) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Insert sample videos
INSERT INTO `videos` (`title`, `description`, `video_url`, `notes_url`, `order_num`) VALUES
('Module 1: Idea Validation', 'Learn how to validate your startup idea before building', 'uploads/video1.mp4', 'uploads/notes1.pdf', 1),
('Module 2: MVP Development', 'Step-by-step guide to build your first MVP', 'uploads/video2.mp4', 'uploads/notes2.pdf', 2);

-- Insert sample coupon
INSERT INTO `coupons` (`code`, `discount_percent`, `expiry_date`) VALUES 
('WELCOME50', 50, '2026-12-31');