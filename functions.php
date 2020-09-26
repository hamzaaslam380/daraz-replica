<?php 
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'daraz');

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array(); 

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}
	if(isset($_POST['register_btn2'])){
		reciept();
	}

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: login.php");
	}
	
	function reciept(){
		global $db, $errors;

		// receive all input values from the form
		$name    =  e($_POST['name']);
		$email       =  e($_POST['email']);
		$ph_no =  e($_POST['ph_no']);
		$address  =  e($_POST['address']);
		$payment = e($_POST['payment_type']);
		$customerId = e($_POST['customer_id']);

		// form validation: ensure that the form is correctly filled
		$query1 = "Select * from user where id=$customerId";		  
		$result = mysqli_query($db, $query1);
		if(mysqli_num_rows($result) == 1)
		{
			$_SESSION["loggedInCustomer"] = $customerId;
		if (empty($name)) { 
			array_push($errors, "Name is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($ph_no)) { 
			array_push($errors, "Phone No is required"); 
		}
		if (empty($address)) { 
			array_push($errors, "Address is required"); 
		}
		if(empty($payment)){
			array_push($errors, "Select Payment Type"); 
		}
		

		// register user if there are no errors in the form
		if (count($errors) == 0) {

			foreach ($_SESSION["cart_item"] as $item){
					
			}

			if (isset($payment)) {
				$query = "INSERT INTO payments (name,email,payment,address,phone,customerId) 
						  VALUES('$name', '$email', '$payment','$address', '$ph_no','$customerId')";		  
				if(mysqli_query($db, $query)){
				header('location: reciept.php');
				}else
				die("Error Detected");
			}
			else
				die("Error Detected");

		}
		}
		else
			array_push($errors, "Not A Valid Id"); 

	}

	// REGISTER USER
	function register(){
		global $db, $errors;

		// receive all input values from the form
		$username    =  e($_POST['username']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database

			if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO user (username, email, user_type, password) 
						  VALUES('$username', '$email', '$user_type', '$password')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
				header('location: AdminAccessPanel.php');
			}else{
				$query = "INSERT INTO user (username, email, user_type, password) 
						  VALUES('$username', '$email', 'user', '$password')";
				mysqli_query($db, $query);

				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "You are now logged in";
				header('location: profile.php');				
			}

		}

	}

	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM user WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: AdminAccessPanel.php');		  
				}else{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: profile.php');
				}
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>