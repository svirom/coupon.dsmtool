<?php
/*
Template Name: Deals Page
*/
include_once 'dbinc/dbdeals.php';

get_header(); ?>

<div class="content">

		<?php

			if (is_page('toys')) {
				$sql = "SELECT * FROM wp_deals WHERE deal_category='toy' ORDER BY deal_date DESC;";
			}
			elseif (is_page('cups')) {
				$sql = "SELECT * FROM wp_deals WHERE deal_category='cup' ORDER BY deal_date DESC;";
			}
			elseif (is_page('bells')) {
				$sql = "SELECT * FROM wp_deals WHERE deal_category='bell' ORDER BY deal_date DESC;";
			}
			
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result); ?>

			<div class="page-title">
				<div class="section-inner">
					<?php the_title( '<h4>', '</h4>' ); ?>			
				</div><!-- .section-inner -->	
			</div>
				<?php

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
	
</div><!-- .content -->
								
<?php get_footer(); ?>
