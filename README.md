# Registration_form-Cgpa Calculation
The website is designed as a comprehensive Student Registration and CGPA Calculation System. It serves two main purposes: allowing users to register with their personal details and providing a platform to calculate their average CGPA based on subject marks.

#Note:To properly organize this project. All the files must be  store  in XAMPP's htdocs folder.
When creating database in Xampp Apps, you must keep the names the same.

Database Name: 
(northwestern_university) 

Table Name: 
(students)

Column name:
    (id, 
    first_name,
    last_name,
    email,
    mobile_number,
    password,
    date_of_birth,
    address,
    gender)



    

CREATE DATABASE northwestern_university;

USE northwestern_university;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mobile_number VARCHAR(15) NOT NULL,
    password VARCHAR(255) NOT NULL,
    date_of_birth DATE NOT NULL,
    address TEXT NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL
);
