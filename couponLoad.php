<?php
    //get necessary variables
	$cate = $_POST['cate'];
	$price = $_POST['price'];
	$pageNo = $_POST['pageNum'];
	$pageSplit = $_POST['perPage'];
	$pageStart = ($pageNo*$pageSplit)-$pageSplit;
    
    //connect to database
    include 'connectDB.php';
	
    //only if both lists got some items selected, we start building query statement
	if(!empty($cate) && !empty($price)){
        $query = "SELECT * FROM (SELECT * FROM Coupon";
        switch ($cate[0]){
			case 1:
    			$query = $query . " WHERE new = 1";
				break;	
			case 2:
				$query = $query . " WHERE kind = 1";
				break;
			case 3:
				$query = $query . " WHERE kind = 2";
				break;	
			case 4:
				$query = $query . " WHERE kind = 3";
				break;	
			case 5:
				$query = $query . " WHERE kind = 4";
				break;	
			case 6:
				$query = $query . " WHERE kind = 5";
				break;	
			default:;					
		}
		for($i=1;$i<count($cate);$i++){
			switch ($cate[$i]){
			case 1:
    			$query = $query . " OR new = 1";
				break;	
			case 2:
				$query = $query . " OR kind = 1";
				break;
			case 3:
				$query = $query . " OR kind = 2";
				break;	
			case 4:
				$query = $query . " OR kind = 3";
				break;	
			case 5:
				$query = $query . " OR kind = 4";
				break;	
			case 6:
				$query = $query . " OR kind = 5";
				break;	
			default:;			
			}
		}
		
		$query = $query . ") temp";
		
			switch ($price[0]){
			case 1:
    			$query = $query . " WHERE area = 1";
				break;	
			case 2:
				$query = $query . " WHERE area = 2";
				break;
			case 3:
				$query = $query . " WHERE area = 3";
				break;
			case 4:
				$query = $query . " WHERE area = 4";
				break;
			case 5:
				$query = $query . " WHERE area = 5";
				break;
			case 6:
				$query = $query . " WHERE area = 6";
				break;
            case 7:
    			$query = $query . " WHERE area = 7";
				break;
            case 8:
    			$query = $query . " WHERE area = 8";
				break;
            case 9:
    			$query = $query . " WHERE area = 9";
				break;
            case 10:
        		$query = $query . " WHERE area = 10";
				break;
			default:;				
			}
		
			for($i=1;$i<count($price);$i++){
				switch ($price[$i]){
				case 1:
    	    		$query = $query . " OR area = 1";
			    	break;	
			    case 2:
				    $query = $query . " OR area = 2";
				    break;
			    case 3:
				    $query = $query . " OR area = 3";
				    break;
			    case 4:
			    	$query = $query . " OR area = 4";
				    break;
    			case 5:
    				$query = $query . " OR area = 5";
    				break;
    			case 6:
    				$query = $query . " OR area = 6";
    				break;
                case 7:
        			$query = $query . " OR area = 7";
    				break;
                case 8:
        			$query = $query . " OR area = 8";
    				break;
                case 9:
        			$query = $query . " OR area = 9";
    				break;
                case 10:
        		    $query = $query . " OR area = 10";
				    break;
    			default:;
				}
			}

            //use first query to get the number of items in total
			$query1 = $query . ";";
			$result = mysql_query($query1,$link);
			$itemNum = mysql_num_rows($result);
			
            //use second query to get the item which will be shown on the page
			$query2 = $query . " LIMIT ".$pageStart.",".$pageSplit.";";
			$result = mysql_query($query2,$link);

            //construct the html code to be returned
			$content = "";
			while($record = mysql_fetch_row($result)){
				$content = $content 
							. "<div class=\"item\">"
				 			. "<a href=\"http://www.campusclipper.com/CCVersion2/item.php?item=$record[0]\">"
				 			. "<div class=\"pic\">"
					 		. "<img src=\"$record[7]\">"
					 		. "</div>"
					 		. "</a>"
					 		. "<div>$record[1]</div>"
					 		. "<div>$record[2]&nbsp;|&nbsp;$record[3]</div>"
					 		. "</div>";
			}

        //build up json package
		$return = array(
				'itemNum' => $itemNum,
				'content' => $content,
		);
		
	}else{
        //if any list got nothing selected, then no item will be shown
        $return = array(
    			'itemNum' => '0',
				'content' => '',
		);
	}
    
    //return the json package
	echo json_encode($return);
?>
