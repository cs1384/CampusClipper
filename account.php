<?
    session_start();
    
    //if both cookie and session are not set, then forward the user to login page
    if(!isSet($_COOKIE['CCusername']) && !isSet($_SESSION['CCusername'])){
        header('Location:http://www.campusclipper.com/CCVersion2/login.php');    
    }else{
        //if session was set, get session value as in preference
        if(isSet($_SESSION['CCusername'])){
            $email = $_SESSION['CCuseremail'];
            $CCmsg = $_SESSION['CCmsg'];
        }
        //get cookie value if session not available
        else{
            $email = $_COOKIE['CCuseremail'];
            $CCmsg = $_COOKIE['CCmsg'];
        }
        //connect to database
        include 'connectDB.php';
        
        //filter out the logged in member
        $query = "SELECT * FROM Member WHERE email = \"".$email."\";";
        $result = mysql_query($query,$link);
        $record = mysql_fetch_row($result);
        //check if the security code are matched, forwarded to login page if not
        if($CCmsg != $record[9]){
            header('Location:http://www.campusclipper.com/CCVersion2/login.php');
        }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
    <head>
        <title>Campus Clipper</title>
			<link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="css/index.css" />
            <link rel="stylesheet" type="text/css" href="css/account.css" />
            
			<script src="js/jquery-1.11.0.js"></script>
			<script src="js/jquery-ui-1.10.3.custom.js"></script>
			<script src="js/index.js"></script>
	</head>
	<body>
        <header>
            <?include 'header.php'?>
        </header>
        <div class="controlPanel">
            <p>Hi, <?echo $record[1]?></p>
            <button onClick="location.href='unsetCookie.php'" type="button">Log out</button>
            <button onClick="location.href='deleteAccount.php'" type="button">Delete account</button>
            <button  type="button" onClick="location.href='changePassword.php'">Change password</button>
        </div>
        <div class="showCoupon">
            <p>Your favorites...</p>
<?
            //query the favorite items of the logged in user
            $query = "SELECT * FROM Favorite WHERE email = \"".$email."\" ORDER BY time DESC;";
            $result = mysql_query($query,$link);
            //echo html code for each favored item
            while($record = mysql_fetch_row($result)){
                $query = "SELECT * FROM Coupon WHERE num = ".$record[1].";";
                $result2 = mysql_query($query,$link);
                $record2 = mysql_fetch_row($result2);
                echo "<div class=\"favorite\">";
                echo "<a href=\"http://www.campusclipper.com/CCVersion2/item.php?item=$record2[0]\">";
                echo "<img src=\"$record2[7]\">";
                echo "</a>";
                echo "<div>$record2[1]</div>";
                echo "<div>$record2[2]&nbsp;|&nbsp;$record2[3]</div>";
                
                //create a hidden form here to send out remove messege to the server .php file
                echo "<form action=\"removeFavorite.php\" method=\"post\">";
                echo "<input type=\"hidden\" name=\"emailitem\" value=\"".$email.$record2[0]."\">";
                echo "<input type=\"hidden\" name=\"item\" value=\"".$record2[0]."\">";
                echo "<input class=\"btn\" type=\"submit\" name=\"submit\" value=\"Remove\">";
                echo "</form>";
                
                //print out the coupon
                echo "<button class=\"btn\" type=\"button\" onClick=window.open(\"showCoupon.php?path=$record2[8]\",\"mywindow\",\"menubar=1,resizable=1,width=500,height=700\"); value=\"Open child Window\">Get coupon</button>";
                echo "</div>";
            }
?>
        </div>
        <div class="showReview">
            <p>Your most recent rating and reviews...</p>
<?
            //query the most recent two reviews for the logged in user
            $query = "SELECT * FROM Review WHERE email = \"".$email."\" ORDER BY time1 DESC LIMIT 2;";
            $result3 = mysql_query($query,$link);
            //echo the html code for each review
            while($record3 = mysql_fetch_row($result3)){
                $it = 0;
                $query = "SELECT markPath FROM Coupon WHERE num = ".$record3[0].";";
                $result4 = mysql_query($query,$link);
                $record4 = mysql_fetch_row($result4);
                echo "<div class=\"review\">";
                echo "<div class=\"mark\">";
                echo "<a href=\"http://www.campusclipper.com/CCVersion2/item.php?item=$record3[0]\">";
                echo "<img src=\"$record4[0]\">";
                echo "</a>";
                echo "</div>";
                echo "<div class=\"rating\">";
                while($it<$record3[2]){
                    echo "<div><img";
                    echo " src=\"pics/rating2.png\">";
                    echo "</div>";
                    $it++;
                }
                while($it<5){
                    echo "<div><img";
                    echo " src=\"pics/rating1.png\">";
                    echo "</div>";
                    $it++;
                }
                echo "</div>";
                echo "<div class=\"title\">$record3[3]</div>";
    		    echo "<div class=\"text\">$record3[4]</div>";
                echo "</div>";
            }
?>
            
        </div>
	</div>
	<!--company info-->
	<div class="bottom">
		<?include 'footer.php'?>
    </div>
	</body>
</html>
<?
    }//ends else braces
?>