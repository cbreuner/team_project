<?php
include 'inc/sessions.php';




function display() {
    include 'inc/conn.php';
    $sql = "SELECT * FROM tp_stock s INNER JOIN tp_price p ON s.id = p.product_id";
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
						$imgUrl = $item['img_url'];
						$img = "http://localhost/team_project/img/games/".$imgUrl;
						echo '<div class="'.$col_class.'"><div class="thumbnail">';
						echo '<img src="'.$img.'">';
						echo '<div class="caption"><h4 class="pull-right">'.$price.'</h4>';
						echo '<h4><a href="#">'.$name.'</a></h4>';
						echo ' <p>'.$item['description'].'</p>';
						echo '<form action="index.php" method="post">';
						echo '<p><input type="hidden" value="'.$id.'" name="itemId">
								<input type="hidden" value="'.$imgUrl.'" name="itemImgUrl">
								<input type="hidden" value="'.$name.'" name="itemName">
								<input type="hidden" value="'.$price.'" name="itemPrice">
								<input type="submit" value="Add To Cart" class="changeButton btn btn-primary btn-large" style="display:block;" >							
								</form>
								</p></div></div></div>';     
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
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

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
                <a class="navbar-brand" href="#">Awesome Sauce Games</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Awesome Sauce Store</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
				
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						View Your Shopping Cart
					</h3>
				</div>
				<div class="panel-body">
<?php				
include 'inc/shoppingCart.php';
?>
				<div id="shoppingCartDiv">  

				</div>
  
				</div>
				<div class="panel-footer" style="text-align:center;">
					<div id="shoppingCartTotalPrice" style="font-size:20px;color:blue;">

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
                    display();
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
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

	<!-- Shopping Cart JS -->
    <script src="js/cart.js"></script>
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
