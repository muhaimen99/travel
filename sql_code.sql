
CREATE DATABASE travel_planner;

USE travel_planner;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE flights (
    id INT AUTO_INCREMENT PRIMARY KEY,
    flight_number VARCHAR(50) NOT NULL,
    departure VARCHAR(100) NOT NULL,
    arrival VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE hotels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hotel_name VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    price_per_night DECIMAL(10, 2) NOT NULL
);

CREATE TABLE activities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    activity_name VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    flight_id INT,
    hotel_id INT,
    activity_id INT,
    booking_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (flight_id) REFERENCES flights(id),
    FOREIGN KEY (hotel_id) REFERENCES hotels(id),
    FOREIGN KEY (activity_id) REFERENCES activities(id)
);

-- Insert sample flights
INSERT INTO flights (flight_number, departure, arrival, price) VALUES 
('AA123', 'New York', 'Los Angeles', 300.00),
('BA456', 'London', 'New York', 500.00),
('CA789', 'Beijing', 'Shanghai', 150.00);

-- Insert sample hotels
INSERT INTO hotels (hotel_name, location, price_per_night) VALUES 
('Grand Plaza', 'New York', 200.00),
('Royal Palace', 'London', 250.00),
('Shanghai Inn', 'Shanghai', 100.00);

-- Insert sample activities
INSERT INTO activities (activity_name, location, price) VALUES 
('City Tour', 'New York', 50.00),
('Museum Visit', 'London', 30.00),
('River Cruise', 'Shanghai', 20.00);

show tables;
select * from bookings;