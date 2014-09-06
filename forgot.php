<?
    include 'shoppingCart.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>
    <head>
		<title>Campus Clipper</title>
			<link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
			<script src="js/jquery-1.11.0.js"></script>
			<script src="js/jquery-ui-1.10.3.custom.js"></script> 					
	</head>
	<body>
	<div class="main">
<?  
        //if the form has been submitted and the user was forwarded to the same page again.
		if(isSet($_POST['email'])){
            
            //connect to the database
            include 'connectDB.php';
            
            //query the user
			$query = "SELECT * FROM Member WHERE email = '". $_POST['email']."';";
			$result = mysql_query($query);

            //if the user exists in db, then send out an email and then notify the user. 
			if(mysql_num_rows($result) > 0){
                $subject = "Campus Clipper password retrieval";
                $header = "From:Campus Clipper<cassandra@campusclipper.com>\nContent-Type:text/html;charset=UTF-8";
                $record = mysql_fetch_row($result);
                $content = $record[6];
                mail($_POST['email'],$subject,$content,$header);
?>	
				<div class="title">The password has been sent to your email.</div>
<? 
            //if the submitted email is not in the database
            }else{
?>
                <script language="JavaScript">
                    alert("The eamil address is not in the database. Please try again or register.");
                    history.go(-1); //back to previous page
                </script>
<?
            }
		}else{
?>
            Please input your email associated with your Campus Clipper account and then click "RETRIEVE"
			<br><br>
            <form name="form1" action="<?echo $_SERVER['PHP_SELF'];?>" method="post">
			    Email:&nbsp;<input size="30" type="text" name="email">
				<input type="submit" name="submit" value="RETRIEVE" ><br/>
			</form>
<?
        }
?>
	</div>
</div>

	</body>


</html>

