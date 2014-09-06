$(document).ready(function(){

	var validEmail = false;
    var validPassword = false;
    var matchPassword = false;
    
    //to check if we can enable the submit button
	function checkEnable(){
        if(containBlanks() || !validEmail || !validPassword || !matchPassword) {
        	$(".subm").attr("disabled", "disabled");
        }else {
        	$(".subm").removeAttr("disabled");
        }
    }
    
    //when the value of #email tag is changed, then do some check
    $("#email").change(function(){
    	//if the email input is valid, then hide the error msg and set validEmail bit to true
        if(isValidEmail($(this).val())){
            $(this).next(".msg").css("visibility","hidden");
            validEmail = true;
        //if the email input is not valid, then show the error msg and set validEmail bit to false    
        }else{
            //.next to select a sibling tag
        	$(this).next(".msg").css("visibility","visible");
        	validEmail = false;
        }
        //check if we can enable the submit button after the value change
    	checkEnable();
    });

    //when the value of #email tag is changed, then do some check
    $("#psw").change(function(){
        //check validity
        if(isValidPassword($(this).val())){
            $(this).next(".msg").css("visibility","hidden");
            validPassword = true;
        }else{
        	$(this).next(".msg").css("visibility","visible");
        	validPassword = false;
        }
        //also need to check if the re-typed password is matched
        if($(this).val() == $("#rePsw").val()){
    		$("#rePsw").next(".msg").css("visibility","hidden");
    		matchPassword = true;
    	}else {
    		$("#rePsw").next(".msg").css("visibility","visible");
    		matchPassword = false;
    	}
        //enablity 
    	checkEnable();
    });

    
    $("#old").change(function(){
        checkEnable();
    });    
    
    //when the value of #email tag is changed, then do some checks
    $("#rePsw").change(function(){
        //if passwords are matched
    	if($(this).val() == $("#psw").val()){
    		$(this).next(".msg").css("visibility","hidden");
    		matchPassword = true;
    	}else {
    		$(this).next(".msg").css("visibility","visible");
    		matchPassword = false;
    	}
        /**
         * browser would save the value of email when paging back, so we have to check email as well 
         * on the change of password, which will never be saved by teh browser. 
        */
        if(isValidEmail($("#email").val())){
            validEmail = true;
        }else{
            $("#email").next(".msg").css("visibility","visible");
        	validEmail = false;
        }
    	checkEnable();
    });
    
    //check if all required field have been filled
    function containBlanks(){
        var hasBlank = false;
        $(".check").each(function(){
            if($(this).val() == "" || $(this).val()=="-1") {
            	hasBlank = true;
            }
        });
        return hasBlank;
    }
    
    //check if the email value can pass the regular expression check
    function isValidEmail(email){
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    	return re.test(email);
    }

    //check if the password value can pass the regular expression check
    function isValidPassword(psw){
    	var re = /^[0-9a-zA-Z!#$%&?_]{4,20}/;
    	return re.test(psw);
    }

});