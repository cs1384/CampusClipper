<?php
    /*To load content of matched products*/
	
    //get or calculate the necessary 
    $cate = $_POST['cate'];
	$price = $_POST['price'];
	$pageNo = $_POST['pageNum'];
	$pageSplit = $_POST['perPage'];
	$pageStart = ($pageNo*$pageSplit)-$pageSplit;

    //connect to the database
    include 'connectDB.php';
    
    //if not both category and price lists are empty
	if(!empty($cate) && !empty($price)){
		
        $query = "SELECT * FROM (SELECT * FROM items";
		
        switch ($cate[0]){
			case 1:
				$query = $query . " WHERE new = 1";
				break;	
			case 2:
				$query = $query . " WHERE men = 1";
				break;
			case 3:
				$query = $query . " WHERE women = 1";
				break;	
			case 4:
				$query = $query . " WHERE top = 1";
				break;	
			case 5:
				$query = $query . " WHERE bot = 1";
				break;	
			case 6:
				$query = $query . " WHERE acce = 1";
				break;	
			case 7:
				$query = $query . " WHERE gadg = 1";
				break;
			default:
				$query = $query . " WHERE new = 1";			
		}
		for($i=1;$i<count($cate);$i++){
			switch ($cate[$i]){
			case 1:
				$query = $query . " OR new = 1";
				break;	
			case 2:
				$query = $query . " OR men = 1";
				break;
			case 3:
				$query = $query . " OR women = 1";
				break;	
			case 4:
				$query = $query . " OR top = 1";
				break;	
			case 5:
				$query = $query . " OR bot = 1";
				break;	
			case 6:
				$query = $query . " OR acce = 1";
				break;	
			case 7:
				$query = $query . " OR gadg = 1";
				break;
			default:
				$query = $query . " AND new = 1";			
			}
		}
		
		$query = $query . ") temp";
		
			switch ($price[0]){
			case 1:
				$query = $query . " WHERE price BETWEEN 0 AND 15";
				break;	
			case 2:
				$query = $query . " WHERE price BETWEEN 16 AND 30";
				break;
			case 3:
				$query = $query . " WHERE price BETWEEN 31 AND 45";
				break;
			case 4:
				$query = $query . " WHERE price BETWEEN 46 AND 60";
				break;
			case 5:
				$query = $query . " WHERE price BETWEEN 61 AND 75";
				break;
			case 6:
				$query = $query . " WHERE price >= 76";
				break;	
			default:
				$query = $query . " WHERE price > 0";			
			}
		
			for($i=1;$i<count($price);$i++){
				switch ($price[$i]){
				case 1:
					$query = $query . " OR price BETWEEN 0 AND 15";
					break;	
				case 2:
					$query = $query . " OR price BETWEEN 16 AND 30";
					break;
				case 3:
					$query = $query . " OR price BETWEEN 31 AND 45";
					break;
				case 4:
					$query = $query . " OR price BETWEEN 46 AND 60";
					break;
				case 5:
					$query = $query . " OR price BETWEEN 61 AND 75";
					break;
				case 6:
					$query = $query . " OR price >= 76";
					break;	
				default:
					$query = $query . " OR price > 0";			
				}
			}

            //First query to get total number of items
			$query1 = $query . ";";
			$result = mysql_query($query1,$link);
			$itemNum = mysql_num_rows($result);
			
            //Then get items for a very page
			$query2 = $query . " LIMIT ".$pageStart.",".$pageSplit.";";
			$result = mysql_query($query2,$link);

            //prepare content to load
			$content = "";
			while($record = mysql_fetch_row($result)){
				$content = $content 
							. "<div class=\"item\">"
				 			. "<a href=\"http://www.campusclipper.com/CCVersion2/product.php?product=$record[0]\">"
				 			. "<div class=\"pic\">"
					 		. "<img src=\"$record[3]\">"
					 		. "</div>"
					 		. "</a>"
					 		. "<div>$record[1]</div>"
					 		. "<div>\$:$record[2]</div>"
					 		. "</div>";
			}

		$return = array(
				'itemNum' => $itemNum,
				'content' => $content,
		);
        
	}else{

		$return = array(
				'itemNum' => '0',
				'content' => '',
		);
	}
	echo json_encode($return);
?>
