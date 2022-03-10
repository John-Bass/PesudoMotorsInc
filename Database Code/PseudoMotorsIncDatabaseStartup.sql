/*Do create database first, then delete create database and run the rest of the code*/
CREATE DATABASE pseudomotorsinc;

CREATE TABLE customer
(
	user_id INT AUTO_INCREMENT,																		
    user_userName VARCHAR(40),         																 /*UNIQUE & NOT NULL UserName*/
    user_password VARCHAR(12),																		 /*NOT NULL password*/
    firstName VARCHAR(20),															/*NOT NULL lName, fName, DOB, address, state, phone*/
    lastName VARCHAR(20),
    DOB DATE,
    address VARCHAR(40),			
    state VARCHAR(2),
    email VARCHAR(60),																					/*UNIQUE & NOT NULL email*/
    phone VARCHAR(15),	
    PRIMARY KEY(user_id)
);

CREATE TABLE customerPayment
(
	user_id INT,																		/*UNIQUE AND NOT NULL user_id in CustomerPayment*/
    cardType VARCHAR(10),																
    cardNumber NUMERIC(16,0),				
    cardSecurityNumber NUMERIC(3,0),
    PRIMARY KEY(user_id),
    FOREIGN KEY(user_id) REFERENCES customer(user_id) ON DELETE CASCADE
);

/*Creates rows for all varients of vehicles available. Thus, a different row for same make/model/year depending on color, engine, and trans.*/
CREATE TABLE vehicles
(
	vehicle_id INT AUTO_INCREMENT, 	     /*Our unique identifier for a vehicle           */
	vehicle_amount INT,                  /*How MANY of this vehicle we currently HAVE    */
    vehicle_price double,                /*Price of the vehicle                          */
    vehicle_classification VARCHAR(20),  /*SUV, TRUCK, CAR, ETC of vehicle in question   */
    vehicle_manufacturer VARCHAR(15),    /*Manufacturer of vehicle in question           */
    vehicle_make VARCHAR(15),            /*Make of vehicle in question                   */
    vehicle_model VARCHAR(15),           /*Model of vehicle in question                  */
    vehicle_year INT,                    /*Production year of vehicle in question        */
    vehicle_color VARCHAR(10),
    vehicle_engineSize VARCHAR(2),       /*V4, V6, V8 */
    vehicle_transmission VARCHAR(4),     /*Auto or MANU */
    vehicle_seatCapacity INT,
    PRIMARY KEY(vehicle_id)
);

/*Creates rows for the amount of vehicles customer has purchased. Thus, USERID + VEHICLENUMBER allow for finding a specific row.*/
CREATE TABLE customerVehicles
(
	user_id INT,																			/*NOT NULL user_id in customerVehicles*/
    user_vehicleNumber INT,          														/*NOT NULL user_vehicleNumber*/
    vehicle_id INT,              															/*NOT NULL vehicle_id*/
    PRIMARY KEY(user_id, user_vehicleNumber),
    FOREIGN KEY(user_id) REFERENCES customer(user_id) ON DELETE CASCADE,
    FOREIGN KEY(vehicle_id) REFERENCES vehicles(vehicle_id) ON DELETE SET NULL
);

/*Three rows, V4, V6, V8*/
CREATE TABLE engineWork
(
    engineSize VARCHAR(2),     																	/*UNIQUE engineSize*/
    engineWorkCost INT,
    enginePartsCost INT,
    PRIMARY KEY(engineSize)
);

/*Two Rows, Auto and Trans*/
CREATE TABLE transWork
(
	transmission VARCHAR(4),																	/*UNIQUE transmission*/
	transWorkCost INT,
    transPartsCost INT,
    PRIMARY KEY(transmission)
);

/*Create a recieptID and associate it with a user for every vehicle sold*/
CREATE TABLE salesRecieptForVehicles
(
	salesRecieptVehicles_id INT AUTO_INCREMENT,
    user_id INT,																	/*NOT NULL user_id in salesRecieptForVehicles*/
    vehicle_id INT,																	/*NOT NULL vehicle_id*/

    tax DOUBLE(2,2),																/*NOT NULL tax*/
    totalCost DOUBLE,																/*NOT NULL totalCost in salesRecieptForVehicles*/
    PRIMARY KEY(salesRecieptVehicles_id),
    FOREIGN KEY(user_id) REFERENCES customer(user_id) ON DELETE SET NULL
);

/*Create a recieptID and associate it with a user for every engine worked on*/
CREATE TABLE salesRecieptForEngineWork
(
	salesRecieptEngine_id INT AUTO_INCREMENT,
    user_id INT,													               /*NOT NULL user_id in salesRecieptForEngineWork*/
    engineInfo VARCHAR(2),															/*NOT NULL engineInfo*/
    
    tax DOUBLE(2,2),																/*NOT NULL tax*/
    totalCost DOUBLE,																/*NOT NULL totalCost in salesRecieptForEngineWork*/
    PRIMARY KEY(salesRecieptEngine_id),
    FOREIGN KEY(user_id) REFERENCES customer(user_id) ON DELETE SET NULL,
    FOREIGN KEY(engineInfo) REFERENCES engineWork(engineSize) ON DELETE SET NULL
);

/*Create a recieptID and associate it with a user for every transmission worked on*/
CREATE TABLE salesRecieptForTransWork
(
	salesRecieptTrans_id INT AUTO_INCREMENT,
    user_id INT,																	/*NOT NULL user_id in salesRecieptForTransWork*/
    transmissionInfo VARCHAR(4),													/*NOT NULL transmissionInfo*/
    
    tax DOUBLE(2,2),																/*NOT NULL tax*/
    totalCost DOUBLE,																/*NOT NULL totalCost in salesRecieptForTransWork*/
    PRIMARY KEY(salesRecieptTrans_id),
    FOREIGN KEY(user_id) REFERENCES customer(user_id) ON DELETE SET NULL,
    FOREIGN KEY(transmissionInfo) REFERENCES transWork(transmission) ON DELETE SET NULL
);


/*
ALTERS FOR MISSED DATA

NOTICE: SOME ALTERS WILL PRESENT AN ERROR, THIS ISN'T A PROBLEM SINCE THESE ERRORS ALSO OCCURR ON PRIMARY KEY VALUES, THUS THEY WOULD ALREADY
HAVE TO BE NOT NULL, SO WHEN YOU DO THIS OPERATION ON THEM IT ESSENTIALLY STATES, "No shit sherlock, its a primary key, thus already not null.
*/
ALTER TABLE customer CHANGE user_userName user_userName VARCHAR(40) UNIQUE NOT NULL;  
ALTER TABLE customer CHANGE user_password user_password VARCHAR(12) NOT NULL;  
ALTER TABLE customer CHANGE firstName firstName VARCHAR(20) NOT NULL;  
ALTER TABLE customer CHANGE lastName lastName VARCHAR(20) NOT NULL;  
ALTER TABLE customer CHANGE DOB DOB DATE NOT NULL;  
ALTER TABLE customer CHANGE address address VARCHAR(40) NOT NULL;  
ALTER TABLE customer CHANGE state state VARCHAR(2) NOT NULL;  
ALTER TABLE customer CHANGE email email VARCHAR(60) UNIQUE NOT NULL;  
ALTER TABLE customer CHANGE phone phone VARCHAR(15) NOT NULL;  

ALTER TABLE customerPayment CHANGE user_id user_id INT UNIQUE NOT NULL;

ALTER TABLE customerVehicles CHANGE user_id user_id INT NOT NULL;
ALTER TABLE customerVehicles CHANGE user_vehicleNumber user_vehicleNumber INT NOT NULL;
ALTER TABLE customerVehicles CHANGE vehicle_id vehicle_id INT NOT NULL;

ALTER TABLE engineWork CHANGE engineSize engineSize VARCHAR(2) UNIQUE NOT NULL;

ALTER TABLE transWork CHANGE transmission transmission VARCHAR(4) UNIQUE NOT NULL;

ALTER TABLE salesRecieptForVehicles CHANGE user_id user_id INT NOT NULL;
ALTER TABLE salesRecieptForVehicles CHANGE vehicle_id vehicle_id INT NOT NULL;
ALTER TABLE salesRecieptForVehicles CHANGE tax tax DOUBLE(2,2) NOT NULL;
ALTER TABLE salesRecieptForVehicles CHANGE totalCost totalCost DOUBLE NOT NULL;

ALTER TABLE salesRecieptForEngineWork CHANGE user_id user_id INT NOT NULL;
ALTER TABLE salesRecieptForEngineWork CHANGE engineInfo engineInfo VARCHAR(2) NOT NULL;
ALTER TABLE salesRecieptForEngineWork CHANGE tax tax DOUBLE(2,2) NOT NULL;
ALTER TABLE salesRecieptForEngineWork CHANGE totalCost totalCost DOUBLE NOT NULL;

ALTER TABLE salesRecieptForTransWork CHANGE user_id user_id INT NOT NULL;
ALTER TABLE salesRecieptForTransWork CHANGE transmissionInfo transmissionInfo VARCHAR(4) NOT NULL;
ALTER TABLE salesRecieptForTransWork CHANGE tax tax DOUBLE(2,2) NOT NULL;
ALTER TABLE salesRecieptForTransWork CHANGE totalCost totalCost DOUBLE NOT NULL;


/*
INPUTTING BASE DATA INTO THE TABLES
*/
INSERT INTO engineWork VALUES ('V4', 150, 150);
INSERT INTO engineWork VALUES ('V6', 210, 200);
INSERT INTO engineWork VALUES ('V8', 275, 245);

INSERT INTO transWork VALUES ('Auto', 200, 130);
INSERT INTO transWork VALUES ('Manu', 150, 100);

INSERT INTO vehicles VALUES (1, 10, 29000, 'Truck', 'Ford', 'Ford', 'F-150', 2021, 'Red', 'V6', 'AUTO', 5);
INSERT INTO vehicles VALUES (2, 3, 29000, 'Truck', 'Ford', 'Ford', 'F-150', 2021, 'Blue', 'V6', 'AUTO', 5);
INSERT INTO vehicles VALUES (3, 8, 29000, 'Truck', 'Ford', 'Ford', 'F-150', 2021, 'Black', 'V6', 'AUTO', 5);
INSERT INTO vehicles VALUES (4, 4, 29000, 'Truck', 'Ford', 'Ford', 'F-150', 2021, 'White', 'V6', 'AUTO', 5);
INSERT INTO vehicles VALUES (5, 11, 31000, 'Truck', 'Ford', 'Ford', 'F-150', 2021, 'Red', 'V8', 'AUTO', 5);
INSERT INTO vehicles VALUES (6, 8, 31000, 'Truck', 'Ford', 'Ford', 'F-150', 2021, 'Blue', 'V8', 'AUTO', 5);
INSERT INTO vehicles VALUES (7, 6, 31000, 'Truck', 'Ford', 'Ford', 'F-150', 2021, 'Black', 'V8', 'AUTO', 5);
INSERT INTO vehicles VALUES (8, 3, 31000, 'Truck', 'Ford', 'Ford', 'F-150', 2021, 'White', 'V8', 'AUTO', 5);

SELECT vehicle_id, vehicle_make, vehicle_model, vehicle_engineSize
FROM vehicles
WHERE vehicle_make = 'Ford' AND vehicle_model = 'F-150' AND vehicle_engineSize = 'V8';























CREATE TABLE suppliers
(
	supplier_id INT AUTO_INCREMENT,               	 	/*ID that supplier will be known by*/
    supplier_name VARCHAR(15),                     		/*Name of supplier                 */
    
    PRIMARY KEY(supplier_id)
);

CREATE TABLE products
(
	supplier_id INT,									/*ID that supplier is known by*/
    supplier_productId INT AUTO_INCREMENT,              /*ID to identify products     */
    supplier_productName VARCHAR(15),					/*Product Name, IE Doors, windshield, etc VERY VERY GENERIC NAMING*/
    supplier_productPrice INT,							/*Price of product*/
    supplier_DOP DATE,          						/*Date of Production, so if there is an issue with product we can find those who bought it*/
    
    PRIMARY KEY(supplier_id, supplier_productId),
    FOREIGN KEY(supplier_id) REFERENCES suppliers(supplier_id) ON DELETE CASCADE
);

CREATE TABLE manufacturers
(
	manufacturer_id INT AUTO_INCREMENT,					/*ID that manufacturer will be known by */
    manufacturer_name VARCHAR(15),						/*Name of manufacturer				   	*/
    
    PRIMARY KEY(manufacturer_id)
);

CREATE TABLE manufacturerModels
(
	manufacturer_id INT,
	vehicle_vin INT AUTO_INCREMENT,						/*Unique identifier for every vehicle*/
    vehicle_price INT,
    vehicle_DOP DATE NOT NULL,               			/*DATE OF PRODUCTION in case a callback is needed*/
	vehicle_make VARCHAR(15) NOT NULL,            		/*Make of this UNIQUE vehicle  */
    vehicle_model VARCHAR(15) NOT NULL,           		/*Model of this UNIQUE vehicle */    
    vehicle_year INT NOT NULL,                    		/*Year of this UNIQUE vehicle  */
    vehicle_color VARCHAR(10) UNIQUE NOT NULL,			/*Color of this UNIQUE vehicle */
    vehicle_engineSize VARCHAR(2) NOT NULL,       		/*Engine Size: V4, V6, V8      */
    vehicle_transmission VARCHAR(4) NOT NULL,           /*Transmission: AUTO or MANU   */
    
    PRIMARY KEY(vehicle_vin),
    FOREIGN KEY(manufacturer_id) REFERENCES manufacturers(manufacturer_id) ON DELETE CASCADE
);

CREATE TABLE ourCompanyVehicles
(
	manufacturer_id INT,
	vehicle_vin INT,									/*Unique identifier for every vehicle  */
    vehicle_classification VARCHAR(15),					/*Ex. TRUCK, CAR, Convertable, SUV etc This way we can group vehicles when showing users*/
    vehicle_DOP DATE NOT NULL,               			/*DATE OF PRODUCTION: in case a callback is needed			 */
    vehicle_DOA DATE NOT NULL,							/*DATE OF ACQUISITION: so we know when we bought the vehicle  */
    vehicle_DOS DATE,									/*DATE OF SALE: so we know when we sell the vehicle           */
	vehicle_make VARCHAR(15) NOT NULL,            		/*Make of this UNIQUE vehicle  */
    vehicle_model VARCHAR(15) NOT NULL,           		/*Model of this UNIQUE vehicle */    
    vehicle_year INT NOT NULL,                    		/*Year of this UNIQUE vehicle  */
    vehicle_color VARCHAR(10) UNIQUE NOT NULL,			/*Color of this UNIQUE vehicle */
    vehicle_engineSize VARCHAR(2) NOT NULL,       		/*Engine Size: V4, V6, V8      */
    vehicle_transmission VARCHAR(4) NOT NULL,           /*Transmission: AUTO or MANU   */
    
    PRIMARY KEY(vehicle_vin),
    FOREIGN KEY(manufacturer_id) REFERENCES manufacturers(manufacturer_id) ON DELETE SET NULL,
    FOREIGN KEY(vehicle_vin) REFERENCES manufacturers(vehicle_vin) ON DELETE CASCADE
);

CREATE TABLE dealers
(
	dealer_id INT AUTO_INCREMENT,
    dealer_name VARCHAR(15),
    
    PRIMARY KEY(dealer_id)
);

CREATE TABLE customers
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
    phone VARCHAR(15) NOT NULL,	
    
    PRIMARY KEY(user_id)
);


CREATE TABLE salesRecordForVehicles
(
	salesRecord_id INT AUTO_INCREMENT,
    user_id INT, 
    dealer_id INT,
    vehicle_vin INT,
    /*Maybe set up a tax for each state?*/
    totalCost INT
    
    PRIMARY KEY(salesRecord_id, vehicle_vin),
    FOREIGN KEY(vehicle_vin) REFERENCES ourCompanysVehicles(vehicle_vin) ON DELETE CASCADE
);

CREATE TABLE customerVehicles
(
	user_vehicleVin INT,          													
	user_id INT,																		
    PRIMARY KEY(user_vehicleVin),
    FOREIGN KEY(user_id) REFERENCES customer(user_id) ON DELETE CASCADE,
    FOREIGN KEY(user_vehicleVin) REFERENCES vehicleInformationNumber(vehicle_vin) ON DELETE SET NULL
);


/*How do we set up an order or sales record based off the information already present?*/







