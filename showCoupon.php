<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>
    <head>
    	<title>Campus Clipper</title>
		<link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
            
		<script src="js/jquery-1.11.0.js"></script>
        <style>
            .main{width:480px}
            .main img{width:100%;}
            a{text-decoration:none;}
            .main div{text-align:center;height:40px;line-height:40px;}
        </style>
	</head>
	<body>
<?

//get path from the caller
if(isset($_GET["path"])){
    $path = $_GET["path"];
    
?>
    <div class="main">
        <? echo "<img src=\"$path\">"; ?>
        <div>
            <!--embed javascript code into href-->
            <a href="javascript:window.print()">Click to print this coupon</a>
        </div>
    </div>
<?
}
?>
    </body>
</html>