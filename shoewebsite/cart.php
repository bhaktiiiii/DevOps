<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM products WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<html>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<head>
	<title>Shopping Cart</title>
	
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
            <li><a href="#">Separated link</a> </li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a> </li>
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
        <li><a href="cart.php">Shopping Cart</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<h2 class="text-center">Shopping Cart</h2>

<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
<p>&nbsp;</p>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" width="100" height="100" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>
</body>
</html>

