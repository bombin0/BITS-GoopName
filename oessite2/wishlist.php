<?php
  require "header.php";
?>

    <main>

          <!--
            Place main content in else if statement
          -->
          <?php
          if (!isset($_SESSION['id'])) {
			echo '<p class="login-status">To use the Wishlist you must Log in</p>';
			
          }

          else if (isset($_SESSION['id'])) {
			echo '<p class="login-status">Here is your Wishlist:</p>';
			?>
			<br>
			<div class = "wishlist-status">

<form action="" method="post">
	<input class="delWish" type="submit" name="delete" value="Clear Wishlist"/>
</form>
<br>
<?php
	if (isset($_POST['delete'])) {
	$sth = $conn->prepare(
	"DELETE FROM wishlist");
	$sth->execute();
	echo '<p class = "addconfirm">No items</p>';
	}
?>

</div>
			<?php
			
			?>
			<br>
			<div class = "wrapper">
<?php
	$sql = "SELECT * FROM wishlist;"; //select something from 'wish' table inside 'oeswishlist' database
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result); //check if there's a result

	if ($resultCheck > 0) { //only spits out data whilst there's data in the database, aka if there're still results from resultCheck
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<div>
			<table style="border:1px solid black;margin-left:auto;margin-right:auto;padding:10px;">
			<tr>
				<td class = "wishimage"><?php echo '<img src = "data:image;base64,'.base64_encode($row['image']).'" alt = "Image" style = "max-width: 200px; width: auto; height: auto;">';?></td>
			</tr>
			<tr>
				<td class = "wishname"><?php echo $row['name'] . "<br>"; ?></td>
			</tr>
			<tr>
				<td class = "wishprice"><?php echo "$" . $row['price'] . "<br>"; ?></td>
			</tr>
			<tr>
				<td class = "productLink"><a href= "product<?php echo $row['product_id']?>.php">View Product</a>
			</tr>
			</table>
			</div>
			<?php
		}
	}
?>
</div>
			<?php

          }
          ?>

    </main>



<?php
  require "footer.php";
?>
