<?
    include 'shoppingCart.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html lang="en-US">
<head>
    <title>Content</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="campus clipper">
    
    <link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/coupon.css" />
    
    <link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="Stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.js"></script> 
    <script src="js/index.js"></script>
	<script src="js/coupon.js"></script>

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js"></script>
	<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.slide.js"></script>
	
</head>
<body>
    <header>
        <?include 'header.php'?>
    </header>
    <div class="frame">
	<div class="shopping">
		<div class="filter">
			<form target="showcase" action="showcase.php" method="GET">
				<p><input id="new" class="cate" type="checkbox" name="cate[]" value="1"> New</p>
    			<p><input id="school" class="cate" type="checkbox" name="cate[]" value="2"> School & Dorm</p>
				<p><input id="health" class="cate" type="checkbox" name="cate[]" value="3"> Health & Beauty</p>
				<p><input id="entertain" class="cate" type="checkbox" name="cate[]" value="4"> Entertainment</p>
				<p><input id="cloth" class="cate" type="checkbox" name="cate[]" value="5"> Cloth & Shoes</p>
				<p><input id="food" class="cate" type="checkbox" name="cate[]" value="6"> Food & Dining</p>
				<p>---------------------</p>
                <p><input id="italy" class="price" type="checkbox" name="price[]" value="1"> Little Italy</p>
				<p><input id="les" class="price" type="checkbox" name="price[]" value="2"> Lower E. Side</p>
				<p><input id="financial" class="price" type="checkbox" name="price[]" value="3"> Financial Dist.</p>
				<p><input id="evillage" class="price" type="checkbox" name="price[]" value="4"> East Village</p>
				<p><input id="wvillage" class="price" type="checkbox" name="price[]" value="5"> West Village</p>
				<p><input id="14street" class="price" type="checkbox" name="price[]" value="6"> 14th Street</p>
				<p><input id="23street" class="price" type="checkbox" name="price[]" value="7"> 23rd Street</p>
                <p><input id="3ave" class="price" type="checkbox" name="price[]" value="8"> 3rd Avenue</p>
                <p><input id="7ave" class="price" type="checkbox" name="price[]" value="9"> 7th Avenue</p>
                <p><input id="uws" class="price" type="checkbox" name="price[]" value="10"> Upper W. Side</p>
			</form>
		</div>
		<div class="header2">
			<div class="panel2" id="num"></div>
			<div class="panel2">&nbsp;item(s)&nbsp;||&nbsp; Show</div>
				<select class="howMany" name="var_select"><option>6</option>
				<option>9</option></select>
			<div class="panel2">per page</div>
        </div>
    	<div class="content">
		</div>
		<div class="preButton">(<<)PREVIOUS</div>
		<div class="nextButton">NEXT(>>)</div>
	</div>
    </div>
		</div>
		    <?include 'header.php'?>
        </div>
    
</body>