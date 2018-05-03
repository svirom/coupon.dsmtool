<?php

global $wpdb;

if ( is_page('toys') ) {
    $category = 'toy';
} elseif ( is_page('cups') ) {
    $category = 'cup';
} elseif ( is_page('bells') ) {
    $category = 'bell';
}

$week_start = date( "Y-m-d", strtotime( 'last monday' ) );
$week_end = date( "Y-m-d", strtotime( 'this sunday' ) );

$prev_week_items = $wpdb->get_results( "SELECT * FROM `wp_deals` WHERE `deal_category`=$category AND `deal_date`<'$week_start';", ARRAY_N );
$curr_week_items = $wpdb->get_results( "SELECT * FROM `wp_deals` WHERE `deal_category`=$category AND `deal_date`>='$week_start' AND `deal_date`<=$week_end;", ARRAY_N );

if ( ! empty( $prev_week_items ) ) {
    foreach ( $prev_week_items as $item ) { ?>
        <div class="col-3 post-container">
            <div class="item post">
                <div class="img_wrap"><img src="<?php echo $item['deal_item_img']; ?>" alt=""></div>
                <h3 class='post-title'><?php echo $item['deal_item_title']; ?></h3>
                <p class='price_retail'>Retail price:<span>$<?php echo $item['deal_price_high']; ?></span>(<a href="<?php echo $item['deal_url_high']; ?>">click to view</a>)</p>
                <p class='price_deal'>Deal price:<span>$<?php echo $item['deal_price_deal']; ?></span></p>
                <a href="<?php echo $item['deal_url_deal']; ?>">View Deal</a>
            </div>
        </div>
    <?php }
} else { ?>
    <p>There were no deals previous week</p>
<?php }