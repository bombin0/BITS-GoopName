<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>GroopName - Assignment 3</title>
    <meta name = "author" content = "AR-TH-930-GroopName">
    <meta name = "description" content = "AR-TH-930-GroopName Assignment 3 for Building IT Systems">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "oeswishlist";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); //connects to the database

?>

<style>

	.wrapper {
		display: grid;
		grid-template-columns: repeat(3, 1fr);
		grid-gap: 15px;
	}

	.wishtable {
		border: 1px solid black;
		width: 200px;
		height: 300px;
	}

	.wishname {
		font-size: 130%;
		text-align: bottom;
	}

	.wishprice {
		font-size: 120%;
	}
</style>

<body>
<div class = "header">
  <header>
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <img class="w3-bar-item w3-wide" src = "assets/img/OES.png" alt = "OES" style="width:8%">
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="product.php" class="w3-bar-item w3-button">Products</a>
      <a href="wishlist.php" class="w3-bar-item w3-button">Wishlist</a>
      <a href="account.php" class="w3-bar-item w3-button">Account</a>
    </div>
  </header>
</div>
<div class = "pagecontain">
<br><br><br><br>
<h1>Wishlist</h1>

<!-- Selecting data -->
<div class = "wrapper">
<?php
	$sql = "SELECT * FROM wish;"; //select something from 'wish' table inside 'oeswishlist' database
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result); //check if there's a result

	if ($resultCheck > 0) { //only spits out data whilst there's data in the database, aka if there're still results from resultCheck
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<div>
			<table class = "wishtable">
			<tr>
				<td class = "wishimage"><?php echo '<img src = "data:image;base64,'.base64_encode($row['image']).'" alt = "Image" style = "max-width: 200px; width: auto; height: auto;">';?></td>
			</tr>
			<tr>
				<td class = "wishname"><?php echo $row['name'] . "<br>"; ?></td>
			</tr>
			<tr>
				<td class = "wishprice"><?php echo "$" . $row['price'] . "<br>"; ?></td>
			</tr>
			</table>
			</div>
			<?php
		}
	}
?>
</div>

</div>
</body>

<footer>
    <p>&#169;2020 OES - Online Electronic Store</p>
  </footer>
</html>
