<?php
  require "header.php";
?>

    <main>

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
            <input type="submit" name="addWishlist" value="add to wishlist"/>
            </form>
            
            
            <?php
          }
          //Stuck here, gotta fix this insert statement so that it goes into the wishlist database. INSERT INTO wishlist(name, price) VALUES ('Samsung TV', '500');
          if(isset($_POST['addWishlist'])){
            $sth = $conn->prepare(
            "INSERT INTO wishlist (product_id, name, image, price)
            SELECT product_id, name, image, price
            FROM products
            WHERE product_id='4';");
            $sth->execute();  

            echo 'button works!';
            }
          ?>

    </main>

<div class = "wrapper">
<?php
	$sql = "SELECT * FROM products WHERE product_id='4';"; //select something from 'wish' table inside 'oeswishlist' database
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

<?php
  require "footer.php";
?>
