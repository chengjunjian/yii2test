-- Yii2 Test Database Schema
-- Database: yii2test

-- Create student table
CREATE TABLE IF NOT EXISTS student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age TINYINT UNSIGNED NOT NULL,
    gender ENUM('M', 'F') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert test data
INSERT INTO student (name, age, gender) VALUES
('张三', 20, 'M'),
('李四', 21, 'M'),
('王五', 19, 'F'),
('赵六', 22, 'M'),
('钱七', 20, 'F'),
('孙八', 23, 'M'),
('周九', 20, 'F'),
('吴十', 21, 'M'),
('郑十一', 22, 'M'),
('陈十二', 19, 'F'),
('李十三', 24, 'M'),
('王十四', 20, 'F'),
('刘十五', 21, 'M'),
('黄十六', 22, 'M'),
('赵十七', 18, 'F'),
('吴十八', 25, 'M'),
('郑十九', 20, 'M'),
('陈二十', 21, 'F'),
('李二十一', 23, 'M'),
('王二十二', 19, 'M');
