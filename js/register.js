//check changePassword.js for deeper explanation 

$(document).ready(function(){

    //some control variables 
	var validEmail = false;
    var validPassword = false;
    var matchEmail = false;
    var matchPassword = false;
    
    //when any of input fields gets keyed up 
	$("input, select").keyup(function(){
        checkEnable();
    }).change(function(){
        checkEnable();
    });

	function checkEnable(){
        if(containBlanks() || !validEmail || !validPassword || !matchEmail || !matchPassword) {
        	$(".subm").attr("disabled", "disabled");
        }else {
        	$(".subm").removeAttr("disabled");
        }
    }
    
    $("#email").keyup(function(){
        if(isValidEmail($(this).val())){
            $(this).next(".msg").css("visibility","hidden");
            validEmail = true;
        }else{
        	$(this).next(".msg").css("visibility","visible");
        	validEmail = false;
        }
        if($(this).val() == $("#reEmail").val()){
    		$("#reEmail").next(".msg").css("visibility","hidden");
    		matchEmail = true;
    	}else {
    		$("#reEmail").next(".msg").css("visibility","visible");
    		matchEmail = false;
    	}
    	checkEnable();
    });

    $("#reEmail").keyup(function(){
    	if($(this).val() == $("#email").val()){
    		$(this).next(".msg").css("visibility","hidden");
    		matchEmail = true;
    	}else {
    		$(this).next(".msg").css("visibility","visible");
    		matchEmail = false;
    	}
    	checkEnable();
    });

    $("#psw").keyup(function(){
        if(isValidPassword($(this).val())){
            $(this).next(".msg").css("visibility","hidden");
            validPassword = true;
        }
        else{
        	$(this).next(".msg").css("visibility","visible");
        	validPassword = false;
        }
        if($(this).val() == $("#rePsw").val()){
    		$("#rePsw").next(".msg").css("visibility","hidden");
    		matchPassword = true;
    	}else {
    		$("#rePsw").next(".msg").css("visibility","visible");
    		matchPassword = false;
    	}
    	checkEnable();
    });

    $("#rePsw").keyup(function(){
    	if($(this).val() == $("#psw").val()){
    		$(this).next(".msg").css("visibility","hidden");
    		matchPassword = true;
    	}else {
    		$(this).next(".msg").css("visibility","visible");
    		matchPassword = false;
    	}
        if(isValidEmail($("#email").val())){
            validEmail = true;
        }else{
            $("#email").next(".msg").css("visibility","visible");
        	validEmail = false;
        }
        if($("#email").val() == $("#reEmail").val()){
    		matchEmail = true;
    	}else {
    		$("#reEmail").next(".msg").css("visibility","visible");
    		matchEmail = false;
    	}
    	checkEnable();
    });

    function containBlanks(){
        var hasBlank = false;
        $(".check").each(function(){
            if($(this).val() == "" || $(this).val()=="-1") {
            	hasBlank = true;
            }
        });
        return hasBlank;
    }

    function isValidEmail(email){
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    	return re.test(email);
    }

    function isValidPassword(psw){
    	var re = /^[0-9a-zA-Z!#$%&?_]{4,20}/;
    	return re.test(psw);
    }

});