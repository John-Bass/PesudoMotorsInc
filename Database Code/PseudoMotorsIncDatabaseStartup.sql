CREATE DATABASE pseudomotorsinc;

create table customer
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
    cardType INT,                   /*1. Visa 2. MasterCard 3. etc*/
    cardNumber INT,
    cardSecurityNumber INT,
    gender VARCHAR(1),
    
    /*This is setup in a way that only ONE vehicle can be associated with ONE customer!!!*/
    vehicle_id INT,				         /*Foreign Key to Vehicle Table vehicle_id Column*/	
    user_colorChoice VARCHAR(15),
    user_engineChoice VARCHAR(2),        /*These three choices are mandatory for when working with the parts table */
    user_transChoice VARCHAR(4),
    
    sales_id INT,                        /*In case user wants to reference their purchases      */
    parts_id INT,                        /*In order to get basic info on parts. Like costs etc  */
    PRIMARY KEY(user_id)
    
    /*Must use ALTER at end of table creation in order to apply foreign keys to desired attributes!!!!!!!!!!*/
);

CREATE TABLE vehicles
(
	vehicle_id INT AUTO_INCREMENT, 	     /*Our unique identifier for a vehicle           */
    vehicle_price double,                /*Price of the vehicle                          */
    vehicle_amount INT,                  /*How MANY of this vehicle we currently HAVE    */
    vehicle_classification VARCHAR(20),  /*SUV, TRUCK, CAR, ETC of vehicle in question   */
    vehicle_manufacturer VARCHAR(15),    /*Manufacturer of vehicle in question           */
    vehicle_make VARCHAR(15),            /*Make of vehicle in question                   */
    vehicle_model VARCHAR(15),           /*Model of vehicle in question                  */
    vehicle_year INT,                    /*Production year of vehicle in question        */
    vehicle_seatCapacity INT,
    /*
    The following sections MUST all be altered according to the choice by the user.
    IE, If a BLACK vehicle is chosen, it also has one of the following ENGINE and TRANSMISSION platforms as well.
    Thus, when the update occurs a SUBTRACTION from the following elements MUST occurr. 
    vehicle_colorOPTION / vehicle_engineOPTION / vehicle_transOPTION / vehicle_amount
    */
    
    vehicle_colorRed INT,				 /*Stores how many of VEHICLE is colored RED      */
    vehicle_colorBlue INT,               /*Stores how many of VEHICLE is colored BLUE     */
    vehicle_colorBlack INT,              /*Stores how many of VEHICLE is colored BLACK    */
    vehicle_colorWhite INT,              /*Stores how many of VEHICLE is colored WHITE    */
    
    vehicle_engineV4 INT,
    vehicle_engineV6 INT,
    vehicle_engineV8 INT,
    
    vehicle_transAutomatic INT,
    vehicle_transManuel INT,
    
    /*-------------------------------------------------------------------------------------*/
    
    enginePartsAmount INT,               /*Informs us of the amount left in stock          */
    transPartsAmount INT,
    enginePartsCost INT,                 /*Informs us of the cost per part from distributer*/
    transPartsCost INT,
    PRIMARY KEY(vehicle_id)
);

CREATE TABLE parts
(
	parts_id INT AUTO_INCREMENT,         /*How we keep track of the parts                                  */
    user_id INT,                         /*Foreign key, so we can know what type of vehicle the user has   */
    vehicle_id INT,                      /*So we can figure out the parts costs from the vehicle table     */
    
    engineWorkCost INT,                  /*Our base cost on working on an engine                           */
    transWorkCost INT,                   /*Our base cost on working on a transmission                      */
    PRIMARY KEY(parts_id),
    FOREIGN KEY(user_id) REFERENCES customer(user_id) ON DELETE SET NULL,
    FOREIGN KEY(vehicle_id) REFERENCES vehicles(vehicle_id) ON DELETE SET NULL
);

create table sales
(
	sales_id INT AUTO_INCREMENT,         /*How we keep track with the sale in question          */
	user_id INT,                         /*Foreign Key to Customer Table User_Id Column         */
    vehicle_id INT,                      /*Foreign Key to Vehicles Table for vehicle sale       */
    parts_id INT,                        /*Foreign Key to Parts table for a parts sale          */
    
    salePrice double,                    /*Price of the vehicle OR parts APPLIED ON RECIEPT FOR FUTURE REFERENCE */
    salesTax double,                     /*Base taxes that will be applied at final payment     */
    dateOfSale DATE,                     /*When the purchase occurs the dateOfSale will be added*/
    PRIMARY KEY(sales_id),
    FOREIGN KEY(user_id) REFERENCES customer(user_id) ON DELETE SET NULL,
    FOREIGN KEY(vehicle_id) REFERENCES vehicles(vehicle_id) ON DELETE SET NULL,
    FOREIGN KEY(parts_id) REFERENCES parts(parts_id) ON DELETE SET NULL
);



ALTER TABLE customer
ADD FOREIGN KEY(vehicle_id) REFERENCES vehicles(vehicle_id) ON DELETE SET NULL;

ALTER TABLE customer
ADD FOREIGN KEY(sales_id) REFERENCES sales(sales_id) ON DELETE SET NULL;

ALTER TABLE customer
ADD FOREIGN KEY(parts_id) REFERENCES parts(parts_id) ON DELETE SET NULL;

SELECT *
FROM customer;
SELECT *
FROM vehicles;
SELECT *
FROM parts;
SELECT *
FROM sales;
