CREATE TABLE `Doctor` (
  `doctor_id` int PRIMARY KEY,
  `contact_info_id` int,
  `personal_info_id` int,
  `professional_info_id` int,
  `profile_picture` varchar(255),
  `cv_file` varchar(255)
);

CREATE TABLE `ContactInformation` (
  `contact_info_id` int PRIMARY KEY,
  `phone_number` varchar(255),
  `location` varchar(255)
);

CREATE TABLE `PersonalInformation` (
  `personal_info_id` int PRIMARY KEY,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `gender` varchar(255),
  `languages` varchar(255)
);

CREATE TABLE `ProfessionalInformation` (
  `professional_info_id` int PRIMARY KEY,
  `specialty_id` int,
  `biography` varchar(255),
  `education` varchar(255),
  `awards` varchar(255)
);

CREATE TABLE `Schedule` (
  `schedule_id` int PRIMARY KEY,
  `doctor_id` int,
  `week_day` varchar(255),
  `start_time` time,
  `end_time` time
);

CREATE TABLE `SocialMediaLinks` (
  `link_id` int PRIMARY KEY,
  `doctor_id` int,
  `social_media_type` varchar(255),
  `link_url` varchar(255)
);

CREATE TABLE `Specialty` (
  `specialty_id` int PRIMARY KEY,
  `name` varchar(255),
  `description` varchar(255)
);

ALTER TABLE `Doctor` ADD FOREIGN KEY (`contact_info_id`) REFERENCES `ContactInformation` (`contact_info_id`);

ALTER TABLE `Doctor` ADD FOREIGN KEY (`personal_info_id`) REFERENCES `PersonalInformation` (`personal_info_id`);

ALTER TABLE `Doctor` ADD FOREIGN KEY (`professional_info_id`) REFERENCES `ProfessionalInformation` (`professional_info_id`);

ALTER TABLE `ProfessionalInformation` ADD FOREIGN KEY (`specialty_id`) REFERENCES `Specialty` (`specialty_id`);

ALTER TABLE `Schedule` ADD FOREIGN KEY (`doctor_id`) REFERENCES `Doctor` (`doctor_id`);

ALTER TABLE `SocialMediaLinks` ADD FOREIGN KEY (`doctor_id`) REFERENCES `Doctor` (`doctor_id`);
