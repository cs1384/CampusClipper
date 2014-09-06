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
        
        //connect to the database
        include 'connectDB.php';
        
        //if the form has been submitted and the user is redirected to this very page again
		if(isSet($_POST['email'])){
        
			$query = "SELECT * FROM Member WHERE email = '". $_POST['email']."';";
			$result = mysql_query($query);
			
            //if the query gets more than one result
			if(mysql_num_rows($result) > 0){
?>				
				<div class="title">Email has been registered</div>
				<div class="intro">Please sign up with another email or reteive your old acount.</div>			
<? 
            //insert the data and send email to request comfirmation
            }else{
				$query = "INSERT INTO Member (firstName, lastName, school ,email, country, password, zipcode, isDelete) 
				VALUES ('".$_POST['firstName']."','".$_POST['lastName']."','".$_POST['school']."','".$_POST['email']."','".$_POST['country']."','".$_POST['psw']."','".$_POST['zip']."','1');";
				if(mysql_query($query) && mysql_error()==""){
					$id = mysql_insert_id();
					$subject="Campus Clipper sign up confirmation";
					$header="From:Campus Clipper<cassandra@campusclipper.com>\nContent-Type:text/html;charset=UTF-8";
					$content=''.$_POST['firstName'].', thanks for joining Campus Clipper.<br/>';
					$content.="Please click on following link to complete the confirmation:<br><br>";
					$content.="<a href='http://www.campusclipper.com/CCVersion2/confirm.php?";
					$content.='id='.$id.'&pw='.sha1($id)."'><font size='+2'><b>Confirm</b></font></a>\n";
					mail($_POST['email'],$subject,$content,$header);
				}?>
                
				<div class="title">Sign up successful</div>
				<div class="intro">A confirm mail has been sent to your email account.<br> 
					Please click the link inside to finish the confirmation.</div>
					
			<?}
		}else{
            /*if the user is first entering the page*/
            
            //get countries
            $query="select Name from Country";
    		$country=mysql_query($query);
            //get schools
            $query="select Name from School";
    		$school=mysql_query($query);
                
            ?>  
				<div class="title">Join Campus Clipper</div>
				<div class="intro">Quick and easy, We'll keep tabs on your history.</div>
				<div class="form">
				<form name="form1" action="<?echo $_SERVER['PHP_SELF'];?>" method="post">
				

				<div class="blk">
				<div class="subtitle">First Name<span class="required">*</span>&nbsp;</div>
				<input id="firstN" class="check" size="30" type="text" name="firstName">
				</div>
				<div class="blk">
				<div class="subtitle">Last Name<span class="required">*</span>&nbsp;</div>
				<input id="lastN" class="check" size="30" type="text" name="lastName">
				</div>
				<div class="blk">
				<div class="subtitle">School<span class="required">*</span>&nbsp;</div>
				<select id="school" class="check" name="school">
                    <option value="-1" selected>Please Select...</option>
                    <?
                        //push option tags to the selection tag
                        while($row1=mysql_fetch_array($school)){
                    ?>
    				        <option><?echo $row1[Name];?></option>
                    <?
                        }
                    ?>
                </select>
				</div>
				<div class="blk">
				<div class="subtitle">Email<span class="required">*</span>&nbsp;</div>
				<input id="email" class="check" size="30" type="text" name="email">
				<div class="msg">Invalid email</div>
				</div>
				<div class="blk">
				<div class="subtitle">Re-enter email<span class="required">*</span>&nbsp;</div>
				<input id="reEmail" class="check" size="30" type="text" name="reEmail">
				<div class="msg">Email unmatched</div>
				</div>
				<div class="blk">
				<div class="subtitle">Country<span class="required">*</span>&nbsp;</div>
				<select id="country" class="check" name="country">
                    <option value="-1" selected>Please Select...</option>
                    <?
                        //push option tags to the selection tag
                        while($row=mysql_fetch_array($country)){
                    ?>
        			        <option><?echo $row[Name];?></option>
                    <?
                        }
                    ?>
                </select>
				</div>
				<div class="blk">
				<div class="subtitle">Password<span class="required">*</span>&nbsp;</div>
				<input id="psw" class="check" size="30" type="password" name="psw">
				<div class="msg">needs to be 4~20 letters, 0-9, a-z, A-Z or !#$%&?_</div>
				</div>
				<div class="blk">
				<div class="subtitle">Re-enter pswd<span class="required">*</span>&nbsp;</div>
				<input id="rePsw" class="check" size="30" type="password" name="rePsw">
				<div class="msg">Password unmatched</div>
				</div>
				<div class="blk">
				<div class="subtitle">Zip code&nbsp;</div>
				<input id="zip" size="30" type="text" name="zip">
				</div>
            
				<div class="blk2">
					<span class="required">*</span>&nbsp;as required ->&nbsp;
					<input class="subm" disabled="disabled" type="submit" name="submit1" value="SUBMIT" id="submit"><br/>
				</div>
				</form>
			</div>
			<?}?>
	</div>

	<!--company info-->
	<div class="bottom">
		<?include 'footer.php'?>
    </div>

	</body>


</html>

