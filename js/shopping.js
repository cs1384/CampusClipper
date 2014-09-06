$(document).ready(function(){

    //set up initial values of all control variables
	var pageNo = 1;
	var pageTotal = 1;
	var cate = [];
    var price = [];
    var perPage = 6;
    //and then refresh the showing item
    refreshItemNum();
    
    //if any of checkebox was checked, reset pageNo to 1 and refresh
	$('input[type="checkbox"]').on('click',function(){
		pageNo = 1;
        $('.nextButton').css("display","none");
        $('.preButton').css("display","none");
        refreshItemNum();
    });
    
    //if the value of howMany drop down menu is changed, arrange the space and refresh
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
    
    //go back to the previous page. Based on the return info of refresh to set up control buttons
    $('.preButton').click(function(){
    	pageNo = pageNo - 1;
    	refreshItemNum();
    	$('.nextButton').css("display","block");
    	if(pageNo==1){
    		$(this).css("display","none");
    	}

    });

    //go to the next page. Based on the return info of refresh to set up control buttons
    $('.nextButton').click(function(){
    	pageNo = pageNo + 1;
    	refreshItemNum();
    	$('.preButton').css("display","block");
    	if(pageNo==pageTotal){
    		$(this).css("display","none");
    	}
    });

    //refresh the content div by ajax 
    function refreshItemNum(){
    	//prepare necessary information to server fpr ajax
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
        	//the destination, a program file 
            url:"productLoad.php",
            //method of transmitting data
            type:"POST",
        	//specify the return type
            dataType:"json",
            //the parameters
        	data:{cate: cate, price: price, pageNum: pageNo, perPage: perPage, pageTotal: pageTotal},
        	//the function on success
            success:function(result){
                //get the total number of pages needed
        		pageTotal = Math.ceil(result.itemNum/perPage>1?result.itemNum/perPage:1);
        		//arrange the control button based on the number of pages
                if(pageNo!=1 && pageTotal>1){
        			$('.preButton').css("display","block");
        		}
                if(pageNo!=pageTotal && pageTotal>1){
                    $('.nextButton').css("display","block");
        		}
                //update the number of pages
      			$("#num").html(result.itemNum);
                //refresh the content of items
                $(".content").hide().html(result.content).fadeIn(800);
    		}
    	});
    }
    /*
    function refreshContent(){

        var perPage = $('.howMany').val();

        $.ajax({
        	url:"content.php",
        	type:"POST",
        	//contentType:'application/json',
        	//dataType:'json',
        	data:{cate: cate, price: price, pageNum: pageNo, perPage: perPage, pageTotal: pageTotal},
        	success:function(result){
        		//alert(result);
      			$(".content").html(result);
    		},
    	});
   	}
    */
    //an page track variable for control button
	var pg = 1;
	
	//$('#nextPage').css("display","block");
    /*
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
