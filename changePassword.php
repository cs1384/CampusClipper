<?
    //check if the form was submitted and the user was directed to this page again
    if(isSet($_POST['email'])){
        
        //connect to database
        include 'connectDB.php';
        //query the user's info
		$query = "SELECT * FROM Member WHERE email = \"". $_POST['email']."\";";
		$result = mysql_query($query);
        
        //if the user really exists
		if(mysql_num_rows($result) > 0){
            $record = mysql_fetch_row($result);
            //if the old passwrod is matched
            if($_POST['oldPsw']==$record[6]){
                //if new passwod was re-entered correctly
                if($_POST['newPsw']==$_POST['newPsw2']){
                    //then update the password info
                    $query = "UPDATE Member SET password = ".$_POST['newPsw']." WHERE email = \"".$_POST['email']."\" LIMIT 1 ;";
                    $result = mysql_query($query);
                    //then pop up a message of success and direct the user to the unset cookie page
?>
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
	                        <div class="main">
                                <script language="JavaScript">
                                    alert("The password has been changed, please login again.");
                                    window.location.replace("unsetCookie.php");
                                </script>
                            </div>
                        </body>
                    </html>
<?
                }else{
                    //if the new password is not re-typed correctly, pop up error message and reload page
?>                      
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
	                        <div class="main">
                                <script language="JavaScript">
                                    alert("New passwrod is not matched by re-typed one. Please try again.");
                                    location.reload();
                                </script>
                            </div>
                        </body>
                    </html>
<?                      
                }
            }else{
                //if the old password is not matched, show error message and reload 
?>
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
	                    <div class="main">
                            <script language="JavaScript">
                                alert("The old password is not typed correctly, please try again");
                                location.reload();
                            </script>
                        </div>
                    </body>
                </html>

<? 
            }
        }else{
            //if the query didn't find any matching record from database, show error and reload
?>
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
	                    <div class="main">
                            <script language="JavaScript">
                                alert("Sorry, the email is not in our database. Please try again.");
                                location.reload();
                            </script>
                        </div>
                    </body>
                </html>
<?
        }
	}else{
    //if the user first comes to this page, prepare the form for submitting new password.
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
            <script src="js/changePassword.js"></script>
	    </head>
	    <body>
	        <div class="main">
                Please fill out ALL blanks and press ""CHANGE"<br><br>
                <form name="form1" action="<?echo $_SERVER['PHP_SELF'];?>" method="post">
			        <div>Email:&nbsp;</div><input id="email" class="check" size="30" type="text" name="email"><div class="msg">&nbsp;Invalid email</div><br/><br/>
                    <div>Old passwrod:&nbsp;</div><input id="old" class="check" size="30" type="password" name="oldPsw"><br/><br/>
                    <div>New password:&nbsp;</div><input id="psw" class="check" size="30" type="password" name="newPsw"><div class="msg">&nbsp;needs to be 4~20 letters, 0-9, a-z, A-Z or !#$%&?_</div><br/><br/>
                    <div>Re-enter new password:&nbsp;</div><input id="rePsw" class="check" size="30" type="password" name="newPsw2"><div class="msg">&nbsp;Password unmatched</div><br/><br/>
				    <input class="subm" type="submit" name="submit" value="CHANGE" disabled="disabled"><br/>
			    </form>
<?
}
?>


