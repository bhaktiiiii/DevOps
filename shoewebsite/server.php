<?php
session_start();

// initializing variables
$username = "";

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'phplogin');

// REGISTER USER
if (isset($_REQUEST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_REQUEST['username']);
 
  $password_1 = mysqli_real_escape_string($db, $_REQUEST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_REQUEST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { echo("Username is required"); }
  
  if (empty($password_1)) { echo("Password is required"); }
  if ($password_1 != $password_2) {
	echo("The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) 
  { // if user exists
    if ($user['username'] == $username) {
      echo("Username already exists");
    }

    
  else{

  
  	$password = $password_1;

  	$query ="INSERT INTO users (username,password) VALUES('$username','$password')";
  	mysqli_query($db, $query) or die("Query didnt work");
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.html');
  }
  }

}
?>































	
	
	