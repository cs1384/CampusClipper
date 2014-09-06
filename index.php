<?
    //a special file to handle the shopping cart info, this file should come before the header is sent out
    include 'shoppingCart.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>
    <head>
		<title>Campus Clipper</title> 
			<link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="css/index.css" />
			<script src="js/jquery-1.11.0.js"></script>
			<script src="js/jquery-ui-1.10.3.custom.js"></script>
			<script src="js/index.js"></script> 
            <script src="js/content.js"></script> 
	</head>
	<body>
        <div>
            <?
                include 'header.php';
            ?>
	    </div>
        <div class="main">
            <!--facebook SDK-->
            <div id="fb-root"></div>
            <script>
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                    fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk')
                );
            </script>
        <div class="content">
        <!--animation area-->
		<div class="show">
			<div class="sideTab" id="leftTab">
					<img src="pics/cc5.jpeg">
			</div>
            <div class="side"></div>
			<div class="screen">
                <div class="frame">
                	<!--slider, as a container of ordered pics-->
				    <div id="slider" class="slide">
				        <img src="pics/cc1.jpeg">
				        <img src="pics/cc2.jpeg">
                        <img src="pics/cover3.jpg">
                        <img src="pics/cover4.jpg">
				    </div>
                </div>
			</div>
			<div class="side"></div>
			<div class="sideTab" id="rightTab">
				<img src="pics/cc6.jpeg">
			</div>
			<!--dot group to indicate the picNum which is on-->
			<div class="page">
				<div id="d1" class="dot">
					<img src="pics/cc3.jpeg" class="invi">
					<img src="pics/cc4.jpeg">
				</div>
				<div id="d2" class="dot">
					<img src="pics/cc4.jpeg" class="invi">
					<img src="pics/cc3.jpeg">
				</div>
                <div id="d3" class="dot">
					<img src="pics/cc3.jpeg" class="invi">
					<img src="pics/cc4.jpeg">
				</div>
                <div id="d4" class="dot">
					<img src="pics/cc3.jpeg" class="invi">
					<img src="pics/cc4.jpeg">
				</div>
			</div>
			<div class="discription">
				<p>
					Campus Clipper is debitis deterruisset mel ut, vix aperiam rationibus an, no mel vide audiam percipit. Nec epicuri fierent te, ex persius labitur civibus, ne usu veri aliquip hendrerit. Ut vim maluisset torquatos, eius tacimates ad eos.
				</p>
			</div>
		</div>
        <!--lower part-->
		<div class="promo">
            <!--social tools-->
			<div class="socialTools">
				<ul class="tabLink">
					<li id="twitter">
						<img src="pics/twitter.png">
                    </li>
                    <li id="facebook">
                        <img src="pics/facebook2.png">
                    </li>
                    <li id="google">
                        <img src="pics/google+.png">
                    </li>
                    <li id="youtube">
                        <img src="pics/youtube.png">
					</li>
                </ul>
				<div class="embedded">
					<!--plug in of twitter-->
                    <div id="twitter_content">
                    	<a class="twitter-timeline" href="https://twitter.com/CampusClipper" data-widget-id="436161147876560900">Tweets by @CampusClipper</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
						</script>
                    </div>
                    <!--plug in of facebook-->
                    <div id="facebook_content">
                    	<div class="fb-like-box" data-href="https://www.facebook.com/CampusClipperNYC" data-width="320" data-height="500" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="true"></div>
                    </div>
                    <!--plug in of google-->
                    <div id="google_content">
                        <iframe src="http://widgetsplus.com:8080/27629.htm" width="320" height="500" style="padding:0; margin:0; overflow:hidden;" frameborder="0"></iframe>        
                    </div>
                    <!--plug in of youtube-->
                    <div id="youtube_content">
                    	<iframe scrolling="yes" marginheight="0" frameborder="0" width="300" height="500" src="http://ytchannelembed.com/gallery.php?vids=5&amp;user=StudentMaximus2010&amp;row=1&amp;width=300&amp;hd=1&amp;margin_right=0&amp;desc=100&amp;desc_color=9E9E9E&amp;title=30&amp;title_color=000000&amp;views=1&amp;likes=1&amp;dislikes=0&amp;fav=0&amp;playlist=" style="height: 500px; margin:10px;"></iframe>      
                     </div>
                </div>
			</div>
			<!--product exbihition-->
			<div class="commerce">
				<div class="title">
					FEATURED IN CO-ED SHOPPING
				</div>
				<!--should be modified to connect database-->
				<div class="product"><div class="word">Men's Fall Pieces</div><img src="pics/cc7.jpeg"><div class="bg"></div></div>		
				<div class="product"><div class="word">Men's Fall Pieces</div><img src="pics/cc8.jpeg"><div class="bg"></div></div>
				<div class="product"><div class="word">Men's Fall Pieces</div><img src="pics/cc8.jpeg"><div class="bg"></div></div>
				<div class="product"><div class="word">Men's Fall Pieces</div><img src="pics/cc7.jpeg"><div class="bg"></div></div>
			</div>
		</div>
	</div>
	    </div>
	
	    <div class="bottom">
		    <?include 'footer.php'?>
        </div>
	</body>
</html>

