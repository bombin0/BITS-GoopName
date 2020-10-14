<?php
  require "header.php";
?>

    <main>

    <?php
          if (!isset($_SESSION['id'])) {
            echo '<p class="login-status">You are logged out!</p>';
          }

          else if (isset($_SESSION['id'])) {
			  
			echo '<p class="login-status">Account Details</p>';
			
			?>
			<div>
			<table class = "account" style="font-size:25px;margin-left:100px;">
			<tr>
				<td class = "accountUsername"><?php echo "Username: " . $_SESSION['uid'] . "<br>". "<br>"; ?></td>
			</tr>
			<tr>
				<td class = "accountEmail"><?php echo "Email Address: " . $_SESSION['email'] . "<br>". "<br>"; ?></td>
			</tr>
			<tr>
				<td class = "accountPhone"><?php echo "Phone Number: " . $_SESSION['phone'] . "<br>". "<br>"; ?></td>
			</tr>
			</table>
			</div>
			<?php

          }
          ?>


    </main>

<div class = "wrapper">

</div>

<?php
  require "footer.php";
?>
