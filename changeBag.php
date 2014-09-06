<?php
        
    //get necessay variable for addition
    $bName= $_POST['bName'];
    $pNum = $_POST['pNum'];
    $qty = $_POST['nValue'];
    
    //connect to the database
    include 'connectDB.php';
    
    //refresh tracking variable
    $query = "SELECT pQty FROM Bag WHERE bName = \"$bName\" AND pNum = $pNum LIMIT 1;";
    $result = mysql_query($query,$link);
    $record = mysql_fetch_row($result);
    session_start(); //needed to really change the value of session variables
    $_SESSION['CCBagQty'] -= $record[0];
    $_SESSION['CCBagQty'] += $qty;
    setCookie('CCBagQty', $_COOKIE['CCBagQty'] - $record[0] + $qty, time()+3600*24*7);
    
    //update the pQyt in database
    $query = "UPDATE Bag SET pQty = $qty WHERE bName = \"$bName\" AND pNum = $pNum LIMIT 1;";
    $result = mysql_query($query,$link);
    
    //return good as 1 if queried successfully
    if($result){
        $return = array(
            'good' => 1,
        );
    	echo json_encode($return);
    //else return query statement for checking purpose
    }else{
        $return = array(
            'good' => $query,
        );
        echo json_encode($return);
    }
    
?>
