CREATE DATABASE  IF NOT EXISTS 1612972679_toolshop;
USE 1612972679_toolshop;


DROP TABLE IF EXISTS cart;
DROP TABLE IF EXISTS item;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;


CREATE TABLE categories (
	categoryID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	categoryName VARCHAR(45) UNIQUE
);

CREATE TABLE item (
	itemID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	itemName VARCHAR(45) NOT NULL,
	itemDescription VARCHAR(255),
	itemImgPath VARCHAR(255) DEFAULT NULL,
	itemPrice DOUBLE NOT NULL,
	category_ID INT(11) DEFAULT NULL,
	CONSTRAINT fk_category_ID FOREIGN KEY (category_ID) 
    REFERENCES categories (categoryID)
);


CREATE TABLE users (
	userID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	firstName VARCHAR(55) NOT NULL,
	lastName VARCHAR(55) NOT NULL,
	userEmail VARCHAR(125) NOT NULL UNIQUE,
	userName VARCHAR(55) NOT NULL UNIQUE,
	userPassword VARCHAR(255) NOT NULL,
	accessLevel TINYINT(4) DEFAULT '1',
	activity BIT(1) DEFAULT b'1'
);

CREATE TABLE cart (
	id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	user_id int(11) NOT NULL,
	item_id int(11) NOT NULL,
	CONSTRAINT fk_user_ID FOREIGN KEY (user_ID) 
    REFERENCES users (userID),
	CONSTRAINT fk_item_ID FOREIGN KEY (item_ID) 
    REFERENCES item (itemID)
);

DELIMITER $$

DROP FUNCTION IF EXISTS SetAccessLevel $$

CREATE FUNCTION setAccessLevel(access_level tinyint,user_id int,admin_id int) 
RETURNS INT
BEGIN

	IF(SELECT accessLevel FROM Users WHERE userID = admin_id) = 3 THEN
		UPDATE Users SET accessLevel = access_level WHERE userID = user_id AND activity = 1;
        RETURN access_level;
	ELSE
		RETURN(SELECT accessLevel FROM Users WHERE userID = user_id AND activity = 1);
	END IF;

END $$

DELIMITER ;

DELIMITER $$

DROP FUNCTION IF EXISTS ValidateUser $$

CREATE FUNCTION ValidateUser(user_name VARCHAR(55),user_pass VARCHAR(255)) 
RETURNS INT
BEGIN
	IF EXISTS(SELECT userID FROM Users WHERE userName = user_name AND userPassword = user_pass AND activity = 1) THEN
		RETURN 1;
	ELSE
		RETURN 0;
	END IF;
END $$

DELIMITER ;


DELIMITER $$

DROP PROCEDURE IF EXISTS CategoryList $$

CREATE PROCEDURE CategoryList()
BEGIN
	SELECT * FROM Categories ORDER BY categoryName;
END $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE IF EXISTS DeleteCategory $$

CREATE PROCEDURE DeleteCategory(category_id int)
BEGIN
	IF NOT EXISTS(SELECT categoryID FROM Images WHERE categoryID = category_id) THEN
		DELETE FROM categories WHERE categoryID = category_id;
	END IF;
END $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE IF EXISTS DeleteUser $$

CREATE PROCEDURE DeleteUser(user_id INT)
BEGIN
	UPDATE Users SET activity = 0 WHERE userId = user_id;
END $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE IF EXISTS GetUser $$

CREATE PROCEDURE GetUser(user_Name INT)
begin
	SELECT userID,firstName,lastName,userEmail,userName,accessLevel
    FROM Users
    WHERE userName = userName AND activity = 1;
end $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE IF EXISTS NewCategory $$

CREATE PROCEDURE NewCategory(category_name VARCHAR(45))
BEGIN
	INSERT INTO Categories(categoryName)VALUES(category_name); 
END ;;


DELIMITER ;

DELIMITER $$

DROP PROCEDURE NewUser $$

CREATE PROCEDURE NewUser(
	first_name VARCHAR(55),
	last_name VARCHAR(55),
    user_email VARCHAR(125),
    user_name VARCHAR(55),
    user_password VARCHAR(255)
)
BEGIN
	INSERT INTO Users(firstName,lastName,userEmail,userName,userPassword)
	VALUES(first_name,last_name,user_email,user_name,user_password);
END $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE IF EXISTS ResetUser $$

CREATE PROCEDURE ResetUser(userID INT)
BEGIN
	UPDATE Users SET activity = 1 WHERE userId = user_id;
END $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE  IF EXISTS UpdateCategory $$

CREATE PROCEDURE UpdateCategory(category_name VARCHAR(45), category_id INT)
BEGIN
	UPDATE Categories SET categoryName = category_name 
	WHERE categoryID = category_id;
END $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE IF EXISTS UpdateUser $$

CREATE PROCEDURE UpdateUser(
	user_id INT,
	first_name VARCHAR(55),
	last_name VARCHAR(55),
    user_email VARCHAR(125),
    user_name VARCHAR(15),
    user_password VARCHAR(15)
)
BEGIN
	UPDATE Users 
    SET firstName = first_name,lastName = last_name,userEmail = user_email,userName = user_name,userPassword = user_password
	WHERE userId = user_id AND activity = 1;
END $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE IF EXISTS UserList $$

CREATE PROCEDURE UserList()
BEGIN
	SELECT userID,firstName,lastName,userName
    FROM Users WHERE activity = 1;
END $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE IF EXISTS getItemList $$

CREATE PROCEDURE getItemList()
BEGIN

	SELECT * FROM item;

END$$

DELIMITER ; 

DELIMITER $$

DROP PROCEDURE IF EXISTS getItem $$

CREATE PROCEDURE getItem(item_id INT)
BEGIN

	SELECT * FROM item WHERE itemID = item_id;

END $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE IF EXISTS getCategoryItem $$

CREATE PROCEDURE getCategoryItem(categoryID INT)
BEGIN

	SELECT * FROM item WHERE category_ID = categoryID;
    
END $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE IF EXISTS addToCart $$

CREATE PROCEDURE addToCart(userID INT, itemID int)
BEGIN

	INSERT INTO cart(user_id, itemID)
    VALUES(userID, itemID);

END $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE IF EXISTS removeFromCart $$

CREATE PROCEDURE removeFromCart(userID INT, itemID INT)
BEGIN

	DELETE FROM cart WHERE user_id = userID AND item_id = itemID;

END $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE IF EXISTS getCart $$

CREATE PROCEDURE getCart(userID INT)
BEGIN

	SELECT  item.itemName, item.itemDescription, item.itemImagePath, item.itemPrice 
    FROM cart 
    INNER JOIN item 
    ON item.itemID = cart.item_id
    WHERE user_id = userID;

END $$

DELIMITER ;

DELIMITER $$

DROP PROCEDURE IF EXISTS purchaseCart $$

CREATE PROCEDURE purchaseCart(userID INT)
BEGIN

	DECLARE usr_id INT;
    DECLARE itm_id INT;
    
    

END $$

DELIMITER ;
