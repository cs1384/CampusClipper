<?php
    //get variables
    $pageNo = $_POST['pageNum'];
	$pageSplit = $_POST['perPage'];
	$pageStart = ($pageNo*$pageSplit)-$pageSplit;
    $num = $_POST['num'];
    $email = $_POST['email'];

    //connect to the database
    include 'connectDB.php';
    
    //query all review under the same coupon
    $query = "SELECT * FROM ReviewForP WHERE num = $num ORDER BY time1 DESC";
    
    //query1 for itemNumber
    $query1 = $query . ";";
    $result = mysql_query($query1,$link);
    $itemNum = mysql_num_rows($result);
            
    //query2 for the items in a certain page
    $query2 = $query . " LIMIT ".$pageStart.",".$pageSplit.";";
    $result = mysql_query($query2,$link);
        
    //prepare for the return content
    $content = "";
    while($record = mysql_fetch_row($result)){
        $it = 0;
		$content = $content 
					. "<div class=\"unit\">"
		 			. "<div class=\"name\">$record[1]";
        
        //if the email of a certain review is matched by logged in user's email, we give him a delete function 
        if($record[6]==$email){
            $content = $content
                . "<form action=\"deleteReview.php\" method=\"post\">"
                . "<input type=\"hidden\" name=\"email\" value=\"".$email."\">"
                . "<input type=\"hidden\" name=\"num\" value=\"".$num."\">"
                . "<input class=\"btn3\" type=\"submit\" name=\"submit\" value=\"DELETE\">"
                . "</form>";
        }
        
        $content = $content        
                    . "</div>"
                    . "<div class=\"rating\">";
        
        //push the signs of good accessment
        while($it<$record[2]){
            $content = $content
                        . "<div><img"
                        . " src=\"pics/rating2.png\">"
                        . "</div>";
            $it++;
        }
        //push the signs of bad accessment
        while($it<5){
            $content = $content
                        . "<div><img"
                        . " src=\"pics/rating1.png\">"
                        . "</div>";
            $it++;
        }
        $content = $content
			 		. "</div>" 
			 		. "<div class=\"title\">$record[3]</div>"
			 		. "<div class=\"text\">$record[4]</div>"
			 		. "</div>";
	}
    
    //return json package
	$return = array(
		'itemNum' => $itemNum,
		'content' => $content,
    );
	echo json_encode($return);
?>
