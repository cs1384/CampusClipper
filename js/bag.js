$(document).ready(function(){
    
    //when x button was pressed, send request to server to delete record
    $(".but").click(function(){
        //the name of this element contains the pNum and bName when it was first created
        var key = $(this).attr("name");
        var vr = key.split(".");
        $.ajax({
            url:"deleteFromBag.php",
            type:"POST",
            dataType:"json",
        	data:{pNum: vr[0], bName: vr[1]},
        	success:function(result){
                if(result.good){
                    location.reload();
                }
    		},
            error:function(){
                alert("ajax failed");
            }
        });
    });
    
    //once qty got changed, ask server to upodate record
    $(".qty").change(function(){
        var value = $(this).val(); //get new value
        if(value>0){ //negative value is not allowed
            var key = $(this).attr("name");
            var vr = key.split(".");
            $.ajax({
                url:"changeBag.php",
                type:"POST",
                dataType:"json",
                data:{pNum: vr[0], bName: vr[1], nValue: value},
            	success:function(result){
                    if(result.good){
                        location.reload();
                    }else{
                        alert("error");
                    }
        		},
                error:function(){
                    alert("ajax failed");
                }
            });
        }else{
            location.reload();
        }
    });
    
});
                