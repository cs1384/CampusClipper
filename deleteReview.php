<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
    <head>
        <title>Campus Clipper</title>
	    <link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	    <script src="js/jquery-1.11.0.js"></script>
		<script src="js/jquery-ui-1.10.3.custom.js"></script> 
        <script src="js/changePassword.js"></script>
	</head>
    <body>

<?
    //make sure this page is not randomly accessed
    if(isSet($_POST['email'])){
        //get variables
        $email = $_POST['email'];
        $num = $_POST['num'];
        //connect to db
        include 'connectDB.php';
        //delete 
        $query = "DELETE FROM Review WHERE CONVERT( judge USING utf8) = \"".$email.$num."\" LIMIT 1;";
        mysql_query($query);
        
?>
        <script language="JavaScript">
<?
        //once deletion's done, redirect the user to the coupon the review was for. 
        echo "window.location.replace(\"http://www.campusclipper.com/CCVersion2/item.php?item=".$num."\");";
?>
        </script>
<?        
    }
?>

    </body>
</html>