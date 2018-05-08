<?php 
include_once 'dbinc/dbdeals.php';

$output = '';  
$deal_id = '';  
sleep(1);  
$last_deal = $_POST['last_deal_id'];
print_r($last_deal);

$sql = "SELECT * FROM wp_deals WHERE deal_id > '$last_deal' ORDER BY deal_date DESC LIMIT 10;";  
$result = mysqli_query($connect, $sql);  
if(mysqli_num_rows($result) > 0)  
{  
     while($row = mysqli_fetch_array($result))  
     {  
          $deal_id = $row["deal_id"];  
          echo "<div class='post-container'>";
          echo "<div class='item post'>";
          echo "<div class='img_wrap'><img src='". $row['deal_item_img'] ."' alt=''></div>";
          echo "<h3 class='post-title'>" . $row['deal_item_title'] . "</h3>";
          echo "<p class='price_retail'>Retail price:<span>$" . $row['deal_price_high'] . "</span>(<a href='". $row['deal_url_high'] ."'>click to view</a>)</p>";
          echo "<p class='price_deal'>Deal price:<span>$" . $row['deal_price_deal'] . "</span></p>";
          echo "<a href='". $row['deal_url_deal'] ."'>View Deal</a>";
          echo "</div>";
          echo "</div>";
     }  ?>
     <div id="remove_row">
               <button type="button" name="btn_more" data-deal="<?php echo $deal_id; ?>" id="btn_more" class="btn">more</button>
          </div>
          <?php 
}  
?>