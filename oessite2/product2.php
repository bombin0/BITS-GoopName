<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
    crossorigin="anonymous" />

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>

<title>Signup</title>
<link href = "oesstyle.css" rel = "stylesheet"/>

</head>

<body>

<nav class="navbar navbar-expand-md navbar-light static-top" style="background-color: #D8DBE2;">
    <div class="container">
    <a class="navbar-brand" href="#">
          <img src="OES.png" alt="">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="#" class="nav-item nav-link">Home</a>
                <a href="index.php" class="nav-item nav-link">Products</a>
				<a href="wishlist.php" class="nav-item nav-link">Wishlist</a>
                <a href="signup.php" class="nav-item nav-link">Account</a>

            </div>
        </div>
    </div>
</nav>

<div id="content">
<?php
  require "header.php";
?>

    <main>
		<div id = "logmess">
          <!--
            Place main content in else if statement
          -->
          <?php
          if (!isset($_SESSION['id'])) {
            echo '<p class="login-status">You are logged out!</p>';
          }

          else if (isset($_SESSION['id'])) {
            echo '<p class="login-status">You are logged in!</p>';
            ?>
            <form action="" method="post">
            <input class = "addwish" type="submit" name="addWishlist" value="add to wishlist"/>
            </form>
        </div>

            <?php
          }
          //Stuck here, gotta fix this insert statement so that it goes into the wishlist database. INSERT INTO wishlist(name, price) VALUES ('Samsung TV', '500');
          if(isset($_POST['addWishlist'])){
            $sth = $conn->prepare(
            "INSERT INTO wishlist (product_id, name, image, price)
            SELECT product_id, name, image, price
            FROM products
            WHERE product_id='2';");
            $sth->execute();

            echo '<p class = "addconfirm">Added to wishlist!</p>';
            }
          ?>

    </main>

<div class = "wrapper">
<?php
	$sql = "SELECT * FROM products WHERE product_id='2';"; //select something from 'wish' table inside 'oeswishlist' database
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

<p>Product Description</p>
</div>
</div>
<?php
  require "footer.php";
?>
