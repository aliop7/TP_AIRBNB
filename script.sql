-- Création de la table addresses
CREATE TABLE addresses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    address VARCHAR(255) NOT NULL,
    zip_code VARCHAR(10) NOT NULL,
    city VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL
);

-- Création de la table users
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address_id INT,
    is_active BOOLEAN NOT NULL DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (address_id) REFERENCES addresses(id)
);

-- Création de la table property_types
CREATE TABLE property_types (
    id INT PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(255) NOT NULL,
    is_active BOOLEAN NOT NULL DEFAULT TRUE
);

-- Création de la table properties
CREATE TABLE properties (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price_per_night DECIMAL(10, 2) NOT NULL,
    rooms INT NOT NULL,
    beds INT NOT NULL,
    baths INT NOT NULL,
    max_guests INT NOT NULL,
    is_active BOOLEAN NOT NULL DEFAULT TRUE,
    property_type_id INT,
    user_id INT,
    address_id INT,
    FOREIGN KEY (property_type_id) REFERENCES property_types(id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (address_id) REFERENCES addresses(id)
);

-- Création de la table property_images
CREATE TABLE property_images (
    id INT PRIMARY KEY AUTO_INCREMENT,
    property_id INT,
    image_path VARCHAR(255) NOT NULL,
    is_active BOOLEAN NOT NULL DEFAULT TRUE,
    FOREIGN KEY (property_id) REFERENCES properties(id)
);

-- Création de la table reservations
CREATE TABLE reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_number VARCHAR(50) NOT NULL UNIQUE,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    adults INT NOT NULL,
    children INT NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    property_id INT,
    user_id INT,
    FOREIGN KEY (property_id) REFERENCES properties(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Création de la table amenities
CREATE TABLE amenities (
    id INT PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(255) NOT NULL,
    image_path VARCHAR(255)
);

-- Création de la table property_amenities
CREATE TABLE property_amenities (
    property_id INT,
    amenity_id INT,
    PRIMARY KEY (property_id, amenity_id),
    FOREIGN KEY (property_id) REFERENCES properties(id),
    FOREIGN KEY (amenity_id) REFERENCES amenities(id)
);

-- Création de la table media
CREATE TABLE media (
    id INT PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(255),
    image_path VARCHAR(255) NOT NULL,
    is_active BOOLEAN NOT NULL DEFAULT TRUE,
    property_id INT,
    FOREIGN KEY (property_id) REFERENCES properties(id)
);

-- Insertion de données dans la table addresses
INSERT INTO addresses (address, zip_code, city, country) VALUES
('123 Rue de Paris', '75001', 'Paris', 'France'),
('456 Avenue des Champs', '75008', 'Paris', 'France'),
('789 Boulevard Saint-Germain', '75007', 'Paris', 'France');

-- Insertion de données dans la table users
INSERT INTO users (email, password, lastname, firstname, phone, address_id, is_active, created_at) VALUES
('john.doe@example.com', 'password123', 'Doe', 'John', '+33 1 23 45 67 92', 1, TRUE, NOW()),
('jane.smith@example.com', 'password456', 'Smith', 'Jane', '+33 1 23 45 67 93', 2, TRUE, NOW()),
('alice.jones@example.com', 'password789', 'Jones', 'Alice', '+33 1 23 45 67 94', 3, TRUE, NOW());

-- Insertion de données dans la table property_types
INSERT INTO property_types (label, is_active) VALUES
('Apartment', TRUE),
('House', TRUE),
('Studio', TRUE);

-- Insertion de données dans la table properties
INSERT INTO properties (title, description, price_per_night, rooms, beds, baths, max_guests, is_active, property_type_id, user_id, address_id) VALUES
('Cozy Paris Apartment', 'A charming apartment in the heart of Paris', 120.00, 2, 1, 1, 4, TRUE, 1, 1, 1),
('Spacious Family House', 'A large house with a garden', 250.00, 5, 4, 3, 10, TRUE, 2, 2, 2),
('Modern Studio', 'A modern studio in the city center', 80.00, 1, 1, 1, 2, TRUE, 3, 3, 3);

-- Insertion de données dans la table reservations
INSERT INTO reservations (order_number, start_date, end_date, adults, children, total_price, property_id, user_id) VALUES
('ORD123456', '2024-07-01', '2024-07-07', 2, 0, 840.00, 1, 1),
('ORD123457', '2024-08-10', '2024-08-15', 4, 2, 1500.00, 2, 2),
('ORD123458', '2024-09-05', '2024-09-10', 1, 1, 400.00, 3, 3);

-- Insertion de données dans la table amenities
INSERT INTO amenities (label, image_path) VALUES
('Wi-Fi', '/images/wifi.png'),
('Swimming Pool', '/images/pool.png'),
('Air Conditioning', '/images/ac.png'),
('Parking', '/images/parking.png'),
('Kitchen', '/images/kitchen.png');

-- Insertion de données dans la table property_amenities
INSERT INTO property_amenities (property_id, amenity_id) VALUES
(1, 1),
(1, 3),
(2, 2),
(2, 4),
(3, 1),
(3, 5);

-- Insertion de données dans la table media
INSERT INTO media (label, image_path, is_active, property_id) VALUES
('Living Room', '/images/living_room.jpg', TRUE, 1),
('Bedroom', '/images/bedroom.jpg', TRUE, 1),
('Garden', '/images/garden.jpg', TRUE, 1),
('Pool', '/images/pool.jpg', TRUE, 1),
('Studio View', '/images/studio_view.jpg', TRUE, 1);

-- Insertion de données dans la table property_images
INSERT INTO property_images (property_id, image_path, is_active) VALUES
(1, 'test1.jpg', TRUE),
(1, 'test2.jpg', TRUE),
(1, 'test3.jpeg', TRUE),
(2, 'test1.jpg', TRUE),
(2, 'test2.jpg', TRUE),
(2, 'test3.jpeg', TRUE),
(3, 'test1.jpg', TRUE),
(3, 'test2.jpg', TRUE),
(3, 'test3.jpeg', TRUE);
