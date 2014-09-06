$(document).ready(function(){
    
    //browser automatically save the email so we need to checke the validity everytime we enter the page
    var validEmail = false;
    if(isValidEmail($("#email").val())){
        validEmail = true;
    }
    
    //when any of the input fields gets keyed up 
    $("input").keyup(function(){
        checkEnable();
    }).change(function(){
        checkEnable();
    });
                
    function checkEnable(){
        if(containBlanks() || !validEmail ){
            $(".subm").attr("disabled", "disabled");
        }else {
        	$(".subm").removeAttr("disabled");
        }
    }
                
    function containBlanks(){
        var hasBlank = false;
        $(".check").each(function(){
            if($(this).val() == "" || $(this).val()=="-1") {
                hasBlank = true;
            }
        });
        return hasBlank;
    }
                
    $("#email").change(function(){
        if(isValidEmail($(this).val())){
            $(this).next(".msg").css("visibility","hidden");
            validEmail = true;
        }else{
        	$(this).next(".msg").css("visibility","visible");
        	validEmail = false;
        }
        checkEnable();
    });
                
    function isValidEmail(email){
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
});
                