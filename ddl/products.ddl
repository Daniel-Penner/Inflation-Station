CREATE DATABASE products;
USE products;
CREATE TABLE customer (
    customerId          INT AUTO_INCREMENT,
    name                VARCHAR(40),
    email               VARCHAR(50),
    password            VARCHAR(30),
    PRIMARY KEY (customerId)
);

CREATE TABLE category (
    categoryId          INT AUTO_INCREMENT,
    categoryName        VARCHAR(50),    
    PRIMARY KEY (categoryId)
);

CREATE TABLE product (
    productId           INT AUTO_INCREMENT,
    productName         VARCHAR(40),
    productPrice        DECIMAL(10,2),
    productImageURL     VARCHAR(100),
    productDesc         VARCHAR(1000),
    categoryId          INT,
    PRIMARY KEY (productId),
    FOREIGN KEY (categoryId) REFERENCES category(categoryId)
);

CREATE TABLE review (
    reviewId            INT AUTO_INCREMENT,
    reviewRating        INT,
    reviewDate          DATETIME,   
    customerId          INT,
    productId           INT,
    reviewComment       VARCHAR(1000),          
    PRIMARY KEY (reviewId),
    FOREIGN KEY (customerId) REFERENCES customer(customerId)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (productId) REFERENCES product(productId)
        ON UPDATE CASCADE ON DELETE CASCADE
);