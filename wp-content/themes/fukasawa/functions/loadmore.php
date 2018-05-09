<?php
//global $wpdb;
//include_once 'dbdeals.php';
function true_load_posts(){
	//include_once 'dbinc/dbdeals.php';

//$output = '';  
//$deal_id = '';  
/*sleep(1);  */
$last_deal = $_POST['last_deal_id'];
//print_r($last_deal);
//$select = $wpdb->get_results( "SELECT * FROM wp_deals ORDER BY deal_date DESC LIMIT 5;", ARRAY_N );
$connect = mysqli_connect("localhost", "root", "", "coupon.dsmtool");  
$sql = "SELECT * FROM wp_deals ORDER BY deal_date DESC LIMIT 10;";  
$res = mysqli_query($connect, $sql); 
$resCheck = mysqli_num_rows($res); 
/*if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 
echo "Connected successfully";*/
//print_r($last_deal);
if ($resCheck > 0) {
	while($row = mysqli_fetch_array($res)) {
    ?>
        <div class="post-container">
        	<div class="item post">
        		<div class='img_wrap'>
        			<img src='<?php $row['deal_item_img']; ?>' alt=''>
        		</div>
          		<h3 class='post-title'><?php echo $row['deal_item_title']; ?></h3>
          		<p class='price_retail'>Retail price:<span>$<?php $row['deal_price_high']; ?></span>(<a href='<?php $row['deal_url_high']; ?>'>click to view</a>)</p>
          		<p class='price_deal'>Deal price:<span>$<?php $row['deal_price_deal']; ?></span></p>
          		<a href='<?php $row['deal_url_deal']; ?>'>View Deal</a>
        	</div>
        </div>
  <?php
  	} ?>
  		<div id="remove_row">
            <button type="button" name="btn_more" data-deal="<?php echo $last_deal + 1; ?>" id="btn_more" class="btn">more</button>
        </div> <?php
} else { ?>
	<div class="post-container">
            <div class="item post">
                <p>Nothing</p>
            </div>
        </div>
<?php }

wp_reset_postdata();
	die();
}
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');