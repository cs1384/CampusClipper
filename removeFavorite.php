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
    //make sure this is not the random access
    if(isSet($_POST['emailitem'])){
        $delete = $_POST['emailitem'];
        
        include 'connectDB.php';
        
        $query = "DELETE FROM Favorite WHERE CONVERT( judge USING utf8) = \"".$delete."\" LIMIT 1;";
        mysql_query($query);
        
        //forward back to account.php
?>
        <script language="JavaScript">
            window.location.replace("account.php");
        </script>
<?        
    }
?>

    </body>
</html>