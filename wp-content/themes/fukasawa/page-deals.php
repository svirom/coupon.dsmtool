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

			$sql_date = "SELECT deal_date FROM wp_deals;";
			$result_date = mysqli_query($conn, $sql_date);
			//$row = mysqli_fetch_assoc($result_date);
			while ($row = mysqli_fetch_assoc($result_date)) {
				$d = strtotime($row['deal_date']);
				print_r($row['deal_date']);
				echo '<br>';
				echo "<p>". gettype($row['deal_date']) ."</p>";
				echo "<p>". date("d-m-Y", $d) ."</p>";
			}
			echo gettype($row['deal_date']);
			
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result); ?>

			<div class="page-title">
				<div class="section-inner">
					<?php the_title( '<h4>', '</h4>' ); ?>			
				</div><!-- .section-inner -->	
			</div>

			<div class="filter_date">
				<a href="#currWeek" class="filter_choose active"><p>Current week</p></a>
				<a href="#prevWeek" class="filter_choose"><p>Previous week</p></a>
				<a href="#archiveWeek" class="filter_choose"><p>Archive</p></a>
				<div class="clear"></div>
			</div>
				
			<div class="deals_wrapper posts" id="currWeek">	
			 <?php
				if ($resultCheck > 0) {
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
					}
				} else {
					echo "<p>There are no deals this week</p>";
				} ?>
			</div>

			<div class="deals_wrapper posts" id="prevWeek">	
			 <?php
				if ($resultCheck1 > 0) {
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
					}
				} else {
					echo "<p>There were no deals previous week</p>";
				} ?>
			</div>

			<div class="deals_wrapper posts" id="archiveWeek">	
			 <?php
				if ($resultCheck2 > 0) {
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
					}
				} else {
					echo "<p>There are no deals in archive</p>";
				} ?>
			</div>			

	
	<div class="clear"></div>
	
</div><!-- .content -->
								
<?php get_footer(); ?>
