$(document).ready(function(){

    //when add button is clicked
    $("#add").click(function(){
        //test if the user has logged in. if not, require them!
        if(getCookie("CCusername")==null){
            alert("Please log in first!");
        //if yes, get the necessary variables and do ajax
        }else{
            var email = getCookie("CCuseremail");
            var msg = getCookie("CCmsg");
            var num = $_GET['item'];
        //send addition info to the server via ajax            
        $.ajax({
            url:"addFavorite.php",
            type:"POST",
        	dataType:"json",
        	data:{email: email, msg: msg, num: num},
        	success:function(result){
                if(result.good){
                    alert("Coupon added");
                }else{
                    alert("Please log in first!");
                }
    		},
            error:function(){
                alert("ajax failed");
            }
        });
        }
    });
    
    //This part gets us an array of GET variables
    var $_GET = {};
    document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
            return decodeURIComponent(s.split("+").join(" "));
    }
    $_GET[decode(arguments[1])] = decode(arguments[2]);
    });
    
    //The method allows you to get the value of a specific COOKIE
    function getCookie(name) {
        var dc = document.cookie;
        var prefix = name + "=";
        //alert(dc);
        var begin = dc.indexOf("; " + prefix);
        if (begin == -1) {
            begin = dc.indexOf(prefix);
            if (begin != 0) {
                return null;
            }
        }else{
            begin += 2;
        }
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
            end = dc.length;
        }
        return unescape(dc.substring(begin + prefix.length, end));
    } 

    //current page no
    var pageNo = 1;
    //The number of pages required by the matched coupons
    var pageTotal = 1;
    //The coupons per page, default 2
    var perPage = 2;
    //The coupon number
    var num = $_GET['item'];
    //refresh the review section when first entering the page
    refreshView();

    //when back button is clicked, decrement the pageNo, refresh the review and then see 
    //if the control page buttons are necessary
    $('#backB').click(function(){
    	pageNo = pageNo - 1;
    	refreshView();
    	$('#nextB').css("display","block");
    	if(pageNo==1){
    		$(this).css("display","none");
    	}
    });

    //when next button is clicked, increment the pageNo, refresh the review and then see 
    //if the control page buttons are necessary
    $('#nextB').click(function(){
    	pageNo = pageNo + 1;
    	refreshView();
    	$('#backB').css("display","block");
    	if(pageNo==pageTotal){
    		$(this).css("display","none");
    	}		
    });
    
    //If user wants to write review
    $('#reviewB').click(function(){
        //if not logged in, ask user to do!
        if(getCookie("CCusername")==null){
            alert("Please log in first!");
        }else{
            //unable the page control buttons and load write mode into load div
            $('#backB').css("display","none");
    	    $('#nextB').css("display","none");
            refreshWrite();
        }
    });

    //load write mode into load div
    function refreshWrite(){
        var username = getCookie("CCusername");
        var email = getCookie("CCuseremail");
        
        $.ajax({
            url:"iWriteLoad.php",
            type:"POST",
        	dataType:"json",
        	data:{username: username, num: num, email: email},
        	success:function(result){
                $(".load").hide().html(result.content).fadeIn(500);
    		},
            error:function(){
                alert("ajax failed");
            }
    	});
    }

    //load the review content into load div
    function refreshView(){
        var email = getCookie("CCuseremail");

        $.ajax({
        	url:"iViewLoad.php",
            type:"POST",
        	dataType:"json",
        	data:{pageNum: pageNo, perPage: perPage, pageTotal: pageTotal, num: num, email: email},
        	success:function(result){
                //compute the total page required 
                pageTotal = Math.ceil(result.itemNum/perPage>1?result.itemNum/perPage:1);
                
                //check if page control buttons are requried 
                if(pageNo!=1 && pageTotal>1){
        			$('#backB').css("display","block");
        		}
                if(pageNo!=pageTotal && pageTotal>1){
                    $('#nextB').css("display","block");
        		}
                
                //load content
                $(".load").hide().html(result.content).fadeIn(500);
    		},
            error:function(){
                alert("ajax failed");
            }
    	});
    }

});
