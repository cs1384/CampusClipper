<?php
    
    //get session variable CCBageNem, which is the key of this very user's own bag
    session_start();
    $key = $_SESSION['CCBagName'];
    
    //get necessay variable for addition
    $qty= $_POST['qty'];
    $num = $_POST['num'];    
    
    //connect to the database
    include 'connectDB.php';
    
    //check if the product has been added into the db under the bag
    $query = "SELECT * FROM Bag WHERE bName = \"$key\" AND pNum = \"$num\";";
    $result = mysql_query($query,$link);
    //if affirmative, just update the qty data
    if(mysql_num_rows($result)>=1){
        $query = "SELECT pQty FROM Bag WHERE bName = \"$key\" AND pNum = $num LIMIT 1;";
        $result = mysql_query($query,$link);
        $record = mysql_fetch_row($result);
        //refresh the CCBagQty session variable by deducting original qty and then adding new qty
        $_SESSION['CCBagQty'] -= $record[0];
        $_SESSION['CCBagQty'] += $qty;
        setCookie('CCBagQty', $_COOKIE['CCBagQty'] - $record[0] + $qty, time()+3600*24*7);
        $query = "UPDATE Bag SET pQty = $qty WHERE bName = \"$key\" AND pNum = $num LIMIT 1;";
        $result = mysql_query($query,$link);
    //else insert a new record
    }else{
        $query = "SELECT name, price, descrption FROM items WHERE enum = \"$num\";";
        $result = mysql_query($query,$link);
        $record = mysql_fetch_row($result);
        $query = "INSERT INTO Bag (bName, pName, pNum, pPrice, pQty, pDesc) VALUES ('$key', '$record[0]', '$num', '$record[1]', '$qty', '$record[2]');";
        $result = mysql_query($query,$link);
        //refresh the CCBagQty session variable by adding up qty
        $_SESSION['CCBagQty'] = $_SESSION['CCBagQty'] + $qty;
        setCookie('CCBagQty', $_COOKIE['CCBagQty'] + $qty, time()+3600*24*7);
    }
    //if query successfully, then return good as 1 (true)
    if($result){
        $return = array(
            'good' => 1,
        );
    	echo json_encode($return);
    //else return the query statement for debugging
    }else{
        $return = array(
            'good' => $query,
        );
        echo json_encode($return);
    }
    
?>
