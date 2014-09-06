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
            <script src="js/login.js"></script>
            
	</head>
	<body>
    <header>
        <?include 'header.php'?>
    </header>
	<div class="main">
    <?
    //if teh form has been submitted, and the user was forwarded to the same page again
    if(isSet($_POST['loginEmail'])){
        //connect to the database
        include 'connectDB.php';
        
        $query = "SELECT * FROM Member WHERE email = '". $_POST['loginEmail']."';";    
        $match = mysql_query($query);
        
        //if teh query gets no result
        if(mysql_num_rows($match)==0){
    ?>
            <div class="title">Email not registered yet</div>
    	    <div class="intro">Please sign up <a href="http://www.campusclipper.com/CCVersion2/register.php">here</a></div>
            
    <?
        }else{
            $row2=mysql_fetch_array($match);
            //check if the password is matched
            if($_POST['loginPsw']==$row2[6]){
                
                //calculate the secured msg for cookie/session work
                $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
                $msg = md5($ip + $_POST['psw']);
                //$query = "SELECT * FROM Member WHERE email = '". $_POST['loginEmail']."';";
                $query = "UPDATE tintest.Member SET  msg =  '".$msg."' WHERE Member.email = '"
                .$_POST['loginEmail']."' LIMIT 1;";
                mysql_query($query);
                
                //create an invisible form and submit it with javascript
    ?>
                <script language="javascript">
                    
                    var form = document.createElement("form");
                    form.setAttribute("method", "POST");
                    form.setAttribute("action", "setCookie.php");

                    var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", "name");
                    hiddenField.setAttribute("value", "<?echo $row2[1]?>");
                    form.appendChild(hiddenField);
                    
                    var hiddenField2 = document.createElement("input");
                    hiddenField2.setAttribute("type", "hidden");
                    hiddenField2.setAttribute("name", "email");
                    hiddenField2.setAttribute("value", "<?echo $row2[4]?>");
                    form.appendChild(hiddenField2);
                    
                    var hiddenField3 = document.createElement("input");
                    hiddenField3.setAttribute("type", "hidden");
                    hiddenField3.setAttribute("name", "msg");
                    hiddenField3.setAttribute("value", "<?echo $msg?>");
                    form.appendChild(hiddenField3);
    
                    document.body.appendChild(form);
                    form.submit();
                </script>
    <?
            }else{
                //if password is not matched
    ?>
                <script language="JavaScript">
                    alert("Invalid passwrod, please try again");
                    history.go(-1); //back to previous page
                </script>
    <?
        
            }
        }
    }else{
        //If user is first entering the page
    ?>
        <div class="title">STUDENT SIGN IN</div>
        <div class="intro">Login here using your email address and password</div>
        <div class="form">
            <form name="form1" action="<?echo $_SERVER['PHP_SELF'];?>" method="post">
                <div class="blk3">
    			    <div class="subtitle">Email Address<span class="required">*</span>&nbsp;</div>
				    <input id="email" class="check" size="50" type="text" name="loginEmail">
                    <div class="msg">Invalid email</div>
			    </div>
			    <div class="blk3">
				    <div class="subtitle">Password<span class="required">*</span>&nbsp;</div>
				    <input id="pws" class="check" size="50" type="password" name="loginPsw">
                    <div class="showmsg"><a target="_blank" href="http://www.campusclipper.com/CCVersion2/forgot.php">Forgot your password?</a></div>
			    </div>
                <div class="blk2">
    				<span class="required">*</span>&nbsp;as required ->&nbsp;
					<input class="subm" disabled="disabled" type="submit" name="submit1" value="LOGIN" id="submit"><br/>
			    </div>
            </form>
        </div>
    <?
    }
    ?>
    </div>

	<!--company info-->
	<div class="bottom">
		<?include 'footer.php'?>
    </div>

	</body>
</html>