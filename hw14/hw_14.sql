CREATE USER 'tmsHWUser'@'localhost' IDENTIFIED WITH 'mysql_native_password' BY 'mysql';
GRANT ALL ON *.* TO 'tmsHWUser'@'localhost';
FLUSH PRIVILEGES;
CREATE DATABASE IF NOT EXISTS tmsHW;

USE tmsHW;

CREATE TABLE IF NOT EXISTS students (
                                        id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                                        student_name varchar(255) NOT NULL,
                                        student_age int DEFAULT 18,
                                        student_surname varchar(255) NOT NULL,
                                        student_course_name varchar(255) NOT NULL,
                                        student_country varchar(255) DEFAULT 'Belarus'
);
CREATE TABLE IF NOT EXISTS teachers (
                                        id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                                        teachers_name varchar(255) NOT NULL,
                                        teachers_surname varchar(255) NOT NULL,
                                        teachers_company_name varchar(255) NOT NULL,
                                        teachers_course_name varchar(255) NOT NULL,
                                        teachers_years_experience int DEFAULT 3
);
CREATE TABLE IF NOT EXISTS courses (
                                       id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                                       course_name varchar(255) NOT NULL,
                                       course_duration int DEFAULT 6,
                                       students_id int,
                                       teachers_id int,
                                       FOREIGN KEY (students_id) REFERENCES students (id) ON DELETE CASCADE ON UPDATE NO ACTION,
                                       FOREIGN KEY (teachers_id) REFERENCES teachers (id) ON DELETE CASCADE ON UPDATE NO ACTION
);
CREATE TABLE IF NOT EXISTS payments (
                                        id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                                        payments_sum int DEFAULT 3000,
                                        payments_time date NOT NULL,
                                        students_id int,
                                        FOREIGN KEY (students_id) REFERENCES students (id) ON DELETE CASCADE ON UPDATE NO ACTION
);
CREATE TABLE IF NOT EXISTS `groups` (
                                        id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                                        group_name varchar(255) NOT NULL,
                                        students_id int,
                                        teachers_id int,
                                        FOREIGN KEY (students_id) REFERENCES students (id) ON DELETE CASCADE ON UPDATE NO ACTION,
                                        FOREIGN KEY (teachers_id) REFERENCES teachers (id) ON DELETE CASCADE ON UPDATE NO ACTION
);

INSERT INTO students (student_name, student_age, student_surname, student_course_name, student_country) VALUES ('Kirill', 19, 'Tarasenko', 'Web Developer', 'Belarus'), ('Ivan', 31, 'Ivanov', 'Java Developer', 'Russia');
INSERT INTO teachers (teachers_name, teachers_surname, teachers_company_name, teachers_course_name, teachers_years_experience) VALUES ('Alexandr', 'Filipovskiy', 'NavekSoft', 'Web Developer', 5), ('Petr', 'Petrov', 'Yandex', 'Frontend Developer', 4);
INSERT INTO courses (course_name, course_duration) VALUES ('Web Developer', 11), ('Frontend Developer', 7), ('Java Developer', 8), ('Python Developer', 6);
INSERT INTO payments (id, payments_sum, payments_time) VALUES (1, 2790, '2023-12-31');
INSERT INTO `groups` (group_name) VALUES ('WD12'), ('FD11'), ('JD34');

UPDATE students SET student_age = 20 WHERE student_name = 'Ivan';
UPDATE teachers SET teachers_company_name = 'Innowise' WHERE teachers_name = 'Petr';
UPDATE courses SET course_duration = 5 WHERE course_name = 'Python developer';
UPDATE payments SET payments_sum = 3500 WHERE payments_time = '2023-12-31';
UPDATE `groups` SET group_name = 'FD20' WHERE group_name = 'FD11';

DELETE FROM students WHERE student_age = 20;