<?php
	
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "oeswishlist";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); //connects to the database

?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
	<meta charset ="utf-8" />
	<meta name = "description" content = "HTML, OESWishlist"  />
	<meta name = "keywords" content = "HTML, Wishlist" />
	<meta name = "author" content = "s3821420 Marcus Lew" />
	<title>OES - Wishlist</title>
</head>

<style>
	@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
	
	* { 
		font-family: 'Montserrat', sans-serif;
	}
	
	.pagecontain {
		max-width: 1300px;
		margin: 0 auto;
	}
	
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

<div class = "pagecontain">


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

</html>