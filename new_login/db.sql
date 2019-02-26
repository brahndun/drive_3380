CREATE DATABASE accounts;
CREATE TABLE 'accounts'.'users'(
    'id' INT NOT NULL AUTO_INCREMENT,
    'first_name' VARCHAR(50) NOT NULL,
    'last_name' VARCHAR(50) NOT NULL,
    'email' VARCHAR(100) NOT NULL,
    'password' VARCHAR(100) NOT NULL,
    'hash' VARCHAR(32) NOT NULL,
    'type' VARCHAR(5) NOT NULL,
    PRIMARY KEY('id')
);