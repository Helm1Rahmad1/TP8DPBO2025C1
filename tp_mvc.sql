-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS tp_mvc;
USE tp_mvc;

-- Drop tables if they exist to avoid errors
DROP TABLE IF EXISTS enrollments;
DROP TABLE IF EXISTS students;
DROP TABLE IF EXISTS courses;

-- Create students table (from original code)
CREATE TABLE students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  nim VARCHAR(20) NOT NULL UNIQUE,
  phone VARCHAR(15),
  join_date DATE
);

-- Create courses table (new table)
CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  course_code VARCHAR(20) NOT NULL UNIQUE,
  course_name VARCHAR(100) NOT NULL,
  credits INT NOT NULL,
  description TEXT
);

-- Create enrollments table (new table with relationships)
CREATE TABLE enrollments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  course_id INT NOT NULL,
  enrollment_date DATE NOT NULL,
  grade VARCHAR(2),
  FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
  FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

-- Insert sample data into students
INSERT INTO students (name, nim, phone, join_date) VALUES
('John Doe', '12345', '123456789', '2023-01-01'),
('Jane Smith', '23456', '987654321', '2023-01-02'),
('Bob Johnson', '34567', '555555555', '2023-01-03');

-- Insert sample data into courses
INSERT INTO courses (course_code, course_name, credits, description) VALUES
('CS101', 'Introduction to Programming', 3, 'Basic programming concepts and algorithms'),
('CS202', 'Database Systems', 4, 'Introduction to database design and SQL'),
('CS303', 'Web Development', 3, 'Building dynamic web applications');

-- Insert sample data into enrollments
INSERT INTO enrollments (student_id, course_id, enrollment_date, grade) VALUES
(1, 1, '2023-02-01', 'A'),
(1, 2, '2023-02-01', 'B'),
(2, 1, '2023-02-02', 'A'),
(2, 3, '2023-02-02', 'C'),
(3, 2, '2023-02-03', 'B');