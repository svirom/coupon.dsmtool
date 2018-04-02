<?php
/*
Template Name: Deals Page
*/
include_once 'dbinc/dbdeals.php';

get_header(); ?>
<style type="text/css">
	.item { margin-bottom: 3px; padding: 10px; border: 1px solid #ddd; }
	.item p { margin-bottom: 0.1em; }
	.item h3 { padding: 0; }
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
					echo "<div class='item'>";
					echo "<p>" . $row['deal_category'] . "<h3>" . $row['deal_item_title'] . "</p></h3>";
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
