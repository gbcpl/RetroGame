CREATE DATABSE IF NOT EXISTS retrogame;

USE retrogame;

CREATE TABLE IF NOT EXISTS Admin
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    last_name VARCHAR(55),
    first_name VARCHAR(55),
    mail VARCHAR(55),
    password VARCHAR(55),
    message_id INT
    FOREIGN KEY (message_id) REFERENCES Message(id)
);

CREATE TABLE IF NOT EXISTS Customer
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    last_name VARCHAR(55),
    first_name VARCHAR(55),
    mail VARCHAR(55),
    address_id INT,
    phone_nb INT,
    password VARCHAR(55)
    FOREIGN KEY (address_id) REFERENCES Address(id)
);

CREATE TABLE IF NOT EXISTS Seller
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    last_name VARCHAR(55),
    first_name VARCHAR(55),
    mail VARCHAR(55),
    password VARCHAR(55),
    company VARCHAR(55)
);

CREATE TABLE IF NOT EXISTS Product
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(55),
    type VARCHAR(55),
    price_id INT,
    game_id INT,
    console_id INT,
    accessory_id INT,
    seller_id INT
    FOREIGN KEY (price_id) REFERENCES Price(id)
    FOREIGN KEY (game_id) REFERENCES Game(id)
    FOREIGN KEY (console_id) REFERENCES Console(id)
    FOREIGN KEY (accessory_id) REFERENCES Accessory(id)
    FOREIGN KEY (seller_id) REFERENCES Seller(id)

);

CREATE TABLE IF NOT EXISTS Address_customer
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    number INT,
    street VARCHAR(55),
    city VARCHAR(55),
    postal_code INT
);

CREATE TABLE IF NOT EXISTS Product
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(55),
    type VARCHAR(55);
    price_id INT,
    game_id INT,
    console_id INT,
    accessory_id INT,
    seller_id INT
    FOREIGN KEY (price_id) REFERENCES Price(id)
    FOREIGN KEY (game_id) REFERENCES Game(id)
    FOREIGN KEY (console_id) REFERENCES Console(id)
    FOREIGN KEY (accessory_id) REFERENCES Accessory(id)
    FOREIGN KEY (seller_id) REFERENCES Seller(id)

);

CREATE TABLE IF NOT EXISTS Price
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    type VARCHAR(55),
    price INT
);

CREATE TABLE IF NOT EXISTS Game
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(55),
    release_date DATE,
    genre VARCHAR(55),
    dev VARCHAR(55)
);

CREATE TABLE IF NOT EXISTS Console
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(55),
    release_date DATE,
    dev VARCHAR(55)
);

CREATE TABLE IF NOT EXISTS Accessory
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(55),
    console_id INT
    FOREIGN KEY (console_id) REFERENCES Console(id)

);

CREATE TABLE IF NOT EXISTS Order
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    number VARCHAR(55),
    date VARCHAR(55),
    customer_id INT,
    product_id INT
    FOREIGN KEY (customer_id) REFERENCES Customer(id)
    FOREIGN KEY (product_id) REFERENCES Product(id)

);

CREATE TABLE IF NOT EXISTS Shipping
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    order_id INT,
    statut VARCHAR(55)
    FOREIGN KEY (order_id) REFERENCES Order(id)

);