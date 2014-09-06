<?
    include 'shoppingCart.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>
	<head>
		<title>Campus Clipper</title>
			<link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="css/index.css" />
			<link rel="stylesheet" type="text/css" href="css/register.css" />
			<script src="js/jquery-1.11.0.js"></script>
			<script src="js/jquery-ui-1.10.3.custom.js"></script>
			<script src="js/index.js"></script>
			<script src="js/register.js"></script> 	 					
	</head>
	<body>
        <header>
            <?include 'header.php'?>
        </header>

	<div class="main">
	<?
        //connect to database
        include 'connectDB.php';
        
        //select items in which isdelete is 1 to prevent second confirmation
		$query="select * from Member where isdelete=1 and id=".$_GET['id'];
		$result=mysql_query($query,$link);
        //if the query gets result 
		if(mysql_num_rows($result)!=0){
			mysql_query("update Member set isdelete=0 where id='".$_GET['id']."'");
	?>
		    <div class="title">Registration Confirmed</div>
		    <div class="intro">You will receive eamil regarding new coupons periodically,
			    <br>and be kept track of your shopping history while logged in.</div>	
		    <a href="http://www.campusclipper.com/CCVersion2/login.php"><div class="title">Login Campus Clipper!</div></a>
	<?
		}else{
            //case of second confirm
    ?>
            <div class="intro">You have confirmed registration already.</div>	
		    <a href="http://www.campusclipper.com/CCVersion2"><div class="title">Start Exploring Campus Clipper!</div></a>
    <?}?>
    </div>

	<!--company info-->
	<div class="bottom">
		<?include 'footer.php'?>
    </div>

	</body>
</html>