<?php 

include_once 'dbinc/dbdeals.php';

get_header(); ?>

<div class="content">
																	                    
	<?php 
		

		$record_per_page = 10;
$page = '';
if(isset($_GET["page"]))
{
 $page = $_GET["page"];
}
else
{
 $page = 1;
}

$start_from = ($page-1)*$record_per_page;

$query = "SELECT * FROM wp_deals ORDER BY deal_date DESC LIMIT $start_from, $record_per_page;";

		$result = mysqli_query($conn, $query);
		$resultCheck = mysqli_num_rows($result);
		
			
				

	if ($resultCheck > 0) { ?>
		<div class="deals_home deals_wrapper posts" id="posts"> <?php
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
		$page_query = "SELECT * FROM wp_deals ORDER BY deal_date DESC";
    $page_result = mysqli_query($conn, $page_query);
    $total_records = mysqli_num_rows($page_result);
    $total_pages = ceil($total_records/$record_per_page);
    $start_loop = $page;
    $difference = $total_pages - $page;
    $home_url = get_home_url();
    /*if($difference <= 5)
    {
     $start_loop = $total_pages - 10;
    }*/
    $end_loop = $start_loop + $difference;
    /*if($page > 1)
    {
     echo "<a href='".$home_url."?page=1'>First</a>";
     echo "<a href='".$home_url."?page=".($page - 1)."'><<</a>";
    }
    for($i=$start_loop; $i<=$end_loop; $i++)
    {     
     echo "<a href='".$home_url."?page=".$i."'>".$i."</a>";
    }
    if($page <= $end_loop)
    {
     echo "<a href='".$home_url."?page=".($page + 1)."'>>></a>";
     echo "<a href='".$home_url."?page=".$total_pages."'>Last</a>";
    }*/ ?>
    <div class="archive-nav"> <?php
    echo "<a href='".$home_url."?page=".($page - 1)."'>Newer Deals</a>";
    echo "<a href='".$home_url."?page=".($page + 1)."'>Older Deals</a>";
    ?></div> <?php
	}
/*echo do_shortcode('[ajax_load_more post_type="any"]');*/
	?>			

	
	<div class="clear"></div>
				
		
	</div><!-- .posts -->
	
	
		
</div><!-- .content -->
	              	        
<?php get_footer(); ?>