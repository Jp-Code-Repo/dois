student_contact_information	CREATE TABLE `student_contact_information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `spn` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_student_contact_spn` (`spn`),
  CONSTRAINT `fk_student_contact_spn` FOREIGN KEY (`spn`) REFERENCES `students` (`spn`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci	