<?php

    //get necessay variable 
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $num = $_POST['num'];    
    
    //connect to the database
    include 'connectDB.php';
    
    //query user's info 
    $query = "SELECT * FROM Member WHERE email = \"$email\"";
    $result = mysql_query($query,$link);
    $record = mysql_fetch_row($result);    
    
    //if security code is not matched, return good = 0 indicating the addition process finished wrongly
    if($msg!=$record[9]){
        $return = array(
		    'good' => 0,
        );
	    echo json_encode($return);
    }else{
        /* use REPLACE here to ensure that the item will eitehr overwrite the same but old item or 
        be written into database directly */
        $query = "REPLACE INTO tintest.Favorite (email,enum,time,judge) VALUES (\"$email\",$num,NOW(),\"$email$num\")";
        $result = mysql_query($query,$link);
        
        /* only 6 favorite items are allowed for each user, we delete the oldest one if ther are more than 6 items
        under the user */
        $query = "SELECT * FROM Favorite WHERE email = \"$email\" ORDER BY time ASC";
        $result = mysql_query($query,$link);
        if(mysql_num_rows($result)>6){
            $record = mysql_fetch_row($result);
            $query = "DELETE FROM Favorite WHERE Favorite.judge = \"$record[3]\"";
            $result = mysql_query($query,$link);
        }    
        
        //return good = 1 indicating the good finish for addition
        $return = array(
            'good' => 1,
        );
        echo json_encode($return);
    }
    
?>
