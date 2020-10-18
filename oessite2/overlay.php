
<!--  -->

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
            $sql = "SELECT * FROM products WHERE product_id='1';"; //select something from 'wish' table inside 'oeswishlist' database
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
            $sql = "SELECT * FROM products WHERE product_id='1';"; //select something from 'wish' table inside 'oeswishlist' database
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

<!-- This point here is the the OL function starts -->
<body>


<div class="container p-3 my-3" >
  <div id="content" class= "p-5 my-3">

<div class="row">
  
  <div class="col border">
    
    
    <div>Hi, to use the image overlay function correctly please upload an image that fites the requirements, otherwise it won't look right!</div>
  <div class = "mt-2">-Please stand rougly one metter back from your desired location</div>
  <div class = "mt-2">-Position your your camera straight on with your desired location when you take the image. (At a flat angle)</div>
    
  </div>

  
  <div class="col border">
    
  
<!-- Containers -->
    <div class = "container.fluid"> 
      <div id="imageHolder" class= "p-3 "  >
        <?php
            $sql = "SELECT * FROM products WHERE product_id='1';"; //select something from 'wish' table inside 'oeswishlist' database
	          $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result); //check if there's a result
            if ($resultCheck > 0) { //only spits out data whilst there's data in the database
              while ($row = mysqli_fetch_assoc($result)) {
                ?>
			          <div>
                  <table>
                    <tr>
                      <!-- Display the image where product ID is 1 in the db -->
                      <td><?php echo '<img id ="model" src = "data:image;base64,'.base64_encode($row['image']).'" alt = "Image" style = "max-width: 200px; width: auto; height: auto;">';?>
              </div>
    

  </div>
</div>

</body>









<?php
  require "footer.php";
?>
