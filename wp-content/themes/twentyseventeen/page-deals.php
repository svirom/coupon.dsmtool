<?php
/*
Template Name: Deals Page
*/
include_once 'dbinc/dbdeals.php';

get_header(); ?>
<style type="text/css">
	
</style>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

			if (is_page('toys')) {
				$sql = "SELECT * FROM wp_deals WHERE deal_category='toy';";
			}
			elseif (is_page('cups')) {
				$sql = "SELECT * FROM wp_deals WHERE deal_category='cup';";
			}
			elseif (is_page('bells')) {
				$sql = "SELECT * FROM wp_deals WHERE deal_category='bell';";
			}
			
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck > 0) { ?>
				<div class="toy_wrapper"> <?php
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<div class='col-3'>";
					echo "<div class='item'>";
					echo "<div class='img_wrap'><img src='". $row['deal_item_img'] ."' alt=''></div>";
					echo "<h3>" . $row['deal_item_title'] . "</h3>";
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

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
