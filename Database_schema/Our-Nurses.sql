CREATE TABLE `Nurse` (
  `nurse_id` int PRIMARY KEY,
  `contact_info_id` int,
  `personal_info_id` int,
  `professional_info_id` int,
  `profile_picture` varchar(255),
  `cv_file` varchar(255)
);

CREATE TABLE `NurseContactInformation` (
  `contact_info_id` int PRIMARY KEY,
  `phone_number` varchar(255),
  `location` varchar(255)
);

CREATE TABLE `NursePersonalInformation` (
  `personal_info_id` int PRIMARY KEY,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `gender` varchar(255),
  `languages` varchar(255)
);

CREATE TABLE `NurseProfessionalInformation` (
  `professional_info_id` int PRIMARY KEY,
  `nurse_specialty_id` int,
  `biography` varchar(255),
  `education` varchar(255)
);

CREATE TABLE `NurseSocialMediaLinks` (
  `link_id` int PRIMARY KEY,
  `nurse_id` int,
  `social_media_type` varchar(255),
  `link_url` varchar(255)
);

CREATE TABLE `NurseSpecialty` (
  `specialty_id` int PRIMARY KEY,
  `name` varchar(255),
  `description` varchar(255)
);

ALTER TABLE `Nurse` ADD FOREIGN KEY (`contact_info_id`) REFERENCES `NurseContactInformation` (`contact_info_id`);

ALTER TABLE `Nurse` ADD FOREIGN KEY (`personal_info_id`) REFERENCES `NursePersonalInformation` (`personal_info_id`);

ALTER TABLE `Nurse` ADD FOREIGN KEY (`professional_info_id`) REFERENCES `NurseProfessionalInformation` (`professional_info_id`);

ALTER TABLE `NurseProfessionalInformation` ADD FOREIGN KEY (`nurse_specialty_id`) REFERENCES `NurseSpecialty` (`specialty_id`);

ALTER TABLE `NurseSocialMediaLinks` ADD FOREIGN KEY (`nurse_id`) REFERENCES `Nurse` (`nurse_id`);
