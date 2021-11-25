







CREATE table registration (
 id int not null AUTO_INCREMENT,
 name varchar(255) not null,
 password varchar(255) not null,
 email varchar(255) not null,
 mobile_no varchar(11) not null,   
 address varchar(255) not null,
 CONSTRAINT PRIMARY KEY (id),
type varchar(10) not null
      
)


CREATE TABLE cart ( 
    
    user_name varchar(255),
    product_name varchar(255),
    pid int(10),
    confirmation varchar(3)
     
)


CREATE TABLE `products` (
  `pid` int(11) not null AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `product_details` varchar(100) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `p_status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE table message (
 name varchar(255) not null,
comments  varchar(255)
)
