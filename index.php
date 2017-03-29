<?php
include 'inc/sessions.php';

function drawResults($sql) {
	include 'inc/conn.php';
	$result = $conn->query($sql);      
	$rows = $result->num_rows;    // Find total rows returned by database
		if($rows > 0) {
			$cols = 3;    // Define number of columns
			$counter = 1;     // Counter used to identify if we need to start or end a row
			$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
			
			$container_class = 'container-fluid';  // Parent container class name
			$row_class = 'row';    // Row class name
			$col_class = 'col-sm-4'; // Column class name
	 
			echo '<div class="'.$container_class.'">';    // Container open
		while ($item = $result->fetch_array()) {
			if(($counter % $cols) == 1) {    // Check if it's new row
				echo '<div class="'.$row_class.'">';	// Start a new row
			}
					$id = $item['id'];
					$name = $item['name'];
					$price = $item['price'];
					$img = $item['image'];
					echo '<div class="'.$col_class.'"><div class="thumbnail">';
					echo '<img src="'.$img.'">';
					echo '<div class="caption"><h4>'.$price.'</h4>';
					echo '<h4>'.$name.'</h4>';
					echo '<form action="index.php" method="post">';
					echo '<input type="hidden" value="'.$id.'" name="DetailId">';
					echo '<input type="submit" value="View Details" class="changeButton btn btn-info btn-large"></form>';
					echo '<form action="index.php" method="post">';
					echo '<input type="hidden" value="'.$id.'" name="itemId">
							<input type="hidden" value="'.$img.'" name="itemImgUrl">
							<input type="hidden" value="'.$name.'" name="itemName">
							<input type="hidden" value="'.$price.'" name="itemPrice">
							<input type="submit" value="Add To Cart" class="changeButton btn btn-primary btn-large">							
							</form>
							</div></div></div>';     
			if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
				echo '</div>';	 //  Close the row
			}
			$counter++;    // Increase the counter
		}
		$result->free();
		if($nbsp > 0) { // Adjustment to add unused column in last row if they exist
			for ($i = 0; $i < $nbsp; $i++)	{ 
				echo '<div class="'.$col_class.'">&nbsp;</div>';		
			}
			echo '</div>';  // Close the row
		}
		echo '</div>';  // Close the container
	}
}
function display() {
	if (isset($_POST["DetailId"]) && !empty($_POST["DetailId"])) {
		$itemId=$_POST["DetailId"];
			$fetchId = $itemId;
			include 'inc/conn.php';
			$sql = "SELECT * FROM tp_stock s INNER JOIN tp_price p ON s.id = p.product_id WHERE s.id = '$fetchId'";
			$result = $conn->query($sql);
			while ($item = $result->fetch_array()) {
				$id = $item['id'];
				$name = $item['name'];
				$price = $item['price'];
				$img = $item['image'];
				$desc = $item['description'];
				echo '<div class="col-md-12">';
				echo '<p class="text-center"><a href="index.php">Return To The Store</a></p>';
				echo '<div class="well"><table style="width:100%;"><tr><td >';
				echo '<img src="'.$img.'" style="max-width:300px;padding:15px;"></td><td>';
				echo '<h4 class="pull-right">'.$price.'</h4>';
				echo '<h4>'.$name.'</h4>';
				echo '<p>'.$desc.'</p>';
				echo '<form action="index.php" method="post">';
				echo '<p><input type="hidden" value="'.$id.'" name="itemId">
						<input type="hidden" value="'.$img.'" name="itemImgUrl">
						<input type="hidden" value="'.$name.'" name="itemName">
						<input type="hidden" value="'.$price.'" name="itemPrice">
						<input type="submit" value="Add To Cart" class="changeButton btn btn-primary btn-large">							
						</form>
						</p></td></tr></table></div></div>';  	
			}
	} elseif (isset($_POST["search"]) && !empty($_POST["search"])) {
		$platform=$_POST["platform"];	
		$category=$_POST["category"];		
		$order_one=$_POST["order_one"];
		$order_two=$_POST["order_two"];

		include 'inc/conn.php';
		$curSql = "SELECT * FROM tp_stock s INNER JOIN tp_price p ON s.id = p.product_id ";
		$categorySQL = "WHERE category = '$category' ";
		$sql = $curSql.$categorySQL."AND ".$platform."=1 ORDER BY ".$order_one." ".$order_two;
		if ($order_two=="DESC") {
			$label = "High to Low (DESC)";
		} else {
			$label = "Low to High (ASC)";
		}
		echo '<p class="text-center"><a href="index.php">Return To The Store</a></p>';
		echo '<div><h3>Search Results</h3>
		<p><strong>Your Filters: </strong><br>Platform: '.$platform.'
		<br>Category: '.$category.'<br>Sorting By: '.$order_one.' '.$label.'	
		</p></div>';
		drawResults($sql);
		
		
	} else {
		echo '<div class="panel panel-primary"><div class="panel-heading">
			  <h3 class="panel-title">Upcomming Sales</h3></div>
			  <div class="panel-body">';
        displaySales();
		echo '</div><div class="panel-footer" style="text-align:center;"></div></div>';                					
		$sql = "SELECT * FROM tp_stock s INNER JOIN tp_price p ON s.id = p.product_id";
		drawResults($sql);
	}
}

function displaySales() {
	include 'inc/conn.php';
	$sql = "SELECT * FROM tp_stock s INNER JOIN tp_price p ON s.id = p.product_id RIGHT JOIN tp_sales sa ON s.id = sa.product_id";
	$result = $conn->query($sql);      
	$rows = $result->num_rows;    // Find total rows returned by database
		if($rows > 0) {
			$cols = 3;    // Define number of columns
			$counter = 1;     // Counter used to identify if we need to start or end a row
			$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
			
			$container_class = 'container-fluid';  // Parent container class name
			$row_class = 'row';    // Row class name
			$col_class = 'col-sm-4'; // Column class name
	 
			echo '<div class="'.$container_class.'">';    // Container open
		while ($item = $result->fetch_array()) {
			if(($counter % $cols) == 1) {    // Check if it's new row
				echo '<div class="'.$row_class.'">';	// Start a new row
			}
					$id = $item['id'];
					$name = $item['name'];
					$price = $item['price'];
					$img = $item['image'];
					$date = $item['start_date'];
					echo '<div class="'.$col_class.'"><div class="thumbnail">';
					echo '<img src="'.$img.'">';
					echo '<h4>';
					echo '<s>'.$price.'</s><br>';
					$price = $item['sale_price'];
					echo '<div style="color:red;">'.$price.'<br>Sale!</div>';
					echo '</h4>';
					echo '<h4>'.$name.'</h4>';
					echo '<div style="font-weight:bold;color:red;">Sale Begins '.$date.'</div>';
					echo '</div></div>';     
			if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
				echo '</div>';	 //  Close the row
			}
			$counter++;    // Increase the counter
		}
		$result->free();
		if($nbsp > 0) { // Adjustment to add unused column in last row if they exist
			for ($i = 0; $i < $nbsp; $i++)	{ 
				echo '<div class="'.$col_class.'">&nbsp;</div>';		
			}
			echo '</div>';  // Close the row
		}
		echo '</div>';  // Close the container
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Store">
    <meta name="author" content="Chris Breuner">

    <title>Team Project</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Awesome Sauce Games</a>
				
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
			
                <p class="lead">Advanced Search</p>
                <div class="list-group">
				<form action="index.php" method="post">
					<div class="list-group-item">
					<strong>Category:</strong> <br>
						<select name="category" required>
						  <option value=""></option>
						  <option value="action">Action</option>
						  <option value="rpg">RPG</option>
						  <option value="mmorpg">MMORPG</option>						  
						  <option value="simulator">Simulator</option>
						  <option value="sports">Sports</option>
						  <option value="tps">TPS</option>
						  <option value="fps">FPS</option>
						  <option value="rts">RTS</option>							  
						</select>
					</div>
					<div class="list-group-item">
						<strong>Platforms:</strong> <br>
						PS4: <input type="radio" value="ps4" name="platform" required>
						PC: <input type="radio" value="pc" name="platform">
						XBOX: <input type="radio" value="xbox" name="platform">
					</div>
					<div class="list-group-item">
						<strong>Order By:</strong> <br>
						Name: <input type="radio" name="order_one" value="name" required>
						Price: <input type="radio" name="order_one" value="price">
					</div>
					<div class="list-group-item">
						<strong>Show Results:</strong> <br>
						Ascending: <input type="radio" name="order_two" value="ASC" required>
						Descending: <input type="radio" name="order_two" value="DESC">
					</div>
					<div class="list-group-item text-center">
						<input type="hidden" value="search" name="search">
						<input type="submit" value="Search" class="btn btn-md btn-info">
					</div>
				</form>
                </div>
				
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						View Your Shopping Cart
					</h3>
				</div>
				<div class="panel-body">

				<div id="shoppingCartDiv">  
					<?php				
					include 'inc/shoppingCart.php';
					?>
				</div>
	
				</div>
				<div class="panel-footer" style="text-align:center;">
					<h3>Cart Total: $<?php echo $total; ?></h3>
					<div id="shoppingCartTotalPrice" style="font-size:20px;color:blue;">
					<br>
					<a href="emptyCart.php" class="btn btn-info">Empty Cart</a>
					<a href="#" class="btn btn-success">Checkout</a>
					</div>
				</div>
			</div>
        </div>
			
			

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="img/slide2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/slide1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/slide3.jpeg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>	




                    
				<?php
				
					echo "<div id='storeDisplay'>";
                    display();
					echo "</div>";
                ?>

         

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; CSUMB</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
