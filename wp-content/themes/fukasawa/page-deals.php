<?php
/*
Template Name: Deals Page
*/
include_once 'dbinc/dbdeals.php';

get_header(); ?>

<div class="content">

<?php

	if (is_page('toys')) {
		$category = 'toy';
	}
	elseif (is_page('cups')) {
		$category = 'cup';
	}
	elseif (is_page('bells')) {
		$category = 'bell';
	}

	$week_curr = date( "Y-m-d", strtotime( 'last monday' ) );
	$week_prev = date( "Y-m-d", strtotime( 'previous monday -1 week' ) );
	$week_next = date( "Y-m-d", strtotime( 'next monday' ) );

	//echo "<p class='week_curr'>Week current: ". $week_curr ."</p>";
	//echo "<p class='week_prev'>Week previous: ". $week_prev ."</p>";
	//echo "<p class='week_next'>Week next: ". $week_next ."</p>"; 

	$sql_curr = "SELECT * FROM wp_deals WHERE deal_date>='$week_curr' AND deal_date<'$week_next' AND deal_category='$category' ORDER BY deal_date DESC;";
	$sql_prev = "SELECT * FROM wp_deals WHERE deal_date>='$week_prev' AND deal_date<'$week_curr' AND deal_category='$category' ORDER BY deal_date DESC;";
	$sql_archive = "SELECT * FROM wp_deals WHERE deal_date<'$week_prev' AND deal_category='$category' ORDER BY deal_date DESC;";

	$result_curr = mysqli_query($conn, $sql_curr);
	$result_prev = mysqli_query($conn, $sql_prev);
	$result_archive = mysqli_query($conn, $sql_archive);

	$resultCheck_curr = mysqli_num_rows($result_curr);
	$resultCheck_prev = mysqli_num_rows($result_prev);
	$resultCheck_archive = mysqli_num_rows($result_archive);
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
			while ($row = mysqli_fetch_assoc($result_curr)) {
				?>
				<div class="post-container">
					<div class="item post">
						<div class="img_wrap">
							<img src="<?php echo $row['deal_item_img']; ?>" alt="">
						</div>
						<h3 class="post-title"><?php echo $row['deal_item_title']; ?></h3>
						<p class="price_retail">Retail price:
							<span>$<?php echo $row['deal_price_high']; ?></span>
							(<a href="<?php echo $row['deal_url_high']; ?>">click to view</a>)
						</p>
						<p class="price_deal">Deal price:
							<span>$<?php echo $row['deal_price_deal']; ?></span>
						</p>
						<a href="<?php echo $row['deal_url_deal']; ?>">View Deal</a>
					</div>
				</div> <?php
			}
		} else {
				echo "<p>There are no deals this week</p>";
			} ?>
	</div>

	<div class="deals_wrapper posts" id="prevWeek">	
	 <?php
		if ($resultCheck_prev > 0) {					
			while ($row = mysqli_fetch_assoc($result_prev)) {
				?>
				<div class="post-container">
					<div class="item post">
						<div class="img_wrap">
							<img src="<?php echo $row['deal_item_img']; ?>" alt="">
						</div>
						<h3 class="post-title"><?php echo $row['deal_item_title']; ?></h3>
						<p class="price_retail">Retail price:
							<span>$<?php echo $row['deal_price_high']; ?></span>
							(<a href="<?php echo $row['deal_url_high']; ?>">click to view</a>)
						</p>
						<p class="price_deal">Deal price:
							<span>$<?php echo $row['deal_price_deal']; ?></span>
						</p>
						<a href="<?php echo $row['deal_url_deal']; ?>">View Deal</a>
					</div>
				</div> <?php	
			}
		} else {
				echo "<p>There are no deals previous week</p>";
			} ?>
	</div>

	<div class="deals_wrapper posts" id="archiveWeek">	
	<?php
		if ($resultCheck_archive > 0) {					
			while ($row = mysqli_fetch_assoc($result_archive)) {								
				?>
				<div class="post-container">
					<div class="item post">
						<div class="img_wrap">
							<img src="<?php echo $row['deal_item_img']; ?>" alt="">
						</div>
						<h3 class="post-title"><?php echo $row['deal_item_title']; ?></h3>
						<p class="price_retail">Retail price:
							<span>$<?php echo $row['deal_price_high']; ?></span>
							(<a href="<?php echo $row['deal_url_high']; ?>">click to view</a>)
						</p>
						<p class="price_deal">Deal price:
							<span>$<?php echo $row['deal_price_deal']; ?></span>
						</p>
						<a href="<?php echo $row['deal_url_deal']; ?>">View Deal</a>
					</div>
				</div> <?php
			}
		} else {
				echo "<p>There are no deals in archive</p>";
			} ?>
	</div>	

	<div class="clear"></div>
	
</div><!-- .content -->
								
<?php get_footer(); ?>
