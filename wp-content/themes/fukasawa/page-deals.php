<?php
/*
Template Name: Deals Page
*/
include_once 'dbinc/dbdeals.php';

get_header(); ?>

<div class="content">

		<?php

			if (is_page('toys')) {
				//$sql = "SELECT * FROM wp_deals WHERE deal_category='toy' ORDER BY deal_date DESC;";
				$category = 'toy';
			}
			elseif (is_page('cups')) {
				//$sql = "SELECT * FROM wp_deals WHERE deal_category='cup' ORDER BY deal_date DESC;";
				$category = 'cup';
			}
			elseif (is_page('bells')) {
				//$sql = "SELECT * FROM wp_deals WHERE deal_category='bell' ORDER BY deal_date DESC;";
				$category = 'bell';
			}

			$week_curr = date( "Y-m-d", strtotime( 'last monday' ) );
			//echo "<p class='week_last'>". $week_curr ."</p>";
			$week_prev = date( "Y-m-d", strtotime( 'previous monday -1 week' ) );
			//echo "<p class='week_prev'>". $week_prev ."</p>";
			$week_next = date( "Y-m-d", strtotime( 'next monday' ) );
			//echo "<p class='week_next'>". $week_next ."</p>"; 
			//$deal_curr = date( "Y-m-d", strtotime( 'today' ) );
			//print_r($deal_curr);

			/*$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);*/

			$sql_curr = "SELECT * FROM wp_deals WHERE deal_date>='$week_curr' AND deal_date<'$week_next' AND deal_category='$category';";
			$sql_prev = "SELECT * FROM wp_deals WHERE deal_date>='$week_prev' AND deal_date<'$week_curr' AND deal_category='$category';";
			$sql_archive = "SELECT * FROM wp_deals WHERE deal_date<'$week_prev' AND deal_category='$category';";

			/*print_r($category);*/

			$result_curr = mysqli_query($conn, $sql_curr);
			$result_prev = mysqli_query($conn, $sql_prev);
			$result_archive = mysqli_query($conn, $sql_archive);

			$resultCheck_curr = mysqli_num_rows($result_curr);
			$resultCheck_prev = mysqli_num_rows($result_prev);
			$resultCheck_archive = mysqli_num_rows($result_archive);
			/*print_r($resultCheck_archive);*/
			?>

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
				if ($resultCheck_curr > 0) {
					/*$curr_week = strtotime("last monday");*/ //the beginning of current week
					/*$next_week = strtotime("next monday");*/ //the beginning of next week
					
					while ($row = mysqli_fetch_assoc($result_curr)) {
						/*$deal_curr = $row['deal_date'];*/
						/*if ( ($week_curr <= $deal_curr) && ($deal_curr < $week_next) ) {*/
							echo "<div class='col-3 post-container'>";
							echo "<div class='item post'>";
							echo "<div class='img_wrap'><img src='". $row['deal_item_img'] ."' alt=''></div>";
							echo "<h3 class='post-title'>" . $row['deal_item_title'] . "</h3>";
							echo "<p class='price_retail'>Retail price:<span>$" . $row['deal_price_high'] . "</span>(<a href='". $row['deal_url_high'] ."'>click to view</a>)</p>";
							echo "<p class='price_deal'>Deal price:<span>$" . $row['deal_price_deal'] . "</span></p>";
							echo "<a href='". $row['deal_url_deal'] ."'>View Deal</a>";
							echo "</div>";
							echo "</div>";	
						/*}*/
					}
				} else {
							echo "<p>There are no deals this week</p>";
						} ?>
			</div>

			<div class="deals_wrapper posts" id="prevWeek">	
			 <?php
				if ($resultCheck_prev > 0) {
					/*$curr_week = strtotime("last monday");*/ //the beginning of current week
					/*$next_week = strtotime("next monday");*/ //the beginning of next week
					
					while ($row = mysqli_fetch_assoc($result_prev)) {
						/*$deal_curr = $row['deal_date'];*/
						/*if ( ($week_prev <= $deal_curr) && ($deal_curr < $week_curr) ) {*/
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
					/*}*/
				} else {
							echo "<p>There are no deals previous week</p>";
						} ?>
			</div>

			<div class="deals_wrapper posts" id="archiveWeek">	
			<?php
				if ($resultCheck_archive > 0) {
					/*$curr_week = strtotime("last monday");*/ //the beginning of current week
					/*$next_week = strtotime("next monday");*/ //the beginning of next week
					
					while ($row = mysqli_fetch_assoc($result_archive)) {
						/*$deal_curr = $row['deal_date'];*/
												
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
