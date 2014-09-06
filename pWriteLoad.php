<?php
    //get necessary varaibles
    $username = $_POST['username'];
    $num = $_POST['num'];
    $email = $_POST['email'];
    
    //prepare a form to be loaded into working secion
    $content = "<form class=\"form\" action=\"pWriteReview.php\" method=\"post\">"
                . "<div class=\"wrapper\">"
                . "<div class=\"name2\">$username"
                . "</div>"
                . "<div class=\"rating2\">"
                . "Rating ( 5 is the best ) :"
                . "<input type=\"radio\" name=\"rate\" value=\"1\">1"
                . "<input type=\"radio\" name=\"rate\" value=\"2\">2"
                . "<input type=\"radio\" name=\"rate\" checked value=\"3\">3"
                . "<input type=\"radio\" name=\"rate\" value=\"4\">4"
                . "<input type=\"radio\" name=\"rate\" value=\"5\">5"
                . "</div>"
                . "<input type=\"hidden\" name=\"num\" value=\"$num\">"
                . "<input type=\"hidden\" name=\"email\" value=\"$email\">"
                . "<input class=\"title2\" size=\"50\" type=\"text\" name=\"title\" value=\"Title\">"
                . "<textarea rows=\"4\" cols=\"100\" class=\"text2\" name=\"text\" align=\"top\">Comment</textarea>"
                . "</div>"
                . "<div class=\"subm1\">"
                . "<button class=\"subm2\" type=\"button\" onclick=\"location.href='http://www.campusclipper.com/CCVersion2/item.php?item=$num'\">Cancel</button>"
                . "<input class=\"subm2\" type=\"submit\" name=\"submit1\" value=\"Submit\" id=\"submit\">"
                . "</div>"
                . "</form>";
    /*
    $hostname = "tintest.db.5225581.hostedresource.com";
    $username = "tintest";
    $dbname = "tintest";
    
    $link = mysql_connect($hostname,$username,"Pacers24!");
    $test = mysql_select_db("tintest",$link);
    
    $query = "SELECT * FROM Review WHERE num = $num";
    $query1 = $query . ";";
    $result = mysql_query($query1,$link);
    $itemNum = mysql_num_rows($result);
            
    $query2 = $query . " LIMIT ".$pageStart.",".$pageSplit.";";
    $result = mysql_query($query2,$link);
            
    $content = "";
    while($record = mysql_fetch_row($result)){
        $it = 0;
		$content = $content 
					. "<div class=\"unit\">"
		 			. "<div class=\"name\">$record[1]</div>"
                    . "<div class=\"rating\">";
        while($it<$record[2]){
            $content = $content
                        . "<div><img"
                        . " src=\"pics/rating2.png\">"
                        . "</div>";
            $it++;
        }
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
    */
    
    //return json package
	$return = array(
		//'itemNum' => $itemNum,
		'content' => $content,
    );
	echo json_encode($return);
?>
