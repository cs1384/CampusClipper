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
	<script src="js/index.js"></script>
    
	<link rel="stylesheet" type="text/css" href="css/shopping.css" />
    <link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="Stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

	<script src="https://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>


    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.js"></script> 
    <script src="js/index.js"></script>
	<script src="js/shopping.js"></script>

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
				<p>CATEGORY</p>
				<p><input class="cate" type="checkbox" name="cate[]" value="1" checked="checked"> New Arrival</p>
				<p><input class="cate" type="checkbox" name="cate[]" value="2"> Men's</p>
				<p><input class="cate" type="checkbox" name="cate[]" value="3"> Women's</p>
				<p><input class="cate" type="checkbox" name="cate[]" value="4"> Tops</p>
				<p><input class="cate" type="checkbox" name="cate[]" value="5"> Bottoms</p>
				<p><input class="cate" type="checkbox" name="cate[]" value="6"> Accesories</p>
				<p><input class="cate" type="checkbox" name="cate[]" value="7"> Gadgets</p>
				<p>PRICE RANGE</p>
				<p><input class="price" type="checkbox" name="price[]" value="1" checked="checked"> $0 - $15</p>
				<p><input class="price" type="checkbox" name="price[]" value="2" checked="checked"> $15 - $30</p>
				<p><input class="price" type="checkbox" name="price[]" value="3" checked="checked"> $30 - $45</p>
				<p><input class="price" type="checkbox" name="price[]" value="4" checked="checked"> $45 - $60</p>
				<p><input class="price" type="checkbox" name="price[]" value="5" checked="checked"> $60 - $75</p>
				<p><input class="price" type="checkbox" name="price[]" value="6" checked="checked"> $75 - UP</p>
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
    
    <div class="bottom">
    	<?include 'footer.php'?>
    </div>
    
</body>