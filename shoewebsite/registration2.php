<?php
if (isset($_POST["submit"])) {
    include_once 'DBconnect.php';
    
    $username = $_POST['username'];
    $password = ($_POST['password_1']);
    
    $database = new dbConnect();
    
    $db = $database->openConnection();
    $sql1 = "select username from users where username='$username'";
    
    $user = $db->query($sql1);
    $result = $user->fetchAll();
   
    
    if (empty($result)) {
        $sql = "insert into users (username, password) values('$username','$password')";
        
        $db->exec($sql);
        
        $database->closeConnection();
        $response = array(
            "type" => "success",
            "message" => "You have registered successfully.<br/><a href='userlogin.html'>Now Login</a>."
        );
    } else {
        $response = array(
            "type" => "error",
            "message" => "Username already in use."
        );
    }
}
?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>userlogin</title>
<link rel="stylesheet" href="css/bootstrap.css">
<script>
	if(password_1!= password_2){
            valid = false;
            document.getElementById('confirm_password_error').innerHTML = "Both passwords must be same.";
        }

        return valid;
</script>
<style>	
td{ 
	-webkit-columns: ;
	-moz-columns: ;
	-o-columns: ;
	columns: ;
	align-self: center;
	text-align: justify;
}

</style>
</head>

<body>

 <nav>
  <div class="container"> 
    
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#"><img src="images/footsie-story.jpg" width="80" height="60"></a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.html">Home<span class="sr-only">(current)</span></a></li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="womenswear1.php">Women's Wear</a> </li>
            <li><a href="menswear1.php">Men's Wear</a> </li>
            <li><a href="kidswear1.php">Kid's Wear</a> </li>
           
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search" action="search.php" method="get">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="query">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right hidden-sm">
        <li><a href="userlogin.html">Login</a></li>
        <li><a href="registration2.php">Register</a></li>
        <li><a href="customercare.html">Customer Care</a></li>
        <li><a href="cart.php">Shopping Cart</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
   <h3 class="text-center">REGISTRATION</h3>
<div class="table">

<?php
        if (! empty($response)) {
            ?>
        <div id="response" class="<?php echo $response["type"]; ?>"><?php echo $response["message"]; ?></div>
        <?php
        }
        ?>
<form action="" method="post">

<table width="272" border="0" align="center" cellpadding="0">
  <tbody>
   
    <tr>
	 <td width="124">UserID</td>
  	 <td width="142"><input type="text" class="form-control" name="username" id="username" required></td>
    </tr>
    <tr>
       <td>Password</td>
  	 <td><input type="password" class="form-control" name="password_1" id="password_1" required></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
  	 <td><input type="password" class="form-control" name="password_2" id="password_2" required></td>
    </tr>
    <tr>
		<td><button type="submit" name="submit" class="btn signup">Register</button></td>
        <td><button type="reset" class="btn btn-default">Reset</button></td>
    </tr>
    <tr>
    	<td>Already a member? <a href="userlogin.html">Sign in</a></td>
    </tr>
  </tbody>
</table>
</form>
</div>

<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © MyWebsite. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
