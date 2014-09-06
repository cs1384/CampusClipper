<?
    include 'shoppingCart.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>
    <head>
		<title>Campus Clipper</title>
			<link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
            <style>
                .msg{text-align:right;color:red;visibility:hidden;}
                div{float:left;}
                input{float:left;}
            </style>
			<script src="js/jquery-1.11.0.js"></script>
			<script src="js/jquery-ui-1.10.3.custom.js"></script> 
	</head>
	<body>
	<div class="main">
<?  
        //if the form has been sent and user was redirected to this page again
        if(isSet($_POST['email'])){
            
            //connect to the database
            include 'connectDB.php';
			//query this particular user with email
            $query = "SELECT * FROM Member WHERE email = '". $_POST['email']."';";
			$result = mysql_query($query);

            //if the user is in database
			if(mysql_num_rows($result) > 0){
                $record = mysql_fetch_row($result);
                //if the password is matched
                if($_POST['psw']==$record[6]){
                    //delete account
                    $query = "DELETE FROM Member WHERE email = '". $_POST['email']."';";
                    mysql_query($query);
?>
                    <script language="JavaScript">
                        alert("Account deleted.");
                        window.location.replace("unsetCookie.php");
                    </script>
<?                      
                }else{
?>
                    <script language="JavaScript">
                        alert("Password incerrect. Please try again.");
                        location.reload();
                    </script>
<?                  
                }
            }else{
?>
                <script language="JavaScript">
                    alert("The eamil address entered is not in the database. Please try again.");
                    location.reload();
                </script>
<?
            }
		}else{
?>
            Please enter the account's email and password and then press "DELETE"
			<br><br>
            <form name="form1" action="<?echo $_SERVER['PHP_SELF'];?>" method="post">
			    <div>Email:&nbsp;</div><input id="email" class="check" size="35" type="text" name="email"><br/><br/>
                <div>Passwrod:&nbsp;</div><input id="psw" class="check" size="30" type="password" name="psw"><br/><br/>
				<input class="subm" type="submit" name="submit" value="DELETE"><br/>
			</form>
<?
        }
?>
	</div>
</div>

	</body>


</html>

