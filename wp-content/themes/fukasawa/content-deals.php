<?php

	include_once 'dbinc/dbdeals.php';

	$sql = "SELECT * FROM wp_deals ORDER BY deal_date DESC;";

	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck > 0) { ?>
		<div class="toy_wrapper posts" id="posts"> <?php
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<div class='col-3 post-container'>";
			echo "<div class='item post'>";
			echo "<div class='img_wrap'><img src='". $row['deal_item_img'] ."' alt=''></div>";
			echo "<h3 class='post-title'>" . $row['deal_item_title'] . "</h3>";
			echo "<p class='price_retail'>Retail price:<span>$" . $row['deal_price_high'] . "</span>(<a href='". $row['deal_url_high'] ."'>click to view</a>)</p>";
			echo "<p class='price_deal'>Deal price:<span>$" . $row['deal_price_deal'] . "</span></p>";
			echo "<a href='". $row['deal_url_deal'] ."'>View Deal</a>";
			echo "</div>";
			echo "</div>";
		} ?>
		</div>
		<?php
	}

	?>			

	
	<div class="clear"></div>