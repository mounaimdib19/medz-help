CREATE TABLE `Pharmacist` (
  `pharmacist_id` int PRIMARY KEY,
  `contact_info_id` int,
  `personal_info_id` int,
  `professional_info_id` int,
  `profile_picture` varchar(255),
  `cv_file` varchar(255)
);

CREATE TABLE `PharmacistContactInformation` (
  `contact_info_id` int PRIMARY KEY,
  `phone_number` varchar(255),
  `location` varchar(255)
);

CREATE TABLE `PharmacistPersonalInformation` (
  `personal_info_id` int PRIMARY KEY,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `gender` varchar(255),
  `languages` varchar(255)
);

CREATE TABLE `PharmacistProfessionalInformation` (
  `professional_info_id` int PRIMARY KEY,
  `specialty_id` int,
  `biography` varchar(255),
  `education` varchar(255),
  `awards` varchar(255)
);

CREATE TABLE `PharmacistSchedule` (
  `schedule_id` int PRIMARY KEY,
  `pharmacist_id` int,
  `week_day` varchar(255),
  `start_time` time,
  `end_time` time
);

CREATE TABLE `PharmacistSocialMediaLinks` (
  `link_id` int PRIMARY KEY,
  `pharmacist_id` int,
  `social_media_type` varchar(255),
  `link_url` varchar(255)
);

CREATE TABLE `PharmacistSpecialty` (
  `specialty_id` int PRIMARY KEY,
  `name` varchar(255),
  `description` varchar(255)
);

ALTER TABLE `Pharmacist` ADD FOREIGN KEY (`contact_info_id`) REFERENCES `PharmacistContactInformation` (`contact_info_id`);

ALTER TABLE `Pharmacist` ADD FOREIGN KEY (`personal_info_id`) REFERENCES `PharmacistPersonalInformation` (`personal_info_id`);

ALTER TABLE `Pharmacist` ADD FOREIGN KEY (`professional_info_id`) REFERENCES `PharmacistProfessionalInformation` (`professional_info_id`);

ALTER TABLE `PharmacistProfessionalInformation` ADD FOREIGN KEY (`specialty_id`) REFERENCES `PharmacistSpecialty` (`specialty_id`);

ALTER TABLE `PharmacistSchedule` ADD FOREIGN KEY (`pharmacist_id`) REFERENCES `Pharmacist` (`pharmacist_id`);

ALTER TABLE `PharmacistSocialMediaLinks` ADD FOREIGN KEY (`pharmacist_id`) REFERENCES `Pharmacist` (`pharmacist_id`);
