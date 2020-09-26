After installing xampp
Go to localdisk:C->xampp->htdocs->create a folder of name daraz and extract all files there
How to run project:
First do this change some name and make this username password etc.
	$servername = "localhost";
	$username = "root";
	$password = "admin";
1) Create a database called daraz
2) create a table user with the following fields:
	-id(PK) - int(11)
	-username - varchar(100)
	-email - varchar(100)
	-user_type - varchar(100)
	-password - varchar(100)
3) create a table products with the following fields:
	-id(PK) - int(11)
	-name - varchar(100)
	-price - int(100)
	-quantity - int(100)
	-category - varchar(100)
	-image - varchar(100)
4) create a table payments with the following fields:
	-id(PK) - int(11)
	-name- varchar(100)
	-address - varchar(100)
	-phone - int(100)
	-email - varchar(100)
	-payment - varchar(100)
	-customerId - int(11)
5) create a table orders with the following fields:
	-order_no(PK)- int(11)
	-paymentId - int(11)
	-productId - int(11)
	-name - varchar(100)
	-price - int(100)
	-quantity - int(100)		
6) Start apache and mysql and launch site on browser by ==== localhost/daraz
7) In order to create an admin, use a client like phpmyadmin and manually create a user with user_type admin. Use this user to login and be able to create other users.
Thanks