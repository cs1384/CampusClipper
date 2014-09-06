$(document).ready(function(){

    //move the main animation
    $('#slider').animate({"left": -886},700);
    //show the twitter tab and hide rest social tools 
    $('#twitter_content').css("display","block");
    $('#twitter_content').addClass('active');
    $('#facebook_content').css("display","none");
    $('#youtube_content').css("display","none");
    $('#google_content').css("display","none");

    //keep track on current position of main animation
    var present = 2; //the position of entire bgi image in total (think four images as a big one)
    var total = 4; //total number of images
    var picNum = 2; //real pic num
    
    //set up auto animation
    var move = setInterval(function(){$("#rightTab").click()},6000);

    //fired when right tab is clicked 
    $('#rightTab').click(function(){
        
        //avoid the intervene of pre-set auto animation
        clearInterval(move);
        
        //if we have reached the right end of the big pic and user still wants to slide right
        if(present==total){
            //cut the first pic of the big one to the end 
            $('#slider img:first').detach().appendTo('#slider');
            //move the entire new big pic to right
            $('#slider').animate({"left":-1772},0);
            $('#slider').animate({"left":-2658},700);
        }else{
            $('#slider').animate({"left": -886*present},700);
            present++;
        }
        
        //make sure the corresponding dot is showing different color
        var temp = "#d" + picNum + " .invi";
        var t = $(temp);
        t.siblings().addClass("invi");
        t.removeClass("invi");
        
        //update the showing pic info
        if(picNum==4){
            picNum = 1;
        }else{
            picNum++;
        }
        
        //update the dot info
        var temp = "#d" + picNum + " .invi";
        var t = $(temp);
        t.siblings().addClass("invi");
        t.removeClass("invi");
        
        //set the auto animation back up
        move = setInterval(function(){$("#rightTab").click()},6000);
	});
    
    //see $('#rightTab').click(function(){}); for detail
    $('#leftTab').click(function(){
        
        clearInterval(move);
        
        if(present==1){
            $('#slider img:last').detach().prependTo('#slider');
            $('#slider').animate({"left":-886},0);
            $('#slider').animate({"left":0},700);
        }else{
            $('#slider').animate({"left": -886*(present-2)},700);
            present--;
        }

        var temp = "#d" + picNum + " .invi";
        var t = $(temp);
        t.siblings().addClass("invi");
        t.removeClass("invi");
    
        if(picNum==1){
            picNum = 4;
        }else{
            picNum--;
        }
        
        var temp = "#d" + picNum + " .invi";
        var t = $(temp);
        t.siblings().addClass("invi");
        t.removeClass("invi");
        
        move = setInterval(function(){$("#rightTab").click()},6000);
	});
    
    //allow user to jump right to a certain picture
    $('.dot').click(function(){
        //avoid intervene
        clearInterval(move);
        //get the pic number of where we are going
        var goto = $(this).attr("id").substring(1,2);
        //if our destination is just the current position
        if(goto==picNum){}
        else{
            //calculate the next position and move there 
            var position = (-886*(present-1)-886*(total-picNum)-886*goto)%3544;
            $('#slider').animate({"left": position},700);
            
            //assure current dot info 
            var temp = "#d" + picNum + " .invi";
            var t = $(temp);
            t.siblings().addClass("invi");
            t.removeClass("invi");

            //update the present and picNum
            present = ((present+(total-picNum)+parseInt(goto))%4) == 0 ? 4: ((present+(total-picNum)+parseInt(goto))%4);
            picNum = goto;
            
            //update dot info
            var t = $(this).find('.invi');
            t.siblings().addClass("invi");
            t.removeClass("invi");
        }
        
        //set back the auto animation
        move = setInterval(function(){$("#rightTab").click()},6000);
    });
    
    //allow user to control the showing of social tools
    $('.tabLink li').click(function(){
        //get the tab to show
        var ac = "#" + $(this).attr("id") + "_content";
        //stop currently-showing tab
        $('.active').css("display","none");
        $('.active').removeClass("active");
        //active the target tab
        $(ac).css("display","block");
        $(ac).addClass("active");
    });

});