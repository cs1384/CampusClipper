<?
    //avoid rondom access
    if(isSet($_POST['rate'])){
        include 'connectDB.php';
        $num = $_POST['num'];
        $email = $_POST['email'];
        
        //use REPLACE here to ensure that the user will not leave two review for one coupon. The old one will 
        //be overwirtten 
        $query = "REPLACE INTO Review (num, username, rating ,title, comment, email, judge)
        VALUES ('".$_POST['num']."','".$_COOKIE['CCusername']."','".$_POST['rate']."','".$_POST['title']."','".htmlspecialchars($_POST['text'])."','".$email."','".$email.$num."');";
        mysql_query($query);
        
        //head back to the coupon just been reviewed
        header("Location: http://www.campusclipper.com/CCVersion2/item.php?item=$num");
    }
?>