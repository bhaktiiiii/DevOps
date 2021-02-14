<?php
   $db = mysqli_connect("localhost","root","","phplogin") or die("Connection failed");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql) or die("Query failed");
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
    
         $_SESSION['login_user'] = $myusername;
         
         header("location: index2.html");
      }else {
         $error = "Your Login Name or Password is invalid";
		  echo($error);
      }
   }
?>