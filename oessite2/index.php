<?php
  require "header.php";
?>

    <main>

          <!--
            Place main content in else if statement
          -->
          <?php
          if (!isset($_SESSION['id'])) {
            echo '<p class="login-status">Please Log in or Sign up</p>';
          }

          else if (isset($_SESSION['id'])) {
			?>
			<div class="login-status">
			  <p>Welcome,</p> <?php echo $_SESSION['uid']?>
		  </div>
			<?php
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
				<br>
			<table style="border:1px solid black;margin-left:auto;margin-right:auto;padding:10px;">
			<tr>
				<td><?php echo '<img src = "data:image;base64,'.base64_encode($row['image']).'" alt = "Image" style = "max-width: 200px; width: auto; height: auto;">';?></td>
			</tr>
			<tr>
				<td><?php echo $row['name'] . "<br>"; ?></td>
			</tr>
			<tr>
				<td><?php echo "$" . $row['price'] . "<br>"; ?></td>
			</tr>
			<tr>
				<td><a href= "product<?php echo $row['product_id']?>.php">View Product</a>
			</tr>
			</table>
			<br>
			</div>
			<?php
		}
	}
?>
</div>

<?php
  require "footer.php";
?>
