<?php
	//login to database 
	$dbconnect = mysqli_connect("localhost","root","","animals") OR die(mysqli_connect_error());
	
	//access product data table
	$sql = "SELECT * FROM itemsforsale";
	
	//create query to execute sql on database
	$query = mysqli_query($dbconnect, $sql);
?>


<html>
<head>
	<title>Product Listing</title>
  <link href="style.css" rel="stylesheet" >
</head>
<body>
  <header class="main-header">
    <a class="logo" href="#"></a>
    <ul class="main-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="#">About</a></li>
      <li class="dropdown">
        <a href="#">Work</a>
        <ul class="drop-nav">
          <li><a href="#">Design</a></li>
          <li><a href="#">Development</a></li>
          <li class="flyout">
            <a href="#">Photography</a>
            <ul class="flyout-nav">
              <li><a href="#">Nature</a></li>
              <li><a href="#">People</a></li>
              <li><a href="#">Pets</a></li>         
            </ul>
          </li>
          <li><a href="#">Writing</a></li>       
        </ul>
      </li>
      <li><a href="#">Contact</a></li>
    </ul>
  </header>
  
  <h1>Product Listing</h1> 
  
    
	<ul class="product">
	
	<?php
	//create conditional statement to display data
	if($query){
		//loop each record
		while ($record = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			//create variables for each field
			$itemid = $record["item_id"];
			$itemname = $record["item_name"];
			$itemdesc = $record["item_desc"];
			$itemtype = $record["item_type"];
			$itemprice = $record["item_price"];
			$itemimg = $record["item_img"];
	?>
		<li>
			<!-- creating link to detailed page with ID parameter: selected -->
			<a href="detailed.php?selected=<?php echo $itemid; ?>">
				<img src="images/<?php echo $itemimg; ?>" width="200" height="200" />
			</a>
			<h4><?php echo $itemname; ?></h4>
			<p><?php echo $itemdesc; ?></p>
			<h5>Type: <?php echo $itemtype; ?></h5>
			<h5>Price: $<?php echo $itemprice; ?>USD</h5>
		</li>
		
	<?php
		}
	}
	else{
		echo "Something not right with that query hoss...";
	}
  
  ?>
	
   </ul>
  
  
  
  
  
  
  
  
</body>
</html>