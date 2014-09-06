<?php
        
    //get necessary variables
    $bName= $_POST['bName'];
    $pNum = $_POST['pNum'];    
    
    //connect to the database
    include 'connectDB.php';
    
    //fresh the variables CCBagQty
    $query = "SELECT pQty FROM Bag WHERE bName = \"$bName\" AND pNum = \"$pNum\";";
    $result = mysql_query($query,$link);
    $record = mysql_fetch_row($result);
    session_start();
    $_SESSION['CCBagQty'] -= $record[0];
    setCookie('CCBagQty', $_COOKIE['CCBagQty'] - $record[0], time()+3600*24*7);
    
    //delete record from database
    $query = "DELETE FROM Bag WHERE bName = \"$bName\" AND pNum = \"$pNum\";";
    $result = mysql_query($query,$link);
    
    if($result){
        $return = array(
            'good' => 1,
        );
    	echo json_encode($return);
    }else{
        $return = array(
            'good' => $query,
        );
        echo json_encode($return);
    }
    
?>
