<?
    //set session
    session_start();
    $_SESSION['CCusername'] = $_POST['name'];
    $_SESSION['CCuseremail'] = $_POST['email'];
    $_SESSION['CCmsg'] = $_POST['msg'];
    //set cookie
    setCookie('CCusername', $_POST['name'], time()+3600*24*7);
    setCookie('CCuseremail', $_POST['email'], time()+3600*24*7);
    setCookie('CCmsg', $_POST['msg'], time()+3600*24*7);
    //direct to the main page
    header('Location:http://www.campusclipper.com/CCVersion2/');
?>