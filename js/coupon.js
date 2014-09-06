$(document).ready(function(){
    
    /*
    //get all "GET" variables
    var $_GET = {};
    document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
            return decodeURIComponent(s.split("+").join(" "));
    }
    $_GET[decode(arguments[1])] = decode(arguments[2]);
    });
    */
    
    //refresh the checked options in the filter bar
    var vars = [];
    getUrlVars();
    refreshFilter();
    
    //based on vars array and check all the intend filter options
    function refreshFilter(){
        var i;
        var op;
        for(i=0;i<vars.length;i++){
            op = "#" + vars[i];
            $(op).attr('checked',true);
        };
    }
    
    //get the GET variables and store them in vars arrays
    function getUrlVars()
    {
        var hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
        }
    }

    //refresh the coupons to be shown
	var pageNo = 1;
	var pageTotal = 1;
	var cate = [];
    var price = [];
    var perPage = 6;
    refreshItemNum();

    //once the status of any checkbox is changed, reset the page and refresh the coupons
	$('input[type="checkbox"]').on('click',function(){
		pageNo = 1;
        $('.nextButton').css("display","none");
        $('.preButton').css("display","none");
        refreshItemNum();
    });

    //once the num per page is changed, change the dimension of main div and refresh the coupons
    $('.howMany').change(function(){
    	perPage = $('.howMany').val();
    	if(perPage==9){
    		$('.content').css("height","950px");
    		$('.nextButton').css("top","1050px");
    		$('.preButton').css("top","1050px");
    	}else {
    		$('.content').css("height","650px");
    		$('.nextButton').css("top","750px");
    		$('.preButton').css("top","750px");
    	}
    	pageNo = 1;
        $('.nextButton').css("display","none");
        $('.preButton').css("display","none");
    	refreshItemNum();
    });

    //when preButton is clicked, decreament the page and refresh the coupons
    $('.preButton').click(function(){
    	pageNo = pageNo - 1;
    	refreshItemNum();
    	$('.nextButton').css("display","block");
    	if(pageNo==1){
    		$(this).css("display","none");
    	}

    });

    //when nextButton is clicked, increment the page and refresh the coupons
    $('.nextButton').click(function(){
    	pageNo = pageNo + 1;
    	refreshItemNum();
    	$('.preButton').css("display","block");
    	if(pageNo==pageTotal){
    		$(this).css("display","none");
    	}
    		
    });
    
    //refresh the coupons to be shown
    function refreshItemNum(){
    	//reset the arrays
        cate = [];
    	price = [];

        $('input[type="checkbox"].cate:checked').each(function(){
            cate.push($(this).val());
        });

        $('input[type="checkbox"].price:checked').each(function(){
            price.push($(this).val());
        });

        perPage = $('.howMany').val();

        $.ajax({
        	url:"couponLoad.php",
            type:"POST",
        	dataType:"json",
        	data:{cate: cate, price: price, pageNum: pageNo, perPage: perPage, pageTotal: pageTotal},
        	success:function(result){
        		pageTotal = Math.ceil(result.itemNum/perPage>1?result.itemNum/perPage:1);
                if(pageNo!=1 && pageTotal>1){
        			$('.preButton').css("display","block");
        		}
                if(pageNo!=pageTotal && pageTotal>1){
                    $('.nextButton').css("display","block");
        		}
      			$("#num").html(result.itemNum);
                $(".content").hide().html(result.content).fadeIn(800);
    		},
            //function on failed
            error: function(){
                alert("failed");
            }
    	});

    }
    /*
	var pg = 1;
	
	$('#nextPage').css("display","block");

	$('#prePage').click(function(){
		if(pg==2){
			$(this).css("display","none");
			$('#nextPage').css("display","block");
		}
		pg = pg - 1;
		url = "show.php?page=";
		url = url.concat(pg);
		//alert(url);
		document.getElementById('cool').src = url;
		document.getElementById('cool').reload(true);
	});
	$('#nextPage').click(function(){
		if(pg==1){
			$(this).css("display","none");
			$('#prePage').css("display","block");
		}
		pg = pg + 1;
		url = "show.php?page=";
		url = url.concat(pg);
		//alert(url);
		document.getElementById('cool').src = url;
		document.getElementById('cool').reload(true);
	});
    */
});
