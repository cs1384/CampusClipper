<?
    include 'shoppingCart.php';
    //if the length of the key is less than 1, then forward to the coupon page
    if($_GET['key']=="" || strlen($_GET['key'])<2){
        header('Location:http://www.campusclipper.com/CCVersion2/coupon.php?new=1&italy=1&les=1&financial=1&evillage=1&wvillage=1&14street=1&23street=1&3ave=1&7ave=1&uws=1');        
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>
    <head>
        <title>Campus Clipper</title>
		<link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		<link rel="stylesheet" type="text/css" href="css/search.css" />
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
        $key = $_GET['key'];
        include 'connectDB.php';
        $query = "SELECT * FROM Coupon WHERE name like '%$key%' OR category like '%$key%' 
            OR description like '%$key%' ORDER BY new DESC;";
        $result = mysql_query($query);
        $num = mysql_num_rows($result);
        ?>
        <div class="title2">SEARCH RESULT: <?echo $num;?></div>
        <div class="ctitle">
            <div class="name">Name</div>
            <div class="cate">Category</div>
            <div class="disc">Discount</div>
            <div class="desc">Description</div>
        </div>
        <?
        //if the num of coupon found is less then 10, then set a specific hieght of main div for aesthetic purpose
        if($num<=10){
        ?>
            <script>
                $(".main2").css("height","450px");
            </script>
        <?
        }
        while($record = mysql_fetch_row($result)){
            echo "<a href=\"http://www.campusclipper.com/CCVersion2/item.php?item=$record[0]\">";    
            echo "<div class=\"record\">";
            echo "<div class=\"name\">$record[1]</div>";
            echo "<div class=\"cate\">$record[2]</div>";
            echo "<div class=\"disc\">$record[3]</div>";
            echo "<div class=\"desc\">$record[9]</div>";
            echo "</div>";
            echo "</a>";
        }
        ?>
    </div>
	<div class="bottom">
		<?include 'footer.php'?>
    </div>

	</body>
</html>