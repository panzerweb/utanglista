-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for utanglista_db
CREATE DATABASE IF NOT EXISTS `utanglista_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `utanglista_db`;

-- Dumping structure for table utanglista_db.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table utanglista_db.category: ~2 rows (approximately)
INSERT INTO `category` (`id`, `category_name`, `created_at`) VALUES
	(1, 'Powdered Drink', '2025-04-29 18:20:45'),
	(2, 'Biscuits', '2025-04-29 18:20:57'),
	(3, 'Junk Foods', '2025-04-29 18:33:14'),
	(4, 'Beverages', '2025-05-02 15:17:11');

-- Dumping structure for procedure utanglista_db.customerByBalance
DELIMITER //
CREATE PROCEDURE `customerByBalance`()
BEGIN
	SELECT c_name, balance, DENSE_RANK() 
	OVER (ORDER BY balance DESC) 
	AS ranking
	FROM customers
	WHERE is_deleted = 0 AND balance > 0;
END//
DELIMITER ;

-- Dumping structure for view utanglista_db.customerbybalance
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `customerbybalance` (
	`c_name` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`balance` DECIMAL(10,2) NULL,
	`ranking` BIGINT(20) UNSIGNED NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for table utanglista_db.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) DEFAULT NULL,
  `c_contact` varchar(50) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT '0.00',
  `monthly_interest` decimal(10,2) DEFAULT '0.00',
  `status` varchar(100) DEFAULT 'PENDING',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `admin_id` int DEFAULT NULL,
  `is_deleted` tinyint DEFAULT '0',
  `interest_rate` decimal(5,4) DEFAULT '0.0500',
  `last_transaction_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_to_customer` (`admin_id`),
  CONSTRAINT `admin_to_customer` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table utanglista_db.customers: ~8 rows (approximately)

-- Dumping structure for table utanglista_db.customer_logs
CREATE TABLE IF NOT EXISTS `customer_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` varchar(100) DEFAULT 'A customer has been added',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `admin_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `old_name` varchar(100) DEFAULT NULL,
  `new_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_of_customers_from_admin` (`admin_id`),
  KEY `customer_id_log` (`customer_id`),
  CONSTRAINT `customer_id_log` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `log_of_customers_from_admin` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table utanglista_db.customer_logs: ~4 rows (approximately)

-- Dumping structure for procedure utanglista_db.getCount
DELIMITER //
CREATE PROCEDURE `getCount`()
BEGIN
	SELECT COUNT(*) AS totalCount
	FROM customers
	WHERE is_deleted = 0;
END//
DELIMITER ;

-- Dumping structure for view utanglista_db.getcustomercount
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `getcustomercount` (
	`totalCount` BIGINT(19) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for procedure utanglista_db.getProdCount
DELIMITER //
CREATE PROCEDURE `getProdCount`()
BEGIN
	SELECT COUNT(*) AS totalInventory FROM products WHERE is_deleted=0;
END//
DELIMITER ;

-- Dumping structure for view utanglista_db.getproductcount
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `getproductcount` (
	`totalInventory` BIGINT(19) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for procedure utanglista_db.getTotalCollectedPayments
DELIMITER //
CREATE PROCEDURE `getTotalCollectedPayments`()
BEGIN
	SELECT SUM(payment_amount) AS total_collected_amount FROM payment;
END//
DELIMITER ;

-- Dumping structure for procedure utanglista_db.getTotalUncollectedAmount
DELIMITER //
CREATE PROCEDURE `getTotalUncollectedAmount`()
BEGIN
	SELECT SUM(balance) AS uncollectedAmount FROM `customers` WHERE is_deleted=0;
END//
DELIMITER ;

-- Dumping structure for table utanglista_db.payment
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `c_id` int NOT NULL DEFAULT '0',
  `payment_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `paid_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_payment` (`c_id`),
  CONSTRAINT `customer_payment` FOREIGN KEY (`c_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table utanglista_db.payment: ~0 rows (approximately)

-- Dumping structure for table utanglista_db.payment_logs
CREATE TABLE IF NOT EXISTS `payment_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` varchar(100) DEFAULT 'Payment is added',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int DEFAULT '0',
  `payment_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_after_payment_of_customer` (`customer_id`),
  KEY `payment_amount` (`payment_id`),
  CONSTRAINT `log_after_payment_of_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `payment_amount` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table utanglista_db.payment_logs: ~0 rows (approximately)

-- Dumping structure for table utanglista_db.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `prod_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_id` int DEFAULT NULL,
  `is_deleted` tinyint DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `prod_name` (`prod_name`),
  KEY `category_id` (`category_id`),
  KEY `admin_create_product` (`admin_id`),
  CONSTRAINT `admin_create_product` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table utanglista_db.products: ~5 rows (approximately)
INSERT INTO `products` (`id`, `category_id`, `prod_name`, `prod_price`, `prod_image`, `created_at`, `updated_at`, `admin_id`, `is_deleted`) VALUES
	(1, 3, 'Mang Juan', 10.00, 'uploads/mang_juan.jpg', '2025-05-10 15:47:34', '2025-05-10 15:47:34', 1, 0);

-- Dumping structure for table utanglista_db.product_logs
CREATE TABLE IF NOT EXISTS `product_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` varchar(100) NOT NULL DEFAULT 'Product Added!',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `old_name` varchar(100) DEFAULT NULL,
  `new_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_insert_product` (`admin_id`),
  KEY `product_inserted` (`product_id`),
  CONSTRAINT `admin_insert_product` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `product_inserted` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table utanglista_db.product_logs: ~0 rows (approximately)

-- Dumping structure for procedure utanglista_db.selectAllCustomer
DELIMITER //
CREATE PROCEDURE `selectAllCustomer`()
BEGIN
	SELECT * FROM customers
	WHERE is_deleted = 0
	ORDER BY created_at DESC;
END//
DELIMITER ;

-- Dumping structure for view utanglista_db.selectallcustomer
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `selectallcustomer` (
	`id` INT(10) NOT NULL,
	`c_name` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`c_contact` VARCHAR(50) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`balance` DECIMAL(10,2) NULL,
	`monthly_interest` DECIMAL(10,2) NULL,
	`status` VARCHAR(100) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`created_at` DATETIME NULL,
	`updated_at` DATETIME NULL,
	`admin_id` INT(10) NULL,
	`is_deleted` TINYINT(3) NULL,
	`interest_rate` DECIMAL(5,4) NULL
) ENGINE=MyISAM;

-- Dumping structure for table utanglista_db.transaction
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  `c_id` int NOT NULL DEFAULT '0',
  `qty` int NOT NULL DEFAULT '0',
  `amount` decimal(10,2) DEFAULT '0.00',
  `is_paid` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`prod_id`),
  KEY `customer_id` (`c_id`),
  CONSTRAINT `customer_id` FOREIGN KEY (`c_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_id` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table utanglista_db.transaction: ~0 rows (approximately)

-- Dumping structure for procedure utanglista_db.transaction_insert
DELIMITER //
CREATE PROCEDURE `transaction_insert`(
    IN product_id INT, 
    IN customer_id INT, 
    IN quantity INT, 
    IN amount DECIMAL(10,2) -- specify precision and scale for better control
)
BEGIN
    INSERT INTO `transaction` (prod_id, c_id, qty, amount)
    VALUES (product_id, customer_id, quantity, amount);
END//
DELIMITER ;

-- Dumping structure for table utanglista_db.transaction_logs
CREATE TABLE IF NOT EXISTS `transaction_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Purchased',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_transaction` (`customer_id`),
  KEY `product_purchased` (`product_id`),
  CONSTRAINT `customer_transaction` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `product_purchased` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table utanglista_db.transaction_logs: ~0 rows (approximately)

-- Dumping structure for view utanglista_db.transaction_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `transaction_view` (
	`prod_name` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`c_name` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`qty` INT(10) NOT NULL,
	`amount` DECIMAL(10,2) NULL,
	`created_at` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for procedure utanglista_db.transaction_view_procedure
DELIMITER //
CREATE PROCEDURE `transaction_view_procedure`()
BEGIN
	SELECT 
    p.prod_name,
    c.c_name,
    t.qty,
    t.amount,
    t.created_at
	FROM 
	    `transaction` t
	JOIN 
	    products p ON t.prod_id = p.id
	JOIN 
	    customers c ON t.c_id = c.id
	WHERE 
	    c.is_deleted = 0
	    AND t.created_at >= CURDATE()
	    AND t.created_at < CURDATE() + INTERVAL 1 DAY
	ORDER BY 
	    t.created_at DESC;

END//
DELIMITER ;

-- Dumping structure for table utanglista_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'super_admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_email` (`admin_email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table utanglista_db.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `admin_name`, `admin_email`, `admin_password`, `created_at`, `admin_role`) VALUES
	(1, 'Panzerweb', 'panzerweb@gmail.com', '$2y$10$MU5OpKWhECLAzF9VvIPtPOEKjOrCpKumEIKloLyMofi8jcQA8uJDi', '2025-04-17 12:30:05', 'super_admin'),
	(3, 'Selwyn', 'selwyn@gmail.com', '$2y$10$zaQwYBTYLhNVluJ1hTMjtePB0AlI7phzazn7nHjKMrixrSzHtzIJq', '2025-04-30 01:04:33', 'admin');

-- Dumping structure for trigger utanglista_db.customers__log_after_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `customers__log_after_update` AFTER UPDATE ON `customers` FOR EACH ROW BEGIN
    -- Log only when customer is marked as deleted
    IF OLD.is_deleted = 0 AND NEW.is_deleted = 1 THEN
        INSERT INTO customer_logs(message, admin_id, customer_id, old_name, new_name)
        VALUES ('Has deleted a customer!', OLD.admin_id, OLD.id, NULL, NULL);
    
    -- Log only when the name actually changes (and it's not a deletion)
    ELSEIF OLD.c_name != NEW.c_name THEN
        INSERT INTO customer_logs(message, admin_id, customer_id, old_name, new_name)
        VALUES ('Has updated a customer!', NEW.admin_id, NEW.id, OLD.c_name, NEW.c_name);
    END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger utanglista_db.customer_log_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `customer_log_after_insert` AFTER INSERT ON `customers` FOR EACH ROW BEGIN
	  INSERT INTO customer_logs(message, admin_id, customer_id, old_name, new_name)
    VALUES ('Has added a customer!', NEW.admin_id, NEW.id, NULL, NEW.c_name);END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger utanglista_db.payment_log_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `payment_log_after_insert` AFTER INSERT ON `payment` FOR EACH ROW BEGIN
	INSERT INTO payment_logs(message, customer_id) VALUES ("Payment added!", NEW.c_id);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger utanglista_db.products_log_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `products_log_after_insert` AFTER INSERT ON `products` FOR EACH ROW BEGIN
	INSERT INTO product_logs(message, admin_id, product_id) VALUES ("Product Added!", NEW.admin_id, NEW.id);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger utanglista_db.products_log_after_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `products_log_after_update` AFTER UPDATE ON `products` FOR EACH ROW BEGIN
	IF OLD.is_deleted = 0 AND NEW.is_deleted = 1 THEN
		INSERT INTO product_logs(message, admin_id, product_id, old_name, new_name)
		VALUES ('Has deleted a product!', OLD.admin_id, OLD.id, NULL, NULL);
	ELSE
		INSERT INTO product_logs(message, admin_id, product_id, old_name, new_name) 
		VALUES ('Has updated a product!', NEW.admin_id, NEW.id, OLD.prod_name, NEW.prod_name);
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger utanglista_db.transaction_log_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `transaction_log_after_insert` AFTER INSERT ON `transaction` FOR EACH ROW BEGIN
	INSERT INTO transaction_logs(message, customer_id, product_id) VALUES ("Purchased!", NEW.c_id, NEW.prod_id);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger utanglista_db.update_balance_after_insert_payment
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `update_balance_after_insert_payment` AFTER INSERT ON `payment` FOR EACH ROW BEGIN
	UPDATE customers
	SET balance = balance - NEW.payment_amount, monthly_interest = balance * interest_rate
	WHERE id =  NEW.c_id;
	
	UPDATE transaction
	SET is_paid = 1
	WHERE c_id = NEW.c_id AND is_paid = 0;
	
	-- If balance is now 0, update status
	IF (SELECT balance FROM customers WHERE id = NEW.c_id) = 0 THEN
	    UPDATE customers
	    SET status = 'PAID'
	    WHERE id = NEW.c_id;
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger utanglista_db.update_balance_after_transaction
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `update_balance_after_transaction` AFTER INSERT ON `transaction` FOR EACH ROW BEGIN
	-- Only add to balance if the transaction is unpaid
  IF NEW.is_paid = 0 THEN
    UPDATE customers
    SET balance = balance + NEW.amount, monthly_interest = balance * interest_rate
    WHERE id = NEW.c_id;
  END IF;
  
  	IF(SELECT balance FROM customers WHERE id = NEW.c_id AND balance > 0) THEN
  		UPDATE customers
  		SET `status` = 'PENDING'
  		WHERE id = NEW.c_id;
	END IF;
	
	UPDATE customers
	SET last_transaction_date = CURDATE()
	WHERE id = NEW.c_id;
	
	
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for view utanglista_db.customerbybalance
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `customerbybalance`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `customerbybalance` AS select `customers`.`c_name` AS `c_name`,`customers`.`balance` AS `balance`,dense_rank() OVER (ORDER BY `customers`.`balance` desc )  AS `ranking` from `customers` where ((`customers`.`is_deleted` = 0) and (`customers`.`balance` > 0));

-- Dumping structure for view utanglista_db.getcustomercount
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `getcustomercount`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `getcustomercount` AS select count(0) AS `totalCount` from `customers` where (`customers`.`is_deleted` = 0);

-- Dumping structure for view utanglista_db.getproductcount
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `getproductcount`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `getproductcount` AS select count(0) AS `totalInventory` from `products` where (`products`.`is_deleted` = 0);

-- Dumping structure for view utanglista_db.selectallcustomer
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `selectallcustomer`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `selectallcustomer` AS select `customers`.`id` AS `id`,`customers`.`c_name` AS `c_name`,`customers`.`c_contact` AS `c_contact`,`customers`.`balance` AS `balance`,`customers`.`monthly_interest` AS `monthly_interest`,`customers`.`status` AS `status`,`customers`.`created_at` AS `created_at`,`customers`.`updated_at` AS `updated_at`,`customers`.`admin_id` AS `admin_id`,`customers`.`is_deleted` AS `is_deleted`,`customers`.`interest_rate` AS `interest_rate` from `customers` where (`customers`.`is_deleted` = 0) order by `customers`.`created_at` desc;

-- Dumping structure for view utanglista_db.transaction_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `transaction_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `transaction_view` AS select `products`.`prod_name` AS `prod_name`,`customers`.`c_name` AS `c_name`,`transaction`.`qty` AS `qty`,`transaction`.`amount` AS `amount`,`transaction`.`created_at` AS `created_at` from ((`transaction` join `products` on((`transaction`.`prod_id` = `products`.`id`))) join `customers` on((`transaction`.`c_id` = `customers`.`id`))) where ((`customers`.`is_deleted` = 0) and (`transaction`.`created_at` >= curdate()) and (`transaction`.`created_at` < (curdate() + interval 1 day))) order by `transaction`.`created_at` desc;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
