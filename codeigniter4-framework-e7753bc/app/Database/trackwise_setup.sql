-- TRACKWISE full database setup
-- Run in phpMyAdmin: select database task_manager_db → SQL tab → paste & run

CREATE DATABASE IF NOT EXISTS task_manager_db;
USE task_manager_db;

-- 1. USERS (login / register)
CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(255) NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- 2. STUDY SESSIONS (Study Log — your logs appear here)
CREATE TABLE IF NOT EXISTS study_sessions (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) UNSIGNED NOT NULL,
    subject VARCHAR(100) NOT NULL,
    topic VARCHAR(255) NOT NULL,
    hours INT(3) UNSIGNED DEFAULT 0,
    minutes INT(3) UNSIGNED DEFAULT 0,
    notes TEXT NULL,
    image VARCHAR(255) NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_user_id (user_id),
    INDEX idx_created_at (created_at)
);

-- 3. GOALS (Goals page — Create New Goal saves here)
CREATE TABLE IF NOT EXISTS goals (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) UNSIGNED NOT NULL,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(50) NOT NULL,
    target_value DECIMAL(10,2) NOT NULL DEFAULT 0,
    current_value DECIMAL(10,2) NOT NULL DEFAULT 0,
    unit VARCHAR(50) NOT NULL DEFAULT 'hours',
    color VARCHAR(20) NOT NULL DEFAULT '#42a5f5',
    due_date DATE NULL,
    is_completed TINYINT(1) NOT NULL DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_goals_user (user_id)
);

-- View your data:
-- SELECT * FROM users;
-- SELECT * FROM study_sessions ORDER BY created_at DESC;
-- SELECT * FROM goals ORDER BY created_at DESC;
