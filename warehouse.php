<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	@media print {
.noPrint {
    display:none;
  }
}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
  
  
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
                <a class="navbar-brand" href="#">Welcome USER</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Warehouse</a>
                    </li>
                    <li>
                        <a href="#">Overview</a>
                    </li>
                    <li>
                        <a href="#">Bill</a>
                    </li>
                    <li>
                        <a href="#">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<!--navigation ends-->
    <!-- Page Content -->
    <div class="container">
	<!--customer details-->	
    
        <form action ="add.php" method="post">
  <div class="form-group">
    <label for="number">Productid:</label>
    <input type="number" class="form-control" name="pid">
  </div>
  <div class="form-group">
    <label for="text">Product name:</label>
    <input type="text" class="form-control" name="pname">
  </div><p>
  <button type="submit" class="btn btn-default">Add</button>
  </p>
</form>

<!--end of product details-->

    
    <br><br>
   <center> <h2>Your Transactions List</h2></center>
	<br><br>
	 <?php

include("connect.php");
$sql = "SELECT * FROM product_details ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table class=\"table\"><thead class=\"thead-default\"><tr><th></th><th>ProductID</th><th>ProductName</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
		
		echo "<tr><th scope=\"row\"></th><td>" . $row["pid"]. " </td><td>" . $row["pname"]. "</td></tr> ";
		
    	}
		echo "</tbody></table><br>";
		
}
else
	echo"NO transactions Found";

$conn->close();
?>
    <!-- /.container -->

</body>

</html>
