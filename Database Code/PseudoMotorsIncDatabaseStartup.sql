/*Do this first line initially then delete the first line and run the entirety of the rest of the code.*/
CREATE DATABASE pseudomotorsinc;

create table userInfo
(
	user_id INT AUTO_INCREMENT,																		
    user_userName VARCHAR(40) UNIQUE NOT NULL,         																
    user_password VARCHAR(12) NOT NULL,																		
    firstName VARCHAR(20) NOT NULL,															
    lastName VARCHAR(20) NOT NULL,
    DOB DATE NOT NULL,
    gender VARCHAR(1) NOT NULL,                        
    income INT NOT NULL,							   
    address VARCHAR(40) NOT NULL,			
    state VARCHAR(2) NOT NULL,
    email VARCHAR(60) UNIQUE NOT NULL,																					
    phone INT NOT NULL,	
    
    PRIMARY KEY(user_id)
);

create table dealerInfo
(
	dealer_id INT AUTO_INCREMENT,
    dealer_name VARCHAR(15) NOT NULL,
    dealer_address VARCHAR(15),
    dealer_phone INT,
    
    PRIMARY KEY(dealer_id)
);

create table supplierInfo
(
	supplier_id INT AUTO_INCREMENT,               	 	/*ID that supplier will be known by*/
    supplier_name VARCHAR(15) NOT NULL,                     		/*Name of supplier                 */
    supplier_address VARCHAR(15) NOT NULL,						/*Location of Supplier 			   */
    supplier_phone INT NOT NULL,
    
    PRIMARY KEY(supplier_id)
);

create table productInventory
(
	supplier_id INT,
    product_id INT AUTO_INCREMENT,
    product_name VARCHAR(15),
    product_price INT,
    
    PRIMARY KEY(product_id),
    FOREIGN KEY(supplier_id) REFERENCES supplierInfo(supplier_id) ON DELETE CASCADE
);

create table brandInfo
(
	brand_id INT AUTO_INCREMENT,
	brand_name VARCHAR(15) NOT NULL,
	brand_address VARCHAR(15),
	brand_phone INT,
    
	PRIMARY KEY(brand_id)
);

create table models
(
	brand_id INT,
    model_id INT AUTO_INCREMENT,
    model_classification VARCHAR(15) NOT NULL,
    model_name VARCHAR(15),
    
    PRIMARY KEY(model_id),
    FOREIGN KEY(brand_id) REFERENCES brandInfo(brand_id) ON DELETE SET NULL
);

create table vehicleInventory
(
	vehicle_vin INT AUTO_INCREMENT,
    model_id INT,
    vehicle_price INT,
    vehicle_year NUMERIC(4,0),
    vehicle_color VARCHAR(10),
    vehicle_engine VARCHAR(2),
    vehicle_trans VARCHAR(4),
    DateProduced DATE,
    DateSold DATE,
    
    PRIMARY KEY(vehicle_vin),
    FOREIGN KEY(model_id) REFERENCES models(model_id) ON DELETE SET NULL
);

create table vehicleSalesRecord
(
	salesRecordNumberV INT AUTO_INCREMENT,
    model_id INT,
    /*Classification*/
    vehicle_vin INT,
    /*
    Price
    Year
    Color
    Engine
    Trans
    DateProduced
    DateSold
    */
    user_id INT,
    dealer_id INT,
    
    PRIMARY KEY(salesRecordNumberV),
    FOREIGN KEY(model_id) REFERENCES models(model_id) ON DELETE SET NULL,
    FOREIGN KEY(vehicle_vin) REFERENCES vehicleInventory(vehicle_vin) ON DELETE SET NULL
    
);

create table productSalesRecord
(
	salesRecordNumberP INT AUTO_INCREMENT,
    product_id INT,
    /*
    supplier_id
    product_name
    product_price
    */
    user_id INT,
    dealer_id INT,
    
    PRIMARY KEY(salesRecordNumberP),
    FOREIGN KEY(product_id) REFERENCES productInventory(product_id) ON DELETE SET NULL
);

ALTER TABLE userInfo CHANGE phone phone VARCHAR(15);
ALTER TABLE dealerInfo CHANGE dealer_phone dealer_phone VARCHAR(15);
ALTER TABLE brandInfo CHANGE brand_phone brand_phone VARCHAR(15);
ALTER TABLE supplierInfo CHANGE supplier_phone supplier_phone VARCHAR(15);

ALTER TABLE userInfo CHANGE address adress VARCHAR(30);
ALTER TABLE dealerInfo CHANGE dealer_address dealer_address VARCHAR(30);
ALTER TABLE brandInfo CHANGE brand_address brand_address VARCHAR(30);
ALTER TABLE supplierInfo CHANGE supplier_address supplier_address VARCHAR(30);

ALTER TABLE dealerInfo CHANGE dealer_name dealer_name VARCHAR(30);
ALTER TABLE brandInfo CHANGE brand_name brand_name VARCHAR(30);
ALTER TABLE supplierInfo CHANGE supplier_name supplier_name VARCHAR(30);

ALTER TABLE productInventory CHANGE product_name product_name VARCHAR(50);

/*ADD STATE TO Dealer, Brand and Suppliers*/

INSERT INTO userInfo VALUES (1, 'jackyRyan121', 'DayThreeOne!', 'Jack', 'Ryan', '1999-01-01', 'M', 78000, '703 Driar Drive', 'MS', 'jackRyan_bestest@gmail.com', '6628162121');
INSERT INTO userInfo VALUES (2, 'yolandaSkit', '21HONES!', 'Joanna', 'Frilen', '1972-01-01', 'F', 65500, '543 Domino Drive', 'TX', 'j_Frilen221@gmail.com', '2289046521');

INSERT INTO dealerInfo VALUES (1, 'Chrissy Toyota Sellers', '2121 Overwound Drive', '6628281132');
INSERT INTO dealerInfo VALUES (2, 'Duncans Ford Helpers', '4 Circle Drive', '2287411132');

INSERT INTO supplierInfo VALUES (1, 'Windy Windshields', '432 Vermont Drive', '8012436201');
INSERT INTO supplierInfo VALUES (2, 'Engine Farmers', '847 Dublin Street', '8247836201');

INSERT INTO productInventory VALUES (2, 1, 'Engine V4 Parts', 225);
INSERT INTO productInventory VALUES (1, 2, 'Full Size Windshield', 599); 

INSERT INTO brandInfo VALUES (1, 'GMC', '300 Renaissance Center', '18004628782')

INSERT INTO models VALUES (
