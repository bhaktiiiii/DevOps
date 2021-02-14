<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
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
            <li role="separator" class="divider"></li>
           
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right hidden-sm">
        <li><a href="userlogin.html">Login</a></li>
        <li><a href="registration.html">Register</a></li>
        <li><a href="customercare.html">Customer Care</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<hr>
<h2 class="text-center">WOMEN'S WEAR</h2>
<hr>	
<?php
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	$product_array = $db_handle->runQuery("SELECT * FROM products WHERE category='Women'  ORDER BY id ASC ");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="container">
			<form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="thumbnail"> <img src="<?php echo $product_array[$key]["image"]; ?>" alt="Thumbnail Image 1" width="200" height="200" class="img-responsive"></div>
        <div class="caption">
			<h3><?php echo $product_array[$key]["name"]; ?></h3>
			<p><?php echo $product_array[$key]["description"]; ?></p>
			<p><?php echo "$".$product_array[$key]["price"]; ?></p>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
		    </form>
		</div>
	<?php
		}
	}
	?> 
<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © MyWebsite. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
</div>  
</body>
</html>