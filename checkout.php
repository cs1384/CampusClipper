<?
    include 'shoppingCart.php';
    //this page finalizes the check out info, user may proceed to check out after confirming the detail
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>
    <head>
        <title>Campus Clipper</title>
        <link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		<link rel="stylesheet" type="text/css" href="css/checkout.css" />
		<script src="js/jquery-1.11.0.js"></script>
		<script src="js/jquery-ui-1.10.3.custom.js"></script>
		<script src="js/index.js"></script>
	</head>
	<body>
    <header>
        <?include 'header.php'?>
    </header>
	<div class="main2">
        <?
        //get session variable and get to know how many product in the bag
        $key = $_SESSION['CCBagName'];
        include 'connectDB.php';
        $query = "SELECT * FROM Bag WHERE bName = \"$key\";";
        $result = mysql_query($query);
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
        //uncomment the form tag to submit info to payment systems
        //echo "<form action=\"checkout.php\">";
        $total = 0;
        while($record = mysql_fetch_row($result)){    
            echo "<div class=\"record\">";
            echo "<div class=\"inputWrap2\"></div>";
            echo "<div class=\"name\">$record[1]</div>";
            echo "<div class=\"price\">$record[3]</div>";
            echo "<div class=\"inputWrap\">$record[4]</div>";
            $subt = $record[3] * $record[4];
            $total += $subt;
            echo "<div class=\"subt\">$subt</div>";
            echo "<div class=\"desc\">$record[5]</div>";
            echo "</div>";
        }
        
        echo "<div class=\"title3\">Recipient-> ";
        echo $_POST['recipient'];
        echo ". Address-> ";
        echo $_POST['address'];
        echo "</div>";
        
        echo "<div class=\"title2\">Amount Total-> $total</div>";
        echo "<button class=\"subm\" onclick=\"history.go(-1)\">Go Back</button>";
        echo "<button class=\"subm\" onclick=\"javascript:window.print()\">Print</button>";
        echo "<input class=\"subm\" type=\"submit\" name=\"submit\" value=\"Confirm\">";
        //echo "</form>";
        ?>
    </div>
	<div class="bottom">
		<?include 'footer.php'?>
    </div>

	</body>
</html>