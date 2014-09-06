<?
    include 'shoppingCart.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>
    <head>
        <title>Campus Clipper</title>
        <link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		<link rel="stylesheet" type="text/css" href="css/bag.css" />
		<script src="js/jquery-1.11.0.js"></script>
		<script src="js/jquery-ui-1.10.3.custom.js"></script>
		<script src="js/index.js"></script>
        <script src="js/bag.js"></script>
        <script type="text/javascript">   
            function disableReturn(e){
                if(event.keyCode==13){
                    return false;
                }
            }
            
        </script>  
	</head>
	<body>
    <header>
        <?include 'header.php'?>
    </header>
	<div class="main2">
        <?
            //get session variable and then check how many records in the bag
            $key = $_SESSION['CCBagName'];
            include 'connectDB.php';
            $query = "SELECT * FROM Bag WHERE bName = \"$key\";";
            $result = mysql_query($query,$link);
            $num = mysql_num_rows($result);
        ?>
        <div class="ctitle">
            <div class="name">Name</div>
            <div class="price">Price</div>
            <div class="qty">Qty</div>
            <div class="subt">Subtotal</div>
            <div class="desc">Description</div>
        </div>
        <?
        //if the num of product found is less then 10, then set a specific hieght of main div for aesthetic purpose
        if($num<=10){
        ?>
            <script>
                $(".main2").css("height","450px");
            </script>
        <?
        }
        echo "<form action=\"checkout.php\" method=\"post\">";
        //to track the total amount 
        $total = 0;
        while($record = mysql_fetch_row($result)){    
            echo "<div class=\"record\">";
            echo "<div class=\"inputWrap2\">";
            //assign to this input tag a special name, which contains necessary info for deletion operation
            echo "<input class=\"but\" type=\"button\" value=\"X\" name=\"$record[2].$key\">";
            echo "</div>";
            echo "<a href=\"http://www.campusclipper.com/CCVersion2/product.php?product=$record[2]\">";
            echo "<div class=\"name\">$record[1]</div>";
            echo "</a>";
            echo "<div class=\"price\">$record[3]</div>";
            echo "<div class=\"inputWrap\">";
            echo "<input type=\"text\" class=\"qty\" name=\"$record[2].$key\" value=\"$record[4]\" onKeyDown=\"return disableReturn()\">";
            echo "</div>";
            $subt = $record[3] * $record[4];
            $total += $subt;
            echo "<div class=\"subt\">$subt</div>";
            echo "<div class=\"desc\">$record[5]</div>";
            echo "</div>";
        }
        
        //allow entering the shipping info
        echo "<div class=\"title3\">Recipient-> ";
        echo "<input type=\"text\" class=\"recipient\" name=\"recipient\">";
        echo " Address-> ";
        echo "<input type=\"text\" class=\"address\" name=\"address\">";
        echo "</div>";
        
        //print out the total amount and place a botton to check out the bag
        echo "<div class=\"title2\">Amount Total-> $total</div>";
        echo "<input class=\"subm\" type=\"submit\" name=\"submit\" value=\"CHECK OUT\">";
        echo "</form>";
        ?>
    </div>
	<div class="bottom">
		<?include 'footer.php'?>
    </div>

	</body>
</html>