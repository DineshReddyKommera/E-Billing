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
                        <a href="index.php">Dashboard</a>
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
            <ul class="nav nav-tabs" id="navbar2" >
                           <li class="active"><a data-toggle="tab" href="#add">Add</a></li>
                           <li><a data-toggle="tab" href="#modify">Modify</a></li>
						    <li><a data-toggle="tab" href="#delete">Delete</a></li>
                        </ul>
                        <div class="tab-content">
                           <div id="add" class="tab-pane fade in active">
						    <form role="form" action="update.php" method="post" style="padding:20px;">
  <div class="form-group">
    <label for="text">Product Name:</label>
    <input type="text" class="form-control" name="pname">
  </div>
  <div class="form-group">
    <label for="number">Product Cost:</label>
    <input type="number" class="form-control" name="pcost">
  </div><p>
  <button type="submit" name="insert" class="btn btn-default">Add</button>
  </p>
</form>
                              
                           </div>
                           <div id="modify" class="tab-pane fade">
                               <form role="form" action="update.php" method="post" style="padding:20px;">
  <div class="form-group">
    <label for="text">Product Name:</label>
    <input type="text" class="form-control" name="pname">
  </div>
  <div class="form-group">
    <label for="number">Enter the cost to be changed</label>
    <input type="number" class="form-control" name="pcost">
  </div><p>
  <button type="submit"  name= "modify" class="btn btn-default">modify</button>
  </p>
</form>
                           </div>    
						 <div id="delete" class="tab-pane fade">
                               <form role="form" action="update.php" method="post" style="padding:20px;" name ="myform">
  <div class="form-group">
    <label for="text">Product Name:</label>
    <input type="text" class="form-control" name="pname">
	  
  </div>
  
<p>
  <button type="submit" name="delete" class="btn btn-default">Delete</button>
  </p>
</form>
                           </div>   
                    </div>        
        </div>
<!--end of product details-->
    <br><br>
   <center> <h2>Your Transactions List</h2></center>
	<br><br>
	 <?php

include("connect.php");
$sql = "SELECT * FROM product_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table class=\"table\"><thead class=\"thead-default\"><tr><th></th><th>ProductID</th><th>ProductName</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
		
		echo "<tr><th scope=\"row\"></th><td>" . $row["pname"]. " </td><td>" . $row["pcost"]. "</td></tr> ";
		
    	}
		echo "</tbody></table><br>";
		
}
else
	echo"<center><h3>No transactions Found</h3></center>";

$conn->close();
?>
    <!-- /.container -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
