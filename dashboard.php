<?php 
session_start();
$uname = $_SESSION['varname']; 
$org=$_SESSION['orgname'];
if($_SESSION['varname'] != NULL)
{
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

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
  
  
  <script>
  $(function() {
    $( "#cname" ).autocomplete({
      source: 'search_name.php'
    });
  });
  $(function() {
    $( "#cno" ).autocomplete({
      source: 'search_number.php'
    });
  });

  </script> 


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
	var sum=0;
	//to calculate price and total amount
	function calculate(obj){
		var costid="cost_"+obj.name;
		var qtyid= "qty_"+obj.name;
		var priceid= "price_"+obj.name;
		var cost= document.getElementById(costid).value;
		var qty= document.getElementById(qtyid).value;
		var result= cost*qty;
		sum=sum+result;
		document.getElementById(priceid).innerHTML= "&#8377;&nbsp;"+result;
		document.getElementById("total").innerHTML= "Total Amount: &#8377;&nbsp;"+sum;
	}
	var rowcount=1;
	//to add row dynamically
	$(document).ready(function(){
		
	$("#addnew").click(function(){
		rowcount++;
		$("#invoice").append('<tr><td><input class="product ui-autocomplete-input" id="prod_'+rowcount+'" type="text"  onFocus="suggest()"/></td><td class="title">&#8377;&nbsp;<input id="cost_'+rowcount+'" type="text" value=""/></td><td class="title">&#8377;&nbsp;<input id="qty_'+rowcount+'" name="'+rowcount+'" type="text" value="" onBlur="calculate(this);"/></td><td id="price_'+rowcount+'">&#8377;&nbsp;</td><td class="noPrint"><a class="remCF">X</a></td></tr>');
	});
	//to remove row
    $("#invoice").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
	
});

	//to store values in database from bill
	function store(){
		window.print() ;
		var w= document.getElementById("cname").value;
		var x= document.getElementById("cno").value;
		var z= sum;
		var element = document.getElementsByClassName("product");
		var y=[];
        for(var i=0;i<element.length;i++)
        {
            //alert($(element[i]).val());
            y.push(($(element[i]).val()));
        }
        //alert(y);
		
		location.href= "store_details.php?cname="+w+"&cno="+x+"&total="+z+"&products="+y+"";
	}
	
	</script>

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
                <a class="navbar-brand" href="#"><?php echo $org; ?></a>
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
                        <a href="logout.php">Logout</a>
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
    
        <form>
  <div class="form-group">
    <label for="name">Customer Name:</label>
      <input type="text" class="form-control" id="cname">
      
  </div>
  <div class="form-group">
    <label for="mobile">Mobile:</label>
    <input type="number" class="form-control" id="cno">
  </div>
  
</form>

<!--end of customer details-->

    <!--invoice-->
	<div class="col-xs-12" style="background-color:#000; color:#FFFFFF; font-size:24px">
    	<center><strong>I N V O I C E</strong></center>
    </div>
    <br>
    <!--User identity and details-->
    <?php
include("connect.php");

$sql = "SELECT * FROM user_details WHERE uname='$uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) 	
    // output data of each row
	$row = $result->fetch_assoc()
	?>
    <br>
    <br>
 	<div class="col-lg-12" id="Identity" style="font-size:20px;">
    	
        <div class="col-sm-6" id="address">
            <strong><?php echo $row["address"];?><br><?php echo $row["org"];?> <br> +91 <?php echo $row["mobile"];?></strong>
        </div>
        
        <div class="col-sm-6" id="details">
        	<table border="1px" width="100%">
            	<tr>
                	<td bgcolor="#eeeeee"><strong>Invoice #</strong></td>
                    <td style="text-align:right">000001</td>
                </tr>
                <tr>
                	<td bgcolor="#eeeeee"><strong>Date</strong></td>
                    <td style="text-align:right"><?php date_default_timezone_set('UTC'); echo date(' F d, Y '); ?></td>
                </tr>
            </table>
        </div>
        
    </div>
	<!--end of user identity-->
    
    </div>
    <!--end of invoice-->
    <br><br>
    <!--invoice table-->
    <div class="container">
    <table class="table table-bordered" id="invoice">
    	<tr  bgcolor="#eeeeee">
        	<th>Product Name</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th>Price</th> 
            <th class="noPrint">Cancel</th>
        </tr>
        <!--repeat block-->
        <tr>
        	<td><input class="product" id="prod_1" type="text" onFocus="suggest()"/></td>
    		<td class="title">&#8377;&nbsp;<input id="cost_1" type="text" value=""/></td>
    		<td class="title">&#8377;&nbsp;<input id="qty_1" name="1" type="text" value="" onBlur="calculate(this);"/></td>
    		<td id="price_1">&#8377;&nbsp;</td>
            <td class="noPrint"><a class="remCF">X</a></td>
        </tr> 
        <!------->
     	</table>
        <table class="table table-bordered">
        <!-- end of repeat block-->
        <tr>
        	<td colspan="4"  class="noPrint"><button class="btn-primary" id="addnew">Add Row</button></td>
        </tr>
        <tr>
        	<td class="col-xs-10"></td>
            <td class="col-xs-2" id="total">Total Amount: &#8377;&nbsp;</td>
    	</tr>
       </table>
</div>
    <!--end of invoice table-->
    
    <!--Print button-->
    <div class="noPrint">
    	<center><button class="btn btn-success" onClick="store();">Print</button></center>
    </div>
    <!-- end of print button-->
    
    <!-- /.container -->
<script>
	//to bring dropdown for products column
	function suggest(){
	  $(function() {
    $( ".product" ).autocomplete({
      source: 'search_name.php'
    });
  });	
	}
</script>
<?php
}
else
header('location:index.php');
?>
</body>

</html>
