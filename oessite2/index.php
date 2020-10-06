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

          }
          ?>

    </main>

<div class = "wrapper">
<?php
	$sql = "SELECT * FROM products;"; //select something from 'wish' table inside 'oeswishlist' database
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
			<tr>
				<td class = "productLink"><a href= "product<?php echo $row['product_id']?>.php">Link To Product Page</a>
			</tr>
			</table>
			</div>
			<?php
		}
	}
?>
</div>

<?php
  require "footer.php";
?>
