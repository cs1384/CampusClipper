
<div class="control">
    <div class="header">
        <div class="search">
            <form name="form" action="search.php" method="get">
				<input size="25" type="text" name="key">
                <input type="submit" name="submit" value="Search Coupon" id="submit"><br/>
            </form>
        </div>
	    <div class="logo"><a href="http://www.campusclipper.com/CCVersion2"><img class="pic1" src="pics/logo.jpg"></a></div>
	    <div class="panel">
		    <p>	
            <?
                //check if SESSION is set, preferrable
                if(isSet($_SESSION['CCusername'])){
                    $username = $_SESSION['CCusername'];
                    echo "<a id=\"signin\" href=\"http://www.campusclipper.com/CCVersion2/account.php\" class=\"link1\">$username's account</a> ||";
                }else if(isSet($_COOKIE['CCusername'])){
                    $username = $_COOKIE['CCusername'];
                    echo "<a id=\"signin\" href=\"http://www.campusclipper.com/CCVersion2/account.php\" class=\"link1\">$username's account</a> ||";
                }else{
                    echo "<a id=\"signin\" href=\"http://www.campusclipper.com/CCVersion2/login.php\" class=\"link1\">STUDENT SIGN IN</a> ||";
                }
                
                //show the the number of products in the bag
                $qty = $_SESSION['CCBagQty'];
                echo "<a href=\"http://www.campusclipper.com/CCVersion2/bag.php\" class=\"link1\"> BAG($qty)</a>";
            ?>
		    <br/>
		    ------------------------------------
		    <br/>
		    <a href="http://www.campusclipper.com/CCVersion2/register.php" class="link2">JOIN CAMPUS CLIPPER</a>
		    </p>
	    </div>
    </div>
            
    <div id="nav1">
        <ul class="navigation">
	        <li class="bigger"><a href="http://www.campusclipper.com/CCVersion2/shopping.php">CO-ED SHOPPING</a>		
	        </li>
	        <li class="bigger"><a target="_blank" href="http://cs.nyu.edu/~ytl264">STUDENT MAGAZINE</a>
	        </li>
	        <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?new=1&italy=1&les=1&financial=1&evillage=1&wvillage=1&14street=1&23street=1&3ave=1&7ave=1&uws=1">COUPONS</a>
		        <ul>
                    <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?italy=1&new=1&school=1&health=1&entertain=1&cloth=1&food=1">Little Italy</a>
                        <ul>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?italy=1&new=1">New</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?italy=1&school=1">School & Dorm</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?italy=1&health=1">Health & Beauty</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?italy=1&entertain=1">Entertainment</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?italy=1&cloth=1">Cloth & Shoes</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?italy=1&food=1">Food & Dining</a></li>
                        </ul>
                    </li>
			        <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?les=1&new=1&school=1&health=1&entertain=1&cloth=1&food=1">Lower East Side</a>
                        <ul>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?les=1&new=1">New</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?les=1&school=1">School & Dorm</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?les=1&health=1">Health & Beauty</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?les=1&entertain=1">Entertainment</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?les=1&cloth=1">Cloth & Shoes</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?les=1&food=1">Food & Dining</a></li>
                        </ul>
                    </li>
			        <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?financial=1&new=1&school=1&health=1&entertain=1&cloth=1&food=1">Financial District</a>
                         <ul>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?financial=1&new=1">New</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?financial=1&school=1">School & Dorm</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?financial=1&health=1">Health & Beauty</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?financial=1&entertain=1">Entertainment</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?financial=1&cloth=1">Cloth & Shoes</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?financial=1&food=1">Food & Dining</a></li>
                        </ul>
                    </li>
			        <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?evillage=1&new=1&school=1&health=1&entertain=1&cloth=1&food=1">East Village</a>
                        <ul>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?evillage=1&new=1">New</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?evillage=1&school=1">School & Dorm</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?evillage=1&health=1">Health & Beauty</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?evillage=1&entertain=1">Entertainment</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?evillage=1&cloth=1">Cloth & Shoes</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?evillage=1&food=1">Food & Dining</a></li>
                        </ul>  
			        </li>
                    <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?wvillage=1&new=1&school=1&health=1&entertain=1&cloth=1&food=1">West Village</a>
                        <ul>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?wvillage=1&new=1">New</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?wvillage=1&school=1">School & Dorm</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?wvillage=1&health=1">Health & Beauty</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?wvillage=1&entertain=1">Entertainment</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?wvillage=1&cloth=1">Cloth & Shoes</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?wvillage=1&food=1">Food & Dining</a></li>
                        </ul>
                    </li>
			        <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?14street=1&new=1&school=1&health=1&entertain=1&cloth=1&food=1">14th Street</a>
                        <ul>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?14street=1&new=1">New</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?14street=1&school=1">School & Dorm</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?14street=1&health=1">Health & Beauty</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?14street=1&entertain=1">Entertainment</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?14street=1&cloth=1">Cloth & Shoes</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?14street=1&food=1">Food & Dining</a></li>
                        </ul>
                    </li>
			        <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?23street=1&new=1&school=1&health=1&entertain=1&cloth=1&food=1">23rd Street</a>
                        <ul>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?23street=1&new=1">New</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?23street=1&school=1">School & Dorm</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?23street=1&health=1">Health & Beauty</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?23street=1&entertain=1">Entertainment</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?23street=1&cloth=1">Cloth & Shoes</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?23street=1&food=1">Food & Dining</a></li>
                        </ul>
                    </li>
                    <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?3ave=1&new=1&school=1&health=1&entertain=1&cloth=1&food=1">3rd Avenue</a>
                        <ul>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?3ave=1&new=1">New</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?3ave=1&school=1">School & Dorm</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?3ave=1&health=1">Health & Beauty</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?3ave=1&entertain=1">Entertainment</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?3ave=1&cloth=1">Cloth & Shoes</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?3ave=1&food=1">Food & Dining</a></li>
                        </ul>
                    </li>
                    <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?7ave=1&new=1&school=1&health=1&entertain=1&cloth=1&food=1">7th Avenue</a>
                        <ul>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?7ave=1&new=1">New</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?7ave=1&school=1">School & Dorm</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?7ave=1&health=1">Health & Beauty</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?7ave=1&entertain=1">Entertainment</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?7ave=1&cloth=1">Cloth & Shoes</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?7ave=1&food=1">Food & Dining</a></li>
                        </ul>
                    </li>
                    <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?uws=1&new=1&school=1&health=1&entertain=1&cloth=1&food=1">Upper West Side</a>
                        <ul>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?uws=1&new=1">New</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?uws=1&school=1">School & Dorm</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?uws=1&health=1">Health & Beauty</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?uws=1&entertain=1">Entertainment</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?uws=1&cloth=1">Cloth & Shoes</a></li>
                            <li><a href="http://www.campusclipper.com/CCVersion2/coupon.php?uws=1&food=1">Food & Dining</a></li>
                        </ul>
                    </li>
		        </ul>
	        </li>
	        <li><a target="_blank" href="http://campusclippernycstudentguide.com/index.html">GUIDE BOOK</a></li>
	        <li><a target="_blank" href="https://itunes.apple.com/us/app/campus-clipper/id372600206?mt=8">CC APP</a></li>
	        <li><a href="http://www.campusclipper.com/CCVersion2">VEDIO</a></li>
	        <li><a target="_blank" href="http://www.ustream.tv/channel/the-bride-of-christ-show#itm_source=user_dropdown&itm_campaign=header&itm_medium=channel1_link&itm_content=Channel_1">TV</a></li>
	        <li><a target="_blank" href="http://www.blogtalkradio.com/campusclipper">RADIO</a></li>
        </ul>
    </div>
</div>