<?
    include 'shoppingCart.php';
    //Make sure the product variable is set
    if(!isset($_GET["product"])){
        header('Location:http://www.campusclipper.com/CCVersion2/shopping.php'); 
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>
    <head>
    	<title>Campus Clipper</title>
			<link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="css/index.css" />
            <link rel="stylesheet" type="text/css" href="css/product.css" />
            
			<script src="js/jquery-1.11.0.js"></script>
			<script src="js/jquery-ui-1.10.3.custom.js"></script>
			<script src="js/index.js"></script>
            <script src="js/product.js"></script>
	</head>
	<body>
    <header>
    <?include 'header.php'?>
    </header>
	<div class="main">
    <?
        
        //connect to the database
        include 'connectDB.php';
        //query the product info
        $query = "SELECT * FROM items WHERE enum = ".$_GET["product"].";";
        $result = mysql_query($query,$link);
    	$record = mysql_fetch_row($result);
        //to show product information
?>
	    <div class="upper">
            <div class="mark">
                <? echo "<img src=\"$record[3]\">" ?>
                <? echo "<div>perhaps camera roll </div>" ?>
            </div>
            <div class="intro">
                <? echo "<div>$record[1]</div>"?>
                <? echo "<p>$record[11]</p>"?>
            </div>
            <div class="func">
                <button class="btn" type="button" onclick="history.go(-1)">Go Back</button>
                <div class="sele">Qty:
                <select class="qty">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                </div>
                <button id="add" class="btn" type="button">Add to bag</button>
                <!--
                <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
                -->
                <button class="btn" type="button" onClick="location.href='http://www.campusclipper.com/CCVersion2/bag.php'">Check bag</button>
            </div>
        </div>
        <div class="middle">
            <div class="alsolike">You may also like</div>
<?
            
            //To record how many product we queried so far
            $count = 0;
            //To record how many product we queried in each stage
            $num = 0;
            //To record the product number we got so far in order to avoid dulicate
            $used = array(-1,-1,-1,-1);
            
            //If the number of porduct we got is fewer than 4, we pick the product with same attributes
            if($num < 4){
                $query = "SELECT * FROM items WHERE 1";
                if($record[5]==1){
                        $query = $query." OR men = 1";
                }
                if($record[6]==1){
                        $query = $query." OR women = 1";
                }
                if($record[7]==1){
                        $query = $query." OR top = 1";
                }
                if($record[8]==1){
                        $query = $query." OR bot = 1";
                }
                if($record[9]==1){
                        $query = $query." OR acce = 1";
                }
                if($record[10]==1){
                        $query = $query." OR gadg = 1";
                }
                $query = $query." AND enum <> ".$_GET["product"]." AND enum <> ".$used[0]." AND enum <> ".$used[1]." 
                AND enum <> ".$used[2]." AND enum <> ".$used[3].";";
                $result = mysql_query($query,$link);
                $num += mysql_num_rows($result);
            }
            //if count < num, then we can echo more items 
            while($record2 = mysql_fetch_row($result) and $count < 4 and $count < $num){
                echo "<div class=\"piece\">";
                echo "<a href=\"http://www.campusclipper.com/CCVersion2/product.php?product=$record2[0]\">";
                echo "<img src=\"$record2[3]\">";
                echo "</a>";
                echo "<div>$record2[1]&nbsp;|&nbsp;$record2[2]</div>";
                echo "</div>";
                $used[$count] = $record2[0];
                $count++;
            }
            //if num is still lower than 4, pick up item that is new
            if($num < 4){
                $query = "SELECT * FROM items WHERE new = 1 AND enum <> ".$_GET["product"]." 
                AND enum <> ".$used[0]." AND enum <> ".$used[1]." AND enum <> ".$used[2]." AND enum <> ".$used[3].";";
                $result = mysql_query($query,$link);
                $num += mysql_num_rows($result);
            }
            while($record = mysql_fetch_row($result) and $count < 4 and $count < $num){
                echo "<div class=\"piece\">";
                echo "<a href=\"http://www.campusclipper.com/CCVersion2/product.php?product=$record2[0]\">";
                echo "<img src=\"$record2[3]\">";
                echo "</a>";
                echo "<div>$record2[1]&nbsp;|&nbsp;$record2[2]</div>";
                echo "</div>";
                $used[$count] = $record[0];
                $count++;
            }
            //if num is still lower than 4, pick up any item other than pciked
            if($num < 4){
                $query = "SELECT * FROM items WHERE enum <> ".$_GET["item"]." AND enum <> ".$used[0]." 
                AND enum <> ".$used[1]." AND enum <> ".$used[2]." AND enum <> ".$used[3].";";
                $result = mysql_query($query,$link);
                $num += mysql_num_rows($result);
            }
            while($record = mysql_fetch_row($result) and $count < 4 and $count < $num){
                echo "<div class=\"piece\">";
                echo "<a href=\"http://www.campusclipper.com/CCVersion2/product.php?product=$record2[0]\">";
                echo "<img src=\"$record2[3]\">";
                echo "</a>";
                echo "<div>$record2[1]&nbsp;|&nbsp;$record2[2]</div>";
                echo "</div>";
                $used[$count] = $record[0];
                $count++;
            }
            //lower level, ajax for the user's review
?>
        </div>
        <div class="lower">
            <div>
                <div class="randr">Rating and Review</div>
                <button id="reviewB" class="btn1" type="button" >Write a Review</button>      
            </div>
            <div class="load">
            </div>
            <div>
                <button id="backB" class="btn2" type="button" >Back</button>
                <button id="nextB" class="btn2" type="button" >Next</button>      
            </div>
        </div>
	</div>

	<!--company info-->
	<div class="bottom">
		<?include 'footer.php'?>
    </div>

	</body>


</html>

