<?
    include 'shoppingCart.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>
    <head>
    	<title>Campus Clipper</title>
			<link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="css/index.css" />
            <link rel="stylesheet" type="text/css" href="css/item.css" />
			<script src="js/jquery-1.11.0.js"></script>
			<script src="js/jquery-ui-1.10.3.custom.js"></script>
			<script src="js/index.js"></script>
            <script src="js/item.js"></script>
	</head>
	<body>
    <header>
    <?include 'header.php'?>
    </header>
	<div class="main">
    <?
        //Make sure the item variable is set
        if(isset($_GET["item"])){
            //connect to the database
            include 'connectDB.php';
            //query the coupon info
            $query = "SELECT * FROM Coupon WHERE num = ".$_GET["item"].";";
            $result = mysql_query($query,$link);
    		$record = mysql_fetch_row($result);
        }
        //to show coupon information
?>
	    <div class="upper">
            <div class="mark">
                <? echo "<img src=\"$record[7]\">" ?>
                <? echo "<div>$record[2]&nbsp;|&nbsp;$record[3]</div>" ?>
            </div>
            <div class="intro">
                <? echo "<div>$record[1]</div>"?>
                <? echo "<p>$record[9]</p>"?>
            </div>
            <div class="func">
                <button class="btn" type="button" onclick="history.go(-1)">Go Back</button>      
                <? echo "<p>Login and add this coupon to your favorite!VVVVV</p>"?>
                <button id="add" lass="btn" type="button">Add Favorite</button>      
                <!--<button class="btn" type="button" onClick=window.open("showCoupon.php?item=1","mywindow","menubar=1,resizable=1,width=500,height=700"); value="Open child Window">Get coupon</button>-->
                <? echo "<button class=\"btn\" type=\"button\" onClick=window.open(\"showCoupon.php?path=$record[8]\",\"mywindow\",\"menubar=1,resizable=1,width=500,height=700\"); value=\"Open child Window\">Get coupon</button>"; ?>
            </div>
        </div>
        <div class="middle">
            <div class="alsolike">You may also like</div>
<?
            
            //To record how many coupons we queried so far
            $count = 0;
            //To record how many coupons we queried in each stage
            $num = 0;
            //To record the counpon number we got so far in order to avoid dulicate
            $used = array(0,0,0,0);
            
            //If the number of coupons we got is fewer than 4, we pick the coupons in the same catagory first
            if($num < 4){
                $query = "SELECT * FROM Coupon WHERE Category IN 
                (SELECT category FROM Coupon WHERE num = ".$_GET["item"].") 
                AND num <> ".$_GET["item"]." AND num <> ".$used[0]." AND num <> ".$used[1]." 
                AND num <> ".$used[2]." AND num <> ".$used[3].";";
                $result = mysql_query($query,$link);
                $num += mysql_num_rows($result);
            }
            //if count < num, then we can echo more items 
            while($record = mysql_fetch_row($result) and $count < 4 and $count < $num){
                echo "<div class=\"piece\">";
                echo "<a href=\"http://www.campusclipper.com/CCVersion2/item.php?item=$record[0]\">";
                echo "<img src=\"$record[7]\">";
                echo "</a>";
                echo "<div>$record[2]&nbsp;|&nbsp;$record[3]</div>";
                echo "</div>";
                $used[$count] = $record[0];
                $count++;
            }
            //if num is still lower than 4, pick up item from the same kind
            if($num < 4){
                $query = "SELECT * FROM Coupon WHERE kind IN 
                (SELECT kind FROM Coupon WHERE num = ".$_GET["item"].") 
                AND num <> ".$_GET["item"]." AND num <> ".$used[0]." AND num <> ".$used[1]." 
                AND num <> ".$used[2]." AND num <> ".$used[3].";";
                $result = mysql_query($query,$link);
                $num += mysql_num_rows($result);
            }
            while($record = mysql_fetch_row($result) and $count < 4 and $count < $num){
                echo "<div class=\"piece\">";
                echo "<a href=\"http://www.campusclipper.com/CCVersion2/item.php?item=$record[0]\">";
                echo "<img src=\"$record[7]\">";
                echo "</a>";
                echo "<div>$record[2]&nbsp;|&nbsp;$record[3]</div>";
                echo "</div>";
                $used[$count] = $record[0];
                $count++;
            }
            //if num is still lower than 4, pick up item from the same area
            if($num < 4){
                $query = "SELECT * FROM Coupon WHERE area IN 
                (SELECT area FROM Coupon WHERE num = ".$_GET["item"].") 
                AND num <> ".$_GET["item"]." AND num <> ".$used[0]." AND num <> ".$used[1]." 
                AND num <> ".$used[2]." AND num <> ".$used[3].";";
                $result = mysql_query($query,$link);
                $num += mysql_num_rows($result);
            }
            while($record = mysql_fetch_row($result) and $count < 4 and $count < $num){
                echo "<div class=\"piece\">";
                echo "<a href=\"http://www.campusclipper.com/CCVersion2/item.php?item=$record[0]\">";
                echo "<img src=\"$record[7]\">";
                echo "</a>";
                echo "<div>$record[2]&nbsp;|&nbsp;$record[3]</div>";
                echo "</div>";
                $used[$count] = $record[0];
                $count++;
            }
            //if num is still lower than 4, pick up any item other than pciked
            if($num < 4){
                $query = "SELECT * FROM Coupon WHERE num <> ".$_GET["item"]." 
                AND num <> ".$_GET["item"]." AND num <> ".$used[0]." AND num <> ".$used[1]." 
                AND num <> ".$used[2]." AND num <> ".$used[3].";";
                $result = mysql_query($query,$link);
                $num += mysql_num_rows($result);
            }
            while($record = mysql_fetch_row($result) and $count < 4 and $count < $num){
                echo "<div class=\"piece\">";
                echo "<a href=\"http://www.campusclipper.com/CCVersion2/item.php?item=$record[0]\">";
                echo "<img src=\"$record[7]\">";
                echo "</a>";
                echo "<div>$record[2]&nbsp;|&nbsp;$record[3]</div>";
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
                <!--
                <form class="form" action="<?echo $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="wrapper">
                    <div class="name2">cs1384
                    </div>
                    <div class="rating2">
                    Rating ( 5 is the best ) :
                    <input type="radio" name="rate" value="1">1
                    <input type="radio" name="rate" value="2">2
                    <input type="radio" name="rate" value="3">3
                    <input type="radio" name="rate" value="4">4
                    <input type="radio" name="rate" value="5">5
                    </div>
                    <input class="title2" size="50" type="text" name="title" value="Title">
                    <textarea rows="4" cols="100" class="text2" name="text" align="top">Comment</textarea>
                    </div>
                    <div class="subm1">
                        <input class="subm2" type="submit" name="submit1" value="Submit" id="submit">
                    </div>
                </form>
                -->
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

