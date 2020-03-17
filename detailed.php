<?php
	//capture and save parameter: selected
	if(isset($_REQUEST["selected"])){
		$itemid = $_REQUEST["selected"];
	}
	else echo "No parameter found, please try again.";
	
	//connect to database
	$dbconnect = mysqli_connect("localhost","root","","animals") OR die(mysqli_connect_error());

	//sql statement using parameter as criteria
	$sql = "SELECT * FROM itemsforsale WHERE item_id=$itemid";
	
	//create query to execute sql on db
	$query = mysqli_query($dbconnect, $sql);

?>
<html>

	<head>
		<title>Selected Product</title>
		<link href="style.css" rel="stylesheet" >
	</head>
	
	<body>
	
		<header class="main-header">
			<a class="logo" href="#"></a>
			<ul class="main-nav">
			  <li><a href="index.php">Products</a></li>
			</ul>
		  </header>
		  
		  <h1>Selected Product</h1>
	
		<?php
	
		//create IF function to display db data if any available
		if($query){
			//singular product placed in record variable
			$record = mysqli_fetch_array($query, MYSQLI_ASSOC);
			
			//create variables for each field
			$itemname = $record["item_name"];
			$itemdesc = $record["item_desc"];
			$itemtype = $record["item_type"];
			$itemprice = $record["item_price"];
			$itemimg = $record["item_img"];
		?>	
		
		<!-- creating structure for single item -->
		<img class="single" src="images/<?php echo $itemimg; ?>" />
		<h2 class="selectedname"><?php echo $itemname; ?></h2>
		<p><?php echo $itemdesc; ?></p>
		<h5>Type: <?php echo $itemtype; ?></h5>
		<h5>Price: $<?php echo $itemprice; ?>USD</h5>
		

		<?php
		}
		else {
			echo "no data to display";
		}
		?>
	
	</body>
	
</html>