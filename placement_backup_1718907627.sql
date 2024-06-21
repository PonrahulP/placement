

CREATE TABLE `addedcompany` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `company_contact` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `job_role` varchar(255) NOT NULL,
  `student_mobile` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`,`company_contact`,`student_mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO addedcompany VALUES("78","zoho","9751363453","9-10LPA","fjdogjsadvpv","","7904955208","2024-06-20 23:45:14","2024-06-20 23:45:14");



CREATE TABLE `tblent` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `contact` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `resume_date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`,`contact`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblent VALUES("21","7904955208","","zoho","20k-30k","2024-06-20","Resume","2024-06-20 23:47:25","2024-06-20 23:47:25");
INSERT INTO tblent VALUES("22","7904955208","","zoho","20k-30k","2024-06-20","Task","2024-06-20 23:48:32","2024-06-20 23:48:32");



CREATE TABLE `tblreg1` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `framework` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `joining_date` date NOT NULL,
  `mail` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `task` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblreg1 VALUES("30","PONRAHUL P","7904955208","ponrahulp2018@gmail.com","php,python","UG","2024-06-20","1","1","1","2024-06-20 23:48:32","2024-06-20 23:48:32");



CREATE TABLE `tblreg2` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `contact` varchar(255) NOT NULL,
  `project_date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `complete_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblreg2 VALUES("40","7904955208","2024-06-20","ERP","CRUD OPERATION IN SRP.docx","2024-06-20","2024-06-20 23:44:18","2024-06-20 23:44:18");



CREATE TABLE `tblresume` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `job_role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


