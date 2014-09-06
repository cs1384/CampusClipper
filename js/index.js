$(document).ready(function(){
    //if we can get cookie info (only CCmsg required here), replace the login hint to user's name
    if(getCookie("CCmsg")!=null){
        $('#signin').html(getCookie("CCusername") + "'s account");
        $('#signin').attr("href","http://www.campusclipper.com/CCVersion2/account.php");
    }
    
    //function to get cookie
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

});