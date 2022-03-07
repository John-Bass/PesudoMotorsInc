/*Run the create database first, then delete the create database line. Then Run the whole query and it will create all the tables.*/
CREATE DATABASE PseudoMotorsInc;
CREATE TABLE customer
(
	user_id INT AUTO_INCREMENT,
    user_userName VARCHAR(40),
    user_password VARCHAR(12),
    firstName VARCHAR(20),
    lastName VARCHAR(20),
    DOB DATE,
    address VARCHAR(40),
    state VARCHAR(2),
    email VARCHAR(60),
    phone VARCHAR(15),
    PRIMARY KEY(user_id)
);

CREATE TABLE customerPayment
(
	user_id INT,
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
	user_id INT,
    user_vehicleNumber INT,
    vehicle_id INT,              
    PRIMARY KEY(user_id, user_vehicleNumber),
    FOREIGN KEY(user_id) REFERENCES customer(user_id) ON DELETE CASCADE,
    FOREIGN KEY(vehicle_id) REFERENCES vehicles(vehicle_id) ON DELETE SET NULL
);

/*Three rows, V4, V6, V8*/
CREATE TABLE engineWork
(
    engineSize VARCHAR(2),
    engineWorkCost INT,
    enginePartsCost INT,
    PRIMARY KEY(engineSize)
);

/*Two Rows, Auto and Trans*/
CREATE TABLE transWork
(
	transmission VARCHAR(4),
	transWorkCost INT,
    transPartsCost INT,
    PRIMARY KEY(transmission)
);

/*Create a recieptID and associate it with a user for every vehicle sold*/
CREATE TABLE salesRecieptForVehicles
(
	salesRecieptVehicles_id INT AUTO_INCREMENT,
    user_id INT,
    vehicle_id INT,

    tax DOUBLE(2,2),
    totalCost DOUBLE,
    PRIMARY KEY(salesRecieptVehicles_id),
    FOREIGN KEY(user_id) REFERENCES customer(user_id) ON DELETE SET NULL
);

/*Create a recieptID and associate it with a user for every engine worked on*/
CREATE TABLE salesRecieptForEngineWork
(
	salesRecieptEngine_id INT AUTO_INCREMENT,
    user_id INT,
    engineInfo VARCHAR(2),
    
    tax DOUBLE(2,2),
    totalCost DOUBLE,
    PRIMARY KEY(salesRecieptEngine_id),
    FOREIGN KEY(user_id) REFERENCES customer(user_id) ON DELETE SET NULL,
    FOREIGN KEY(engineInfo) REFERENCES engineWork(engineSize) ON DELETE SET NULL
);

/*Create a recieptID and associate it with a user for every transmission worked on*/
CREATE TABLE salesRecieptForTransWork
(
	salesRecieptTrans_id INT AUTO_INCREMENT,
    user_id INT,
    transmissionInfo VARCHAR(4),
    
    tax DOUBLE(2,2),
    totalCost DOUBLE,
    PRIMARY KEY(salesRecieptTrans_id),
    FOREIGN KEY(user_id) REFERENCES customer(user_id) ON DELETE SET NULL,
    FOREIGN KEY(transmissionInfo) REFERENCES transWork(transmission) ON DELETE SET NULL
);

