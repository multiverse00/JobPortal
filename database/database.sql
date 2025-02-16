
CREATE DATABASE jobportal;
CREATE TABLE job_seeker (
  job_seeker_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phoneNumber VARCHAR(20) NOT NULL,
  date_of_birth DATE NOT NULL,
  qualification VARCHAR(255) NOT NULL,
  skills TEXT DEFAULT NULL,
  experience VARCHAR(255),
  division VARCHAR(30) NOT NULL,
  address TEXT,
  gender VARCHAR(10),
  about_yourself TEXT,
  passing_year DATE,
  profile_picture VARCHAR(255) ,
  PASSWORD VARCHAR(255) NOT NULL,
  confirmPassword VARCHAR(255) NOT NULL,
  ACTIVE INT(11) NOT NULL DEFAULT 2
);

CREATE TABLE employer (
  employer_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  companyName VARCHAR(255) NOT NULL,
  alternative_name VARCHAR(255),
  email VARCHAR(255) NOT NULL,
  phoneNumber VARCHAR(30) NOT NULL,
  website VARCHAR(255) NOT NULL,
  logo VARCHAR(255) NOT NULL,
  division VARCHAR(30) NOT NULL,
  location TEXT NOT NULL,
  createAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  about TEXT NOT NULL,
  PASSWORD VARCHAR(255) NOT NULL,
  confirmPassword VARCHAR(255) NOT NULL,
  ACTIVE INT(11) NOT NULL DEFAULT 0
);

CREATE TABLE jobs (
  job_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  employer_id INT(11) NOT NULL,
  category_id INT(11) NOT NULL,
  job_title VARCHAR(255) NOT NULL,
  keyword VARCHAR(100) NOT NULL,
  job_description TEXT NOT NULL,
  vacancies INT(11) NOT NULL,
  job_type VARCHAR(30) NOT NULL,
  deadline DATE NOT NULL,
  division VARCHAR(30) NOT NULL,
  min_salary INT(11) NOT NULL,
  max_salary INT(11) NOT NULL,
  experience VARCHAR(100),
  qualification TEXT DEFAULT NULL,
  skills VARCHAR(255) DEFAULT NULL,
  createAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE application (
  application_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  job_seeker_id INT(11) NOT NULL,
  job_id INT(11) NOT NULL,
  expected_salary INT(11) NOT NULL,
  alternative_number VARCHAR(30) NOT NULL,
  alternative_email VARCHAR(255) NOT NULL,
  upload_resume VARCHAR(255),
  STATUS INT(11) NOT NULL DEFAULT 0
);

CREATE TABLE category (
  category_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(255) NOT NULL,
  category_description VARCHAR(255),
  createAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
  
);


CREATE TABLE interview (
  interview_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  job_seeker_id INT(11) NOT NULL,
  employer_id INT(11) NOT NULL,
  job_id INT(11) NOT NULL,
  application_id INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  interview_date DATE NOT NULL,
  interview_time TIME NOT NULL,
  location VARCHAR(255) NOT NULL,
  contact_information VARCHAR(255) NOT NULL,
  document VARCHAR(255) NOT NULL
);

CREATE TABLE blog (
  blog_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  author_id INT(11) NOT NULL,
  blog_title VARCHAR(255) NOT NULL,
  introduction TEXT NOT NULL,
  content TEXT NOT NULL,
  conclusion TEXT NOT NULL,
  createAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updateAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE ADMIN (
  id_admin INT(11) NOT NULL PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  PASSWORD VARCHAR(255) NOT NULL
);

CREATE TABLE feedback(
  id INT AUTO_INCREMENT PRIMARY KEY, 
  author_id INT NOT NULL, 
  author_type VARCHAR(255) NOT NULL,                  
  category VARCHAR(255) NOT NULL, 
  message TEXT NOT NULL,                  
  rating INT NOT NULL,  
  email VARCHAR(255),                     
  file_url VARCHAR(255),                  
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

