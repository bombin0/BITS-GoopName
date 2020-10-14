<?php
  require "header.php";
?>

    <main>

          <!--
            Place main content in else if statement
          -->
          <?php
          if (!isset($_SESSION['id'])) {
            echo '<p class="login-status">Please Log in!</p>';
            ?>
                        <div class = "wrapper">
            <?php
            $sql = "SELECT * FROM products WHERE product_id='3';"; //select something from 'wish' table inside 'oeswishlist' database
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

            <p style="margin-top: 50px">Product Description</p>

          </div>
            <?php
          }

          else if (isset($_SESSION['id'])) {
            echo '<p class="login-status"> </p>';
            
            
            ?>

            
            <div class = "wrapper">
            <?php
            $sql = "SELECT * FROM products WHERE product_id='3';"; //select something from 'wish' table inside 'oeswishlist' database
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
                <br>
                <br>

                <p style="font-size=15px;">Upload an image of your space to see if this product is right for you:</p>
                <br>

                <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="please enter a name for this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>

                </div>

		            	<?php
              }
            
            }
            
            ?>

            <p style="margin-top: 50px">Product Description</p>
            <div>
            <form action="" method="post" style="margin-top: 50px">
            <input type="submit" name="addWishlist" value="Add to Wishlist"/>
            </form>
            <br>
<br>
<?php
          }
          //Stuck here, gotta fix this insert statement so that it goes into the wishlist database. INSERT INTO wishlist(name, price) VALUES ('Samsung TV', '500');
          if(isset($_POST['addWishlist'])){
            $sth = $conn->prepare(
            "INSERT INTO wishlist (product_id, name, image, price)
            SELECT product_id, name, image, price
            FROM products
            WHERE product_id='3';");
            $sth->execute();  

            echo 'Product added to wishlist.';
            }
          ?>
            </div>
            <div style="margin-top: 50px">


<?php
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

  	// image file directory
  	$target = "img/".basename($image);

  	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($conn, "SELECT * FROM images");
?>



          </div>
          </div>


    </main>


<?php
  require "footer.php";
?>
