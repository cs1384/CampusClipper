<?
    //unset session
    session_start();
    unset($_SESSION['CCusername']);
    unset($_SESSION['CCmsg']);
    session_destroy(); //this statment can actually unset all session variables
    //set the life time of cookie to past. 
    setCookie('CCusername',"", time()-3600);
    setCookie('CCuseremail',"", time()-3600);
    setCookie('CCmsg',"", time()-3600);
    //direct back to login page
    header('Location:http://www.campusclipper.com/CCVersion2/login.php');
?>